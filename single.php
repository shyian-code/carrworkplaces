<?php /* Single Page */

get_template_part( 'components/header' );

    $hero_image = get_the_post_thumbnail_url(get_the_ID(), 'hero-medium');
    $author_ID = get_field('author');
    $author_title = get_field('title', $author_ID);
    $author_thumb = get_the_post_thumbnail($author_ID, 'thumbnail');

    $author_page_link_object = get_field('page_link', $author_ID);
    $author_page_link_title = $author_page_link_object->post_title;
    $author_page_link_ID = $author_page_link_object->ID;

if ('' != $author_thumb) {
	$author_thumb = '<figure>'.$author_thumb.'</figure>';
} ?>

<section class="blog-hero" style="background: url(<?php echo $hero_image; ?>) no-repeat center; background-size: cover;">
	<div class="l-wrapper">
		<div class="hero-content transparent">
			<h1 class="page-title"><?php the_title(); ?></h1>
<!--			<h2><a href="<?php /*
------- 2018-09-20--AJ --------
			Original line was h2 and linked to itself. updated to h1 and removed self link.
-------  --------
			echo get_permalink($featured_article->ID); ?>"><?php the_title(); */?></a></h2>

			-->
			<span class="post-date"><?php echo get_the_time('M jS, Y'); ?></span>
		</div>
	</div>
</section>

<main>
	<article class="l-wrapper article content-single">
	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="content">
				<?php the_content(); ?>
			</div>
            <div class="sidebar">
<!--                --><?php //if ('' != $author_ID) { ?>
<!--                    <div class="author">-->
<!--                        --><?php //echo $author_thumb; ?>
<!--                        <h3>By --><?php //echo get_the_title($author_ID); ?><!--</h3>-->
<!--                        --><?php //echo $author_title; ?>
<!--                        --><?php //if ('' != $author_page_link_ID) { ?>
<!--                            <div class="standard"><a href="--><?php //echo get_permalink($author_page_link_ID); ?><!--">--><?php //echo $author_page_link_title; ?><!-- →</a></div>-->
<!--                        --><?php //} ?>
<!--                    </div>-->
<!--                --><?php //} ?>
                <?php if( have_rows('pinned_articles', get_option('page_for_posts')) ): ?>
                    <ul class="pinned-articles">
                        <h3 class="pinned-articles__title">Pinned Articles</h3>
                        <?php while( have_rows('pinned_articles', get_option('page_for_posts')) ): the_row();
                            $article = get_sub_field('article'); ?>
                            <li><a href="<?php echo get_permalink($article->ID); ?>">→ <?php echo $article->post_title; ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>

                <div class="categories">
                    <h3 class="categories__title">Categories</h3>
                    <ul class="category-list">
                        <?php
                        $categories = get_categories( array(
                            'orderby' => 'name',
                            'order'   => 'ASC'
                        ) );

                        foreach( $categories as $category ) {
                            $category_link = sprintf(
                                '<a href="%1$s" alt="%2$s">→ %3$s</a>',
                                esc_url( get_category_link( $category->term_id ) ),
                                esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
                                esc_html( $category->name )
                            ); ?>
                            <li><?php echo $category_link; ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="recent-articles">
                    <h3 class="recent-articles__title">Recent Articles</h3>
                    <?php
                    $new_args = array(
                        'post_type'	=>	'post',
                        'posts_per_page'	=>	5
                    );
                    $new_query = new WP_Query($new_args);
                    if($new_query->have_posts()) {
                        echo "<ul class='recent-article-list'>";
                        while($new_query->have_posts()){ $new_query->the_post();?>
                            <li><a href="<?php echo the_permalink(); ?>">→ <?php the_title(); ?></a></li>
                        <?php }
                        echo "</ul>";
                    }
                    wp_reset_postdata();
                    ?>

                </div>
            </div>
		<?php endwhile; ?>
	<?php endif; ?>
	</article>

    <section class="more-news">
        <div class="l-wrapper">
            <h2>Related Posts</h2>
            <div class="inner-wrapper">
                <?php $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'date',
                    'order' => 'DESC'
                );

                get_template_part( 'components/post-loop' ); ?>
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

    <?php get_template_part( 'components/footer' ); ?>

</main>
