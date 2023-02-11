# devsante.org

This ~~is~~ was the home of https://devsante.org.

This dynamic site has been retired and replaced by a [static archive](https://github.com/devsante/devsante.github.io).

## Generating the archive

Generating the static archive is a two-step process:

- _only during the transition phase, until devsante.org serves the static archive_ `yarn refresh`: retrieve source content from production
- `yarn export-archive`: transform source kirby-flavoured markdown (`content/articles`, `content/actualites`) into standard markdown (`archive/articles`, `archive/actualites`)
- `yarn build-archive`: build static archive (`\_book`). This takes about 1h, and doesn't give any progress update.

Content updates should be made to the `content/articles` and `content/actualites` folders.

Batch updates related to the tranformation of kirbytext into markdown (`export-archive` step) should be made in the [export-archive plugin](./site/plugins/kirby-export-archive/index.php).

## Stack

- A whole lot of Kirby, including some custom plugins ([kirby-algolia](https://github.com/mlbrgl/kirby-algolia), ~~latest-content~~)
- A dash of SCSS
- A pinch of Vanilla JS

... all wrapped up in some gulp building magic!

## License

The code and content of this site are under different licenses.

The code is licensed under the [UNLICENSE](UNLICENSE.md).

The content is licensed under a [Creative Commons Attribution-NonCommercial 4.0 International License](https://creativecommons.org/licenses/by-nc/4.0/deed.en).
