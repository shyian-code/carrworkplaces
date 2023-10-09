<?php /* Editor */

if( have_rows('editor') ):

	while( have_rows('editor') ): the_row();

    $show_section = get_sub_field('show_section');

	if (false != $show_section) {

		$editor = get_sub_field('editor');
		$click_to_show_more_content = get_sub_field('click_to_show_more_content');

        if ('' != $editor) { ?>
            <section id="id-content-module--editor" class="content-module--editor content-module m-wrapper editor<?php if (true == $click_to_show_more_content) {?> hide-content<?php } ?>">
            	<?php echo $editor; ?>
            	<?php if (true == $click_to_show_more_content) {?><div class="reveal-content"><div>Read More</div></div><?php } ?>
            </section>
		<?php }
	}
	endwhile; ?>
<?php endif; ?>
