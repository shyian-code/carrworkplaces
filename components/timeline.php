<?php /* Timeline */ 
$show_footer_cta = get_field('show_footer_cta_fix'); 
?>

<section class="content-module timeline-section">
    <?php if(have_rows('timeline')): ?>      
      <nav id="timeline-nav">
        <ul>
        <?php while(have_rows('timeline')): the_row();
          $title =  get_sub_field('title');
          $safe_title = strtolower($title);
          $safe_title = preg_replace("/[^a-z0-9_\s-]/", "", $safe_title);
          $safe_title = preg_replace("/[\s_]/", "-", $safe_title);

        ?>
          <li><a href="#<?php echo $safe_title; ?>"><?php echo $title; ?></a></li>
        <?php endwhile; ?>
        <?php if($show_footer_cta) {?>
          <li class="join-now"><a href="#join-now">Join Now</a></li>
        <?php } ?>
        </ul> 
      </nav>
      
    <?php endif; ?>
  </div>
  <?php if(have_rows('timeline')): ?>
    <div id="timeline">
      <?php while(have_rows('timeline')): the_row(); 
      
        $title =  get_sub_field('title');
        $safe_title = strtolower($title);
        $safe_title = preg_replace("/[^a-z0-9_\s-]/", "", $safe_title);
        $safe_title = preg_replace("/[\s_]/", "-", $safe_title); ?>
        <div class="timeline-entry" id="<?php echo $safe_title; ?>">
          <div class="timeline-content">
            <span class="time"><?php echo get_sub_field('time'); ?></span>
            <h2 class="title"><?php echo get_sub_field('title'); ?></h2>
            <p class="content"><?php echo get_sub_field('content'); ?></p>
          </div>
          <div class="timeline-image">
            <?php echo wp_get_attachment_image(get_sub_field('image'), 'full'); ?>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
  </div>
</section>