<?php
/**
 * The template for displaying comments
 *
 * @package GX_Smart_Life
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            if ('1' === $comment_count) {
                printf(
                    esc_html__('1件のコメント', 'gx-smartlife')
                );
            } else {
                printf(
                    esc_html(_n(
                        '%1$s件のコメント',
                        '%1$s件のコメント',
                        $comment_count,
                        'gx-smartlife'
                    )),
                    number_format_i18n($comment_count)
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size' => 60,
            ));
            ?>
        </ol>

        <?php
        the_comments_navigation(array(
            'prev_text' => '<i class="fas fa-arrow-left"></i> ' . __('前のコメント', 'gx-smartlife'),
            'next_text' => __('次のコメント', 'gx-smartlife') . ' <i class="fas fa-arrow-right"></i>',
        ));

        if (!comments_open()) :
            ?>
            <p class="no-comments"><?php esc_html_e('コメントは受け付けていません。', 'gx-smartlife'); ?></p>
        <?php
        endif;

    endif;

    comment_form(array(
        'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
        'title_reply_after'  => '</h3>',
        'title_reply'        => __('コメントを残す', 'gx-smartlife'),
        'label_submit'       => __('コメントを送信', 'gx-smartlife'),
    ));
    ?>

</div>

<style>
.comments-area {
    margin-top: var(--spacing-lg);
    padding-top: var(--spacing-lg);
    border-top: 2px solid #e5e5e5;
}

.comments-title {
    color: var(--color-primary-blue);
    margin-bottom: var(--spacing-sm);
}

.comment-list {
    list-style: none;
    padding: 0;
    margin: var(--spacing-sm) 0;
}

.comment-list .comment {
    margin-bottom: var(--spacing-sm);
    padding: var(--spacing-sm);
    background: #f9f9f9;
    border-radius: 8px;
}

.comment-author {
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.comment-metadata {
    font-size: var(--font-size-small);
    color: var(--color-gray);
    margin-bottom: 0.5rem;
}

.comment-content {
    margin: var(--spacing-xs) 0;
}

.comment-reply-link {
    font-size: var(--font-size-small);
    color: var(--color-primary-blue);
}

.comment-form {
    margin-top: var(--spacing-sm);
}

.comment-form label {
    display: block;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.comment-form input[type="text"],
.comment-form input[type="email"],
.comment-form input[type="url"],
.comment-form textarea {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1rem;
    font-family: inherit;
    margin-bottom: var(--spacing-xs);
}

.comment-form input[type="text"]:focus,
.comment-form input[type="email"]:focus,
.comment-form input[type="url"]:focus,
.comment-form textarea:focus {
    outline: none;
    border-color: var(--color-primary-blue);
    box-shadow: 0 0 0 3px rgba(51, 122, 183, 0.1);
}

.comment-form .submit {
    background: var(--color-primary-blue);
    color: var(--color-white);
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
}

.comment-form .submit:hover {
    background: var(--color-dark-blue);
}

.no-comments {
    font-style: italic;
    color: #666;
    text-align: center;
    padding: var(--spacing-sm);
}
</style>
