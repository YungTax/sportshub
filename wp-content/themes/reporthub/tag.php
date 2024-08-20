<?php get_header();?>
   <div class="themelazer-blog-body">
      <div class="container" id="wrapper_masonry">
         <div class="row">
            <div class="col-md-8 themelazer_content">
               <div class="row">
                  <div class="col-md-12">
                     <div class="themelazer_title_p">
                        <h2><?php single_tag_title('', true);?></h2>
                        <p><?php echo tag_description();?></p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <?php 
                     $reporthub_qry = reporthub_get_qry();
                     if ( $reporthub_qry->have_posts() ) {
                        while ( $reporthub_qry->have_posts() ) { 
                           $reporthub_qry->the_post();
                           $reporthub_post_id = $post->ID;          
                           get_template_part( 'inc/post-layout/content','grid');          
                        }
                     }else{       
                        echo '<div class="col-md-12">'; 
                                 if (is_search()) { 
                                       esc_html_e('No result found', 'reporthub');
                                 }
                        echo '</div>';              
                     }
                  ?>
               </div>
               <?php
                  reporthub_pagination( $reporthub_qry );
                  wp_reset_postdata();
               ?>
            </div>
            <div class="col-md-4 themelazer_sidebar themelazer_sticky">
               <?php if (is_active_sidebar('general-sidebar')) : dynamic_sidebar('general-sidebar');endif; ?>
            </div>
         </div>
      </div>
   </div>
   <!-- end content -->
<?php get_footer(); ?>