
<?php
/**
 * Custom search form
 *
 * @package GX_Smart_Life
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x('Search for:', 'label', 'gx-smartlife'); ?></span>
        <input type="search"
               class="search-field"
               placeholder="<?php echo esc_attr_x('キーワードを入力...', 'placeholder', 'gx-smartlife'); ?>"
               value="<?php echo get_search_query(); ?>"
               name="s"
               required />
    </label>
    <button type="submit" class="search-submit">
        <i class="fas fa-search"></i>
        <span class="screen-reader-text"><?php echo esc_html_x('Search', 'submit button', 'gx-smartlife'); ?></span>
    </button>
</form>
