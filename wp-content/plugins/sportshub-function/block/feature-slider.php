<?php

/**
 * @author  Themelazer
 * @since   1.0
 * @version 1.0
 * @package sportshub-function
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class sportshub_feature_slider extends Widget_Base {
    public $base;
    public function get_name() {
        return 'sportshub-feature-slider';
    }
    public function get_title() {
        return esc_html__( 'Feature Slider', 'sportshub' );
    }
    public function get_icon() { 
        return 'eicon-slider-push';
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
                        'size' => 3,
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
            'show_arrows',
            [
                'label' => esc_html__('Show Arrows', 'sportshub'),
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
                    'type' =>Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('yes', 'sportshub'),
                    'label_off' => esc_html__('no', 'sportshub'),
                    'default' => 'yes',
                ]
        );
        $this->add_control(
            'show_meta',
                [
                    'label' => esc_html__('Show Meta', 'sportshub'),
                    'type' =>Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('yes', 'sportshub'),
                    'label_off' => esc_html__('no', 'sportshub'),
                    'default' => 'yes',
                ]
        );
        $this->add_control(
            'show_author',
                [
                    'label' => esc_html__('Show Author', 'sportshub'),
                    'type' =>Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('yes', 'sportshub'),
                    'label_off' => esc_html__('no', 'sportshub'),
                    'default' => 'yes',
                ]
        );
        $this->add_control(
            'show_date',
                [
                    'label' => esc_html__('Show Date', 'sportshub'),
                    'type' =>Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('yes', 'sportshub'),
                    'label_off' => esc_html__('no', 'sportshub'),
                    'default' => 'yes',
                ]
        );
        $this->add_control(
            'show_postview',
                [
                    'label' => esc_html__('Show Post Views', 'sportshub'),
                    'type' =>Controls_Manager::SWITCHER,
                    'label_on' => esc_html__('yes', 'sportshub'),
                    'label_off' => esc_html__('no', 'sportshub'),
                    'default' => 'yes',
                ]
        );
        $this->add_control(
            'show_contents',
            [
                'label' => esc_html__('Show Contents', 'sportshub'),
                'type' =>Controls_Manager::SWITCHER,
                'label_on' => esc_html__('yes', 'sportshub'),
                'label_off' => esc_html__('no', 'sportshub'),
                'default' => 'yes',
            ]
        );
       
        $this->add_control(
          'count_words',
          [ 
            'condition' => [ 'show_contents' => 'yes' ],
            'label'         => esc_html__( 'Count Word', 'sportshub' ),
            'description'   => esc_html__( 'Select number of Words per Post (total words to show).', 'sportshub'),
            'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 80,
                    ],
                ],
                'default' => [
                    'size' => 14,
                ],   
          ]
        );
         $this->add_control(
            'show_readmore',
            [
                'label' => esc_html__('Show Read More', 'sportshub'),
                'type' =>Controls_Manager::SWITCHER,
                'label_on' => esc_html__('yes', 'sportshub'),
                'label_off' => esc_html__('no', 'sportshub'),
                'default' => 'yes',
            ]
        );
         $this->add_control(
            'read_more_text_input',
            [
                'label' => esc_html__( 'Read More Text', 'sportshub' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Read More', 'sportshub' ),
                'placeholder' => esc_html__( 'Type your text here', 'sportshub' ),
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
                                        'DESC'      =>['title' => esc_html__( 'descending', 'sportshub' ),
                                                    'icon' => 'fa fa-sort-amount-desc',],
                                        'ASC'       =>['title' => esc_html__( 'ascending', 'sportshub' ),
                                                    'icon' => 'fa fa-sort-amount-asc',],
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
            'section_v_list_style', [
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

        // $this->add_group_control(
        //     Group_Control_Typography::get_type(),
        //             [
        //                 'name' => 'title_typography',
        //                 'label' => esc_html__( 'Title Main Typography', 'sportshub' ),
                        
                            
        //                         'selector' => '{{WRAPPER}} .themelazer-feature-content .slide_text_box h3 a',
        //             ]
        // );

        // $this->add_group_control(
        //     Group_Control_Typography::get_type(),
        //             [
        //                 'name' => 'title_typography_sm',
        //                 'label' => esc_html__( 'Title Small Typography', 'sportshub' ),
                        
                            
        //                         'selector' => '{{WRAPPER}} .themelazer-feature-content.themelazer-feature-small .slide_text_box h3 a',
        //             ]
        // );
                
        $this->end_controls_section();
    }

    protected function render( ) { 
        $settings = $this->get_settings();
        $show_cat = $settings['show_cat'];
        $show_arrows = $settings['show_arrows'];
        $show_cat = $settings['show_cat'];
        $show_meta = $settings['show_meta'];
        $show_author = $settings['show_author'];
        $show_date = $settings['show_date'];
        $show_postview = $settings['show_postview'];
        $show_contents =$settings['show_contents'];
        $section_title_html_tag = $settings['section_title_html_tag'];
        $section_title    = $settings['section_title'];
        $section_sub_title = $settings['section_sub_title'];
        $post_section_title    = $settings['post_section_title'];
        $count_words = $settings['count_words']['size'];
        $show_readmore = $settings['show_readmore'];
        $read_more_text_input = $settings['read_more_text_input'];
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


                <div class="themelazer_feature_slider_wrapper">     
                    <?php if($show_arrows =='yes')
                        echo '<div class="themelazer-feature-slider themelazer_loading_before_slick_initialized" data-arrows="false" data-play="true" data-autospeed="8000" data-loop="true" data-dots="true" data-swipe="true" data-items="1" data-xs-items="1" data-sm-items="1" data-md-items="1" data-lg-items="2" data-xl-items="3">';
                    else 
                        echo '<div class="themelazer-feature-slider themelazer_loading_before_slick_initialized" data-arrows="false" data-play="true" data-autospeed="8000" data-loop="true" data-dots="false" data-swipe="true" data-items="1" data-xs-items="1" data-sm-items="1" data-md-items="1" data-lg-items="2" data-xl-items="3">';
                    ?>

                    <?php $i = 0; while ($query->have_posts()) : $query->the_post(); $i++;?>

                        <div class="themelazer_feature_slider_item">    
                            <div class="themelazer_feature_slider_content">
                                    <?php $feature_img_main = get_post_thumbnail_id();
                                        $feature_img_main_bg = wp_get_attachment_image_src( $feature_img_main, 'sportshub_feature_slider', true );
                                    if($feature_img_main){?>
                                        <div class="themelazer_item_img" style="background-image: url('<?php echo esc_url($feature_img_main_bg[0]); ?>')">
                                        </div>
                                            <?php }else{echo '<div class="themelazer_item_img"></div>';}?>
                                                <a href="<?php the_permalink(); ?>" class="themelazer_item_link" tabindex="-1"></a>
                                        
                                <div class="themelazer_content_area ">
                                            <!-- <?php if(get_theme_mod('disable_post_category') !=1){
                                                $categories = get_the_category(get_the_ID());          
                                                    if ($categories) {
                                                        if($show_cat=='yes'){
                                                            echo '<div class="themelazer_post_categories">';
                                                                foreach( $categories as $tag) {
                                                                        echo '<a '.$tag->name.'" href="'.esc_url(get_category_link($tag->term_id)).'">'.$tag->name.'</a>';
                                                                }
                                                            echo "</div>";
                                                        }
                                                    }
                                            }?> -->
                                            <?php if(get_theme_mod('disable_post_category') !=1){
                                                        $categories = get_the_category(get_the_ID());          
                                                        if ($categories) {
                                                            echo '<div class="themelazer_post_categories">';
                                                            foreach( $categories as $tag) {
                                                              $tag_link = get_category_link($tag->term_id);
                                                              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
                                                                echo '<a class="post-category-color-text" itemprop="articleSection" style="background:'.$title_bg_Color.'" href="'.esc_url($tag_link).'">'.$tag->name.'</a>';
                                                            }
                                                            echo "</div>";
                                                        }
                                            }?>
                
                                        <h3>
                                            <a href="<?php the_permalink(); ?>" tabindex="-1"><?php the_title()?></a>
                                        </h3>                        
                                        <?php 
                                        if($show_meta =='yes'){
                                            echo'<div class="meta-info"> <ul>';
                                                if( get_theme_mod('disable_post_author') !=1 && $show_author =='yes'){ echo '<li class="post-author">';
                                                        echo get_avatar(get_the_author_meta('ID'), 30);
                                                        echo the_author_posts_link();echo '</li>';
                                                } 
                                                if(get_theme_mod('disable_post_date') !=1 && $show_date =='yes'){ 
                                                    echo '<li class="post-date">'.get_the_date().'</li>';
                                                }
                                                if(get_theme_mod('disable_post_view') !=1 && $show_postview =='yes'){
                                                    echo '<li class="post-view">';                
                                                    echo sportshub_get_PostViews(get_the_ID()).' ';
                                                    esc_html_e('Views', 'sportshub');                
                                                    echo '</li>';
                                                    
                                                }
                                                echo'</ul></div>'; 

                                        }?>
                                        <p><?php if($show_contents=='yes'){ echo wp_trim_words( get_the_content(), $count_words, '...' );}?> 
                                        </p>
                                        <div class="footer-meta-info">                            
                                            <a class="themelazer_more_themelazern" href="<?php the_permalink(); ?>">
                                            <?php  if($show_readmore=='yes'){
                                                echo $settings['read_more_text_input'];
                                            }?>      
                                            </a>                            
                                        </div>
                                </div>
                            </div>        
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif;?>
    <?php }
    protected function content_template() {}
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