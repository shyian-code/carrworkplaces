<?php
    $text = get_sub_field('text');
?>

<section class="content-module contact-cta l-wrapper">
        <div class="contact-cta__content-wrapper">
            <div class="contact-cta__text">
                <?php if ($text): ?>
                    <?php echo $text; ?>
                <?php endif; ?>
            </div>
        </div>
</section>
