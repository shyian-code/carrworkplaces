<?php
$title = get_sub_field('title');

$background_color = get_sub_field('background_color');
?>

<section class="content-module core-values <?php echo $background_color; ?>">
    <div class="l-wrapper core-values__grid">
        <?php if ($title): ?>
            <h2 class="core-values__title"><?php echo $title; ?></h2>
        <?php endif; ?>

        <?php if (have_rows('cards')) : ?>
        <ul class="core-values__grid-list">
            <?php while (have_rows('cards')) : the_row();
                $card_image = get_sub_field('card_image');
                $card_title = get_sub_field('card_title');
                $card_description = get_sub_field('card_description');
            ?>
                <li class="core-values__grid-item card">
                    <?php if ($card_image): ?>
                        <?php echo wp_get_attachment_image($card_image['id'], 'plans-pricing', false,
                              array('class' => 'card__image')); ?>
                    <?php endif; ?>

                    <div class="core-values__grid-item-info card__info-wrapper">
                        <?php if ($card_title || $card_description): ?>
                            <h5 class="card__title"><?php echo $card_title; ?></h5>
                            <p class="card__description"><?php echo $card_description; ?></p>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
    </div>
</section>
