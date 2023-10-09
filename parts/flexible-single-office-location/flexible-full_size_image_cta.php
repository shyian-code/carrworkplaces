<?php
    $content = get_sub_field('content');
    $margin = get_sub_field('margin');

    $bg_img_id = get_sub_field('full_screen_image');
    $bg_img = wp_get_attachment_image_src($bg_img_id, 'hero-large');
?>

<section class="content-module full-size <?php echo $margin; ?>">
    <div class="l-wrapper">
        <?php if($content): ?>
            <div class="full-size__content">
                <?php echo $content; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<section class="full-size-image-backgraund" <?php bg($bg_img_id); ?>>

</section>
