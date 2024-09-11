<?php

/**
 * @author  Themelazer
 * @since   1.0
 * @version 1.0
 * @package sportshub-function
 */
 
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('widgets_init','sportshub_about_us_load_widgets');
function sportshub_about_us_load_widgets(){
        register_widget("sportshub_about_us_widget");
}
class sportshub_about_us_widget extends WP_widget{

/*-----------------------------------------------------------------------------------*/
/*  Widget Setup
/*-----------------------------------------------------------------------------------*/

    public function __construct() {
        $widget_ops = array( 'classname' => 'jellywp_about_us_widget', 'description' => esc_html__( 'About me and social icons' , 'sportshub') );
        parent::__construct('sportshub_about_us_widget', esc_html__('Themelazer: About me', 'sportshub'), $widget_ops);
        wp_enqueue_script('sportshub_js_admin', get_template_directory_uri() . '/js/about-me-widget.js', array('jquery'));
    }

/*-----------------------------------------------------------------------------------*/
/*  Display widget
/*-----------------------------------------------------------------------------------*/
    
    function widget($args,$instance){
    extract($args);     
        
        $title = isset($instance['title']) ? $instance['title'] : "About me";
        $feed_description = isset($instance['feed_description']) ? $instance['feed_description'] : "Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem imperdiet ut imperdiet eu.";
        $image = isset($instance['image']) ? $instance['image'] : "";
        $backgund =isset($instance['backgund']) ? $instance['backgund'] : "";
        $facebook = isset($instance['facebook']) ? $instance['facebook'] : "#";
        $behance = isset($instance['behance']) ? $instance['behance'] : "#";
        $vimeo = isset($instance['vimeo']) ? $instance['vimeo'] : "#";
        $youtube = isset($instance['youtube']) ? $instance['youtube'] : "#";
        $instagram = isset($instance['instagram']) ? $instance['instagram'] : "#";
        $tumblr = isset($instance['tumblr']) ? $instance['tumblr'] : "#";
        $linkedin = isset($instance['linkedin']) ? $instance['linkedin'] : "#";
        $pinterest = isset($instance['pinterest']) ? $instance['pinterest'] : "#";
        $twitter = isset($instance['twitter']) ? $instance['twitter'] : "#";
        $deviantart = isset($instance['deviantart']) ? $instance['deviantart'] : "#";
        $dribble = isset($instance['dribble']) ? $instance['dribble'] : "#";
        $dropbox = isset($instance['dropbox']) ? $instance['dropbox'] : "#";
        $rss = isset($instance['rss']) ? $instance['rss'] : "#";
        $skype = isset($instance['skype']) ? $instance['skype'] : "#";
        $stumbleupon = isset($instance['stumbleupon']) ? $instance['stumbleupon'] : "#";
        $wordpress = isset($instance['wordpress']) ? $instance['wordpress'] : "#";
        $yahoo = isset($instance['yahoo']) ? $instance['yahoo'] : "#";
        $flickr = isset($instance['flickr']) ? $instance['flickr'] : "#";
        $sound_cloud = isset($instance['sound_cloud']) ? $instance['sound_cloud'] : "#";
        $signing = $instance['signing'];
        $name = $instance['name'];
        ?>

<?php print '<span class="themelazer_none_space"></span>'.$before_widget;?>
<div class="widget_themelazer_wrapper about_widget_content">
<div class="themelazer-widget-author">
    <div class="author-container">
        <div class="themelazer-author-title">
        <h3><?php print esc_attr($title);?></h3></div>
        <div class="themlazer-background-author"><?php if($backgund){?><img alt="<?php print esc_attr($title);?>" src="<?php echo esc_attr($backgund);?>"><?php }?> </div>
        <div class="themelazer-author-avatar">
            
            <?php if($image){?><img alt="<?php print esc_attr($title);?>" src="<?php echo esc_attr($image);?>"><?php }?>   

        </div>
        <?php if($name) : ?><h5 class="about-name"><?php echo esc_html($name); ?></h5><?php endif; ?>
        

        <div class="themelazer-author-data">
            <?php if($feed_description){?>
        <div class="author-description">
            <?php echo esc_attr($feed_description); ?>
        </div>
         <div class="themelazer-autograph-about">
        <?php if($signing) : ?>
                <img src="<?php echo esc_url($signing); ?>" alt="<?php echo esc_attr(bloginfo(  'name' )); ?>" />
                <?php endif; ?>
        </div>        
        <?php }?>            
           <div class="themelazer-author-social-links">
              <div class="themelazer-social-links-items">
                <div class="themelazer-social-links-item">
                <?php if($facebook !=''){?>
                    <a href="<?php echo esc_url($facebook);?>" class="themelazer-social-links-link themelazer-facebook" target="_blank" title="<?php echo esc_html__( 'facebook', 'sportshub') ?>"><i class="fab fa-facebook-f"></i></a>
                <?php }?>
                <?php if($twitter !=''){?>
                <a href="<?php echo esc_url($twitter);?>" class="themelazer-social-links-link themelazer-twitter" target="_blank" title="<?php echo esc_html__( 'twitter', 'sportshub') ?>"><i class="fab fa-twitter"></i></a>
                <?php }?>
                <?php if($behance !=''){?>
                  <a href="<?php echo esc_url($behance);?>" class="themelazer-social-links-link themelazer-behance" target="_blank"title="<?php echo esc_html__( 'behance', 'sportshub') ?>"><i class="fab fa-behance"></i></a>
                <?php }?>
                <?php if($vimeo !=''){?>
                <a href="<?php echo esc_url($vimeo);?>" class="themelazer-social-links-link themelazer-vimeo" target="_blank" title="<?php echo esc_html__( 'vimo', 'sportshub') ?>"><i class="fab fa-vimeo-square"></i></a>
                <?php }?>
                <?php if($youtube !=''){?>
                <a href="<?php echo esc_url($youtube);?>" class="themelazer-social-links-link themelazer-youtube" target="_blank" title="<?php echo esc_html__( 'youtube', 'sportshub') ?>"><i class="fab fa-youtube"></i></a>
                <?php }?>
                <?php if($tumblr !=''){?>
                <a href="<?php echo esc_url($tumblr);?>" class="themelazer-social-links-link themelazer-tumblr" target="_blank" title="<?php echo esc_html__( 'tumblr', 'sportshub') ?>"><i class="fab fa-tumblr"></i></a>
                <?php }?>
                <?php if($instagram !=''){?>
                <a href="<?php echo esc_url($instagram);?>" class="themelazer-social-links-link themelazer-instagram" target="_blank" title="<?php echo esc_html__( 'instagram', 'sportshub') ?>"><i class="fab fa-instagram"></i></a>
                <?php }?>
                <?php if($linkedin !=''){?>
                <a href="<?php echo esc_url($linkedin);?>" class="themelazer-social-links-link themelazer-linkedin" target="_blank" title="<?php echo esc_html__( 'linkedin', 'sportshub') ?>"><i class="fab fa-linkedin-in"></i></a>
                <?php }?>
                <?php if($pinterest !=''){?>
                <a href="<?php echo esc_url($pinterest);?>" class="themelazer-social-links-link themelazer-pinterest" target="_blank" title="<?php echo esc_html__( 'pinterest', 'sportshub') ?>"><i class="fab fa-pinterest"></i></a>
                <?php }?>
                
                <?php if($deviantart !=''){?>
                <a href="<?php echo esc_url($deviantart);?>" class="themelazer-social-links-link themelazer-deviantart" target="_blank" title="<?php echo esc_html__( 'deviantart', 'sportshub') ?>"><i class="fab fa-deviantart"></i></a>
                <?php }?>
                <?php if($dribble !=''){?>
                <a href="<?php echo esc_url($dribble);?>" class="themelazer-social-links-link themelazer-dribble" target="_blank" title="<?php echo esc_html__( 'dribble', 'sportshub') ?>"><i class="fab fa-dribbble"></i></a>
                <?php }?>
                <?php if($dropbox !=''){?>
                <a href="<?php echo esc_url($dropbox);?>" class="themelazer-social-links-link themelazer-dropbox" target="_blank" title="<?php echo esc_html__( 'dropbox', 'sportshub') ?>"><i class="fab fa-dropbox"></i></a>
                <?php }?>
                <?php if($rss !=''){?>
                <a href="<?php echo esc_url($rss);?>" class="themelazer-social-links-link themelazer-rss" target="_blank" title="<?php echo esc_html__( 'rss', 'sportshub') ?>"><i class="fa fa-rss"></i></a>
                <?php }?>
                <?php if($skype !=''){?>
                <a href="<?php echo esc_url($skype);?>" class="themelazer-social-links-link themelazer-skype" target="_blank" title="<?php echo esc_html__( 'skype', 'sportshub') ?>"><i class="fab fa-skype"></i></a>
                <?php }?>
                <?php if($stumbleupon !=''){?>
                <a href="<?php echo esc_url($stumbleupon);?>" class="themelazer-social-links-link themelazer-stumbleupon" target="_blank" title="<?php echo esc_html__( 'stumbleupon', 'sportshub') ?>"><i class="fab fa-stumbleupon"></i></a>
                <?php }?>
                <?php if($wordpress !=''){?>
                <a href="<?php echo esc_url($wordpress);?>" class="themelazer-social-links-link themelazer-wordpress" target="_blank" title="<?php echo esc_html__( 'wordpress', 'sportshub') ?>"><i class="fab fa-wordpress"></i></a>
                <?php }?>
                <?php if($yahoo !=''){?>
                <a href="<?php echo esc_url($yahoo);?>" class="themelazer-social-links-link themelazer-yahoo" target="_blank" title="<?php echo esc_html__( 'yahoo', 'sportshub') ?>"><i class="fab fa-yahoo"></i></a>
                <?php }?>
                <?php if($flickr !=''){?>
                <a href="<?php echo esc_url($flickr);?>" class="themelazer-social-links-link themelazer-flickr" target="_blank" title="<?php echo esc_html__( 'flickr', 'sportshub') ?>"><i class="fab fa-flickr"></i></a>
                <?php }?>
                <?php if($sound_cloud !=''){?>
                <a href="<?php echo esc_url($sound_cloud);?>" class="themelazer-social-links-link themelazer-soundcloud" target="_blank" title="<?php echo esc_html__( 'sound cloud', 'sportshub') ?>"><i class="fab fa-soundcloud"></i></a>
                <?php }?>
            </div>
           </div> 
        </div>
       
        </div>
    </div>
</div>
    <?php
        echo '<span class="themelazer_none_space"></span>'.$after_widget;
    echo "</div>";
    }
/*-----------------------------------------------------------------------------------*/
/*  Update Widget
/*-----------------------------------------------------------------------------------*/
    
    function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance['signing'] = $new_instance['signing'];
        $instance['name'] = $new_instance['name'];
        $instance['title'] = $new_instance['title'];
        $instance['feed_description'] = $new_instance['feed_description'];
        $instance['image'] = $new_instance['image'];
        $instance['backgund'] = $new_instance['backgund'];
        $instance['facebook'] = $new_instance['facebook'];
        $instance['behance'] = $new_instance['behance'];
        $instance['vimeo'] = $new_instance['vimeo'];
        $instance['youtube'] = $new_instance['youtube'];
        $instance['tumblr'] = $new_instance['tumblr'];
        $instance['instagram'] = $new_instance['instagram'];
        $instance['linkedin'] = $new_instance['linkedin'];
        $instance['pinterest'] = $new_instance['pinterest'];
        $instance['twitter'] = $new_instance['twitter'];
        $instance['blogger'] = $new_instance['blogger'];
        $instance['deviantart'] = $new_instance['deviantart'];
        $instance['dribble'] = $new_instance['dribble'];
        $instance['dropbox'] = $new_instance['dropbox'];
        $instance['rss'] = $new_instance['rss'];
        $instance['skype'] = $new_instance['skype'];
        $instance['stumbleupon'] = $new_instance['stumbleupon'];
        $instance['wordpress'] = $new_instance['wordpress'];
        $instance['yahoo'] = $new_instance['yahoo'];
        $instance['flickr'] = $new_instance['flickr'];
        $instance['sound_cloud'] = $new_instance['sound_cloud'];
        
        return $instance;
    }
/*-----------------------------------------------------------------------------------*/
/*  Widget Settings (Displays the widget settings controls on the widget panel)
/*-----------------------------------------------------------------------------------*/

    function form($instance){
        ?>
        <?php
            $defaults = array( 'title' => esc_html__( 'About me' , 'sportshub'), 'feed_description' => 'Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem imperdiet ut imperdiet eu.' , 'image' => '', 'facebook' => '#', 'behance' => '#', 'vimeo' => '#', 'youtube' => '#', 'tumblr' => '#', 'instagram' => '#', 'linkedin' => '#', 'pinterest' => '#', 'twitter' => '#', 'blogger' => '#', 'deviantart' => '#', 'dribble' => '#', 'dropbox' => '#', 'rss' => '#', 'skype' => '#', 'stumbleupon' => '#', 'wordpress' => '#', 'yahoo' => '#', 'flickr' => '#', 'sound_cloud' => '#');
            $instance = wp_parse_args((array) $instance, $defaults); 
        ?>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
            <?php esc_html_e( 'Title:', 'sportshub'); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('backgund')); ?>">
            <?php esc_html_e( 'Background Image:' , 'sportshub' ); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('backgund')); ?>" name="<?php echo esc_attr($this->get_field_name('backgund')); ?>" type="text" style="margin-bottom: 2px;" value="<?php echo esc_url($instance['backgund']); ?>" />
        <button class="sportshub_upload_image_button button button-primary"><?php esc_html_e( 'Upload Image', 'sportshub' ); ?></button>
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('image')); ?>">
            <?php esc_html_e( 'Image:' , 'sportshub' ); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('image')); ?>" name="<?php echo esc_attr($this->get_field_name('image')); ?>" type="text"  style="margin-bottom: 2px;" value="<?php echo esc_url($instance['image']); ?>" />
        <button class="sportshub_upload_image_button button button-primary"><?php esc_html_e( 'Upload Image', 'sportshub' ); ?></button>
          <p><?php esc_html_e( 'Recommended size 160x160', 'sportshub' ); ?></p>
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('name')); ?>">
        <?php esc_html_e( 'Name:' , 'sportshub' ); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('name')); ?>" name="<?php echo esc_attr($this->get_field_name('name')); ?>" type="text" value="<?php echo esc_attr($instance['name']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('feed_description')); ?>">
            <?php esc_html_e( 'Feed description:', 'sportshub'); ?></label>
        <textarea class="widefat" style="width: 100%; height:150px;" id="<?php echo esc_attr($this->get_field_id('feed_description')); ?>" name="<?php echo esc_attr($this->get_field_name('feed_description')); ?>"><?php echo esc_attr($instance['feed_description']); ?></textarea>
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>">
            <?php esc_html_e( 'Facebook Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_url($instance['facebook']); ?>" />
    </p>    
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('behance')); ?>">
            <?php esc_html_e( 'Behance Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('behance')); ?>" name="<?php echo esc_attr($this->get_field_name('behance')); ?>" type="text" value="<?php echo esc_url($instance['behance']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('vimeo')); ?>">
            <?php esc_html_e( 'Vimeo Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('vimeo')); ?>" name="<?php echo esc_attr($this->get_field_name('vimeo')); ?>" type="text" value="<?php echo esc_url($instance['vimeo']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>">
            <?php esc_html_e( 'Youtube Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" type="text" value="<?php echo esc_url($instance['youtube']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('tumblr')); ?>">
            <?php esc_html_e( 'tumblr Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" type="text" value="<?php echo esc_url($instance['tumblr']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>">
            <?php esc_html_e( 'Instagram Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_url($instance['instagram']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>">
            <?php esc_html_e( 'Linkedin Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_url($instance['linkedin']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>">
            <?php esc_html_e( 'Pinterest Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_url($instance['pinterest']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>">
            <?php esc_html_e( 'Twitter Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_url($instance['twitter']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('blogger')); ?>">
            <?php esc_html_e( 'Blogger Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('blogger')); ?>" name="<?php echo esc_attr($this->get_field_name('blogger')); ?>" type="text" value="<?php echo esc_url($instance['blogger']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('deviantart')); ?>">
            <?php esc_html_e( 'Deviantart Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('deviantart')); ?>" name="<?php echo esc_attr($this->get_field_name('deviantart')); ?>" type="text" value="<?php echo esc_url($instance['deviantart']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('dribble')); ?>">
            <?php esc_html_e( 'Dribble Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('dribble')); ?>" name="<?php echo esc_attr($this->get_field_name('dribble')); ?>" type="text" value="<?php echo esc_url($instance['dribble']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('stumbleupon')); ?>">
            <?php esc_html_e( 'Stumbleupon Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('stumbleupon')); ?>" name="<?php echo esc_attr($this->get_field_name('stumbleupon')); ?>" type="text" value="<?php echo esc_url($instance['stumbleupon']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('dropbox')); ?>">
            <?php esc_html_e( 'Dropbox Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('dropbox')); ?>" name="<?php echo esc_attr($this->get_field_name('dropbox')); ?>" type="text" value="<?php echo esc_url($instance['dropbox']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('rss')); ?>">
            <?php esc_html_e( 'RSS Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('rss')); ?>" name="<?php echo esc_attr($this->get_field_name('rss')); ?>" type="text" value="<?php echo esc_url($instance['rss']); ?>" />
    </p>

    <p>
        <label for="<?php echo esc_attr($this->get_field_id('skype')); ?>">
            <?php esc_html_e( 'Skype Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('skype')); ?>" name="<?php echo esc_attr($this->get_field_name('skype')); ?>" type="text" value="<?php echo esc_url($instance['skype']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('wordpress')); ?>">
            <?php esc_html_e( 'Wordpress Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('wordpress')); ?>" name="<?php echo esc_attr($this->get_field_name('wordpress')); ?>" type="text" value="<?php echo esc_url($instance['wordpress']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('yahoo')); ?>">
            <?php esc_html_e( 'Yahoo Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('yahoo')); ?>" name="<?php echo esc_attr($this->get_field_name('yahoo')); ?>" type="text" value="<?php echo esc_url($instance['yahoo']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('flickr')); ?>">
            <?php esc_html_e( 'Flickr Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('flickr')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr')); ?>" type="text" value="<?php echo esc_url($instance['flickr']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('sound_cloud')); ?>">
            <?php esc_html_e( 'Sound Cloud Url:' , 'sportshub' ); ?></label>
        <input class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('sound_cloud')); ?>" name="<?php echo esc_attr($this->get_field_name('sound_cloud')); ?>" type="text" value="<?php echo esc_url($instance['sound_cloud']); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'signing' )); ?>"><?php esc_html_e( 'Autograph Image:', 'sportshub' ); ?></label>
        <input class="widefat" width="100%" id="<?php echo esc_attr($this->get_field_id('signing')); ?>" name="<?php echo esc_attr($this->get_field_name('signing')); ?>" type="text"  style="margin-bottom: 2px;" value="<?php echo esc_url($instance['signing']); ?>" />
        <button class="sportshub_upload_image_button button button-primary"><?php esc_html_e( 'Upload Image', 'sportshub' ); ?></button>  
    </p>
    <?php

    
    }

}
?>