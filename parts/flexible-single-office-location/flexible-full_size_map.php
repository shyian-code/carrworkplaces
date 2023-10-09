<?php
$background_color = get_sub_field('background_color');
$title = get_sub_field('title');
$description = get_sub_field('description');

$map_embed = get_sub_field('map_embed');
$map_ID = get_sub_field('map_id');


if ($map_ID > 0) {
    $map = do_shortcode('[wpgmza id="' . $map_ID . '"]');
} else {
    $map = '';
}

if ('' != $map)
    $map = '<div class="map clearfix">' . $map . '</div>';
else $map = '';
?>

<section class="content-module full-size-map <?php echo $background_color; ?>">
    <div class="l-wrapper">
        <?php if ($title || $description || $map): ?>
            <div class="full-size-map__content">
                <h2 class="full-size-map__content-title"><?php echo $title; ?></h2>
                <p class="full-size-map__content-description"><?php echo $description; ?></p>
            </div>
        <?php endif; ?>


        <?php if ($map): ?>
            <?php echo $map; ?>

            <?php /* $counter = 1;

            if( have_rows('address_list') ): ?>
                <div class="address-list">
                <?php while( have_rows('address_list') ): the_row();
                    $address = get_sub_field('address');

                    if ('' != $address) { ?>
                    <div class="address">
                        <span class="number"><?php echo $counter++; ?></span>
                        <address><?php echo $address; ?><address>
                    </div>
                    <?php }
                endwhile; ?>
                </div>
            <?php endif; */ ?>
        <?php endif; ?>

        <?php
        $link = get_sub_field('location_link');
        if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="full-size-map__link button purple" href="<?php echo esc_url($link_url); ?>"
               target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
        <?php endif; ?>
    </div>
</section>
