<?php /* Text Row Panel */

if (have_rows('text_row_panel')): ?>
    <?php while (have_rows('text_row_panel')): the_row();

        $show_section = get_sub_field('show_section');
        $text_one = get_sub_field('text_one');
        $text_two = get_sub_field('text_two');


        if (false != $show_section) { ?>
            <section class="content-module text-row-panel">
                <div class="inner-background">
                    <div class="inner-wrapper l-wrapper">
                        <div class="block block-one">
                            <?php echo $text_one; ?>
                            <?php echo ns_link_type('button'); ?>
                        </div>

                        <div class="block block-two">
                            <?php echo $text_two; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php }
    endwhile; ?>
<?php endif; ?>