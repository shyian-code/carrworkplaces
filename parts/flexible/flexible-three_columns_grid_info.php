<?php
$properties_title = get_sub_field('title');
$properties_subtitle = get_sub_field('subtitle');

$background_color = get_sub_field('background_color');
?>

<section class="content-module columns-grid-info <?php echo $background_color; ?>">
    <div class="l-wrapper columns-grid-info__grid">
        <?php if ($properties_title || $properties_subtitle): ?>
            <h2 class="columns-grid-info__title"><?php echo $properties_title; ?></h2>
            <p class="columns-grid-info__subtitle"><?php echo $properties_subtitle; ?></p>
        <?php endif; ?>

        <?php if (have_rows('cards')) : ?>
            <ul class="columns-grid-info__grid-list">
                <?php while (have_rows('cards')) : the_row();

                    $card_image = get_sub_field('card_image');
                    $card_title = get_sub_field('card_title');
                    $card_description = get_sub_field('card_description');
                    $link = get_sub_field('card_link');
                    ?>
                    <li class="columns-grid-info__grid-item card">
                        <?php echo wp_get_attachment_image($card_image['id'], 'large', false, array('class' => 'card__image')); ?>

                        <div class="columns-grid-info__grid-item-info card__info-wrapper">
                            <?php if ($card_title || $card_description): ?>
                                <h5 class="card__title"><?php echo $card_title; ?></h5>
                                <p class="card__description"><?php echo $card_description; ?></p>
                            <?php endif; ?>

                            <?php if ($link):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>

                                    <div class="card__info-inner-wrapper">
                                        <a class="card__description-link"
                                           href="<?php echo esc_url($link_url); ?>"
                                           target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                    </div>
                            <?php endif; ?>

                        </div>
                    </li>

                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>
