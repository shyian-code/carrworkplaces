<?php /* Footer CTA */

if (is_home()) {
    $show_footer_cta = get_field('show_footer_cta_fix', get_option('page_for_posts'));
} else if (is_archive()) {
    $show_footer_cta = get_field('show_footer_cta_fix', get_option('page_for_posts'));
} else if (is_single()) {
    $show_footer_cta = get_field('show_footer_cta_fix', get_option('page_for_posts'));
} else if (is_search()) {
    $show_footer_cta = get_field('show_footer_cta_fix', get_option('page_for_posts'));
} else {
    $show_footer_cta = get_field('show_footer_cta_fix');
}

if (false != $show_footer_cta) { ?>

    <?php if (have_rows('footer_cta', 'option')): ?>
        <section class="footer-cta">
            <div id="join-now"></div>
            <?php while (have_rows('footer_cta', 'option')): the_row(); ?>
                <div class="l-wrapper footer-cta__wrapper">
                    <?php echo ns_section_header(); ?>
                    <!--                        --><?php //echo ns_link_type('button', false); ?>
                    <?php
                    $f_link = get_sub_field('footer_button_link', 'option');
                    ?>
                    <?php if ($f_link):
                        $link_url = $f_link['url'];
                        $link_title = $f_link['title'];
                        $link_target = $f_link['target'] ? $f_link['target'] : '_self';
                        ?>
                        <div class="button">
                            <a class="" href="<?php echo esc_url($link_url); ?>"
                               target="<?php echo esc_attr($link_target); ?>">
                                <?php echo esc_html($link_title); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php
                    $additional_cta_text = get_sub_field('additional_cta_text', 'option');
                    $additional_cta_link = get_sub_field('additional_cta_link', 'option');
                    ?>
                    <?php if ($additional_cta_text || $additional_cta_link):
                        $link_url = $additional_cta_link['url'];
                        $link_title = $additional_cta_link['title'];
                        $link_target = $additional_cta_link['target'] ? $additional_cta_link['target'] : '_self';
                        ?>
                        <div class="additional-cta">
                            <p class="additional-cta__text"><?php echo $additional_cta_text; ?></p>
                            <a class="additional-cta__link" href="<?php echo esc_url($link_url); ?>"
                               target="<?php echo esc_attr($link_target); ?>">
                                <?php echo esc_html($link_title); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </section>
    <?php endif; ?>
<?php } ?>

<?php if (have_rows('locations_panel', 'option')): ?>
    <section class="footer-locations">
        <div class="l-wrapper">
            <?php while (have_rows('locations_panel', 'option')): the_row(); ?>
                <?php echo ns_section_header(); ?>

                <?php if (have_rows('columns')): ?>
                    <div class="locations">
                        <?php while (have_rows('columns')): the_row(); ?>
                            <?php if (have_rows('column')): ?>
                                <div class="column">
                                    <?php while (have_rows('column')): the_row();
                                        $state = get_sub_field('state'); ?>
                                        <h5 class="footer-locations__column-title"><?php echo $state; ?></h5>

                                        <?php if (have_rows('locations')): ?>
                                            <?php while (have_rows('locations')): the_row();
                                                $location = get_sub_field('location');
                                                $offices = get_sub_field('offices'); ?>
                                                <div class="location">
                                                    <h6 class="footer-locations__column-item-title">
                                                        <a href="<?php echo get_permalink($location); ?>">
                                                            <?php echo get_the_title($location); ?>
                                                        </a>
                                                    </h6>
                                                    <?php echo $offices; ?>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>

                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>

    </section>
<?php endif; ?>

<footer>
    <div class="l-wrapper">
        <div class="inner-wrapper clearfix">
            <?php if (have_rows('social_navigation', 'option')): ?>
                <?php while (have_rows('social_navigation', 'option')): the_row(); ?>
                    <?php $show_section = get_field('show_section', 'option');
                    if (false != $show_section) {

                        if (have_rows('links')): ?>

                            <nav class="social-nav">
                                <ul>
                                    <?php while (have_rows('links')): the_row();
                                        $icon = get_sub_field('icon');
                                        $link = get_sub_field('link'); ?>

                                        <li>
                                            <a href="<?php echo $link; ?>" target="_blank"><?php echo $icon; ?></a>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            </nav>
                        <?php endif;
                    } ?>
                <?php endwhile; ?>
            <?php endif; ?>


            <?php ns_nav_menu('footer', 'footer-nav'); ?>
        </div>

        <div class="footer__copyright-privacy-wrapper">
            <p class="footer__copyright">© CARR Workplaces 2022</p>
            <?php ns_nav_menu('legal', 'legal-nav'); ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
