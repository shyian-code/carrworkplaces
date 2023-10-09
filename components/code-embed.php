<?php /* Code Embed */

if( have_rows('code_embed') ):

	while( have_rows('code_embed') ): the_row();

    $show_section = get_sub_field('show_section');

	if (false != $show_section) {

		$text = get_sub_field('text');

        if ('' != $text) { ?>
            <section id="id-code-embed id-embed-form" class="code-embed embed-form">
            	<?php echo $text; ?>
            </section>
		<?php }
	}
	endwhile; ?>
<?php endif; ?>
