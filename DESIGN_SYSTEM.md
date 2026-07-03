# Les Bonnets Gris — Design System (v0.1, draft)

> Statut : brouillon de travail soumis à validation. Jalon Notion associé :
> « Charte graphique validée (couleurs, typo, espacements) » — 28/07/2026
> (voir *📅 Planning — Les Bonnets Gris*, Phase 3).

Ce document initie le futur design system du site WordPress Les Bonnets
Gris. Il traduit en fondations et composants les décisions déjà actées dans
Notion (*03 · Design & Système de marque*) et la planche de marque validée,
en résolvant les questions d'implémentation (police exacte, contraste AA,
architecture CSS) qui restaient ouvertes.

## Où regarder

- **Style-guide vivant** : ouvrir `design-system/preview/00-apercu.html`
  dans un navigateur — c'est le point d'entrée, avec un lien vers chaque
  fondation et composant.
- **Code de production** : `assets/css/tokens.css`, `assets/css/base.css`,
  `assets/css/components.css`, `theme.json` (déjà branchés dans le thème
  via `functions.php`).
- **Assets de marque** : `assets/logo/*.svg`, `assets/fonts/*.woff2`.

## Décisions reprises telles quelles (Notion 03)

- Logo : bonnet tricoté + deux cœurs superposés (contour clair + plein
  Orange Pop), wordmark serif, tagline sans-serif capitales.
- Système typographique à deux rôles stricts : serif éditoriale pour le
  wordmark et les titres H1/H2 uniquement, sans-serif pour tout le
  fonctionnel (CTA, formulaires, chiffres), accent manuscrit réservé aux
  témoignages.
- Nuancier codé par fonction et non par décoration (Action / Institutionnel
  / Témoignage / Impact / Neutre).
- Curseur émotionnel sur l'espoir actif : zéro image clinique, uniquement
  visages, mouvement, lumière (Notion 01 · Stratégie, « décision de design
  n°1 »).
- Composants prioritaires : carte témoignage, compteur d'impact, barre de
  progression cagnotte, transition de sortie ICM.

## Décisions prises pour cette itération (à valider)

Ces points n'étaient pas tranchés dans Notion — ce sont des choix de
Head of Design proposés pour permettre l'implémentation, à valider ou
amender par Christelle Arrighi avant le 28/07.

### 1. Typographies : Fraunces + Inter

Le brief citait « type Fraunces/Canela » et « type Inter/General Sans »
comme références de style, pas comme choix figés. Retenu :
**Fraunces** (serif éditoriale) + **Inter** (sans-serif) — toutes deux
gratuites, auto-hébergeables, visuellement très proches des références
citées.

**Pourquoi l'auto-hébergement plutôt que Google Fonts CDN** : le projet
s'impose « zéro cookie tiers avant consentement » (ADR-005, Notion 05).
Charger une police depuis les serveurs de Google transmet l'IP du
visiteur à un tiers avant tout consentement — c'est exactement le type de
requête tierce que le RGPD/CNIL pointe pour les polices web. Les fichiers
`.woff2` sont donc commités dans `assets/fonts/` et servis depuis le
domaine du site.

### 2. Correction de contraste AA sur l'Orange Pop

Le WCAG 2.1 AA est non négociable (critère d'excellence + ADR-006). Or le
contraste de l'Orange Pop brut de la planche de marque (`#F2642D`) avec du
texte blanc n'est que de **3.16:1** — sous le seuil de 4.5:1 requis pour du
texte, et même sous le seuil de 3:1 pour un composant graphique non
textuel. Un bouton « Faire un don » en Orange Pop brut avec texte blanc
aurait techniquement échoué l'audit accessibilité dès la première story.

**Solution retenue** : séparer la couleur en deux usages distincts au
niveau des tokens (voir `assets/css/tokens.css`) —

| Token | Valeur | Usage | Contraste avec blanc |
|---|---|---|---|
| `--color-brand-accent` (Orange Pop pur) | `#F2642D` | Décoratif uniquement : logo, icônes, illustrations, aplats non textuels | 3.16:1 — ne jamais poser de texte dessus |
| `--color-action` (Orange Pop — Action) | `#CB420D` | Tout CTA, tout texte orange | 4.86:1 ✓ AA |
| `--color-action-hover` | `#B0390B` | État hover/actif | 6.11:1 ✓ AA |

Même teinte et saturation (HSL), luminosité réduite d'environ 25 %. Le même
correctif a été appliqué aux couleurs Témoignage (`#AC4729` au lieu de
`#C1502E` brut) et Impact (`#5D6B51`) pour que leurs usages en texte sur
fond teinté (badges) passent également le seuil AA. Le détail des calculs
de contraste est visible sur `design-system/preview/01-fondations-couleurs.html`.

**Conséquence pratique** : la planche de marque reste la référence pour
l'identité (logo, illustrations) ; le nuancier fonctionnel du site utilise
des valeurs légèrement assombries pour porter du texte en toute sécurité.
Si cette nuance visuelle n'est pas acceptable, l'alternative est d'agrandir
la typographie des CTA à ≥ 24px (seuil « grand texte », contrainte 3:1) —
option à trancher avec la présidente si le rendu actuel ne convient pas.

### 3. Synthèse libre des mood boards

Les 4 sites de référence transmis (HERoines, Ascend, Birthday Party
Project, Rise) partagent un même registre love brand malgré des causes
différentes : typographie forte mixte serif/sans, blocs de couleur
énergiques, photo éditoriale, chiffres d'impact visibles, CTA francs. Le
système ci-contre synthétise ces mécanismes sans copier un layout
particulier :
- **Ascend** → chiffre choc + gros titre percutant above the fold (repris
  dans le pattern Hero).
- **Rise** → chaleur éditoriale, courbes de section douces, ton direct.
- **Birthday Party Project** → énergie visuelle, structure de preuve
  sociale (compteurs, partenaires) sans misérabilisme.
- **HERoines** → bandeau de citation défilant, ton direct à la deuxième
  personne.

## Architecture technique

```
assets/
  css/
    tokens.css       ← source de vérité (couleurs, typo, espacements, rayons, ombres)
    base.css         ← reset, @font-face, typographie de base, accessibilité
    components.css   ← boutons, cards, témoignage, compteur, cagnotte, ICM, formulaires, nav, footer, hero
  fonts/             ← Fraunces + Inter, woff2 auto-hébergées
  logo/              ← mark, lockups (vertical/horizontal), favicon — SVG
  js/
    nav.js           ← toggle menu mobile, vanilla ES6+, zéro dépendance
theme.json           ← mêmes tokens exposés à l'éditeur Gutenberg natif (palette, tailles, espacements)
design-system/
  preview/           ← style-guide vivant, une page par fondation/composant
```

Chargement en cascade (`functions.php`) : `tokens.css` → `base.css` →
`components.css` → `style.css`, à la fois côté visiteur et dans l'éditeur
de blocs (`add_editor_style`), pour que ce qu'on voit dans Gutenberg
corresponde à ce qui sera rendu.

Convention de nommage : préfixe `lbg-` sur chaque racine de composant CSS
(isolation dans l'écosystème de plugins WordPress), BEM en dessous. Les
hooks PHP restent préfixés `bonnets_gris_` (cf. Notion 05, inchangé).

## Ce qui n'est PAS dans cette itération

- Les blocs Gutenberg custom dynamiques (`hero-section`, `impact-counter`,
  `membership-tiers`, `testimonial` — cf. Architecture Decision Document,
  Notion 05) : ce document livre les **styles et la structure HTML/CSS**
  de ces composants, pas leur enregistrement PHP en blocs ACF Pro
  dynamiques. C'est le travail de l'Epic 2 (V1 Sprint 1), après validation
  de cette charte.
- Le contenu réel (textes, photos, témoignages) : les exemples ci-contre
  sont des placeholders, le contenu définitif arrive en Phase 4 (Notion
  Planning, réception contenus 03–17/08).
- La connexion API HelloAsso pour le compteur d'impact temps réel (prévue
  V2, ADR-001) : en V1 les chiffres sont statiques/mis à jour à la main.

## Prochaines étapes

1. Validation de cette charte par Christelle Arrighi avant le 28/07.
2. Transmission à la phase maquettes Figma (15–31/07) comme fondation —
   les maquettes doivent consommer ces tokens plutôt que réinventer des
   valeurs.
3. Si validé, implémentation des blocs Gutenberg dynamiques en Sprint 1
   (Epic 2, 24/08).
