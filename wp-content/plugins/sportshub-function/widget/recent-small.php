<?php

/**
 * @author  Themelazer
 * @since   1.0
 * @version 1.0
 * @package sportshub-function
 */
 
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'widgets_init', 'sportshub_recent_post_widgets' );

function sportshub_recent_post_widgets() {
    register_widget( 'sportshub_recent_post_widget' );
}

class sportshub_recent_post_widget extends WP_Widget {

/*-----------------------------------------------------------------------------------*/
/*  Widget Setup
/*-----------------------------------------------------------------------------------*/
            
    public function __construct() {
        $widget_ops = array('classname'   => 'post_list_widget', 'description' => esc_html__('Display a list of recent post.', 'sportshub'));
        parent::__construct('sportshub_recent_post_widget', esc_html__('Themelazer: Recently Posts', 'sportshub'), $widget_ops);
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
        if (isset($instance['en_number_over'])==''){$en_number_over = '';}else{$en_number_over = absint($instance['en_number_over']);}
        $post_cat_args = array(
            'showposts' => $number,
            'category__in' => $cats,
            'ignore_sticky_posts' => 1,
            'offset' => $number_offset
        );

        $post_cat_widget = null;
        $post_cat_widget = new WP_Query($post_cat_args);

        print '<span class="themelazer_none_space"></span>'.$before_widget;
        print '<div class="widget_themelazer_wrapper">';
        if ( $title ){ 
        print '<span class="themelazer_none_space"></span>'.$before_title . esc_attr($title) . $after_title; 
        }        

        // Post list in widget
        print '<div class="recent-post-wrapper">';        
            $i=0;
            while ($post_cat_widget->have_posts()) {
            $i++;
            $post_cat_widget->the_post();
            $post_id = get_the_ID();
            ?>
            

        <div class="themelazer_article_list">
            <div class="post-outer">
                <?php if ( has_post_thumbnail()) {?>
                    <div class="post-inner">
                        <div class="post-thumbnail sidebar"> 
                            <?php the_post_thumbnail('sportshub_small_recent_feature'); ?> 
                             <!-- <span class="themelazer_site_count"><?php echo esc_html($i);?></span> -->
                                <a href="<?php the_permalink(); ?>"></a>
                        </div>
                    </div>
                <?php }?>
                <div class="post-inner">
                    <div class="entry-header">
                        <h2 class="entry-title"> 
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title()?></a>
                        </h2>
                           <?php sportshub_post_meta_w(get_the_ID());?>
                    </div>
                </div>
            </div>
        </div>
           


    <?php
        }
        wp_reset_postdata();
        print "</div>";
        print '<span class="themelazer_none_space"></span>'.$after_widget;
        print "</div>";
    }

/*-----------------------------------------------------------------------------------*/
/*  Update Widget
/*-----------------------------------------------------------------------------------*/
    
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['cats'] = $new_instance['cats'];
        $instance['number'] = absint($new_instance['number']);
        $instance['number_offset'] = absint($new_instance['number_offset']);
        $instance['en_number_over'] = esc_attr($new_instance['en_number_over']);
         
        return $instance;
    }

/*-----------------------------------------------------------------------------------*/
/*  Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/
    
    function form( $instance ) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : 'Recent Posts';
        $number = isset($instance['number']) ? absint($instance['number']) : 4;
        $number_offset = isset($instance['number_offset']) ? absint($instance['number_offset']) : 0;
        $post_exception = isset($instance['en_number_over']) ? absint($instance['en_number_over']) : '';
        
?>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php esc_html_e('Title:', 'sportshub'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
</p>

<p>
    <label for="<?php echo esc_attr($this->get_field_id('number')); ?>">
        <?php esc_html_e('Number of posts to show:', 'sportshub'); ?>
    </label>
    <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" value="<?php echo esc_attr($number); ?>" style="width: 100%;"  />
</p>

<p>
    <label for="<?php echo esc_attr($this->get_field_id('number_offset')); ?>">
        <?php esc_html_e('Offset posts:', 'sportshub'); ?>
    </label>
    <input id="<?php echo esc_attr($this->get_field_id('number_offset')); ?>" name="<?php echo esc_attr($this->get_field_name('number_offset')); ?>" type="number" value="<?php echo esc_attr($number_offset); ?>" style="width: 100%;" />
</p>
<p>
    <input class="checkbox" type="checkbox" id="<?php echo esc_attr($this->get_field_id('en_number_over')); ?>" value="1" name="<?php echo esc_attr($this->get_field_name('en_number_over')); ?>" <?php if(isset($instance[ 'en_number_over']) && $instance[ 'en_number_over']=='1' ) echo 'checked="checked"'; ?> />
    <label for="<?php echo esc_attr($this->get_field_id('en_number_over')); ?>">
        <?php esc_attr_e('Enable number overlay', 'sportshub'); ?>
    </label>
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('cats')); ?>">
        <?php esc_html_e('Choose your category:', 'sportshub');?>
        <?php
                $categories=  get_categories();
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