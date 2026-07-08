# Plan de refonte — administrabilité, factorisation, WPCS, dépendances, conformité dépôt

Basé sur `docs/audit-technique-20260708.md`. **Aucun fichier du thème n'a été modifié pour produire ce plan.** Aucune branche d'exécution n'a été créée. Toutes les décisions ci-dessous ont été validées en échange direct le 2026-07-08 — **l'exécution proprement dite n'a pas commencé** ; ce document sert de référence de démarrage.

## Décisions validées (2026-07-08)

| # | Sujet | Décision |
|---|---|---|
| 1 | Déploiement WordPress.com | **Repointer le natif** : GitHub Deployments de WordPress.com reconfiguré sur le dashboard pour suivre `staging`. Aucun workflow de déploiement custom à écrire. |
| 2 | Page Accueil | **Une Page réelle existe** derrière `front-page.php` → contenu accueil géré en meta de page, comme les autres pages. |
| 3 | Verrouillage marque | **Verrouiller les 5 éléments** comme recommandé (baseline, tokens, logos, structure de page, libellés de stats) — confirmé après clarification des implications concrètes. |
| 4 | Ruleset WPCS | **WordPress-Core**. |
| 5 | Périmètre contenu (§1.1) | **Tout le tableau proposé**, dans cette même vague. |
| 6 | Timeline + membres | **Blocs Gutenberg sur-mesure** (pas de CPT) — introduit un chantier npm/`@wordpress/scripts`. |
| 7 | Composer/WPCS | **Confirmé**, à introduire en premier lot. |
| 8 | `add_theme_support('woocommerce')` | **Retiré**. |
| 9 | Composants à extraire (§2) | **Les 3 proposés retenus** : `closing-cta.php`, les 3 icônes SVG, et la fusion des deux JS de carrousel. |
| 10 | README | **À ajuster** : retirer le lien Google Drive (pas de lien réel disponible) ; contenu détaillé des nouvelles sections à préciser au moment de l'exécution. |
| 11 | `.gitignore` | **Validé tel quel**, `composer.lock` committé. |
| 12 | `lint.yml` | **Validé**, PHP 8.2. |
| 13 | Protection de branches GitHub | **Exécutée par moi**, via l'API GitHub, avec confirmation du réglage exact avant application. |
| 14 | Séquencement du chantier blocs Gutenberg | **Branche séparée** (`feature/blocs-timeline-membres`) plutôt que sur la branche de refactor principale — voir §6 mis à jour. |
| 15 | Nom de la branche principale | **Confirmé** : `refactor/administrabilite-20260708`. |

Conséquence directe de la décision #6 sur la décision #14 : le chantier "timeline + membres" change de nature (npm/build JS au lieu de CPT natif) et de branche. Le reste du plan (§1 à §5) n'est pas affecté dans son contenu, seulement dans son découpage en séquencement (§6, revu ci-dessous).

---

## 0. Hypothèses — résolues

- [x] **Déploiement WordPress.com** : natif repointé sur `staging` (décision #1). Pas de `deploy-staging.yml` à écrire côté dépôt — item retiré du séquencement.
- [x] **Page Accueil** : confirmée existante (décision #2). Le contenu de l'accueil (manifeste, stats) suit le même mécanisme "meta de page" que La Maladie/Qui sommes-nous/Rejoignez-nous — pas de page d'options séparée nécessaire pour l'accueil.
- [ ] **Le tag `build-1-preprod-20260708`** n'existe que localement dans la session d'audit précédente (le push a échoué, 403 sur les refs de tags). La branche `refactor/administrabilite-20260708` doit en partir — si le tag n'est pas accessible au moment de l'exécution, partir directement du commit `5b224ac` (strictement équivalent). *(reste à vérifier au moment de créer la branche, pas une décision à trancher maintenant)*

---

## 1. Contenu codé en dur → administrabilité

### 1.0 Éléments verrouillés (décision #3 — confirmée)

- [x] **Baseline de marque** ("Rendre visible l'invisible") : reste en dur, jamais exposée en champ éditable.
- [x] **Tokens de design** (`assets/tokens/*.css`) : restent pilotés par le code, revus en PR, aucun réglage Customizer/`theme.json` connecté.
- [x] **Fichiers logo** (`assets/logo/*.png`) : restent des assets de thème fixes.
- [x] **Structure des sections par page** : reste pilotée par `page-templates/*.php`, pas de réorganisation libre en éditeur de blocs.
- [x] **Libellés exacts des statistiques médicales** : la valeur numérique devient éditable, le libellé reste verrouillé par défaut.

### 1.1 Contenu par mécanisme — périmètre complet retenu (décision #5)

| Contenu | Fichier(s) source actuel | Mécanisme retenu | Statut |
|---|---|---|---|
| Manifeste accueil (eyebrow, titre, 3 lignes + surlignage, CTA) | `front-page.php` L15-67 | **Meta de page** sur la Page "Accueil" (objet Page confirmé — décision #2) | À exécuter |
| Stats accueil (6 000 / 4 000 / 1ère / 12 / 0) | `front-page.php` L48-68 | **Meta de page** sur la Page "Accueil" | À exécuter |
| Stats La Maladie (1/2000, ~450, 9) | `page-templates/la-maladie.php` L48-68 | **Meta de page** sur la Page "La Maladie" | À exécuter |
| Texte fondateur, mission (hors timeline/portraits) | `page-templates/qui-sommes-nous.php` | **Meta de page** sur "Qui sommes-nous" | À exécuter |
| Hero + intro | `page-templates/rejoignez-nous.php` L13-18 | **Meta de page** sur "Rejoignez-nous" | À exécuter |
| Liens externes (boutique, don, Instagram, Facebook) | `template-parts/navigation/{navbar,footer}.php`, `front-page.php`, `rejoignez-nous.php` | **Page d'options** "Réglages → Liens de l'association" (`register_setting`) | À exécuter |
| Identité légale (adresse, n° RNA, directeur de publication, email) | `page-templates/mentions-legales.php` L25-28 | **Page d'options** "Réglages → Association" | À exécuter |
| Membres (bureau, équipe, portraits fondatrices) | `page-templates/qui-sommes-nous.php` (`$board`, `$team`, carrousel fondatrices) | **Bloc Gutenberg sur-mesure** répétable (décision #6) | À exécuter — branche séparée `feature/blocs-timeline-membres` |
| Timeline "Notre histoire" (4 jalons) | `page-templates/qui-sommes-nous.php` | **Bloc Gutenberg conteneur "Frise" + bloc enfant "Jalon"** (`InnerBlocks`, décision #6) | À exécuter — branche séparée `feature/blocs-timeline-membres` |
| Newsletter (placeholder) | `template-parts/marketing/newsletter.php` | Non prioritaire, pas de mécanisme | Hors périmètre de ce plan |

---

## 2. Composants réutilisables — retenus (décision #9)

| Duplication | Composant | Emplacement | Signature | Fichiers appelants après refactor |
|---|---|---|---|---|
| Bloc "closing CTA" | `closing-cta.php` | `template-parts/marketing/closing-cta.php` | `array( 'logo', 'logo_alt', 'title', 'description', 'cta_label', 'cta_url', 'tone' )` | `qui-sommes-nous.php`, `rejoignez-nous.php` |
| Icône flèche prev/next | `chevron.php` | `template-parts/icons/chevron.php` | `array( 'direction' => 'prev'\|'next' )` | `home/news-teaser.php`, `marketing/founder-spotlight.php` |
| Icône "lecture" | `play-button.php` | `template-parts/icons/play-button.php` | aucun | `marketing/reel-testimonial.php`, `marketing/story-spotlight.php` |
| Icône "marque de citation" | `quote-mark.php` | `template-parts/icons/quote-mark.php` | aucun | `cards/testimonial-card.php`, `marketing/reel-testimonial.php` |
| `news-carousel.js` + `founder-carousel.js` | `carousel.js` générique (attributs `data-*`) | `assets/js/carousel.js` (suppression des deux fichiers existants) | — | Tous les gabarits `.ds-news-carousel`/`.ds-founder-carousel` |

- [x] Les 5 extractions validées.

---

## 3. Plan de nettoyage WPCS — ruleset retenu : WordPress-Core (décision #4)

Estimation manuelle (phpcs non encore installé), à remplacer par un run réel dès l'item 3 du séquencement exécuté :

| Catégorie | Fichiers concernés (estimation) | Auto-corrigible (`phpcbf`) | Manuel |
|---|---|---|---|
| Espacement structures de contrôle | Rare, déjà largement conforme | Oui | — |
| Docblocks de fichier (`@package`) manquants | Tous les fichiers PHP | Non | Oui |
| Docblocks de fonction manquants | `inc/setup.php`, `inc/enqueue.php`, `template-parts/navigation/footer.php` | Non | Oui |
| Préfixage fonctions/hooks | Déjà conforme (à confirmer par le run) | — | Vérification |
| `array()` vs `[]` | Cohérent (`array()` partout) | — | Vérification |
| Yoda conditions | Majoritairement suivi, non vérifié exhaustivement | Partiel | Vérification des cas restants |
| Formatage général | Tout le thème | Oui | — |
| `add_theme_support( 'woocommerce' )` | `inc/setup.php` L9 | Non | **Oui — retrait confirmé (décision #8)** |

---

## 4. Plan de dépendances — Composer/WPCS confirmé (décision #7)

1. **[Retenu, moins risqué]** `composer.json` + `wp-coding-standards/wpcs` + `squizlabs/php_codesniffer` en `require-dev`. Dépendance dev uniquement, zéro risque runtime.
2. **[Retenu]** `phpcs.xml`, ruleset `WordPress-Core` (décision #4), `text_domain` = `bonnets-gris`.
3. **[Retenu, risque plus élevé, chantier séparé]** Toolchain `@wordpress/scripts` (npm) pour les blocs Gutenberg "Membre" et "Frise/Jalon" (décision #6). `package.json`, `node_modules/`, étape de build. **Sur la branche dédiée `feature/blocs-timeline-membres`**, pas sur `refactor/administrabilite-20260708`, pour ne pas faire dépendre le reste du refactor (déjà conséquent) de ce chantier plus lourd et plus long à stabiliser.

---

## 5. Plan de conformité du dépôt

### 5.1 README.md — à ajuster (décision #10)

- [x] Corriger la mention obsolète (thème actif = Bonnets Gris, pas Charity Grove).
- [x] **Retirer** le lien Google Drive (pas de lien réel disponible actuellement, plutôt que de laisser un doublon pointant vers Notion).
- [ ] Ajouter section **Stratégie de branches** (`main` / `staging` / `feature`) — contenu à rédiger au moment de l'exécution, sur la base de l'état réel une fois `staging` créée.
- [ ] Ajouter section **Développement local** (Composer/WPCS, commandes lint) — contenu à préciser au moment de l'exécution une fois les commandes exactes (`composer lint`, etc.) définies dans `composer.json`.
- [ ] Ajouter section **Administration du contenu** — rédigée en tout dernier, une fois tous les écrans d'options/meta réellement en place, pour documenter les emplacements exacts.

### 5.2 `.gitignore` — validé tel quel (décision #11)

```gitignore
# Dépendances
/vendor/
/node_modules/

# Build
/build/
/dist/

# Environnement / secrets
.env
.env.*
wp-config.php

# Système / éditeurs
.DS_Store
Thumbs.db
.vscode/
.idea/

# Logs
*.log
```

### 5.3 GitHub Actions — validé (décision #12), déploiement résolu (décision #1)

**`.github/workflows/lint.yml`** :

```yaml
name: Lint
on:
  pull_request:
    branches: [staging, main]

jobs:
  phpcs:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
      - uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'
          coverage: none
      - run: composer install --no-progress --prefer-dist
      - run: composer lint
```

**`deploy-staging.yml`** : **non nécessaire** — le déploiement natif WordPress.com sera repointé sur `staging` (décision #1), aucun workflow de déploiement côté dépôt.

### 5.4 Stratégie de branches et protections

- [ ] Créer la branche `staging` à partir de `main` (poussée sur `origin`).
- [ ] Repointer le déploiement natif WordPress.com de `main` vers `staging` (geste manuel dashboard WordPress.com, hors dépôt, à faire de votre côté).
- [x] Protection de branche GitHub sur `main` et `staging` : **exécutée par moi via l'API GitHub** (décision #13) — PR obligatoire, check `lint` obligatoire, pas de push direct. Le réglage exact sera confirmé avant application au moment de l'exécution.

---

## 6. Séquencement — deux branches (décision #14)

### Branche A — `refactor/administrabilite-20260708`

Créée depuis le tag `build-1-preprod-20260708` (ou le commit `5b224ac`).

| # | Commit | Contenu | Risque visuel |
|---|---|---|---|
| 1 | `.gitignore` | Ajout (§5.2) | Aucun |
| 2 | README.md | Corrections + section Stratégie de branches (§5.1) | Aucun |
| 3 | Composer + WPCS | `composer.json`, `composer.lock`, `phpcs.xml` — WordPress-Core (§4) | Aucun (dev-only) |
| 4 | `phpcbf` — auto-fix formatage | Passage automatique (§3) | Aucun, **diff à relire** |
| 5 | WPCS — corrections manuelles | Docblocks, retrait `add_theme_support('woocommerce')` (§3) | Aucun |
| 6 | Extraction icônes SVG | `template-parts/icons/{chevron,play-button,quote-mark}.php` + 5 fichiers appelants (§2) | Aucun |
| 7 | Extraction `closing-cta.php` | Nouveau composant + `qui-sommes-nous.php`/`rejoignez-nous.php` (§2) | Faible — **à valider visuellement** |
| 8 | Fusion JS carrousel | `carousel.js` générique, suppression des 2 fichiers existants, mise à jour markup + `inc/enqueue.php` (§2) | Faible — **à tester manuellement** (flèches, desktop/mobile) |
| 9 | `.github/workflows/lint.yml` | Nouveau workflow (§5.3) | Aucun |
| 10 | Options "Réglages → Liens de l'association" | `register_setting` + écran ; valeurs par défaut = valeurs actuelles | Faible — **à valider** |
| 11 | Options "Réglages → Association" | `register_setting` + écran ; `mentions-legales.php` lit les champs | Aucun tant que vide — **à valider le texte de repli** |
| 12 | Meta de page — "La Maladie" | 3 stats, valeurs par défaut = actuelles | Faible — **à valider** |
| 13 | Meta de page — "Qui sommes-nous" | Hero/mission/texte fondateur | Faible — **à valider** |
| 14 | Meta de page — "Rejoignez-nous" | Hero/intro | Faible — **à valider** |
| 15 | Meta de page — "Accueil" | Manifeste + stats accueil | Faible — **à valider** |
| 16 | QA visuelle branche A | Revue complète des pages publiques hors membres/timeline | — (validation) |
| 17 | README — section Développement local | Une fois (3) stabilisé | Aucun |

### Branche B — `feature/blocs-timeline-membres`

Créée **depuis `refactor/administrabilite-20260708` une fois la branche A stabilisée et mergée dans `staging`** (pas depuis le tag directement, pour bénéficier des meta de page déjà en place et du nettoyage WPCS).

| # | Commit | Contenu | Risque visuel |
|---|---|---|---|
| 18 | Toolchain `@wordpress/scripts` | `package.json`, config de build (§4, item 3) | Aucun (dev-only) |
| 19 | Bloc Gutenberg "Membre" | `block.json` + `edit.js` + `render.php`, migration des 8 fiches actuelles (bureau, équipe, fondatrices) en blocs réels dans "Qui sommes-nous" | Moyen — **à valider visuellement en détail** |
| 20 | Bloc Gutenberg "Frise" + "Jalon" | Conteneur + `InnerBlocks` répétables, migration des 4 jalons actuels | Moyen — **à valider visuellement** |
| 21 | QA visuelle branche B | Revue de "Qui sommes-nous" (membres + timeline) | — (validation) |
| 22 | README — section Administration du contenu | Rédaction finale, une fois tous les écrans réellement en place | Aucun |

### Hors branches — actions GitHub/WordPress.com directes

| # | Action | Où | Risque |
|---|---|---|---|
| 23 | Créer `staging` depuis `main` | git, depuis `main` | Aucun |
| 24 | Repointer le déploiement natif WordPress.com sur `staging` | Dashboard WordPress.com — **de votre côté** | Aucun (config, pas de code) |
| 25 | Protection de branche `main` + `staging` | API GitHub — **exécutée par moi**, réglage confirmé avant application | Aucun (config, pas de code) |

Ordre proposé : 23 → (branche A, items 1-17) → merge branche A dans `staging` → 24 → 25 → (branche B, items 18-22) → merge branche B dans `staging`.

---

## Prochaine étape

Toutes les décisions de cadrage sont prises. Il reste, avant toute exécution :
1. Confirmer que le tag `build-1-preprod-20260708` est accessible (ou utiliser `5b224ac`) au moment de créer la branche A.
2. Me donner le feu vert explicite pour démarrer l'exécution de la branche A (item 1 du séquencement), puisque jusqu'ici tout ce travail est resté au stade planification.
