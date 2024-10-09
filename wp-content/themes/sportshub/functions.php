<?php

if ( ! isset( $content_width ) ){ $content_width = 1190; }
    add_theme_support( 'post-formats', array('gallery', 'quote', 'video', 'audio') );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "title-tag" );
    add_theme_support( 'post-thumbnails');
    add_theme_support( 'align-wide' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support( 'custom-header', array(
        'width'         => 1000,
        'height'        => 250,
        'flex-height'   => true,
        'flex-width'    => true,
        'header-text'   => false,
    ));
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ));
// Post thumbnail support

if (!function_exists('sportshub_image_size')) {
    function sportshub_image_size() {
        $image_sizes = array(
            'sportshub_justify_feature' => array(1000, 400, false),
            'sportshub_small_feature' => array(150, 150, true),
            'sportshub_small_breaking_news' => array(90, 60, true),
            'sportshub_small_recent_feature' => array(150, 100, true),
            'sportshub_feature_link_list' => array(230, 115, true),
            'sportshub_feature_gird' => array(344, 344, true),
            'sportshub_large_feature' => array(650, 650, true),
            'sportshub_large_list_feature' => array(300, 300, true),
            'sportshub_large_slider_image' => array(1920, 982, true),
            'sportshub_slider_grid_large' => array(1100, 700, true),
            'sportshub_slider_grid_small' => array(650, 465, true),
            'sportshub_list_post_large' => array(650, 850, true),
            'sportshub_list_large' => array(450, 450, true),
            'sportshub_carousel' => array(600, 750, true),
            'sportshub_marsonry' => array(1000, 1500, true),
            'sportshub_grid_post' => array(1400, 650, true),
            'sportshub_small_list' =>array(332, 186, true),
            'sportshub_list' =>array(792, 446, true),
        );

        foreach ($image_sizes as $name => $args) {
            add_image_size($name, $args[0], $args[1], $args[2]);
        }
    }

    add_action('init', 'sportshub_image_size');
}
function sportshub_register_block_styles() {
    // Register custom block styles.
    register_block_style(
        'core/paragraph',
        array(
            'name'  => 'fancy-paragraph',
            'label' => __( 'Fancy Paragraph', 'sportshub' ),
        )
    );
}
add_action( 'init', 'sportshub_register_block_styles' );

function sportshub_register_block_patterns() {
    // Register block patterns.
    register_block_pattern(
        'theme/text-and-image',
        array(
            'title'       => __( 'Text and Image', 'sportshub' ),
            'description' => _x( 'A section with a text and an image', 'Block pattern description', 'sportshub' ),
            'content'     => "<!-- wp:paragraph --><p>Lorem ipsum...</p><!-- /wp:paragraph --><!-- wp:image --><figure class=\"wp-block-image\"><img src=\"https://example.com/image.jpg\" alt=\"\"/></figure><!-- /wp:image -->",
        )
    );
}
add_action( 'init', 'sportshub_register_block_patterns' );
//body class
add_filter( 'body_class','sportshub_body_classes' );
function sportshub_body_classes( $classes ) {
    $classes[] = 'mobile_nav_class';
    if (is_active_sidebar('general-sidebar')) {$classes[] = 'themelazer-has-sidebar';}
    return $classes;    
}
// woocomerce theme support   
function sportshub_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'sportshub_add_woocommerce_support' );
  
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 4; // 4products per row
    }
}
add_filter('loop_shop_columns', 'loop_columns', 999);

//Remove Mobile Menu id
add_filter('nav_menu_item_id', 'sportshub_my_css_attributes_filter', 100, 1);
function sportshub_my_css_attributes_filter($var) {
    return is_array($var) ? array() : '';
}

//custom categories_link
add_filter('wp_list_categories', 'sportshub_categories_count_span');
add_filter('get_archives_link', 'sportshub_archives_count');
function sportshub_categories_count_span($links) {
    $links = str_replace('</a> (', '</a> <span>', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

// Replace default categories widgets
function sportshub_archives_count($links){
    $links = str_replace('</a>&nbsp;(', '</a> <span>', $links);
    $links = str_replace(')</li>', '</span></li>', $links);
    return $links;
}
// Sidebar register
function sportshub_sidebar_register() {
    $sidebar_args = array(
        'before_widget' => '<div id="%1$s" class="single-sidebar  %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</h3></div>',
    );

    $sidebars = array(
        array(
            'name' => esc_html__('General Sidebar', 'sportshub'),
            'id' => 'general-sidebar',
        ),
        array(
            'name' => esc_html__('Mobile Sidebar', 'sportshub'),
            'id' => 'moobile-sidebar',
        ),
        array(
            'name' => esc_html__('Authors Sidebar', 'sportshub'),
            'id' => 'authors-sidebar',
        ),
        array(
            'name' => esc_html__('Instagram', 'sportshub'),
            'id' => 'instagram-sidebar',
        ),
        array(
            'name' => esc_html__('First Footer Sidebar', 'sportshub'),
            'id' => 'footer1-sidebar',
        ),
        array(
            'name' => esc_html__('Second Footer Sidebar', 'sportshub'),
            'id' => 'footer2-sidebar',
        ),
        array(
            'name' => esc_html__('Third Footer Sidebar', 'sportshub'),
            'id' => 'footer3-sidebar',
        ),
        array(
            'name' => esc_html__('Fourth Footer Sidebar', 'sportshub'),
            'id' => 'footer4-sidebar',
        ),
        array(
            'name' => esc_html__('Five Footer Sidebar', 'sportshub'),
            'id' => 'footer5-sidebar',
        ),
    );

    foreach ($sidebars as $sidebar) {
        register_sidebar(array_merge($sidebar, $sidebar_args));
    }
}
add_action('widgets_init', 'sportshub_sidebar_register');


//gallery hook
if (!function_exists('sportshub_themelazermedia_gallery_upload_get_images')) {
    function sportshub_themelazermedia_gallery_upload_get_images(){
        $ids=$_POST['ids'];
        $ids=explode(",",$ids);
        foreach($ids as $id):
            $image = wp_get_attachment_image_src($id,'thumbnail', true);
            echo '<li class="themelazermedia-gallery-image-holder"><img src="'.esc_url($image[0]).'"/></li>';
        endforeach;
        exit;
    }
    add_action( 'wp_ajax_sportshub_themelazermedia_gallery_upload_get_images', 'sportshub_themelazermedia_gallery_upload_get_images');
}

//register menu
function sportshub_register_menu() {
    register_nav_menus(
            array(
                'Main_Menu' => esc_html__('Main menu', 'sportshub'),
                'top-header-menu' => __( 'Top Header Menu', 'sportshub' ),
                'Footer_Menu' => esc_html__('Footer menu', 'sportshub'),
                'Side_Menu' => esc_html__('Side menu', 'sportshub')
            )
    );
}
add_action('init', 'sportshub_register_menu');

//language part
function sportshub_setup_language(){
    load_theme_textdomain('sportshub', get_template_directory() . '/langs');
}
add_action('after_setup_theme', 'sportshub_setup_language');

// Author Social icons
function sportshub_author_contact_icons() { ?>
    <?php if(get_the_author_meta('facebook')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('facebook')); ?>"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('twitter')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('twitter')); ?>"><i class="fab fa-twitter"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('linkedin')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('linkedin')); ?>"><i class="fab fa-linkedin-in"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('instagram')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('instagram')); ?>"><i class="fab fa-instagram"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('pinterest')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('pinterest')); ?>"><i class="fab fa-pinterest-p"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('tumblr')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('tumblr')); ?>"><i class="fab fa-tumblr"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('youtube')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('youtube')); ?>"><i class="fab fa-youtube"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('dribbble')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('dribbble')); ?>"><i class="fab fa-dribbble"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('sportshub-email')) : ?><a target="_blank" href="mailto:<?php echo esc_html(the_author_meta('sportshub-email')); ?>">M</a><?php endif; ?>

<?php }

//Comment template
if ( ! function_exists( 'sportshub_comment' ) ){
function sportshub_comment( $comment, $args, $depth ) {
    global $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :      
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <p>
            <?php esc_html_e( 'Pingback:', 'sportshub'); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'sportshub'), '<span class="edit-link">', '</span>' ); ?>
                
        </p>
        <?php
            break;
            default :
            global $post;
        ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment">
            <div class="comment-meta comment-author vcard">
                <?php
                    echo get_avatar( $comment, 80 );
                    echo '<section class="comment-content comment" itemprop="text">';
                    printf( '<span class="comment-author-name" itemprop="name">%1$s %2$s</span>',
                        get_comment_author_link(),
                        ( $comment->user_id === $post->post_author ) ? '<span> ' . esc_html__( 'Post author', 'sportshub') . '</span>' : ''
                    );  
                ?>
                        <?php if ( '0' == $comment->comment_approved ) : ?>
                            <p class="comment-awaiting-moderation">
                                <?php esc_html_e( 'Your comment is awaiting moderation.', 'sportshub'); ?>
                            </p>
                        <?php endif; ?>
                        <?php comment_text();
                            printf( '<a class="comment-author-date" itemprop="datePublished" href="%1$s"><time datetime="%2$s"><i class="far fa-clock"></i>%3$s</time></a>',
                                    esc_url( get_comment_link( $comment->comment_ID ) ),
                                    get_comment_time( 'c' ),
                                    sprintf( esc_html__( '%1$s at %2$s', 'sportshub'), get_comment_date(), get_comment_time() )
                                );
                        ?>
                        <div class="com_wp_nav">
                            <?php edit_comment_link( esc_html__( 'Edit', 'sportshub'), '', '' ); ?>
                            <?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'sportshub'), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                        </div>
                </section>
            </div>              
        </article>
    <?php
    break;
    endswitch; 
    }
}
// Pagination Numeric 
function sportshub_pagination_num($args = array()){    
    $big = 999999999;
    $paging = array(
                        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format'    => '?paged=%#%',
                        'current'   => max( 1, $args['paged'] ),
                        'total'     => $args['total'],
                        'prev_next' => true,
                        'prev_text' => '<i class="ti-angle-left"></i>',
                        'next_text' => '<i class="ti-angle-right"></i>',
                        'type' => 'list',
                    );
    return paginate_links($paging);
}
//NUMERIC PAGE NAVI
if ( ! function_exists( 'sportshub_pagination' ) ) {
    function sportshub_pagination( $sportshub_qry = NULL ) {
            $sportshub_no_more_articles = esc_html__( 'No more articles', 'sportshub' );
            $sportshub_load_more_text = esc_html__( 'Load More', 'sportshub' );
            $sportshub_pagination_type = 'numbered';
            if ( is_category() ) {
                    $sportshub_cat_id = get_query_var('cat');
                    $sportshub_pagination_type = get_term_meta( $sportshub_cat_id, 'sportshub_cat_infinite', true);   
            }
            if ( is_home() ) {
            }

            if ( is_tag() ) {
            }
            if ( $sportshub_qry == NULL ) {
                    global $wp_query;
                    $sportshub_total = $GLOBALS['wp_query']->max_num_pages;
                    $sportshub_paged = get_query_var('paged');
            } else {     
                if ( is_page() ) {
                    $sportshub_total = $sportshub_qry->max_num_pages;
                    $sportshub_pagination_type = 'n';
                    $sportshub_paged = get_query_var('page');
                } else {
                    global $wp_query;
                    $sportshub_paged = get_query_var('paged');
                    $sportshub_total = $GLOBALS['wp_query']->max_num_pages;
                }
            }
            if ( $sportshub_pagination_type == 'infinite-load' ) {
                if ( get_next_posts_link() != NULL ) {
                    echo '<div class="pagination-more"><div class="more-previous">' . get_next_posts_link( $sportshub_load_more_text ) . '</div></div>';
                } else {
                    echo '<div class="pagination-more"><div class="more-previous">' . $sportshub_no_more_articles . '</div></div>';
                }
            } elseif ( $sportshub_pagination_type == 'infinite-scroll' ) {
                if (  get_next_posts_link() != NULL ) {
                    echo '<div class="themelazer-infinite-load">' . get_next_posts_link( $sportshub_load_more_text ) . '</div>';
                } else {
                    echo '<div class="themelazer-infinite-load"><span>' . $sportshub_no_more_articles . '</span></div>';
                }
            } else {
                $sportshub_pagination = paginate_links( array(
                    'base'     => str_replace( 99999, '%#%', esc_url( get_pagenum_link(99999) ) ),
                    'format'   => '',
                    'total'    => $sportshub_total,
                    'current'  => max( 1, $sportshub_paged ),
                    'mid_size' => 2,
                    'prev_text' => '<i class="ti-angle-left"></i>',
                    'next_text' => '<i class="ti-angle-right"></i>',
                    'type' => 'list',
                ) );
                echo '<div class="themelazer-pagination">
                      <div class="themelazer-pagination-wrapper">' . $sportshub_pagination . '</div></div>';
            }
    }
}

// Reading Time Calculation
function sportshub_reading_time_calculation( $content) {
    $post_id = get_the_ID();
    $minutes = 0;
    $words_per_minute = 225;
    $words_per_second = $words_per_minute / 60;
    $content_reading = get_post_field('post_content', $post_id);
    $content_reading = strip_tags($content_reading);
    $words = str_word_count($content_reading);
    if ( !empty( $words ) ) {
        $minutes = floor( $words / $words_per_minute );
    }
    if( $minutes < 1){
        $minutes = 1;   
    }
    return $minutes;
}

// Single meta
function sportshub_singlepost_meta($post_id) {                
    echo'<div class="meta-info"> <ul>';
    if(get_theme_mod('disable_post_author') !=1){ echo '<li class="post-author" title="'.esc_attr(get_the_author_meta()).'">';
    echo get_avatar(get_the_author_meta('ID'), 80);
    echo esc_html_e('by ','sportshub').the_author_posts_link();echo'</li>';}          
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}                 
    if(function_exists('sportshub_bac_PostViews')){
    if(get_theme_mod('disable_post_view') !=1){
    echo '<li class="post-view">';                
    echo sportshub_bac_PostViews(get_the_ID()).' ';
    esc_html_e('Views', 'sportshub');                
    echo '</li>';
    }}
    if(get_theme_mod('disable_post_comment_meta') !=1){
        echo '<li class="post-comment">';
        echo comments_popup_link(esc_html__('0 Comment', 'sportshub' ), esc_html__('1 Comment', 'sportshub'), esc_html__('% Comments', 'sportshub'));
        echo '</li>';
    }
    echo '<li class="post-read">'.sportshub_reading_time_calculation('content').esc_html__('minutes read','sportshub').'</li>';
    echo'</ul></div>'; 
}
function sportshub_singlepost_large($post_id) {                
    echo'<div class="meta-info"> <ul>';
    if(get_theme_mod('disable_post_author') !=1){ echo '<li class="post-author" title="'.esc_attr(get_the_author_meta()).'">';
    echo get_avatar(get_the_author_meta('ID'), 80);
    echo esc_html_e('by ','sportshub').the_author_posts_link();echo'</li>';}          
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}                 
    if(function_exists('sportshub_bac_PostViews')){
    if(get_theme_mod('disable_post_view') !=1){
    echo '<li class="post-view">';                
    echo sportshub_bac_PostViews(get_the_ID()).' ';
    esc_html_e('Views', 'sportshub');                
    echo '</li>';
    }}
    echo'</ul></div>'; 
}
function sportshub_post_meta_m($post_id) {
    echo'<div class="meta-info"> <ul>';
    if(get_theme_mod('disable_post_author') !=1){ echo '<li class="post-author" title="'.esc_attr(get_the_author_meta()).'">';
    echo esc_html_e('by ','sportshub').the_author_posts_link();echo'</li>';}       
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}
    if(function_exists('sportshub_get_PostViews')){
    if(get_theme_mod('disable_post_view') !=1){
    echo '<li class="post-view">';                
    echo sportshub_get_PostViews(get_the_ID()).' ';
    esc_html_e('Views', 'sportshub');                
    echo '</li>';
    }}
     echo'</ul></div>'; 
}
function sportshub_post_meta_sx($post_id) {
    echo'<div class="meta-info"> <ul>';   
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}
    if(get_theme_mod('disable_post_view') !=1){
    echo '<li class="post-view">';                
    echo sportshub_get_PostViews(get_the_ID()).' ';
    esc_html_e('Views', 'sportshub');                
    echo '</li>';
    echo '<li class="post-read">'.sportshub_reading_time_calculation('content').esc_html__('minutes read','sportshub').'</li>';
    }
    echo'</ul></div>'; 
}
function sportshub_post_meta_s($post_id) {
    echo'<div class="meta-info"> <ul>';   
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}
    if(get_theme_mod('disable_post_view') !=1){
    echo '<li class="post-view">';                
    echo sportshub_get_PostViews(get_the_ID()).' ';
    esc_html_e('Views', 'sportshub');                
    echo '</li>';
    }
    echo'</ul></div>'; 
}
function sportshub_post_meta_w($post_id) {
    echo'<div class="meta-info"> <ul>';   
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}
    echo'</ul></div>'; 
}
function sportshub_post_meta_next_post($post_id) {
    echo'<div class="meta-info"> <ul>';   
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}
    if(get_theme_mod('disable_post_view') !=1){
    echo '<li class="post-view">';                
    echo sportshub_get_PostViews(get_the_ID()).' ';
    esc_html_e('Views', 'sportshub');                
    echo '</li>';
    }
    echo'</ul></div>'; 
}
function sportshub_author_large($post_id){
    echo'<div class="meta-info"> <ul>';   
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}
    if(get_theme_mod('disable_post_view') !=1){
    echo '<li class="post-view">';                
    echo sportshub_get_PostViews(get_the_ID()).' ';
    esc_html_e('Views', 'sportshub');                
    echo '</li>';
    echo '<li class="post-read">'.sportshub_reading_time_calculation('content').esc_html__('minutes read','sportshub').'</li>';
    }
    echo'</ul></div>'; 
}

if ( ! function_exists( 'sportshub_get_qry' ) ) {
    function sportshub_get_qry() {
        if ( is_home() || is_category() ) {
            $sportshub_paged = get_query_var('paged');
            $sportshub_grid_size = $sportshub_current_cat = NULL;
            if ( $sportshub_paged == false ) {
                $sportshub_paged = 1;
            }
            if ( is_category() ) {
                $sportshub_current_cat = get_query_var('cat');
                $sportshub_grid_size = sportshub_get_category_offset();
            } elseif ( is_home() ) {
                $sportshub_grid_size = 0;
            }
            if ( $sportshub_grid_size != NULL ) {
                $sportshub_offset_loop = 'on';
            } else {
                $sportshub_offset_loop = NULL;
            }
            $sportshub_featured_qry = array( 'cat' => $sportshub_current_cat, 'offset' => $sportshub_grid_size, 'orderby' => 'date', 'order' => 'DESC',  'post_status' => 'publish', 'sportshub_offset_loop' => $sportshub_offset_loop, 'paged' => $sportshub_paged );
            $sportshub_qry = new WP_Query( $sportshub_featured_qry );
        } elseif ( is_page() ) {
            $sportshub_paged = get_query_var('page');
            $sportshub_arr = NULL;
            if ( $sportshub_paged == false ) {
                $sportshub_paged = 1;
            }
            $sportshub_page_id = get_the_ID();
            $sportshub_hp_category_filter = 'off';
            $sportshub_lb_offset = 'on';

            if ( $sportshub_hp_category_filter == 'off' ) {
                $sportshub_hp_category = '';
                foreach ( $sportshub_hp_category as $sportshub_cat ) {
                    $sportshub_arr .= $sportshub_cat . ',';
                }
                $sportshub_arr = rtrim( $sportshub_arr, ",");
            }
            if ( $sportshub_lb_offset != NULL ) {
                $sportshub_offset_loop = 'on';
            } else {
                $sportshub_offset_loop = NULL;
            }
            $sportshub_qry = new WP_Query( array('post_status' => 'publish', 'ignore_sticky_posts' => true, 'paged' => $sportshub_paged, 'cat' => $sportshub_arr, 'offset' => $sportshub_lb_offset, 'sportshub_offset_loop' => $sportshub_offset_loop  ) );
        } else {
            global $wp_query;
            $sportshub_qry = $wp_query;
        }
        return $sportshub_qry;
    }
}

//OFFSETTING QUERY VARIABLE['sportshub_offset_loop']
if ( ! function_exists( 'sportshub_offset_loop_pre_get_posts' ) ) {
    function sportshub_offset_loop_pre_get_posts( $query ){
        if ( isset( $query->query_vars['sportshub_offset_loop'] ) && ( $query->query_vars['sportshub_offset_loop'] == 'on' ) ) {
            if ( is_category() ) { $sportshub_grid_size = sportshub_get_category_offset(); }
            $sportshub_posts_per_page = get_option('posts_per_page');
            if ( $query->is_paged == true ) {
                $sportshub_page_offset = $sportshub_grid_size + ( ( $query->query_vars['paged'] - 1 ) * $sportshub_posts_per_page );
                $query->set( 'offset', $sportshub_page_offset );
            } else {
                $query->set( 'offset', $sportshub_grid_size );
            }
        }
        if ( ( is_category() || is_tag() || is_home() ) && $query->is_main_query() && ( ! is_admin() ) ) {
            $query->set( 'post_type', 'post' );
        }
        return $query;
    }
}
add_action( 'pre_get_posts', 'sportshub_offset_loop_pre_get_posts' );

//CATEGORY PAGINATION WITH OFFSET
if ( ! function_exists( 'sportshub_category_offset' ) ) {
    function sportshub_get_category_offset() {
        $sportshub_return = 0;
        $sportshub_cat_id = get_query_var('cat');
        $sportshub_offset = 'on';
        if ( $sportshub_offset == 'on' || $sportshub_offset == 'off' || $sportshub_offset == '' ) {
            $sportshub_grid_onoff = "";
         
            if ($sportshub_grid_onoff == 'style_1'){
                $sportshub_return = 0;
            }elseif($sportshub_grid_onoff == 'style_2'){
                $sportshub_return = 0;
            }
            elseif($sportshub_grid_onoff == 'style_3'){
                $sportshub_return = 0;
            }
            elseif($sportshub_grid_onoff == 'style_4'){
                $sportshub_return = 0;
            }
            elseif($sportshub_grid_onoff == 'style_5'){
                $sportshub_return = 0;
            }
            elseif($sportshub_grid_onoff == 'style_6'){
                $sportshub_return = 0;
            }
            elseif($sportshub_grid_onoff == 'style_7'){
                $sportshub_return = 0;
            }
            elseif($sportshub_grid_onoff == 'style_8'){
                $sportshub_return = 0;
            }
            elseif($sportshub_grid_onoff == 'style_9'){
                $sportshub_return = 0;
            }
            elseif($sportshub_grid_onoff == 'style_10'){
                $sportshub_return = 0;
            }
            else{
                $sportshub_return = NULL;
            }
        }
        return $sportshub_return;
    }
}

//PAGINATION WITH OFFSET
if ( ! function_exists( 'sportshub_pagination_offset' ) ) {
    function sportshub_pagination_offset($found_posts, $query) {
        $sportshub_grid_size = 0; 
        if ( is_category() ) { 
            $sportshub_grid_size = sportshub_get_category_offset(); 
        }
        if ( is_home() ) { 
            $sportshub_grid_size = 0; 
        }
        if ( is_page() ) { 
            $sportshub_grid_size = 0;
        }
        return ( $found_posts - $sportshub_grid_size );
    }
}
add_filter('found_posts', 'sportshub_pagination_offset', 1, 2 );

add_action('wp_default_scripts', function ($scripts) {
    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
});

function set_youtube_thumbnail_as_featured_image($post_id) {
    // Check if the post already has a featured image
    if (has_post_thumbnail($post_id)) {
        return;
    }

    // Get the video URL from the custom field
    $video_url = get_post_meta($post_id, 'video_url', true);
    if (!$video_url) {
        return;
    }

    // Extract the YouTube video ID
    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video_url, $matches);
    if (!$matches) {
        return;
    }

    $video_id = $matches[1];
    $thumbnail_url = "https://img.youtube.com/vi/$video_id/maxresdefault.jpg";

    // Fetch the image
    $response = wp_remote_get($thumbnail_url);
    if (is_wp_error($response)) {
        return;
    }

    // Get the image body
    $image_data = wp_remote_retrieve_body($response);
    if (empty($image_data)) {
        return;
    }

    // Save the image to the uploads directory
    $upload_dir = wp_upload_dir();
    $filename = basename($thumbnail_url);
    $file = wp_upload_bits($filename, null, $image_data);

    if (!empty($file['error'])) {
        return;
    }

    // Prepare an array of post data for the attachment
    $wp_filetype = wp_check_filetype($file['file'], null);
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );

    // Insert the attachment
    $attach_id = wp_insert_attachment($attachment, $file['file'], $post_id);

    // Include image.php
    require_once(ABSPATH . 'wp-admin/includes/image.php');

    // Generate the metadata for the attachment, and update the database record
    $attach_data = wp_generate_attachment_metadata($attach_id, $file['file']);
    wp_update_attachment_metadata($attach_id, $attach_data);

    // Set the image as the featured image for the post
    set_post_thumbnail($post_id, $attach_id);
}
add_action('save_post', 'set_youtube_thumbnail_as_featured_image');

function sportshub_enqueue_color_picker( $hook_suffix ) {
    // Load color picker on nav menu pages
    if ( 'nav-menus.php' != $hook_suffix ) {
        return;
    }
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'sportshub-color-picker', get_template_directory_uri() . '/js/sportshub-color-picker.js', array( 'wp-color-picker' ), false, true );
}
add_action( 'admin_enqueue_scripts', 'sportshub_enqueue_color_picker' );

if ( ! function_exists( 'sportshub_primary_menu_item_args' ) ) {
    function sportshub_primary_menu_item_args( $args, $item, $depth ) {
        if ( 'primary' === $args->theme_location && 0 === $depth ) {
            $args->link_before = '<span>';
            $args->link_after  = '</span>';
        } else {
            $args->link_before = '';
            $args->link_after  = '';
        }
        return $args;
    }
    add_filter( 'nav_menu_item_args', 'sportshub_primary_menu_item_args', 10, 3 );
}

if ( version_compare( get_bloginfo( 'version' ), '5.4', '>=' ) ) {
    function sportshub_menu_item_badge_fields( $id ) {
        wp_nonce_field( 'sportshub_menu_meta_nonce', 'sportshub_menu_meta_nonce_name' );
        $badge_color = get_post_meta( $id, '_sportshub_menu_badge_color', true );
        $badge_text  = get_post_meta( $id, '_sportshub_menu_badge_text', true );
        $menu_icon   = get_post_meta( $id, '_sportshub_menu_icon', true );
        ?>
        <p class="description description-wide">
            <label><?php esc_html_e( 'Badge Text', 'sportshub' ); ?><br>
                <input type="text" class="widefat" name="sportshub_menu_badge_text[<?php echo esc_attr( $id ); ?>]" value="<?php echo esc_attr( $badge_text ); ?>">
            </label>
        </p>
        <p class="description description-wide">
            <label for="<?php echo esc_attr( $id ); ?>"><?php esc_html_e( 'Badge Color', 'sportshub' ); ?></label>
            <input type="text" class="widefat color-picker" name="sportshub_menu_badge_color[<?php echo esc_attr( $id ); ?>]" value="<?php echo esc_attr( $badge_color ); ?>" data-default-color="#ff0000" />
        </p>
        <p class="description description-wide">
            <label><?php esc_html_e( 'Menu Icon (FontAwesome Class)', 'sportshub' ); ?><br>
                <input type="text" class="widefat" name="sportshub_menu_icon[<?php echo esc_attr( $id ); ?>]" value="<?php echo esc_attr( $menu_icon ); ?>" placeholder="e.g., fa fa-home">
            </label>
        </p>
        <?php
    }
    add_action( 'wp_nav_menu_item_custom_fields', 'sportshub_menu_item_badge_fields' );

    function sportshub_menu_item_badge_fields_update( $menu_id, $menu_item_db_id ) {
        if ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) {
            check_admin_referer( 'sportshub_menu_meta_nonce', 'sportshub_menu_meta_nonce_name' );
            if ( isset( $_POST['sportshub_menu_badge_color'][ $menu_item_db_id ] ) ) {
                update_post_meta( $menu_item_db_id, '_sportshub_menu_badge_color', sanitize_hex_color( $_POST['sportshub_menu_badge_color'][ $menu_item_db_id ] ) );
            } else {
                delete_post_meta( $menu_item_db_id, '_sportshub_menu_badge_color' );
            }

            if ( isset( $_POST['sportshub_menu_badge_text'][ $menu_item_db_id ] ) ) {
                update_post_meta( $menu_item_db_id, '_sportshub_menu_badge_text', sanitize_text_field( $_POST['sportshub_menu_badge_text'][ $menu_item_db_id ] ) );
            } else {
                delete_post_meta( $menu_item_db_id, '_sportshub_menu_badge_text' );
            }

            if ( isset( $_POST['sportshub_menu_icon'][ $menu_item_db_id ] ) ) {
                update_post_meta( $menu_item_db_id, '_sportshub_menu_icon', sanitize_text_field( $_POST['sportshub_menu_icon'][ $menu_item_db_id ] ) );
            } else {
                delete_post_meta( $menu_item_db_id, '_sportshub_menu_icon' );
            }
        }
    }
    add_action( 'wp_update_nav_menu_item', 'sportshub_menu_item_badge_fields_update', 10, 2 );

    function sportshub_badge_menu_item( $title, $item ) {
        $badge_color = get_post_meta( $item->ID, '_sportshub_menu_badge_color', true );
        $badge_text  = get_post_meta( $item->ID, '_sportshub_menu_badge_text', true );
        $menu_icon   = get_post_meta( $item->ID, '_sportshub_menu_icon', true );

        if ( ! empty( $menu_icon ) ) {
            $title = '<i class="' . esc_attr( $menu_icon ) . '"></i> ' . $title;
        }
        if ( ! empty( $badge_text ) ) {
            $badge_style = 'style="background-color: ' . esc_attr( $badge_color ) . ';"';
            $title      .= ' <span class="sportshub-badge" ' . $badge_style . '>' . esc_html( $badge_text ) . '</span>';
        }
        return $title;
    }
    add_filter( 'nav_menu_item_title', 'sportshub_badge_menu_item', 8, 2 );
}

// Breadcrumb
function sportshub_breadcrumb() {
    global $post, $wp_query;

    if (!is_front_page()) {
        $breadcrumb = '<nav aria-label="breadcrumb"><ul class="breadcrumb">';
        $home_link = home_url();
        $before = '<li class="breadcrumb-item active" aria-current="page">';
        $after = '</li>';

        // Home Link
        $breadcrumb .= '<li class="breadcrumb-item"><a href="' . $home_link . '">Home</a></li>';

        // WooCommerce Shop Page
        if (function_exists('is_shop') && is_shop()) {
            $breadcrumb .= $before . woocommerce_page_title(false) . $after;
        }

        // WooCommerce Product Category or Single Product
        elseif (function_exists('is_product_category') && (is_product_category() || is_product())) {
            $shop_page_url = get_permalink(wc_get_page_id('shop'));
            $breadcrumb .= '<li class="breadcrumb-item"><a href="' . $shop_page_url . '">Shop</a></li>';

            if (is_product_category()) {
                $breadcrumb .= $before . single_cat_title('', false) . $after;
            }

            if (is_product()) {
                $terms = wp_get_post_terms($post->ID, 'product_cat');
                if ($terms) {
                    $term = array_pop($terms);
                    $breadcrumb .= '<li class="breadcrumb-item"><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
                }
                $breadcrumb .= $before . get_the_title() . $after;
            }
        }

        // Handle Custom Post Types
        elseif (is_singular() && get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            if ($post_type) {
                $breadcrumb .= '<li class="breadcrumb-item"><a href="' . get_post_type_archive_link($post_type->name) . '">' . $post_type->labels->singular_name . '</a></li>';
            }
            $breadcrumb .= $before . get_the_title() . $after;
        }

        // Handle Category Pages
        elseif (is_category()) {
            $breadcrumb .= $before . single_cat_title('', false) . $after;
        }

        // Handle Tag Pages
        elseif (is_tag()) {
            $breadcrumb .= $before . single_tag_title('', false) . $after;
        }

        // Handle Author Pages
        elseif (is_author()) {
            $breadcrumb .= $before . __('Author: ', 'sportshub') . get_the_author() . $after;
        }

        // Handle Archive Pages
        elseif (is_day()) {
            $breadcrumb .= '<li class="breadcrumb-item"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
            $breadcrumb .= '<li class="breadcrumb-item"><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li>';
            $breadcrumb .= $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            $breadcrumb .= '<li class="breadcrumb-item"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
            $breadcrumb .= $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            $breadcrumb .= $before . get_the_time('Y') . $after;
        }

        // Handle Search Pages
        elseif (is_search()) {
            $breadcrumb .= $before . __('Search results for: ', 'sportshub') . get_search_query() . $after;
        }

        // Handle 404 Pages
        elseif (is_404()) {
            $breadcrumb .= $before . __('404 - Page Not Found', 'sportshub') . $after;
        }

        // Handle Single Posts
        elseif (is_single() && get_post_type() == 'post') {
            $categories = get_the_category();
            if ($categories) {
                $category = $categories[0];
                $breadcrumb .= '<li class="breadcrumb-item"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
            }
            $breadcrumb .= $before . get_the_title() . $after;
        }

        // Handle Pages
        elseif (is_page()) {
            if ($post->post_parent) {
                $parent_id = $post->post_parent;
                $breadcrumbs = [];
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = '<li class="breadcrumb-item"><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                foreach ($breadcrumbs as $crumb) {
                    $breadcrumb .= $crumb;
                }
            }
            $breadcrumb .= $before . get_the_title() . $after;
        }

        $breadcrumb .= '</ul></nav>';
        echo wp_kses_post($breadcrumb);
    }
}
function sportshub_enqueue_scripts() {
    wp_enqueue_script('jquery'); // Ensure jQuery is loaded
    wp_enqueue_script('ajax-load-more', get_template_directory_uri() . '/js/ajax-load-more.js', array('jquery'), null, true);
    wp_localize_script('ajax-load-more', 'ajaxloadmore', array(
        'ajaxurl' => admin_url('admin-ajax.php'), 
        'posts_per_page' => get_option('posts_per_page'), 
        'max_page' => $GLOBALS['wp_query']->max_num_pages 
    ));
}
add_action('wp_enqueue_scripts', 'sportshub_enqueue_scripts');
function sportshub_load_more_posts() {
    $paged = $_POST['page'] + 1; 
    $args = array(
        'post_type' => 'post',
        'paged' => $paged,
        'posts_per_page' => 10,
    );
    // Check for category filter
    if (!empty($_POST['category_id'])) {
        $args['cat'] = $_POST['category_id']; 
    }
    // Check for author filter
    if (!empty($_POST['author_id'])) {
        $args['author'] = $_POST['author_id']; 
    }
    // Check for tag filter
    if (!empty($_POST['tag_id'])) {
        $args['tag_id'] = $_POST['tag_id'];
    }
    // Check for archive filter (e.g., year, month)
    if (!empty($_POST['archive_id'])) {
        $args['year'] = date('Y', strtotime($_POST['archive_id']));
    }
    $sportshub_qry = new WP_Query($args);
    if ($sportshub_qry->have_posts()) :
        while ($sportshub_qry->have_posts()) : $sportshub_qry->the_post();
            get_template_part('inc/post-layout/content', 'list'); // Adjust as per your layout
        endwhile;
    endif;
    wp_reset_postdata();
    die(); // End the Ajax request
}
add_action('wp_ajax_nopriv_sportshub_load_more_posts', 'sportshub_load_more_posts');
add_action('wp_ajax_sportshub_load_more_posts', 'sportshub_load_more_posts');
// Customizer Fucntion
include get_template_directory() . '/inc/customizer/customizer.php';
// Plugin Activation
include get_template_directory() . '/inc/required/class-tgm-plugin-activation.php';
// Require Plugin
include get_template_directory() . '/inc/required/required-plugins.php';
// Assets
include get_template_directory() . '/inc/assets/assets.php';
// Import Demo Data
include get_template_directory() . '/inc/assets/import-demo.php';
// Post view Funtion
include get_template_directory() . '/inc/assets/view-post-counter.php';
// Load Google Fonts
include get_template_directory() . '/inc/assets/load-fonts.php';
// Metabox 
include get_template_directory() . '/inc/metabox/category-meta.php';
?>