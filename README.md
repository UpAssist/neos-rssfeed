# Neos RSS Feed

A simple package to create news feeds: add an RSS feed document to your tree and pick, in the inspector, which documents and which content it lists.

## Compatibility

| Version | Neos | Branch | Notes |
| --- | --- | --- | --- |
| 1.x | 9.0, 9.1, 9.2 | `main` | Tested on 9.0, 9.1 and 9.2. |
| 0.4.x | 8.3, 8.4 | `0.x` | Tested on 8.3 and 8.4. Bug fixes only. |
| 0.3.x | 8.3, 8.4 | | |

The data sources and Fusion talk to the Content Repository, whose API differs between Neos 8 and 9, so each Neos major has its own package major.

## Installation

```bash
composer require upassist/neos-rssfeed
```

## Configuration

All settings live under `UpAssist.Neos.RSSFeed`; see `Configuration/Settings.RSSFeed.yaml` for the defaults.

| Setting | Default | Purpose |
| --- | --- | --- |
| `allowedDocumentTypes` | `Neos.Neos:Document` | Document types (or mixins) the editor can pick as feed items. |
| `allowedContentTypes` | `Neos.NodeTypes.BaseMixins:TextMixin` | Content types (or mixins) the item description is taken from. |
| `sortPropertyName` | `publicationDate` | Property the items are sorted by, newest first. `null` keeps the document tree order. On Neos 8 (0.x), `_lastPublicationDateTime` sorts by publication time; Neos 9 sorts by node properties only. |
| `contentPropertyName` | `text` | Property of the content node that holds the description text. |
| `imagePropertyName` | `image` | Document property used for the item enclosure. |
| `categoryPropertyName` | `null` | Document property (string or references) rendered as `<category>`. |
| `mainContentCollection` | `main` | Content collection searched for the description. |
| `textAppendix` | `...` | Appended when the description is cropped. |
| `defaultLanguage` | `en` | Channel language when the site has no `language` dimension. |
