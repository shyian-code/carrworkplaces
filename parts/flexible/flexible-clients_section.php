<?php
    $border = get_sub_field('border');
?>

<section class="content-module clients-panel <?php echo $border; ?>">
    <div class="l-wrapper">
        <?php if ($clients_title = get_sub_field('clients_title')): ?>
            <h3 class="clients-panel__title">
                <?php echo $clients_title; ?>
            </h3>
        <?php endif; ?>

        <?php if (have_rows('client_logos')): ?>
            <ul class="clients-panel__list">
                <?php while (have_rows('client_logos')): the_row();
                    $client_logo = get_sub_field('client_logo'); ?>
                    <li class="clients-panel__list-item">
                        <?php echo wp_get_attachment_image($client_logo, 'full'); ?>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php echo ns_link_type('button'); ?>
        <?php endif; ?>
    </div>
</section>
