<?php
$background_color = get_sub_field('background_color');

$title = get_sub_field('title');
?>

<section class="content-module team-members <?php echo $background_color; ?>">
    <div class="l-wrapper">
        <?php if ($title): ?>
            <h2 class="team-members__title"><?php echo $title; ?></h2>
        <?php endif; ?>
    </div>
    <div class="l-wrapper">
        <?php if (have_rows('team_members_list')): ?>
            <div class="team-members__list">
                <?php while (have_rows('team_members_list')): the_row();
                    $team_member_photo = get_sub_field('team_member_photo');
                    $team_member_position = get_sub_field('team_member_position');
                    $team_member_name = get_sub_field('team_member_name');
                    ?>
                    <?php if ($team_member_photo || $team_member_position || $team_member_name): ?>
                        <div class="team-members__list-item">
                            <?php echo wp_get_attachment_image($team_member_photo['id'], 'team-member', false,
                                array('class' => 'team-members__person-photo'));
                            ?>
                            <div class="team-members__list-item-overlay">
                                <span class="team-members__person-position"><?php echo $team_member_position; ?></span>
                                <p class="team-members__person-name"><?php echo $team_member_name; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
