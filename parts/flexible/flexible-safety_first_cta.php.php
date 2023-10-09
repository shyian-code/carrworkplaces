<?php
    $title = get_sub_field('title');
    $description = get_sub_field('description');
?>

<section class="content-module safety-first-cta l-wrapper">
        <div class="safety-first-cta__content">
            <?php if ($title): ?>
                <h4 class="safety-first-cta__content-title"><?php echo $title; ?></h4>
            <?php endif; ?>

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
                <a class="safety-first-cta__link button" href="<?php echo esc_url($link_url); ?>"
                   target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
        </div>
</section>
