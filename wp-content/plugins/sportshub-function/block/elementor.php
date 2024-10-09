<?php

/**
 * @author  Themelazer
 * @since   1.0
 * @version 1.0
 * @package sportshub-function
 */

if ( ! defined( 'ABSPATH' ) ) exit;
  if(defined('ELEMENTOR_VERSION')):
  class sportshub_Shortcode{	
      public static $_instance;
      public $localize_data = array();
    	public function __construct(){
      		    add_action( 'elementor/init', array($this, 'sportshub_elementor_init'));
              add_action( 'elementor/widgets/register', array($this, 'sportshub_shortcode_elements'));
              add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'editor_enqueue_styles' ) );
              add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
              add_action( 'elementor/preview/enqueue_styles', array( $this, 'preview_enqueue_scripts' ) );     
    	} 
      public function enqueue_scripts() {}
      public function editor_enqueue_styles() {}
      public function preview_enqueue_scripts() {}
      public function sportshub_elementor_init(){\Elementor\Plugin::$instance->elements_manager->add_category(
            'sportshub-elements',
            [
                'title' =>esc_html__( 'sportshub Elements', 'sportshub' ),
                'icon' => 'fa fa-plug',
            ],
            1
          );
      }
      public function sportshub_shortcode_elements($widgets_manager){ 
            require_once 'sportshub-header.php';
            $widgets_manager->register(new Elementor\sportshub_header());
            require_once 'slider.php';
            $widgets_manager->register(new Elementor\sportshub_slider());
            require_once 'slider-center.php';
            $widgets_manager->register(new Elementor\sportshub_slider_center());  
            require_once 'grid-post.php';
            $widgets_manager->register(new Elementor\sportshub_grid_post());
            require_once 'list-post.php';
            $widgets_manager->register(new Elementor\sportshub_list_post());
            require_once 'large-list-post.php';
            $widgets_manager->register(new Elementor\sportshub_large_list_post());
            require_once 'small-list-post.php';
            $widgets_manager->register(new Elementor\sportshub_small_list());
            require_once 'carousel.php';
            $widgets_manager->register(new Elementor\sportshub_carousel());
            require_once 'carousel-z.php';
            $widgets_manager->register(new Elementor\sportshub_carousel_z());
            require_once 'link-list-post.php';
            $widgets_manager->register(new Elementor\sportshub_link_list_post());
            require_once 'feature-link-list.php';
            $widgets_manager->register(new Elementor\sportshub_feature_link_list_post());
            require_once 'feature-link-marquee.php';
            $widgets_manager->register(new Elementor\sportshub_feature_link_marquee_post());
            require_once 'feature-link-marquee-category.php';
            $widgets_manager->register(new Elementor\sportshub_feature_link_marquee_category());
            require_once 'promo-box.php';
            $widgets_manager->register(new Elementor\sportshub_promo_box());
            require_once 'large_grid.php';
            $widgets_manager->register(new Elementor\sportshub_large_grid_post());  
            require_once 'feature_list.php';
            $widgets_manager->register(new Elementor\sportshub_feature_list());
            require_once 'feature-slider.php';
            $widgets_manager->register(new Elementor\sportshub_feature_slider());
            require_once 'feature_list_z.php';
            $widgets_manager->register(new Elementor\sportshub_feature_list_z());
            require_once 'feature-card-post.php';
            $widgets_manager->register(new Elementor\sportshub_feature_card_post());
            require_once 'feature-gird.php';
            $widgets_manager->register(new Elementor\sportshub_feature_grid());
            
            
      }
    	public static function sportshub_get_instance() {
            if (!isset(self::$_instance)) {
                self::$_instance = new sportshub_Shortcode();
            }
            return self::$_instance;
      }
  }
  $sportshub_Shortcode = sportshub_Shortcode::sportshub_get_instance();
endif;