
<?php
/**
 * Template part for displaying post cards
 *
 * @package GX_Smart_Life
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('gx-card'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="post-content">
        <header class="post-header">
            <?php
            // Post date
            ?>
            <div class="post-date">
                <i class="far fa-calendar"></i>
                <?php echo esc_html(get_the_date()); ?>
            </div>

            <?php
            // Categories
            $categories = get_the_category();
            if (!empty($categories)) :
                ?>
                <div class="post-categories">
                    <?php foreach ($categories as $category) : ?>
                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"
                           class="category-badge">
                            <?php echo esc_html($category->name); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <h3 class="post-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h3>
        </header>

        <div class="post-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <footer class="post-footer">
            <a href="<?php the_permalink(); ?>" class="read-more">
                <?php esc_html_e('続きを読む', 'gx-smartlife'); ?>
                <i class="fas fa-arrow-right"></i>
            </a>
        </footer>
    </div>
</article>

<style>
.post-card {
    background: var(--color-white);
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.post-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 16px rgba(0,0,0,0.15);
}

.post-card .post-thumbnail {
    overflow: hidden;
    position: relative;
}

.post-card .post-thumbnail img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.post-card:hover .post-thumbnail img {
    transform: scale(1.05);
}

.post-card .post-content {
    padding: var(--spacing-sm);
}

.post-card .post-date {
    font-size: 0.75rem;
    color: var(--color-gray);
    margin-bottom: 0.5rem;
}

.post-card .post-date i {
    margin-right: 0.25rem;
}

.post-categories {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
    margin-bottom: 0.75rem;
}

.category-badge {
    display: inline-block;
    background: var(--color-primary-blue);
    color: var(--color-white);
    padding: 0.25rem 0.75rem;
    border-radius: 4px;
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    transition: background 0.3s ease;
}

.category-badge:hover {
    background: var(--color-dark-blue);
    color: var(--color-white);
}

.post-card .post-title {
    font-size: 1.125rem;
    margin: 0 0 0.75rem;
    line-height: 1.4;
}

.post-card .post-title a {
    color: var(--color-black);
    transition: color 0.3s ease;
}

.post-card .post-title a:hover {
    color: var(--color-primary-blue);
}

.post-card .post-excerpt {
    font-size: 0.875rem;
    color: #666;
    line-height: 1.6;
    margin-bottom: 0.75rem;
}

.post-card .post-footer {
    padding-top: 0.75rem;
    border-top: 1px solid #e5e5e5;
}

.post-card .read-more {
    color: var(--color-primary-blue);
    font-weight: 600;
    font-size: 0.875rem;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: gap 0.3s ease;
}

.post-card .read-more:hover {
    gap: 0.75rem;
}

.post-card .read-more i {
    font-size: 0.75rem;
}

/* Special badge for new products */
.post-card.category-new-product .post-thumbnail::after {
    content: 'NEW';
    position: absolute;
    top: 10px;
    right: 10px;
    background: var(--color-red);
    color: var(--color-white);
    padding: 0.25rem 0.75rem;
    border-radius: 4px;
    font-size: 0.75rem;
    font-weight: 700;
}

@media (max-width: 599px) {
    .post-card .post-thumbnail img {
        height: 180px;
    }

    .post-card .post-title {
        font-size: 1rem;
    }
}
</style>
