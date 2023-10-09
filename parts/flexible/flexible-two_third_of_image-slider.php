<?php
    $content_description = get_sub_field('content_description');

    $content_position = get_sub_field('image_position');
    $image_position = $content_position ? 'image-left' : '';
    $text_position = $content_position ? 'text-right' : '';
    $background_color = get_sub_field('background_color');
    $margin = get_sub_field('margin');

    $content_image_slider = get_sub_field('content_image_slider');
?>

<section class="content-module two-third-image-slider <?php echo $background_color; ?> <?php echo $margin; ?>">
    <div class="l-wrapper">
        <?php if ($content_image_slider || $content_description): ?>
            <div class="text-block <?php echo $text_position; ?>">
                <div class="text-wrapper">
                    <?php echo $content_description; ?>
                    <?php echo ns_link_type('button'); ?>
                </div>
            </div>
            <div class="image-block <?php echo $image_position; ?>">

                <?php if( have_rows('content_image_slider') ): ?>
                    <div class="two-third-image-slider__slider slides slick-slider">
                        <?php while( have_rows('content_image_slider') ): the_row();
                            $image = get_sub_field('content_image');
                            ?>
                            <div class="two-third-image-slider__slider-item slick-slide">
                                <?php echo wp_get_attachment_image( $image['id'], 'card', false,
                                      array('class' => 'two-third-image-slider__picture')); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>
    </div>
</section>
