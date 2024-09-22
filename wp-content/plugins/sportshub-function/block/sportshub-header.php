<?php

/**
 * @author  Themelazer
 * @since   1.0
 * @version 1.0
 * @package sportshub-function
 */

 namespace Elementor;
 if ( ! defined( 'ABSPATH' ) ) exit;
 
class sportshub_header extends Widget_Base {
    public $base;
    public function get_name() {
        return 'sportshub-header';
    }
    public function get_title() {
        return esc_html__( 'Sportshub Header', 'sportshub' );
    }
    public function get_icon() { 
        return ' eicon-heading';
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
                'default' => 'Sportshub Header',
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
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();
        $section_title_html_tag = $settings['section_title_html_tag'];
        $section_title    = $settings['section_title'];
        $section_sub_title = $settings['section_sub_title'];
        $post_section_title    = $settings['post_section_title'];
        
        if($section_title !=''){
            if($post_section_title == 'title_layout1'){?> 
                    <div class="themelazer_section_wrapper">
                        <div class="themelazer_sec_title_layout_1">
                            <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                        </div>
                        <?php if (!empty($section_sub_title)) : ?>
                        <p><?php echo esc_html($section_sub_title); ?></p>
                        <?php endif; ?>
                    </div>      
            <?php }else if($post_section_title == 'title_layout2'){?>
                    <div class="themelazer_section_wrapper">
                        <div class="themelazer_title_head">
                            <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                        </div>
                        <?php if (!empty($section_sub_title)) : ?>
                            <p><?php echo esc_html($section_sub_title); ?></p>
                        <?php endif; ?>
                    </div>    
            <?php }else if($post_section_title == 'title_layout3'){?>
                    <div class="themelazer_section_wrapper">
                        <div class="themelazer_sec_title_layout_3">
                             <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                             <?php if (!empty($section_sub_title)) : ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>      
            <?php }else if($post_section_title == 'title_layout4'){?>
                    <div class="themelazer_section_wrapper">
                        <div class="themelazer_sec_title_layout_4">
                             <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                             <?php if (!empty($section_sub_title)) : ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>     
            <?php }else if($post_section_title == 'title_layout5'){?>
                    <div class="themelazer_section_wrapper">
                        <div class="themelazer_sec_title_layout_5">
                             <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                             <?php if (!empty($section_sub_title)) : ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>         
            <?php }else if($post_section_title == 'title_layout6'){?>
                    <div class="themelazer_section_wrapper">
                        <div class="themelazer_sec_title_layout_6">
                             <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                             <?php if (!empty($section_sub_title)) : ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>     
            <?php }else if($post_section_title == 'title_layout7'){?>
                    <div class="themelazer_section_wrapper">
                        <div class="themelazer_sec_title_layout_7">
                             <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                             <?php if (!empty($section_sub_title)) : ?>
                                 <p><?php echo esc_html($section_sub_title); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>       
            <?php }else if($post_section_title == 'title_layout8'){?>
                    <div class="themelazer_section_wrapper">
                        <div class="themelazer_sec_title_layout_8">
                        <?php if (!empty($section_sub_title)) : ?>
                            <p><?php echo esc_html($section_sub_title); ?></p>
                        <?php endif; ?>
                            <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                        </div>
                    </div>      
            <?php }else if($post_section_title == 'title_layout9'){?>
                    <div class="themelazer_section_wrapper">
                        <div class="themelazer_sec_title_layout_9">
                            <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                            <span class="style_layout_9"><?php echo esc_html__($section_title); ?></span>
                            <?php if (!empty($section_sub_title)) : ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            <?php endif; ?>
                            
                        </div>
                    </div>           
            <?php }else if($post_section_title == 'title_layout10'){?>
                    <div class="themelazer_section_wrapper">
                        <div class="themelazer_sec_title_layout_10">
                            <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                            <?php if (!empty($section_sub_title)) : ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>      
            <?php }else if($post_section_title == 'title_layout11'){?>
                    <div class="themelazer_section_wrapper">
                        <div class="themelazer_sec_title_layout_11">
                            <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                            <?php if (!empty($section_sub_title)) : ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>             
            <?php }else if($post_section_title == 'title_layout12'){?>
                    <div class="themelazer_section_wrapper">
                        <div class="themelazer_sec_title_layout_12">
                            <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                            <?php if (!empty($section_sub_title)) : ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>             
            <?php }else if($post_section_title == 'title_layout13'){?>
                    <div class="themelazer_section_wrapper">
                        <div class="themelazer_sec_title_layout_13">
                            <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                            <?php if (!empty($section_sub_title)) : ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>       
            <?php }else if($post_section_title == 'title_layout14'){?>
                    <div class="themelazer_section_wrapper">
                        <div class="themelazer_sec_title_layout_14">
                            <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                            <?php if (!empty($section_sub_title)) : ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
            <?php }else if($post_section_title == 'title_layout15'){ $sportshub_first_character = mb_substr($post_section_title, 0, 1) ?>
                    <div class="themelazer_section_wrapper">
                        <div class="themelazer_sec_title_layout_15">
                            <div class="sportshub_first_character"> 
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($sportshub_first_character) . '</'.$section_title_html_tag.'>' ?>
                            </div>
                            <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                            <?php if (!empty($section_sub_title)) : ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>            
            <?php }else if($post_section_title == 'title_layout16'){ $sportshub_first_character = mb_substr($post_section_title, 0, 1) ?>
                    <div class="themelazer_section_wrapper">
                        <div class="themelazer_sec_title_layout_16">
                            <div class="sportshub_first_character"> 
                                <?php echo '<'.$section_title_html_tag.'>'. esc_html($sportshub_first_character) . '</'.$section_title_html_tag.'>' ?>
                            </div>
                            <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                            <?php if (!empty($section_sub_title)) : ?>
                                <p><?php echo esc_html($section_sub_title); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>     
            <?php }else if($post_section_title == 'title_layout17'){?>
                    <div class="themelazer_section_wrapper">
                        <div class="themelazer_sec_title_layout_17">
                            <?php echo '<'.$section_title_html_tag.'>'. esc_html($section_title) . '</'.$section_title_html_tag.'>' ?>
                            <?php if (!empty($section_sub_title)) : ?>
                                p><?php echo esc_html($section_sub_title); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>                                                                                                       
            <?php }
        }?>
    <?php }
    protected function content_template() {}  
}