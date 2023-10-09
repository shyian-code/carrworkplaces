<?php
    $description = get_sub_field('description');
?>

<section class="content-module learn-about-cta">
        <div class="l-wrapper learn-about-cta__content">
            <?php if ($description): ?>
                <?php echo $description; ?>
            <?php endif; ?>

            <?php
            $link = get_sub_field('cta_link');
            if ($link):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="learn-about-cta__link button" href="<?php echo esc_url($link_url); ?>"
                   target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
        </div>
</section>
