<?php
/**
 * Single template for News Releases
 *
 * @package GX_Smart_Life
 */

get_header();
?>

<main id="primary" class="site-main news-single">
    <div class="content-area">
        <div class="main-content">
            <?php
            while (have_posts()) :
                the_post();
                ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <div class="entry-meta-top">
                            <time class="entry-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                <i class="fas fa-calendar"></i>
                                <?php echo get_the_date('Y年m月d日'); ?>
                            </time>

                            <?php
                            $terms = get_the_terms(get_the_ID(), 'news_category');
                            if ($terms && !is_wp_error($terms)) :
                                ?>
                                <div class="entry-categories">
                                    <?php foreach ($terms as $term) : ?>
                                        <a href="<?php echo esc_url(get_term_link($term)); ?>" class="category-link">
                                            <?php echo esc_html($term->name); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="entry-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('ページ:', 'gx-smartlife'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>

                    <footer class="entry-footer">
                        <div class="share-buttons">
                            <span class="share-label"><?php esc_html_e('シェアする:', 'gx-smartlife'); ?></span>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>"
                               target="_blank" rel="noopener noreferrer" class="share-btn twitter">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"
                               target="_blank" rel="noopener noreferrer" class="share-btn facebook">
                                <i class="fab fa-facebook-f"></i> Facebook
                            </a>
                            <a href="https://social-plugins.line.me/lineit/share?url=<?php echo urlencode(get_permalink()); ?>"
                               target="_blank" rel="noopener noreferrer" class="share-btn line">
                                <i class="fab fa-line"></i> LINE
                            </a>
                        </div>

                        <div class="back-to-archive">
                            <a href="<?php echo esc_url(get_post_type_archive_link('news_release')); ?>" class="btn">
                                <i class="fas fa-arrow-left"></i>
                                <?php esc_html_e('ニュース一覧に戻る', 'gx-smartlife'); ?>
                            </a>
                        </div>
                    </footer>
                </article>

                <?php
                // Related news
                $related_args = array(
                    'post_type' => 'news_release',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'date',
                    'order' => 'DESC',
                );

                // Get posts from same category if available
                $terms = get_the_terms(get_the_ID(), 'news_category');
                if ($terms && !is_wp_error($terms)) {
                    $term_ids = wp_list_pluck($terms, 'term_id');
                    $related_args['tax_query'] = array(
                        array(
                            'taxonomy' => 'news_category',
                            'field' => 'term_id',
                            'terms' => $term_ids,
                        ),
                    );
                }

                $related_query = new WP_Query($related_args);

                if ($related_query->have_posts()) :
                    ?>
                    <section class="related-news">
                        <h2 class="section-title">
                            <i class="fas fa-newspaper"></i>
                            <?php esc_html_e('関連ニュース', 'gx-smartlife'); ?>
                        </h2>
                        <div class="related-news-grid">
                            <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                                <article class="related-news-item">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="related-news-thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('medium'); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="related-news-content">
                                        <time class="related-date"><?php echo get_the_date('Y.m.d'); ?></time>
                                        <h3 class="related-title">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </section>
                <?php endif; ?>

            <?php endwhile; ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main>

<style>
/* News Single Styles */
.news-single .entry-header {
    margin-bottom: var(--spacing-lg);
}

.news-single .entry-meta-top {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: var(--spacing-sm);
    flex-wrap: wrap;
}

.news-single .entry-date {
    color: #666;
    font-size: 0.95rem;
}

.news-single .entry-date i {
    margin-right: 0.25rem;
}

.news-single .entry-categories {
    display: flex;
    gap: 0.5rem;
}

.news-single .category-link {
    background: var(--color-primary-blue);
    color: var(--color-white);
    padding: 0.25rem 0.875rem;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: 600;
    transition: background 0.3s ease;
}

.news-single .category-link:hover {
    background: var(--color-dark-blue);
    color: var(--color-white);
}

.news-single .entry-title {
    font-size: 2rem;
    line-height: 1.4;
    color: var(--color-dark-gray);
    margin: 0;
}

.news-single .entry-thumbnail {
    margin-bottom: var(--spacing-lg);
    border-radius: 12px;
    overflow: hidden;
}

.news-single .entry-thumbnail img {
    width: 100%;
    height: auto;
}

.news-single .entry-content {
    font-size: 1.05rem;
    line-height: 1.8;
    margin-bottom: var(--spacing-lg);
}

.news-single .entry-content h2 {
    font-size: 1.75rem;
    margin-top: var(--spacing-lg);
    margin-bottom: var(--spacing-sm);
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--color-primary-blue);
}

.news-single .entry-content h3 {
    font-size: 1.5rem;
    margin-top: var(--spacing-md);
    margin-bottom: var(--spacing-sm);
}

/* Entry Footer */
.news-single .entry-footer {
    border-top: 1px solid #e5e5e5;
    padding-top: var(--spacing-lg);
    margin-top: var(--spacing-lg);
}

.share-buttons {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: var(--spacing-md);
    flex-wrap: wrap;
}

.share-label {
    font-weight: 600;
    color: var(--color-dark-gray);
}

.share-btn {
    padding: 0.5rem 1rem;
    border-radius: 6px;
    font-size: 0.9rem;
    font-weight: 500;
    color: var(--color-white);
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.share-btn.twitter {
    background: #1da1f2;
}

.share-btn.twitter:hover {
    background: #0d8bd9;
    color: var(--color-white);
}

.share-btn.facebook {
    background: #1877f2;
}

.share-btn.facebook:hover {
    background: #0b5ed7;
    color: var(--color-white);
}

.share-btn.line {
    background: #00b900;
}

.share-btn.line:hover {
    background: #009900;
    color: var(--color-white);
}

.back-to-archive {
    margin-top: var(--spacing-md);
}

/* Related News */
.related-news {
    margin-top: var(--spacing-xl);
    padding: var(--spacing-lg);
    background: #f8f9fa;
    border-radius: 12px;
}

.related-news .section-title {
    font-size: 1.5rem;
    margin-bottom: var(--spacing-md);
    color: var(--color-dark-blue);
    text-shadow: none;
}

.related-news-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: var(--spacing-md);
}

.related-news-item {
    background: var(--color-white);
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.related-news-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.related-news-thumbnail img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.related-news-content {
    padding: var(--spacing-sm);
}

.related-date {
    font-size: 0.85rem;
    color: #666;
    display: block;
    margin-bottom: 0.5rem;
}

.related-title {
    font-size: 1rem;
    line-height: 1.4;
    margin: 0;
}

.related-title a {
    color: var(--color-dark-gray);
}

.related-title a:hover {
    color: var(--color-primary-blue);
}

/* Responsive */
@media (max-width: 599px) {
    .news-single .entry-title {
        font-size: 1.5rem;
    }

    .share-buttons {
        flex-direction: column;
        align-items: flex-start;
    }

    .share-btn {
        width: 100%;
        justify-content: center;
    }
}
</style>

<?php
get_footer();
