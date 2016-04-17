<?php snippet('header') ?>

  <main class="main" role="main">

    <h1><?php echo $page->title()->html() ?></h1>

    <ul class="meta cf">
      <li><b>Auteur :</b> <?php echo $page->author() ?></li>
      <li><b>Mis à jour le  :</b> <time datetime="<?php echo $page->date('c') ?>"><?php echo $page->date('j/m/Y', 'date') ?></time></li>
    </ul>

    <div class="teaser">
      <?php echo $page->teaser()->kirbytext() ?>  
    </div>

    <div class="text">
      <?php echo $page->text()->kirbytext() ?>
    </div>

    <nav class="nextprev cf" role="navigation">
      <?php if($prev = $page->prevVisible()): ?>
      <a class="prev" href="<?php echo $prev->url() ?>">&larr; previous</a>
      <?php endif ?>
      <?php if($next = $page->nextVisible()): ?>
      <a class="next" href="<?php echo $next->url() ?>">next &rarr;</a>
      <?php endif ?>
    </nav>

  </main>

<?php snippet('footer') ?>