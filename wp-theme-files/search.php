<?php get_header(); ?>
  <main id="main">
    <section id="hp-main">
      <div class="container">
        <h2><?php echo esc_html__('Showing results for', 'vbbp'); ?> "<?php echo get_search_query(); ?>"</h2>
        <article>
          <?php get_template_part('partials/loop'); ?>
        </article>
      </div>
    </section>
  </main>
<?php get_footer();