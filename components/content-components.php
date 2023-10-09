<?php /* Content Modules */

if (have_rows('content_modules')):

    while (have_rows('content_modules')) : the_row(); ?>
        <div class="content-page-default">
            <?php
            $content_type = get_sub_field('content_type');

            /* Editor */
            if ('editor' == $content_type) {

                get_template_part('components/editor-component');
            }

            /* Cards */
            if ('cards' == $content_type) {

                get_template_part('components/cards-component');
            }

            /* Image Panel */
            if ('image-panel' == $content_type) {

                get_template_part('components/image-panel-component');
            }

            /* Map Panel */
            if ('map-panel' == $content_type) {

                get_template_part('components/map-panel-component');
            }

            /* List Panel */
            if ('list-panel' == $content_type) {

                get_template_part('components/list-panel-component');
            }

            /* Clients Panel */
            if ('clients-panel' == $content_type) {

                get_template_part('components/clients-panel-component');
            }

            /* Content Row Panel */
            if ('content-row-panel' == $content_type) {

                get_template_part('components/content-row-panel-component');
            }

            /* Testimonial / Industries Panel */
            if ('testimonial-industries-panel' == $content_type) {

                get_template_part('components/testimonial-industries-panel-component');
            }

            /* Feature Panel */
            if ('feature-panel' == $content_type) {

                get_template_part('components/feature-panel-component');
            }

            /* Team Member Panel */
            if ('team-member-panel' == $content_type) {

                get_template_part('components/team-member-panel-component');
            }

            /* Text Row Panel */
            if ('text-row-panel' == $content_type) {

                get_template_part('components/text-row-panel-component');
            }

            if ('code-embed' == $content_type) {

                get_template_part('components/code-embed');
            }
            ?>
        </div>
    <?php
    endwhile;
endif; ?>