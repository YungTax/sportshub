jQuery(document).ready(function($) {
    $('#load-more').on('click', function(e) {
        e.preventDefault();

        var button = $(this),
            page = button.data('page'),
            newPage = page + 1,
            ajaxurl = button.data('url'),
            category = button.data('category'),
            author = button.data('author'),
            tag = button.data('tag'),
            archive = button.data('archive');

        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                page: page,
                category_id: category,
                author_id: author,
                tag_id: tag,
                archive_id: archive,
                action: 'sportshub_load_more_posts',
            },
            beforeSend: function() {
                button.text('Loading...');
            },
            success: function(response) {
                if (response.trim()) {
                    $('#post-wrapper').append(response);
                    button.data('page', newPage);
                    button.text('Load More');
                } else {
                    button.text('No more posts');
                    button.fadeOut(1000);
                }
            }
        });
    });
});