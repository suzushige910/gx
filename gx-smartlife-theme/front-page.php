<?php
/**
 * The front page template file
 *
 * @package GX_Smart_Life
 */

get_header();
?>

<main id="primary" class="site-main front-page">

    <?php
    // Hero Carousel Section
    get_template_part('template-parts/hero-carousel');
    ?>

    <!-- Solutions Section -->
    <section class="solutions-section">
        <div class="site-container">
            <h2 class="section-title text-center"><?php esc_html_e('私たちのソリューション', 'gx-smartlife'); ?></h2>

            <div class="vk-cols--fit">
                <!-- FIT Exit Solution -->
                <div class="card solution-card">
                    <div class="card-image">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/fit-solution.jpg'); ?>"
                             alt="<?php esc_attr_e('卒FIT対策', 'gx-smartlife'); ?>">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title"><?php esc_html_e('卒FIT対策', 'gx-smartlife'); ?></h3>
                        <p class="card-excerpt">
                            <?php esc_html_e('FIT期間終了後も、太陽光発電を最大限に活用。蓄電池システムで自家消費を最適化し、電気代削減を実現します。', 'gx-smartlife'); ?>
                        </p>
                        <a href="<?php echo esc_url(home_url('/fit-solution')); ?>" class="btn">
                            <?php esc_html_e('詳しく見る', 'gx-smartlife'); ?>
                        </a>
                    </div>
                </div>

                <!-- BCP Solution -->
                <div class="card solution-card">
                    <div class="card-image">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/bcp-solution.jpg'); ?>"
                             alt="<?php esc_attr_e('BCP対策', 'gx-smartlife'); ?>">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title"><?php esc_html_e('BCP対策・UPS', 'gx-smartlife'); ?></h3>
                        <p class="card-excerpt">
                            <?php esc_html_e('災害時の停電対策に。企業の事業継続計画（BCP）を強力にサポートする蓄電池システムとUPS導入を提案します。', 'gx-smartlife'); ?>
                        </p>
                        <a href="<?php echo esc_url(home_url('/bcp-solution')); ?>" class="btn">
                            <?php esc_html_e('詳しく見る', 'gx-smartlife'); ?>
                        </a>
                    </div>
                </div>

                <!-- Solar Installation -->
                <div class="card solution-card">
                    <div class="card-image">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/solar-installation.jpg'); ?>"
                             alt="<?php esc_attr_e('太陽光発電施工', 'gx-smartlife'); ?>">
                    </div>
                    <div class="card-content">
                        <h3 class="card-title"><?php esc_html_e('太陽光発電施工', 'gx-smartlife'); ?></h3>
                        <p class="card-excerpt">
                            <?php esc_html_e('住宅用・産業用の太陽光発電システムを高品質で施工。豊富な実績と確かな技術で、最適なシステムを提案します。', 'gx-smartlife'); ?>
                        </p>
                        <a href="<?php echo esc_url(home_url('/installation-examples')); ?>" class="btn">
                            <?php esc_html_e('施工例を見る', 'gx-smartlife'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section mt-4">
        <div class="site-container">
            <h2 class="section-title text-center"><?php esc_html_e('GXスマートライフの特徴', 'gx-smartlife'); ?></h2>

            <div class="wp-block-columns">
                <div class="wp-block-column">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-certificate fa-3x"></i>
                        </div>
                        <h3><?php esc_html_e('確かな資格と実績', 'gx-smartlife'); ?></h3>
                        <p><?php esc_html_e('第一種電気工事士をはじめとする各種資格保有者が施工を担当。安心・安全な工事を提供します。', 'gx-smartlife'); ?></p>
                    </div>
                </div>

                <div class="wp-block-column">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-handshake fa-3x"></i>
                        </div>
                        <h3><?php esc_html_e('地域密着サービス', 'gx-smartlife'); ?></h3>
                        <p><?php esc_html_e('千葉県市原市を中心に、地域に根ざしたきめ細やかなサポートを提供。アフターフォローも万全です。', 'gx-smartlife'); ?></p>
                    </div>
                </div>

                <div class="wp-block-column">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-leaf fa-3x"></i>
                        </div>
                        <h3><?php esc_html_e('環境への貢献', 'gx-smartlife'); ?></h3>
                        <p><?php esc_html_e('再生可能エネルギーの普及を通じて、持続可能な社会の実現に貢献します。', 'gx-smartlife'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Posts Section -->
    <section class="recent-posts-section mt-4">
        <div class="site-container">
            <h2 class="section-title text-center"><?php esc_html_e('最新のお知らせ', 'gx-smartlife'); ?></h2>

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

            <div class="text-center mt-2">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn">
                    <?php esc_html_e('お知らせ一覧を見る', 'gx-smartlife'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section mt-4">
        <div class="site-container">
            <div class="cta-box text-center">
                <h2><?php esc_html_e('お問い合わせはこちら', 'gx-smartlife'); ?></h2>
                <p><?php esc_html_e('太陽光発電・蓄電池システムに関するご相談は、お気軽にお問い合わせください。', 'gx-smartlife'); ?></p>
                <div class="cta-buttons">
                    <a href="tel:<?php echo esc_attr(str_replace('-', '', get_theme_mod('gx_phone_number', '070-2668-7130'))); ?>" class="btn btn-large">
                        <i class="fas fa-phone"></i>
                        <?php echo esc_html(get_theme_mod('gx_phone_number', '070-2668-7130')); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-large">
                        <i class="fas fa-envelope"></i>
                        <?php esc_html_e('お問い合わせフォーム', 'gx-smartlife'); ?>
                    </a>
                    <?php if (get_theme_mod('gx_line_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('gx_line_url')); ?>" class="btn btn-large btn-outline" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-line"></i>
                            <?php esc_html_e('LINE公式アカウント', 'gx-smartlife'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

</main><!-- #primary -->

<?php
get_footer();
