jQuery(document).ready(function ($) {
    // Function to check if a post is bookmarked
    function isBookmarked(postId) {
        const bookmarks = JSON.parse(localStorage.getItem('bookmarked_posts')) || [];
        return bookmarks.includes(postId);
    }

    // Function to toggle the bookmark
    function toggleBookmark(postId, button) {
        let bookmarks = JSON.parse(localStorage.getItem('bookmarked_posts')) || [];
        if (bookmarks.includes(postId)) {
            // Remove the bookmark
            bookmarks = bookmarks.filter(id => id !== postId);
            button.text('Add to Bookmark'); // Update button text
        } else {
            // Add the bookmark
            bookmarks.push(postId);
            button.text('Remove Bookmark'); // Update button text
        }
        // Save updated bookmarks in localStorage
        localStorage.setItem('bookmarked_posts', JSON.stringify(bookmarks));
    }

    // Initialize buttons on page load
    $('.bookmark-btn').each(function () {
        const button = $(this);
        const postId = button.data('post-id');

        // Set the initial button state
        if (isBookmarked(postId)) {
            button.text('Remove Bookmark');
        } else {
            button.text('Add to Bookmark');
        }
    });

    // Handle click event for bookmark buttons
    $(document).on('click', '.bookmark-btn', function () {
        const button = $(this);
        const postId = button.data('post-id');

        // Toggle the bookmark and update the button in real-time
        toggleBookmark(postId, button);
    });
});