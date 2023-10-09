<?php
    $content_image = get_sub_field('content_image');
    $content_description = get_sub_field('content_description');

    $content_position = get_sub_field('image_position');
    $image_position = $content_position ? 'image-left' : '';
    $text_position = $content_position ? 'text-right' : '';
    $background_color = get_sub_field('background_color');
?>

<section class="content-module two-third-text <?php echo $background_color; ?>">
    <div class="l-wrapper">
        <?php if ($content_image || $content_description): ?>
            <div class="text-block <?php echo $text_position; ?>">
                <div class="text-wrapper">
                    <?php echo $content_description; ?>
                    <?php echo ns_link_type('button'); ?>
                </div>
            </div>
            <div class="image-block <?php echo $image_position; ?>">
                <?php echo wp_get_attachment_image($content_image['id'], 'founder', false, array('class' => 'two-third-image__photo')); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
