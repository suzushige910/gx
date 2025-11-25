<?php
/**
 * Archive template for News Releases
 *
 * @package GX_Smart_Life
 */

get_header();
?>

<main id="primary" class="site-main news-archive">
    <div class="content-area">
        <div class="main-content">
            <header class="page-header">
                <h1 class="page-title">
                    <i class="fas fa-megaphone"></i>
                    <?php esc_html_e('ニュースリリース', 'gx-smartlife'); ?>
                </h1>
                <?php
                $archive_description = get_the_archive_description();
                if ($archive_description) {
                    echo '<div class="archive-description">' . wp_kses_post($archive_description) . '</div>';
                }
                ?>
            </header>

            <?php
            // Category filter
            $current_category = get_query_var('news_category');
            $categories = get_terms(array(
                'taxonomy' => 'news_category',
                'hide_empty' => true,
            ));

            if (!is_wp_error($categories) && !empty($categories)) :
                ?>
                <div class="news-filter">
                    <div class="filter-buttons">
                        <a href="<?php echo esc_url(get_post_type_archive_link('news_release')); ?>"
                           class="filter-btn <?php echo empty($current_category) ? 'active' : ''; ?>">
                            <?php esc_html_e('すべて', 'gx-smartlife'); ?>
                        </a>
                        <?php foreach ($categories as $category) : ?>
                            <a href="<?php echo esc_url(get_term_link($category)); ?>"
                               class="filter-btn <?php echo ($current_category === $category->slug) ? 'active' : ''; ?>">
                                <?php echo esc_html($category->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (have_posts()) : ?>
                <div class="news-list">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('news-item'); ?>>
                            <div class="news-date">
                                <span class="date-day"><?php echo get_the_date('d'); ?></span>
                                <span class="date-month"><?php echo get_the_date('M'); ?></span>
                                <span class="date-year"><?php echo get_the_date('Y'); ?></span>
                            </div>

                            <div class="news-content-wrapper">
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'news_category');
                                if ($terms && !is_wp_error($terms)) :
                                    ?>
                                    <div class="news-categories">
                                        <?php foreach ($terms as $term) : ?>
                                            <span class="news-category-badge">
                                                <?php echo esc_html($term->name); ?>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <h2 class="news-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <?php if (has_excerpt()) : ?>
                                    <div class="news-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="news-meta">
                                    <a href="<?php the_permalink(); ?>" class="read-more">
                                        <?php esc_html_e('続きを読む', 'gx-smartlife'); ?>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '<i class="fas fa-chevron-left"></i> ' . __('前へ', 'gx-smartlife'),
                    'next_text' => __('次へ', 'gx-smartlife') . ' <i class="fas fa-chevron-right"></i>',
                ));
                ?>

            <?php else : ?>
                <div class="no-results">
                    <p><?php esc_html_e('ニュースリリースが見つかりませんでした。', 'gx-smartlife'); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main>

<style>
/* News Archive Styles */
.news-archive .page-header {
    background: linear-gradient(135deg, var(--color-primary-blue) 0%, var(--color-dark-blue) 100%);
    color: var(--color-white);
    padding: var(--spacing-lg);
    border-radius: 12px;
    margin-bottom: var(--spacing-lg);
    text-align: center;
}

.news-archive .page-title {
    color: var(--color-white);
    font-size: 2rem;
    margin-bottom: 0.5rem;
    text-shadow: none;
}

.news-archive .page-title i {
    margin-right: 0.5rem;
}

.news-archive .archive-description {
    font-size: 1rem;
    opacity: 0.95;
}

/* News Filter */
.news-filter {
    background: #f8f9fa;
    padding: var(--spacing-sm);
    border-radius: 8px;
    margin-bottom: var(--spacing-lg);
}

.filter-buttons {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
    justify-content: center;
}

.filter-btn {
    padding: 0.5rem 1.25rem;
    background: var(--color-white);
    color: var(--color-dark-gray);
    border: 1px solid #ddd;
    border-radius: 20px;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.filter-btn:hover {
    background: var(--color-primary-blue);
    color: var(--color-white);
    border-color: var(--color-primary-blue);
}

.filter-btn.active {
    background: var(--color-primary-blue);
    color: var(--color-white);
    border-color: var(--color-primary-blue);
}

/* News List */
.news-list {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-md);
}

.news-item {
    display: flex;
    gap: var(--spacing-sm);
    background: var(--color-white);
    padding: var(--spacing-sm);
    border-radius: 8px;
    border: 1px solid #e5e5e5;
    transition: all 0.3s ease;
}

.news-item:hover {
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.news-date {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: var(--color-primary-blue);
    color: var(--color-white);
    padding: 0.75rem;
    border-radius: 8px;
    min-width: 80px;
    text-align: center;
}

.news-date .date-day {
    font-size: 2rem;
    font-weight: 700;
    line-height: 1;
}

.news-date .date-month {
    font-size: 0.75rem;
    text-transform: uppercase;
    opacity: 0.9;
}

.news-date .date-year {
    font-size: 0.875rem;
    opacity: 0.9;
}

.news-content-wrapper {
    flex: 1;
}

.news-categories {
    margin-bottom: 0.5rem;
}

.news-category-badge {
    display: inline-block;
    background: #e3f2fd;
    color: var(--color-primary-blue);
    padding: 0.25rem 0.75rem;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
    margin-right: 0.5rem;
}

.news-title {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
}

.news-title a {
    color: var(--color-dark-gray);
}

.news-title a:hover {
    color: var(--color-primary-blue);
}

.news-excerpt {
    color: #666;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 0.75rem;
}

.news-meta .read-more {
    color: var(--color-primary-blue);
    font-weight: 600;
    font-size: 0.9rem;
}

.news-meta .read-more:hover {
    color: var(--color-dark-blue);
}

/* Responsive */
@media (max-width: 599px) {
    .news-item {
        flex-direction: column;
    }

    .news-date {
        flex-direction: row;
        gap: 0.5rem;
        min-width: auto;
        padding: 0.5rem 1rem;
    }

    .news-date .date-day {
        font-size: 1.5rem;
    }
}
</style>

<?php
get_footer();
