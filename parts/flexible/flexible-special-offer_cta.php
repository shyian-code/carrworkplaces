<?php
    $description = get_sub_field('description');
?>

<section class="content-module special-offer-cta l-wrapper">
        <div class="special-offer-cta__content-wrapper">
            <div class="special-offer-cta__text">
                <?php if ($description): ?>
                    <?php echo $description; ?>
                <?php endif; ?>
            </div>

            <div class="special-offer-cta__button-wrapper">
                <?php
                $link = get_sub_field('cta_link');
                if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="special-offer-cta__link button" href="<?php echo esc_url($link_url); ?>"
                       target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
            </div>
        </div>
</section>
