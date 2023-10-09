<?php
$content = get_sub_field('content');

$bg_img_id = get_sub_field('background_image');
$bg_img = wp_get_attachment_image_src($bg_img_id, 'hero-large');
?>

<section class="full-size-cta" <?php bg($bg_img_id); ?>>
    <div class="l-wrapper">
        <?php if($content): ?>
            <div class="full-size-cta__content">
                <?php echo $content; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
