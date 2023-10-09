<?php
//Template Name: Single Office Location page

get_template_part( 'components/header' );
get_template_part( 'components/hero' );
get_template_part( 'parts/hero-location' );

?>

<main>
    <?php get_template_part( 'components/content-components' ); ?>

    <?php if ( have_rows( 'flexible_single_office_location' ) ): ?>
        <?php while ( have_rows( 'flexible_single_office_location' ) ): the_row(); ?>

            <?php get_template_part( 'parts/flexible-single-office-location/flexible', get_row_layout() ); ?>

        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_template_part( 'components/footer' ); ?>
