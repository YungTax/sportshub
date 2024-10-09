<?php get_header();

    if (have_posts()) { while (have_posts()) { the_post();?>
        <div class="themelazer_progress_bar_wrapper">
            <div class="themelazer_progress_bar" id="progress_bar_active"></div>
        </div>
        <?php
            $categories = get_the_category();
            $tags = get_the_tags();
            $post_id = get_the_ID();
            $post_layout_display = get_post_meta( $post_id, 'single_post_layout', true );
            $single_post_layout_options = get_theme_mod('single_post_layout_options');
                if($single_post_layout_options == "single_post_full"){
                        get_template_part('single-header-full');    
                }else{
                    if($post_layout_display == "post_layout_fullheader"){
                        get_template_part('single-header-full');
                    }
                }
            $full= get_post_custom_values('single_post_full_single_post_full', get_the_ID());
            $cus_sidebar= get_post_custom_values('post_left_sidebar', get_the_ID());
        ?>
<div class="themelazer_scroll">
   <p class="themelazer_scroll_body">
      <span class="themelazer_scroll_text"><?php esc_html_e('SCROLL' , 'sportshub'); ?></span> 
      <span class="themelazer_scroll_line"></span> 
   </p>
</div>        
<!-- begin content -->
<section class="themelazer-blog-body themelazer_single_post_content_wrapper themelazer-content-area">
    <div class="container">
        <div class="row main_content">
            <div class="<?php 
                        if($cus_sidebar==true){echo "themelazer_sidebar_right ";} 
                        if($full==true){echo "col-md-12 enable_single_post_full ";}
                        else{echo "col-12 col-md-12 col-sm-12 col-lg-8 themelazer_content tl_sticky";}?> loop-large-post">
                <div class="widget_container content_page">
                <!-- start post -->
                    <div <?php post_class(); ?> id="post-<?php the_ID();?>">
                        <div class="single_section_content box blog_large_post_style">
                        <?php echo sportshub_breadcrumb();?>
                            <?php            
                                if($single_post_layout_options == "single_post_full"){

                                }else{
                                    if($post_layout_display == "post_layout_fullheader"){                                
                                    }else{
                                        get_template_part('single-header');                            
                                    }
                                }                                                    
                            ?>
                            <div class="post_content" itemprop="articleBody">
                            
                                <?php the_content(); ?>
                            </div>
                            <?php
                                $args = array(
                                    'before'             => '<div class="page-links"><span class="page-link-text">' . esc_html__( 'More pages: ', 'sportshub' ) . '</span>',
                                    'after'              => '</div>',
                                    'link_before'        => '<span class="page-link">',
                                    'link_after'         => '</span>',
                                    'next_or_number'     => 'number',
                                    'separator'          => '  ',
                                    'nextpagelink'       => esc_html__( 'Next ', 'sportshub' ) . '<i class="fa fa-chevron-right"></i>',
                                    'previouspagelink'   => '<i class="fa fa-angle-left"></i>' . esc_html__( ' Previous', 'sportshub' ),
                                );
                                wp_link_pages( $args );
                            ?>
                            <div class="clearfix"></div>
                            <div class="themelazer_tag_share">
                                <?php  if(get_theme_mod('disable_post_tag') !=1){?>
                                    <div class="blog-tags">
                                        <?php if (!empty($tags)){ ?>
                                            <span><?php esc_html_e('Tags:', 'sportshub'); ?></span>
                                                <?php the_tags('', '', ''); ?>  
                                        <?php } ?>
                                    </div>
                                <?php }?>  
                                <?php   
                                    if(get_theme_mod('disable_post_share') !=1){ 
                                        if(function_exists('sportshub_single_post_share_link')){
                                            echo sportshub_single_post_share_link(get_the_ID());
                                        }
                                    }
                                ?>         
                            </div>
                            <div class="clearfix"> </div>                                   
                        <?php } ?>
                    <?php } // end of the loop.   ?>
                            <!-- next post and prev post -->
                                    <div class="themelazer_next_prev_post_wrapper">
                                        <?php
                                        $sportshub_next_post = get_next_post();
                                        if ( !empty( $sportshub_next_post ) ) { // Check if there's a previous post
                                            $categories = get_the_category( $sportshub_next_post->ID );
        
                                        } else {
                                            echo null;
                                        }
                                        if ($categories) {
                                            foreach( $categories as $tag) {
                                                $tag_link = get_category_link($tag->term_id);
                                                $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);       
                                            }
                                        }
                                        if ($sportshub_next_post){
                                            $post = $sportshub_next_post;
                                            setup_postdata( $post );
                                            ?>
                                            <div class="fixed-post next-post">
                                                <div class="post-label" style="background: <?php echo get_term_meta($tag->term_id, "category_color_options", true);?>">
                                                    <span class="text"><?php esc_html_e('Next', 'sportshub'); ?></span>
                                                </div>
                                                <div class="post-wrapper">
                                                    <div class="image">
                                                        <a href="<?php echo esc_url(get_permalink($sportshub_next_post->ID)); ?>">
                                                        <?php echo get_the_post_thumbnail($sportshub_next_post->ID, 'sportshub_large_feature', array( 'title' => get_the_title() )); ?>
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <?php
                                                        if ($categories) {
                                                        echo '<div class="themelazer_post_categories">';
                                                        foreach( $categories as $tag) {
                                                            $tag_link = get_category_link($tag->term_id);
                                                            $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
                                                                echo '<a class="post-category-color-text" itemprop="articleSection" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
                                                        }
                                                        echo "</div>";
                                                        }?>
                                                        <h3 class="title">
                                                            <a class="title-animation-underline" href="<?php echo esc_url(get_permalink($sportshub_next_post->ID)); ?>"><?php echo esc_html(get_the_title($sportshub_next_post->ID)); ?></a>
                                                        </h3>
                                                        <span class="date"><?php echo sportshub_post_meta_next_post($sportshub_next_post->ID,'sportshub');  ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php wp_reset_postdata(); } ?>
                                        <?php 
                                                $sportshub_prev_post = get_previous_post();

                                                if ( !empty( $sportshub_prev_post ) ) { // Check if there's a previous post
                                                    $categories = get_the_category( $sportshub_prev_post->ID );
                
                                                } else {
                                                    echo null;
                                                }
                                                if ($categories) {
                                                    foreach( $categories as $tag) {
                                                        $tag_link = get_category_link($tag->term_id);
                                                        $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);       
                                                    }
                                                }
                                                if ($sportshub_prev_post){ 
                                                    $post = $sportshub_prev_post;
                                                    setup_postdata( $post );
                                                    if( !empty(get_permalink($sportshub_prev_post->ID))) { ?>
                                                        <div class="fixed-post prev-post">
                                                            <div class="post-label" style="background: <?php echo get_term_meta($tag->term_id, "category_color_options", true);?>">
                                                                <span class="text"><?php esc_html_e('Previews', 'sportshub'); ?></span>
                                                            </div>
                                                            <div class="post-wrapper">
                                                                <div class="content">
                                                                    <?php
                                                                        if ($categories) {
                                                                        echo '<div class="themelazer_post_categories">';
                                                                        foreach( $categories as $tag) {
                                                                            $tag_link = get_category_link($tag->term_id);
                                                                            $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
                                                                                echo '<a class="post-category-color-text" itemprop="articleSection" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
                                                                        }
                                                                        echo "</div>";
                                                                    }?>
                                                                    <h3 class="title">
                                                                        <a class="title-animation-underline" href="<?php echo esc_url(get_permalink($sportshub_prev_post->ID)); ?>"><?php echo esc_html(get_the_title($sportshub_prev_post->ID)); ?></a>
                                                                    </h3>
                                                                    <span class="date"><?php echo sportshub_post_meta_next_post($sportshub_prev_post->ID, 'sportshub'); ?></span>
                                                                </div>
                                                                <div class="image">
                                                                    <a href="<?php echo esc_url(get_permalink($sportshub_prev_post->ID)); ?>">
                                                                        <?php echo get_the_post_thumbnail($sportshub_prev_post->ID, 'sportshub_large_feature', array( 'title' => get_the_title() )); ?>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php  } 
                                                wp_reset_postdata();
                                                }?>
                                            </div>
                            <!--end next and prev section  -->
                            <!-- comment -->                            
                            <?php 
                                if (is_active_sidebar('jl_ads_before_comment')) : echo '<div class="jl_ads_section jl_before_comment">';  dynamic_sidebar('jl_ads_before_comment');echo '</div>'; endif;
                                comments_template('', true);
                                ?>
                        </div>
                    </div>
                    <!-- end post -->
                    <div class="brack_space"></div>
                </div>
         </div>
         <?php $full= get_post_custom_values('single_post_full_single_post_full', get_the_ID()); if($full ==true){}else{?>
            <div class=" col-12 col-md-12 col-sm-12 col-lg-4  themelazer_sticky <?php if($cus_sidebar==true){echo "themelazer_left_sidebar ";}else{ echo "themelazer_right_sidebar";}?>">
                <?php if (is_active_sidebar('general-sidebar')) : dynamic_sidebar('general-sidebar');endif; ?>
                <div class="brack_space"></div>
            </div>
         <?php }?>
      </div>  
   </div>   
   <div class="container p-0">
        <?php if(get_theme_mod('disable_post_related') !=1){ ?>
            <?php
                $arg_tag = array(
                    'category__in' => wp_get_post_categories(get_the_ID()), 
                    'showposts' => 4, 
                    'post__not_in' => array(get_the_ID())
                );
                $post_query = new WP_Query($arg_tag);
            ?>

            <?php if ($post_query->have_posts()) { // Only output section if there are related posts ?>
                <div class="themelazer_title_head">
                    <h3><?php esc_html_e('You May Also Like', 'sportshub'); ?></h3>
                </div>
                <div class="themelazer_related_post">
                    <?php
                        $post_count = 0;
                        while ($post_query->have_posts()) {
                            $post_query->the_post();
                            $post_id = get_the_ID();
                            $post_count++;
                    ?>
                    <div class="blog-style-one blog-small-grid">
                        <div class="img-box">
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail('sportshub_slider_grid_small');
                            } ?>
                        </div>
                        <div class="text-box">
                            <?php if(get_theme_mod('disable_post_category') !=1){
                                $categories = get_the_category(get_the_ID());          
                                if ($categories) {
                                    echo '<div class="themelazer_post_categories">';
                                    foreach ($categories as $tag) {
                                        $tag_link = get_category_link($tag->term_id);
                                        $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
                                        echo '<a class="post-category-color-text" itemprop="articleSection" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
                                    }
                                    echo "</div>";
                                }
                            } ?>
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h5>
                            <?php echo sportshub_post_meta_s(get_the_ID()); ?>
                        </div>
                    </div>
                    <?php if($post_count % 2 == 0){ echo '<div class="clear_2col_related"></div>'; } elseif($post_count % 3 == 0){ echo '<div class="clear_3col_related"></div>'; } ?>
                    <?php } wp_reset_postdata(); ?>
                </div>
            <?php } ?>
        <?php } ?>  
   </div>
</section>
<!-- end content -->
<?php get_footer(); ?>