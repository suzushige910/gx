<?php
/**
 * Template Name: Contact Page
 * Template Post Type: page
 *
 * @package GX_Smart_Life
 */

get_header();
?>

<main id="primary" class="site-main contact-page">
    <div class="site-container">
        <?php
        while (have_posts()) :
            the_post();
            ?>

            <header class="page-header">
                <?php the_title('<h1 class="page-title">', '</h1>'); ?>
            </header>

            <div class="contact-content">
                <?php the_content(); ?>
            </div>

        <?php endwhile; ?>

        <!-- Contact Methods Grid -->
        <div class="contact-methods">
            <!-- Phone Contact -->
            <div class="contact-method card">
                <div class="contact-icon">
                    <i class="fas fa-phone fa-3x"></i>
                </div>
                <h3><?php esc_html_e('お電話でのお問い合わせ', 'gx-smartlife'); ?></h3>
                <p class="contact-description">
                    <?php esc_html_e('お急ぎの場合は、お電話でのお問い合わせが便利です。', 'gx-smartlife'); ?>
                </p>
                <div class="contact-info">
                    <a href="tel:<?php echo esc_attr(str_replace('-', '', get_theme_mod('gx_phone_number', '070-2668-7130'))); ?>"
                       class="contact-link">
                        <strong><?php echo esc_html(get_theme_mod('gx_phone_number', '070-2668-7130')); ?></strong>
                    </a>
                    <p class="contact-hours">
                        <?php esc_html_e('受付時間: 平日 9:00〜18:00', 'gx-smartlife'); ?>
                    </p>
                </div>
            </div>

            <!-- Email Contact -->
            <div class="contact-method card">
                <div class="contact-icon">
                    <i class="fas fa-envelope fa-3x"></i>
                </div>
                <h3><?php esc_html_e('メールでのお問い合わせ', 'gx-smartlife'); ?></h3>
                <p class="contact-description">
                    <?php esc_html_e('メールでのお問い合わせは24時間受付中です。', 'gx-smartlife'); ?>
                </p>
                <div class="contact-info">
                    <a href="mailto:<?php echo esc_attr(get_theme_mod('gx_email', 'info@gx-smartlife.com')); ?>"
                       class="contact-link">
                        <strong><?php echo esc_html(get_theme_mod('gx_email', 'info@gx-smartlife.com')); ?></strong>
                    </a>
                    <p class="contact-hours">
                        <?php esc_html_e('24時間受付（返信は営業時間内）', 'gx-smartlife'); ?>
                    </p>
                </div>
            </div>

            <!-- LINE Contact -->
            <?php if (get_theme_mod('gx_line_url')) : ?>
                <div class="contact-method card">
                    <div class="contact-icon">
                        <i class="fab fa-line fa-3x"></i>
                    </div>
                    <h3><?php esc_html_e('LINE公式アカウント', 'gx-smartlife'); ?></h3>
                    <p class="contact-description">
                        <?php esc_html_e('LINEでお気軽にお問い合わせいただけます。', 'gx-smartlife'); ?>
                    </p>
                    <div class="contact-info">
                        <a href="<?php echo esc_url(get_theme_mod('gx_line_url')); ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn">
                            <i class="fab fa-line"></i>
                            <?php esc_html_e('友だち追加', 'gx-smartlife'); ?>
                        </a>
                        <p class="contact-hours">
                            <?php esc_html_e('QRコード: lin.ee/kJdicywN', 'gx-smartlife'); ?>
                        </p>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Contact Form -->
            <div class="contact-method card contact-form-section">
                <div class="contact-icon">
                    <i class="fas fa-edit fa-3x"></i>
                </div>
                <h3><?php esc_html_e('お問い合わせフォーム', 'gx-smartlife'); ?></h3>
                <p class="contact-description">
                    <?php esc_html_e('下記フォームよりお問い合わせください。', 'gx-smartlife'); ?>
                </p>

                <?php
                // Display Contact Form 7 if available
                if (function_exists('wpcf7_contact_form')) {
                    echo do_shortcode('[contact-form-7 id="1" title="お問い合わせ"]');
                } else {
                    // Fallback form
                    ?>
                    <form class="contact-form" action="<?php echo esc_url(home_url('/script/mailform/main/')); ?>" method="post">
                        <div class="form-group">
                            <label for="name"><?php esc_html_e('お名前', 'gx-smartlife'); ?> <span class="required">*</span></label>
                            <input type="text" id="name" name="name" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email"><?php esc_html_e('メールアドレス', 'gx-smartlife'); ?> <span class="required">*</span></label>
                            <input type="email" id="email" name="email" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="phone"><?php esc_html_e('電話番号', 'gx-smartlife'); ?></label>
                            <input type="tel" id="phone" name="phone" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="subject"><?php esc_html_e('お問い合わせ種別', 'gx-smartlife'); ?> <span class="required">*</span></label>
                            <select id="subject" name="subject" required class="form-control">
                                <option value=""><?php esc_html_e('選択してください', 'gx-smartlife'); ?></option>
                                <option value="fit"><?php esc_html_e('卒FIT対策', 'gx-smartlife'); ?></option>
                                <option value="bcp"><?php esc_html_e('BCP対策・UPS', 'gx-smartlife'); ?></option>
                                <option value="solar"><?php esc_html_e('太陽光発電施工', 'gx-smartlife'); ?></option>
                                <option value="partner"><?php esc_html_e('パートナー募集', 'gx-smartlife'); ?></option>
                                <option value="other"><?php esc_html_e('その他', 'gx-smartlife'); ?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message"><?php esc_html_e('お問い合わせ内容', 'gx-smartlife'); ?> <span class="required">*</span></label>
                            <textarea id="message" name="message" rows="6" required class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="privacy" required>
                                <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>" target="_blank">
                                    <?php esc_html_e('プライバシーポリシー', 'gx-smartlife'); ?>
                                </a>
                                <?php esc_html_e('に同意する', 'gx-smartlife'); ?>
                                <span class="required">*</span>
                            </label>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-large">
                                <i class="fas fa-paper-plane"></i>
                                <?php esc_html_e('送信する', 'gx-smartlife'); ?>
                            </button>
                        </div>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>

        <!-- Company Information -->
        <div class="contact-company-info mt-4">
            <h2 class="text-center"><?php esc_html_e('会社情報', 'gx-smartlife'); ?></h2>
            <div class="company-info-box">
                <dl class="company-details">
                    <dt><?php esc_html_e('会社名', 'gx-smartlife'); ?></dt>
                    <dd><?php echo esc_html(get_theme_mod('gx_company_name', 'GXスマートライフ株式会社')); ?></dd>

                    <dt><?php esc_html_e('代表者', 'gx-smartlife'); ?></dt>
                    <dd><?php echo esc_html(get_theme_mod('gx_representative_name', '鈴木繁樹')); ?></dd>

                    <dt><?php esc_html_e('所在地', 'gx-smartlife'); ?></dt>
                    <dd><?php echo esc_html(get_theme_mod('gx_location', '千葉県市原市')); ?></dd>

                    <dt><?php esc_html_e('電話番号', 'gx-smartlife'); ?></dt>
                    <dd>
                        <a href="tel:<?php echo esc_attr(str_replace('-', '', get_theme_mod('gx_phone_number', '070-2668-7130'))); ?>">
                            <?php echo esc_html(get_theme_mod('gx_phone_number', '070-2668-7130')); ?>
                        </a>
                    </dd>

                    <dt><?php esc_html_e('メール', 'gx-smartlife'); ?></dt>
                    <dd>
                        <a href="mailto:<?php echo esc_attr(get_theme_mod('gx_email', 'info@gx-smartlife.com')); ?>">
                            <?php echo esc_html(get_theme_mod('gx_email', 'info@gx-smartlife.com')); ?>
                        </a>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</main><!-- #primary -->

<style>
.contact-methods {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: var(--spacing-lg);
    margin-top: var(--spacing-lg);
}

.contact-method {
    text-align: center;
    padding: var(--spacing-lg);
}

.contact-icon {
    color: var(--color-primary-blue);
    margin-bottom: var(--spacing-sm);
}

.contact-description {
    color: #666;
    margin: var(--spacing-sm) 0;
}

.contact-info {
    margin-top: var(--spacing-sm);
}

.contact-link {
    font-size: var(--font-size-medium);
    display: block;
    margin: var(--spacing-sm) 0;
}

.contact-hours {
    font-size: var(--font-size-small);
    color: var(--color-gray);
    margin-top: 0.5rem;
}

.contact-form-section {
    grid-column: 1 / -1;
}

.form-group {
    margin-bottom: var(--spacing-sm);
}

.form-group label {
    display: block;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.form-control {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
    font-family: inherit;
}

.form-control:focus {
    outline: none;
    border-color: var(--color-primary-blue);
    box-shadow: 0 0 0 3px rgba(51, 122, 183, 0.1);
}

.required {
    color: var(--color-red);
}

.company-info-box {
    background: #f9f9f9;
    padding: var(--spacing-lg);
    border-radius: 8px;
    max-width: 800px;
    margin: var(--spacing-sm) auto 0;
}

.company-details {
    display: grid;
    grid-template-columns: 150px 1fr;
    gap: var(--spacing-sm);
}

.company-details dt {
    font-weight: 600;
    color: #333;
}

.company-details dd {
    margin: 0;
}

@media (max-width: 599px) {
    .contact-methods {
        grid-template-columns: 1fr;
    }

    .company-details {
        grid-template-columns: 1fr;
        gap: 0.5rem;
    }

    .company-details dt {
        margin-top: var(--spacing-sm);
    }
}
</style>

<?php
get_footer();
