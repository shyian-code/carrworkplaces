<?php
    $content = get_sub_field('content');
    $contact_form = get_sub_field('contact_form');

    $content_position = get_sub_field('image_position');
    $position = $content_position ? 'image-left' : 'image-right';
    $text_position = $content_position ? 'text-right' : 'text-left';
    $background_color = get_sub_field('background_color');
    $margin = get_sub_field('margin');
?>

<section class="content-module l-wrapper half-text_half_form <?php echo $margin; ?> <?php echo $background_color; ?>">
    <?php if ($content || $contact_form): ?>
        <div class="block block-one <?php echo $position; ?>">
            <?php echo $content; ?>
        </div>
        <div class="block block-two <?php echo $text_position; ?>">
            <div class="form-wrapper">
                <?php echo $contact_form; ?>
            </div>
        </div>
    <?php endif; ?>
</section>

