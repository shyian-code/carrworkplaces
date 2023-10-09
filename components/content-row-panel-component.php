<?php /* Content Row Panel */

if( have_rows('content_row_panel') ): ?>
	<?php while( have_rows('content_row_panel') ): the_row();

    $show_section = get_sub_field('show_section');
    $background = get_sub_field('background');
    $media_type = get_sub_field('media_type');
    $layout = get_sub_field('layout');
    $text = get_sub_field('text_one');

    if ('image' == $media_type) {
    	$image = get_sub_field('image');

    	if ('' != $image) {
			$image_sizes = $image['sizes'];
			$image = wp_get_attachment_image($image['ID'], 'card');
		} else {
			$image = '';
		}
    } elseif ('slide-show' == $media_type) {
    	$slides = get_sub_field('slide_show');

    } elseif ('video' == $media_type) {
    	$video = get_sub_field('video');
    }

    if ('layout-one' == $layout) {
		$layout = ' layout-one';
	} else {
		$layout = ' layout-two';
	}

	if (false != $show_section) { ?>
		<section id="id-content-row-panel" class="content-module content-row-panel<?php echo ' '.$media_type.$layout.ns_background($background); ?>">
			<div class="inner-wrapper l-wrapper">
				<div class="block block-one">
					<?php echo $text; ?>
				</div>

				<div class="block block-two">
					<?php echo $image; ?>
					<?php if ('slide-show' == $media_type) {

						echo '<div class="slides">';

							foreach ($slides as $slide) {
									$image_sizes = $slide['sizes'];
									$slide_image = wp_get_attachment_image($slide['ID'], 'card');
					    		echo '<div class="slide">'.$slide_image.'</div>';

					    	}
					    echo '</div>';
					} ?>
					<?php echo $video; ?>
				</div>
			</div>
		</section>
	<?php }
	endwhile; ?>
<?php endif; ?>
