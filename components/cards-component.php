<?php /* Cards */

if( have_rows('cards') ):
while( have_rows('cards') ): the_row();

    $show_section = get_sub_field('show_section');
    
	if (false != $show_section) { ?>
		<section class="content-module l-wrapper cards">

			<?php echo ns_section_header(); ?>

			<div class="inner-wrapper">

			<?php if( have_rows('card') ):
			while( have_rows('card') ): the_row(); 

			$image = get_sub_field('image');
		    $tagline = get_sub_field('tagline');
		    $title = get_sub_field('title');
			$text = get_sub_field('text');

			$link = get_sub_field('button_link');
			$add_link = $link['add_button_link']; 

			if (false != $add_link) {

				$link_type = $link['link_type']; 
				$link_title = $link['link_title']; 

				if ('internal-page-link' == $link_type) {

					$link = $link['internal_page_link']; 
				} else if ('external-page-link' == $link_type) {

					$link = $link['external_page_link'];  
					$target = ' target="_blank"';
				} else if ('file-link' == $link_type) {	 

					$link = $link['file_link']; 
					$target = ' target="_blank"';
				} else if ('manual-link' == $link_type) {
					
					$link = $link['manual_link']; 
				}

				$link_start = '<a href="'.$link.'"'.$target.'>';
				$link_end = '</a>';
			} else {
				$link_start = '';
				$link_end = '';
			}

			if ('' != $image) {
				$image = '<figure>'.$link_start. wp_get_attachment_image($image['ID'], 'card') .$link_end.'</figure>';
			} else {
				$image = '';
			}

			if ('' != $tagline)
				$tagline = '<h5>'.$tagline.'</h5>';
			else $tagline = '';

			if ('' != $title)
				$title = '<h3>'.$link_start.$title.$link_end.'</h3>';
			else $title = ''; ?>
			
				<div class="card">
					<div class="card-inner">
						<?php echo $image;?>
						<div class="card-lower">
							<?php echo $tagline; ?>
							<?php echo $title; ?>
							<?php echo $text; ?>
							<?php echo ns_link_type('button'); ?>
							<?php echo ns_link_type('standard'); ?>
						</div>
					</div>
				</div>
				
			<?php endwhile;
			endif; ?>
			</div>
		</section>
	<?php }
endwhile; 
endif; ?>