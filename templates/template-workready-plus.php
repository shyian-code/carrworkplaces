<?php /* Template Name: WorkReady Plus */
get_template_part( 'components/header' ); 
get_template_part( 'components/breadcrumbs' ); 
get_template_part( 'components/hero' );  ?>
<main>
    <?php if ( have_rows( 'sections' ) ): ?>
        <?php while ( have_rows( 'sections' ) ): the_row(); ?>

            <?php get_template_part( 'parts/flexible/flexible', get_row_layout() ); ?>

        <?php endwhile; ?>
    <?php endif; ?>
    <?php get_template_part( 'components/timeline' ); ?>
  <?php get_template_part( 'components/content-components' ); ?>

  <?php get_template_part( 'components/clients-panel-component' ); ?>

  <?php // get_template_part( 'components/content-components-ut' ); ?>
</main>
<?php get_template_part( 'components/footer' ); ?>