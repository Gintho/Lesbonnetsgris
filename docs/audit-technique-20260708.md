# Audit technique — Les Bonnets Gris — 2026-07-08

Audit et sauvegarde uniquement. **Aucun fichier du thème n'a été modifié pendant cette étape.**

## Résumé (10 lignes max, par priorité)

1. **BLOQUANT** — La stack réelle du dépôt ne correspond pas à la stack décrite dans le brief : pas de GeneratePress, pas de Composer, pas de WPCS configuré, pas de blocs Gutenberg custom. C'est un thème PHP classique 100 % fait main (`get_template_part()`, pas de `theme.json`, pas de `block.json`). À trancher avant de poursuivre.
2. **BLOQUANT** — Aucune branche `staging` n'existe sur `origin` ; la stratégie main/staging/feature décrite n'est pas en place (seulement `main` + branches de sessions Claude).
3. **BLOQUANT** — `main` n'a **aucune protection GitHub** (`protected: false`) alors qu'elle se déploie automatiquement sur la préprod à chaque push.
4. **BLOQUANT** — Le tag de sauvegarde `build-1-preprod-20260708` est créé **localement** mais n'a pas pu être poussé sur `origin` (403 persistant du proxy git de session, détail plus bas) — la sauvegarde distante n'existe pas encore.
5. **IMPORTANT** — Aucun `.gitignore`, aucun `phpcs.xml`/WPCS, aucun `composer.json`/`package.json`, aucun workflow GitHub Actions : zéro filet de sécurité avant déploiement auto.
6. **IMPORTANT** — 100 % du contenu éditorial (textes, statistiques, liens externes) est codé en dur dans les template-parts PHP, sans point d'administration (pas d'ACF, pas de Customizer) — modifier un chiffre = un déploiement de code.
7. **IMPORTANT** — Formulaire newsletter sans nonce, sans traitement de soumission câblé (MailPoet installé mais non branché).
8. **IMPORTANT** — README.md contient une info de statut obsolète (indique Charity Grove comme thème actif ; le journal WordPress confirme Bonnets Gris réactivé depuis).
9. **CONFORT** — Aucune clé API/secret en dur trouvée ; i18n déjà exemplaire (100 % des chaînes via `__()`/`_e()`, text domain unique) ; zéro style inline ; zéro couleur hex hors tokens.
10. **CONFORT** — Deux blocs "closing CTA" quasi identiques (qui-sommes-nous / rejoignez-nous) et 3 SVG inline dupliqués à l'identique entre fichiers — factorisables sans urgence.

---

## Étape 0 — État des lieux du dépôt

### 0.1 Remote, branches, commits, statut

```
$ git remote -v
origin  http://local_proxy@127.0.0.1:41729/git/Gintho/Lesbonnetsgris (fetch)
origin  http://local_proxy@127.0.0.1:41729/git/Gintho/Lesbonnetsgris (push)
```

> Le remote `origin` pointe vers un proxy git local de session (`127.0.0.1:41729`), pas directement `github.com`. Fonctionnellement il relaie bien vers `Gintho/Lesbonnetsgris` (confirmé via l'API GitHub MCP), mais toute contrainte de ce proxy (voir 1.3) s'applique en plus de celles de GitHub lui-même.

**Branches locales** : `main`, `claude/youthful-davinci-vnax0f` (branche de travail de cette session).

**Branches sur `origin`** (10 au total, après `git fetch --prune`) :

| Branche | Protégée (GitHub) | Nature |
|---|---|---|
| `main` | **Non** | Branche de production du dépôt, déployée automatiquement sur la préprod WordPress.com à chaque push |
| `claude/youthful-davinci-vnax0f` | Non | Branche de travail de la session en cours, identique à `main` (0 commit d'écart) |
| `Stratégie` | Non | Branche ancienne/orpheline, divergée très tôt (commit `840f4c4`/`67488bd`), ne contient pas l'historique actuel du site |
| `claude/bonnets-gris-design-system-2lva0m` | Non | Idem — branche orpheline d'une session antérieure sur le design system |
| `claude/bonnets-gris-tech-stack-rd5g9w` | Non | Idem — c'est probablement **l'origine de la description de stack "GeneratePress/Composer/WPCS"** du brief : cette branche existe mais n'a jamais été fusionnée dans `main` |
| `claude/connector-reconnection-lj80ex` | Non | Idem — ébauche de `front-page.php` "One Page", orpheline |
| `claude/friendly-noether-u64gt3` | Non | Idem — implémentation homepage à partir d'un handoff design, orpheline |

**Aucune branche `staging` n'existe**, ni localement ni sur `origin`.

**10 derniers commits sur `main`** (identiques à la branche de travail) :

```
5b224ac Replace Faire un don support-card with the photo-band-cta pattern
cb00651 Match Rejoignez-nous hero to the Qui sommes-nous/La Maladie header structure
022c436 Match La Maladie hero to the Qui sommes-nous header structure
5b4cb8d Rework La Maladie page above L'urgence d'agir, inspired by reference site
fbdbe1f Add category filter and press-kit CTA to Actualités page
789c9b7 Switch Notre histoire text card background to white
19d28de Restyle Notre histoire: orange pop kicker/dates, narrative card beside timeline
5d02374 Add orange pop background behind the Qui sommes-nous hero
dd5dc85 Add founder carousel, founding timeline, and partners to Qui sommes-nous
f3b8f41 Fix mission-section alignment and move founding text into it
```

**`git status`** : working tree propre, aucun fichier non tracké, aucune modification en attente.

### 0.2 Divergence avec `origin/main`

```
$ git rev-list --left-right --count claude/youthful-davinci-vnax0f...origin/main
0   0
```

Aucune divergence : la branche de travail est strictement identique à `origin/main`. Pas de commit non poussé, pas de fichier non tracké.

### 0.3 Correspondance avec l'environnement de préproduction

**Je n'ai pas d'accès SFTP/SSH au site WordPress.com.** Les seuls outils disponibles dans cette session sont les endpoints REST WordPress.com (MCP) — gestion de contenu, réglages, journal d'activité — qui ne permettent pas de comparer les fichiers déployés octet à octet avec le commit HEAD du dépôt. Je ne peux donc **pas confirmer formellement** que le code qui tourne en préprod correspond au dernier commit.

Ce que j'ai pu vérifier indirectement via le journal d'activité WordPress (`activity.get`, groupe `theme`) :

- Le thème actif sur `staging-e7b0-lesbonnetsgris.wpcomstaging.com` est bien **"Bonnets Gris" (slug `bonnets-gris`)** suite à un `theme__switched` daté du 2026-07-08 (le plus récent événement de changement de thème), depuis "Charity Grove".
  → **Le README.md du dépôt est obsolète sur ce point** : il indique encore "le thème actif sur ce site est actuellement Charity Grove", ce qui n'est plus vrai.
- Le journal d'activité rapporte la version **0.1.1** pour ce thème au moment du switch, alors que `style.css` sur `main` déclare actuellement **0.1.3**.
  → Signal **faible**, pas une preuve de désynchronisation : le numéro de version dans `style.css` n'est pas incrémenté systématiquement à chaque commit dans ce projet (constaté indépendamment), donc cet écart ne prouve pas que les fichiers déployés sont en retard sur le dépôt — il faudrait une comparaison de fichiers réelle (SFTP) pour trancher.

**Recommandation** : demander l'accès SFTP/SSH WordPress.com pour cette vérification, ou déclencher un déploiement manuel/forcé et comparer un hash de fichier connu (ex. `style.css`) avant/après.

---

## Étape 1 — Sauvegarde

- Tag annoté créé localement : **`build-1-preprod-20260708`**, pointant sur `5b224ac` (HEAD de `main` au moment de l'audit).
- Message du tag : *"Sauvegarde avant audit technique du 2026-07-08 — état de main à ce commit."*
- **Push vers `origin` : ÉCHEC**, après 6 tentatives (avec backoff exponentiel) via deux formes de commande (`git push origin refs/tags/...` et `git push origin --tags`) :

  ```
  error: RPC failed; HTTP 403 curl 22 The requested URL returned error: 403
  send-pack: unexpected disconnect while reading sideband packet
  fatal: the remote end hung up unexpectedly
  ```

  Les pushs de branches ont fonctionné sans problème tout au long de cette session (dizaines de pushs réussis) — seul le push de **tag** échoue systématiquement avec un 403, ce qui pointe vers une restriction de politique du proxy git de session sur les refs `refs/tags/*` plutôt qu'un problème réseau transitoire. Conformément à la consigne de ne pas contourner un refus de politique, je n'ai pas insisté au-delà de ces tentatives.

**Pour restaurer l'état actuel en cas de problème**, deux options :

```bash
# Localement dans cette session (le tag y existe) :
git checkout build-1-preprod-20260708

# Sinon, le commit exact est identifiable même sans le tag :
git checkout 5b224ac
```

**Action requise de votre côté** : pousser ce tag depuis un accès qui n'est pas soumis à cette restriction (ex. `git push` depuis votre machine avec vos propres identifiants), ou m'indiquer si une autorisation particulière peut être accordée à cette session pour les push de tags.

---

## Étape 2 — Inventaire du codé en dur

Le thème n'a **aucune couche de contenu administrable** (pas d'ACF, pas de champs personnalisés, pas de Customizer, pas d'options de thème) : chaque page (`page-templates/*.php`) appelle des `template-parts` en leur passant du texte, des chiffres et des URLs directement en arguments PHP. C'est donc la quasi-totalité du contenu du site qui est "codé en dur" au sens strict — un tableau exhaustif ligne par ligne représenterait plusieurs centaines d'entrées. Le tableau ci-dessous donne des **exemples représentatifs par catégorie**, avec les occurrences les plus importantes (chiffres, liens externes, emails) recensées en totalité.

| Fichier | Ligne(s) | Élément codé en dur | Nature | Risque si non corrigé |
|---|---|---|---|---|
| `front-page.php` | 15–67 | Manifeste complet ("Les Bonnets Gris... épouses et sœurs de malades... Avec de l'énergie...") | Texte éditorial | Toute évolution du discours de marque nécessite un déploiement de code, pas une simple édition |
| `front-page.php` | 50, 54, 58, 62, 66 | Statistiques "6 000 / 4 000 / 1ère / 12 / 0" | Chiffres/statistiques | Chiffres médicaux/impact non actualisables sans déploiement ; risque de désinformation si périmés |
| `page-templates/la-maladie.php` | 57, 61, 65 | Statistiques "1/2000 / ~450 / 9" | Chiffres/statistiques | Idem — deux jeux de statistiques différents (home vs La Maladie) à maintenir en cohérence manuellement |
| `front-page.php` | 100 | `https://loirparis.fr/` (boutique) | Lien externe | Répété 3× dans le thème (voir aussi footer, navbar) — un changement d'URL boutique nécessite 3 correctifs synchronisés |
| `page-templates/rejoignez-nous.php` | 40 | `https://institutducerveau.org/faire-don-ponctuel` | Lien externe (don) | Répété 3× — même risque |
| `template-parts/navigation/footer.php` | 21, 26, 33, 38 | Liens don, boutique, Instagram, Facebook | Liens externes | Réseaux sociaux pointent vers les pages génériques `instagram.com`/`facebook.com` (pas de compte réel identifié) |
| `template-parts/navigation/navbar.php` | 28, 31 | Mêmes liens boutique/don dupliqués | Liens externes | Voir ci-dessus |
| `page-templates/mentions-legales.php` | 25–28 | `[adresse à compléter]`, `[à compléter]`, `[nom à compléter]`, `[adresse email à compléter]` | Coordonnées manquantes | Page légalement obligatoire actuellement incomplète — à ne pas publier telle quelle |
| `template-parts/marketing/newsletter.php` | 20 | `placeholder="vous@email.com"` | Placeholder de formulaire (pas une vraie donnée) | Aucun — mentionné pour mémoire, ce n'est pas une fuite de donnée |
| Nombreux fichiers (`inc/enqueue.php`, `template-parts/**`) | — | Chemins d'images via `get_theme_file_uri('assets/...')` | Chemins d'image | **Conforme à la convention du thème** (pas un problème en soi) mais signifie que changer une image = un déploiement, pas un upload dans la médiathèque |
| `inc/setup.php` | 9 | `add_theme_support( 'woocommerce' )` | Configuration vestigiale | Aucun template WooCommerce n'existe dans le thème et la boutique réelle est externe (loirparis.fr) — support déclaré sans usage, source de confusion |
| — | — | Aucun style inline (`style="..."`) | — | **Conforme** — non applicable, mentionné pour couvrir le point du brief |
| — | — | Aucune couleur hexadécimale hors de `assets/tokens/*.css` | — | **Conforme** — non applicable |

**Constat global** : les couleurs et le style sont, eux, correctement centralisés (`assets/tokens/*.css` + `assets/css/design-system.css`/`components.css`, consommés via variables CSS) — c'est le seul axe de "configuration" qui échappe au codage en dur généralisé constaté sur le texte/chiffres/liens.

---

## Étape 3 — Sections/blocs dupliqués entre templates

| Bloc | Fichiers concernés | Similarité | Détail |
|---|---|---|---|
| "Closing CTA" (logo + H2 + paragraphe + bouton) | `page-templates/qui-sommes-nous.php` (L200-215) et `page-templates/rejoignez-nous.php` (L100-115) | **~95 %** (structure HTML/classes identique, seuls les textes et l'URL du bouton diffèrent) | Candidat direct à l'extraction en `template-parts/marketing/closing-cta.php` (args : logo, titre, description, cta_label, cta_url) |
| Icône flèche prev/next (carrousel) | `template-parts/home/news-teaser.php` (L101, 104) et `template-parts/marketing/founder-spotlight.php` (L77, 80) | **100 %** (SVG inline byte-identique) | Même paire de `<svg><path d="M9 1 2 8l7 7".../></svg>` recopiée intégralement dans les deux fichiers |
| Icône "lecture" (play button) | `template-parts/marketing/reel-testimonial.php` (L42) et `template-parts/marketing/story-spotlight.php` (L18) | **100 %** (SVG inline byte-identique) | Même path dupliqué |
| Icône "marque de citation" | `template-parts/cards/testimonial-card.php` (L12) et `template-parts/marketing/reel-testimonial.php` (L49) | **100 %** (SVG inline byte-identique) | `reel-testimonial.php` réimplémente l'icône au lieu de réutiliser `testimonial-card.php` |
| Header / footer | `header.php`, `footer.php`, `template-parts/navigation/{navbar,footer}.php` | **0 % de duplication** | Correctement mutualisés via `get_header()`/`get_footer()`, appelés une seule fois chacun par tous les templates — **pas un problème**, mentionné pour couvrir le point du brief |
| "Nos partenaires" | `template-parts/home/partners.php` | **0 % de duplication** | Un seul consommateur actuellement (`qui-sommes-nous.php`) — **pas un problème actuellement**, contrairement à l'exemple cité dans le brief |

---

## Étape 4 — Conformité WordPress Coding Standards (WPCS)

**`phpcs` n'est pas configuré.** Recherche exhaustive de `phpcs.xml`, `phpcs.xml.dist`, `.phpcs.xml*` : aucun résultat. Aucun `composer.json` ne référence `wp-coding-standards/wpcs` ou `squizlabs/php_codesniffer` (pour cause : aucun `composer.json` n'existe du tout, voir Étape 7).

Aucune exécution de `phpcs` n'a donc été possible. **Rien n'a été corrigé** (conforme à la consigne), et rien n'a pu être audité automatiquement sur ce point — c'est un vide à combler, pas un résultat de scan.

---

## Étape 5 — Sécurité

### Clés API / secrets / tokens
Recherche exhaustive (`api_key`, `secret`, `token`, `access_key`, `client_secret`, `password=`, insensible à la casse) sur tous les fichiers PHP/JS du thème : **aucun résultat**. Aucune clé HelloAsso, Brevo, GA4 ou autre n'est codée en dur dans le thème à ce jour.

### Sorties non échappées
Recherche de `echo $variable` sans passage par `esc_html`/`esc_attr`/`esc_url`/`wp_kses` : 7 occurrences trouvées, **toutes des faux positifs** après vérification — il s'agit systématiquement de ternaires produisant un nom de classe CSS littéral conditionné par un booléen (`echo $image ? '' : ' is-placeholder';`), jamais de donnée utilisateur ou de contenu affiché tel quel. Aucune sortie non échappée de contenu réel n'a été trouvée.

### Formulaires et nonces
Un seul `<form>` dans tout le thème : `template-parts/marketing/newsletter.php` (`method="post" action=""`). Il n'a **ni nonce, ni traitement de soumission câblé** — un commentaire dans le fichier le confirme explicitement ("Markup only for now — no submission handler wired up"). MailPoet est déjà installé comme plugin sur le site (confirmé via le journal d'activité WordPress) mais n'est pas branché à ce formulaire. **Risque actuel faible** (le formulaire ne fait rien), mais **la sécurisation par nonce est à ajouter au moment du branchement**, pas après.

### `$_GET` / `$_POST` / `$_REQUEST`
Recherche exhaustive : **aucune occurrence** dans tout le thème. Aucune surface d'injection actuelle liée aux superglobales.

---

## Étape 6 — Préparation i18n (Polylang V2)

**Très bon état.** Comptage exhaustif :

- 261 occurrences du text domain `'bonnets-gris'`, **aucune anomalie de domaine** détectée (pas de chaîne avec un autre text domain ou un domaine absent).
- Fonctions de traduction utilisées : `__()` (177), `_e()` (84), `esc_html_e()` (75), `esc_attr_e()` (9) — 0 usage de `esc_html__()`/`esc_attr__()` (les deux formes existent dans l'écosystème WP ; l'équipe a systématiquement préféré `__()` + échappement séparé ou `esc_html_e()` selon le contexte, ce qui est cohérent, pas un problème).
- Recherche heuristique de texte français en dur (accents détectés hors de toute fonction de traduction ou commentaire) sur l'ensemble des fichiers PHP : **aucun résultat**.

**Conclusion** : la bascule Polylang en V2 ne nécessitera pas de ré-audit de chaînes — le travail de fond (passage systématique par les fonctions `__()`/`_e()` avec un domaine unique) est déjà fait.

---

## Étape 7 — Dépendances

- **`composer.json` / `composer.lock`** : absents. Aucune dépendance PHP formalisée (aucune n'est utilisée non plus : pas d'appel à une classe/librairie tierce détecté dans le thème).
- **`package.json`** : absent. Le seul JS du thème (`assets/js/*.js`, 4 fichiers) est vanilla, sans build step ni dépendance npm.
- Rien à comparer via `composer outdated` : la commande ne peut pas s'exécuter sans `composer.json`.

**Constat** : le thème est actuellement à zéro dépendance externe, ce qui est cohérent avec l'absence de `composer.json`/`package.json` — il n'y a pas de dette de dépendances non gérée, il n'y a simplement pas encore de gestion de dépendances formalisée. Cela devient un vrai sujet dès que la stack cible (Étape 0.1) est clarifiée, notamment si WPCS/PHPCS doit être installé via Composer.

---

## Étape 8 — Hygiène du dépôt

| Élément | État | Détail |
|---|---|---|
| `README.md` | Présent, globalement utile | Documente la stack réelle (WordPress.com Atomic, déploiement GitHub Deployments) et la procédure de connexion MCP — **mais contient une info obsolète** (thème actif = Charity Grove, voir Étape 0.3) et un lien Google Drive marqué comme doublon à corriger |
| `.gitignore` | **Absent** | Aucune règle pour `vendor/`, `node_modules/`, `.env`, `wp-config.php` — actuellement peu de risque (aucun de ces éléments n'existe dans le dépôt), mais aucun garde-fou si l'un d'eux apparaît (ex. lors de l'installation de WPCS via Composer) |
| GitHub Actions | **Absent** | Aucun répertoire `.github/`, donc aucun workflow — aucune CI (lint, tests, build) ne s'exécute avant le déploiement automatique sur push `main` |
| Protection de branche `main` | **Désactivée** (`protected: false`, confirmé via l'API GitHub) | Un push direct ou un force-push sur `main` part immédiatement en préprod sans revue possible |
| Fichier de version du thème | Présent (`style.css`), version `0.1.3` | Non incrémenté systématiquement au fil des commits de fonctionnalités (hygiène mineure, pas bloquant) |

---

## Livrable

- Branche créée : **`audit/etat-des-lieux-20260708`** (à partir de l'état exact de `main`, aucun fichier du thème modifié).
- Ce fichier : `docs/audit-technique-20260708.md`.
- Tag de sauvegarde : `build-1-preprod-20260708` — **créé localement, non poussé sur `origin`** (voir Étape 1 pour le détail et l'action requise).

Aucune correction n'a été appliquée. Cette branche ne doit pas être fusionnée dans `main` ou `staging` sans validation explicite.
