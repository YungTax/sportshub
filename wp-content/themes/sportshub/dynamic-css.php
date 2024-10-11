<?php
    //Menu
    $sportshub_menu_font_family = get_theme_mod('sportshub_menu_font_family', 'Jost');
    $sportshub_menu_font_size = get_theme_mod('sportshub_menu_font_size', '14px');
    $sportshub_menu_font_weight = get_theme_mod('sportshub_menu_font_weight', '500');
    $sportshub_menu_transform = get_theme_mod('sportshub_menu_transform', 'uppercase');
    //Sub Menu
    $sportshub_sub_menu_font_size = get_theme_mod('sportshub_sub_menu_font_size', '13px');
    $sportshub_sub_menu_font_weight = get_theme_mod('sportshub_sub_menu_font_weight', '600');
    $sportshub_sub_menu_transform = get_theme_mod('sportshub_sub_menu_transform', 'uppercase');
    //Paragraph
    $sportshub_p_font_family = get_theme_mod('sportshub_p_font_family', 'Jost');
    $sportshub_p_font_size = get_theme_mod('sportshub_p_font_size', '18px');
    $sportshub_p_font_weight = get_theme_mod('sportshub_p_font_weight', '500');
    //Category
    $sportshub_category_font_family = get_theme_mod('sportshub_category_font_family', 'Jost');
    $sportshub_category_font_size = get_theme_mod('sportshub_category_font_size', '12px');
    $sportshub_category_font_weight = get_theme_mod('sportshub_category_font_weight', '600');
    //Title
    $sportshub_title_font_family = get_theme_mod('sportshub_title_font_family', 'Barlow semi condensed, sans-serif');
    $sportshub_title_font_weight = get_theme_mod('sportshub_title_font_weight', '600');
    $sportshub_title_transform = get_theme_mod('sportshub_title_transform', 'capitalize');    
    // Letter Spacing
    $letter_spacing_menu = get_theme_mod('letter_spacing_menu', '0.05em');
    $letter_spacing_sub_menu = get_theme_mod('letter_spacing_sub_menu', '0em');    
    //  Custom theme color
    $color = get_theme_mod('theme_color','#fc382a');
    $body_text_color = get_theme_mod('body_text_color','#000');
    $body_background_color = get_theme_mod('body_background_color','#fff');

?>
<?php if ($color) {?>
<?php
    $categories_widget_color = get_terms('category');
        if ($categories_widget_color) {
            foreach( $categories_widget_color as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
             echo '.cat-item-'.$tag->term_id.' span{background: '.$title_bg_Color.' !important;}';
        }
    }
?>

/* Global Styles */
body, p {
    color: <?php echo esc_attr($body_text_color); ?>;
    font-size: <?php echo esc_attr($sportshub_p_font_size); ?>;
    font-family: <?php echo esc_attr($sportshub_p_font_family); ?>, sans-serif !important;
    font-weight: <?php echo esc_attr($sportshub_p_font_weight); ?> !important;
}

/* WooCommerce Styles */
.woocommerce nav.woocommerce-pagination ul li a:focus,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li span.current {
    background-color: <?php echo esc_attr($color); ?> !important;
}

.woocommerce ul.cart_list li a,
.woocommerce ul.product_list_widget li a:hover {
    color: <?php echo esc_attr($color); ?>;
}

/* Title Styles */
.themelazer_title_head h3,
.single-sidebar .title h3,
.themelazer-author-title h3,
.comments-area h3#reply-title {
    font-family: <?php echo esc_attr($sportshub_p_font_family); ?>, sans-serif;
}

/* Read More Styles */
.themelazer_read_more_style2_wrapper .themelazer_read_more:hover {
    color: <?php echo esc_attr($color); ?> !important;
}

/* Search Wrapper Styles */
#themelazer_search_wrapper .category_header_search .themelazer_post_categories_search_form a {
    font-family: <?php echo esc_attr($sportshub_category_font_family); ?> !important;
    font-weight: <?php echo esc_attr($sportshub_category_font_weight); ?> !important;
}

/* Navigation Styles */
.slicknav_nav a {
    font-size: <?php echo esc_attr($sportshub_menu_font_size); ?> !important;
    font-family: <?php echo esc_attr($sportshub_menu_font_family); ?>, sans-serif !important;
    letter-spacing: <?php echo esc_attr($letter_spacing_menu); ?> !important;
    text-transform: <?php echo esc_attr($sportshub_menu_transform); ?> !important;
    font-weight: <?php echo esc_attr($sportshub_menu_font_weight); ?> !important;
}

/* Scroll To Top Styles */
.scroll-totop {
    font-family: <?php echo esc_attr($sportshub_title_font_family); ?> !important;
    <?php if($sportshub_title_transform) { echo 'text-transform:'.$sportshub_title_transform.' !important;'; } ?>
}

/* Footer Social Media Styles */
.themelazer_footer_social_media .themelazer_social_wrapper li a,
.themelazer_header_social_icons .themelazer_social_wrapper li a,
.themelazer_footer_social_media .themelazer_social_wrapper li a,
.themelazer-author-social-links .themelazer-social-links-items a {
    font-size: <?php echo esc_attr($sportshub_menu_font_size); ?> !important;
    font-family: <?php echo esc_attr($sportshub_menu_font_family); ?>, sans-serif !important;
    letter-spacing: <?php echo esc_attr($letter_spacing_menu); ?> !important;
    text-transform: <?php echo esc_attr($sportshub_menu_transform); ?> !important;
    font-weight: <?php echo esc_attr($sportshub_menu_font_weight); ?> !important;
}

/* Meta Info Styles */
.meta-info ul li {
    font-family: <?php echo esc_attr($sportshub_p_font_family); ?>, sans-serif !important;
    <?php if($sportshub_title_transform) { echo 'text-transform:'.$sportshub_title_transform.' !important;'; } ?>
}

/* Background Color Styles */
.meta-info-bg-color a,
#commentform #submit:hover,
.wpcf7-form-control.wpcf7-submit:hover {
    background-color: <?php echo esc_attr($color); ?> !important;
}

/* Hover Styles */
.logged-in-as a:hover,
.meta-info-text-color.meta-info-bg-color a,
.meta-info ul li a:hover,
.single_post_arrow_content #prepost:hover,
.single_post_arrow_content #nextpost:hover,
.comment-meta .comment-author-date:hover,
.comment-meta .comment-author-date:hover time {
    color: <?php echo esc_attr($color); ?> !important;
    background: transparent !important;
}

/* More Styles */
.footer-meta-info .themelazer_more {
    background-color: <?php echo esc_attr($color); ?> !important;
}

.themelazer_article_list .post-outer .post-inner .post-thumbnail .lbnumb {
    background-color: <?php echo esc_attr($color); ?> !important;
}

  
<?php }// menu font?>
.themelazer-navigation ul li a{font-size: <?php echo esc_attr($sportshub_menu_font_size);?> !important; font-family: <?php echo esc_attr($sportshub_menu_font_family);?>,sans-serif !important;<?php echo 'letter-spacing: '.$letter_spacing_menu.' !important;';?> <?php echo 'text-transform: '.esc_attr($sportshub_menu_transform).' !important;';?>}
.themelazer-navigation .menu li > a{font-size:<?php echo esc_attr($sportshub_menu_font_size);?>!important;font-family: <?php echo esc_attr($sportshub_menu_font_family);?> ,sans-serif !important;<?php echo 'letter-spacing: '.$letter_spacing_menu.' !important;';?> <?php echo 'text-transform: '.esc_attr($sportshub_menu_transform).' !important;';?> }

<?php // submenu font?>
.themelazer-navigation .menu > li li a{ <?php echo 'letter-spacing: '.$letter_spacing_sub_menu.' !important;';?> <?php echo 'text-transform: '.esc_attr($sportshub_sub_menu_transform).' !important;';?> <?php echo 'font-size:'.esc_attr($sportshub_sub_menu_font_size).' !important;';?> <?php echo 'font-weight:'.esc_attr($sportshub_sub_menu_font_weight).' !important;';?>}

.themelazer-navigation .menu > li li a{<?php echo 'letter-spacing: '.$letter_spacing_sub_menu.' !important;';?> <?php echo 'text-transform: '.esc_attr($sportshub_sub_menu_transform).' !important;';?> <?php echo 'font-size:'.esc_attr($sportshub_sub_menu_font_size).' !important;';?> <?php echo 'font-weight:'.esc_attr($sportshub_sub_menu_font_weight).' !important;';?>}

<?php // body font?>
.blog-tags a:hover{color:<?php echo esc_attr($color);?> !important;}
.themelazer_post_categories a{font-family:<?php echo esc_attr($sportshub_category_font_family);?> !important; font-size:<?php echo esc_attr($sportshub_category_font_size);?> !important; font-weight:<?php echo esc_attr($sportshub_category_font_weight);?> !important;}
.themelazer_article_list .post-outer .post-inner .entry-header h3 a{ background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}
.themelazer_next_prev_post_wrapper .title a{ background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}
.themelazer_article_list .post-outer .post-inner .entry-header h3 a:hover{  color:<?php echo esc_attr($color);?> !important;}
.themelazer_article_list .entry-title a:hover{color:<?php echo esc_attr($color);?> !important; }
.themelazer_newsletter .themelazer_submit{background:<?php echo esc_attr($color);?> !important;}

.themelazer_related_post .blog-small-grid .text-box h5 a{ background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}
.themelazer-pagination .page-numbers:hover{background:<?php echo esc_attr($color);?> !important;}
.themelazer_related_post .blog-small-grid .text-box h5 a:hover{color:<?php echo esc_attr($color);?> !important; }
#load-more{background-color:<?php echo esc_attr($color);?> !important;}
.blog-style-one .single-blog-style-one .text-box h1 a:hover{color:<?php echo esc_attr($color);?> !important;}
.blog-style-one .single-blog-style-one .text-box h2 a:hover{color:<?php echo esc_attr($color);?> !important;}
.blog-style-one .single-blog-style-one .text-box h3 a:hover{color:<?php echo esc_attr($color);?> !important;}
.blog-style-one .single-blog-style-one .text-box h4 a:hover{color:<?php echo esc_attr($color);?> !important;}
.blog-style-one .single-blog-style-one .text-box h5 a:hover{color:<?php echo esc_attr($color);?> !important;}
.blog-style-one .single-blog-style-one .text-box h6 a:hover{color:<?php echo esc_attr($color);?> !important;}

.themelazer_footer_menu li a:after{background:<?php echo esc_attr($color);?> !important; }
.theme_lazerfooter_widget_area .widget_nav_menu ul li a:after{background:<?php echo esc_attr($color);?> !important;}
.themelazer_post_categories a{color:<?php echo esc_attr($color);?> !important;}
.themelazer_article_list.themelazer_article_list_l h3.entry-title a{ background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}

.themelazer_blog_style_one .sigle_blog_style_one h1 a{ background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}
.blog-style-one .single-blog-style-one .text-box h2 a{background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}
.blog-style-one .single-blog-style-one .text-box h3 a{background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}
.blog-style-one .single-blog-style-one .text-box h4 a{background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}
.blog-style-one .single-blog-style-one .text-box h5 a{background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}
.blog-style-one .single-blog-style-one .text-box h6 a{background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}
.themelazer_article_list .entry-title a{background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}

.themelazer_blog_style_one .sigle_blog_style_one h1 a{background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}
.themelazer_blog_style_one .sigle_blog_style_one h2 a{background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}
.themelazer_blog_style_one .sigle_blog_style_one h3 a{background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}
.themelazer_blog_style_one .sigle_blog_style_one h4 a{background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}
.themelazer_blog_style_one .sigle_blog_style_one h5 a{background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}
.themelazer_blog_style_one .sigle_blog_style_one h6 a{background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}
.form-wrap input[type=submit]:hover{background:<?php echo esc_attr($color);?> !important;}
.widget_categories ul li a:hover{color:<?php echo esc_attr($color);?> !important; }
.widget_categories ul li:hover span{ border: solid 1px <?php echo esc_attr($color);?> !important;}
.widget_categories ul li{font-family:<?php echo esc_attr($sportshub_category_font_family);?> !important;  <?php if($sportshub_title_transform){echo 'text-transform:'.$sportshub_title_transform.' !important;';}?> }
.themelazer-pagination .page-numbers.current{background: <?php echo esc_attr($color);?> !important;}
.postnav_left span, .postnav_right span.lz_post_nav_right{<?php if($sportshub_title_transform){echo 'text-transform:'.$sportshub_title_transform.' !important;';}?>}
.themelazer-carousel .car_text_box h3 a{background-image: linear-gradient(to right, <?php echo esc_attr($color);?> 0%, #EAEAEA 100%) !important;}

.footer-meta-info .themelazer_more_themelazern{border-bottom: 1px solid <?php echo esc_attr($color);?> !important;}
.themelazer_feature_list_count{background-color:<?php echo esc_attr($color);?> !important; }border: solid 1px #be967f;
.blog-social-list a:hover{color:<?php echo esc_attr($color);?> !important;}
.postnav_left span, .postnav_right span.lz_post_nav_right{color:<?php echo esc_attr($color);?> !important}
#commentform #submit, .wpcf7-form-control.wpcf7-submit{background:<?php echo esc_attr($color);?> !important;}
#commentform #submit, .wpcf7-form-control.wpcf7-submit:hover{background:<?php echo esc_attr($color);?> !important;}
blockquote code, .wp-block-freeform.block-library-rich-text__tinymce code{color:<?php echo esc_attr($color);?> !important;}
#themelazer_search_wrapper .category_header_search .themelazer_post_categories_search_form a{color:<?php echo esc_attr($color);?> !important;}
.themelazer_progress_bar{background: linear-gradient(270deg,<?php echo esc_attr($color);?> 0%, #2f2f2f 100%) !important;}
.themelazer_feature_slider_content .themelazer_content_area .themelazer-arrow-left, .themelazer-arrow-right{background: <?php echo esc_attr($color);?> !important; }
.themelazer-arrow-left, .themelazer-arrow-right{ background: <?php echo esc_attr($color);?> !important; }
.themelazer-navigation .menu>li>a:before{ background-color: <?php echo esc_attr($color);?> !important; }
.themelazer-navigation .menu li li:hover>a, .themelazer-navigation .menu li li.current-menu-item>a{color:<?php echo esc_attr($color);?> !important; }
.themelazer-author-social-links .themelazer-social-links-items a:hover {
	color: <?php echo esc_attr($color);?> !important;
}
.themelazer_next_prev_post_wrapper .title a:hover {color: <?php echo esc_attr($color);?> !important;}
<!-- Body -->
body{
 background:<?php echo esc_attr($body_background_color);?> !important;
}
<?php // headding font?>
.comments-area li .comment-content.comment .comment-author-name a{font-family:<?php echo esc_attr($sportshub_title_font_family);?> !important;
 <?php if($sportshub_title_transform){echo 'text-transform:'.$sportshub_title_transform.' !important;';}?>
}
h1, h2, h3, h4, h5, h6 {font-family:<?php echo esc_attr($sportshub_title_font_family);?> !important;}
h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .postnav #prepost, .postnav  #nextpost, .bbp-forum-title, 
{font-weight: <?php echo esc_attr($sportshub_title_font_weight);?> !important; <?php if($sportshub_title_transform){echo 'text-transform:'.$sportshub_title_transform.' !important;';}?> <?php if(get_theme_mod('letter_spacing_heading')){echo 'letter-spacing: '.esc_attr(get_theme_mod('letter_spacing_heading','-0.03em')).' !important;';}?>}
.footer_carousel .meta-comment, .item_slide_caption h1 a,  .tickerfloat, .box-1 .inside h3, .detailholder.medium h3, .feature-post-list .feature-post-title, .widget-title h2, .image-post-title, .grid.caption_header h3, ul.tabs li a, h1, h2, h3, h4, h5, h6, .carousel_title, .postnav a, .format-aside a p.aside_title, .date_post_large_display, .<s></s>ocial-count-plus span, .themelazer_social_counter .num-count,
.sf-top-menu li a, .large_continue_reading span, .single_post_arrow_content #prepost, .single_post_arrow_content #nextpost, .cfs_from_wrapper .cfs_form_title, .comment-meta .comment-author-name, .themelazer_recent_post_number > li .themelazer_list_bg_num, .themelazer_recent_post_number .meta-category-small-text a, .themelazer_hsuthemelazer, .single_post_entry_content .post_suthemelazeritle_text{font-family:<?php echo esc_attr($sportshub_title_font_family);?> !important;}   

.blog-style-one .single-blog-style-one .text-box h3 a{font-family:<?php echo esc_attr($sportshub_title_font_family);?> !important;}
<!--body blog styles -->
<?php // headding font?>
h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .postnav #prepost, .postnav  #nextpost, .bbp-forum-title, .single_post_arrow_content #prepost, .single_post_arrow_content #nextpost{<?php echo 'line-height: '.esc_attr(get_theme_mod('line_height_heading','1.2')).' !important;';?>}
