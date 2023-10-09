<?php
    $icon = get_sub_field('icon');
    $label = get_sub_field('label');

    $testimonial_text = get_sub_field('testimonial_text');
    $client_name = get_sub_field('client_name');
    $client_description = get_sub_field('client_description');
    $industries_title = get_sub_field('industries_title');
?>

<section class="content-module testimonial l-wrapper">
    <div class="testimonial__text-wrapper">
        <?php if($testimonial_text || $client_name || $client_description): ?>
            <article class="testimonial__text">
                <p class="testimonial__client-text"><?php echo $testimonial_text; ?></p>
                <p class="testimonial__client-name"><?php echo $client_name; ?></p>
                <span class="testimonial__client-description"><?php echo $client_description; ?></span>
            </article>
        <?php endif; ?>
    </div>

    <div class="testimonial__industries">
        <?php if($industries_title): ?>
            <h5 class="testimonial__industries-title"><?php echo $industries_title; ?></h5>
        <?php endif; ?>
        <?php if( have_rows('industries_list') ): ?>
            <ul class="testimonial__industries-list">
                <?php while( have_rows('industries_list') ): the_row();
                    $indastries_name = get_sub_field('indastries_name');
                    ?>
                    <li class="testimonial__industries-list-item">
                        <?php echo $indastries_name; ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>
    </div>

</section>
