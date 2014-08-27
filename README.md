KeyLinks-plugin-modx-evo
========================

KeyLinks - Plugin for MODX Evolution to cross-link website content. Uses QueryPath to find tag content.

### What is it?

This plugin can be used for SEO. It replaces words in documents with links to website pages, e.g. cross-linking whole website by given words.

### Installation

Go to modx manager and start to create new plugin named "KeyLinks".

Copy-paste code from plugin.txt to Plugin code (PHP) textarea.

Go to Configuration tab and copy-paste text from config.txt into Configuration field.

Go to System Events tab and check OnWebPagePrerender there.

Upload files from Upload directory to your website. You can also upload contents of [QueryPath](https://github.com/technosophos/querypath) "src" folder to /assets/plugins/keylinks/qp


### Usage

Create TV named KeyLinks (default setting) in your documents. Fill in words, separated by comma without spaces. Now every word on every page in p,span,strong,i (default setting) will be converted into link to this page. Glory for SEO!

### License

GPLv3