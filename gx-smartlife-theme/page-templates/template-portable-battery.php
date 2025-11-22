<?php
/**
 * Template Name: Portable Battery Page
 * Template Post Type: page
 *
 * @package GX_Smart_Life
 */

get_header();
?>

<main id="primary" class="site-main portable-battery-page">
    <div class="content-area">
        <div class="main-content">
            <?php
            while (have_posts()) :
                the_post();
                ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="hero-banner portable-hero">
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

                    <div class="entry-content portable-content">
                        <!-- Product Introduction -->
                        <section class="product-intro">
                            <h2><?php esc_html_e('Dabbsson ポータブル電源', 'gx-smartlife'); ?></h2>
                            <p class="intro-text">
                                <?php esc_html_e('ダブソンは、高機能でパワフルなポータブル電源を提供しています。キャンプや災害対策など、様々なシーンで活躍する信頼性の高い製品ラインナップをご用意しております。', 'gx-smartlife'); ?>
                            </p>
                        </section>

                        <?php the_content(); ?>

                        <!-- Product Lineup Section -->
                        <section class="product-lineup mt-4">
                            <h2 class="section-title"><?php esc_html_e('製品ラインナップ', 'gx-smartlife'); ?></h2>
                            <div class="product-grid">
                                <div class="product-card">
                                    <div class="product-image">
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/portable-battery-1.jpg'); ?>"
                                             alt="<?php esc_attr_e('Dabbsson ポータブル電源 大容量', 'gx-smartlife'); ?>">
                                    </div>
                                    <div class="product-info">
                                        <h3><?php esc_html_e('大容量モデル', 'gx-smartlife'); ?></h3>
                                        <p><?php esc_html_e('長時間の電源供給が必要な場面に最適。家庭用バックアップ電源としても活躍します。', 'gx-smartlife'); ?></p>
                                    </div>
                                </div>
                                <div class="product-card">
                                    <div class="product-image">
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/portable-battery-2.jpg'); ?>"
                                             alt="<?php esc_attr_e('Dabbsson ポータブル電源 コンパクト', 'gx-smartlife'); ?>">
                                    </div>
                                    <div class="product-info">
                                        <h3><?php esc_html_e('コンパクトモデル', 'gx-smartlife'); ?></h3>
                                        <p><?php esc_html_e('持ち運びに便利な軽量設計。アウトドアやキャンプでの使用に最適です。', 'gx-smartlife'); ?></p>
                                    </div>
                                </div>
                                <div class="product-card">
                                    <div class="product-image">
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/portable-battery-3.jpg'); ?>"
                                             alt="<?php esc_attr_e('Dabbsson ソーラーパネル', 'gx-smartlife'); ?>">
                                    </div>
                                    <div class="product-info">
                                        <h3><?php esc_html_e('ソーラーパネルセット', 'gx-smartlife'); ?></h3>
                                        <p><?php esc_html_e('ポータブル電源と組み合わせて、オフグリッドでの電力供給を実現します。', 'gx-smartlife'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Features Section -->
                        <section class="portable-features mt-4">
                            <h2 class="section-title"><?php esc_html_e('製品の特徴', 'gx-smartlife'); ?></h2>
                            <div class="features-grid">
                                <div class="feature-box">
                                    <span class="feature-icon">
                                        <i class="fas fa-bolt"></i>
                                    </span>
                                    <h3><?php esc_html_e('高出力', 'gx-smartlife'); ?></h3>
                                    <p><?php esc_html_e('家電製品も使用可能な大出力を実現', 'gx-smartlife'); ?></p>
                                </div>
                                <div class="feature-box">
                                    <span class="feature-icon">
                                        <i class="fas fa-battery-full"></i>
                                    </span>
                                    <h3><?php esc_html_e('長寿命', 'gx-smartlife'); ?></h3>
                                    <p><?php esc_html_e('LiFePO4バッテリーで3000回以上の充放電が可能', 'gx-smartlife'); ?></p>
                                </div>
                                <div class="feature-box">
                                    <span class="feature-icon">
                                        <i class="fas fa-solar-panel"></i>
                                    </span>
                                    <h3><?php esc_html_e('ソーラー充電', 'gx-smartlife'); ?></h3>
                                    <p><?php esc_html_e('ソーラーパネルで環境に優しい充電', 'gx-smartlife'); ?></p>
                                </div>
                                <div class="feature-box">
                                    <span class="feature-icon">
                                        <i class="fas fa-shield-alt"></i>
                                    </span>
                                    <h3><?php esc_html_e('安全設計', 'gx-smartlife'); ?></h3>
                                    <p><?php esc_html_e('BMS搭載で過充電・過放電を防止', 'gx-smartlife'); ?></p>
                                </div>
                            </div>
                        </section>

                        <!-- Use Cases Section -->
                        <section class="use-cases mt-4">
                            <h2 class="section-title"><?php esc_html_e('活用シーン', 'gx-smartlife'); ?></h2>
                            <div class="use-case-list">
                                <div class="use-case-item">
                                    <span class="use-case-icon"><i class="fas fa-campground"></i></span>
                                    <div class="use-case-content">
                                        <h3><?php esc_html_e('キャンプ・アウトドア', 'gx-smartlife'); ?></h3>
                                        <p><?php esc_html_e('電源のない場所でもスマートフォンやカメラ、調理家電などに電力を供給できます。', 'gx-smartlife'); ?></p>
                                    </div>
                                </div>
                                <div class="use-case-item">
                                    <span class="use-case-icon"><i class="fas fa-house-damage"></i></span>
                                    <div class="use-case-content">
                                        <h3><?php esc_html_e('災害対策・非常用電源', 'gx-smartlife'); ?></h3>
                                        <p><?php esc_html_e('停電時も照明や通信機器、医療機器への電力供給で安心・安全を確保します。', 'gx-smartlife'); ?></p>
                                    </div>
                                </div>
                                <div class="use-case-item">
                                    <span class="use-case-icon"><i class="fas fa-car"></i></span>
                                    <div class="use-case-content">
                                        <h3><?php esc_html_e('車中泊・バンライフ', 'gx-smartlife'); ?></h3>
                                        <p><?php esc_html_e('車内でも快適に過ごせる電力環境を実現。冷蔵庫や電気毛布も使用可能です。', 'gx-smartlife'); ?></p>
                                    </div>
                                </div>
                                <div class="use-case-item">
                                    <span class="use-case-icon"><i class="fas fa-briefcase"></i></span>
                                    <div class="use-case-content">
                                        <h3><?php esc_html_e('現場作業・屋外イベント', 'gx-smartlife'); ?></h3>
                                        <p><?php esc_html_e('電源のない現場でも電動工具や照明機器を使用できます。', 'gx-smartlife'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- CTA Section -->
                        <section class="service-cta mt-4">
                            <div class="cta-box text-center">
                                <h2><?php esc_html_e('ポータブル電源のご相談', 'gx-smartlife'); ?></h2>
                                <p><?php esc_html_e('製品のご質問やお見積りなど、お気軽にお問い合わせください。', 'gx-smartlife'); ?></p>
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
