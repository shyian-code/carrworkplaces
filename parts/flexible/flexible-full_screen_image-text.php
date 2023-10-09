<?php
    $background_color = get_sub_field('background_color');
    $content = get_sub_field('content');

    $bg_img_id = get_sub_field('full_screen_image');
    $bg_img = wp_get_attachment_image_src($bg_img_id, 'hero-large');
?>

<section class="content-module full-size-text <?php echo $background_color; ?>">
    <div class="l-wrapper">
        <?php if($content): ?>
            <div class="full-size-text__content">
                <?php echo $content; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<section class="full-screen-image" <?php bg($bg_img_id); ?>>

</section>
