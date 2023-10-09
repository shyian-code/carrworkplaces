<?php
$background_color = get_sub_field('background_color');

$content_description = get_sub_field('content_description');
?>

<section class="content-module team-member-slider <?php echo $background_color; ?>">
    <div class="l-wrapper">
        <?php if ($content_description): ?>
            <div class="team-member-slider__content-description">
                <?php echo $content_description; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if (have_rows('team_slider')): ?>
        <div class="team-member-slider__slider slick-slider">
            <?php while (have_rows('team_slider')): the_row();
                $team_member_photo = get_sub_field('team_member_photo');
                $team_member_position = get_sub_field('team_member_position');
                $team_member_name = get_sub_field('team_member_name');
                ?>
                <?php if ($team_member_photo || $team_member_position || $team_member_name): ?>
                    <div class="team-member-slider__slider-item slick-slide">
                        <?php echo wp_get_attachment_image($team_member_photo['id'], 'team-member', false,
                              array('class' => 'team-member-slider__person-photo'));
                        ?>
                        <div class="team-member-slider__slider-item-overlay">
                            <span class="team-member-slider__person-position"><?php echo $team_member_position; ?></span>
                            <p class="team-member-slider__person-name"><?php echo $team_member_name; ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>
