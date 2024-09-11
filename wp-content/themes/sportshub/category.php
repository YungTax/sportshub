<?php
get_header(); // Include the header template

$cur_cat_id = get_query_var('cat'); // Get the current category ID from the query variables
$jelly_header_id = absint(get_term_meta($cur_cat_id, 'jelly_header_id', true)); // Get the header ID associated with the category
$categories = get_the_category(get_the_ID()); // Get the categories associated with the current post

if ($categories) {
    echo '<div class="themelazer_post_categories">'; // Open a div for post categories
    foreach ($categories as $tag) { // Loop through each category
        $tag_link = get_category_link($tag->term_id); // Get the link to the category
        $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true); // Get the background color option for the category
        echo '<a class="post-category-color-text" itemprop="articleSection" style="background:' . $title_bg_Color . '" href="' . esc_url($tag_link) . '">' . $tag->name . $tag->count . '</a>'; // Display the category name and post count with a background color
    }
    echo "</div>"; // Close the div for post categories
}
?>
<section class="themelazer_page_category_wrapper">
    <div class="themelazer_page_category">
        <?php
        if ($jelly_header_id) {
            $category_image = wp_get_attachment_image_src($jelly_header_id, 'sportshub_large_slider_image'); // Get the category header image
            echo '<div class="category_image_bg_image" style="background-image: url(' . $category_image[0] . ');"></div>'; // Display the header image as a background
            echo '<div class="category_image_bg_ov"></div>'; // Overlay for the header image
        }
        ?>
        <div class="container">
            <div class="themelazer_category_div_wrapper" style="background: <?php echo get_term_meta($tag->term_id, "category_color_options", true); ?>"> <!-- Wrapper with category background color -->
                <h2>Category: <?php single_cat_title('', true); // Display the current category title ?></h2>
                <p><?php echo category_description(); // Display the category description ?></p>
            </div>
        </div>
    </div>
</section>
<div class="themelazer-blog-body">
    <div class="container" id="wrapper_masonry"> <!-- Main container with an ID for potential JavaScript or CSS targeting -->
        <div class="row"> <!-- Bootstrap row for creating a grid layout -->
            <div class="col-md-8"> <!-- Main content area taking up 8 out of 12 columns on medium and larger screens -->
                <div class="row"> <!-- Nested row for the posts -->
                    <?php
                    $sportshub_qry = sportshub_get_qry(); // Custom query to get posts
                    if ($sportshub_qry->have_posts()) { // Check if there are posts
                        while ($sportshub_qry->have_posts()) { // Loop through the posts
                            $sportshub_qry->the_post(); // Set up post data
                            $sportshub_post_id = $post->ID; // Get the current post ID
                            get_template_part('inc/post-layout/content', 'list'); // Include the post layout template part (content-grid.php)
                        }
                    } else { // If no posts are found
                        echo '<div class="col-md-12">'; // Full-width column for no results message
                        if (is_search()) {
                            esc_html_e('No result found', 'sportshub'); // Display 'No result found' for search pages
                        }
                        echo '</div>';
                    }
                    ?>
                </div>
                <?php 
                sportshub_pagination($sportshub_qry); // Custom pagination function
                wp_reset_postdata(); // Reset post data
                ?>
            </div>
            <div class="col-md-4 themelazer_sidebar themelazer_sticky"> <!-- Sidebar area taking up 4 out of 12 columns on medium and larger screens -->
                <?php 
                if (is_active_sidebar('general-sidebar')) : 
                    dynamic_sidebar('general-sidebar'); // Display the 'general-sidebar' if active
                endif; 
                ?>
            </div>
        </div>
    </div>
</div>
<!-- end content -->
<?php get_footer(); // Include the footer template ?>