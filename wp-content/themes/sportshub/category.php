<?php
get_header(); // Include the header template

$cur_cat_id = get_query_var('cat'); // Get the current category ID from the query variables
$lazer_header_id = absint(get_term_meta($cur_cat_id, 'lazer_header_id', true)); // Get the header ID associated with the category
$current_category = get_category($cur_cat_id); // Get the current category object
$post_count = $current_category->count; // Get the post count for the current category
$categories = get_the_category(get_the_ID()); // Get the categories associated with the current post
// ?>

<!-- Rest of the code remains the same -->
<div class="themelazer-blog-body">
    <div class="container" id="wrapper_masonry"> <!-- Main container with an ID for potential JavaScript or CSS targeting -->
    
        <div class="row"> <!-- Bootstrap row for creating a grid layout -->
            <div class="col-md-8"> <!-- Main content area taking up 8 out of 12 columns on medium and larger screens -->
            <?php echo sportshub_breadcrumb();?>
            <section class="themelazer_page_category_wrapper">
                <div class="themelazer_page_category">
                    <?php
                    if ($lazer_header_id) {
                        $category_image = wp_get_attachment_image_src($lazer_header_id, 'sportshub_large_slider_image'); // Get the category header image
                        echo '<div class="category_image_bg_image" style="background-image: url(' . $category_image[0] . ');"></div>'; // Display the header image as a background
                        echo '<div class="category_image_bg_ov"></div>'; // Overlay for the header image
                    }
                    ?>
                    <div class="container">
                        <div class="themelazer_category_div_wrapper" style="background: <?php echo get_term_meta($cur_cat_id, "category_color_options", true); ?>"> <!-- Wrapper with category background color -->
                            <h2><?php single_cat_title('', true); echo " ($post_count " . _n('post', 'posts', $post_count, 'sportshub') . ")"; // Display the current category title with post count ?></h2>
                            <p><?php echo category_description(); // Display the category description ?></p>
                        </div>
                    </div>
                </div>
            </section>
            <div id="post-wrapper"> <!-- This is where posts will be loaded -->
               <?php
               $sportshub_qry = sportshub_get_qry(); // Custom query to get posts
               if ($sportshub_qry->have_posts()) :
                  while ($sportshub_qry->have_posts()) : $sportshub_qry->the_post();
                        get_template_part('inc/post-layout/content', 'list'); // Include the post layout template part
                  endwhile;
               else :
                  echo '<div>No results found.</div>';
               endif;
               ?>
            </div>

           <!-- Load More Button -->
           <button id="load-more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>" 
           data-category="<?php echo get_queried_object_id(); ?>"><?php echo esc_html_e('Load More ', 'sportshub');?></button>
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