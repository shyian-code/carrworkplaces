<?php
    $footer_cta_title = get_sub_field('footer_cta_title');
    $footer_cta_subtitle = get_sub_field('footer_cta_subtitle');
    $footer_cta_link = get_sub_field('footer_cta_link');

    $footer_additional_text = get_sub_field('footer_additional_text');
    $footer_additional_cta_link = get_sub_field('footer_additional_link');
?>

<section class="footer-cta">
        <div class="l-wrapper footer-cta__wrapper">
            <?php if ($footer_cta_title || $footer_cta_subtitle || $footer_cta_link):

                $link_url = $footer_cta_link['url'];
                $link_title = $footer_cta_link['title'];
                $link_target = $footer_cta_link['target'] ? $footer_cta_link['target'] : '_self';
                ?>
                <h2 class="footer-cta__title"><?php echo $footer_cta_title; ?></h2>
                <p class="footer-cta__sub-text"><?php echo $footer_cta_subtitle; ?></p>

                <a class="button footer-cta__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>

            <?php if ($footer_additional_text || $footer_additional_cta_link):
                $link_url = $footer_additional_cta_link['url'];
                $link_title = $footer_additional_cta_link['title'];
                $link_target = $footer_additional_cta_link['target'] ? $footer_additional_cta_link['target'] : '_self';
                ?>
                <div class="additional-cta">
                    <p class="additional-cta__text"><?php echo $footer_additional_text; ?></p>
                    <a class="additional-cta__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                        <?php echo esc_html( $link_title ); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>

</section>
