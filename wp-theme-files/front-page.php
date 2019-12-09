<?php get_header(); ?>
  <main id="main">
    <section id="hp-main">
      <div class="container">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/vertical-flag.png" class="img-fluid vertical-flag" alt="" />
        <article>
          <?php get_template_part('partials/loop'); ?>
        </article>
      </div>
    </section>
  </main>
<?php get_footer();