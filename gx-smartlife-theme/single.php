<?php
/**
 * The template for displaying all single posts
 *
 * @package GX_Smart_Life
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="content-area">
        <div class="main-content">
            <?php
            while (have_posts()) :
                the_post();
                ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="single-post-header">
                        <?php the_title('<h1 class="single-post-title">', '</h1>'); ?>

                        <div class="single-post-meta">
                            <span class="post-date">
                                <i class="far fa-calendar"></i>
                                <?php echo esc_html(get_the_date()); ?>
                            </span>

                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) :
                                ?>
                                <span class="post-categories">
                                    <i class="far fa-folder"></i>
                                    <?php
                                    foreach ($categories as $category) {
                                        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' .
                                             esc_html($category->name) . '</a> ';
                                    }
                                    ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </header>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="single-post-content entry-content">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'gx-smartlife'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>

                    <footer class="entry-footer">
                        <?php
                        // Tags
                        $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'gx-smartlife'));
                        if ($tags_list) {
                            printf(
                                '<div class="tags-links"><i class="fas fa-tags"></i> %s</div>',
                                $tags_list
                            );
                        }

                        // Social sharing
                        ?>
                        <div class="social-sharing">
                            <h3><?php esc_html_e('この記事をシェア', 'gx-smartlife'); ?></h3>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_permalink()); ?>"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="share-button share-facebook">
                                <i class="fab fa-facebook"></i> Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo esc_url(get_permalink()); ?>&text=<?php echo esc_attr(get_the_title()); ?>"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="share-button share-twitter">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                        </div>

                        <?php
                        edit_post_link(
                            sprintf(
                                wp_kses(
                                    __('Edit <span class="screen-reader-text">%s</span>', 'gx-smartlife'),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                wp_kses_post(get_the_title())
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                        ?>
                    </footer>
                </article>

                <?php
                // Post navigation
                the_post_navigation(array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__('前の記事:', 'gx-smartlife') . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__('次の記事:', 'gx-smartlife') . '</span> <span class="nav-title">%title</span>',
                ));

                // Comments
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile;
            ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main><!-- #primary -->

<?php
get_footer();
