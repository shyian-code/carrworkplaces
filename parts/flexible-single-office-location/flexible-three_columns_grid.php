<?php
$properties_title = get_sub_field('title');
$background_color = get_sub_field('background_color');

$decoration_graphics = get_sub_field('decoration_graphics');
$description = get_sub_field('description');
?>

<section class="content-module plans-pricing <?php echo $background_color; ?>">
    <div class="l-wrapper plans-pricing__grid">
        <?php if($properties_title): ?>
            <h2 class="plans-pricing__title"><?php echo $properties_title; ?></h2>
        <?php endif; ?>
        <?php if(have_rows('cards')) : ?>
            <ul class="plans-pricing__grid-list">
                <?php while(have_rows('cards')) : the_row();

                    $card_image = get_sub_field('card_image');
                    $card_title = get_sub_field('card_title');
                    $card_description = get_sub_field('card_description');
                    ?>
                    <li class="plans-pricing__grid-item card">
                        <?php echo wp_get_attachment_image($card_image['id'], 'thumbnail', false, array('class' => 'card__image')); ?>

                        <div class="plans-pricing__grid-item-info card__info-wrapper">
                            <?php if ($card_title): ?>
                                <h5 class="card__title"><?php echo $card_title; ?></h5>
                            <?php endif; ?>

                            <div class="card__info-inner-wrapper">
                                <?php if ($card_description): ?>
                                    <span class="card__description"><?php echo $card_description; ?></span>
                                <?php endif; ?>

                                <?php
                                $link = get_sub_field('card_link');
                                if ($link):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="card__description-link"
                                       href="<?php echo esc_url($link_url); ?>"
                                       target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                <?php endif; ?>
                            </div>

                        </div>
                    </li>

                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>

    <?php if ($decoration_graphics || $description): ?>
        <div class="l-wrapper plans-pricing__additional-info-row">
            <?php echo wp_get_attachment_image($decoration_graphics['id'], 'thumbnail', false,
                array('class' => 'plans-pricing__image'));
            ?>

            <p class="plans-pricing__description"><?php echo $description; ?></p>
        </div>
    <?php endif; ?>
</section>
