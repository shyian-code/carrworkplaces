<?php
$properties_title = get_sub_field('title');

$background_color = get_sub_field('background_color');
?>

<section class="content-module properties <?php echo $background_color; ?>">
    <div class="l-wrapper properties__grid">
        <?php if ($properties_title): ?>
            <h2 class="properties__title"><?php echo $properties_title; ?></h2>
        <?php endif; ?>

        <?php if (have_rows('cards')) : ?>
            <ul class="properties__grid-list">
                <?php while (have_rows('cards')) : the_row();

                    $card_image = get_sub_field('card_image');
                    $card_title = get_sub_field('card_title');
                    $card_description = get_sub_field('card_description');
                    $card_phone = get_sub_field('card_phone');
                    $link = get_sub_field('card_link');
                    ?>
                    <li class="properties__grid-item card">
                        <?php echo wp_get_attachment_image($card_image['id'], 'thumbnail', false, array('class' => 'card__image')); ?>

                        <div class="properties__grid-item-info card__info-wrapper">
                            <?php if ($card_title || $card_description): ?>
                                <h5 class="card__title"><?php echo $card_title; ?></h5>
                                <p class="card__description"><?php echo $card_description; ?></p>
                            <?php endif; ?>

                            <?php if ($card_phone || $link):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>

                                    <div class="card__info-inner-wrapper">
                                        <span class="card__phone"><?php echo $card_phone; ?></span>
                                        <a class="card__description-link"
                                           href="<?php echo esc_url($link_url); ?>"
                                           target="_self">
                                            <?php echo esc_html($link_title); ?>
                                        </a>
                                    </div>
                            <?php endif; ?>

                        </div>
                    </li>

                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>
