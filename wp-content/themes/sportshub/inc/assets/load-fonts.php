<?php
    function sportshub_fonts() {
        $title_style_text = get_theme_mod('sportshub_title_font_family', 'Work Sans');
        $sportshub_title_font_weight = get_theme_mod('sportshub_title_font_weight', '700');
        $paragrap_style_text = get_theme_mod('sportshub_p_font_family', 'Roboto');
        $sportshub_p_font_weight = get_theme_mod('sportshub_p_font_weight', '400');
        $menu_font_style = get_theme_mod('sportshub_menu_font_family', 'Roboto');
        $sportshub_menu_font_weight = get_theme_mod('sportshub_menu_font_weight', '600');
        $sportshub_sub_menu_font_weight = ',' . get_theme_mod('sportshub_sub_menu_font_weight', '600');
        $subsets  = 'latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese';
        $google_font = add_query_arg(
            array(
                'family' => urlencode($title_style_text . ':' . $sportshub_title_font_weight . '|' . $paragrap_style_text . ':' . $sportshub_p_font_weight . '|' . $menu_font_style . ':' . $sportshub_menu_font_weight . $sportshub_sub_menu_font_weight),
                'subset' => urlencode($subsets),
            ),
            '//fonts.googleapis.com/css'
        );

        return esc_url_raw($google_font);
    }

    function sportshub_font_scripts() {
        wp_enqueue_style('sportshub_fonts_url', sportshub_fonts(), array(), '1.6');
    }

    add_action('wp_enqueue_scripts', 'sportshub_font_scripts');

?>