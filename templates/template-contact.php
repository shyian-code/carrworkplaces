<?php
//Template Name: Contact page

get_template_part( 'components/header' );

$form_title = get_field('form_title');
$form_subtitle = get_field('form_subtitle');
?>

<div class="contact-section contact-page">
    <div class="l-wrapper">
        <?php if ($contact_image = get_field('contact_image')): ?>
            <div class="contact__image-block">
                <?php echo wp_get_attachment_image($contact_image['id'], 'large', false, array('class' => 'contact__image')); ?>
            </div>
        <?php endif; ?>

        <?php if (($contact_form = get_field('general_contact_form')) && is_array($contact_form) || $form_title || $form_subtitle): ?>
            <div class="contact__g-form-block">
                <h1 class="contact__title"><?php echo $form_title; ?></h1>
                <?php echo $form_subtitle; ?>
                <?php echo do_shortcode("[gravityform id='{$contact_form['id']}' title='false' description='false' ajax='true']"); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_template_part( 'components/footer' ); ?>
