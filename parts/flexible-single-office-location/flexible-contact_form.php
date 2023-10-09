<?php
    $background_color = get_sub_field('background_color');
    $contact_title = get_sub_field('contact_title');
?>

<section class="contact-section contact <?php echo $background_color; ?>">
    <div class="l-wrapper">
        <?php if (($contact_form = get_sub_field('contact_form')) && is_array($contact_form) || $contact_title): ?>
            <div class="contact__g-form-block">
                <h2><?php echo $contact_title; ?></h2>
                <?php echo do_shortcode("[gravityform id='{$contact_form['id']}' title='false' description='false' ajax='true']"); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
