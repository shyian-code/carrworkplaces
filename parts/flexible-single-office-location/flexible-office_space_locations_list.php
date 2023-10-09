<?php

/* List Panel */
$background_color = get_sub_field('background_color');
$background_image = get_sub_field('background_image')['sizes']['hero-large'];

$title = get_sub_field('headline');
?>
<section class="content-module office-locations-list <?php echo $background_color; ?>"
         style="background: url(<?php echo $background_image; ?>) no-repeat center; background-size: cover;">

    <div class="l-wrapper">
        <?php if ($title): ?>
            <h3 class="office-locations-list__title"><?php echo $title; ?></h3>
        <?php endif; ?>
    </div>

    <div class="l-wrapper">
        <?php if (have_rows('locations_list')): ?>
            <ul class="office-locations-list__list">
                <?php while (have_rows('locations_list')): the_row(); ?>
                    <li class="office-locations-list__list-item">
                        <?php
                        $link = get_sub_field('location_link');
                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="office-locations-list__list-item-link" href="<?php echo esc_url($link_url); ?>"
                               target="<?php echo esc_attr($link_target); ?>">
                                <?php echo esc_html($link_title); ?>
                            </a>
                        <?php endif; ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>
