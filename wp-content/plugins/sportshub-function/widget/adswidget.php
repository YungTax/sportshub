<?php

/**
 * @author  Themelazer
 * @since   1.0
 * @version 1.0
 * @package sportshub-function
 */
 
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('widgets_init','sportshub_ads_load_widgets');
function sportshub_ads_load_widgets(){
		register_widget("sportshub_ads_widgets");
}
class sportshub_ads_widgets extends WP_widget{
/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	public function __construct() {
	  $widget_ops = array( 'classname' => 'sportshub_ads_widgets', 'description' => esc_html__( 'Display your Advertisement Image' , 'sportshub') );
	  parent::__construct('sportshub_ads_widgets', esc_html__('Themelazer: place your ads here', 'sportshub'), $widget_ops);
	}
/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/	
	function widget($args,$instance){
	extract($args);		
		$title = isset($instance['title']) ? $instance['title'] : "Advertisement";
		$link = isset($instance['link']) ? $instance['link'] : "";
		$image = isset($instance['image']) ? $instance['image'] : "";
		?>

<?php echo '<span class="themelazer_none_space"></span>'.$before_widget;?>
<div class="widget_themelazer_wrapper ads_widget_container">

    <?php
		if ( ! empty( $title ) ) {
			echo '<span class="themelazer_none_space"></span>'.$before_title.esc_attr($title).$after_title;
		}
		
			?>

    <div>
        <a href="<?php if($link != " "){echo esc_url($link);}else{echo "# ";} ?>">
          <div class="themelazer_content_banner"> 	
            <img src="<?php if($image != ""){echo esc_url($image);}else{echo esc_url(get_template_directory_uri()."/img/300x250.png ");} ?>" alt="<?php bloginfo('description'); ?>"  />
          </div>  
        </a>
    </div>

    <?php
		echo '<span class="themelazer_none_space"></span>'.$after_widget;
	echo "</div>";
	}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/
	
	function update($new_instance, $old_instance){
		$instance = $old_instance;	
		$instance['title'] = $new_instance['title'];
		$instance['link'] = $new_instance['link'];
		$instance['image'] = $new_instance['image'];
		return $instance;
	}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

	function form($instance){
		?>
    <?php
			$defaults = array( 'title' => esc_html__( 'Advertisement' , 'sportshub'), 'link' => '' , 'image' => '' );
			$instance = wp_parse_args((array) $instance, $defaults); 
		?>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:', 'sportshub'); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('link')); ?>"><?php esc_html_e( 'Link Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="text" value="<?php echo esc_url($instance['link']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('image')); ?>"><?php esc_html_e( 'Image:' , 'sportshub' ); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('image')); ?>" name="<?php echo esc_attr($this->get_field_name('image')); ?>" type="text"  style="margin-bottom: 2px;" value="<?php echo esc_url($instance['image']); ?>" />
        <button class="sportshub_upload_image_button button button-primary"><?php esc_html_e( 'Upload Image', 'sportshub' ); ?></button>

    </p>
    <?php

	}
}
?>