<?php
/**
 * Template Name: Service Page
 * Template Post Type: page
 *
 * @package GX_Smart_Life
 */

get_header();
?>

<main id="primary" class="site-main service-page">
    <div class="content-area">
        <div class="main-content">
            <?php
            while (have_posts()) :
                the_post();
                ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="hero-banner">
                            <?php the_post_thumbnail('full'); ?>
                            <div class="hero-overlay">
                                <h1 class="hero-title"><?php the_title(); ?></h1>
                            </div>
                        </div>
                    <?php else : ?>
                        <header class="entry-header">
                            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                        </header>
                    <?php endif; ?>

                    <div class="entry-content service-content">
                        <?php the_content(); ?>

                        <!-- Benefits Section -->
                        <section class="benefits-section mt-4">
                            <h2><?php esc_html_e('このサービスのメリット', 'gx-smartlife'); ?></h2>
                            <div class="benefits-list">
                                <div class="benefit-item">
                                    <span class="benefit-icon">✅</span>
                                    <p><?php esc_html_e('初期費用を抑えた導入が可能', 'gx-smartlife'); ?></p>
                                </div>
                                <div class="benefit-item">
                                    <span class="benefit-icon">✅</span>
                                    <p><?php esc_html_e('プロの電気工事士による安心施工', 'gx-smartlife'); ?></p>
                                </div>
                                <div class="benefit-item">
                                    <span class="benefit-icon">✅</span>
                                    <p><?php esc_html_e('充実したアフターサポート', 'gx-smartlife'); ?></p>
                                </div>
                                <div class="benefit-item">
                                    <span class="benefit-icon">✅</span>
                                    <p><?php esc_html_e('補助金・助成金のご相談も対応', 'gx-smartlife'); ?></p>
                                </div>
                            </div>
                        </section>

                        <!-- CTA Section -->
                        <section class="service-cta mt-4">
                            <div class="cta-box text-center">
                                <h2><?php esc_html_e('お気軽にご相談ください', 'gx-smartlife'); ?></h2>
                                <p><?php esc_html_e('専門スタッフが丁寧にご説明いたします', 'gx-smartlife'); ?></p>
                                <div class="cta-buttons">
                                    <a href="tel:<?php echo esc_attr(str_replace('-', '', get_theme_mod('gx_phone_number', '070-2668-7130'))); ?>"
                                       class="btn btn-large">
                                        <i class="fas fa-phone"></i>
                                        <?php echo esc_html(get_theme_mod('gx_phone_number', '070-2668-7130')); ?>
                                    </a>
                                    <a href="<?php echo esc_url(home_url('/contact')); ?>"
                                       class="btn btn-large">
                                        <i class="fas fa-envelope"></i>
                                        <?php esc_html_e('お問い合わせ', 'gx-smartlife'); ?>
                                    </a>
                                </div>
                            </div>
                        </section>

                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'gx-smartlife'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>
                </article>

            <?php endwhile; ?>
        </div>

        <?php get_sidebar(); ?>
    </div>
</main><!-- #primary -->

<?php
get_footer();
