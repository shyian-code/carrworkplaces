<?php
    $title = get_sub_field('title');
    $subtitle = get_sub_field('subtitle');
    $background_color = get_sub_field('background_color');

    $moving_text_top = get_sub_field('moving_text_top');
    $moving_text_bottom = get_sub_field('moving_text_bottom');
?>

<section class="early content-module moving-text-section <?php echo $background_color; ?>">
    <?php if($title || $subtitle): ?>
        <div class="moving-text-section__heading">
            <h2 class="moving-text-section__heading-title"><?php echo $title; ?></h2>
            <p class="moving-text-section__heading-subtitle"><?php echo $subtitle; ?></p>
        </div>
    <?php endif; ?>

    <?php if($moving_text_top || $moving_text_bottom): ?>
        <div class="moving-text-section__banner-wrapper">
            <p class="moving-text-section__banner-wrapper--top"><?php echo $moving_text_top; ?></p>
            <p class="moving-text-section__banner-wrapper--bottom"><?php echo $moving_text_bottom; ?></p>
        </div>
    <?php endif; ?>
</section>
