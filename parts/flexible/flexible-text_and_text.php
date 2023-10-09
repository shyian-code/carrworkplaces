<?php
    $left_side_text = get_sub_field('left_side_text');
    $right_side_text = get_sub_field('right_side_text');


    $content_position = get_sub_field('position');
    $position = $content_position ? 'right' : 'left';
    $text_position = $content_position ?  'left' : 'right';
?>

<section class="content-module text_and_text">
    <div class="l-wrapper">
        <?php if ($left_side_text || $right_side_text): ?>
            <div class="block block-one <?php echo $position; ?>">
                <?php echo $left_side_text; ?>
            </div>
            <div class="block block-two <?php echo $text_position; ?>">
                <div class="text-wrapper">
                    <?php echo $right_side_text; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

