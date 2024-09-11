<?php get_header(); // Include the header template ?>
<div class="themelazer-blog-body">
   <div class="container" id="wrapper_masonry"> <!-- Main container with an ID for potential JavaScript or CSS targeting -->
      <div class="row"> <!-- Bootstrap row to create a grid layout -->
         <div class="col-md-8 themelazer_content"> <!-- Main content area taking up 8 out of 12 columns on medium and larger screens -->
            <div class="row"> <!-- Nested row for author info -->
               <div class="col-md-12"> <!-- Full-width column -->
                  <div class="author_info author_info_page"> <!-- Author info section -->
                     <div class="author_avatar">
                        <?php echo get_avatar(get_the_author_meta('user_email'), 300); // Display author's avatar with size 300px ?>
                     </div>
                     <div class="author_description">
                        <h3 class="author_title"><?php the_author_meta('display_name'); // Display author's display name ?></h3>
                        <div class="author_bio">
                           <p><?php echo get_the_author_meta('description'); // Display author's description ?></p>
                           <p class="author_post_count">
                              <?php echo esc_html_e('Posts made: ', 'sportshub') . count_user_posts(get_the_author_meta('ID')); // Display count of posts made by the author ?>
                           </p>
                        </div>
                        <div class="themelazer-author-social-links"> <!-- Author social links section -->
                           <div class="themelazer-social-links-items">
                              <div class="themelazer-social-links-item">
                                 <?php 
                                 if (function_exists('sportshub_author_contact_icons')) { 
                                    sportshub_author_contact_icons(get_the_ID()); // Display author's social contact icons if the function exists
                                 } 
                                 ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <h3 class="themlazer_author_post_title">
               <?php echo esc_html_e('Latest articles by ', 'sportshub') . the_author_meta('display_name'); // Display 'Latest articles by' followed by the author's display name ?>
            </h3>
            <div class="row"> <!-- Nested row for the posts -->
               <?php
               $sportshub_qry = sportshub_get_qry(); // Custom query to get posts
               if ($sportshub_qry->have_posts()) : // Check if there are posts
                  while ($sportshub_qry->have_posts()) : // Loop through the posts
                     $sportshub_qry->the_post(); // Set up post data
                     $sportshub_post_id = $post->ID; // Get the current post ID
                     get_template_part('inc/post-layout/content', 'grid'); // Include the post layout template part (content-grid.php)
                  endwhile;
               else : // If no posts are found
                  echo '<div class="col-md-12">'; // Full-width column for no results message
                  if (is_search()) {
                     esc_html_e('No result found', 'sportshub'); // Display 'No result found' for search pages
                  }
                  echo '</div>';
               endif;
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