<?php
$background_color = get_sub_field('background_color');

?>

<section class="content-module accordion <?php echo $background_color; ?>">
    <div class="l-wrapper">
        <div class="accordion__list-wrapper">
            <?php if (have_rows('accordion_list')): ?>
                <div id="faq_accordion" class="accordion__list">
                    <?php while (have_rows('accordion_list')): the_row();
                        $title = get_sub_field('title');
                        $description = get_sub_field('description'); ?>
                        <?php if($title || $description): ?>
                            <div class="accordion__list-item">
                                <h6 class="accordion__list-title"><?php echo $title; ?></h6>
                                <div class="accordion__list-description-wrapper">
                                    <?php echo $description; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <div id="demo"></div>
        </div>
    </div>
</section>
