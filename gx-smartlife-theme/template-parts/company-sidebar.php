
<?php
/**
 * Template part for displaying company profile in sidebar
 *
 * @package GX_Smart_Life
 */
?>

<div class="company-profile-widget">
    <?php if (has_custom_logo()) : ?>
        <div class="company-logo">
            <?php the_custom_logo(); ?>
        </div>
    <?php endif; ?>

    <div class="company-name">
        <?php echo esc_html(get_theme_mod('gx_company_name', 'GXスマートライフ株式会社')); ?>
    </div>

    <div class="company-representative">
        <strong><?php esc_html_e('代表:', 'gx-smartlife'); ?></strong>
        <?php echo esc_html(get_theme_mod('gx_representative_name', '鈴木繁樹')); ?>
    </div>

    <div class="contact-info">
        <p>
            <i class="fas fa-phone"></i>
            <a href="tel:<?php echo esc_attr(str_replace('-', '', get_theme_mod('gx_phone_number', '070-2668-7130'))); ?>">
                <?php echo esc_html(get_theme_mod('gx_phone_number', '070-2668-7130')); ?>
            </a>
        </p>

        <p>
            <i class="fas fa-map-marker-alt"></i>
            <?php echo esc_html(get_theme_mod('gx_location', '千葉県市原市')); ?>
        </p>

        <p>
            <i class="fas fa-envelope"></i>
            <a href="mailto:<?php echo esc_attr(get_theme_mod('gx_email', 'info@gx-smartlife.com')); ?>">
                <?php echo esc_html(get_theme_mod('gx_email', 'info@gx-smartlife.com')); ?>
            </a>
        </p>
    </div>

    <div class="credentials">
        <h4><?php esc_html_e('保有資格', 'gx-smartlife'); ?></h4>
        <ul>
            <li><?php esc_html_e('第一種電気工事士', 'gx-smartlife'); ?></li>
            <li><?php esc_html_e('第二種電気工事士', 'gx-smartlife'); ?></li>
            <li><?php esc_html_e('認定電気工事従事者', 'gx-smartlife'); ?></li>
            <li><?php esc_html_e('太陽光発電システム施工技術者', 'gx-smartlife'); ?></li>
        </ul>
    </div>

    <div class="social-links">
        <?php if (get_theme_mod('gx_facebook_url')) : ?>
            <a href="<?php echo esc_url(get_theme_mod('gx_facebook_url')); ?>"
               target="_blank"
               rel="noopener noreferrer"
               aria-label="Facebook">
                <i class="fab fa-facebook"></i>
            </a>
        <?php endif; ?>

        <?php if (get_theme_mod('gx_twitter_url')) : ?>
            <a href="<?php echo esc_url(get_theme_mod('gx_twitter_url')); ?>"
               target="_blank"
               rel="noopener noreferrer"
               aria-label="Twitter/X">
                <i class="fab fa-twitter"></i>
            </a>
        <?php endif; ?>

        <a href="mailto:<?php echo esc_attr(get_theme_mod('gx_email', 'info@gx-smartlife.com')); ?>"
           aria-label="Email">
            <i class="fas fa-envelope"></i>
        </a>
    </div>

    <?php if (get_theme_mod('gx_line_url')) : ?>
        <div class="line-official mt-2">
            <h4><?php esc_html_e('LINE公式アカウント', 'gx-smartlife'); ?></h4>
            <p class="line-qr-note">
                <small><?php esc_html_e('QRコード: lin.ee/kJdicywN', 'gx-smartlife'); ?></small>
            </p>
            <a href="<?php echo esc_url(get_theme_mod('gx_line_url')); ?>"
               target="_blank"
               rel="noopener noreferrer"
               class="btn btn-outline">
                <i class="fab fa-line"></i>
                <?php esc_html_e('友だち追加', 'gx-smartlife'); ?>
            </a>
        </div>
    <?php endif; ?>
</div>

<style>
.company-profile-widget {
    background: #f9f9f9;
    padding: var(--spacing-sm);
    border-radius: 8px;
    text-align: center;
}

.company-logo {
    margin-bottom: var(--spacing-sm);
}

.company-logo img {
    max-width: 200px;
    margin: 0 auto;
}

.company-name {
    font-size: var(--font-size-medium);
    font-weight: 700;
    margin-bottom: var(--spacing-xs);
    color: var(--color-primary-blue);
}

.company-representative {
    font-size: var(--font-size-small);
    margin-bottom: var(--spacing-sm);
    color: #666;
}

.contact-info {
    text-align: left;
    margin: var(--spacing-sm) 0;
    font-size: var(--font-size-small);
}

.contact-info p {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin: 0.5rem 0;
}

.contact-info i {
    color: var(--color-primary-blue);
    width: 20px;
}

.credentials {
    margin: var(--spacing-sm) 0;
    text-align: left;
}

.credentials h4 {
    font-size: 1rem;
    margin-bottom: 0.5rem;
    color: var(--color-primary-blue);
    border-bottom: 1px solid #ddd;
    padding-bottom: 0.25rem;
}

.credentials ul {
    list-style: none;
    padding: 0;
    margin: 0;
    font-size: 0.85rem;
}

.credentials li {
    padding: 0.25rem 0;
    padding-left: 1.25rem;
    position: relative;
}

.credentials li:before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--color-green);
    font-weight: 700;
}

.line-official {
    border-top: 1px solid #ddd;
    padding-top: var(--spacing-sm);
}

.line-official h4 {
    font-size: 1rem;
    margin-bottom: 0.5rem;
    color: var(--color-primary-blue);
}

.line-qr-note {
    margin: 0.5rem 0;
    color: #666;
}

.line-official .btn {
    width: 100%;
    margin-top: 0.5rem;
}
</style>
