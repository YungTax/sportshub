<?php

/**
 * @author  Themelazer
 * @since   1.0
 * @version 1.0
 * @package sportshub-function
 */
 
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'widgets_init', 'sportshub_popular_widgets' );
function sportshub_popular_widgets() {
	register_widget( 'sportshub_popular_widget' );
}
class sportshub_popular_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/

	public function __construct() {
		$widget_ops = array( 'classname' => 'post_list_widget', 'description' => esc_html__( 'Display a list of popular posts', 'sportshub' ) );
		parent::__construct('sportshub_popular_widget', esc_html__('Themelazer: Popular post', 'sportshub'), $widget_ops);
	}

/*-----------------------------------------------------------------------------------*/
/*	Display Widget
/*-----------------------------------------------------------------------------------*/

	function widget( $args, $instance ) {
		extract( $args );
		$title = isset($instance['title']) ? $instance['title'] : "Popular Posts";
		$num_posts = isset($instance['num_posts']) ? $instance['num_posts'] : 4;
		echo '<span class="themelazer_none_space"></span>'.$before_widget;
        echo '<div class="widget_themelazer_wrapper">';
        if ( $title ){ 
        echo '<span class="themelazer_none_space"></span>'.$before_title . esc_attr($title) . $after_title; 
        }        

        // Post list in widget
        echo '<div class="recent-post-wrapper">';  
		
			$recent_posts = new WP_Query(array(
				'showposts' => $num_posts,
				'orderby' => 'comment_count',
				'ignore_sticky_posts' => 1
			));			
			?>
	<div class="recent-post-wrapper">
        <?php 
            $i=0;
			while($recent_posts->have_posts()){ 
			$i++;	
			$recent_posts->the_post();
			$post_id = get_the_ID(); 
			$categories = get_the_category(get_the_ID());          
	         if ($categories) {
	               foreach( $categories as $tag) {
	                  $tag_link = get_category_link($tag->term_id);
	                  $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
	               }
	         }
		?>

	       	<div class="themelazer_article_list">
	       		<div class="post-outer">
	       			<?php if ( has_post_thumbnail()) {?>
		       			<div class="post-inner">
		       				<div class="post-thumbnail sidebar"> 
		       					<?php the_post_thumbnail('sportshub_small_recent_feature'); ?>
		       					<span class="themelazer_site_count"  style="color:<?php echo $title_bg_Color;?> !important;"> 
		       						<?php echo esc_html($i); ?>
	       						</span> 
		       					<a href="<?php the_permalink(); ?>"></a>
		       				</div>
		       			</div>
	       			<?php }?>
	       			<div class="post-inner">
	       				<div class="entry-header">
	                        <h2 class="entry-title"> 
	                        	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title()?></a>
	                        </h2>
	               			<?php sportshub_post_meta_s(get_the_ID());?>
	          			</div>
	          		</div>
	          	</div>
	        </div>
        <?php }
		wp_reset_postdata(); ?>
	</div>
<?php
	echo '<span class="themelazer_none_space"></span>'.$after_widget;
	echo "</div>";
}

/*-----------------------------------------------------------------------------------*/
/*	Update Widget
/*-----------------------------------------------------------------------------------*/

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num_posts'] = $new_instance['num_posts'];
		return $instance;
	}

/*-----------------------------------------------------------------------------------*/
/*	Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

	function form($instance)
	{
		$defaults = array('title' => esc_html__( 'Popular Posts', 'sportshub' ) , 'num_posts' => 4, 'show_comments' => 'on');
		$instance = wp_parse_args((array) $instance, $defaults); ?>

<p>
    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php esc_html_e( 'Title:', 'sportshub' ) ?></label>
    <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('num_posts')); ?>">
        <?php esc_html_e( 'Number of posts:', 'sportshub' ); ?></label>
    <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('num_posts')); ?>" name="<?php echo esc_attr($this->get_field_name('num_posts')); ?>" type="number" value="<?php echo esc_attr($instance['num_posts']); ?>" />
</p>
<?php 
	}
}
?>