<?php if(!is_page('contact')); ?>
  <section id="find-bank">
    <div class="container">
      <div class="row">
        <div class="col-md-4 d-flex align-items-center">
          <h2><?php echo esc_html__('Find the right bank for you.', 'vbbp'); ?></h2>
        </div>
        <div class="col-md-4 d-flex align-items-center justify-content-center">
          <a href="<?php echo esc_url(home_url('contact')); ?>" class="btn-main"><?php echo esc_html__('Learn More', 'vbbp'); ?></a>
        </div>
        <div class="col-md-4 d-flex align-items-end">
          <div class="magnifier">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/magnifier.png" class="img-fluid d-block mx-auto" alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

  <footer id="footer">
    <div class="container">
      <nav id="footer-nav" class="d-flex justify-content-center">
        <?php
          $footer_nav_args = array(
            'theme_location' => 'footer-nav',
            'menu' => '',
            'container' => '',
            'container_id' => '',
            'container_class' => '',
            'menu_id' => '',
            'menu_class' => 'list-unstyled list-inline',
            'echo' => true,
            'fallback_cb' => 'vbbp_footer_fallback_menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 1
          );
          wp_nav_menu($footer_nav_args);
        ?>
      </nav>
      <div class="footer-logos">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/amba-logo.png" class="img-fluid d-block" alt="Association of Military Banks of America Logo" />
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/va-logo.png" class="img-fluid d-block" alt="U.S. Department of Veterans Affairs Logo" />
      </div>
      <div class="copyright">
        <p>&copy; <?php echo date('Y'); ?> <?php echo echo_html(bloginfo('name')); ?></p>
        <p>Website created by <a href="https://childressagency.com" target="_blank">The Childress Agency</a></p>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>
</html>