# Les Bonnets Gris

## Stack technique

- **CMS**: WordPress.com (plan Business/Commerce, site *Atomic*)
  - Staging (préproduction officielle) : `staging-e7b0-lesbonnetsgris.wpcomstaging.com`
  - Production : pas encore créée — la staging est construite en premier
  - ⚠️ Un autre site `lesbonnetsgris.wpcomstaging.com` existe aussi sur le compte mais n'est plus utilisé comme préprod — ne pas y connecter GitHub Deployments.
- **Versioning**: GitHub — [Gintho/Lesbonnetsgris](https://github.com/Gintho/Lesbonnetsgris)
- **Suivi de projet**: [Notion — Les Bonnets Gris Product HQ](https://app.notion.com/p/Les-Bonnets-Gris-Product-HQ-3914b70ec0968114b405cc9ac005fc9c)
- **Intégration IA**: Claude Code connecté au site WordPress (staging) via MCP
- **Déploiement**: GitHub Deployments (natif WordPress.com) — actuellement branché sur `main`. Migration prévue vers `staging` une fois cette branche créée (voir [Stratégie de branches](#stratégie-de-branches)) ; ce README sera mis à jour une fois la bascule effective.

## Connexion Claude Code ↔ WordPress (staging)

Le dépôt déclare le serveur MCP officiel de WordPress.com dans `.mcp.json` :

```json
{
  "mcpServers": {
    "wpcom-mcp": {
      "url": "https://public-api.wordpress.com/wpcom/v2/mcp/v1"
    }
  }
}
```

Cette configuration seule ne suffit pas : deux étapes manuelles sont nécessaires avant que Claude Code puisse agir sur le site.

### 1. Activer l'accès MCP sur le site WordPress.com de staging

Sur le site de **staging** (pas le site de production) : `Réglages` → `Général` → section **AI tools**.

- Les outils de **lecture** sont activés par défaut dès que l'accès MCP est activé sur le site.
- Les outils d'**écriture** (créer/modifier posts, pages, médias, catégories, tags, commentaires) sont désactivés par défaut et doivent être activés explicitement, outil par outil ou par catégorie.

⚠️ Ne pas activer l'accès MCP (ni surtout les écritures) sur le site de production tant que le workflow n'a pas été validé en staging.

### 2. Autoriser Claude Code (OAuth)

Dans une session Claude Code sur ce dépôt :

1. Lancer la commande `/mcp`.
2. Suivre le lien d'autorisation OAuth 2.1 ouvert dans le navigateur.
3. Se connecter avec le compte WordPress.com et sélectionner explicitement le **site de staging** à autoriser (ne pas sélectionner le site de production).
4. Une fois autorisé, les outils `wpcom-mcp` (lecture et, si activée, écriture de contenu) apparaissent disponibles dans la session.

## Déploiement automatique GitHub → WordPress (staging)

Le code du thème vit **à la racine du dépôt** (`style.css`, `functions.php`, `header.php`, `footer.php`, `index.php`). Ce n'est pas la structure `wp-content/themes/<nom>/` habituelle : le connecteur GitHub Deployments de ce site n'a pas de champ "répertoire source" séparé — il copie tout le contenu du dépôt tel quel vers le répertoire de destination configuré côté WordPress. La racine du repo doit donc *être* le dossier du thème.

Cette connexion s'établit via une autorisation OAuth/GitHub App déclenchée depuis l'admin WordPress — je ne peux pas la faire à votre place, voici les étapes :

1. Dans l'admin du site de **staging** (`staging-e7b0-lesbonnetsgris.wpcomstaging.com`) : `Hébergement` (Hosting Configuration) → section **Déploiements** (Deployments).
2. Cliquer sur **Connecter un dépôt** / *Connect repository*, autoriser l'app GitHub de WordPress.com sur `Gintho/Lesbonnetsgris` (installation à approuver côté GitHub).
3. Choisir :
   - Branche à suivre : `main` **pour l'instant** — à repointer sur `staging` une fois cette branche créée et le workflow de lint validé (voir [Stratégie de branches](#stratégie-de-branches)). Ce document sera mis à jour au moment de la bascule.
   - **Répertoire de destination : `/wp-content/themes/bonnets-gris`** (⚠️ pas `/wp-content/plugins/...` — notre code est un thème, pas un plugin)
   - Déploiement automatique : activé, pour que chaque push sur la branche suivie déclenche un déploiement sur le site.
4. Ne connecter **que ce site de staging** pour l'instant — pas de site de production tant qu'il n'existe pas, et pas l'autre site `lesbonnetsgris.wpcomstaging.com` qui n'est plus la préprod de référence.
5. Une fois le premier déploiement effectué, le thème custom sera installé et **doit être activé explicitement** dans `Apparence` → `Thèmes` s'il ne l'est pas déjà (le thème actif sur ce site peut avoir changé entre deux sessions de travail — vérifier plutôt que de supposer).

Référence officielle : [Deploy from GitHub to WordPress.com](https://wordpress.com/support/github-deployments/)

⚠️ Le déploiement automatique ne prendra effet qu'une fois le repository connecté ci-dessus **et** une fois la branche suivie mise à jour avec le code du thème.

## Stratégie de branches

- **`main`** : branche de release. Reflète le code destiné à devenir la production une fois celle-ci créée. Protégée sur GitHub (PR obligatoire, check de lint requis, pas de push direct).
- **`staging`** : branche de préproduction. C'est elle que le déploiement natif WordPress.com suit (une fois la migration depuis `main` effectuée — voir plus haut). Protégée de la même façon que `main`.
- **Branches de travail** (`feature/*`, `refactor/*`, `fix/*`) : courtes, une par sujet, fusionnées dans `staging` via Pull Request après revue et passage du check `lint` (`.github/workflows/lint.yml`). `staging` est ensuite fusionnée dans `main` une fois le contenu validé en préproduction.

## Développement local

- **Dépendances PHP** : `composer install` (installe WPCS/PHPCS en dépendance de développement — voir `composer.json`).
- **Lint** : `composer lint` — exécute PHPCS avec le ruleset `WordPress-Core` (`phpcs.xml`) sur l'ensemble du thème.
- **Auto-fix** : `composer lint:fix` — exécute PHPCBF pour corriger automatiquement ce qui peut l'être (espacement, formatage). Toujours relire le diff avant de commiter : PHPCBF ne garantit pas l'absence de changement de comportement dans les cas ambigus.

## Liens

- Dépôt GitHub : https://github.com/Gintho/Lesbonnetsgris
- Notion (suivi de projet) : https://app.notion.com/p/Les-Bonnets-Gris-Product-HQ-3914b70ec0968114b405cc9ac005fc9c
