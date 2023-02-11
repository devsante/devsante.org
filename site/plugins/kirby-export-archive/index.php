<?php

Kirby::plugin("mlbrgl/kirby-export-archive", [
  "routes" => [
    [
      "pattern" => "export-archive",
      "action" => function () {
        // Copy the content/articles/ directory to archive/articles/ in an indempotent way
        exec(
          "rm -r archive/articles ; cp -rf content/articles/. archive/articles"
        );
        exec("rm -r archive/articles/*/article.txt");
        exec("rm -r archive/articles/articles-list.txt");

        // Copy the content/actualites/ directory to archive/actualites/ in an indempotent way
        exec(
          "rm -r archive/actualites ; cp -rf content/actualites/. archive/actualites"
        );
        exec("rm -r archive/actualites/*/news.txt");
        exec("rm -r archive/actualites/news-list.txt");

        // Remove the datetime prefix in the subdirectory names. The folder
        // names are used as slugs by Honkit.

        // Note: there are collisions in the target folder names when removing
        // the datetime prefix. This means two articles are candidate for the
        // same slug. By listing in reverse order, we ensure that the latest
        // article (probably an udpated version of the original article) is the
        // one that is kept (which is what is happening on Kirby's side as
        // well).
        exec("cd archive/articles && ls -r | rename 's/\d{12}_//'");
        // Remove the colliding folders that weren't renamed
        exec("cd archive/articles && ls | grep '^[0-9]\{12\}' | xargs rm -r");

        // Same with actualites, but with sequential numbers instead of dates
        exec("cd archive/actualites && ls -r | rename 's/\d+_//'");

        $articles = page("articles")
          ->children()
          ->listed()
          ->flip();

        $actualites = page("actualites")
          ->children()
          ->listed()
          ->flip();

        $pages = $articles->merge($actualites)->sortBy("datetime", "desc");

        $summary = [
          "## Archive devsante.org (1976 - 2022)",
          "- [Avant-propos](INTRO.md)",
        ];

        // Transform the content of each page into a standard Markdown file,
        // using standard frontmatter, and removing kirbytext.
        foreach ($pages as $page) {
          $frontmatterFields = [
            "title" => $page->title()->value(),
            "author" => $page->author()->value(),
            "date" => $page->datetime()->toDate("%Y-%m-%d"),
            // placing the teaser in the frontmatter means that markdown in the
            // teaser won't be rendered (at least with the page template code in
            // page.html). This doesn't seem to be an issue after a cursory
            // glance. A more thorough evaluation of the teaser content on more
            // pages might reveal a higher occurence of markdown in the teaser,
            // which would then make processing markdown there worthwhile. Long
            // teasers with paragraphs might also become an issue with this
            // approach, although the solution probably needs to be editorial
            // through shorter teasers.
            "teaser" => $page->teaser()->value(),
          ];
          $frontmatter = arrayToFrontmatter($frontmatterFields);
          $text = kirbytextNewlineToMarkdown(
            kirbytextTableOpenToMarkdown(
              kirbytextTableCloseToMarkdown(
                kirbytextImageToMarkdown($page->text()->value())
              )
            )
          );
          $page_path = "{$page->parent()->slug()}/{$page->slug()}";

          file_put_contents(
            "archive/$page_path/index.md",
            join(
              "\n\n",
              array_filter([$frontmatter, $text], function ($value) {
                return !empty($value);
              })
            )
          );

          $summary[] = "- [{$page->title()->value()}]($page_path/index.md)";
        }

        // Add a summary page to the book
        file_put_contents(
          "archive/SUMMARY.md",
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
  $frontmatter .= "---";
  return $frontmatter;
}

// convert kirbytext images to markdown and start them on a new line. Images
// already starting on a new line will get caught by this regex and get an extra
// new line, but that's ok.
function kirbytextImageToMarkdown($kirbytext)
{
  return preg_replace(
    "/^(.*?)\(image:\s*(.*?)\)/mu",
    "$1\n![]($2)",
    $kirbytext
  );
}

function kirbytextNewlineToMarkdown($kirbytext)
{
  return preg_replace(
    // add two spaces at the end a line to force a newline in markdown (handled
    // previously by kirbytext)
    "/\. ?\n([^\n])/",
    ".  \n$1",
    $kirbytext
  );
}

// Make sure <table> tags start on a new line
function kirbytextTableOpenToMarkdown($kirbytext)
{
  return preg_replace("/^(.+?)<table>/m", "$1\n<table>", $kirbytext);
}

// Add a extra new line after closing </table> tags to get them recognized
function kirbytextTableCloseToMarkdown($kirbytext)
{
  return preg_replace("/<\/table>\n([^\n])/", "</table>\n\n$1", $kirbytext);
}