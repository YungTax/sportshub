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

        $authors = get_users(array('role_author' => 'all_users'));

        if (!empty($authors)) {
            echo '<ul class="authors-list">';
            foreach ($authors as $author) {
                $author_avatar = get_avatar($author->user_email, 48);   
                $author_name = $author->display_name;
                $author_url = get_author_posts_url($author->ID);
                $post_count = count_user_posts($author->ID);
                $author_dec = get_the_author_meta('description', $author->ID);

                echo '<li class="author-item">';
                echo '<div class="author-avatar">' . $author_avatar . '</div>';
                echo '<div class="author-info">';
                echo '<h4 class="author-name"><a href="' . esc_url($author_url) . '">' . $author_name . '</a></h4>';
                echo '<p class="post-count">' . esc_html__('Posts made: ', 'sportshub'). sprintf(_n('%d post', '%d posts', $post_count, 'sportshub'), $post_count) . '</p>';
                echo '<p class="author-dec">' .wp_trim_words($author_dec,9) .'</p>';
                echo '</div>'; 
                echo '</li>';
            }
            echo '</ul>';
        }

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Authors with Post Count', 'sportshub');
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        return $instance;
    }
}


?>