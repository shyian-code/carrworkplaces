<?php /* List Panel */

if( have_rows('list_panel') ):
    while( have_rows('list_panel') ): the_row();
        $background_color = get_sub_field('background_color');
        $headline = get_sub_field('section_header');
        $price_label = get_sub_field('price_label');
        $headline_description = get_sub_field('section_header_sub_text');
        $notice_label = get_sub_field('notice_label');
        $show_section = get_sub_field('show_section');

        if (false != $show_section) { ?>

            <section class="content-module list-panel <?php echo $background_color; ?>">

                <div class="l-wrapper">
                    <?php if($headline || $price_label || $headline_description): ?>
                        <div class="list-panel__headline-wrapper">
                            <h3 class="list-panel__title"><?php echo $headline; ?></h3>
                            <p class="list-panel__price-label"><?php echo $price_label; ?></p>
                        </div>

                        <p class="list-panel__headline-description"><?php echo $headline_description; ?></p>
                    <?php endif; ?>
                </div>
                <?php if( have_rows('list') ): ?>
                    <ul class="panel-default__list">
                        <?php while( have_rows('list') ): the_row();
                            $item = get_sub_field('item');

                            if ('' != $item) { ?>
                                <li class="panel-default__list-item"><?php echo $item; ?></li>
                            <?php }
                        endwhile; ?>
                    </ul>

                    <div class="l-wrapper">
                        <?php if (have_rows('list')): ?>
                            <ul class="list-panel__benefits-list">
                                <?php while (have_rows('list')): the_row();
                                    $item = get_sub_field('item');

                                    if ('' != $item) { ?>
                                        <li class="list-panel__benefits-list-item"><?php echo $item; ?></li>
                                    <?php }
                                endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>


                <?php endif;?>
                <div class="l-wrapper list-panel__footer">
                    <div class="list-panel__buttons-wrapper">
                        <?php
                        $link = get_sub_field('button_link');
                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="list-panel__purple-link button purple"
                               href="<?php echo esc_url($link_url); ?>"
                               target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        <?php endif; ?>


                        <?php
                        $link = get_sub_field('button_two_link');
                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="list-panel__orange-link button orange"
                               href="<?php echo esc_url($link_url); ?>"
                               target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        <?php endif; ?>
                    </div>

                    <?php if($notice_label): ?>
                        <div class="list-panel__notice-wrapper">
                            <?php echo $notice_label; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php }
    endwhile; ?>
<?php endif; ?>
<!---->
<?php
///* List Panel */
//$background_color = get_sub_field('background_color');
//
//$headline = get_sub_field('headline');
//$price_label = get_sub_field('price_label');
//$headline_description = get_sub_field('headline_description');
//$notice_label = get_sub_field('notice_label');
//?>
<!--<section class="content-module list-panel --><?php //echo $background_color; ?><!--">-->
<!---->
<!--    <div class="l-wrapper">-->
<!--        --><?php //if($headline || $price_label || $headline_description): ?>
<!--            <div class="list-panel__headline-wrapper">-->
<!--                <h3 class="list-panel__title">--><?php //echo $headline; ?><!--</h3>-->
<!--                <p class="list-panel__price-label">--><?php //echo $price_label; ?><!--</p>-->
<!--            </div>-->
<!---->
<!--            <p class="list-panel__headline-description">--><?php //echo $headline_description; ?><!--</p>-->
<!--        --><?php //endif; ?>
<!--    </div>-->
<!---->
<!--    <div class="l-wrapper">-->
<!--        --><?php //if (have_rows('benefits_list')): ?>
<!--            <ul class="list-panel__benefits-list">-->
<!--                --><?php //while (have_rows('benefits_list')): the_row();
//                    $item = get_sub_field('benefit_item');
//
//                    if ('' != $item) { ?>
<!--                        <li class="list-panel__benefits-list-item">--><?php //echo $item; ?><!--</li>-->
<!--                    --><?php //}
//                endwhile; ?>
<!--            </ul>-->
<!--        --><?php //endif; ?>
<!--    </div>-->
<!---->
<!--    <div class="l-wrapper list-panel__footer">-->
<!--        <div class="list-panel__buttons-wrapper">-->
<!--            --><?php
//            $link = get_sub_field('purple_link');
//            if ($link):
//                $link_url = $link['url'];
//                $link_title = $link['title'];
//                $link_target = $link['target'] ? $link['target'] : '_self';
//                ?>
<!--                <a class="list-panel__purple-link button purple"-->
<!--                   href="--><?php //echo esc_url($link_url); ?><!--"-->
<!--                   target="--><?php //echo esc_attr($link_target); ?><!--">--><?php //echo esc_html($link_title); ?><!--</a>-->
<!--            --><?php //endif; ?>
<!---->
<!---->
<!--            --><?php
//            $link = get_sub_field('orange_link');
//            if ($link):
//                $link_url = $link['url'];
//                $link_title = $link['title'];
//                $link_target = $link['target'] ? $link['target'] : '_self';
//                ?>
<!--                <a class="list-panel__orange-link button orange"-->
<!--                   href="--><?php //echo esc_url($link_url); ?><!--"-->
<!--                   target="--><?php //echo esc_attr($link_target); ?><!--">--><?php //echo esc_html($link_title); ?><!--</a>-->
<!--            --><?php //endif; ?>
<!--        </div>-->
<!---->
<!--        --><?php //if($notice_label): ?>
<!--            <div class="list-panel__notice-wrapper">-->
<!--                --><?php //echo $notice_label; ?>
<!--            </div>-->
<!--        --><?php //endif; ?>
<!--    </div>-->
<!--</section>-->
<!---->
