# Les Bonnets Gris

## Stack technique

- **CMS**: WordPress.com
- **Versioning**: GitHub — [Gintho/Lesbonnetsgris](https://github.com/Gintho/Lesbonnetsgris)
- **Suivi de projet**: [Notion — Les Bonnets Gris Product HQ](https://app.notion.com/p/Les-Bonnets-Gris-Product-HQ-3914b70ec0968114b405cc9ac005fc9c)
- **Documentation métier**: Google Drive — ⚠️ le lien fourni pointe actuellement vers la page Notion ci-dessus ; à corriger.
- **Intégration IA**: Claude Code connecté au site WordPress (staging) via MCP

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

## Liens

- Dépôt GitHub : https://github.com/Gintho/Lesbonnetsgris
- Notion (suivi de projet) : https://app.notion.com/p/Les-Bonnets-Gris-Product-HQ-3914b70ec0968114b405cc9ac005fc9c
- Google Drive (documentation métier) : à fournir (lien actuel = doublon du lien Notion)
