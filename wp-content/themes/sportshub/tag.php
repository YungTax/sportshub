<?php get_header();?>
   <div class="themelazer-blog-body">
      <div class="container" id="wrapper_masonry">
         <div class="row">
            <div class="col-md-8 themelazer_content">
               <?php echo sportshub_breadcrumb();?>
               <div class="row">
                  <div class="col-md-12">
                     <div class="themelazer_title_p">
                        <h2><?php single_tag_title('', true);?></h2>
                        <p><?php echo tag_description();?></p>
                     </div>
                  </div>
               </div>
               <div id="post-wrapper"> 
               <?php
               $sportshub_qry = sportshub_get_qry(); 
               if ($sportshub_qry->have_posts()) :
                  while ($sportshub_qry->have_posts()) : $sportshub_qry->the_post();
                        get_template_part('inc/post-layout/content', 'list'); // Include the post layout template part
                  endwhile;
               else :
                  echo '<div>No results found.</div>';
               endif;
               ?>
            </div>
            <button id="load-more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php'); ?>" 
        data-tag="<?php echo get_queried_object_id(); ?>"><?php echo esc_html_e('Load More ', 'sportshub');?></button>
            </div>
            <div class="col-md-4 themelazer_sidebar themelazer_sticky">
               <?php if (is_active_sidebar('general-sidebar')) : dynamic_sidebar('general-sidebar');endif; ?>
            </div>
         </div>
      </div>
   </div>
   <!-- end content -->
<?php get_footer(); ?>