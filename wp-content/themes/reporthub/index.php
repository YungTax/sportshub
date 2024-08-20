<?php get_header();?>
<div class="themelazer-blog-body">
    <div class="container" id="wrapper_masonry">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 themelazer_content">
                <div class="row">
                    <?php 
                        if (have_posts()){ 
                            while (have_posts()){ 
                                the_post();                         
                                get_template_part( 'inc/post-layout/content','grid');
                            }
                        }
                        else{      
                            echo '<div class="col-md-12">';  
                                if (is_search()) {  
                                    esc_html_e('No result found', 'reporthub');
                                }
                            echo '</div>';                         
                        }
                    ?>
                </div>
                <div class="themelazer-pagination">
                    <div class="themelazer-pagination-wrapper">
                        <?php
                              reporthub_pagination();
                              wp_reset_postdata();
                        ?>
                    </div>
                </div>      
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 themelazer_sidebar themelazer_sticky">
                <?php if (is_active_sidebar('general-sidebar')) : dynamic_sidebar('general-sidebar');endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- end content -->
<?php get_footer(); ?>