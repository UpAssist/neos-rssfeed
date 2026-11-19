# Changelog

All notable changes to this project will be documented in this file. See [standard-version](https://github.com/conventional-changelog/standard-version) for commit guidelines.

## [1.0.0](https://github.com/UpAssist/neos-rssfeed/compare/0.3.1...1.0.0) (2026-11-19)

Neos 9 support. Neos 8 stays on the 0.x line (branch `0.x`, 0.4.x).

### ⚠ BREAKING CHANGES

* requires Neos 9.0 or later (`neos/neos ^9.0`); use 0.4.x on Neos 8

### Features

* Neos 9 support: data sources read the node types from the Content Repository registry, Fusion uses `renderingMode`, `node.dimensionSpacePoint`, `node.timestamps` and `Neos.Node.label()`
* `sortPropertyName` setting: the property the feed items are sorted by (default `publicationDate`, as before; `null` keeps the tree order)

### Bug Fixes

* default `allowedContentTypes` now points to `Neos.NodeTypes.BaseMixins:TextMixin`; `Neos.Neos:Mixin.TextMixin` does not exist, so the content type select was empty by default

### [0.3.1](https://github.com/UpAssist/neos-rssfeed/compare/0.3.0...0.3.1) (2026-11-19)


### Bug Fixes

* require neos/neos ^8.3 and neos/fusion-afx instead of neos/flow * ([6e83d50](https://github.com/UpAssist/neos-rssfeed/commit/6e83d50)). Neos 9 is not supported: the data sources and Fusion use the Neos 8 Content Repository API.

## [0.3.0](https://github.com/UpAssist/neos-rssfeeed/compare/0.2.3...0.3.0) (2025-04-08)


### Features

* category support ([1f2dcdc](https://github.com/UpAssist/neos-rssfeeed/commit/1f2dcdc1dd6a04faeb467541a230a04efaf86e5d))
* language optional ([60a7a2b](https://github.com/UpAssist/neos-rssfeeed/commit/60a7a2bc42bd9660c435e51c38e5b3aea52c19de))

### [0.2.3](https://github.com/UpAssist/neos-rssfeeed/compare/0.2.2...0.2.3) (2025-01-28)

### [0.2.2](https://github.com/UpAssist/neos-rssfeeed/compare/0.2.1...0.2.2) (2024-07-17)


### Features

* support for older neos versions ([26d4fb4](https://github.com/UpAssist/neos-rssfeeed/commit/26d4fb4ead4073e88651332cbdc14e7fa0d82fcd))

## [0.2.0](https://github.com/UpAssist/neos-rssfeeed/compare/0.1.2...0.2.0) (2024-03-08)


### Features

* show images ([b96c233](https://github.com/UpAssist/neos-rssfeeed/commit/b96c2330e5241776e5ddfd03463a50737d7c5daa))

### [0.1.2](https://github.com/UpAssist/neos-rssfeeed/compare/0.1.1...0.1.2) (2023-11-27)


### Bug Fixes

* inappropriate classname declaration ([f034775](https://github.com/UpAssist/neos-rssfeeed/commit/f034775e59d4bfe7387311a96ed35856bfd20f1f))

### [0.1.1](https://github.com/UpAssist/neos-rssfeeed/compare/0.1.0...0.1.1) (2023-11-27)


### Bug Fixes

* add missing help text ([5fcc984](https://github.com/UpAssist/neos-rssfeeed/commit/5fcc98455fb429ce176a79669f3f44d25def4309))

## 0.1.0 (2023-11-27)
