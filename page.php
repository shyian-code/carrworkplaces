<?php /* Default Page Template */

get_template_part( 'components/header' );
//get_template_part( 'components/breadcrumbs' );
get_template_part( 'components/hero' ); ?>

<?php $click_to_show_more_content = get_field('click_to_show_more_content'); ?>
<main>

	<?php get_template_part( 'components/content-components' ); ?>

    <?php if ( have_rows( 'sections' ) ): ?>
        <?php while ( have_rows( 'sections' ) ): the_row(); ?>

            <?php get_template_part( 'parts/flexible/flexible', get_row_layout() ); ?>

        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_template_part( 'components/footer' ); ?>
