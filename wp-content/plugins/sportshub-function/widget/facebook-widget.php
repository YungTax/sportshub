<?php

/**
 * @author  Themelazer
 * @since   1.0
 * @version 1.0
 * @package sportshub-function
 */
 
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'widgets_init', 'sportshub_load_facebook_page' );
function sportshub_load_facebook_page() {
	register_widget( 'sportshub_facebook_page_widget' );	
}
class sportshub_facebook_page_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*  Widget Setup
/*-----------------------------------------------------------------------------------*/
	function __construct()
	{
		$widget_ops = array( 'description' => esc_html__('A widget that displays a Facebook Like Box', 'sportshub') );
		parent::__construct( 'sportshub_facebook_page_widget', esc_html__('Themelazer: Facebook Like Box', 'sportshub'), $widget_ops);
	}
/*-----------------------------------------------------------------------------------*/
/*  Display Widget
/*-----------------------------------------------------------------------------------*/
	function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		$fb_page_url = $instance['fb_page_url'];
		$show_friend_like = $instance['show_friend_like'];
		$stream = $instance['stream'];
		$header = $instance['header'];
		$width = $instance['width'];
		$height = $instance['height'];
		echo '<span class="themelazer_none_space"></span>'.$before_widget;
        echo '<div class="widget_themelazer_wrapper">';
        if ( $title ){ 
        echo '<span class="themelazer_none_space"></span>'.$before_title . esc_attr($title) . $after_title; 
        }        
        ?>
			<iframe src="http://www.facebook.com/plugins/likebox.php?href=<?php echo esc_url($fb_page_url); ?>&amp;width=<?php echo esc_html($width); ?>&amp;colorscheme=light&amp;show_friends=<?php if($show_friend_like) { echo 'true'; } else { echo 'false'; } ?>&amp;border_color&amp;stream=<?php if($stream) { echo 'true'; } else { echo 'false'; } ?>&amp;header=<?php if($header) { echo 'true'; } else { echo 'false'; } ?>&amp;height=<?php echo esc_html($height); ?>&amp;show_border=false" style="border-radius: 10px; overflow:hidden; width:<?php echo esc_html($width); ?>px; height:<?php echo esc_html($height); ?>px; background:#fff;" allowTransparency="true"scrolling="no" frameborder="0" allow="encrypted-media" ></iframe></div>

		<?php
		echo $after_widget;
	}
/*-----------------------------------------------------------------------------------*/
/*  Update Widget
/*-----------------------------------------------------------------------------------*/
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['fb_page_url'] = strip_tags( $new_instance['fb_page_url'] );
		$instance['show_friend_like'] = strip_tags( $new_instance['show_friend_like'] );
		$instance['stream'] = strip_tags( $new_instance['stream'] );
		$instance['header'] = strip_tags( $new_instance['header'] );
		$instance['width'] = strip_tags( $new_instance['width'] );
		$instance['height'] = strip_tags( $new_instance['height'] );
		return $instance;
	}
/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
	function form( $instance ) {
		$defaults = array( 'title' => 'Find us on Facebook', 'width' => 330, 'height' => 290, 'header' => 'on', 'show_friend_like' => 'on', 'fb_page_url' => '', 'stream' => false);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
            <?php esc_html_e( 'Title:', 'sportshub'); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'fb_page_url' )); ?>"><?php echo esc_html( 'Facebook Page URL:', 'sportshub' ); ?></label>
			<input  class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id( 'fb_page_url' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'fb_page_url' )); ?>" type="text" value="<?php echo esc_attr($instance['fb_page_url']); ?>"/>
			<small>Example: https://www.facebook.com/envato</small>
		</p>
		<hr/>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'header' )); ?>"><?php echo esc_html( 'Show Header:', 'sportshub' ); ?></label>
			<input class="widefat" width="100%" type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'header' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'header' )); ?>" <?php checked( (bool) $instance['header'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'show_friend_like' )); ?>"><?php echo esc_html( 'Show show_friend_like:', 'sportshub' ); ?></label>
			<input class="widefat" width="100%" type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'show_friend_like' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_friend_like' )); ?>" <?php checked( (bool) $instance['show_friend_like'], true ); ?> />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'stream' )); ?>"><?php echo esc_html( 'Show Stream:', 'sportshub' ); ?></label>
			<input class="widefat" width="100%" type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'stream' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'stream' )); ?>" <?php checked( (bool) $instance['stream'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'width' )); ?>"><?php echo esc_html( 'Width:', 'sportshub' ); ?></label>
			<input class="widefat" type="number" id="<?php echo esc_attr($this->get_field_id( 'width' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'width' )); ?>" value="<?php echo esc_attr($instance['width']); ?>" style="width: 30%"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'height' )); ?>"><?php echo esc_html( 'Height:', 'sportshub' ); ?></label>
			<input class="widefat" type="number" id="<?php echo esc_attr($this->get_field_id( 'height' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'height' )); ?>" value="<?php echo esc_attr($instance['height']); ?>"style="width: 30%"/>
		</p>

	<?php
	}
}

?>