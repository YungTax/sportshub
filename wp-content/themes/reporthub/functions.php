<?php

if ( ! isset( $content_width ) ){ $content_width = 1190; }
    add_theme_support( 'post-formats', array('gallery', 'quote', 'video', 'audio') );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "title-tag" );
    add_theme_support( 'post-thumbnails');
    add_theme_support( 'align-wide' );
// Post thumbnail support

if (!function_exists('reporthub_image_size')) {
    function reporthub_image_size() {
        $image_sizes = array(
            'reporthub_justify_feature' => array(1000, 0, false),
            'reporthub_small_feature' => array(150, 150, true),
            'reporthub_small_recent_feature' => array(150, 100, true),
            'reporthub_feature_link_list' => array(230, 115, true),
            'reporthub_feature_gird' => array(344, 344, true),
            'reporthub_large_feature' => array(650, 650, true),
            'reporthub_large_list_feature' => array(300, 300, true),
            'reporthub_large_slider_image' => array(1920, 982, true),
            'reporthub_slider_grid_large' => array(1100, 700, true),
            'reporthub_slider_grid_small' => array(650, 465, true),
            'reporthub_list_post_large' => array(650, 850, true),
            'reporthub_list_large' => array(450, 450, true),
            'reporthub_carousel' => array(600, 750, true),
            'reporthub_marsonry' => array(1000, 1500, true),
            'reporthub_grid_post' => array(1400, 650, true),
        );

        foreach ($image_sizes as $name => $args) {
            add_image_size($name, $args[0], $args[1], $args[2]);
        }
    }

    add_action('init', 'reporthub_image_size');
}

//body class
add_filter( 'body_class','reporthub_body_classes' );
function reporthub_body_classes( $classes ) {
    $classes[] = 'mobile_nav_class';
    if (is_active_sidebar('general-sidebar')) {$classes[] = 'themelazer-has-sidebar';}
    return $classes;    
}
// woocomerce theme support   
function reporthub_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'reporthub_add_woocommerce_support' );
  
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 4; // 4products per row
    }
}
add_filter('loop_shop_columns', 'loop_columns', 999);

//Remove Mobile Menu id
add_filter('nav_menu_item_id', 'reporthub_my_css_attributes_filter', 100, 1);
function reporthub_my_css_attributes_filter($var) {
    return is_array($var) ? array() : '';
}

//custom categories_link
add_filter('wp_list_categories', 'reporthub_categories_count_span');
add_filter('get_archives_link', 'reporthub_archives_count');
function reporthub_categories_count_span($links) {
    $links = str_replace('</a> (', '</a> <span>', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

// Replace default categories widgets
function reporthub_archives_count($links){
    $links = str_replace('</a>&nbsp;(', '</a> <span>', $links);
    $links = str_replace(')</li>', '</span></li>', $links);
    return $links;
}
// Sidebar register
function reporthub_sidebar_register() {
    $sidebar_args = array(
        'before_widget' => '<div id="%1$s" class="single-sidebar  %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</h3></div>',
    );

    $sidebars = array(
        array(
            'name' => esc_html__('General Sidebar', 'reporthub'),
            'id' => 'general-sidebar',
        ),
        array(
            'name' => esc_html__('Instagram', 'reporthub'),
            'id' => 'instagram-sidebar',
        ),
        array(
            'name' => esc_html__('First Footer Sidebar', 'reporthub'),
            'id' => 'footer1-sidebar',
        ),
        array(
            'name' => esc_html__('Second Footer Sidebar', 'reporthub'),
            'id' => 'footer2-sidebar',
        ),
        array(
            'name' => esc_html__('Third Footer Sidebar', 'reporthub'),
            'id' => 'footer3-sidebar',
        ),
        array(
            'name' => esc_html__('Fourth Footer Sidebar', 'reporthub'),
            'id' => 'footer4-sidebar',
        ),
        array(
            'name' => esc_html__('Five Footer Sidebar', 'reporthub'),
            'id' => 'footer5-sidebar',
        ),
    );

    foreach ($sidebars as $sidebar) {
        register_sidebar(array_merge($sidebar, $sidebar_args));
    }
}
add_action('widgets_init', 'reporthub_sidebar_register');


//gallery hook
if (!function_exists('reporthub_themelazermedia_gallery_upload_get_images')) {
    function reporthub_themelazermedia_gallery_upload_get_images(){
        $ids=$_POST['ids'];
        $ids=explode(",",$ids);
        foreach($ids as $id):
            $image = wp_get_attachment_image_src($id,'thumbnail', true);
            echo '<li class="themelazermedia-gallery-image-holder"><img src="'.esc_url($image[0]).'"/></li>';
        endforeach;
        exit;
    }
    add_action( 'wp_ajax_reporthub_themelazermedia_gallery_upload_get_images', 'reporthub_themelazermedia_gallery_upload_get_images');
}

//register menu
function reporthub_register_menu() {
    register_nav_menus(
            array(
                'Main_Menu' => esc_html__('Main menu', 'reporthub'),
                'Footer_Menu' => esc_html__('Footer menu', 'reporthub'),
                'Side_Menu' => esc_html__('Side menu', 'reporthub')
            )
    );
}
add_action('init', 'reporthub_register_menu');

//language part
function reporthub_setup_language(){
    load_theme_textdomain('reporthub', get_template_directory() . '/langs');
}
add_action('after_setup_theme', 'reporthub_setup_language');

// Author Social icons
function reporthub_author_contact_icons() { ?>
    <?php if(get_the_author_meta('facebook')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('facebook')); ?>"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('twitter')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('twitter')); ?>"><i class="fab fa-twitter"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('linkedin')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('linkedin')); ?>"><i class="fab fa-linkedin-in"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('instagram')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('instagram')); ?>"><i class="fab fa-instagram"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('pinterest')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('pinterest')); ?>"><i class="fab fa-pinterest-p"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('tumblr')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('tumblr')); ?>"><i class="fab fa-tumblr"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('youtube')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('youtube')); ?>"><i class="fab fa-youtube"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('dribbble')) : ?><a target="_blank" href="<?php echo esc_html(the_author_meta('dribbble')); ?>"><i class="fab fa-dribbble"></i></a><?php endif; ?>
    <?php if(get_the_author_meta('reporthub-email')) : ?><a target="_blank" href="mailto:<?php echo esc_html(the_author_meta('reporthub-email')); ?>">M</a><?php endif; ?>

<?php }

//Comment template
if ( ! function_exists( 'reporthub_comment' ) ){
function reporthub_comment( $comment, $args, $depth ) {
    global $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :      
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <p>
            <?php esc_html_e( 'Pingback:', 'reporthub'); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'reporthub'), '<span class="edit-link">', '</span>' ); ?>
                
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
                        ( $comment->user_id === $post->post_author ) ? '<span> ' . esc_html__( 'Post author', 'reporthub') . '</span>' : ''
                    );  
                ?>
                        <?php if ( '0' == $comment->comment_approved ) : ?>
                            <p class="comment-awaiting-moderation">
                                <?php esc_html_e( 'Your comment is awaiting moderation.', 'reporthub'); ?>
                            </p>
                        <?php endif; ?>
                        <?php comment_text();
                            printf( '<a class="comment-author-date" itemprop="datePublished" href="%1$s"><time datetime="%2$s"><i class="far fa-clock"></i>%3$s</time></a>',
                                    esc_url( get_comment_link( $comment->comment_ID ) ),
                                    get_comment_time( 'c' ),
                                    sprintf( esc_html__( '%1$s at %2$s', 'reporthub'), get_comment_date(), get_comment_time() )
                                );
                        ?>
                        <div class="com_wp_nav">
                            <?php edit_comment_link( esc_html__( 'Edit', 'reporthub'), '', '' ); ?>
                            <?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'reporthub'), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
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
function reporthub_pagination_num($args = array()){    
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
if ( ! function_exists( 'reporthub_pagination' ) ) {
    function reporthub_pagination( $reporthub_qry = NULL ) {
            $reporthub_no_more_articles = esc_html__( 'No more articles', 'reporthub' );
            $reporthub_load_more_text = esc_html__( 'Load More', 'reporthub' );
            $reporthub_pagination_type = 'numbered';
            if ( is_category() ) {
                    $reporthub_cat_id = get_query_var('cat');
                    $reporthub_pagination_type = get_term_meta( $reporthub_cat_id, 'reporthub_cat_infinite', true);   
            }
            if ( is_home() ) {
            }

            if ( is_tag() ) {
            }
            if ( $reporthub_qry == NULL ) {
                    global $wp_query;
                    $reporthub_total = $GLOBALS['wp_query']->max_num_pages;
                    $reporthub_paged = get_query_var('paged');
            } else {     
                if ( is_page() ) {
                    $reporthub_total = $reporthub_qry->max_num_pages;
                    $reporthub_pagination_type = 'n';
                    $reporthub_paged = get_query_var('page');
                } else {
                    global $wp_query;
                    $reporthub_paged = get_query_var('paged');
                    $reporthub_total = $GLOBALS['wp_query']->max_num_pages;
                }
            }
            if ( $reporthub_pagination_type == 'infinite-load' ) {
                if ( get_next_posts_link() != NULL ) {
                    echo '<div class="pagination-more"><div class="more-previous">' . get_next_posts_link( $reporthub_load_more_text ) . '</div></div>';
                } else {
                    echo '<div class="pagination-more"><div class="more-previous">' . $reporthub_no_more_articles . '</div></div>';
                }
            } elseif ( $reporthub_pagination_type == 'infinite-scroll' ) {
                if (  get_next_posts_link() != NULL ) {
                    echo '<div class="themelazer-infinite-load">' . get_next_posts_link( $reporthub_load_more_text ) . '</div>';
                } else {
                    echo '<div class="themelazer-infinite-load"><span>' . $reporthub_no_more_articles . '</span></div>';
                }
            } else {
                $reporthub_pagination = paginate_links( array(
                    'base'     => str_replace( 99999, '%#%', esc_url( get_pagenum_link(99999) ) ),
                    'format'   => '',
                    'total'    => $reporthub_total,
                    'current'  => max( 1, $reporthub_paged ),
                    'mid_size' => 2,
                    'prev_text' => '<i class="ti-angle-left"></i>',
                    'next_text' => '<i class="ti-angle-right"></i>',
                    'type' => 'list',
                ) );
                echo '<div class="themelazer-pagination">
                      <div class="themelazer-pagination-wrapper">' . $reporthub_pagination . '</div></div>';
            }
    }
}

// Reading Time Calculation
function reporthub_reading_time_calculation( $content) {
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
function reporthub_singlepost_meta($post_id) {                
    echo'<div class="meta-info"> <ul>';
    if(get_theme_mod('disable_post_author') !=1){ echo '<li class="post-author" title="'.esc_attr(get_the_author_meta()).'">';
    echo get_avatar(get_the_author_meta('ID'), 80);
    echo esc_html_e('by ','reporthub').the_author_posts_link();echo'</li>';}          
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}                 
    if(function_exists('reporthub_bac_PostViews')){
    if(get_theme_mod('disable_post_view') !=1){
    echo '<li class="post-view">';                
    echo reporthub_bac_PostViews(get_the_ID()).' ';
    esc_html_e('Views', 'reporthub');                
    echo '</li>';
    }}
    if(get_theme_mod('disable_post_comment_meta') !=1){
        echo '<li class="post-comment">';
        echo comments_popup_link(esc_html__('0 Comment', 'reporthub' ), esc_html__('1 Comment', 'reporthub'), esc_html__('% Comments', 'reporthub'));
        echo '</li>';
    }
    echo '<li class="post-read">'.reporthub_reading_time_calculation('content').esc_html__('minutes read','reporthub').'</li>';
    echo'</ul></div>'; 
}
function reporthub_singlepost_large($post_id) {                
    echo'<div class="meta-info"> <ul>';
    if(get_theme_mod('disable_post_author') !=1){ echo '<li class="post-author" title="'.esc_attr(get_the_author_meta()).'">';
    echo get_avatar(get_the_author_meta('ID'), 80);
    echo esc_html_e('by ','reporthub').the_author_posts_link();echo'</li>';}          
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}                 
    if(function_exists('reporthub_bac_PostViews')){
    if(get_theme_mod('disable_post_view') !=1){
    echo '<li class="post-view">';                
    echo reporthub_bac_PostViews(get_the_ID()).' ';
    esc_html_e('Views', 'reporthub');                
    echo '</li>';
    }}
    echo'</ul></div>'; 
}
function reporthub_post_meta_m($post_id) {
    echo'<div class="meta-info"> <ul>';
    if(get_theme_mod('disable_post_author') !=1){ echo '<li class="post-author" title="'.esc_attr(get_the_author_meta()).'">';
    echo esc_html_e('by ','reporthub').the_author_posts_link();echo'</li>';}       
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}
    if(function_exists('reporthub_get_PostViews')){
    if(get_theme_mod('disable_post_view') !=1){
    echo '<li class="post-view">';                
    echo reporthub_get_PostViews(get_the_ID()).' ';
    esc_html_e('Views', 'reporthub');                
    echo '</li>';
    }}
     echo'</ul></div>'; 
}
function reporthub_post_meta_sx($post_id) {
    echo'<div class="meta-info"> <ul>';   
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}
    if(get_theme_mod('disable_post_view') !=1){
    echo '<li class="post-view">';                
    echo reporthub_get_PostViews(get_the_ID()).' ';
    esc_html_e('Views', 'reporthub');                
    echo '</li>';
    echo '<li class="post-read">'.reporthub_reading_time_calculation('content').esc_html__('minutes read','reporthub').'</li>';
    }
    echo'</ul></div>'; 
}
function reporthub_post_meta_s($post_id) {
    echo'<div class="meta-info"> <ul>';   
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}
    if(get_theme_mod('disable_post_view') !=1){
    echo '<li class="post-view">';                
    echo reporthub_get_PostViews(get_the_ID()).' ';
    esc_html_e('Views', 'reporthub');                
    echo '</li>';
    }
    echo'</ul></div>'; 
}
function reporthub_post_meta_next_post($post_id) {
    echo'<div class="meta-info"> <ul>';   
    if(get_theme_mod('disable_post_date') !=1){ echo '<li class="post-date">'.get_the_date().'</li>';}
    echo'</ul></div>'; 
}

if ( ! function_exists( 'reporthub_get_qry' ) ) {
    function reporthub_get_qry() {
        if ( is_home() || is_category() ) {
            $reporthub_paged = get_query_var('paged');
            $reporthub_grid_size = $reporthub_current_cat = NULL;
            if ( $reporthub_paged == false ) {
                $reporthub_paged = 1;
            }
            if ( is_category() ) {
                $reporthub_current_cat = get_query_var('cat');
                $reporthub_grid_size = reporthub_get_category_offset();
            } elseif ( is_home() ) {
                $reporthub_grid_size = 0;
            }
            if ( $reporthub_grid_size != NULL ) {
                $reporthub_offset_loop = 'on';
            } else {
                $reporthub_offset_loop = NULL;
            }
            $reporthub_featured_qry = array( 'cat' => $reporthub_current_cat, 'offset' => $reporthub_grid_size, 'orderby' => 'date', 'order' => 'DESC',  'post_status' => 'publish', 'reporthub_offset_loop' => $reporthub_offset_loop, 'paged' => $reporthub_paged );
            $reporthub_qry = new WP_Query( $reporthub_featured_qry );
        } elseif ( is_page() ) {
            $reporthub_paged = get_query_var('page');
            $reporthub_arr = NULL;
            if ( $reporthub_paged == false ) {
                $reporthub_paged = 1;
            }
            $reporthub_page_id = get_the_ID();
            $reporthub_hp_category_filter = 'off';
            $reporthub_lb_offset = 'on';

            if ( $reporthub_hp_category_filter == 'off' ) {
                $reporthub_hp_category = '';
                foreach ( $reporthub_hp_category as $reporthub_cat ) {
                    $reporthub_arr .= $reporthub_cat . ',';
                }
                $reporthub_arr = rtrim( $reporthub_arr, ",");
            }
            if ( $reporthub_lb_offset != NULL ) {
                $reporthub_offset_loop = 'on';
            } else {
                $reporthub_offset_loop = NULL;
            }
            $reporthub_qry = new WP_Query( array('post_status' => 'publish', 'ignore_sticky_posts' => true, 'paged' => $reporthub_paged, 'cat' => $reporthub_arr, 'offset' => $reporthub_lb_offset, 'reporthub_offset_loop' => $reporthub_offset_loop  ) );
        } else {
            global $wp_query;
            $reporthub_qry = $wp_query;
        }
        return $reporthub_qry;
    }
}

//OFFSETTING QUERY VARIABLE['reporthub_offset_loop']
if ( ! function_exists( 'reporthub_offset_loop_pre_get_posts' ) ) {
    function reporthub_offset_loop_pre_get_posts( $query ){
        if ( isset( $query->query_vars['reporthub_offset_loop'] ) && ( $query->query_vars['reporthub_offset_loop'] == 'on' ) ) {
            if ( is_category() ) { $reporthub_grid_size = reporthub_get_category_offset(); }
            $reporthub_posts_per_page = get_option('posts_per_page');
            if ( $query->is_paged == true ) {
                $reporthub_page_offset = $reporthub_grid_size + ( ( $query->query_vars['paged'] - 1 ) * $reporthub_posts_per_page );
                $query->set( 'offset', $reporthub_page_offset );
            } else {
                $query->set( 'offset', $reporthub_grid_size );
            }
        }
        if ( ( is_category() || is_tag() || is_home() ) && $query->is_main_query() && ( ! is_admin() ) ) {
            $query->set( 'post_type', 'post' );
        }
        return $query;
    }
}
add_action( 'pre_get_posts', 'reporthub_offset_loop_pre_get_posts' );

//CATEGORY PAGINATION WITH OFFSET
if ( ! function_exists( 'reporthub_category_offset' ) ) {
    function reporthub_get_category_offset() {
        $reporthub_return = 0;
        $reporthub_cat_id = get_query_var('cat');
        $reporthub_offset = 'on';
        if ( $reporthub_offset == 'on' || $reporthub_offset == 'off' || $reporthub_offset == '' ) {
            $reporthub_grid_onoff = "";
         
            if ($reporthub_grid_onoff == 'style_1'){
                $reporthub_return = 0;
            }elseif($reporthub_grid_onoff == 'style_2'){
                $reporthub_return = 0;
            }
            elseif($reporthub_grid_onoff == 'style_3'){
                $reporthub_return = 0;
            }
            elseif($reporthub_grid_onoff == 'style_4'){
                $reporthub_return = 0;
            }
            elseif($reporthub_grid_onoff == 'style_5'){
                $reporthub_return = 0;
            }
            elseif($reporthub_grid_onoff == 'style_6'){
                $reporthub_return = 0;
            }
            elseif($reporthub_grid_onoff == 'style_7'){
                $reporthub_return = 0;
            }
            elseif($reporthub_grid_onoff == 'style_8'){
                $reporthub_return = 0;
            }
            elseif($reporthub_grid_onoff == 'style_9'){
                $reporthub_return = 0;
            }
            elseif($reporthub_grid_onoff == 'style_10'){
                $reporthub_return = 0;
            }
            else{
                $reporthub_return = NULL;
            }
        }
        return $reporthub_return;
    }
}

//PAGINATION WITH OFFSET
if ( ! function_exists( 'reporthub_pagination_offset' ) ) {
    function reporthub_pagination_offset($found_posts, $query) {
        $reporthub_grid_size = 0; 
        if ( is_category() ) { 
            $reporthub_grid_size = reporthub_get_category_offset(); 
        }
        if ( is_home() ) { 
            $reporthub_grid_size = 0; 
        }
        if ( is_page() ) { 
            $reporthub_grid_size = 0;
        }
        return ( $found_posts - $reporthub_grid_size );
    }
}
add_filter('found_posts', 'reporthub_pagination_offset', 1, 2 );

add_action('wp_default_scripts', function ($scripts) {
    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
});


// Video Thumbnail

// function embed_youtube_autoplay($atts) {
//     $atts = shortcode_atts(
//         array(
//             'id' => '',
//             'width' => '560',
//             'height' => '315',
//         ),
//         $atts,
//         'youtube'
//     );
//     return '<iframe width="' . esc_attr($atts['width']) . '" height="' . esc_attr($atts['height']) . '" src="https://www.youtube.com/embed/' . esc_attr($atts['id']) . '?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
// }
// add_shortcode('youtube_autoplay', 'embed_youtube_autoplay');

// function set_youtube_thumbnail($post_id) {
//     if (has_post_thumbnail($post_id)) return;

//     $video_url = get_post_meta($post_id, 'video_url', true);
//     if (!$video_url) return;

//     preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video_url, $matches);
//     if (!$matches) return;

//     $video_id = $matches[1];
//     $thumbnail_url = "https://img.youtube.com/vi/$video_id/maxresdefault.jpg";

//     $upload_dir = wp_upload_dir();
//     $image_data = file_get_contents($thumbnail_url);
//     $filename = basename($thumbnail_url);

//     if (wp_mkdir_p($upload_dir['path'])) {
//         $file = $upload_dir['path'] . '/' . $filename;
//     } else {
//         $file = $upload_dir['basedir'] . '/' . $filename;
//     }

//     file_put_contents($file, $image_data);

//     $wp_filetype = wp_check_filetype($filename, null);
//     $attachment = array(
//         'post_mime_type' => $wp_filetype['type'],
//         'post_title' => sanitize_file_name($filename),
//         'post_content' => '',
//         'post_status' => 'inherit'
//     );

//     $attach_id = wp_insert_attachment($attachment, $file, $post_id);
//     require_once(ABSPATH . 'wp-admin/includes/image.php');
//     $attach_data = wp_generate_attachment_metadata($attach_id, $file);
//     wp_update_attachment_metadata($attach_id, $attach_data);
//     set_post_thumbnail($post_id, $attach_id);
// }
// add_action('save_post', 'set_youtube_thumbnail');

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
    $upload_dir = wp_upload_dir();
    $image_data = file_get_contents($thumbnail_url);
    $filename = basename($thumbnail_url);

    if (wp_mkdir_p($upload_dir['path'])) {
        $file = $upload_dir['path'] . '/' . $filename;
    } else {
        $file = $upload_dir['basedir'] . '/' . $filename;
    }

    // Save the image file
    file_put_contents($file, $image_data);

    // Check the type of file and prepare an array of post data for the attachment
    $wp_filetype = wp_check_filetype($filename, null);
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_content' => '',
        'post_status' => 'inherit'
    );

    // Insert the attachment
    $attach_id = wp_insert_attachment($attachment, $file, $post_id);

    // Include image.php
    require_once(ABSPATH . 'wp-admin/includes/image.php');

    // Generate the metadata for the attachment, and update the database record
    $attach_data = wp_generate_attachment_metadata($attach_id, $file);
    wp_update_attachment_metadata($attach_id, $attach_data);

    // Set the image as the featured image for the post
    set_post_thumbnail($post_id, $attach_id);
}
add_action('save_post', 'set_youtube_thumbnail_as_featured_image');


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
// Extra User Contact Method
include get_template_directory() . '/inc/assets/user-contactmethod.php';
// Metabox 
include get_template_directory() . '/inc/metabox/category-meta.php';
?>