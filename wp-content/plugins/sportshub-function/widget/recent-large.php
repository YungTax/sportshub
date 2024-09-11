<?php

/**
 * @author  Themelazer
 * @since   1.0
 * @version 1.0
 * @package sportshub-function
 */
 
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('widgets_init', 'sportshub_recent_large__widgets');

function sportshub_recent_large__widgets() {
    register_widget('sportshub_recent_large_widgets');
}

class sportshub_recent_large_widgets extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*  Widget Setup
/*-----------------------------------------------------------------------------------*/

    public function __construct() {
        $widget_ops = array('classname' => 'main_post_style','description' => esc_html__('Display post on menu or widget.', 'sportshub'));
        parent::__construct('sportshub_recent_large_widgets', esc_html__('Themelazer: Recent post large', 'sportshub'), $widget_ops);
    }

/*-----------------------------------------------------------------------------------*/
/*  Display Widget
/*-----------------------------------------------------------------------------------*/
    function widget($args, $instance) {

        extract($args);

        $cats = isset($instance["cats"]) ? $instance["cats"] : "";
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
        $number = isset($instance['number']) ? absint($instance['number']) : 4;
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
        
        // array to call recent posts.

        $jellywp_args = array(
            'showposts' => $number,
            'category__in' => $cats,
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset
        );

        $jellywp_widget = null;
        $jellywp_widget = new WP_Query($jellywp_args);

        echo '<span class="themelazer_none_space"></span>'.$before_widget;

        // Widget title

        echo '<span class="themelazer_none_space"></span>'.$before_title;
        echo esc_attr($title);
        echo '<span class="themelazer_none_space"></span>'.$after_title;

        // Post list in widget

       ?>
<div class="themelazer_recent_large">
    <?php
            while ($jellywp_widget->have_posts()) {
            $jellywp_widget->the_post();
            $post_id = get_the_ID();
            $categories = get_the_category(get_the_ID());
            $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);       
        ?>

    <div class=" blog-style-one blog-small-grid">
                <div class="single-blog-style-one">
         <div class="img-box <?php if ( has_post_thumbnail()){echo 'ghave_img';}else{echo 'gnone_img';}?>">
            <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail()) {the_post_thumbnail('sportshub_slider_grid_small');} ?></a>
         </div>                        
            <?php if(get_theme_mod('disable_post_category') !=1){
               $categories = get_the_category(get_the_ID());          
               if ($categories) {
                 echo '<div class="themelazer_post_categories">';
                 foreach( $categories as $tag) {
                  echo '<a '.$tag->name.'" href="'.esc_url(get_category_link($tag->term_id)).'">'.$tag->name.'</a>';
                 }
                 echo "</div>";
                 }
                 }
               ?>
        
         <div class="text-box">
            <h3>
               <a href="<?php the_permalink(); ?>" tabindex="-1" title="<?php the_title(); ?>"><?php the_title()?></a>
            </h3>
            <?php sportshub_post_meta_m(get_the_ID());?>
         </div>
      </div>
   </div>

    <?php }?>


</div>

<?php
        wp_reset_postdata();


        print '<span class="themelazer_none_space"></span>'.$after_widget;
    }

/*-----------------------------------------------------------------------------------*/
/*  Update Widget
/*-----------------------------------------------------------------------------------*/

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['cats'] = $new_instance['cats'];
        $instance['number'] = absint($new_instance['number']);
        $instance['number_offset'] = absint($new_instance['number_offset']);

        return $instance;
    }
/*-----------------------------------------------------------------------------------*/
/*  Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
        $number = isset($instance['number']) ? absint($instance['number']) : 4;
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
        ?>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'sportshub'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts to show:', 'sportshub'); ?></label>
     <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" value="<?php echo esc_attr($number); ?>" size="3" />
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('number_offset')); ?>"><?php esc_html_e('Offset posts:', 'sportshub'); ?></label>
    <input id="<?php echo esc_attr($this->get_field_id('number_offset')); ?>" name="<?php echo esc_attr($this->get_field_name('number_offset')); ?>" type="number" value="<?php echo esc_attr($number_offset); ?>" size="3" />
</p>

<p>
    <label for="<?php echo esc_attr($this->get_field_id('cats')); ?>">
        <?php esc_html_e('Choose your category:', 'sportshub'); ?>

        <?php
                $categories = get_categories();
                print "<br/>";
                foreach ($categories as $cat) {
                    $option = '<input type="checkbox" id="' . $this->get_field_id('cats') . '[]" name="' . $this->get_field_name('cats') . '[]"';
                    if (isset($instance['cats'])) {
                        foreach ($instance['cats'] as $cats) {
                            if ($cats == $cat->term_id) {
                                $option = $option . ' checked="checked"';
                            }
                        }
                    }
                    $option .= ' value="' . $cat->term_id . '" />';
                    $option .= '&nbsp;';
                    $option .= $cat->cat_name.' ('.esc_html( $cat->category_count ).')';
                    $option .= '<br />';
                    print '<span class="themelazer_none_space"></span>'.$option;
                }
                ?>
    </label>
</p>

<?php
    }

}
?>