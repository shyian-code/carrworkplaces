<?php /* Image Panel */

if( have_rows('image_panel') ): ?>
	<?php while( have_rows('image_panel') ): the_row();

    $show_section = get_sub_field('show_section');
    $layout = get_sub_field('layout');
	$image = get_sub_field('image');
    $tagline = get_sub_field('tagline');
    $title = get_sub_field('title');
	$text = get_sub_field('text');

	if ('layout-one' == $layout) {
		$layout = ' layout-one';
	} else {
		$layout = ' layout-two';
	}

	if ('' != $image) {
		$image_sizes = $image['sizes'];
		$image = $image_sizes['hero-medium'];
	} else {
		$image = '';
	}

	if ('' != $tagline) {
		$tagline = '<h5>'.$tagline.'</h5>';
	} else {
		$tagline = '';
	}

	if ('' != $title) {
		$title = '<h2>'.$title.'</h2>';
	} else {
		$title = '';
	}

	if (false != $show_section) { ?>
		<section class="content-module--image-panel content-module image-panel<?php echo $layout; ?>" style="background: url(<?php echo $image; ?>) no-repeat center; background-size: cover;">
			<div class="inner-wrapper">
				<div class="card">
					<?php echo $tagline; ?>
					<?php echo $title; ?>
					<?php echo $text; ?>
					<?php echo ns_link_type('button'); ?>
					<?php echo ns_link_type('standard'); ?>
				</div>
			</div>
		</section>
	<?php }
	endwhile; ?>
<?php endif; ?>
