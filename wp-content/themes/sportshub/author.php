<?php get_header(); // Include the header template ?>
<div class="themelazer-blog-body">
   <div class="container" id="wrapper_masonry"> <!-- Main container with an ID for potential JavaScript or CSS targeting -->
      <div class="row"> <!-- Bootstrap row to create a grid layout -->
         <div class="col-12 col-md-12 col-sm-12 col-lg-8 themelazer_content"> <!-- Main content area taking up 8 out of 12 columns on medium and larger screens -->
            <?php echo sportshub_breadcrumb();?>
            <div class="row"> <!-- Nested row for author info -->
               <div class="col-md-12"> <!-- Full-width column -->
                  <div class="author_info author_info_page"> <!-- Author info section -->
                     <div class="author_avatar">
                        <?php echo get_avatar(get_the_author_meta('user_email'), 500); // Display author's avatar with size 1000px ?>
                     </div>
                     <div class="author_description">
                        <h2 class="author_title"><?php the_author_meta('display_name'); // Display author's display name ?></h2>
                        <div class="themelazer-author-social-links"> <!-- Author social links section -->   
                           <div class="themelazer-social-links-items">
                              <div class="themelazer-social-links-item">
                                 <?php 
                                 if (function_exists('sportshub_author_contact_icons')) { 
                                    echo esc_html_e('Follow: ', 'sportshub');
                                    sportshub_author_contact_icons(get_the_ID()); // Display author's social contact icons if the function exists
                                 } 
                                 ?>
                              </div>
                           </div>
                        </div>
                        <div class="author_bio">
                           <p><?php echo get_the_author_meta('description'); // Display author's description ?></p>
                           <p class="author_post_count">
                              <?php echo esc_html_e('Posts made: ', 'sportshub') . count_user_posts(get_the_author_meta('ID')); // Display count of posts made by the author ?>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <h3 class="themlazer_author_post_title">
               <?php echo esc_html_e('Latest Posts by ', 'sportshub') . the_author_meta('display_name'); // Display 'Latest articles by' followed by the author's display name ?>
            </h3>
            <div id="post-wrapper"> <!-- This is where posts will be loaded -->
               <?php
               $sportshub_qry = sportshub_get_qry(); // Custom query to get posts
               if ($sportshub_qry->have_posts()) :
                  while ($sportshub_qry->have_posts()) : $sportshub_qry->the_post();
                        get_template_part('inc/post-layout/content-author', 'list'); // Include the post layout template part
                  endwhile;
               else :
                  echo '<div>No results found.</div>';
               endif;
               ?>
            </div>

            <button id="load-more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>" 
            data-author="<?php echo get_the_author_meta('ID'); ?>"> <?php echo esc_html_e('Load More ', 'sportshub');?></button>
         </div>
         <div class="col-12 col-md-12 col-sm-12 col-lg-4 themelazer_sidebar themelazer_sticky"> <!-- Sidebar area taking up 4 out of 12 columns on medium and larger screens -->
            <?php 
            if (is_active_sidebar('authors-sidebar')) : 
               dynamic_sidebar('authors-sidebar'); // Display the 'general-sidebar' if active
            endif; 
            ?>
         </div>
      </div>
   </div>
</div>
<!-- end content -->
<?php get_footer(); // Include the footer template ?>