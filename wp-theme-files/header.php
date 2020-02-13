<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="cache-control" content="public">
  <meta http-equiv="cache-control" content="private">

  <title><?php echo esc_html(bloginfo('name')); ?></title>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header id="header">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="brand">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/va-logo.png" class="img-fluid d-block mr-3" alt="Department of Veterans Affairs Logo" />
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/amba-logo.png" class="img-fluid d-block ml-3" alt="Association of Military Banks of America Logo" />
        </div>
        <p class="slogan d-block d-sm-none">Those Who Serve<span>Bank On Us</span></p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-nav" aria-controls="header-nav" aria-expanded="false" aria-label="Toggle Navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div id="header-nav" class="collapse navbar-collapse">
          <?php
            $header_nav_args = array(
              'theme_location' => 'header-nav',
              'menu' => '',
              'container' => '',
              'container_id' => '',
              'container_class' => '',
              'menu_id' => '',
              'menu_class' => 'navbar-nav ml-auto',
              'echo' => true,
              'fallback_cb' => 'vbbp_header_fallback_menu',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth' => 2,
              'walker' => new WP_Bootstrap_NavWalker()
            );
            wp_nav_menu($header_nav_args);
          ?>

          <?php get_search_form(); ?>
        </div>
      </nav>
    </div>
  </header>

  <?php
    $hero_background_image = get_field('hero_background_image');
    $hero_background_image_css = get_field('hero_background_image_css');

    if(!$hero_background_image){
      $hero_background_image = get_field('default_hero_background_image', 'option');
      $hero_background_image_css = get_field('default_hero_background_image_css', 'option');
    }
  ?>
  <section id="hp-hero" class="hero" style="background-image:url(<?php echo esc_url($hero_background_image); ?>); <?php echo esc_attr($hero_background_image_css); ?>">
    <div class="container">
      <?php if(is_front_page()): ?>
        <div class="row">
          <div class="col-sm-6">
            <div class="hero-caption animated slideInLeft" style="max-width:none !important;">
              <?php echo apply_filters('the_content', wp_kses_post(get_field('hero_caption'))); ?>
              <a href="<?php echo esc_url(home_url('banks')); ?>" class="btn-main mt-5">Find a Bank</a>
            </div>
          </div>
          <div class="col-sm-6">
              <div class="logos">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/va-logo-large.png" class="img-fluid d-block" alt="Department of Veterans Affairs Logo" />
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/amba-logo-large.png" class="img-fluid d-block" alt="Association of Military Banks of America Logo" />
              </div>
          </div>
        </div>
      <?php else: ?>
        <div class="hero-caption animated slideInLeft">
          <?php echo apply_filters('the_content', wp_kses_post(get_field('hero_caption'))); ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="white-gradient"></div>
    <div class="fade-in"></div>
  </section>