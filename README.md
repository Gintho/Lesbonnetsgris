# Les Bonnets Gris

## Stack technique

- **CMS**: WordPress.com (plan Business/Commerce, site *Atomic*)
  - Staging : `lesbonnetsgris.wpcomstaging.com` (existant)
  - Production : pas encore créée — la staging est construite en premier
- **Versioning**: GitHub — [Gintho/Lesbonnetsgris](https://github.com/Gintho/Lesbonnetsgris)
- **Suivi de projet**: [Notion — Les Bonnets Gris Product HQ](https://app.notion.com/p/Les-Bonnets-Gris-Product-HQ-3914b70ec0968114b405cc9ac005fc9c)
- **Documentation métier**: Google Drive — ⚠️ le lien fourni pointe actuellement vers la page Notion ci-dessus ; à corriger.
- **Intégration IA**: Claude Code connecté au site WordPress (staging) via MCP
- **Déploiement**: GitHub Deployments (natif WordPress.com) — push sur `main` déployé automatiquement sur staging

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

1. Dans l'admin du site de **staging** (`lesbonnetsgris.wpcomstaging.com`) : `Hébergement` (Hosting Configuration) → section **Déploiements** (Deployments).
2. Cliquer sur **Connecter un dépôt** / *Connect repository*, autoriser l'app GitHub de WordPress.com sur `Gintho/Lesbonnetsgris` (installation à approuver côté GitHub).
3. Choisir :
   - Branche à suivre : `main`
   - **Répertoire de destination : `/wp-content/themes/bonnets-gris`** (⚠️ pas `/wp-content/plugins/...` — notre code est un thème, pas un plugin)
   - Déploiement automatique : activé, pour que chaque push sur `main` déclenche un déploiement sur le site.
4. Ne connecter **que le site de staging** pour l'instant — pas de site de production tant qu'il n'existe pas.

Référence officielle : [Deploy from GitHub to WordPress.com](https://wordpress.com/support/github-deployments/)

⚠️ Cette branche de travail (`claude/bonnets-gris-tech-stack-rd5g9w`) n'est pas encore fusionnée dans `main`. Le déploiement automatique ne prendra effet qu'une fois `main` mis à jour — dites-moi si vous voulez que j'ouvre la pull request.

## Liens

- Dépôt GitHub : https://github.com/Gintho/Lesbonnetsgris
- Notion (suivi de projet) : https://app.notion.com/p/Les-Bonnets-Gris-Product-HQ-3914b70ec0968114b405cc9ac005fc9c
- Google Drive (documentation métier) : à fournir (lien actuel = doublon du lien Notion)
