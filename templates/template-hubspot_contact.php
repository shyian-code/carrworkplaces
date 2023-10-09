<?php
//Template Name: HubSpot Contact page

get_template_part( 'components/header' );

$contact_image = get_field('contact_image');
$form_title = get_field('form_title');
$form_subtitle = get_field('form_subtitle');

$contact_form = get_field('contact_form');
?>

<div class="contact-section start-contact-page">
    <div class="l-wrapper">
        <?php if ($contact_image): ?>
            <div class="start-contact-page__image-block">
                <?php echo wp_get_attachment_image($contact_image['id'], 'large', false, array('class' => 'contact__image-block--img')); ?>
            </div>
        <?php endif; ?>

        <?php if ($form_title || $form_subtitle || $contact_form): ?>
            <div class="start-contact-page__form-block">
                <h1 class="start-contact-page__title"><?php echo $form_title; ?></h1>
                <?php echo $form_subtitle; ?>
                <div class="form-wrapper">
                    <?php echo $contact_form; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_template_part( 'components/footer' ); ?>
