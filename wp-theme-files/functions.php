<?php
add_action('wp_footer', 'show_template');
function show_template() {
	global $template;
	print_r($template);
}

add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn(){
  if(!is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'vbbp_scripts');
function vbbp_scripts(){
  wp_register_script(
    'bootstrap-popper',
    'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
    array('jquery'),
    '',
    true
  );

  wp_register_script(
    'bootstrap-scripts',
    'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js',
    array('jquery', 'bootstrap-popper'),
    '',
    true
  );

  wp_register_script(
    'vbbp-scripts',
    get_stylesheet_directory_uri() . '/js/custom-scripts.min.js',
    array('jquery', 'bootstrap-scripts'),
    '',
    true
  );

  wp_enqueue_script('bootstrap-popper');
  wp_enqueue_script('bootstrap-scripts');
  wp_enqueue_script('vbbp-scripts');
}

add_filter('script_loader_tag', 'vbbp_add_script_meta', 10, 2);
function vbbp_add_script_meta($tag, $handle){
  switch($handle){
    case 'jquery':
      $tag = str_replace('></script>', ' integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>', $tag);
      break;

    case 'bootstrap-popper':
      $tag = str_replace('></script>', ' integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>', $tag);
      break;

    case 'bootstrap-scripts':
      $tag = str_replace('></script>', ' integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>', $tag);
      break;
  }

  return $tag;
}

add_action('wp_enqueue_scripts', 'vbbp_styles');
function vbbp_styles(){
  wp_register_style(
    'google-fonts',
    'https://fonts.googleapis.com/css?family=Lato:400,700,700i,900&display=swap'
  );

  wp_register_style(
    'fontawesome',
    'https://use.fontawesome.com/releases/v5.6.3/css/all.css'
  );

  wp_register_style(
    'vbbp-css',
    get_stylesheet_directory_uri() . '/style.css'
  );

  wp_enqueue_style('google-fonts');
  wp_enqueue_style('fontawesome');
  wp_enqueue_style('vbbp-css');
}

add_filter('style_loader_tag', 'vbbp_add_css_meta', 10, 2);
function vbbp_add_css_meta($link, $handle){
  switch($handle){
    case 'fontawesome':
      $link = str_replace('/>', ' integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">', $link);
      break;
  }

  return $link;
}

add_action('after_setup_theme', 'vbbp_setup');
function vbbp_setup(){
  add_theme_support('post-thumbnails');
  //set_post_thumbnail_size(320, 320);

  add_theme_support(
    'html5',
    array(
      'comment-form',
      'comment-list',
      'gallery',
      'caption'
    )
  );

  add_theme_support('editor-styles');
  add_editor_style('style-editor.css');

  add_theme_support('wp-block-styles');
  add_theme_support('responsive-embeds');

  register_nav_menus(array(
    'header-nav' => 'Header Navigation',
    'footer-nav' => 'Footer Navigation',
  ));

  load_theme_textdomain('vbbp', get_stylesheet_directory_uri() . '/languages');
}

require_once dirname(__FILE__) . '/includes/class-wp-bootstrap-navwalker.php';

function vbbp_header_fallback_menu(){ ?>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item<?php if(is_front_page()){ echo ' active'; } ?>">
      <a href="<?php echo home_url(); ?>" class="nav-link" title="<?php echo esc_attr__('Home', 'vbbp'); ?>"><?php echo esc_html__('Home', 'vbbp'); ?></a>
    </li>
    <li class="nav-item dropdown<?php if(is_page('about-us') || is_page('association-of-military-banks-of-america') || is_page('department-of-veteran-affairs-vba')){ echo ' active'; } ?>">
      <a href="#" class="nav-link dropdown-toggle text-nowrap" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo esc_attr__('About', 'vbbp'); ?>"><?php echo esc_html__('About', 'vbbp'); ?></a>
      <ul class="dropdown-menu">
        <li class="nav-item"><a href="<?php echo esc_url(home_url('about-us')); ?>" class="dropdown-item"><?php echo esc_html__('About Us', 'vbbp'); ?></a></li>
        <li class="nav-item"><a href="<?php echo esc_url(home_url('association-of-military-banks-of-america')); ?>" class="dropdown-item"><?php echo esc_html__('Association of Military Banks of America', 'vbbp'); ?></a></li>
        <li class="nav-item"><a href="<?php echo esc_url(home_url('department-of-veteran-affairs-vba')); ?>" class="dropdown-item"><?php echo esc_html__('Department of Veteran Affairs (VBA)', 'vbbp'); ?></a></li>
      </ul>
    </li>
    <li class="nav-item<?php if(is_page('banks')){ echo ' active'; } ?>">
      <a href="<?php echo esc_url(home_url('banks')); ?>" class="nav-link" title="<?php echo esc_attr__('Banks', 'vbbp'); ?>"><?php echo esc_html__('Banks', 'vbbp'); ?></a>
    </li>
    <li class="nav-item<?php if(is_page('faqs')){ echo ' active'; } ?>">
      <a href="<?php echo esc_url(home_url('faqs')); ?>" class="nav-link" title="<?php echo esc_attr__('FAQs', 'vbbp'); ?>"><?php echo esc_html__('FAQs', 'vbbp'); ?></a>
    </li>
    <li class="nav-item<?php if(is_page('contact')){ echo ' active'; } ?>">
      <a href="<?php echo esc_url(home_url('contact')); ?>" class="nav-link" title="<?php echo esc_attr__('Contact', 'vbbp'); ?>"><?php echo esc_html__('Contact', 'vbbp'); ?></a>
    </li>
  </ul>
<?php }

function vbbp_footer_fallback_menu(){ ?>
  <ul class="list-unstyled list-inline">
    <li class="nav-item<?php if(is_front_page()){ echo ' active'; } ?>">
      <a href="<?php echo esc_url(home_url()); ?>" class="nav-link" title="<?php echo esc_attr__('Home', 'vbbp'); ?>"><?php echo esc_html__('Home', 'vbbp'); ?></a>
    </li>
    <li class="nav-item<?php if(is_page('about') || is_page('association-of-military-banks-of-america') || is_page('department-of-veteran-affairs-vba')){ echo ' active'; } ?>">
      <a href="<?php echo esc_url(home_url('about')); ?>" class="nav-link" title="<?php echo esc_attr__('About', 'vbbp'); ?>"><?php echo esc_html__('About', 'vbbp'); ?></a>
    </li>
    <li class="nav-item<?php if(is_page('banks')){ echo ' active'; } ?>">
      <a href="<?php echo esc_url(home_url('banks')); ?>" class="nav-link" title="<?php echo esc_attr__('Banks', 'vbbp'); ?>"><?php echo esc_html__('Banks', 'vbbp'); ?></a>
    </li>
    <li class="nav-item<?php if(is_page('faqs')){ echo ' active'; } ?>">
      <a href="<?php echo esc_url(home_url('faqs')); ?>" class="nav-link" title="<?php echo esc_attr__('FAQs', 'vbbp'); ?>"><?php echo esc_html__('FAQs', 'vbbp'); ?></a>
    </li>
    <li class="nav-item<?php if(is_page('contact')){ echo ' active'; } ?>">
      <a href="<?php echo esc_url(home_url('contact')); ?>" class="nav-link" title="<?php echo esc_attr__('Contact', 'vbbp'); ?>"><?php echo esc_html__('Contact', 'vbbp'); ?></a>
    </li>
  </ul>
<?php }