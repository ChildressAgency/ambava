<?php if(have_rows('accordion_section')): ?>
  <section id="faq-accordion" class="accordion">
    <?php $t = 0; while(have_rows('accordion_section')): the_row(); ?>
      <div class="card">
        <div class="card-header" id="accordion-section-<?php echo $t; ?>-title">
          <h4>
            <button class="btn btn-link opener collapsed" data-toggle="collapse" data-target="#accordion-section-<?php echo $t; ?>-content" aria-expanded="false" aria-controls="accordion-section-<?php echo $t; ?>-content">
              <?php the_sub_field('accordion_section_title'); ?>
            </button>
          </h4>
        </div>
        <div id="accordion-section-<?php echo $t; ?>-content" class="collapse" aria-labelledby="accordion-section-<?php echo $t; ?>-title" data-parent="#faq-accordion">
          <div class="card-body" style="padding-left:40px;">
            <?php the_sub_field('accordion_section_content'); ?>
          </div>
        </div>
      </div>
    <?php $t++; endwhile; ?>
  </section>
<?php endif; ?>