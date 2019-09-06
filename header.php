<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <base href="/">
  <link rel="alternate" hreflang="x-default" href="<?php echo home_url(); ?>">
  <link rel="alternate" hreflang="en" href="<?php echo home_url(); ?>/en">
  <link rel="alternate" hreflang="ru" href="<?php echo home_url(); ?>/ru">
  <link rel="alternate" hreflang="ua" href="<?php echo home_url(); ?>/ua">
  <?php
  // ENQUEUE your css and js in inc/enqueues.php

    wp_head();
	?>
</head>
<body <?php echo body_class(); ?>>
  <!-- <div class="preloader"></div> -->
  
  <header id="header" class="header" role="banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="header__content">
            <div class="header__left">
              <a href="<?php echo home_url(); ?>">
                <div class="header__logo">
                  <img src="<?php bloginfo('template_url') ?>/img/logo.svg" alt="">
                </div>
              </a>
              <div class="header__city">
                
              </div>
            </div>
            <div class="header__right">
              <div class="header__menu">
                <?php wp_nav_menu([
                  'theme_location' => 'head_menu',
                  'container' => 'nav',
                  'menu_id' => 'head_menu',
                ]); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section id="content" role="main">