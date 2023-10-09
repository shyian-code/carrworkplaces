<?php
    $content_image = get_sub_field('content_image');
    $content_description = get_sub_field('content_description');

    $content_position = get_sub_field('image_position');
    $position = $content_position ? 'image-left' : 'image-right';
    $text_position = $content_position ? 'text-right' : 'text-left';
    $background_color = get_sub_field('background_color');
    $margin = get_sub_field('margin');
?>

<section class="content-module l-wrapper half-text_half-image <?php echo $margin; ?>">
    <?php if ($content_image || $content_description): ?>
        <div class="block block-one <?php echo $position; ?>">
            <?php echo wp_get_attachment_image($content_image['id'], 'founder', false, array('class' => 'half-text_half-image__photo')); ?>
        </div>
        <div class="block block-two <?php echo $text_position; ?>">
            <div class="text-wrapper">
                <?php echo $content_description; ?>
            </div>
        </div>
    <?php endif; ?>
</section>

