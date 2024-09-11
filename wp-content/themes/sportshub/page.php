<?php
/*
  The main template file for display page
 */
?>
<?php get_header();?>
<div class="themelazer-blog-body themelazer_single_post_content_wrapper single_section_content themelazer-content-area
    <?php if(get_theme_mod('en_border_radius')==1){echo 'themelazer_en_radius';}else{}?>">
      <div class="container" id="wrapper_masonry">
         <div class="row">
            <div class="col-md-8 themelazer_content">
               <div class="post_content page_contents">
                  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                     <?php if ( has_post_thumbnail()) {
                        echo '<div class="themelazer_post_categories">';
                           the_post_thumbnail('sportshub_justify_feature');
                        echo '</div>';
                     }?>                    
                     <?php if(get_post_meta( get_the_ID(), 'abpage_title_ar', true ) !=""){ ?>
                        <div class="themelazer_single_feature">
                           <?php echo get_post_meta( get_the_ID(), 'abpage_title_ar', true ); ?>    
                        </div>
                     <?php }
                        echo '<div class="single_header_wrapper">';
                           echo '<h2>';
                              echo get_the_title();
                           echo '</h2>';
                        echo '</div>';
                     ?>
                     <?php the_content(); ?>
                     <?php endwhile;?>
                  <?php endif; ?>
                  <?php comments_template('', true); ?>
                  <?php wp_link_pages( array( 'before' => '<ul class="page-links">', 'after' => '</ul>', 'link_before' => '<li class="page-link">', 'link_after' => '</li>' ) ); 
                  ?>
               </div>
            </div>
            <!-- End content -->
            <!-- Start sidebar -->
            <div class="col-md-4 themelazer_sidebar themelazer_sticky">
               <?php if (is_active_sidebar('general-sidebar')) : dynamic_sidebar('general-sidebar');endif; ?>
            </div>
            <!-- End sidebar -->
         </div>
      </div>
</div>
<!-- end content -->
<?php get_footer(); ?>