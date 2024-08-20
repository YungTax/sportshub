<?php get_header(); // Include the header template ?>
<div class="themelazer-blog-body">
   <div class="container" id="wrapper_masonry"> <!-- Main container with an ID for possible JavaScript or CSS targeting -->
      <div class="row"> <!-- Bootstrap row to create a horizontal group of columns -->
         <div class="col-md-8 themelazer_content"> <!-- Main content area taking up 8 columns on medium and larger screens -->
            <div class="row"> <!-- Nested row for the page title -->
               <div class="col-md-12"> <!-- Full-width column -->
                  <div class="themelazer_title_p">
                     <h2><?php echo get_the_archive_title(); ?></h2> <!-- Display the archive title (e.g., category name, date, etc.) -->
                  </div>
               </div>
            </div>
            <div class="row"> <!-- Nested row for the posts -->
               <?php
               $reporthub_qry = reporthub_get_qry(); // Custom query to get posts
               if ($reporthub_qry->have_posts()) : // Check if there are posts
                  while ($reporthub_qry->have_posts()) : // Loop through the posts
                     $reporthub_qry->the_post(); // Set up post data
                     $reporthub_post_id = $post->ID; // Get the current post ID
                     get_template_part('inc/post-layout/content', 'grid'); // Include the post layout template part (content-grid.php)
                  endwhile;
               else : // If no posts are found
                  echo '<div class="col-md-12">'; // Full-width column for no results message
                  if (is_search()) {
                     esc_html_e('No result found', 'reporthub'); // Display 'No result found' for search pages
                  }
                  echo '</div>';
               endif;
               ?>
            </div>
            <?php
            reporthub_pagination($reporthub_qry); // Custom pagination function
            wp_reset_postdata(); // Reset post data
            ?>
         </div>
         <div class="col-md-4 themelazer_sidebar themelazer_sticky"> <!-- Sidebar area taking up 4 columns on medium and larger screens -->
            <?php if (is_active_sidebar('general-sidebar')) : dynamic_sidebar('general-sidebar'); endif; // Display the 'general-sidebar' if active ?>
         </div>
      </div>
   </div>
</div>
<!-- end content -->
<?php get_footer(); // Include the footer template ?>