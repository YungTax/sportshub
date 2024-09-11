<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('widgets_init','sportshub_category_widget');


function sportshub_category_widget(){
		register_widget("sportshub_category_image_widget_register");
}

class sportshub_category_image_widget_register extends WP_widget{

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	public function __construct() {
		$widget_ops = array( 'classname' => 'themelazer_cat_image', 'description' => esc_html__( 'Dispaly Category With Image' , 'sportshub') );
		parent::__construct('sportshub_category_image_widget_register', esc_html__('Themelazer: Category Image', 'sportshub'), $widget_ops);
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/
	
	function widget($args,$instance){
	extract($args);		
		
		$title = isset($instance['title']) ? $instance['title']: "Display Category With image";
		$number_of_cat = isset($instance['number_of_cat']) ? $instance['number_of_cat']: "";
		$cat_id = isset($instance['cat_id']) ? $instance['cat_id']: "";
		
		echo '<span class="themelazer_none_space"></span>'.$before_widget;
        if ( $title ){ 
        echo '<span class="themelazer_none_space"></span>'.$before_title . esc_attr($title) . $after_title; 
        }
		?>

<div class="wrapper_category_image">
	<?php
		if($cat_id){$cat_id = explode(",",$cat_id);}else{$cat_id = "";}
		$args = array(
		'orderby'       => 'include', 
		'order'         => 'ASC',
		'hide_empty'    => false,
		'fields'        => 'all',
		'pad_counts'    => false, 
		'include'       => $cat_id,
		'number'        => $number_of_cat,
		);
		$categories = get_terms('category', $args);
		if ($categories) {
		echo '<div class="category_image_wrapper_main">';
		foreach( $categories as $tag) {
			$tag_link = get_category_link($tag->term_id);
			$tag_dec =  category_description($tag->term_id);
			$title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
			$category_image_main = get_term_meta($tag->term_id, "jelly_cat_header_image_id", true);
			
			$category_image = '';
			$jelly_header_id = absint( get_term_meta( $tag->term_id, 'jelly_header_id', true ) );
			if ($jelly_header_id){
			$category_image = wp_get_attachment_image_src( $jelly_header_id , 'sportshub_slider_grid_small' );
			echo '<div class="category_image_bg_image" style="background-image: url('.$category_image[0].');">';
			}else{
			echo '<div class="category_image_bg_image">';
			}
		echo '<a class="category_image_link" id="category_color_'.$tag->term_id.'" href="'.esc_url($tag_link).'"><span class="themelazer_cm_overlay"><span class="themelazer_cm_name">'.$tag->name.'</span><span class="sportshub_tag_dec">'.$tag_dec.'</span><span class="themelazer_cm_count" style="background:'.$title_bg_Color.' !important;">'.$tag->count.'</span></span></a>';
		echo '<div class="category_image_bg_overlay" style="background: '.$title_bg_Color.';"></div>';
		echo '</div>';
		}
		echo "</div>";
		}
	?>

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
		$instance['number_of_cat'] = $new_instance['number_of_cat'];
		$instance['cat_id'] = $new_instance['cat_id'];
		
		return $instance;
	}



	function form($instance){
		?>
    <?php
			$defaults = array( 'title' => esc_html__( 'Categories' , 'sportshub'), 'number_of_cat' => '4', 'cat_id' => '');
			$instance = wp_parse_args((array) $instance, $defaults); 
		?>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
            <?php esc_html_e( 'Title:', 'sportshub'); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('number_of_cat')); ?>">
            <?php esc_html_e( 'Number Of Category:', 'sportshub'); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('number_of_cat')); ?>" name="<?php echo esc_attr($this->get_field_name('number_of_cat')); ?>" type="text" value="<?php echo esc_attr($instance['number_of_cat']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('cat_id')); ?>">
            <?php esc_html_e( 'Category id EX: 1,2,3', 'sportshub'); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('cat_id')); ?>" name="<?php echo esc_attr($this->get_field_name('cat_id')); ?>" type="text" value="<?php echo esc_attr($instance['cat_id']); ?>" />
    </p>


    <?php

	}
}
?>