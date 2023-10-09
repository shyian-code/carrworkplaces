<?php
$section_title = get_sub_field('section_title');
$section_description = get_sub_field('section_description');
?>

<section class="content-module plans-pricing">
    <div class="l-wrapper">
        <?php if ($section_title || $section_description): ?>
            <div class="plans-pricing__heading">
                <h2 class="plans-pricing__heading-title"><?php echo $section_title ?></h2>
                <p class="plans-pricing__heading-description"><?php echo $section_description; ?></p>
            </div>
        <?php endif; ?>
    </div>

    <div class="l-wrapper plans-pricing__grid">
        <?php if(have_rows('cards')) : ?>
            <ul class="plans-pricing__grid-list">
                <?php while(have_rows('cards')) : the_row();

                    $card_image = get_sub_field('card_image');
                    $card_title = get_sub_field('card_title');
                    $card_description = get_sub_field('card_description');
                    $link = get_sub_field('card_link');
                    ?>
                    <li class="plans-pricing__grid-item card">
                        <?php if ($card_image || $link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="card__description-link"
                               href="<?php echo esc_url($link_url); ?>"
                               target="<?php echo esc_attr($link_target); ?>">

                                <?php echo wp_get_attachment_image($card_image['id'], 'thumbnail', false, array('class' => 'card__image')); ?>
                            </a>
                        <?php endif; ?>

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
</section>
