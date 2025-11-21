<?php
/**
 * The template for displaying archive pages
 *
 * @package GX_Smart_Life
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="content-area">
        <div class="main-content">
            <?php if (have_posts()) : ?>

                <header class="page-header">
                    <?php
                    the_archive_title('<h1 class="page-title">', '</h1>');
                    the_archive_description('<div class="archive-description">', '</div>');
                    ?>
                </header>

                <div class="posts-grid">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/post-card');
                    endwhile;
                    ?>
                </div>

                <?php
                the_posts_navigation(array(
                    'prev_text' => '<i class="fas fa-arrow-left"></i> ' . __('前のページ', 'gx-smartlife'),
                    'next_text' => __('次のページ', 'gx-smartlife') . ' <i class="fas fa-arrow-right"></i>',
                ));

            else :
                ?>
                <div class="no-results">
                    <h2><?php esc_html_e('投稿が見つかりません', 'gx-smartlife'); ?></h2>
                    <p><?php esc_html_e('このアーカイブには投稿がありません。', 'gx-smartlife'); ?></p>
                    <?php get_search_form(); ?>
                </div>
                <?php
            endif;
            ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main><!-- #primary -->

<?php
get_footer();
