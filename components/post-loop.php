<?php /* Posts Loop */

global $args;



$the_query = new WP_Query($args); ?>



<section class="posts">
<?php if ( $the_query->have_posts() ): ?>

	<?php while ( $the_query->have_posts() ) : $the_query->the_post();

	$featured_image = get_the_post_thumbnail(get_the_ID(), 'card', 'style=visibility: hidden;');
	$featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'card');

	if ('' != $featured_image) {
		$featured_image = '<a href="'.get_permalink().'"><figure style="background: url('.$featured_image_url.') no-repeat center center; background-size: cover;">
			'.$featured_image.'
		</figure></a>';
	} ?>

	<article class="card">
			<?php echo $featured_image; ?>
		<div class="card-inner">
            <h3 class="post-title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
            <span class="post-date"><?php echo the_time('M jS, Y'); ?></span>
		</div>
	</article>
	<?php endwhile; ?>

	<?php if (!is_single()) { ?>
	<!-- <nav class="pagination">
		<ul class="clearfix">
			<li class="older"><?php next_posts_link( 'Older Entries' ); ?></li>
			<li class="newer"><?php previous_posts_link( 'Newer Entries' ); ?></li>
		</ul>
	</nav> -->
	<div id="load-more">
		<div class="button">
			<a href="/">Show More</a>
		</div>
	</div>
	<?php } ?>

<?php else: ?>
	<div class="no-posts"><p>No Posts</p></div>

<?php endif; wp_reset_postdata(); ?>
</section>
