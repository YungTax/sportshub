<?php
/*
  Template Name: Page line title
 */
?>
<?php get_header();?>
<div class="themelazer-blog-body single_section_content themelazer-content-area">
   <div class="container" id="wrapper_masonry">
      <div class="row">
         <div class="col-12 col-md-12 col-sm-12 col-lg-8 themelazer_content">
            <?php if (have_posts()) : while (have_posts()) : the_post();
               echo '<div class="themelazer_title_p">';
                  echo '<h2>';
                     echo get_the_title();
                  echo '</h2>';
               echo '</div>';
            ?>
            <?php if ( has_post_thumbnail()) {
               echo '<div class="themelazer_single_feature">';
                  the_post_thumbnail('sportshub_justify_feature');
               echo '</div>';
            }?>                    
            <?php if(get_post_meta( get_the_ID(), 'abpage_title_ar', true ) !=""){ ?>
               <div class="themelazer_single_feature">
                  <?php echo get_post_meta( get_the_ID(), 'abpage_title_ar', true ); ?>    
               </div>
            <?php }?>
            <div class="themelazer_single_content">              
               <?php the_content(); ?>
               <?php endwhile;?>
               <?php endif; ?>                    
               <?php wp_link_pages( array( 'before' => '<ul class="page-links">', 'after' => '</ul>', 'link_before' => '<li class="page-link">', 'link_after' => '</li>' ) ); 
               ?>
            </div>
         </div>
         <!-- End content -->
         <!-- Start sidebar -->
         <div class="col-12 col-md-12 col-sm-12 col-lg-4 themelazer_sidebar themelazer_sticky">
            <?php if (is_active_sidebar('general-sidebar')) : dynamic_sidebar('general-sidebar');endif; ?>
         </div>
         <!-- End sidebar -->
      </div>
   </div>
</div>
<!-- end content -->
<?php get_footer(); ?>