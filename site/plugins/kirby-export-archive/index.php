<?php

Kirby::plugin("mlbrgl/kirby-export-archive", [
  "routes" => [
    [
      "pattern" => "export-archive",
      "action" => function () {
        $summary = [
          "## Archive devsante.org (1976 - 2022)",
          "- [Avant-propos](README.md)",
        ];
        $pages = page("articles")
          ->children()
          ->listed()
          ->flip()
          ->limit(5);

        // Copy the content/articles/ directory to book/articles/ in an indempotent way
        exec("rm -r book/articles ; cp -rf content/articles/. book/articles");
        exec("rm -r book/articles/*/article.txt");

        // Remove the datetime prefix in the subdirectory names. The folder
        // names are used as slugs by Honkit.

        // Note: there are collisions in the target folder names when removing
        // the datetime prefix. This means two articles are candidate for the
        // same slug. By listing in reverse order, we ensure that the latest
        // article (probably an udpated version of the original article) is the
        // one that is kept (which is what is happening on Kirby's side as
        // well).
        exec("cd book/articles && ls -r | rename 's/\d{12}_//'");

        // Transform the content of each page into a standard Markdown file,
        // using standard frontmatter, and removing kirbytext.
        foreach ($pages as $page) {
          $frontmatterFields = [
            "title" => $page->title()->value(),
            "author" => $page->author()->value(),
            "date" => $page->datetime()->toDate("%Y-%m-%d"),
          ];
          $frontmatter = arrayToFrontmatter($frontmatterFields);
          $teaser = $page->teaser()->value();
          $text = kirbytextImageToMarkdown($page->text()->value());
          $slug = $page->slug();

          file_put_contents(
            "book/articles/$slug/index.md",
            join(
              "\n",
              array_filter([$frontmatter, $teaser, $text], function ($value) {
                return !empty($value);
              })
            )
          );

          $summary[] = "- [{$page->title()->value()}](articles/$slug/index.md)";
        }

        // Add a summary page to the book
        file_put_contents(
          "book/SUMMARY.md",
          join("\n", ["# Summary", ...$summary])
        );
      },
    ],
  ],
]);

function arrayToFrontmatter($array)
{
  $frontmatter = "---\n";
  foreach ($array as $key => $value) {
    if (empty($value)) {
      continue;
    }
    $escapedValue = addcslashes($value, "\"");
    $frontmatter .= "$key: \"$escapedValue\"\n";
  }
  $frontmatter .= "---\n";
  return $frontmatter;
}

function kirbytextImageToMarkdown($kirbytext)
{
  return preg_replace(
    // remove leading spaces, as they break image rendering. We need to capture
    // non-breaking spaces as well as regular spaces, but not newlines.
    "/[^\S\r\n]*\(image:\s*(.*?)\)/u",
    '![]($1)',
    $kirbytext
  );
}
