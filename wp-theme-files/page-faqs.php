<?php get_header(); ?>
  <main id="main">
    <section id="faq">
      <div class="container">
        <article>
          <?php get_template_part('partials/loop'); ?>
        </article>

        <?php if(have_rows('faqs')): ?>
          <section id="faq-accordion" class="faqs">
            <?php $t = 0; while(have_rows('faqs')): the_row(); ?>
              <div class="card">
                <div class="card-header" id="question<?php echo $t; ?>">
                  <h4>
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#answer<?php echo $t; ?>" aria-expanded="false" aria-controls="answer<?php echo $t; ?>">
                      <?php the_sub_field('question'); ?>
                    </button>
                  </h4>
                </div>
                <div id="answer<?php echo $t; ?>" class="collapse" aria-labelledby="question<?php echo $t; ?>" data-parent="#faq-accordion">
                  <div class="card-body">
                    <?php echo apply_filters('the_content', wp_kses_post(get_sub_field('answer'))); ?>
                  </div>
                </div>
              </div>
            <?php $t++; endwhile; ?>
          </section>
        <?php endif; ?>
      </div>
    </section>
  </main>
<?php get_footer();