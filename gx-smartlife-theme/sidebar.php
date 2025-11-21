
<?php
/**
 * The sidebar containing the main widget area
 *
 * @package GX_Smart_Life
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="sidebar widget-area">
    <?php dynamic_sidebar('sidebar-1'); ?>

    <?php if (!is_active_sidebar('sidebar-1')) : ?>
        <!-- Default Sidebar Content -->

        <!-- Search Widget -->
        <section class="widget widget_search">
            <h2 class="widget-title"><?php esc_html_e('検索', 'gx-smartlife'); ?></h2>
            <?php get_search_form(); ?>
        </section>

        <!-- Recent Posts Widget -->
        <section class="widget widget_recent_entries">
            <h2 class="widget-title"><?php esc_html_e('最新記事', 'gx-smartlife'); ?></h2>
            <ul>
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 5,
                    'post_status' => 'publish'
                ));
                foreach ($recent_posts as $post) :
                    ?>
                    <li>
                        <a href="<?php echo esc_url(get_permalink($post['ID'])); ?>">
                            <?php echo esc_html($post['post_title']); ?>
                        </a>
                        <span class="post-date"><?php echo esc_html(get_the_date('', $post['ID'])); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <!-- Categories Widget -->
        <section class="widget widget_categories">
            <h2 class="widget-title"><?php esc_html_e('カテゴリー', 'gx-smartlife'); ?></h2>
            <ul>
                <?php
                wp_list_categories(array(
                    'title_li' => '',
                    'show_count' => true,
                ));
                ?>
            </ul>
        </section>

        <!-- Archives Widget -->
        <section class="widget widget_archive">
            <h2 class="widget-title"><?php esc_html_e('アーカイブ', 'gx-smartlife'); ?></h2>
            <ul>
                <?php
                wp_get_archives(array(
                    'type' => 'monthly',
                    'show_post_count' => true,
                ));
                ?>
            </ul>
        </section>

    <?php endif; ?>
</aside><!-- #secondary -->
