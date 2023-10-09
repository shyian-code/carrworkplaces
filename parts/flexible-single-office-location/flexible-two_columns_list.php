<?php
$list_title = get_sub_field('title');

$list_color = get_sub_field('background_color');
?>

<section class="content-module columns-lg-list <?php echo $list_color; ?>">
    <div class="l-wrapper columns-lg-list__grid">
        <?php if ($list_title): ?>
            <h2 class="columns-lg-list__title"><?php echo $list_title; ?></h2>
        <?php endif; ?>

        <?php if (have_rows('large_list')) : ?>
            <div class="columns-lg-list__list">
                <?php while (have_rows('large_list')) : the_row();

                    $list_title = get_sub_field('list_title');
                    $list_description = get_sub_field('list_info');
                    $link = get_sub_field('link');
                    ?>
                    <div class="columns-lg-list__list-item ">
                        <?php if ($list_title || $list_description): ?>
                            <h5 class="columns-lg-list__item-title"><?php echo $list_title; ?></h5>
                            <p class="columns-lg-list__item-description"><?php echo $list_description; ?></p>
                            <?php if ($link):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>

                                <a class="button purple"
                                   href="<?php echo esc_url($link_url); ?>"
                                   target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
