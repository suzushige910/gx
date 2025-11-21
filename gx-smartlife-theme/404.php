<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package GX_Smart_Life
 */

get_header();
?>

<main id="primary" class="site-main error-404">
    <div class="site-container">
        <section class="error-404-content">
            <header class="page-header">
                <div class="error-404-number">404</div>
                <h1 class="page-title"><?php esc_html_e('ページが見つかりません', 'gx-smartlife'); ?></h1>
            </header>

            <div class="page-content">
                <p><?php esc_html_e('申し訳ございません。お探しのページは見つかりませんでした。', 'gx-smartlife'); ?></p>
                <p><?php esc_html_e('ページが移動または削除された可能性があります。', 'gx-smartlife'); ?></p>

                <div class="search-section mt-4">
                    <h2><?php esc_html_e('サイト内検索', 'gx-smartlife'); ?></h2>
                    <p><?php esc_html_e('お探しの情報をキーワードで検索してみてください。', 'gx-smartlife'); ?></p>
                    <?php get_search_form(); ?>
                </div>

                <div class="popular-links mt-4">
                    <h2><?php esc_html_e('よくアクセスされるページ', 'gx-smartlife'); ?></h2>
                    <div class="link-grid">
                        <div class="link-card">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <i class="fas fa-home fa-2x"></i>
                                <h3><?php esc_html_e('トップページ', 'gx-smartlife'); ?></h3>
                                <p><?php esc_html_e('サイトのトップページへ', 'gx-smartlife'); ?></p>
                            </a>
                        </div>

                        <div class="link-card">
                            <a href="<?php echo esc_url(home_url('/fit-solution')); ?>">
                                <i class="fas fa-solar-panel fa-2x"></i>
                                <h3><?php esc_html_e('卒FIT対策', 'gx-smartlife'); ?></h3>
                                <p><?php esc_html_e('FIT終了後の対策', 'gx-smartlife'); ?></p>
                            </a>
                        </div>

                        <div class="link-card">
                            <a href="<?php echo esc_url(home_url('/bcp-solution')); ?>">
                                <i class="fas fa-shield-alt fa-2x"></i>
                                <h3><?php esc_html_e('BCP対策', 'gx-smartlife'); ?></h3>
                                <p><?php esc_html_e('事業継続計画サポート', 'gx-smartlife'); ?></p>
                            </a>
                        </div>

                        <div class="link-card">
                            <a href="<?php echo esc_url(home_url('/installation-examples')); ?>">
                                <i class="fas fa-images fa-2x"></i>
                                <h3><?php esc_html_e('施工例', 'gx-smartlife'); ?></h3>
                                <p><?php esc_html_e('実際の施工実績', 'gx-smartlife'); ?></p>
                            </a>
                        </div>

                        <div class="link-card">
                            <a href="<?php echo esc_url(home_url('/about')); ?>">
                                <i class="fas fa-building fa-2x"></i>
                                <h3><?php esc_html_e('会社概要', 'gx-smartlife'); ?></h3>
                                <p><?php esc_html_e('会社情報', 'gx-smartlife'); ?></p>
                            </a>
                        </div>

                        <div class="link-card">
                            <a href="<?php echo esc_url(home_url('/contact')); ?>">
                                <i class="fas fa-envelope fa-2x"></i>
                                <h3><?php esc_html_e('お問い合わせ', 'gx-smartlife'); ?></h3>
                                <p><?php esc_html_e('お気軽にご相談ください', 'gx-smartlife'); ?></p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="recent-posts mt-4">
                    <h2><?php esc_html_e('最新のお知らせ', 'gx-smartlife'); ?></h2>
                    <div class="posts-grid">
                        <?php
                        $recent_posts = new WP_Query(array(
                            'posts_per_page' => 3,
                            'post_status' => 'publish',
                        ));

                        if ($recent_posts->have_posts()) :
                            while ($recent_posts->have_posts()) :
                                $recent_posts->the_post();
                                get_template_part('template-parts/post-card');
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>

                <div class="contact-cta mt-4">
                    <div class="cta-box text-center">
                        <h2><?php esc_html_e('お困りですか？', 'gx-smartlife'); ?></h2>
                        <p><?php esc_html_e('お探しの情報が見つからない場合は、お気軽にお問い合わせください。', 'gx-smartlife'); ?></p>
                        <div class="cta-buttons">
                            <a href="tel:<?php echo esc_attr(str_replace('-', '', get_theme_mod('gx_phone_number', '070-2668-7130'))); ?>"
                               class="btn btn-large">
                                <i class="fas fa-phone"></i>
                                <?php echo esc_html(get_theme_mod('gx_phone_number', '070-2668-7130')); ?>
                            </a>
                            <a href="<?php echo esc_url(home_url('/contact')); ?>"
                               class="btn btn-large btn-outline">
                                <i class="fas fa-envelope"></i>
                                <?php esc_html_e('お問い合わせフォーム', 'gx-smartlife'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main><!-- #primary -->

<style>
.error-404-content {
    text-align: center;
    padding: var(--spacing-lg) 0;
}

.error-404-number {
    font-size: 8rem;
    font-weight: 900;
    color: var(--color-primary-blue);
    line-height: 1;
    margin-bottom: var(--spacing-sm);
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
}

.error-404 .page-title {
    font-size: 2rem;
    color: var(--color-black);
    margin-bottom: var(--spacing-sm);
}

.error-404 .page-content {
    max-width: 1000px;
    margin: 0 auto;
}

.error-404 .page-content > p {
    font-size: 1.125rem;
    color: #666;
    margin-bottom: 0.5rem;
}

.search-section {
    background: #f9f9f9;
    padding: var(--spacing-lg);
    border-radius: 8px;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.search-section h2 {
    color: var(--color-primary-blue);
    margin-bottom: var(--spacing-xs);
}

.link-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--spacing-sm);
    margin-top: var(--spacing-sm);
}

.link-card {
    background: var(--color-white);
    border: 2px solid #e5e5e5;
    border-radius: 8px;
    padding: var(--spacing-sm);
    transition: all 0.3s ease;
}

.link-card:hover {
    border-color: var(--color-primary-blue);
    transform: translateY(-4px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.link-card a {
    display: block;
    text-align: center;
    color: var(--color-black);
}

.link-card i {
    color: var(--color-primary-blue);
    margin-bottom: var(--spacing-xs);
}

.link-card h3 {
    font-size: 1.125rem;
    margin: var(--spacing-xs) 0;
    color: var(--color-primary-blue);
}

.link-card p {
    font-size: 0.875rem;
    color: #666;
    margin: 0;
}

.link-card:hover h3 {
    color: var(--color-dark-blue);
}

.popular-links h2,
.recent-posts h2 {
    color: var(--color-primary-blue);
    text-align: center;
    margin-bottom: var(--spacing-sm);
}

.contact-cta {
    margin-top: var(--spacing-xl);
}

@media (max-width: 781px) {
    .error-404-number {
        font-size: 6rem;
    }

    .error-404 .page-title {
        font-size: 1.5rem;
    }

    .link-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 599px) {
    .error-404-number {
        font-size: 4rem;
    }

    .error-404 .page-title {
        font-size: 1.25rem;
    }

    .error-404 .page-content > p {
        font-size: 1rem;
    }

    .search-section {
        padding: var(--spacing-sm);
    }
}
</style>

<?php
get_footer();
