<?php /* Blog Page */

global $args;

$featured_article = get_field('featured_article', get_option('page_for_posts'));
$featured_article_hero_image = get_the_post_thumbnail_url($featured_article->ID, 'hero-medium');
$featured_article_title = $featured_article->post_title;

if (!is_archive()) {
    $hero_image = ' style="background: url(' . $featured_article_hero_image . ') no-repeat center; background-size: cover;"';
} else {
    $hero_image = ' style="background: url(' . $featured_article_hero_image . ') no-repeat center; background-size: cover;"';
}

get_template_part('components/header'); ?>

<section class="blog-hero"<?php echo $hero_image; ?>>
    <div class="l-wrapper">
        <?php if (!is_archive()) { ?>
            <div class="hero-content">
                <h5 class="sub-title">Featured Article</h5>
                <h2 class="page-title">
                    <a href="<?php echo get_permalink($featured_article->ID); ?>">
                        <?php echo $featured_article_title; ?>
                    </a>
                </h2>
                <span class="post-date"><?php echo get_the_time('M jS, Y', $featured_article->ID); ?></span>
            </div>

        <?php } else { ?>
            <section class="hero-content">
                <?php echo '<h1>' . get_the_archive_title() . '</h1>'; ?>
            </section>
        <?php } ?>
    </div>
</section>

<main>
    <section class="blog-posts l-wrapper">
        <div class="post-feed">
            <div class="inner-wrapper">

                <?php if ('all' != $post_count) {
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                }

                $category = $wp_query->query_vars['category_name'];
                $tag = $wp_query->query_vars['tag'];

                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                    'paged' => $paged,
                    'post__not_in' => array($featured_article->ID),
                    'category_name' => $category,
                    'tag' => $tag,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );

                get_template_part('components/post-loop'); ?>

                <div class="sidebar">
                    <?php if ('' != $author_ID) { ?>
                        <div class="author">
                            <?php echo $author_thumb; ?>
                            <h3>By <?php echo get_the_title($author_ID); ?></h3>
                            <?php echo $author_title; ?>
                            <?php if ('' != $author_page_link_ID) { ?>
                                <div class="standard"><a
                                            href="<?php echo get_permalink($author_page_link_ID); ?>"><?php echo $author_page_link_title; ?>
                                        →</a></div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php if (have_rows('pinned_articles', get_option('page_for_posts'))): ?>
                        <ul class="pinned-articles">
                            <h3 class="pinned-articles__title">Pinned Articles</h3>
                            <?php while (have_rows('pinned_articles', get_option('page_for_posts'))): the_row();
                                $article = get_sub_field('article'); ?>
                                <li>
                                    <a href="<?php echo get_permalink($article->ID); ?>">→ <?php echo $article->post_title; ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                    <div class="categories">
                        <h3 class="categories__title">Categories</h3>
                        <ul class="category-list">
                            <?php
                            $categories = get_categories(array(
                                'orderby' => 'name',
                                'order' => 'ASC'
                            ));

                            foreach ($categories as $category) {
                                $category_link = sprintf(
                                    '<a href="%1$s" alt="%2$s">→ %3$s</a>',
                                    esc_url(get_category_link($category->term_id)),
                                    esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)),
                                    esc_html($category->name)
                                ); ?>
                                <li><?php echo $category_link; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="recent-articles">
                        <h3 class="recent-articles__title">Recent Articles</h3>
                        <?php
                        $new_args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 5
                        );
                        $new_query = new WP_Query($new_args);
                        if ($new_query->have_posts()) {
                            echo "<ul class='recent-article-list'>";
                            while ($new_query->have_posts()) {
                                $new_query->the_post(); ?>
                                <li><a href="<?php echo the_permalink(); ?>">→ <?php the_title(); ?></a></li>
                            <?php }
                            echo "</ul>";
                        }
                        wp_reset_postdata();
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    $description = get_field('cta_text', 'options');
    ?>
    <section class="content-module learn-about-cta">
        <div class="l-wrapper learn-about-cta__content">
            <?php if ($description): ?>
                <?php echo $description; ?>
            <?php endif; ?>

            <?php
            $link = get_field('cta_link', 'options');
            if ($link):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="learn-about-cta__link button" href="<?php echo esc_url($link_url); ?>"
                   target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_template_part('components/footer'); ?>
