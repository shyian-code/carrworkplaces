<?php
    $background_color = get_sub_field('background_color');
    $title = get_sub_field('title');
?>

<section class="content-module four-columns-section <?php echo $background_color; ?>">
    <div class="l-wrapper">
        <?php if($title):?>
            <h2 class="four-columns-section__title"><?php echo $title; ?></h2>
        <?php endif; ?>

        <?php if (have_rows('description_list')): ?>
            <ul class="description-list">
                <?php while (have_rows('description_list')): the_row();
                    $headline = get_sub_field('headline');
                    $description = get_sub_field('description');
                    ?>
                    <li class="description-list__item">
                        <h4 class="description-list__item-headline"><?php echo $headline; ?></h4>
                        <p class="description-list__item-description"><?php echo $description; ?></p>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php echo ns_link_type('button'); ?>
        <?php endif; ?>
    </div>
</section>
