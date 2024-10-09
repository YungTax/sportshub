<?php get_header(); // Include the header template ?>
<div class="themelazer-blog-body">
   <div class="container" id="wrapper_masonry">
      <div class="row">
         <div class="col-12 col-md-12 col-sm-12 col-lg-8 themelazer_content">
            <?php echo sportshub_breadcrumb();?>
               <div class="row">
                  <div class="col-md-12">
                     <div class="themelazer_title_p">
                        <h2>
                           <?php
                           // Get the total post count
                           $total_posts = $wp_query->found_posts;
                           // Display the archive title with total post count
                           echo get_the_archive_title(). ' (' . $total_posts . ' ' . _n('post', 'posts', $total_posts, 'sportshub') . ')';
                           ?>
                        </h2>
                     </div>
                  </div>
               </div>
               <div class="row">
                     <?php
                     // Set up custom query arguments
                     $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                     $args = array(
                        'posts_per_page' => 12,   // Set to display 12 posts per page
                        'paged' => $paged,
                        'ignore_sticky_posts' => 1, // Ensure sticky posts are not counted
                     );
                     
                     // Merge with existing query arguments if needed
                     $sportshub_qry = new WP_Query(array_merge($args, sportshub_get_qry()->query_vars));

                     if ($sportshub_qry->have_posts()) :
                        while ($sportshub_qry->have_posts()) :
                           $sportshub_qry->the_post();
                           $sportshub_post_id = get_the_ID();
                           get_template_part('inc/post-layout/content', 'list');
                        endwhile;
                     else :
                        echo '<div class="col-md-12">';
                        if (is_search()) {
                           esc_html_e('No result found', 'sportshub');
                        } else {
                           esc_html_e('No posts found', 'sportshub');
                        }
                        echo '</div>';
                     endif;
                     ?>
                  </div>

                  <?php
                  // Custom pagination function
                  sportshub_pagination($sportshub_qry);
                  wp_reset_postdata();
                  ?>
         </div>
         <div class="col-12 col-md-12 col-sm-12 col-lg-4 themelazer_sidebar themelazer_sticky"> <!-- Sidebar area taking up 4 out of 12 columns on medium and larger screens -->
            <?php 
            if (is_active_sidebar('general-sidebar')) : 
               dynamic_sidebar('general-sidebar'); // Display the 'general-sidebar' if active
            endif; 
            ?>
         </div>
      </div>
   </div>
</div>
<?php get_footer(); // Include the footer template ?>