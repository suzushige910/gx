
<?php
/**
 * Template part for displaying hero carousel
 *
 * @package GX_Smart_Life
 */
?>

<section class="hero-carousel">
    <div class="swiper">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
                <div class="hero-slide" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-slide-1.jpg'); ?>') center/cover;">
                    <div class="hero-content">
                        <h2><?php esc_html_e('卒FIT対策で電気代を削減', 'gx-smartlife'); ?></h2>
                        <p><?php esc_html_e('FIT終了後も太陽光発電を有効活用。蓄電池システムで自家消費を最適化。', 'gx-smartlife'); ?></p>
                        <a href="<?php echo esc_url(home_url('/fit-solution')); ?>" class="btn btn-large">
                            <?php esc_html_e('詳しく見る', 'gx-smartlife'); ?>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="swiper-slide">
                <div class="hero-slide" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-slide-2.jpg'); ?>') center/cover;">
                    <div class="hero-content">
                        <h2><?php esc_html_e('BCP対策で安心の事業継続', 'gx-smartlife'); ?></h2>
                        <p><?php esc_html_e('災害時の停電対策に。企業のBCP計画をサポートする蓄電池システム。', 'gx-smartlife'); ?></p>
                        <a href="<?php echo esc_url(home_url('/bcp-solution')); ?>" class="btn btn-large">
                            <?php esc_html_e('詳しく見る', 'gx-smartlife'); ?>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="swiper-slide">
                <div class="hero-slide" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-slide-3.jpg'); ?>') center/cover;">
                    <div class="hero-content">
                        <h2><?php esc_html_e('確かな技術で太陽光発電施工', 'gx-smartlife'); ?></h2>
                        <p><?php esc_html_e('第一種電気工事士による安心・安全な施工。住宅用から産業用まで対応。', 'gx-smartlife'); ?></p>
                        <a href="<?php echo esc_url(home_url('/installation-examples')); ?>" class="btn btn-large">
                            <?php esc_html_e('施工例を見る', 'gx-smartlife'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>

<style>
.hero-carousel {
    width: 100%;
    height: 600px;
    position: relative;
    margin-bottom: var(--spacing-lg);
}

.hero-carousel .swiper {
    width: 100%;
    height: 100%;
}

.hero-slide {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-size: cover;
    background-position: center;
}

.hero-content {
    text-align: center;
    color: var(--color-white);
    max-width: 800px;
    padding: var(--spacing-lg);
    animation: fadeInUp 0.8s ease-out;
}

.hero-content h2 {
    font-size: 2.5rem;
    margin-bottom: var(--spacing-sm);
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    color: var(--color-white);
}

.hero-content p {
    font-size: 1.25rem;
    margin-bottom: var(--spacing-sm);
    text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
}

.hero-content .btn {
    background-color: var(--color-white);
    color: var(--color-primary-blue);
    font-weight: 700;
}

.hero-content .btn:hover {
    background-color: var(--color-primary-blue);
    color: var(--color-white);
}

/* Swiper Controls */
.swiper-button-prev,
.swiper-button-next {
    color: var(--color-white);
    background: rgba(0,0,0,0.5);
    width: 50px;
    height: 50px;
    border-radius: 50%;
}

.swiper-button-prev:after,
.swiper-button-next:after {
    font-size: 1.5rem;
}

.swiper-pagination-bullet {
    background: var(--color-white);
    opacity: 0.5;
    width: 12px;
    height: 12px;
}

.swiper-pagination-bullet-active {
    opacity: 1;
    background: var(--color-white);
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media (max-width: 781px) {
    .hero-carousel {
        height: 400px;
    }

    .hero-content h2 {
        font-size: 1.75rem;
    }

    .hero-content p {
        font-size: 1rem;
    }
}

@media (max-width: 599px) {
    .hero-carousel {
        height: 300px;
    }

    .hero-content {
        padding: var(--spacing-sm);
    }

    .hero-content h2 {
        font-size: 1.5rem;
    }

    .hero-content p {
        font-size: 0.875rem;
    }

    .swiper-button-prev,
    .swiper-button-next {
        width: 40px;
        height: 40px;
    }

    .swiper-button-prev:after,
    .swiper-button-next:after {
        font-size: 1.25rem;
    }
}
</style>
