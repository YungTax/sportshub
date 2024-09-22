<?php
/*
Plugin Name: sportshub-Function
Description: Theme function for sportshub personal blog & megazine WordPress theme 
Plugin URI: https://themelazer.com
Author: Themelazer
Author URI: https://themeforest.net/user/themelazer
Version: 1.0
License: GPL2
Text Domain: sportshub
*/
if ( ! defined( 'ABSPATH' ) ) exit;
	include 'block/elementor.php';	
	include 'cus-metabox.php';	
	include 'post-like.php';	
	// include 'view-post-counter.php';	
	require_once plugin_dir_path( __FILE__ ).'/counter_fan.php';	
	require_once plugin_dir_path( __FILE__ ).'/widget/popular.php';	
	// require_once plugin_dir_path( __FILE__ ).'/widget/recent-large.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/about-us.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/recent-small.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/adswidget.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/facebook-widget.php';	
	require_once plugin_dir_path( __FILE__ ).'/widget/twitter-timeline.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/category-widget.php';
	require_once plugin_dir_path( __FILE__ ).'/widget/authors.php';
	// Extra User Contact Method
	$extra_fields =  array( 
		array( 'facebook', __( 'Facebook', 'sportshub' ), true ),
		array( 'twitter', __( 'Twitter ', 'sportshub' ), true ),
		array( 'googleplus', __( 'Google+', 'sportshub' ), true ),
		array( 'linkedin', __( 'Linked In', 'sportshub' ), false ),
		array( 'pinterest', __( 'Pinterest ', 'sportshub' ), false ),
		array( 'wordpress', __( 'WordPress ', 'sportshub' ), false ),
		array( 'phone', __( 'Phone Number', 'sportshub' ), true ),
		array( 'instagram',__( 'Instagram','sportshub'),true),
		array( 'tumblr',__( 'Tumblr','sportshub'),true ),
		array( 'youtube',__('Youtube','sportshub'),true ),
		array( 'dribbble',__('Dribbble','sportshub'),true ),
		array( 'email',__('E-mail','sportshub'),true ),
	);

	// Use the user_contactmethods to add new fields
	add_filter( 'user_contactmethods', 'sportshub_add_user_contactmethods' );

	function  sportshub_add_user_contactmethods( $user_contactmethods ) {

		// Get fields
		global $extra_fields;
		
		// Display each fields
		foreach( $extra_fields as $field ) {
			if ( !isset( $contactmethods[ $field[0] ] ) )
				$user_contactmethods[ $field[0] ] = $field[1];
		}

		// Returns the contact methods
		return $user_contactmethods;
	}
	// Add our fields to the registration process
	add_action( 'register_form', 'sportshub_register_form_display_extra_fields' );
	add_action( 'user_register', 'sportshub_user_register_save_extra_fields', 100 );

	function sportshub_register_form_display_extra_fields() {
		
		// Get fields
		global $extra_fields;
		foreach( $extra_fields as $field ) {
			if ( $field[2] == true ) { 
			$field_value = isset( $_POST[ $field[0] ] ) ? $_POST[ $field[0] ] : '';
			echo '<p>
				<label for="'. esc_attr( $field[0] ) .'">'. esc_html( $field[1] ) .'<br />
				<input type="text" name="'. esc_attr( $field[0] ) .'" id="'. esc_attr( $field[0] ) .'" class="input" value="'. esc_attr( $field_value ) .'" size="20" /></label>
				</label>
			</p>';
			} 
		}
	}

	function sportshub_user_register_save_extra_fields( $user_id, $password = '', $meta = array() )  {

		global $extra_fields;
		
		$userdata       = array();
		$userdata['ID'] = $user_id;
		foreach( $extra_fields as $field ) {
			if( $field[2] == true ) { 
				$userdata[ $field[0] ] = $_POST[ $field[0] ];
			} 
		} 
		$new_user_id = wp_update_user( $userdata );
	}
	function metaoptions_enqueue() {
	    wp_enqueue_media();
	    wp_enqueue_script( 'meta-colorpicker-js', plugin_dir_url( __FILE__ ) . 'js/meta-color.js' );
	    wp_enqueue_style( 'meta-options', plugin_dir_url( __FILE__ ) .'css/meta.css', false, '1.0' );    
	}
	add_action('admin_enqueue_scripts', 'metaoptions_enqueue' );
	
	function sportshub_single_post_share_link( $post_id ) {?>
		<div class="themelazer_copy_link_form_wrapper">
			<div class="themelazer_form_wrapper">
				<input type="text" name="url" value="<?php echo urldecode( get_the_permalink() ); ?>" class="themelazer_share_link_text" readonly>
				<button type="submit" class="themelazer_share_link_button">
					<!-- <i class="fas fa-copy"></i> -->
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 4 4 L 4 24 L 11 24 L 11 22 L 6 22 L 6 6 L 18 6 L 18 7 L 20 7 L 20 4 Z M 12 8 L 12 28 L 28 28 L 28 8 Z M 14 10 L 26 10 L 26 26 L 14 26 Z"/></svg>
					<span class="themelazer_popup_copy_link"><?php esc_html_e('Link Copied!', 'sportshub') ?></span>
				</button>
			</div>
		</div>
		<div class="blog-social-list">
			<ul class="single_post_share_icon_post">
				<span><?php esc_html_e('Share: ', 'sportshub') ?></span>
				<a class="facebook-bg" href="http://www.facebook.com/share.php?u=<?php echo esc_url(get_permalink());?>"title="facebook" aria-label="Facebook" target="_blank" original-title="facebook"><i class="fa-brands fa-facebook-f"></i></i>
				<!-- <?php esc_html_e('share', 'sportshub') ?> -->
				</a>
				<a class="telegram-bg" rel="nofollow noopener" href="https://telegram.me/share/url?url=<?php echo esc_url(get_permalink());?>"target="_blank"><i class="fa-brands fa-telegram"></i>
					<!-- <?php esc_html_e('telegram', 'sportshub') ?> -->
				</a>
				<!-- <a class="instagram-bg" href="https://www.instagram.com/?url=<?php echo esc_url(get_permalink()); ?>" target="_blank">
					<i class="fab fa-instagram"></i>
				</a> -->
				<a class="linkedin-bg" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url(get_permalink());?>&title=<?php echo esc_url(get_permalink());?>" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
				<a class="pinterest-bg" rel="nofollow noopener"  href="https://pinterest.com/pin/create/link/?url=<?php echo esc_url(get_permalink());?>" target="_blank"><i class="fab fa-pinterest"></i></a>
				
				<a class="flipboard-bg" href="<?php echo esc_url(sprintf('https://share.flipboard.com/bookmarklet/popout?v=%s&url=%s&t=%s',get_the_title(), get_permalink(), get_the_excerpt())); ?>"class="flipboard-button" target="_blank" rel="nofollow"><i class="fab fa-flipboard"></i></a>
				<a class="whatsapp-bg" rel="nofollow" href="https://api.whatsapp.com/send?text=<?php echo esc_url(get_permalink());?>" data-action="share/whatsapp/share" target="_blank"><i class="fa-brands fa-square-whatsapp"></i>	
				</a>
				<a class="line-bg" href="https://social-plugins.line.me/lineit/share?url=' <?php echo esc_url(get_permalink());?>'" target="_blank"><i class="fa-brands fa-line"></i>
				</a>
				<a class="mail-bg" rel="nofollow" href="mailto:?subject= <?php echo esc_url( get_permalink()); ?>" target="_blank"><i class="fa fa-envelope"></i></a>
				<a class="x-bg" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>&url=<?php echo esc_url(get_permalink()); ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
				<a class="reddit-bg" href="https://reddit.com/submit?url=<?php echo esc_url(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank"><i class="fa-brands fa-reddit"></i></a>
			</ul>
		</div>
	    <?php 
	}

	function sportshub_single_share_link( $post_id ) {?>
		<div class="blog-social-list">
			<ul class="single_post_share_icon_post">
				<span>Share:</span>
			    <a class="facebook-bg" href="http://www.facebook.com/share.php?u=<?php echo esc_url(get_permalink());?>"title="facebook" aria-label="Tweet" target="_blank" original-title="facebook"><i class="fab fa-facebook-f"></i></a>
			    <a class="twitter-bg" href="http://twitter.com/home?status=<?php echo esc_url(get_permalink());?>%20-%20<?php echo get_the_title();?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
			    <a class="linkedin-bg" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url(get_permalink());?>&title=<?php echo esc_url(get_permalink());?>" target="_blank"><i class="fab fa-linkedin-in"></i></a> 
			</ul>
		</div>
	<?php }?>

