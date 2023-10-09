<?php
    $content_video = get_sub_field('content_video');
    $content_description = get_sub_field('content_description');

    $content_position = get_sub_field('content_position');
    $position = $content_position ? 'video-left' : 'video-right';
    $text_position = $content_position ? 'text-right' : 'text-left';
    $background_color = get_sub_field('background_color');
    $border = get_sub_field('border');
    $margin = get_sub_field('margin');
?>

<section class="content-module career-video-text <?php echo $background_color; ?> <?php echo $border; ?> <?php echo $margin; ?>">
    <div class="l-wrapper">
        <?php if ($content_video || $content_description): ?>
            <div class="text-block <?php echo $text_position; ?>">
                <div class="text-wrapper">
                    <?php echo $content_description; ?>
                    <?php echo ns_link_type('button'); ?>
                </div>
            </div>
            <div class="video-block <?php echo $position; ?>">
                <?php echo $content_video; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
