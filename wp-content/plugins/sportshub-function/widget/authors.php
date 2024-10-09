<?php

/**
 * @author  Themelazer
 * @since   1.0
 * @version 1.0
 * @package sportshub-function
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action('widgets_init','sportshub_authors_list_widget');
function sportshub_authors_list_widget(){
    register_widget("sportshub_authors_list_widget_post_count");
}

class sportshub_authors_list_widget_post_count extends WP_Widget {

    function __construct() {
        parent::__construct(
            'sportshub_authors_list_widget_post_count',
            __('Authors List with Post Count Widget', 'sportshub'),
            array('description' => __('A widget to display a list of authors with post count', 'text_domain'))
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        
        // Fetch authors, with a limit of 3 if none is provided
        $limit = !empty($instance['limit']) ? (int)$instance['limit'] : 3; 

        // Fetch authors based on limit
        $authors = get_users(array(
            'role__author' => array('all_users'), // Fetch authors only
            'number' => $limit, // Limit set by widget instance
            'orderby' => 'post_count',
            'order' => 'DESC',
            'has_published_posts' => true, // Show only authors with published posts
        ));

        if (!empty($authors)) {
            echo '<ul class="authors-list">';
            foreach ($authors as $author) {
                $post_count = count_user_posts($author->ID);

                // Only show the author if they have posts
                if ($post_count > 0) {
                    $author_avatar = get_avatar($author->user_email, 150);   
                    $author_name = $author->display_name;
                    $author_url = get_author_posts_url($author->ID);
                    $author_desc = get_the_author_meta('description', $author->ID);

                    echo '<li class="author-item">';
                    echo '<div class="author-avatar">' . $author_avatar . '</div>';
                    echo '<div class="author-info">';
                    echo '<a href="'.esc_url($author_url).'"><h4 class="author-name">'.esc_html($author_name).'</h4></a>';
                    echo '<p class="post-count">' . esc_html__('Posts made: ', 'sportshub'). sprintf(_n('%d post', '%d posts', $post_count, 'sportshub'), $post_count) . '</p>';
                    echo '</div>'; 
                    echo '</li>';
                }
            }
            echo '</ul>';
        }

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Authors with Post Count', 'sportshub');
        $limit = !empty($instance['limit']) ? (int)$instance['limit'] : 3;

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Limit:', 'sportshub'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="number" value="<?php echo esc_attr($limit); ?>" min="1">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['limit'] = (!empty($new_instance['limit'])) ? (int)$new_instance['limit'] : 3;
        return $instance;
    }
}

?>