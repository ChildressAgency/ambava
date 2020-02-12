<?php get_header(); ?>
  <main id="main">
    <?php if(have_posts()): ?>
      <section id="hp-main">
        <div class="container">
          <article>
            <?php while(have_posts()): the_post(); ?>
              <?php the_content(); ?>
            <?php endwhile; ?>
          </article>
        </div>
      </section>
    <?php endif; ?>

    <section class="bank-section-title sticky-top">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <img src="https://veteransbenefitsbanking.org/wp-content/uploads/2019/12/amba-logo.png" class="img-fluid d-block mx-auto" alt="Association of Military Banks of America Logo" />
          </div>
          <div class="col-md-8 d-flex align-items-center">
            <h2>Participating AMBA Banks</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="bank-list">
      <div class="container">
        <?php if(have_rows('amba_banks')): while(have_rows('amba_banks')): the_row(); ?>
          <div class="bank">
            <?php $bank_image = get_sub_field('amba_bank_logo'); ?>
            <img src="<?php echo esc_url($bank_image['url']); ?>" class="img-fluid d-block" alt="<?php echo esc_attr($bank_image['alt']); ?>" />
            <?php the_sub_field('amba_bank_content'); ?>
            <?php $bank_link = get_sub_field('amba_bank_link'); ?>
            <a href="<?php echo esc_url($bank_link['url']); ?>" class="btn-main" target="_blank"><?php echo esc_html($bank_link['title']); ?></a>
          </div>
        <?php endwhile; endif; ?>
      </div>
    </section>

    <section class="bank-section-title sticky-top">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <img src="https://veteransbenefitsbanking.org/wp-content/uploads/2020/02/DCUC-LOGO-VERTICAL.png" class="img-fluid d-block mx-auto" alt="Defense Credit Union Council Logo" style="max-width:150px;" />
          </div>
          <div class="col-md-8 d-flex align-items-center">
            <h2>Participating DCUC Credit Unions</h2>
          </div>
        </div>
      </div>
    </section>

    <section class="bank-list">
      <div class="container">
        <?php if(have_rows('dcuc_banks')): while(have_rows('dcuc_banks')): the_row(); ?>
          <div class="bank">
            <?php $bank_image = get_sub_field('dcuc_bank_logo'); ?>
            <img src="<?php echo esc_url($bank_image['url']); ?>" class="img-fluid d-block" alt="<?php echo esc_attr($bank_image['alt']); ?>" />
            <?php the_sub_field('dcuc_bank_content'); ?>
            <?php $bank_link = get_sub_field('dcuc_bank_link'); ?>
            <a href="<?php echo esc_url($bank_link['url']); ?>" class="btn-main" target="_blank"><?php echo esc_html($bank_link['title']); ?></a>
          </div>
        <?php endwhile; endif; ?>
      </div>
    </section>
  </main>
<?php get_footer();