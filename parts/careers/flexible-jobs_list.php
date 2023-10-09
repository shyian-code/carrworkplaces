<?php
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$editor = get_sub_field('editor');

$background_color = get_sub_field('background_color');
?>

<section id="jobs-section" class="content-module jobs <?php echo $background_color; ?>">
    <div class="l-wrapper">
        <?php if ($title || $subtitle): ?>
            <h2 class="jobs__title"><?php echo $title; ?></h2>
            <p class="jobs__subtitle"><?php echo $subtitle; ?></p>
        <?php endif; ?>
        <?php if ($editor): ?>
            <?php echo $editor; ?>
        <?php endif; ?>
    </div>
</section>
