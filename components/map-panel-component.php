<?php /* Map Panel */

if( have_rows('map_panel') ): 
while( have_rows('map_panel') ): the_row();

    $show_section = get_sub_field('show_section');
    $background = get_sub_field('background');
    $map_embed = get_sub_field('map_embed');
    $map_ID = get_sub_field('map_id');

    if ($map_ID > 0) {
    	$map = do_shortcode('[wpgmza id="'.$map_ID.'"]');
    } else {
    	$map = '';
    }

    if ('' != $map) 
    	$map = '<div class="map clearfix">'.$map.'</div>';
    else $map = '';

	if (false != $show_section) { ?>
	<section class="content-module map-panel<?php echo ns_background($background); ?>">
		<div class="l-wrapper">
		
		<?php echo ns_section_header(); ?>
		<?php echo $map; ?>
		
		<?php /* $counter = 1; 

		if( have_rows('address_list') ): ?>
			<div class="address-list">
			<?php while( have_rows('address_list') ): the_row(); 
				$address = get_sub_field('address'); 

				if ('' != $address) { ?>
        		<div class="address">
        			<span class="number"><?php echo $counter++; ?></span>
        			<address><?php echo $address; ?><address>
        		</div>
				<?php }
			endwhile; ?>
			</div>
		<?php endif; */ ?>
		</div>
	</section>
	<?php }
endwhile; ?>
<?php endif; ?>