<?php if (have_rows('hero_location')): ?>
    <?php while (have_rows('hero_location')) : the_row();
        $subtitle = get_sub_field('subtitle');
        $title = get_sub_field('title');
        $description = get_sub_field('description');
        $book_link = get_sub_field('book_link');
        $file = get_sub_field('file_link');
        $hero_image = get_sub_field('background_image')['sizes']['hero-large'];
        ?>
        <section class="hero-location-section"
                 style="background: url(<?php echo $hero_image; ?>) no-repeat top; background-size: cover;">
            <div class="l-wrapper">
                <div class="hero-content">
                    <?php if ($subtitle || $title || $description): ?>
                        <h4 class="sub-title"><?php echo $subtitle; ?></h4>
                        <h1 class="page-title"><?php echo $title; ?></h1>
                        <div class="description">
                            <?php echo $description; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($book_link):
                        $link_url = $book_link['url'];
                        $link_title = $book_link['title'];
                        $link_target = $book_link['target'] ? $book_link['target'] : '_self';
                        ?>
                        <a class="book_link button orange" href="<?php echo esc_url($link_url); ?>"
                           target="<?php echo esc_attr($link_target); ?>">
                            <?php echo esc_html($link_title); ?>
                        </a>
                    <?php endif; ?>

                    <?php if($file): ?>
                        <a class="book_file" target="_blank" href="<?php echo $file['url']; ?>">
                            <?php echo $file['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
