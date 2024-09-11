<?php
/**
 * @author  Themelazer
 * @since   1.0
 * @version 1.0
 * @package sportshub-function
 */
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit;
class sportshub_feature_link_marquee_category extends Widget_Base {
    public $base;
    public function get_name() {
        return 'sportshub-feature-link-marquee-category';
    }
    public function get_title() {
        return esc_html__( 'Featue Link Marquee category', 'sportshub' );
    }
    public function get_icon() { 
        return 'eicon-post-list';
    }
    public function get_categories() {
       return [ 'sportshub-elements' ];
    }
    protected function register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Post Query And Setting', 'sportshub'),
            ]
        );

        $this->add_control(
            'section_title', 
            [
                'label'       => esc_html__( 'Section Title', 'sportshub' ),
                'type'        =>Controls_Manager::TEXT,
                'label_block'   => true,
                'placeholder'    => esc_html__( 'Section text', 'sportshub' )        
            ]
        );
        $this->add_control(
            'section_title_html_tag',
            [
                'label'     =>esc_html__( 'Section Title Html Tag', 'sportshub' ),
                'description'=>esc_html__( 'Select Html title tag for this section title '),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => true,
                'toggle' => false,
                'default' => 'h3',
                'options' => array(
                    'h1' => [
                        'title' => esc_html__('H1', 'sportshub'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'sportshub'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'sportshub'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'sportshub'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'sportshub'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'sportshub'),
                        'icon' => 'eicon-editor-h6'
                    ],

                ),
                              
            ]
        );
        $this->add_control(
            'section_sub_title', 
            [
                'label'       => esc_html__( 'Section Sub Title', 'sportshub' ),
                'type'        =>Controls_Manager::TEXT,
                'label_block'   => true,
                'placeholder'    => esc_html__( 'Section Sub Title', 'sportshub' )        
            ]
        );
         $this->add_control(
            'feature_maquee_post_layout',
            [
                'label'     =>esc_html__( 'Feature Marquee Post Layout', 'sportshub' ),
                'description' =>esc_html__( 'Select Post Layout per page.', 'sportshub'),
                'type'      =>Controls_Manager::SELECT,
                'default'   => 'feature_maquee_post_layout1',
                'options'   => [
                        'feature_maquee_post_layout1'    =>esc_html__( 'Layout 1', 'sportshub' ),
                        'feature_maquee_post_layout2'    =>esc_html__( 'Layout 2', 'sportshub' ),
                        'feature_maquee_post_layout3'    =>esc_html__( 'Layout 3', 'sportshub' ),
                ],
            ]
        );
        $this->add_control(
            'post_count',
            [
                'label'         => esc_html__( 'Post count', 'sportshub' ),
                'description'   => esc_html__( 'Select number of posts per page (total posts to show).', 'sportshub'),
                'type' => Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'size' => 4,
                    ],   
            ]
        );
        $this->add_control(
            'post_cats',
            [
                'label' =>esc_html__('Select Categories', 'sportshub'),
                'type'      => Controls_Manager::SELECT2,
                 'options'   => $this->post_category(),
                'label_block' => true,
                'multiple'  => true,
            ]
        );        
        $this->add_control(
            'thumbnail_size',
            [
                'label'     =>esc_html__( 'Post Thumbnail size', 'sportshub' ),
                'description'=>esc_html__( 'Select Thumbnail size for this block'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'sportshub_slider_grid_small',
                'options'   => [
                        'sportshub_slider_grid_small'  =>esc_html__( 'sportshub Slider Small Grid', 'sportshub' ),
                        'sportshub_justify_feature'    =>esc_html__( 'sportshub Justify Feature', 'sportshub' ),
                        'sportshub_small_feature'      =>esc_html__( 'sportshub Small Feature', 'sportshub' ),
                        'sportshub_large_slider_image' =>esc_html__( 'sportshub Large Slider', 'sportshub'),
                        'sportshub_slider_grid_large'  =>esc_html__( 'sportshub Slider Grid Large', 'sportshub'),
                        'sportshub_list_post_large'    =>esc_html__( 'sportshub Large Post List',  'sportshub'),
                        'sportshub_list_large'         =>esc_html__( 'sportshub List large', 'sportshub'),
                        'sportshub_carousel'           =>esc_html__( 'sportshub Carousel', 'sportshub'),
                        'sportshub_marsonry'           =>esc_html__( 'sportshub Masonry', 'sportshub'),
                        'sportshub_feature_link_list'  =>esc_html__( 'sportshub Feature Link List', 'sportshub'),
                    ],
            ]
        );        
        $this->add_control(
            'marquee_style',
            [
                'label' => esc_html__('Marquee style', 'sportshub'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Left', 'sportshub'),
                'label_off' => esc_html__('Right', 'sportshub'),
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_meta',
            [
                'label' => esc_html__('Show Meta', 'sportshub'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'sportshub'),
                'label_off' => esc_html__('No', 'sportshub'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_cat',
            [
                'label' => esc_html__('Show Category', 'sportshub'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'sportshub'),
                'label_off' => esc_html__('No', 'sportshub'),
                'default' => 'yes',
            ]
        );
      
        $this->add_control(
            'post_sortby',
            [
                'label'     =>esc_html__( 'Post sort by', 'sportshub' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'latestpost',
                'options'   => [
                        'latestpost'      =>esc_html__( 'Latest posts', 'sportshub' ),
                        'popularposts'    =>esc_html__( 'Popular posts', 'sportshub' ),
                        'mostdiscussed'    =>esc_html__( 'Most discussed', 'sportshub' ),
                    ],
            ]
        );
         $this->add_control(
            'post_order',
            [
                'label'     =>esc_html__( 'Post order', 'sportshub' ),
                'type'      => Controls_Manager::CHOOSE,
                'default'   => 'DESC',
                'options'   => [
                        'DESC'      =>['title' => esc_html__( 'Descending', 'sportshub' ),
                                       'icon' => 'eicon-arrow-down',],
                        'ASC'       =>['title' => esc_html__( 'Ascending', 'sportshub' ),
                                       'icon' => 'eicon-arrow-up',],
                    ],
            ]
        );

        $this->add_control(
         'offset_enable',
            [
               'label' => esc_html__('Post skip', 'sportshub'),
               'description'   => esc_html__( 'Select number of posts to pass over. Leave blank or set 0 if you want to show at the beginning.', 'sportshub'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => esc_html__('Yes', 'sportshub'),
               'label_off' => esc_html__('No', 'sportshub'),
               'default' => 'no',
               
            ]
        );
        $this->add_control(
            'offset_item_num',
            [
                'condition' => [ 'offset_enable' => 'yes' ],
                'label' => __('Skip Post count', 'sportshub'),
                        'type' => Controls_Manager::SLIDER,
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'default' => [
                            'size' => 1,
                        ],
            ]
        );

        $this->end_controls_section();

        //Title Style Section
        $this->start_controls_section(
            'section_v_list_style', 
            [
                'label'  => esc_html__( 'Post Custom Style', 'sportshub' ),
                'tab'     => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'post_section_title',
            [
                'label'     =>esc_html__( 'Section Title Style', 'sportshub' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'title_layout1',
                'options'   => [
                        'title_layout1'    =>esc_html__( 'Title Style 1', 'sportshub' ),
                        'title_layout2'    =>esc_html__( 'Title Style 2', 'sportshub' ),
                        'title_layout3'    =>esc_html__( 'Title Style 3', 'sportshub' ),
                        'title_layout4'    =>esc_html__( 'Title Style 4', 'sportshub' ),
                        'title_layout5'    =>esc_html__( 'Title Style 5', 'sportshub' ),
                        'title_layout6'    =>esc_html__( 'Title Style 6', 'sportshub' ),
                        'title_layout7'    =>esc_html__( 'Title Style 7', 'sportshub' ),
                        'title_layout8'    =>esc_html__( 'Title Style 8', 'sportshub' ),
                        'title_layout9'    =>esc_html__( 'Title Style 9', 'sportshub' ),
                        'title_layout10'   =>esc_html__( 'Title Style 10', 'sportshub' ),
                        'title_layout11'   =>esc_html__( 'Title Style 11', 'sportshub' ),
                        'title_layout12'   =>esc_html__( 'Title Style 12', 'sportshub' ),
                        'title_layout13'   =>esc_html__( 'Title Style 13', 'sportshub' ),
                        'title_layout14'   =>esc_html__( 'Title Style 14', 'sportshub' ),
                        'title_layout15'   =>esc_html__( 'Title Style 15', 'sportshub' ),
                        'title_layout16'   =>esc_html__( 'Title Style 16', 'sportshub' ),
                        'title_layout17'   =>esc_html__( 'Title Style 17', 'sportshub' ),
                    ],
            ]
        );
        $this->add_control(
            'title_color', [
                'label'    => esc_html__( 'Title Color', 'sportshub' ),
                'type'     => Controls_Manager::COLOR,
                'selectors'  => [
                    '{{WRAPPER}} .themelazer_title_head h3 ' => 'color: {{VALUE}};',
                    // Custom color title layout 1
                    '{{WRAPPER}} .themelazer_sec_title_layout_1 h1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_sec_title_layout_1 h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_sec_title_layout_1 h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_sec_title_layout_1 h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_sec_title_layout_1 h5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_sec_title_layout_1 h6' => 'color: {{VALUE}};',
                    // Custom color title layout 2
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h1 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h2 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h3 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h4 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h5 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h6 ' => 'color: {{VALUE}};',
                    // Custom color title layout 3  
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_3 h1 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_3 h2 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_3 h3 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_3 h4 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_3 h5 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_3 h6 ' => 'color: {{VALUE}};',
                    // Custom color title layout 4      
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h1 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h2 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h3 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h4 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h5 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h6 ' => 'color: {{VALUE}};',
                    // Custom color title layout 5
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h6' => 'color: {{VALUE}};',
                    // Custom color title layout 6
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h6' => 'color: {{VALUE}};',
                    // Custom color title layout 7
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h6' => 'color: {{VALUE}};',
                    // Custom color title layout 8
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h6' => 'color: {{VALUE}};',
                    // Custom color title layout 9
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h6' => 'color: {{VALUE}};',
                    // Custom color title layout 10
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_10 h1 ' => '-webkit-text-stroke: 1px {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_10 h2 ' => '-webkit-text-stroke: 1px {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_10 h3 ' => '-webkit-text-stroke: 1px {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_10 h4 ' => '-webkit-text-stroke: 1px {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_10 h5 ' => '-webkit-text-stroke: 1px {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_10 h6 ' => '-webkit-text-stroke: 1px {{VALUE}};',
                    // Custom color title layout 11
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h1' => 'color: {{VALUE}};',                    
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h3' => 'color: {{VALUE}};',     
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h4' => 'color: {{VALUE}};',     
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h5' => 'color: {{VALUE}};',     
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h6' => 'color: {{VALUE}};',          
                    // Custom color title layout 12
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h2' => 'color: {{VALUE}};',  
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h3' => 'color: {{VALUE}};',  
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h4' => 'color: {{VALUE}};',  
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h5' => 'color: {{VALUE}};',  
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h6' => 'color: {{VALUE}};',    
                    // Custom color title layout 13
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h1 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h2 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h3 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h4 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h5 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h6 ' => 'color: {{VALUE}};',
                    // Custom color title layout 14
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h1 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h2 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h3 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h4 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h5 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h6 ' => 'color: {{VALUE}};',
                    // Custom color title layout 15
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 h1 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 h2 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 h3 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 h4 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 h5 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 h6 ' => 'color: {{VALUE}};',
                    // Custom color title layout 16
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h1 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h2 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h3 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h4 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h5 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h6 ' => 'color: {{VALUE}};',
                    // Custom color title layout 17
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h1 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h2 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h3 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h4 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h5 ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h6 ' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_color_h', 
            [
                'label'    => esc_html__( 'Title Color Hover', 'sportshub' ),
                'type'     => Controls_Manager::COLOR,
                'selectors'  => [
                    '{{WRAPPER}} .themelazer_title_head h3:hover' => 'color: {{VALUE}};',
                    // Custom color title on hover layout 1
                    '{{WRAPPER}} .themelazer_sec_title_layout_1 h1:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_sec_title_layout_1 h2:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_sec_title_layout_1 h3:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_sec_title_layout_1 h4:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_sec_title_layout_1 h5:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_sec_title_layout_1 h6:hover' => 'color: {{VALUE}};',
                    // Custom color title on hover layout 2
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h1:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h2:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h3:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h4:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h5:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h6:hover ' => 'color: {{VALUE}};',
                    // Custom color title on hover layout 3
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_3 h1:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_3 h2:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_3 h3:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_3 h4:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_3 h5:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_3 h6:hover ' => 'color: {{VALUE}};',
                    // Custom color title on hover layout 4
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h1:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h2:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h3:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h4:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h5:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h6:hover ' => 'color: {{VALUE}};',
                    // Custom color title on hover layout 5
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h1:hover  ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h2:hover  ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h3:hover  ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h4:hover  ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h5:hover  ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h6:hover  ' => 'color: {{VALUE}};',
                    // Custom color title on hover layout 6
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h1:hover  ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h2:hover  ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h3:hover  ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h4:hover  ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h5:hover  ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h6:hover  ' => 'color: {{VALUE}};',
                    // Custom color title on hover layout 7
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h1:hover   ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h2:hover   ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h3:hover   ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h4:hover   ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h5:hover   ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h6:hover   ' => 'color: {{VALUE}};',
                    // Custom color title on hover layout 8
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h1:hover   ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h2:hover   ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h3:hover   ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h4:hover   ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h5:hover   ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h6:hover   ' => 'color: {{VALUE}};',
                    // Custom color title on hover layout 9
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h1:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h2:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h3:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h4:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h5:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h6:hover' => 'color: {{VALUE}};',
                    // Custom color title on hover layout 10
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_10 h1:hover ' => '-webkit-text-stroke: 1px {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_10 h2:hover ' => '-webkit-text-stroke: 1px {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_10 h3:hover ' => '-webkit-text-stroke: 1px {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_10 h4:hover ' => '-webkit-text-stroke: 1px {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_10 h5:hover ' => '-webkit-text-stroke: 1px {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_10 h6:hover ' => '-webkit-text-stroke: 1px {{VALUE}};',
                    // Custom color title on hover layout 11
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h1:hover' => 'color: {{VALUE}};',                    
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h2:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h3:hover' => 'color: {{VALUE}};',     
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h4:hover' => 'color: {{VALUE}};',     
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h5:hover' => 'color: {{VALUE}};',     
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h6:hover' => 'color: {{VALUE}};',       
                    // Custom color title on hover layout 12
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h1:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h2:hover' => 'color: {{VALUE}};',  
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h3:hover' => 'color: {{VALUE}};',  
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h4:hover' => 'color: {{VALUE}};',  
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h5:hover' => 'color: {{VALUE}};',  
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h6:hover' => 'color: {{VALUE}};',
                    // Custom color title on hover layout 13
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h1:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h2:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h3:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h4:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h5:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h6:hover ' => 'color: {{VALUE}};',
                    // Custom color title on hover layout 14
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h1:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h2:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h3:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h4:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h5:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h6:hover ' => 'color: {{VALUE}};',
                    // Custom color title on hover layout 15
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 h1:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 h2:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 h3:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 h4:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 h5:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 h6:hover ' => 'color: {{VALUE}};',
                    // Custom color title on hover layout 16
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h1:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h2:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h3:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h4:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h5:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h6:hover ' => 'color: {{VALUE}};',
                    // Custom color title layout 17
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h1:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h2:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h3:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h4:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h5:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h6:hover ' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h1:hover' => 'color: {{VALUE}};',
                    
                ],
            ]
        );  
        $this->add_control(
            'title_line_color', 
            [
                'label'    => esc_html__( 'Title Line Color', 'sportshub' ),
                'type'     => Controls_Manager::COLOR,
                'selectors'  => [
                    // Custom color line style layout1
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_1:after' => 'border-top: 1px solid {{VALUE}};',
                    // Custom color line style layout2
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h1:before ' => 'border-left: 1px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h1:after ' => 'border-right: 1px solid  {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h2:before ' => 'border-left: 1px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h2:after ' => 'border-right: 1px solid  {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h3:before ' => 'border-left: 1px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h3:after ' => 'border-right: 1px solid  {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h4:before ' => 'border-left: 1px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h4:after ' => 'border-right: 1px solid  {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h5:before ' => 'border-left: 1px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h5:after ' => 'border-right: 1px solid  {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h6:before ' => 'border-left: 1px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_title_head h6:after ' => 'border-right: 1px solid  {{VALUE}};',
                    // Custom color line style layout4
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h1:before' => 'border-bottom: 4px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h1:after' => 'border-bottom: 4px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h2:before' => 'border-bottom: 4px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h2:after' => 'border-bottom: 4px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h3:before' => 'border-bottom: 4px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h3:after' => 'border-bottom: 4px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h4:before' => 'border-bottom: 4px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h4:after' => 'border-bottom: 4px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h5:before' => 'border-bottom: 4px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h5:after' => 'border-bottom: 4px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h6:before' => 'border-bottom: 4px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_4 h6:after' => 'border-bottom: 4px solid {{VALUE}};',
                    // Custom color line style layout5
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h1:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h2:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h3:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h4:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h5:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_5 h6:before' => 'background-color: {{VALUE}};',
                    // Custom color line style layout6
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h1:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h2:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h3:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h4:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h5:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_6 h6:before' => 'background-color: {{VALUE}};',
                    // Custom color line style layout7
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h1:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h2:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h3:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h4:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h5:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_7 h6:before' => 'background: {{VALUE}};',
                    // Custom color line style layout8
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h1:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h2:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h3:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h4:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h5:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_8 h6:before' => 'background: {{VALUE}};',
                    // Custom color line style layout9
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h1:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h2:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h3:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h4:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h5:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_9 h6:before' => 'background-color: {{VALUE}};',
                    // Custom color line style layout11
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h1:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h2:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h3:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h4:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h5:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_11 h6:before' => 'background: {{VALUE}};',
                    // Custom color line style layout12
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h1:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h2:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h3:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h4:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h5:before' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_12 h6:before' => 'background: {{VALUE}};',
                    // Custom color line style layout13
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h1:after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h2:after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h3:after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h4:after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h5:after' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_13 h6:after' => 'background: {{VALUE}};',
                    // Custom color line style layout14
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h1' => 'border-bottom: 2px solid {{VALUE}}; border-top: 2px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h2' => 'border-bottom: 2px solid {{VALUE}}; border-top: 2px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h3' => 'border-bottom: 2px solid {{VALUE}}; border-top: 2px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h4' => 'border-bottom: 2px solid {{VALUE}}; border-top: 2px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h5' => 'border-bottom: 2px solid {{VALUE}}; border-top: 2px solid {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_14 h6' => 'border-bottom: 2px solid {{VALUE}}; border-top: 2px solid {{VALUE}};',
                    // Custom color line style layout15
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 .sportshub_first_character h1' => ' color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 .sportshub_first_character h2' => ' color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 .sportshub_first_character h3' => ' color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 .sportshub_first_character h4' => ' color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 .sportshub_first_character h5' => ' color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_15 .sportshub_first_character h6' => ' color: {{VALUE}};',
                    // Custom color line style layout16
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h1:after' => ' background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h2:after' => ' background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h3:after' => ' background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h4:after' => ' background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h5:after' => ' background: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_16 h6:after' => ' background: {{VALUE}};',
                    // Custom color line style layout17
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h1:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h2:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h3:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h4:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h5:before' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .themelazer_section_wrapper .themelazer_sec_title_layout_17 h6:before' => 'background-color: {{VALUE}};',
                ]
            ]
        );     
        $this->add_control(
            'title_subtitle_color', 
            [
                'label'    => esc_html__( 'Section Sub Title Color', 'sportshub' ),
                'type'     => Controls_Manager::COLOR,
                'selectors'  => [       
                    '{{WRAPPER}} .themelazer_section_wrapper p' => 'color: {{VALUE}};',
                ]
            ]
        );                
        // $this->add_control(
        //     'title_color', [

        //     'label'    => esc_html__( 'Title color', 'sportshub' ),
        //     'type'     => Controls_Manager::COLOR,
        //     'selectors'  => [

        //             '{{WRAPPER}} .bt-feature-content .slide_text_box h3 a' => 'color: {{VALUE}};',
        //     ],
        //     ]
        // );
        // $this->add_control(
        //     'title_color_h', [

        //         'label'    => esc_html__( 'Title color hover', 'sportshub' ),
        //         'type'     => Controls_Manager::COLOR,
        //         'selectors'  => [

        //             '{{WRAPPER}} .bt-feature-content .slide_text_box h3 a:hover' => 'color: {{VALUE}};',
        //         ],
        //     ]
        // );
        // $this->add_group_control(
        //     Group_Control_Typography::get_type(),
        //     [
        //         'name' => 'title_typography',
        //         'label' => esc_html__( 'Title Main Typography', 'sportshub' ),
                
                    
        //             'selector' => '{{WRAPPER}} .bt-feature-content .slide_text_box h3 a',
        //     ]
        // );

        // $this->add_group_control(
        //     Group_Control_Typography::get_type(),
        //     [
        //         'name' => 'title_typography_sm',
        //         'label' => esc_html__( 'Title Small Typography', 'sportshub' ),
                
                    
        //             'selector' => '{{WRAPPER}} .bt-feature-content.bt-feature-small .slide_text_box h3 a',
        //     ]
        // );
        $this->end_controls_section();
    }

    protected function render( ) { 
        $settings = $this->get_settings();
        $feature_maquee_post_layout = $settings['feature_maquee_post_layout'];
        $show_cat = $settings['show_cat'];
        $thumbnail_size = $settings['thumbnail_size'];
        $marquee_style = $settings['marquee_style'];
        $show_meta = $settings['show_meta'];
        $section_title_html_tag = $settings['section_title_html_tag'];
        $section_title    = $settings['section_title'];
        $section_sub_title = $settings['section_sub_title'];
        $post_section_title    = $settings['post_section_title'];
        $sticky = get_option( 'sticky_posts' );
        $arg = [
            'post_type'   =>  'post',
            'post_status' => 'publish',
            'order' => $settings['post_order'],
            'posts_per_page' => $settings['post_count']['size'],
            'category__in' => $settings['post_cats'],
            'ignore_sticky_posts' => 1,
        ];
        if($settings['offset_enable']=='yes') {
            $arg['offset'] = $settings['offset_item_num']['size']; 
        }
        switch($settings['post_sortby']){
            case 'mostdiscussed':
                $arg['orderby'] = 'comment_count';
            break;
            default:
                $arg['orderby'] = 'date';
            break;
        }
        $query = new \WP_Query( $arg ); ?>
        <?php if ( $query->have_posts() ) : 
            if($section_title !=''){
                if($post_section_title == 'title_layout1'){?> 
                        <div class="themelazer_section_wrapper">
                            <div class="themelazer_sec_title_layout_1">
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                            </div>
                            <p><?php echo esc_html($section_sub_title); ?></p>
                        </div>      
                <?php }else if($post_section_title == 'title_layout2'){?>
                        <div class="themelazer_section_wrapper">
                            <div class="themelazer_title_head">
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                            </div>
                            <p class="themelazer_sub_title"><?php echo esc_html($section_sub_title); ?></p>  
                        </div>    
                <?php }else if($post_section_title == 'title_layout3'){?>
                        <div class="themelazer_section_wrapper">
                            <div class="themelazer_sec_title_layout_3">
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            </div>
                        </div>      
                <?php }else if($post_section_title == 'title_layout4'){?>
                        <div class="themelazer_section_wrapper">
                            <div class="themelazer_sec_title_layout_4">
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            </div>
                        </div>     
                <?php }else if($post_section_title == 'title_layout5'){?>
                        <div class="themelazer_section_wrapper">
                            <div class="themelazer_sec_title_layout_5">
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            </div>
                        </div>         
                <?php }else if($post_section_title == 'title_layout6'){?>
                        <div class="themelazer_section_wrapper">
                            <div class="themelazer_sec_title_layout_6">
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            </div>
                        </div>     
                <?php }else if($post_section_title == 'title_layout7'){?>
                        <div class="themelazer_section_wrapper">
                            <div class="themelazer_sec_title_layout_7">
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            </div>
                        </div>       
                <?php }else if($post_section_title == 'title_layout8'){?>
                        <div class="themelazer_section_wrapper">
                            <div class="themelazer_sec_title_layout_8">
                                <p><?php echo esc_html($section_sub_title); ?></p>
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                            </div>
                        </div>      
                <?php }else if($post_section_title == 'title_layout9'){?>
                        <div class="themelazer_section_wrapper">
                            <div class="themelazer_sec_title_layout_9">
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                                <span class="style_layout_9"><?php echo esc_html__($section_title); ?></span>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                                
                            </div>
                        </div>           
                <?php }else if($post_section_title == 'title_layout10'){?>
                        <div class="themelazer_section_wrapper">
                            <div class="themelazer_sec_title_layout_10">
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            </div>
                        </div>      
                <?php }else if($post_section_title == 'title_layout11'){?>
                        <div class="themelazer_section_wrapper">
                            <div class="themelazer_sec_title_layout_11">
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            </div>
                        </div>             
                <?php }else if($post_section_title == 'title_layout12'){?>
                        <div class="themelazer_section_wrapper">
                            <div class="themelazer_sec_title_layout_12">
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            </div>
                        </div>             
                <?php }else if($post_section_title == 'title_layout13'){?>
                        <div class="themelazer_section_wrapper">
                            <div class="themelazer_sec_title_layout_13">
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            </div>
                        </div>       
                <?php }else if($post_section_title == 'title_layout14'){?>
                        <div class="themelazer_section_wrapper">
                            <div class="themelazer_sec_title_layout_14">
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            </div>
                        </div>
                <?php }else if($post_section_title == 'title_layout15'){ $sportshub_first_character = mb_substr($post_section_title, 0, 1) ?>
                        <div class="themelazer_section_wrapper">
                            <div class="themelazer_sec_title_layout_15">
                                <div class="sportshub_first_character"> 
                                    <?php echo '<'.$section_title_html_tag.'>'. esc_html($sportshub_first_character) . '</'.$section_title_html_tag.'>' ?>
                                </div>
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            </div>
                        </div>            
                <?php }else if($post_section_title == 'title_layout16'){ $sportshub_first_character = mb_substr($post_section_title, 0, 1) ?>
                        <div class="themelazer_section_wrapper">
                            <div class="themelazer_sec_title_layout_16">
                                <div class="sportshub_first_character"> 
                                    <?php echo '<'.$section_title_html_tag.'>'. esc_html($sportshub_first_character) . '</'.$section_title_html_tag.'>' ?>
                                </div>
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            </div>
                        </div>     
                <?php }else if($post_section_title == 'title_layout17'){?>
                        <div class="themelazer_section_wrapper">
                            <div class="themelazer_sec_title_layout_17">
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            </div>
                        </div>                                                                                                       
                <?php }
            }?>
            <?php if($feature_maquee_post_layout == 'feature_maquee_post_layout1'){?>
                <?php if($marquee_style == 'yes'){ ?>
                    <div class="themelazer_feature_link_marquee">
                        <div class="themelazer_top_list_in">
                            <?php $i = 0; while ($query->have_posts()) : $query->the_post(); $i++;?>
                                <?php
                                    $categories = get_the_category(get_the_ID());          
                                        if ($categories) {
                                            foreach( $categories as $tag) {
                                                $tag_link = get_category_link($tag->term_id);
                                                $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
                                        }
                                    }
                                ?>            
                                <div class="themelazer_bg_wrapper" style="background: <?php echo $title_bg_Color; ?>">
                                    <div class="themelazer_article_list">
                                        <div class="post-outer">
                                            <div class="post-inner">
                                                <div class="post-thumbnail
                                                    <?php 
                                                        if ($i % 2) {
                                                            echo 'radius_left';
                                                        } else {
                                                            echo 'radius_left';
                                                        }
                                                    ?>
                                                ">
                                                <?php if ( has_post_thumbnail()) {the_post_thumbnail('sportshub Feature Link List');} ?> 
                                                    <a href="<?php the_permalink(); ?>"></a>
                                                </div>
                                            </div>
                                            <div class="post-inner">
                                                <div class="entry-header">                    
                                                    <!-- <?php if(get_theme_mod('disable_post_category') !=1){
                                                        $categories = get_the_category(get_the_ID());          
                                                            if ($categories) {
                                                                echo '<div class="meta-info-text-color meta-info-bg-color">';
                                                                foreach( $categories as $tag) {
                                                                echo '<a class="post-category-color-text '.$tag->name.'" href="'.esc_url(get_category_link($tag->term_id)).'">'.$tag->name.'</a>';
                                                                }
                                                                echo "</div>";
                                                            }
                                                        }
                                                    ?> -->
                                                    <!-- <h2 class="entry-title">
                                                        <a href="<?php the_permalink(); ?>"title="<?php get_the_title();?>"tabindex="-1">
                                                            <?php the_title()?>
                                                        </a>
                                                    </h2> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                <?php }else{?>
                    <div class="themelazer_feature_link_marquee">
                        <div class="themelazer_top_list_out">
                            <?php $i = 0; while ($query->have_posts()) : $query->the_post(); $i++;?>
                                <?php
                                    $categories = get_the_category(get_the_ID());          
                                        if ($categories) {
                                            foreach( $categories as $tag) {
                                                $tag_link = get_category_link($tag->term_id);
                                                $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
                                        }
                                    }
                                ?>            
                                <div class="themelazer_bg_wrapper" style="background: <?php echo $title_bg_Color; ?>">
                                    <div class="themelazer_article_list">
                                        <div class="post-outer">
                                            <div class="post-inner">
                                                <div class="post-thumbnail
                                                    <?php 
                                                        if ($i % 2) {
                                                            echo 'radius_left';
                                                        } else {
                                                            echo 'radius_left';
                                                        }
                                                    ?>
                                                ">
                                                <?php if ( has_post_thumbnail()) {the_post_thumbnail('sportshub Feature Link List');} ?> 
                                                    <a href="<?php the_permalink(); ?>"></a>
                                                </div>
                                            </div>
                                            <div class="post-inner">
                                                <div class="entry-header">                    
                                                    <!-- <?php if(get_theme_mod('disable_post_category') !=1){
                                                        $categories = get_the_category(get_the_ID());          
                                                            if ($categories) {
                                                                echo '<div class="meta-info-text-color meta-info-bg-color">';
                                                                foreach( $categories as $tag) {
                                                                echo '<a class="post-category-color-text '.$tag->name.'" href="'.esc_url(get_category_link($tag->term_id)).'">'.$tag->name.'</a>';
                                                                }
                                                                echo "</div>";
                                                            }
                                                        }
                                                    ?> -->
                                                    <!-- <h2 class="entry-title">
                                                        <a href="<?php the_permalink(); ?>"title="<?php get_the_title();?>"tabindex="-1">
                                                            <?php the_title()?>
                                                        </a>
                                                    </h2> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                <?php } ; ?>
            <?php }elseif($feature_maquee_post_layout == 'feature_maquee_post_layout2'){?>
                <?php if($marquee_style == 'yes'){ ?>
                    <div class="themelazer_feature_link_marquee">
                        <div class="themelazer_top_list_in">
                            <?php $i = 0; while ($query->have_posts()) : $query->the_post(); $i++;?>
                                <?php
                                    $categories = get_the_category(get_the_ID());          
                                        if ($categories) {
                                            foreach( $categories as $tag) {
                                                $tag_link = get_category_link($tag->term_id);
                                                $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
                                        }
                                    }
                                ?>            
                                <div class="themelazer_bg_wrapper" style="background: <?php echo $title_bg_Color; ?>">
                                    <div class="themelazer_article_list">
                                        <div class="post-outer">
                                            <div class="post-inner">
                                                <div class="post-thumbnail
                                                    <?php if($i==1 || $i== 12){echo"rado";}if($i==2 || $i== 11){echo"rad";} 
                                                          if($i==3 || $i== 10){
                                                            echo"ra";
                                                          } 
                                                          if($i==4 || $i== 9){
                                                            echo"radodo";
                                                          } 
                                                          if($i==5 || $i== 8){
                                                            echo"radododod";
                                                          }  
                                                          if($i==6 || $i== 7){
                                                            echo"radius";
                                                          }   
                                                    ?>
                                                ">
                                                <?php if ( has_post_thumbnail()) {the_post_thumbnail('sportshub Feature Link List');} ?> 
                                                    <a href="<?php the_permalink(); ?>"></a>
                                                </div>
                                            </div>
                                            <div class="post-inner">
                                                <div class="entry-header">                    
                                                    <!-- <?php if(get_theme_mod('disable_post_category') !=1){
                                                        $categories = get_the_category(get_the_ID());          
                                                            if ($categories) {
                                                                echo '<div class="meta-info-text-color meta-info-bg-color">';
                                                                foreach( $categories as $tag) {
                                                                echo '<a class="post-category-color-text '.$tag->name.'" href="'.esc_url(get_category_link($tag->term_id)).'">'.$tag->name.'</a>';
                                                                }
                                                                echo "</div>";
                                                            }
                                                        }
                                                    ?> -->
                                                    <!-- <h2 class="entry-title">
                                                        <a href="<?php the_permalink(); ?>"title="<?php get_the_title();?>"tabindex="-1">
                                                            <?php the_title()?>
                                                        </a>
                                                    </h2> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                <?php }else{?>
                    <div class="themelazer_feature_link_marquee">
                        <div class="themelazer_top_list_out">
                            <?php $i = 0; while ($query->have_posts()) : $query->the_post(); $i++;?>
                                <?php
                                    $categories = get_the_category(get_the_ID());          
                                        if ($categories) {
                                            foreach( $categories as $tag) {
                                                $tag_link = get_category_link($tag->term_id);
                                                $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
                                        }
                                    }
                                ?>            
                                <div class="themelazer_bg_wrapper" style="background: <?php echo $title_bg_Color; ?>">
                                    <div class="themelazer_article_list">
                                        <div class="post-outer">
                                            <div class="post-inner">
                                                <div class="post-thumbnail
                                                    <?php if($i==1 || $i== 12){echo"rado";}if($i==2 || $i== 11){echo"rad";} 
                                                          if($i==3 || $i== 10){
                                                            echo"ra";
                                                          } 
                                                          if($i==4 || $i== 9){
                                                            echo"radodo";
                                                          } 
                                                          if($i==5 || $i== 8){
                                                            echo"radododod";
                                                          }  
                                                          if($i==6 || $i== 7){
                                                            echo"radius";
                                                          }   
                                                    ?>
                                                ">
                                                <?php if ( has_post_thumbnail()) {the_post_thumbnail('sportshub Feature Link List');} ?> 
                                                    <a href="<?php the_permalink(); ?>"></a>
                                                </div>
                                            </div>
                                            <div class="post-inner">
                                                <div class="entry-header">                    
                                                    <!-- <?php if(get_theme_mod('disable_post_category') !=1){
                                                        $categories = get_the_category(get_the_ID());          
                                                            if ($categories) {
                                                                echo '<div class="meta-info-text-color meta-info-bg-color">';
                                                                foreach( $categories as $tag) {
                                                                echo '<a class="post-category-color-text '.$tag->name.'" href="'.esc_url(get_category_link($tag->term_id)).'">'.$tag->name.'</a>';
                                                                }
                                                                echo "</div>";
                                                            }
                                                        }
                                                    ?> -->
                                                    <!-- <h2 class="entry-title">
                                                        <a href="<?php the_permalink(); ?>"title="<?php get_the_title();?>"tabindex="-1">
                                                            <?php the_title()?>
                                                        </a>
                                                    </h2> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } endif; ?>              
    <?php }
    protected function content_template() { }
    public function post_category() {
        $terms = get_terms( array(
                'taxonomy'    => 'category',
                'hide_empty'  => false,
                'posts_per_page' => -1, 
                'suppress_filters' => false,
        ) );
        $cat_list = [];
        foreach($terms as $post) {
            $cat_list[$post->term_id]  = [$post->name];
        }
        return $cat_list;
   }
}