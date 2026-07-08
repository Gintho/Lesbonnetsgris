# Plan de refonte — administrabilité, factorisation, WPCS, dépendances, conformité dépôt

Basé sur `docs/audit-technique-20260708.md`. **Aucun fichier du thème n'a été modifié pour produire ce plan.** Aucune branche de travail n'a été créée. Rien de ce qui suit n'est exécuté — c'est une proposition à valider point par point.

Convention de cases à cocher dans tout le document : `- [ ]` = en attente de votre validation, à cocher item par item avant toute exécution.

---

## 0. Hypothèses à valider avant tout

- [ ] **Mécanisme de déploiement final vers WordPress.com non confirmé.** Le README documente le déploiement natif "GitHub Deployments" de WordPress.com, actuellement branché sur `main`. Je pose l'hypothèse de travail suivante, **à valider explicitement** : ce même mécanisme natif sera re-pointé (via le dashboard WordPress.com, geste manuel hors dépôt) sur la future branche `staging` une fois celle-ci créée, sans qu'un déploiement custom (Action GitHub avec SFTP/rsync) soit nécessaire. Si ce n'est pas possible côté WordPress.com (repointer un déploiement natif sur une branche autre que celle initialement connectée), le plan de la section 5 devra être revu vers un déploiement custom.
- [ ] **Existence d'un objet Page WordPress pour l'accueil.** Je n'ai pas pu vérifier si une Page réelle est assignée comme "page d'accueil statique" (Réglages → Lecture) derrière `front-page.php`, ou si ce template s'affiche indépendamment de tout objet Page. Cela conditionne le choix entre "meta de page" et "page d'options" pour le contenu de l'accueil (section 1.1). À confirmer avant d'exécuter les items concernés.
- [ ] **Le tag `build-1-preprod-20260708`** n'existe que localement dans la session d'audit précédente (le push a échoué, 403 sur les refs de tags). La branche de travail unique de ce plan (section 6) doit en partir — si le tag n'est pas accessible au moment de l'exécution, partir directement du commit `5b224ac` (strictement équivalent).

---

## 1. Contenu codé en dur → proposition d'administrabilité

### 1.0 Ce qui ne doit **surtout pas** devenir modifiable

- [ ] **La baseline de marque** ("Rendre visible l'invisible" / "Rendre visible, l'invisible" selon les usages) reste en dur dans le code (constante PHP ou chaîne directe), **jamais** exposée dans un champ éditable en clair. Une baseline de marque validée ne doit pas pouvoir être réécrite en un clic par un·e éditeur·rice non technique.
- [ ] **Le système de tokens** (`assets/tokens/*.css` : couleurs, typographie, spacing, radius, shadow) reste exclusivement piloté par du code, revu en PR. Aucun sélecteur de couleur Customizer, aucun réglage `theme.json` connecté à ces valeurs. C'est la garantie que le design system reste cohérent quels que soient les futurs éditeurs de contenu.
- [ ] **Les fichiers de marque** (`assets/logo/*.png`) restent des assets de thème fixes, jamais remplaçables via un champ "uploadez votre logo" dans la médiathèque — un changement de logo est un changement de marque, pas un changement de contenu.
- [ ] **La structure des sections de chaque page** (quelles sections existent, dans quel ordre) reste pilotée par les `page-templates/*.php`, **pas** par un éditeur de blocs librement réorganisable. Seul le *contenu* de chaque section (texte, chiffres, liens) devient administrable — la mise en page reste verrouillée. C'est un choix structurant : il exclut l'usage du full site editing / de blocs Gutenberg librement positionnables sur ces pages, au profit de champs structurés qui ne peuvent pas casser la mise en page.
- [ ] **Le libellé exact des statistiques médicales/impact** (ex. "Cause de mortalité chez les moins de 25 ans") : je propose de rendre la **valeur numérique** éditable mais de garder le **libellé** verrouillé par défaut (ou a minima signalé "à ne modifier qu'après validation du contenu médical/associatif"), pour éviter qu'une reformulation imprécise change le sens d'une statistique de santé publique.

### 1.1 Contenu par mécanisme proposé

| Contenu | Fichier(s) source actuel | Mécanisme proposé | Justification |
|---|---|---|---|
| Manifeste accueil (eyebrow, titre, 3 lignes + surlignage, CTA) | `front-page.php` L15-67 | **Meta de page** (`register_meta` + panneau meta box dans l'éditeur) sur la Page "Accueil" **si elle existe** (hypothèse §0) ; sinon **page d'options** dédiée "Réglages → Accueil" via `register_setting` | Contenu unique, propre à une seule page, modifié rarement (campagne, refonte de discours) — un panneau dédié dans l'écran d'édition de la page est plus intuitif pour un profil non technique qu'une page de réglages générique, mais nécessite un objet Page réel |
| Stats accueil (6 000 / 4 000 / 1ère / 12 / 0) | `front-page.php` L48-68 | Idem manifeste : meta de page ou options "Accueil" | Chiffres actualisés occasionnellement (nouvelles données épidémiologiques/impact) — fréquence faible mais impact fort si périmé, doit rester facile à corriger sans déploiement |
| Stats La Maladie (1/2000, ~450, 9) | `page-templates/la-maladie.php` L48-68 | **Meta de page** sur la Page "La Maladie" (objet Page confirmé existant) | Idem, page cible sans ambiguïté |
| Texte fondateur, mission, timeline (4 jalons), portraits fondatrices | `page-templates/qui-sommes-nous.php` | Textes courts (mission, hero) → **meta de page** sur "Qui sommes-nous". Timeline et portraits → voir 1.2 (contenu répété) | Textes hero/mission : un seul jeu de valeurs, meta de page suffit. Timeline et portraits sont des **listes** d'items structurés, traités séparément |
| Hero + intro | `page-templates/rejoignez-nous.php` L13-18 | **Meta de page** sur "Rejoignez-nous" | Idem |
| Liens externes (boutique, don, Instagram, Facebook) | `template-parts/navigation/{navbar,footer}.php`, `front-page.php`, `rejoignez-nous.php` | **Page d'options** unique "Réglages → Liens de l'association" via `register_setting` (un seul groupe de settings, un seul écran) | Ces liens sont **réutilisés à plusieurs endroits** (jusqu'à 3× pour certains) : un réglage central évite exactement le risque relevé dans l'audit (mise à jour désynchronisée). C'est le cas d'usage type de `register_setting` : une valeur, plusieurs lectures |
| Identité légale (adresse, n° RNA, directeur de publication, email de contact) | `page-templates/mentions-legales.php` L25-28 | **Page d'options** "Réglages → Association" (identité légale) | Données organisationnelles transverses (pourraient aussi alimenter un futur schema.org `Organization` plus riche dans le footer) — pas propres à une seule page dans l'esprit, même si affichées sur une seule page aujourd'hui |
| Membres (bureau, équipe, portraits fondatrices) | `page-templates/qui-sommes-nous.php` (tableaux `$board`, `$team`, items du carrousel fondatrices) | **Custom Post Type** `bg_member` (`register_post_type`, sans UI publique, `show_in_rest => true`) + `register_meta` (rôle, bio, citation, tonalité visuelle, photo via featured image) ; les 3 blocs de la page interrogent ce CPT filtré par une taxonomie ou un champ meta "catégorie" (bureau / équipe / fondatrice) | C'est une **liste de fiches** au format identique et au volume variable dans le temps (départs/arrivées, vrais noms à venir en remplacement des placeholders) — le CPT est le mécanisme WordPress natif pour ça, bien plus adapté qu'un champ répétable maison. Effort plus élevé que les autres lignes, mais c'est l'endroit où l'admin apporte le plus de valeur réelle (l'équipe change, contrairement à la baseline) |
| Timeline "Notre histoire" (4 jalons : année, titre, description) | `page-templates/qui-sommes-nous.php` (bloc `timeline`) | **Custom Post Type** `bg_milestone`, ou — option plus proche de la cible "blocs Gutenberg sur-mesure" — un **bloc Gutenberg conteneur "Frise"** avec bloc enfant répétable "Jalon" (`InnerBlocks`), chaque instance exposant année/titre/description en attributs RichText | Les deux options sont valables ; je recommande le **CPT** en premier temps (plus simple à sécuriser et à faire évoluer sans étape de build JS), et je note le bloc Gutenberg comme évolution possible si l'équipe veut aller au bout de l'architecture "blocs sur-mesure" annoncée dans le brief — **à trancher avec vous**, ça change l'effort d'un facteur ~3 |
| Newsletter (placeholder email, libellé bouton) | `template-parts/marketing/newsletter.php` | **Non prioritaire** — pas de mécanisme proposé | Micro-copie d'un formulaire aujourd'hui non fonctionnel (audit Étape 5) ; à revoir seulement une fois MailPoet réellement branché, en même temps que le nonce (section 3 sécurité, hors périmètre "administrabilité") |

Chaque ligne du tableau ci-dessus fera l'objet d'un item séquencé séparé (section 6) — vous pourrez valider/refuser chaque contenu indépendamment.

---

## 2. Composants réutilisables

| Duplication (réf. audit Étape 3) | Composant proposé | Emplacement | Signature | Fichiers appelants après refactor |
|---|---|---|---|---|
| Bloc "closing CTA" (logo + H2 + paragraphe + bouton) | `closing-cta.php` | `template-parts/marketing/closing-cta.php` | `array( 'logo' (défaut logo dupli-orange-blue existant), 'logo_alt', 'title', 'description', 'cta_label', 'cta_url', 'tone' )` | `page-templates/qui-sommes-nous.php`, `page-templates/rejoignez-nous.php` |
| Icône flèche prev/next (carrousel) | `chevron.php` | `template-parts/icons/chevron.php` (nouveau dossier `icons/`) | `array( 'direction' => 'prev'\|'next' )` | `template-parts/home/news-teaser.php`, `template-parts/marketing/founder-spotlight.php` |
| Icône "lecture" (play button) | `play-button.php` | `template-parts/icons/play-button.php` | aucun paramètre (taille fixe actuelle) | `template-parts/marketing/reel-testimonial.php`, `template-parts/marketing/story-spotlight.php` |
| Icône "marque de citation" | `quote-mark.php` | `template-parts/icons/quote-mark.php` | aucun paramètre | `template-parts/cards/testimonial-card.php`, `template-parts/marketing/reel-testimonial.php` |
| *(bonus, hors périmètre strict de l'audit mais même nature de problème)* `assets/js/news-carousel.js` et `assets/js/founder-carousel.js` sont deux implémentations quasi identiques du même contrôleur de carrousel à flèches | `carousel.js` générique piloté par attributs `data-*` (ex. `data-carousel`, `data-carousel-track`, `data-carousel-item`) | `assets/js/carousel.js`, suppression des deux fichiers existants | — | Tous les gabarits utilisant `.ds-news-carousel` ou `.ds-founder-carousel` (mise à jour des classes/attributs dans les deux template-parts concernés) |

Note : les composants `photo-band-cta.php`, `photo-float-card.php`, `stats.php`, `horizontal-push.php`, `quote-band.php`, `origin-story.php`, `founder-spotlight.php`, `story-spotlight.php` sont **déjà** des composants partagés sans duplication — rien à faire dessus.

- [ ] Valider la liste ci-dessus (5 extractions) avant exécution.
- [ ] Statuer sur la fusion `news-carousel.js`/`founder-carousel.js` (item bonus, plus risqué fonctionnellement que les extractions PHP pures) : inclure ou reporter ?

---

## 3. Plan de nettoyage WPCS

`phpcs` n'étant pas installé (audit Étape 4), je ne peux pas produire un décompte réel de violations à ce stade — ce tableau est une **estimation de revue manuelle**, à confirmer par un run réel une fois WPCS installé (section 4, premier item). Je m'appuie sur la connaissance du code déjà écrit dans cette session (conventions déjà largement respectées, car écrit en visant un style proche de WPCS dès le départ).

| Catégorie de violation | Fichiers concernés (estimation) | Auto-corrigible (`phpcbf`) | Intervention manuelle |
|---|---|---|---|
| Espacement dans les structures de contrôle (`if(`/`if (`), alignement de tableaux | Probablement mineur/rare — le style `if ( ... )` avec espaces a été suivi systématiquement tout le long du projet | Oui | — |
| Docblocks de fichier manquants (`@package`) | Probablement **tous** les fichiers PHP (aucun docblock de fichier n'a été ajouté systématiquement) | Non | Oui — ajout manuel, contenu à rédiger (pas juste un template vide) |
| Docblocks de fonction manquants sur les fonctions nommées (`bonnets_gris_setup`, `bonnets_gris_scripts`, etc.) | `inc/setup.php`, `inc/enqueue.php`, `template-parts/navigation/footer.php` (fonction `bonnets_gris_footer_link_attributes`) | Non | Oui |
| Préfixage des fonctions/hooks (`bonnets_gris_*`) | Déjà conforme partout où vérifié — à confirmer par le run réel | — | Vérification uniquement |
| `array()` vs `[]` | Le projet utilise `array()` de façon cohérente — conforme à la convention WPCS classique | — | Vérification uniquement |
| Yoda conditions (`'x' === $var` plutôt que `$var === 'x'`) | Suivi dans le code récent (ex. `'all' === $filter_slug`), non vérifié systématiquement sur tout l'historique | Oui (partiellement, phpcbf gère une partie des cas) | Vérification manuelle des cas non auto-fixables |
| Espacement/formatage général (indentation, fins de ligne) | Tout le thème (vérification systématique nécessaire) | Oui | — |
| Sécurité : échappement de sortie | Néant trouvé en revue manuelle (audit Étape 5) | — | Vérification uniquement par le run réel |
| `add_theme_support( 'woocommerce' )` vestigial | `inc/setup.php` L9 | Non (suppression de code, pas une règle de style) | Oui — à retirer, ou à confirmer comme volontaire avant suppression |

- [ ] Installer WPCS/PHPCS (section 4) puis lancer un run réel pour remplacer cette estimation par des chiffres exacts, avant toute correction.
- [ ] Valider le retrait de `add_theme_support( 'woocommerce' )` (ou confirmer qu'il doit rester pour une raison non documentée).

---

## 4. Plan de mise à jour des dépendances

Il n'existe **aucune dépendance existante** à mettre à jour (ni `composer.json`, ni `package.json` — audit Étape 7). Le plan ci-dessous couvre donc l'**introduction initiale**, classée du moins risqué au plus risqué :

1. **[Moins risqué] `composer.json` avec `wp-coding-standards/wpcs` + `squizlabs/php_codesniffer` en `require-dev`.** Dépendance de développement uniquement, ne s'exécute jamais en production, aucun risque runtime. Nécessite PHP local avec Composer disponible pour l'exécuter (à confirmer sur votre poste/CI).
2. **[Risque modéré] `phpcs.xml` (ruleset `WordPress-Extra` ou `WordPress-Core` selon le niveau de rigueur souhaité, `text_domain` réglé sur `bonnets-gris`).** Pas une dépendance à proprement parler, mais conditionne le comportement de (1) — à valider ensemble (choix du ruleset a un impact direct sur le volume de violations remontées).
3. **[Risque plus élevé, optionnel] Toolchain `@wordpress/scripts` (npm) — uniquement si la voie "blocs Gutenberg sur-mesure avec build JS" est retenue** pour la timeline/les membres (section 1.1, item timeline) plutôt que des CPT. Introduit un `package.json`, un `node_modules/`, une étape de build avant déploiement — c'est un changement d'infrastructure plus lourd que tout le reste de ce plan, à ne déclencher qu'après une décision explicite sur l'architecture cible (voir hypothèse non tranchée en 1.1).

Aucune mise à jour majeure "cassante" à signaler puisqu'il n'y a rien à mettre à jour — le risque est entièrement dans le point 3 (introduction, pas mise à jour), qui reste optionnel et conditionné à votre arbitrage.

- [ ] Valider l'introduction de WPCS/PHPCS via Composer (items 1-2).
- [ ] Trancher : CPT (pas de nouvelle dépendance) vs blocs Gutenberg custom (introduit npm/@wordpress/scripts) pour la timeline et les membres.

---

## 5. Plan de conformité du dépôt

### 5.1 README.md — contenu proposé (corrections + ajouts)

- [ ] Corriger la mention obsolète : le thème actif est **Bonnets Gris**, pas Charity Grove (confirmé par le journal d'activité WordPress au 2026-07-08).
- [ ] Résoudre la note "lien Google Drive = doublon du lien Notion" (soit fournir le vrai lien, soit retirer la ligne).
- [ ] Ajouter une section **Stratégie de branches** une fois `staging` créée : rôle de `main` (release/production future), `staging` (préproduction, cible du déploiement WordPress.com), branches `feature/*` ou `refactor/*` courtes fusionnées dans `staging` via PR.
- [ ] Ajouter une section **Développement local** : installation Composer/WPCS, commande de lint (`composer lint` ou équivalent), commande d'auto-fix (`composer lint:fix`).
- [ ] Ajouter une section **Administration du contenu** une fois les mécanismes de la section 1 en place : où trouver "Réglages → Accueil / Association / Liens de l'association" dans wp-admin, quelles pages ont des champs meta dans leur écran d'édition.

### 5.2 `.gitignore` — contenu proposé

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

- [ ] Valider ce contenu (`composer.lock` est délibérément **non ignoré** : il doit être commité pour la reproductibilité des installations WPCS — à confirmer que c'est bien l'intention).

### 5.3 Workflow GitHub Actions — projet

**`.github/workflows/lint.yml`** (déclenché sur chaque Pull Request) :

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
      - run: composer lint   # exécute phpcs sur le thème
```

**`.github/workflows/deploy-staging.yml`** — **conditionné à l'hypothèse non validée en §0** :

- Si WordPress.com peut repointer son "GitHub Deployments" natif sur `staging` : **aucun workflow de déploiement à écrire**, c'est un réglage dans le dashboard WordPress.com (Hébergement → Déploiements), rien côté dépôt.
- Si ce n'est pas possible : il faudra un déploiement custom (ex. action `SamKirkland/FTP-Deploy-Action` ou équivalent SFTP), déclenché sur push vers `staging`, avec les identifiants WordPress.com en secrets GitHub — **je ne propose pas ce workflow tant que l'hypothèse n'est pas tranchée**, pour ne pas construire un mécanisme qui ferait doublon ou entrerait en conflit avec le déploiement natif existant.

- [ ] Valider le contenu du `lint.yml` proposé (ruleset, version PHP `8.2` à confirmer selon la version WordPress.com cible).
- [ ] Trancher l'hypothèse de déploiement (§0) avant que je propose (ou non) un `deploy-staging.yml`.

### 5.4 Stratégie de branches et protections

- [ ] Créer la branche `staging` à partir de `main` (poussée sur `origin`).
- [ ] Repointer le déploiement natif WordPress.com "GitHub Deployments" de `main` vers `staging` (geste manuel dans le dashboard WordPress.com — je ne peux pas le faire à votre place).
- [ ] Activer la protection de branche GitHub sur `main` **et** `staging` : PR obligatoire, check `lint` obligatoire avant fusion, pas de push direct. (Faisable via l'API GitHub depuis cette session si vous le souhaitez, ou par vos soins dans les réglages du dépôt — à votre préférence.)

---

## 6. Séquencement — commits atomiques

**Une seule branche de travail pour l'ensemble** : `refactor/administrabilite-20260708`, créée depuis le tag `build-1-preprod-20260708` (ou depuis le commit `5b224ac` si le tag n'est pas disponible au moment de l'exécution — voir §0). Cette branche n'est **pas créée à cette étape** — elle ne le sera qu'après votre validation, au démarrage de l'exécution.

| # | Commit | Contenu | Risque visuel | Branche |
|---|---|---|---|---|
| 1 | `.gitignore` | Ajout du fichier (section 5.2) | Aucun | `refactor/administrabilite-20260708` |
| 2 | README.md | Corrections + nouvelles sections (section 5.1, sauf "Administration du contenu" qui viendra après coup) | Aucun | idem |
| 3 | Composer + WPCS | `composer.json`, `composer.lock`, `phpcs.xml` (section 4.1-4.2) | Aucun (dev-only) | idem |
| 4 | `phpcbf` — auto-fix formatage | Passage automatique sur tout le thème (section 3, colonne "auto-corrigible") | Aucun, **diff à relire avant commit** pour confirmer qu'aucun changement fonctionnel ne s'est glissé | idem |
| 5 | WPCS — corrections manuelles | Docblocks, retrait `add_theme_support('woocommerce')`, cas Yoda restants (section 3, colonne "manuel") | Aucun (code non visuel) | idem |
| 6 | Extraction icônes SVG | `template-parts/icons/{chevron,play-button,quote-mark}.php` + mise à jour des 5 fichiers appelants (section 2) | Aucun (rendu HTML identique) | idem |
| 7 | Extraction `closing-cta.php` | Nouveau composant + mise à jour `qui-sommes-nous.php`/`rejoignez-nous.php` (section 2) | Faible — **à valider visuellement** (capture d'écran avant/après sur les deux pages) | idem |
| 8 | *(optionnel, si validé en section 2)* Fusion des deux JS de carrousel en `carousel.js` | Suppression de `news-carousel.js`/`founder-carousel.js`, nouveau `carousel.js`, mise à jour markup + `inc/enqueue.php` | Faible/fonctionnel — **à valider manuellement** (tester les flèches sur les deux carrousels, desktop et mobile) | idem |
| 9 | `.github/workflows/lint.yml` | Nouveau workflow (section 5.3) | Aucun | idem |
| 10 | Options "Réglages → Liens de l'association" | `register_setting` + écran d'options + remplacement des URLs codées en dur dans navbar/footer/rejoignez-nous/front-page par des lectures de l'option (valeurs par défaut = valeurs actuelles, donc rendu identique au premier déploiement) | Faible — **à valider** (vérifier que chaque lien pointe toujours au bon endroit après bascule) | idem |
| 11 | Options "Réglages → Association" | `register_setting` + écran d'options + `mentions-legales.php` lit les champs (repli identique à l'affichage `[à compléter]` actuel si le champ est vide) | Aucun tant que les champs restent vides — **à valider** que le texte de repli est identique à l'existant | idem |
| 12 | Meta de page — "La Maladie" | `register_meta` + meta box pour les 3 stats ; valeurs par défaut pré-remplies = valeurs actuelles | Faible — **à valider** (comparaison avant/après) | idem |
| 13 | Meta de page — "Qui sommes-nous" | `register_meta` + meta box pour hero/mission/texte fondateur ; valeurs par défaut pré-remplies | Faible — **à valider** | idem |
| 14 | Meta de page — "Rejoignez-nous" | `register_meta` + meta box pour hero/intro ; valeurs par défaut pré-remplies | Faible — **à valider** | idem |
| 15 | Accueil — manifeste + stats | Meta de page **ou** page d'options "Réglages → Accueil" selon l'arbitrage de l'hypothèse §0 | Faible — **à valider** | idem |
| 16 | CPT `bg_member` | `register_post_type` + `register_meta`, migration des 8 fiches actuelles (bureau, équipe, fondatrices) en entrées réelles, `qui-sommes-nous.php` interroge le CPT au lieu des tableaux PHP | Moyen — **à valider visuellement en détail** (c'est le changement le plus structurant du plan) | idem |
| 17 | Timeline — CPT `bg_milestone` ou bloc Gutenberg | Selon arbitrage section 1.1/4 ; migration des 4 jalons actuels | Moyen — **à valider visuellement** | idem |
| 18 | QA visuelle complète | Revue de toutes les pages publiques (Accueil, Qui sommes-nous, La Maladie, Rejoignez-nous, Actualités, Mentions légales) après l'ensemble des items ci-dessus | — (c'est l'étape de validation elle-même) | idem |
| 19 | Création `staging` + protections de branche | Section 5.4 | Aucun (git/GitHub, pas du code) | depuis `main`, pas depuis la branche de refactor |

Notes de séquencement :
- Les items 1-9 sont indépendants du reste et peuvent être validés/exécutés comme un premier lot sans attendre les arbitrages en suspens (§0).
- Les items 10-17 dépendent chacun d'un arbitrage spécifique (voir cases à cocher des sections 1, 2 et 4) — je ne les exécuterai que pour les contenus que vous aurez validés, dans l'ordre proposé mais pas nécessairement tous.
- L'item 19 se fait **après** merge de la branche de refactor (ou en parallèle, elle ne dépend de rien d'autre) — mais **hors** de la branche `refactor/administrabilite-20260708` elle-même.

---

## Items en attente de votre validation

- [ ] §0 — Hypothèse déploiement WordPress.com (natif repointé sur `staging` vs déploiement custom)
- [ ] §0 — Existence d'un objet Page "Accueil" (conditionne meta de page vs options pour le contenu accueil)
- [ ] §1.0 — Confirmation de la liste des éléments à **verrouiller** (baseline, tokens, logos, structure de page, libellés de stats)
- [ ] §1.1 — Mécanisme retenu par contenu (tableau complet — chaque ligne est validable indépendamment)
- [ ] §1.1 — Timeline : CPT `bg_milestone` vs bloc Gutenberg custom avec `InnerBlocks`
- [ ] §2 — Liste des 5 extractions de composants (closing-cta + 3 icônes + JS carrousel)
- [ ] §3 — Ruleset WPCS à utiliser (`WordPress-Core` vs `WordPress-Extra`)
- [ ] §3 — Retrait de `add_theme_support( 'woocommerce' )`
- [ ] §4 — Introduction Composer/WPCS
- [ ] §4 — CPT vs blocs Gutenberg custom (@wordpress/scripts) pour timeline/membres
- [ ] §5.1 — Contenu README proposé
- [ ] §5.2 — Contenu `.gitignore` proposé (notamment : `composer.lock` commité, pas ignoré)
- [ ] §5.3 — Contenu `lint.yml` (version PHP, ruleset)
- [ ] §5.3 — `deploy-staging.yml` : à écrire seulement une fois l'hypothèse de déploiement tranchée
- [ ] §5.4 — Création `staging` + protections de branche (et qui l'exécute : moi via l'API GitHub, ou vous)
- [ ] §6 — Séquencement complet (19 items) et nom de la branche de travail unique `refactor/administrabilite-20260708`
