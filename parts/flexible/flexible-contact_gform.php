<?php

$additional_text = get_sub_field('additional_text');
?>

<div class="">
    <div class="l-wrapper gform-full-size">
        <?php if (($contact_form = get_sub_field('form')) && is_array($contact_form) || $additional_text): ?>
            <div class="gform-full-size__g-form-block">
                <?php echo do_shortcode("[gravityform id='{$contact_form['id']}' title='false' description='false' ajax='true']"); ?>

                <?php echo $additional_text;?>
            </div>
        <?php endif; ?>
    </div>
</div>

