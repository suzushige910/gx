
<?php
/**
 * Template part for displaying hero carousel
 *
 * @package GX_Smart_Life
 */
?>

<section class="hero-carousel">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <!-- Slide 1: 卒FIT対策 -->
            <div class="swiper-slide">
                <div class="hero-slide" style="background: linear-gradient(135deg, rgba(51, 122, 183, 0.85) 0%, rgba(41, 98, 146, 0.75) 100%), url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-slide-1.png'); ?>') center/cover;">
                    <div class="hero-content">
                        <span class="hero-label">FIT終了後の選択</span>
                        <h2 class="hero-title">
                            <span class="title-main">卒FIT対策で</span>
                            <span class="title-highlight">電気代を最大70%削減</span>
                        </h2>
                        <p class="hero-description">
                            FIT期間終了後も太陽光発電を賢く活用。<br>
                            最新の蓄電池システムで自家消費を最適化し、<br class="hide-mobile">
                            持続可能なエネルギーライフを実現します。
                        </p>
                        <div class="hero-cta">
                            <a href="<?php echo esc_url(home_url('/fit-solution')); ?>" class="btn btn-primary btn-hero">
                                <span>詳しく見る</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline btn-hero">
                                <i class="fas fa-phone"></i>
                                <span>無料相談</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2: BCP対策 -->
            <div class="swiper-slide">
                <div class="hero-slide" style="background: linear-gradient(135deg, rgba(41, 98, 146, 0.85) 0%, rgba(51, 122, 183, 0.75) 100%), url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-slide-2.png'); ?>') center/cover;">
                    <div class="hero-content">
                        <span class="hero-label">事業継続計画</span>
                        <h2 class="hero-title">
                            <span class="title-main">災害時も安心</span>
                            <span class="title-highlight">BCP対策で事業を守る</span>
                        </h2>
                        <p class="hero-description">
                            停電時でも事業を継続できる体制を構築。<br>
                            企業のBCP計画を強力にサポートする<br class="hide-mobile">
                            高性能蓄電池システム・UPSをご提案します。
                        </p>
                        <div class="hero-cta">
                            <a href="<?php echo esc_url(home_url('/bcp-solution')); ?>" class="btn btn-primary btn-hero">
                                <span>詳しく見る</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline btn-hero">
                                <i class="fas fa-envelope"></i>
                                <span>資料請求</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3: 太陽光発電施工 -->
            <div class="swiper-slide">
                <div class="hero-slide" style="background: linear-gradient(135deg, rgba(51, 122, 183, 0.85) 0%, rgba(41, 98, 146, 0.75) 100%), url('<?php echo esc_url(get_template_directory_uri() . '/assets/images/hero-slide-3.png'); ?>') center/cover;">
                    <div class="hero-content">
                        <span class="hero-label">プロフェッショナル施工</span>
                        <h2 class="hero-title">
                            <span class="title-main">第一種電気工事士による</span>
                            <span class="title-highlight">安心・確実な施工品質</span>
                        </h2>
                        <p class="hero-description">
                            豊富な実績と確かな技術力で、<br>
                            住宅用から産業用まで幅広く対応。<br class="hide-mobile">
                            千葉県を中心に、地域密着のサービスを提供します。
                        </p>
                        <div class="hero-cta">
                            <a href="<?php echo esc_url(home_url('/installation-examples')); ?>" class="btn btn-primary btn-hero">
                                <span>施工例を見る</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline btn-hero">
                                <i class="fas fa-calculator"></i>
                                <span>見積り依頼</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="swiper-button-prev">
            <i class="fas fa-chevron-left"></i>
        </div>
        <div class="swiper-button-next">
            <i class="fas fa-chevron-right"></i>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>

<style>
/* ==========================================
   Hero Carousel - Modern Design
   ========================================== */
.hero-carousel {
    width: 100%;
    height: 700px;
    position: relative;
    margin-bottom: var(--spacing-xl);
    overflow: hidden;
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
    position: relative;
}

.hero-slide::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at center, transparent 0%, rgba(0,0,0,0.2) 100%);
    pointer-events: none;
}

/* Hero Content */
.hero-content {
    text-align: center;
    color: var(--color-white);
    max-width: 900px;
    padding: var(--spacing-xl) var(--spacing-lg);
    animation: fadeInUp 1s ease-out;
    position: relative;
    z-index: 1;
}

.hero-label {
    display: inline-block;
    font-size: 0.875rem;
    font-weight: 600;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    padding: 0.5rem 1.25rem;
    border-radius: 50px;
    margin-bottom: var(--spacing-sm);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.hero-title {
    font-size: 3rem;
    font-weight: 800;
    line-height: 1.3;
    margin-bottom: var(--spacing-md);
    text-shadow: 0 4px 20px rgba(0,0,0,0.4);
    color: var(--color-white);
}

.hero-title .title-main {
    display: block;
    font-size: 1.75rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    opacity: 0.95;
}

.hero-title .title-highlight {
    display: block;
    font-size: 3.25rem;
    font-weight: 900;
    background: linear-gradient(135deg, #ffffff 0%, #f0f8ff 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1.2;
}

.hero-description {
    font-size: 1.15rem;
    line-height: 1.8;
    margin-bottom: var(--spacing-lg);
    text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    font-weight: 400;
    opacity: 0.98;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

/* CTA Buttons */
.hero-cta {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: var(--spacing-lg);
}

.btn-hero {
    padding: 1rem 2.5rem;
    font-size: 1.05rem;
    font-weight: 600;
    border-radius: 50px;
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    border: 2px solid transparent;
}

.btn-primary.btn-hero {
    background: var(--color-white);
    color: var(--color-primary-blue);
}

.btn-primary.btn-hero:hover {
    background: var(--color-primary-blue);
    color: var(--color-white);
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(51, 122, 183, 0.4);
}

.btn-outline.btn-hero {
    background: transparent;
    color: var(--color-white);
    border: 2px solid rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(5px);
}

.btn-outline.btn-hero:hover {
    background: var(--color-white);
    color: var(--color-primary-blue);
    border-color: var(--color-white);
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(255, 255, 255, 0.3);
}

/* Swiper Controls - Modern */
.swiper-button-prev,
.swiper-button-next {
    color: var(--color-white);
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    width: 60px;
    height: 60px;
    border-radius: 50%;
    border: 1px solid rgba(255, 255, 255, 0.3);
    transition: all 0.3s ease;
}

.swiper-button-prev::after,
.swiper-button-next::after {
    display: none;
}

.swiper-button-prev i,
.swiper-button-next i {
    font-size: 1.25rem;
}

.swiper-button-prev:hover,
.swiper-button-next:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: scale(1.1);
}

/* Pagination - Modern */
.swiper-pagination {
    bottom: 30px !important;
}

.swiper-pagination-bullet {
    background: var(--color-white);
    opacity: 0.4;
    width: 12px;
    height: 12px;
    margin: 0 6px !important;
    transition: all 0.3s ease;
}

.swiper-pagination-bullet-active {
    opacity: 1;
    background: var(--color-white);
    width: 40px;
    border-radius: 6px;
}

/* Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive Design */
@media (max-width: 781px) {
    .hero-carousel {
        height: 500px;
    }

    .hero-content {
        padding: var(--spacing-lg) var(--spacing-sm);
    }

    .hero-title {
        font-size: 2rem;
    }

    .hero-title .title-main {
        font-size: 1.25rem;
    }

    .hero-title .title-highlight {
        font-size: 2.25rem;
    }

    .hero-description {
        font-size: 1rem;
    }

    .hero-cta {
        flex-direction: column;
        align-items: center;
    }

    .btn-hero {
        padding: 0.875rem 2rem;
        font-size: 0.95rem;
        width: 100%;
        max-width: 280px;
        justify-content: center;
    }

    .swiper-button-prev,
    .swiper-button-next {
        width: 50px;
        height: 50px;
    }
}

@media (max-width: 599px) {
    .hero-carousel {
        height: 550px;
    }

    .hero-content {
        padding: var(--spacing-md) var(--spacing-sm);
    }

    .hero-label {
        font-size: 0.75rem;
        padding: 0.4rem 1rem;
    }

    .hero-title {
        font-size: 1.75rem;
    }

    .hero-title .title-main {
        font-size: 1.1rem;
        margin-bottom: 0.35rem;
    }

    .hero-title .title-highlight {
        font-size: 1.85rem;
    }

    .hero-description {
        font-size: 0.925rem;
        line-height: 1.7;
        margin-bottom: var(--spacing-md);
    }

    .hide-mobile {
        display: none;
    }

    .swiper-button-prev,
    .swiper-button-next {
        width: 45px;
        height: 45px;
        display: none; /* ナビゲーションボタンを非表示（スマホではスワイプ操作） */
    }

    .swiper-button-prev i,
    .swiper-button-next i {
        font-size: 1rem;
    }

    .swiper-pagination {
        bottom: 20px !important;
    }
}
</style>
