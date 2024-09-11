<?php

/**
 * @author  Themelazer
 * @since   1.0
 * @version 1.0
 * @package sportshub-function
 */

if ( ! defined( 'ABSPATH' ) ) exit;
add_action('widgets_init','sportshub_load_twitter_timeline_widget');
function sportshub_load_twitter_timeline_widget(){
        register_widget("sportshub_twitter_timeline_widget");
}   
/*-----------------------------------------------------------------------------------*/
/* Classs Twiiter_Timeline
/*-----------------------------------------------------------------------------------*/
class Twitter_Timeline {
	private $instanced;
	
	function __construct($data) {
		$this->instanced = $data;
	}
	
	function layout_timeline() {		
		
		$data_layout = array();
		$data_layout[] = ( $this->instanced['twitter_widget_layout_header'] == 0 )? 'noheader': '';
		$data_layout[] = ( $this->instanced['twitter_widget_layout_footer'] == 0 )? 'nofooter': '';
		$data_layout[] = ( $this->instanced['twitter_widget_layout_border'] == 0 )? 'noborders': '';
		$data_layout[] = ( $this->instanced['twitter_widget_layout_scrollbar'] == 0 )? 'noscrollbar': '';
		$data_layout[] = ( $this->instanced['twitter_widget_layout_background'] == 1 )? 'transparent': '';

		$data_twitter_widget = array(
			'data-show-replies' => $this->instanced['twitter_widget_show_replies'],
			'data-theme' => $this->instanced['twitter_widget_theme'],
			'data-chrome' => join( ' ', array_filter($data_layout) )
		);
		
		if( $this->instanced['twitter_widget_tweet_limit'] != 0 ) {
			$data_twitter_widget['data-tweet-limit'] = $this->instanced['twitter_widget_tweet_limit'];
		}

		$data_twitter_widget_nv = '';
		foreach ( $data_twitter_widget as $key => $val ) {
			if( !empty($val) ) {
				$data_twitter_widget_nv .= $key . '=' . '"' . esc_attr( $val ) . '"' . ' ';
			}
		}

		$lang = substr( strtoupper( get_locale() ), 0, 2 );
		
		echo '<div class="twitter-widget-feed"><a class="twitter-timeline" href="https://twitter.com/' . $this->instanced['twitter_widget_screen_name'] . '" data-width="' . $this->instanced['twitter_widget_width'] . '" data-height="' . $this->instanced['twitter_widget_height'] . '" ' . $data_twitter_widget_nv . 'data-lang="' . strtolower($lang) . '">Tweets by @' . $this->instanced['twitter_widget_screen_name'] . '</a></div>';

		wp_enqueue_script('sportshub_twitter_timeline_js', get_template_directory_uri() . '/js/twitter.js', array('jquery'));
		return;
	}

} class sportshub_twitter_timeline_widget extends WP_Widget{

/*-----------------------------------------------------------------------------------*/
/*  Widget Setup
/*-----------------------------------------------------------------------------------*/

		function __construct(){
			$widget_ops = array('description' => esc_html_x('Display Twitter Timeline.', 'admin', 'sportshub'));
			parent::__construct( false, esc_html_x('Themelazer: Twitter Timeline', 'admin', 'sportshub'), $widget_ops);

		    $this->defaults = array(
			     'title' => esc_attr__( 'Follow me on Twitter', 'sportshub'),
			     'twitter_widget_screen_name' => 'Username',
			     'twitter_widget_tweet_limit' => 0,
			     'twitter_widget_show_replies' => 'false',
			     'twitter_widget_width' => '325',
			     'twitter_widget_height' => '500',
			     'twitter_widget_theme' => 'light',
			     'twitter_widget_layout_header' => 1,
			     'twitter_widget_layout_footer' => 0,
			     'twitter_widget_layout_border' => 1,
			     'twitter_widget_layout_scrollbar' => 0,
			     'twitter_widget_layout_background' => 1
		);
	}

/*-----------------------------------------------------------------------------------*/
/*  Display Widget
/*-----------------------------------------------------------------------------------*/
	function widget( $args, $instance ) {
		extract( $args );
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		echo $before_widget;
		if ( ! empty( $instance['title'] ) ) {
			echo $before_title . apply_filters( 'widget_title',  $instance['title'], $instance, $this->id_base ) . $after_title;
		}
		$sportshub_twitter_timeline = new Twitter_Timeline($instance);
		$sportshub_twitter_timeline->layout_timeline();
		echo $after_widget;	
	}
/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/	
	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		foreach( $this->defaults as $key => $val ) {
			$instance[$key] = strip_tags( $new_instance[$key] );
		}
		return $instance;

	}

/*-----------------------------------------------------------------------------------*/
/*  Display Widget
/*-----------------------------------------------------------------------------------*/
	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, $this->defaults );
		$title = strip_tags( $instance['title'] );
		$twitter_widget_theme = array( 'light' => 'Light', 'dark' => 'Dark' );
?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_html( 'Title:', 'sportshub' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter_widget_screen_name' ); ?>"><?php echo esc_html( 'Username:', 'sportshub' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'twitter_widget_screen_name' ); ?>" name="<?php echo $this->get_field_name( 'twitter_widget_screen_name' ); ?>" value="<?php echo esc_attr( $instance['twitter_widget_screen_name'] ); ?>" />
		</p>
		<small>Note: without @</small><br>
		<small>Example: envato</small>
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter_widget_theme' ); ?>"><?php echo esc_html( 'Timeline Theme:', 'sportshub' ); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id( 'twitter_widget_theme' ); ?>" name="<?php echo $this->get_field_name( 'twitter_widget_theme' ); ?>">
              <?php foreach ( $twitter_widget_theme as $key => $val ): ?>
			    <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['twitter_widget_theme'], $key ); ?>><?php echo esc_html( $val ); ?></option>
			  <?php endforeach; ?>
            </select>
		</p>

		<p>
			<input class="checkbox" type="checkbox" value="1" <?php checked( $instance[ 'twitter_widget_layout_background' ], 1 ); ?> id="<?php echo $this->get_field_id( 'twitter_widget_layout_background' ); ?>" name="<?php echo $this->get_field_name( 'twitter_widget_layout_background' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'twitter_widget_layout_background' ); ?>"><?php echo esc_html( ' Transparent Background', 'sportshub' ); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" value="1" <?php checked( $instance[ 'twitter_widget_layout_header' ], 1 ); ?> id="<?php echo $this->get_field_id( 'twitter_widget_layout_header' ); ?>" name="<?php echo $this->get_field_name( 'twitter_widget_layout_header' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'twitter_widget_layout_header' ); ?>"><?php echo esc_html( ' Show Header', 'sportshub' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" value="1" <?php checked( $instance[ 'twitter_widget_layout_footer' ], 1 ); ?> id="<?php echo $this->get_field_id( 'twitter_widget_layout_footer' ); ?>" name="<?php echo $this->get_field_name( 'twitter_widget_layout_footer' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'twitter_widget_layout_footer' ); ?>"><?php echo esc_html( ' Show Footer', 'sportshub' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" value="1" <?php checked( $instance[ 'twitter_widget_layout_border' ], 1 ); ?> id="<?php echo $this->get_field_id( 'twitter_widget_layout_border' ); ?>" name="<?php echo $this->get_field_name( 'twitter_widget_layout_border' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'twitter_widget_layout_border' ); ?>"><?php echo esc_html( ' Show Border', 'sportshub' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" value="1" <?php checked( $instance[ 'twitter_widget_layout_scrollbar' ], 1 ); ?> id="<?php echo $this->get_field_id( 'twitter_widget_layout_scrollbar' ); ?>" name="<?php echo $this->get_field_name( 'twitter_widget_layout_scrollbar' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'twitter_widget_layout_scrollbar' ); ?>"><?php echo esc_html( ' Show Scrollbar', 'sportshub' ); ?></label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter_widget_tweet_limit' ); ?>"><?php echo esc_html( 'Tweets Shown:', 'sportshub' ); ?></label>
            <input type="number" max="20" min="0" class="widefat" id="<?php echo $this->get_field_id( 'twitter_widget_tweet_limit' ); ?>" name="<?php echo $this->get_field_name( 'twitter_widget_tweet_limit' ); ?>" value="<?php echo esc_attr( $instance['twitter_widget_tweet_limit'] ); ?>">
            </input>
		</p>

		<p>
			<input class="checkbox" type="checkbox" value="true" <?php checked( $instance[ 'twitter_widget_show_replies' ], "true" ); ?> id="<?php echo $this->get_field_id( 'twitter_widget_show_replies' ); ?>" name="<?php echo $this->get_field_name( 'twitter_widget_show_replies' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'twitter_widget_show_replies' ); ?>"><?php echo esc_html( ' Show Replies', 'sportshub' ); ?></label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'twitter_widget_width' ); ?>"><?php echo esc_html( 'Width (px):', 'sportshub' ); ?></label>
            <input type="number" class="widefat" id="<?php echo $this->get_field_id( 'twitter_widget_width' ); ?>" name="<?php echo $this->get_field_name( 'twitter_widget_width' ); ?>" value="<?php echo esc_attr( $instance['twitter_widget_width'] ); ?>">
            </input>
		</p>
			
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter_widget_height' ); ?>"><?php echo esc_html( 'Height (px):', 'sportshub' ); ?></label>
            <input type="number" class="widefat" id="<?php echo $this->get_field_id( 'twitter_widget_height' ); ?>" name="<?php echo $this->get_field_name( 'twitter_widget_height' ); ?>" value="<?php echo esc_attr( $instance['twitter_widget_height'] ); ?>">
            </input>
		</p><?php
	}
	
}




