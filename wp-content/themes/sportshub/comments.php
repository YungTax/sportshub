<?php
// If the post is password protected and the visitor has not yet entered the password, return early without loading the comments.
if (post_password_required()) {
    return;
}
?>

<?php if (have_comments()) : // Check if there are comments. ?>
    <div class="single_section_comment">
        <div id="comments" class="comments-area">
<?php endif; // End check for comments. ?>

<?php
if (have_comments()) :
    // Separate comments by type (comments and pings).
    $comments_by_type = separate_comments($comments);
    $sportshub_comments_count = count($comments_by_type['comment']); // Count of comments
    $sportshub_pings_count = count($comments_by_type['pings']); // Count of pings and trackbacks
?>
    <?php if ($sportshub_pings_count) : // If there are pings or trackbacks. ?>
        <div class="themelazer_title_head">
            <h3>
                <?php
                // Display the count of pings and trackbacks.
                echo esc_html(sprintf(_n('One Ping', '%1$s Pings & Trackbacks', $sportshub_pings_count, 'sportshub'), number_format_i18n($sportshub_pings_count)));
                ?>
            </h3>
        </div>
        <ol class="commentlist">
            <?php
            // List pings and trackbacks.
            wp_list_comments(array('callback' => 'sportshub_comment', 'style' => 'ol', 'type' => 'pings'));
            ?>
        </ol>
    <?php endif; ?>

    <?php if ($sportshub_comments_count) : // If there are comments. ?>
        <div class="themelazer_title_head">
            <h3>
                <?php
                // Display the count of comments.
                echo esc_html(sprintf(_n('One Comment', '%1$s Comments', $sportshub_comments_count, 'sportshub'), number_format_i18n($sportshub_comments_count)));
                ?>
            </h3>
        </div>
        <ol class="commentlist">
            <?php
            // List comments.
            wp_list_comments(array('callback' => 'sportshub_comment', 'style' => 'ol', 'type' => 'comment'));
            ?>
        </ol>
    <?php endif; ?>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // If there are multiple pages of comments and comments pagination is enabled. ?>
        <nav id="comment-nav-below" class="navigation" role="navigation">
            <div class="nav-previous">
                <?php
                // Link to older comments.
                previous_comments_link(esc_html__('« Older Comments', 'sportshub'));
                ?>
            </div>
            <div class="nav-next">
                <?php
                // Link to newer comments.
                next_comments_link(esc_html__('Newer Comments »', 'sportshub'));
                ?>
            </div>
        </nav>
    <?php endif; ?>

<?php endif; // End check for comments. ?>

<?php
// Display the comment form.
comment_form(array(
    'comment_notes_after' => '', // Remove the default comment notes after the form fields.
    'fields'  => apply_filters('comment_form_default_fields', array(
        'author' => '<div class="form-fields row"><span class="comment-form-author col-md-4">' . '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" placeholder="' . esc_attr__('Full Name *', 'sportshub') . '" /></span>',
        'email'  => '<span class="comment-form-email col-md-4"><input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" placeholder="' . esc_attr__('Email address *', 'sportshub') . '" /></span>',
        'url' => '<span class="comment-form-author col-md-4"><input class="form-website" name="url" type="text" placeholder="' . esc_attr__('Website', 'sportshub') . '" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></span></div>',
    )),
    'comment_field' => '<p class="comment-form-comment"><textarea class="u-full-width" id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . esc_attr__('Comment *', 'sportshub') . '"></textarea></p>'
));
?>

<?php if (have_comments()) : // Check if there are comments again to close the divs opened above. ?>
        </div>
    </div>
<?php endif; // End check for comments. ?>