<?php
    $background_color = get_sub_field('background_color');
    $content = get_sub_field('content');
    $margin = get_sub_field('margin');
    $contact_form = get_sub_field();
?>

<section class="content-module full-size <?php echo $background_color; ?> <?php echo $margin; ?>">
    <div class="l-wrapper">
        <?php if($content): ?>
            <div class="full-size__content">
                <?php echo $content; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
