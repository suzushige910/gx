<?php
/**
 * The template for displaying search results
 *
 * @package GX_Smart_Life
 */

get_header();
?>

<main id="primary" class="site-main search-results">
    <div class="content-area">
        <div class="main-content">
            <header class="page-header">
                <h1 class="page-title">
                    <?php
                    printf(
                        esc_html__('検索結果: %s', 'gx-smartlife'),
                        '<span>' . get_search_query() . '</span>'
                    );
                    ?>
                </h1>
            </header>

            <?php if (have_posts()) : ?>

                <div class="search-info">
                    <p>
                        <?php
                        printf(
                            esc_html(_n(
                                '%s 件の結果が見つかりました',
                                '%s 件の結果が見つかりました',
                                $wp_query->found_posts,
                                'gx-smartlife'
                            )),
                            number_format_i18n($wp_query->found_posts)
                        );
                        ?>
                    </p>
                </div>

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
                <div class="no-results not-found">
                    <h2><?php esc_html_e('お探しのページが見つかりませんでした', 'gx-smartlife'); ?></h2>
                    <p><?php esc_html_e('申し訳ございません。検索条件に一致する結果が見つかりませんでした。', 'gx-smartlife'); ?></p>

                    <div class="search-suggestions">
                        <h3><?php esc_html_e('検索のヒント:', 'gx-smartlife'); ?></h3>
                        <ul>
                            <li><?php esc_html_e('キーワードを変えて再度検索してみてください', 'gx-smartlife'); ?></li>
                            <li><?php esc_html_e('より一般的なキーワードで検索してみてください', 'gx-smartlife'); ?></li>
                            <li><?php esc_html_e('別の言葉で検索してみてください', 'gx-smartlife'); ?></li>
                        </ul>
                    </div>

                    <div class="search-again">
                        <h3><?php esc_html_e('再検索', 'gx-smartlife'); ?></h3>
                        <?php get_search_form(); ?>
                    </div>

                    <div class="popular-pages mt-4">
                        <h3><?php esc_html_e('人気のページ', 'gx-smartlife'); ?></h3>
                        <ul class="page-links">
                            <li><a href="<?php echo esc_url(home_url('/fit-solution')); ?>">卒FIT対策</a></li>
                            <li><a href="<?php echo esc_url(home_url('/bcp-solution')); ?>">BCP対策</a></li>
                            <li><a href="<?php echo esc_url(home_url('/installation-examples')); ?>">施工例</a></li>
                            <li><a href="<?php echo esc_url(home_url('/about')); ?>">会社概要</a></li>
                            <li><a href="<?php echo esc_url(home_url('/contact')); ?>">お問い合わせ</a></li>
                        </ul>
                    </div>
                </div>
                <?php
            endif;
            ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main><!-- #primary -->

<style>
.search-info {
    margin-bottom: var(--spacing-sm);
    padding: var(--spacing-xs);
    background: #f0f7ff;
    border-left: 4px solid var(--color-primary-blue);
}

.no-results {
    background: #f9f9f9;
    padding: var(--spacing-lg);
    border-radius: 8px;
    text-align: center;
}

.no-results h2 {
    color: var(--color-primary-blue);
    margin-bottom: var(--spacing-sm);
}

.search-suggestions {
    text-align: left;
    margin: var(--spacing-lg) auto;
    max-width: 600px;
}

.search-suggestions h3 {
    color: var(--color-primary-blue);
    margin-bottom: var(--spacing-xs);
}

.search-suggestions ul {
    list-style: none;
    padding: 0;
}

.search-suggestions li {
    padding: 0.5rem 0;
    padding-left: 1.5rem;
    position: relative;
}

.search-suggestions li:before {
    content: '→';
    position: absolute;
    left: 0;
    color: var(--color-primary-blue);
}

.search-again {
    margin: var(--spacing-lg) auto;
    max-width: 600px;
}

.search-again h3 {
    color: var(--color-primary-blue);
    margin-bottom: var(--spacing-xs);
}

.popular-pages {
    margin: var(--spacing-lg) auto;
    max-width: 600px;
}

.popular-pages h3 {
    color: var(--color-primary-blue);
    margin-bottom: var(--spacing-sm);
}

.page-links {
    list-style: none;
    padding: 0;
}

.page-links li {
    margin: 0.5rem 0;
}

.page-links a {
    display: block;
    padding: 0.75rem;
    background: var(--color-white);
    border: 1px solid #ddd;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.page-links a:hover {
    background: var(--color-primary-blue);
    color: var(--color-white);
    border-color: var(--color-primary-blue);
}
</style>

<?php
get_footer();
