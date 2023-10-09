<?php
    $background_color = get_sub_field('background_color');
    $contact_title = get_sub_field('contact_title');

    $contact_form = get_sub_field('contact_form');
?>

<section class="contact-section location-contact <?php echo $background_color; ?>">
    <div class="l-wrapper">
<!--        --><?php //if (($contact_form = get_sub_field('contact_form')) && is_array($contact_form) || $contact_title): ?>
        <?php if ($contact_title || $contact_form): ?>
            <div class="location-contact__g-form-block">
                <h2><?php echo $contact_title; ?></h2>
<!--                --><?php //echo do_shortcode("[gravityform id='{$contact_form['id']}' title='false' description='false' ajax='true']"); ?>
                <div id="location-hubspot-form" class="location-contact__g-form-wrapper">
                    <?php echo $contact_form; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
