<?php
//Template Name: Location page

get_template_part( 'components/header' );
get_template_part( 'parts/hero-location' );
?>

<main>
    <?php get_template_part( 'components/content-components' ); ?>

    <?php if ( have_rows( 'sections' ) ): ?>
        <?php while ( have_rows( 'sections' ) ): the_row(); ?>

            <?php get_template_part( 'parts/flexible/flexible', get_row_layout() ); ?>

        <?php endwhile; ?>
    <?php endif; ?>

    <?php if ( have_rows( 'flexible_location' ) ): ?>
        <?php while ( have_rows( 'flexible_location' ) ): the_row(); ?>

            <?php get_template_part( 'parts/flexible-location/flexible', get_row_layout() ); ?>

        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_template_part( 'components/footer' ); ?>
