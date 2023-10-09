<?php
    $content_description = get_sub_field('content_description');

    $content_position = get_sub_field('image_position');
    $image_position = $content_position ? 'image-left' : '';
    $text_position = $content_position ? 'text-right' : '';
    $background_color = get_sub_field('background_color');

    $content_image_slider = get_sub_field('content_image_slider');
?>

<section class="content-module image-slider-information <?php echo $background_color; ?>">
    <div class="l-wrapper">
        <?php if ($content_image_slider || $content_description): ?>
            <div class="text-block <?php echo $text_position; ?>">
                <div class="text-wrapper">
                    <?php echo $content_description; ?>
                    <?php echo ns_link_type('button'); ?>
                </div>
            </div>
            <div class="image-block <?php echo $image_position; ?>">

                <?php
                    $gallery_images = get_sub_field('gallery_image_slider');
                    if( $gallery_images ): ?>
                    <div class="image-slider-information__slider slides slick-slider">
                        <?php foreach( $gallery_images as $image ): ?>
                            <div class="image-slider-information__slider-item slick-slide">
                                <?php echo wp_get_attachment_image( $image['id'], 'card', array('class' => 'two-third-image-slider__picture')); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>
    </div>
</section>
