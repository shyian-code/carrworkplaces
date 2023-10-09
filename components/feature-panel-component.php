<?php /* Feature Panel */

if( have_rows('feature_panel') ):
while( have_rows('feature_panel') ): the_row();

    $show_section = get_sub_field('show_section');
    $feature_one = get_sub_field('feature_one');
    $feature_two = get_sub_field('feature_two');
    $feature_three = get_sub_field('feature_three');


	if (false != $show_section) {  ?>
		<section class="content-module l-wrapper feature-panel">

			<div class="inner-wrapper">
				<div class="feature">
					<h2><?php echo $feature_one['title']; ?></h2>
					<?php echo $feature_one['text']; ?>
				</div>

				<div class="feature">
					<h2><?php echo $feature_two['title']; ?></h2>
					<?php echo $feature_two['text']; ?>
				</div>

				<div class="feature">
					<h2><?php echo $feature_three['title']; ?></h2>
					<?php echo $feature_three['text']; ?>
				</div>
			</div>
		</section>
	<?php }
endwhile; 
endif; ?>