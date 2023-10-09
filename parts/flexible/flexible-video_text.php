<?php
    $content_video = get_sub_field('content_video');
    $video_placeholder = get_sub_field('video_placeholder');
    $content_description = get_sub_field('content_description');

    $content_position = get_sub_field('content_position');
    $position = $content_position ? 'video-right' : 'video-left';
    $text_position = $content_position ? 'text-left' : 'text-right';
    $background_color = get_sub_field('background_color');
    $padding = get_sub_field('padding');
?>

<section class="content-module video-text <?php echo $background_color; ?> <?php echo $padding; ?>">
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
