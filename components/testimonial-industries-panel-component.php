<?php /* Testimonial */ 

if ( have_rows('testimonial_industries_panel') ): 

	while ( have_rows('testimonial_industries_panel') ): the_row();

    $show_section = get_sub_field('show_section');


	if (false != $show_section) {

		$testimonial = get_sub_field('testimonial');
    	$industries = get_sub_field('industries');

    	if (true == $testimonial['add_testimonial'] && true == $industries['add_industries']) {
    		$class= ' blocks';
    	} else {
    		$class = '';
    	} 

    	if ('' != $industries['title']) {
    		$title = '<h4>'.$industries['title'].'</h4>';
    	} ?>

		<section class="content-module testimonial-industries<?php echo $class.ns_background($background); ?>">
			
			<?php if (true == $testimonial['add_testimonial']) { ?>
				<div class="block testimonial">
					<blockquote>
						<p><?php echo $testimonial['testimonial']; ?></p>
						<h4><?php echo $testimonial['name']; ?></h4>
						<h5><?php echo $testimonial['title']; ?></h5>
					</blockquote>
				</div>
			<?php } 

			if (true == $industries['add_industries']) { ?>
				<div class="block industries">
					
					<div class="industry-list">
						<?php echo $title; ?>
						<ul>
							<?php foreach ($industries['list'] as $items) {
								foreach ($items as $item) {
									echo '<li>'.$item.'</li>';
								}
							} ?>
						</ul>
					</div>
				</div>
			<?php } ?>	
		</section>
	<?php }
	endwhile; ?>
<?php endif; ?>