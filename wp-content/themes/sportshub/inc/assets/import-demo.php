<?php
//import demo
function sportshub_import_files() {
    return array(
        array(
                'import_file_name'             => 'sportshub Demo(Full Content)',
                'local_import_file'            => trailingslashit( get_template_directory() ).'demo/sportshub-demo/sportshub.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ).'demo/sportshub-demo/sportshub.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ).'demo/sportshub-demo/sportshub.dat',
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'demo/sportshub-demo/demo.png',
                'preview_url'                  => 'https://themelazer.com/theme/fortun/demo/sportshub',
                'import_notice'                => esc_html__('After you import this demo, you will have setup all content.', 'sportshub')                               
            ),
        array(
                'import_file_name'             => 'sportshub Demo(Option Only)',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ).'demo/sportshub-demo/sportshub.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ).'demo/sportshub-demo/sportshub.dat',
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'demo/sportshub-demo/demo.png',
                'preview_url'                  => 'https://themelazer.com/theme/fortun/demo/sportshub',
                'import_notice'                => esc_html__('After you import this demo, you will have setup all content.', 'sportshub')                         
            )
    );
}   
add_filter( 'pt-ocdi/import_files', 'sportshub_import_files' );

/**
 * sportshub_before_widgets_import
 * @param $selected_import
 */ 
function sportshub_before_widgets_import($selected_import)
{
    // Remove 'Hello World!' default WordPress post
    wp_delete_post(1, true);
    // Remove 'Sample page'  default WordPress page
    wp_delete_post(2, true);
    $sidebars_widgets = get_option('sidebars_widgets');
    $sidebars_widgets['general-sidebar'] = array();
    $sidebars_widgets['instagram-sidebar'] = array();
    update_option('sidebars_widgets', $sidebars_widgets);
}
add_action('pt-ocdi/before_widgets_import', 'sportshub_before_widgets_import');

/**
 * [ocdi_after_import_setup description]q
 * @return [type] [description]
 */
function sportshub_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', esc_html__('Main Menu', 'sportshub'), 'nav_menu' );
    $footer_menu = get_term_by( 'name', esc_html__('Footer menu', 'sportshub'), 'nav_menu' );
    $side_Menu = get_term_by( 'name', esc_html__('Side menu', 'sportshub'), 'nav_menu');
    set_theme_mod( 'nav_menu_locations', array(
            'Main_Menu' => $main_menu->term_id,
            'Footer_Menu' => $footer_menu->term_id,
            'Side_Menu' => $side_Menu->term_id
        )
    );
    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
    
}
add_action( 'pt-ocdi/after_import', 'sportshub_after_import_setup' );

?>