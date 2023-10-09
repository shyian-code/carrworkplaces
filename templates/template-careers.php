<?php
//Template Name: Careers page

get_template_part( 'components/header' );
get_template_part( 'components/hero' );
?>

<main>
    <?php get_template_part( 'components/content-components' ); ?>

    <?php if ( have_rows( 'careers_sections' ) ): ?>
        <?php while ( have_rows( 'careers_sections' ) ): the_row(); ?>
            <?php get_template_part( 'parts/careers/flexible', get_row_layout() ); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_template_part( 'components/footer' ); ?>
