<?php
/**
 * Template Name: Gallery / Installation Examples
 * Template Post Type: page
 *
 * @package GX_Smart_Life
 */

get_header();
?>

<main id="primary" class="site-main gallery-page">
    <div class="site-container">
        <?php
        while (have_posts()) :
            the_post();
            ?>

            <header class="page-header">
                <?php the_title('<h1 class="page-title">', '</h1>'); ?>
                <div class="page-description">
                    <?php the_content(); ?>
                </div>
            </header>

        <?php endwhile; ?>

        <!-- Installation Examples Grid -->
        <div class="installation-grid">
            <?php
            // Query for installation examples custom post type
            $installations = new WP_Query(array(
                'post_type' => 'installation',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
            ));

            if ($installations->have_posts()) :
                while ($installations->have_posts()) :
                    $installations->the_post();
                    ?>

                    <div class="installation-item card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="installation-image card-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('gx-card'); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="installation-content card-content">
                            <h3 class="installation-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <?php
                            // Get installation type taxonomy
                            $types = get_the_terms(get_the_ID(), 'installation_type');
                            if ($types && !is_wp_error($types)) :
                                ?>
                                <div class="installation-types">
                                    <?php foreach ($types as $type) : ?>
                                        <span class="installation-type-badge">
                                            <?php echo esc_html($type->name); ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <div class="installation-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="read-more">
                                <?php esc_html_e('詳細を見る', 'gx-smartlife'); ?>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <div class="no-installations">
                    <p><?php esc_html_e('施工例はまだ登録されていません。', 'gx-smartlife'); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Filter by Installation Type -->
        <?php
        $types = get_terms(array(
            'taxonomy' => 'installation_type',
            'hide_empty' => true,
        ));

        if (!empty($types) && !is_wp_error($types)) :
            ?>
            <div class="installation-filters mt-4">
                <h2 class="text-center"><?php esc_html_e('施工タイプから探す', 'gx-smartlife'); ?></h2>
                <div class="filter-buttons">
                    <a href="<?php the_permalink(); ?>" class="btn btn-outline">
                        <?php esc_html_e('すべて', 'gx-smartlife'); ?>
                    </a>
                    <?php foreach ($types as $type) : ?>
                        <a href="<?php echo esc_url(get_term_link($type)); ?>"
                           class="btn btn-outline">
                            <?php echo esc_html($type->name); ?>
                            <span class="count">(<?php echo esc_html($type->count); ?>)</span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- CTA Section -->
        <section class="gallery-cta mt-4">
            <div class="cta-box text-center">
                <h2><?php esc_html_e('施工のご依頼・ご相談はこちら', 'gx-smartlife'); ?></h2>
                <p><?php esc_html_e('お客様のニーズに合わせた最適なプランをご提案いたします', 'gx-smartlife'); ?></p>
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-large">
                        <i class="fas fa-envelope"></i>
                        <?php esc_html_e('お問い合わせ', 'gx-smartlife'); ?>
                    </a>
                    <a href="tel:<?php echo esc_attr(str_replace('-', '', get_theme_mod('gx_phone_number', '070-2668-7130'))); ?>"
                       class="btn btn-large btn-outline">
                        <i class="fas fa-phone"></i>
                        <?php echo esc_html(get_theme_mod('gx_phone_number', '070-2668-7130')); ?>
                    </a>
                </div>
            </div>
        </section>
    </div>
</main><!-- #primary -->

<style>
.installation-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: var(--spacing-lg);
    margin-top: var(--spacing-lg);
}

.installation-types {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
    margin: 0.5rem 0;
}

.installation-type-badge {
    background: var(--color-primary-blue);
    color: var(--color-white);
    padding: 0.25rem 0.75rem;
    border-radius: 4px;
    font-size: 0.75rem;
    font-weight: 600;
}

.filter-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: var(--spacing-sm);
}

.filter-buttons .count {
    font-size: 0.85em;
    opacity: 0.8;
}

@media (max-width: 599px) {
    .installation-grid {
        grid-template-columns: 1fr;
    }

    .filter-buttons {
        flex-direction: column;
    }

    .filter-buttons .btn {
        width: 100%;
    }
}
</style>

<?php
get_footer();
