<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">

  <?php echo css('assets/css/app.css') ?>
  <?php echo css('https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700') ?>
  <?php echo css('assets/fonts/devsante/style.css'); ?>

</head>
<body>

  <header class="header cf" role="banner">
      
    <div class="top">

      <div class="container">

        <div class="menu"> 
          <span class="i-menu" title="menu" aria-hidden="true"></span>
          <span class="title">MENU</span>
        </div>

        <div class="socials">
        </div>

      </div>
    
    </div>

    <div class="logo"><a href="/">
      <a href="<?php echo url() ?>">
        <img src="<?php echo url('assets/img/logo.png') ?>" alt="<?php echo $site->title()->html() ?>" />
      </a>
    </div>


    <div class="search">
      <div class="container">
        <div class="search-box">
          <span class="i-search"></span>
        </div>
      </div>
    </div>

        
  </header>