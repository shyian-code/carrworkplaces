<?php
    $video = get_sub_field('video');
    $text_information = get_sub_field('text_information');

    $content_position = get_sub_field('content_position');
    $position = $content_position ? 'video-left' : '';
    $text_position = $content_position ? 'text-right' : '';
    $background_color = get_sub_field('background_color');
?>

<section class="content-module text-video <?php echo $background_color; ?>">
    <div class="l-wrapper">
        <?php if ($video || $text_information): ?>
            <div class="text-block <?php echo $position; ?>">
                <div class="text-wrapper">
                    <?php echo $text_information; ?>
                    <?php echo ns_link_type('button'); ?>
                </div>
            </div>
            <div class="video-block">
                <?php echo $video; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
