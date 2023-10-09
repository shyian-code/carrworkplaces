<?php
$margin = get_sub_field('margin');
?>

<section class="content-module l-wrapper milestone-section <?php echo $margin; ?>">
    <?php if (have_rows('milestones_list')): ?>
        <ul class="milestones-list">
            <?php while (have_rows('milestones_list')): the_row();
                $counter = get_sub_field('counter');
                $headline = get_sub_field('headline');
                ?>
                <li class="milestones-list__item">
                    <span class="milestones-list__item-num">
                        <?php echo $counter; ?>
                    </span>
                    <p class="milestones-list__item-headline"><?php echo $headline; ?></p>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php echo ns_link_type('button'); ?>
    <?php endif; ?>
</section>
