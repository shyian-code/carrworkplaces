<?php /* Clients */
$border = get_sub_field('border');

if (have_rows('clients_panel')):
    while (have_rows('clients_panel')): the_row();

        $show_section = get_sub_field('show_section');

        if (false != $show_section) { ?>

            <section id="id-clients-panel" class="content-module cpanel-default  clients-panel <?php echo $border; ?>">
                <div class="l-wrapper">
                    <div class="cpanel-title">
                        <?php echo ns_section_header(); ?>
                    </div>

                    <?php if (have_rows('client_logos')): ?>
                        <ul class="clients-panel__list panel-component">
                            <?php while (have_rows('client_logos')): the_row();
                                $client_logo = get_sub_field('client_logo');

                                if ('' != $client_logo) { ?>
                                    <li class="clients-panel__list-item gray-filter">
                                        <?php echo wp_get_attachment_image($client_logo, 'full'); ?></li>
                                <?php }
                            endwhile; ?>
                        </ul>
                        <?php echo ns_link_type('button'); ?>
                    <?php endif; ?>
            </section>
        <?php }
    endwhile; ?>
<?php endif; ?>
