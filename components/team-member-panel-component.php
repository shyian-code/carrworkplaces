<?php /* Team Member Panel */

if( have_rows('team_member_panel') ): 
while( have_rows('team_member_panel') ): the_row();

    $show_section = get_sub_field('show_section');

	if (false != $show_section) { ?>
	<section class="content-module team-member-panel">
		
		<?php echo ns_section_header(); ?>
		<div class="inner-wrapper l-wrapper">
		<?php if( have_rows('team_members') ): ?>

			<?php while( have_rows('team_members') ): the_row(); 
				$team_member_ID = get_sub_field('team_member');
				$team_member_title = get_field('title', $team_member_ID); 
				$team_member_thumb = get_the_post_thumbnail($team_member_ID, 'thumbnail'); 
				if ('' != $team_member_thumb) {
					$team_member_thumb = '<figure>'.$team_member_thumb.'</figure>';
				}?> 

				<div class="bio">
					<?php echo $team_member_thumb; ?>
					<h3><?php echo get_the_title($team_member_ID); ?></h3>
					<p><?php echo $team_member_title; ?> </p>
				</div>


			<?php endwhile; ?>
			
		<?php endif;?>

		</div>
		<?php echo ns_link_type('button'); ?>
	</section>
	<?php } 
endwhile; ?>
<?php endif; ?>