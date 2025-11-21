    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="footer-inner">
            <div class="footer-section footer-company">
                <h3><?php echo esc_html(get_theme_mod('gx_company_name', 'GXスマートライフ株式会社')); ?></h3>
                <p>
                    <strong><?php esc_html_e('代表:', 'gx-smartlife'); ?></strong>
                    <?php echo esc_html(get_theme_mod('gx_representative_name', '鈴木繁樹')); ?>
                </p>
                <p>
                    <strong><?php esc_html_e('TEL:', 'gx-smartlife'); ?></strong>
                    <a href="tel:<?php echo esc_attr(str_replace('-', '', get_theme_mod('gx_phone_number', '070-2668-7130'))); ?>">
                        <?php echo esc_html(get_theme_mod('gx_phone_number', '070-2668-7130')); ?>
                    </a>
                </p>
                <p>
                    <strong><?php esc_html_e('所在地:', 'gx-smartlife'); ?></strong>
                    <?php echo esc_html(get_theme_mod('gx_location', '千葉県市原市')); ?>
                </p>
                <p>
                    <strong><?php esc_html_e('Email:', 'gx-smartlife'); ?></strong>
                    <a href="mailto:<?php echo esc_attr(get_theme_mod('gx_email', 'info@gx-smartlife.com')); ?>">
                        <?php echo esc_html(get_theme_mod('gx_email', 'info@gx-smartlife.com')); ?>
                    </a>
                </p>

                <div class="social-links">
                    <?php if (get_theme_mod('gx_facebook_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('gx_facebook_url')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <i class="fab fa-facebook"></i>
                        </a>
                    <?php endif; ?>

                    <?php if (get_theme_mod('gx_twitter_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('gx_twitter_url')); ?>" target="_blank" rel="noopener noreferrer" aria-label="Twitter/X">
                            <i class="fab fa-twitter"></i>
                        </a>
                    <?php endif; ?>

                    <a href="mailto:<?php echo esc_attr(get_theme_mod('gx_email', 'info@gx-smartlife.com')); ?>" aria-label="Email">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>
            </div>

            <div class="footer-section footer-credentials">
                <h3><?php esc_html_e('資格・許可', 'gx-smartlife'); ?></h3>
                <div class="footer-credentials">
                    <p>
                        <?php
                        // Professional credentials
                        $credentials = array(
                            '第一種電気工事士',
                            '第二種電気工事士',
                            '認定電気工事従事者',
                            '太陽光発電システム施工技術者',
                            '蓄電池システム施工技術者',
                        );
                        echo implode('<br>', array_map('esc_html', $credentials));
                        ?>
                    </p>
                </div>
            </div>

            <div class="footer-section footer-line">
                <h3><?php esc_html_e('LINE公式アカウント', 'gx-smartlife'); ?></h3>
                <p><?php esc_html_e('お気軽にお問い合わせください', 'gx-smartlife'); ?></p>
                <?php if (get_theme_mod('gx_line_url')) : ?>
                    <p>
                        <a href="<?php echo esc_url(get_theme_mod('gx_line_url', 'https://lin.ee/kJdicywN')); ?>"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn btn-outline">
                            <i class="fab fa-line"></i> <?php esc_html_e('LINE友だち追加', 'gx-smartlife'); ?>
                        </a>
                    </p>
                    <p class="footer-qr-note">
                        <small><?php esc_html_e('QRコード: lin.ee/kJdicywN', 'gx-smartlife'); ?></small>
                    </p>
                <?php endif; ?>
            </div>

            <?php if (is_active_sidebar('footer-1')) : ?>
                <div class="footer-section footer-widgets">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="footer-bottom">
            <p>
                &copy; <?php echo esc_html(date('Y')); ?>
                <?php echo esc_html(get_theme_mod('gx_company_name', 'GXスマートライフ株式会社')); ?>.
                <?php esc_html_e('All Rights Reserved.', 'gx-smartlife'); ?>
            </p>
            <p>
                <a href="<?php echo esc_url(__('https://wordpress.org/', 'gx-smartlife')); ?>">
                    <?php printf(esc_html__('Powered by %s', 'gx-smartlife'), 'WordPress'); ?>
                </a>
                <span class="sep"> | </span>
                <?php printf(esc_html__('Theme: %1$s by %2$s', 'gx-smartlife'), 'GX Smart Life', 'GX Smart Life'); ?>
            </p>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
