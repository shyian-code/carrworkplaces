<?php /* Hero Component */

$blog_page_ID = get_option('page_for_posts', true);

if (ns_is_blog()) {
    $ID = $blog_page_ID;
} else {
    $ID = get_the_ID();
}

if (have_rows('hero', $ID)): ?>

    <?php while (have_rows('hero', $ID)) : the_row();

        $show_hero = get_sub_field('show_hero');
        $show_title = get_sub_field('show_title');
        $title_position = get_sub_field('title_position');
        $title = get_sub_field('title');
        $text = get_sub_field('text');
        $add_button_link = get_sub_field('add_button_link');
        $hero_image = get_sub_field('hero_image')['sizes']['hero-large'];
        $book_link = get_sub_field('book_link');
        $file = get_sub_field('file_link');
        $margin_settings = get_sub_field('margin_settings');

        if( $title_position == 'left-side' ) {
            $title_style = get_sub_field('title_style');
        } else {
            $title_style = 'right-side';
        }

        if ('' != $title)
            $title = '<h1 class="page-title ">' . $title . '</h1>';
        else $title = '<h1 class="page-title">' . get_the_title($ID) . '</h1>';

        if ('' != $text)
            $text = '<div class="sub-title">' . $text . '</div>';
        else $text = '';

        if (true == $show_hero) { ?>

            <section class="hero hero_<?php echo $title_style; ?> <?php echo $margin_settings; ?>"
                     style="background: url(<?php echo $hero_image; ?>) no-repeat top; background-size: cover;">
                <?php if (true == $show_title && 'left-side' || 'right-side' == $title_position) { ?>
                    <div class="l-wrapper">
                        <div class="hero-content <?php echo ' ' . $title_style; ?>">
                            <?php echo $title; ?>
                            <?php echo $text; ?>
                            <?php if ($book_link):
                                $link_url = $book_link['url'];
                                $link_title = $book_link['title'];
                                $link_target = $book_link['target'] ? $book_link['target'] : '_self';
                                ?>
                                <a class="book_link button orange" href="<?php echo esc_url($link_url); ?>"
                                   target="<?php echo esc_attr($link_target); ?>">
                                    <?php echo esc_html($link_title); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php } ?>
            </section>

<!--            --><?php //if (true == $show_title && 'right-side' == $title_position) { ?>
<!--                <section class="l-wrapper page-header">-->
<!--                    --><?php //echo $title; ?>
<!--                    --><?php //echo $text; ?>
<!--                </section>-->
<!--            --><?php //} ?>
        <?php } else { ?>

            <?php if (true == $show_title) { ?>
                <section class="l-wrapper page-header">
                    <?php echo $title; ?>
                    <?php echo $text; ?>
                </section>
            <?php } ?>
        <?php } ?>
    <?php endwhile; ?>
<?php endif; ?>
