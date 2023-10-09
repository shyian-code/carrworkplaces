<?php
$content_image = get_sub_field('content_image');
$content_description = get_sub_field('content_description');
$background_color = get_sub_field('background_color');
$content_position = get_sub_field('image_position');
$position = $content_position ?  'image-right' : 'image-left';
$text_position = $content_position ? 'text-left' : 'text-right';
$title = get_sub_field('title');

?>

<section class="content-module half-image_half-text <?php echo $background_color; ?>">
    <?php if ($content_image || $content_description): ?>
        <div class="l-wrapper">
            <div class="block-wrapper">
                <div class="block block-one <?php echo $position; ?>">
                    <?php echo wp_get_attachment_image($content_image['id'], 'founder', false, array('class' => 'half-image_half-text__photo')); ?>
                </div>
                <div class="block block-two <?php echo $text_position; ?>">
                    <div class="text-wrapper">
                        <?php if($title): ?>
                            <h3 class="half-image_half-text__title"><?php echo $title; ?></h3>
                        <?php endif; ?>

                        <?php echo $content_description; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>

