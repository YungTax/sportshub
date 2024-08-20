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
<!-- begin content -->
<section class="themelazer-blog-body themelazer_single_post_content_wrapper themelazer-content-area">
    <div class="container">
        <div class="row main_content">
            <div class="<?php 
                        if($cus_sidebar==true){echo "themelazer_sidebar_right ";} 
                        if($full==true){echo "col-md-12 enable_single_post_full ";}
                        else{echo "col-md-8 themelazer_content tl_sticky";}?> loop-large-post">
                <div class="widget_container content_page">
                <!-- start post -->
                    <div <?php post_class(); ?> id="post-<?php the_ID();?>">
                        <div class="single_section_content box blog_large_post_style">
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
                                    'before'             => '<div class="page-links"><span class="page-link-text">' . esc_html__( 'More pages: ', 'reporthub' ) . '</span>',
                                    'after'              => '</div>',
                                    'link_before'        => '<span class="page-link">',
                                    'link_after'         => '</span>',
                                    'next_or_number'     => 'number',
                                    'separator'          => '  ',
                                    'nextpagelink'       => esc_html__( 'Next ', 'reporthub' ) . '<i class="fa fa-chevron-right"></i>',
                                    'previouspagelink'   => '<i class="fa fa-angle-left"></i>' . esc_html__( ' Previous', 'reporthub' ),
                                );
                                wp_link_pages( $args );
                            ?>
                            <div class="clearfix"></div>
                            <div class="themelazer_tag_share">
                                <?php  if(get_theme_mod('disable_post_tag') !=1){?>
                                    <div class="blog-tags">
                                        <?php if (!empty($tags)){ ?>
                                            <span><?php esc_html_e('Tags:', 'reporthub'); ?></span>
                                                <?php the_tags('', '', ''); ?>  
                                        <?php } ?>
                                    </div>
                                <?php }?>  
                                <?php   
                                    if(get_theme_mod('disable_post_share') !=1){ 
                                        if(function_exists('reporthub_single_post_share_link')){
                                            echo reporthub_single_post_share_link(get_the_ID());
                                        }
                                    }
                                ?>         
                            </div>
                            <div class="clearfix"> </div>
                            <div class="themelazer_copy_link_form_wrapper">
                                <div class="themelazer_form_wrapper">
                                    <input type="text" name="url" value="<?php echo urldecode( get_the_permalink() ); ?>" class="themelazer_share_link_text" readonly>
                                    <button type="submit" class="themelazer_share_link_button">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 4 4 L 4 24 L 11 24 L 11 22 L 6 22 L 6 6 L 18 6 L 18 7 L 20 7 L 20 4 Z M 12 8 L 12 28 L 28 28 L 28 8 Z M 14 10 L 26 10 L 26 26 L 14 26 Z"/></svg>
                                        <span class="themelazer_popup_copy_link"><?php esc_html_e('Link Copied!', 'reporthub') ?></span>
                                    </button>
                                </div>
                            </div>
                            <?php if(get_theme_mod('disable_post_author') !=1){
                                if(get_the_author_meta('description')){?>                            
                                    <div class="author_info">
                                        <div class="author_avatar">
                                            <?php echo get_avatar(get_the_author_meta('user_email'), 300); ?>
                                        </div>
                                        <div class="author_description">
                                            <h3 class="author_title">
                                                <a itemprop="author" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ))); ?>">
                                                <?php the_author_meta( 'display_name' ); ?>  
                                                </a>
                                            </h3>
                                            <div class="author_bio">
                                                <p><?php echo get_the_author_meta('description'); ?></p>
                                                <p class="author_post_count"><?php echo esc_html_e('Posts made: ','reporthub') . count_user_posts( get_the_author_meta('ID') ); ?></p>
                                            </div>
                                            <div class="themelazer-author-social-links">
                                                <div class="themelazer-social-links-items">
                                                    <div class="themelazer-social-links-item">   
                                                        <?php if(function_exists('reporthub_author_contact_icons')) { reporthub_author_contact_icons(get_the_ID()); } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                            <?php }} ?>
                                   
                        <?php } ?>
                    <?php } // end of the loop.   ?>
                            <!-- next post and prev post -->
                                    <div class="themelazer_next_prev_post_wrapper">
                                        <?php
                                        $reporthub_next_post = get_next_post();
                                        $categories = get_the_category($reporthub_next_post->ID);  
                                        if ($categories) {
                                            foreach( $categories as $tag) {
                                                $tag_link = get_category_link($tag->term_id);
                                                $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);       
                                            }
                                        }
                                        if ($reporthub_next_post){
                                            $post = $reporthub_next_post;
                                            setup_postdata( $post );
                                            ?>
                                            <div class="fixed-post next-post">
                                                <div class="post-label" style="background: <?php echo get_term_meta($tag->term_id, "category_color_options", true);?>">
                                                    <span class="text"><?php esc_html_e('Next', 'reporthub'); ?></span>
                                                </div>
                                                <div class="post-wrapper">
                                                    <div class="image">
                                                        <a href="<?php echo esc_url(get_permalink($reporthub_next_post->ID)); ?>">
                                                        <?php echo get_the_post_thumbnail($reporthub_next_post->ID, 'thumbnail', array( 'title' => get_the_title() )); ?>
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <h3 class="title">
                                                            <a class="title-animation-underline" href="<?php echo esc_url(get_permalink($reporthub_next_post->ID)); ?>"><?php echo esc_html(get_the_title($reporthub_next_post->ID)); ?></a>
                                                        </h3>
                                                        <span class="date"><?php echo reporthub_post_meta_next_post($reporthub_next_post->ID,'reporthub');  ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php wp_reset_postdata(); } ?>
                                        <?php   $reporthub_prev_post = get_previous_post();
                                                $categories = get_the_category($reporthub_prev_post->ID);  
                                                if ($categories) {
                                                    foreach( $categories as $tag) {
                                                        $tag_link = get_category_link($tag->term_id);
                                                        $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);       
                                                    }
                                                }
                                                if ($reporthub_prev_post){ 
                                                    $post = $reporthub_prev_post;
                                                    setup_postdata( $post );
                                                    if( !empty(get_permalink($reporthub_prev_post->ID))) { ?>
                                                        <div class="fixed-post prev-post">
                                                            <div class="post-label" style="background: <?php echo get_term_meta($tag->term_id, "category_color_options", true);?>">
                                                                <span class="text"><?php esc_html_e('Previews', 'reporthub'); ?></span>
                                                            </div>
                                                            <div class="post-wrapper">
                                                                <div class="content">
                                                                    
                                                                    <h3 class="title">
                                                                        <a class="title-animation-underline" href="<?php echo esc_url(get_permalink($reporthub_prev_post->ID)); ?>"><?php echo esc_html(get_the_title($reporthub_prev_post->ID)); ?></a>
                                                                    </h3>
                                                                    <span class="date"><?php echo reporthub_post_meta_next_post($reporthub_prev_post->ID, 'reporthub'); ?></span>
                                                                </div>
                                                                <div class="image">
                                                                    <a href="<?php echo esc_url(get_permalink($reporthub_prev_post->ID)); ?>">
                                                                        <?php echo get_the_post_thumbnail($reporthub_prev_post->ID, 'thumbnail', array( 'title' => get_the_title() )); ?>
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
            <div class="col-md-4  themelazer_sticky <?php if($cus_sidebar==true){echo "themelazer_left_sidebar ";}else{ echo "themelazer_right_sidebar";}?>">
                <?php if (is_active_sidebar('general-sidebar')) : dynamic_sidebar('general-sidebar');endif; ?>
                <div class="brack_space"></div>
            </div>
         <?php }?>
      </div>
   </div>          
    <?php if(get_theme_mod('disable_post_related') !=1){?>
        <div class="themelazer_title_head">
            <h3><?php esc_html_e('You May Also Like', 'reporthub'); ?> </h3>
        </div>            
        <div class="themelazer_related_post">
            <?php
                $arg_tag = array('category__in' => wp_get_post_categories($post_id), 'showposts' => 4, 'post__not_in' => array($post_id));
                $post_query = null;
                $post_query = new WP_Query($arg_tag);
                $post_count = 0;         
                while ($post_query->have_posts()) {
                    $post_query->the_post();
                    $post_id = get_the_ID();
                    $categories = get_the_category(get_the_ID());
                $post_count ++;
            ?>
        <div class=" blog-style-one blog-small-grid">
        
            <div class="img-box">
                <?php if ( has_post_thumbnail()) {
                    the_post_thumbnail('reporthub_slider_grid_small');
                }?>
            </div>
            <div class="text-box">
                <?php  if(get_theme_mod('disable_post_category') !=1){
                            $categories = get_the_category(get_the_ID());          
                            if ($categories) {
                            echo '<div class="themelazer_post_categories">';
                            foreach( $categories as $tag) {
                                $tag_link = get_category_link($tag->term_id);
                                $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
                                    echo '<a class="post-category-color-text" itemprop="articleSection" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
                            }
                            echo "</div>";
                            }
                }?>
                <h5><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h5>
                <?php echo reporthub_post_meta_s(get_the_ID()); ?>
            </div>
        
        </div>
        <?php if($post_count%2==0){echo '<div class="clear_2col_related"></div>';}elseif($post_count%3==0){echo '<div class="clear_3col_related"></div>';}?>
        <?php } wp_reset_postdata(); ?>
    </div>
    <?php } ?>
</section>
<!-- end content -->
<?php get_footer(); ?>