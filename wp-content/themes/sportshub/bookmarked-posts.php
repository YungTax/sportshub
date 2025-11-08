<?php
/*
Template Name: Bookmarked Posts
*/

get_header(); ?>

<div class="container">
<h1>My Bookmarked Posts</h1>
<div id="bookmark-counter">Total Bookmarked Posts: 0</div>

</div>
<div class="themelazer-blog-body">
    <div class="container" id="wrapper_masonry">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 themelazer_content">
            <div id="bookmarked-posts-list" class="row">
    <!-- Posts will be dynamically inserted here -->
            </div>

            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 themelazer_sidebar themelazer_sticky">
                <?php if (is_active_sidebar('general-sidebar')) : dynamic_sidebar('general-sidebar');endif; ?>
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function ($) {
        const bookmarks = JSON.parse(localStorage.getItem('bookmarked_posts')) || [];
        if (bookmarks.length === 0) {
            $('#bookmarked-posts-list').html('<p>You have no bookmarks yet.</p>');
            return;
        }

        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            method: 'POST',
            data: {
                action: 'fetch_bookmarked_posts',
                post_ids: bookmarks
            },
            success: function (response) {
                if (response.success) {
                    $('#bookmarked-posts-list').html(response.data);
                } else {
                    $('#bookmarked-posts-list').html('<p>Error loading bookmarks.</p>');
                }
            },
            error: function () {
                $('#bookmarked-posts-list').html('<p>Error loading bookmarks.</p>');
            }
        });
    });
</script>

<?php
get_footer();