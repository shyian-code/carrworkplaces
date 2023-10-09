<?php
    $content = get_sub_field('content');
    $form_script = get_sub_field('form_script');

    $content_position = get_sub_field('image_position');
    $position = $content_position ? 'image-right' : 'image-left';
    $text_position = $content_position ? 'text-left' : 'text-right';
    $background_color = get_sub_field('background_color');
    $margin = get_sub_field('margin');
?>

<section class="content-module l-wrapper half-text_half-hubspot_form <?php echo $margin; ?> <?php echo $background_color; ?>">
    <?php if ($content || $form_script): ?>
        <div class="block block-one <?php echo $position; ?>">
            <div class="text-wrapper">
                <?php echo $content; ?>
            </div>
        </div>
        <div class="block block-two <?php echo $text_position; ?>">
            <div class="form-wrapper">
                <?php echo $form_script; ?>
            </div>
        </div>
    <?php endif; ?>
</section>

