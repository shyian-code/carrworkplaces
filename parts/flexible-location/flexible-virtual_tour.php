<?php
    $icon = get_sub_field('icon');
    $label = get_sub_field('label');


?>

<section class="content-module virtual-tour l-wrapper">
        <div class="virtual-tour__content">
            <?php if ($icon || $label): ?>
                <div class="virtual-tour__content-wrap">
                    <?php echo wp_get_attachment_image($icon['id'], 'card', false, array('class' => 'virtual-tour__icon')); ?>
                    <p class="virtual-tour__label"><?php echo $label; ?></p>
                </div>
            <?php endif; ?>

            <?php
            $link = get_sub_field('link');
            if ($link):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="virtual-tour__link" href="<?php echo esc_url($link_url); ?>"
                   target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
        </div>
</section>
