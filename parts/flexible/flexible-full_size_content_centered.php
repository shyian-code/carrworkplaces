<?php
    $background_color = get_sub_field('background_color');
    $content = get_sub_field('content');
?>

<section class="content-module full-size <?php echo $background_color; ?>">
    <div class="l-wrapper">
        <?php if($content): ?>
            <div class="full-size__content-centered">
                <?php echo $content; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
