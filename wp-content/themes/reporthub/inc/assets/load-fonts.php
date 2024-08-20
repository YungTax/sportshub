<?php
    function reporthub_fonts() {
        $title_style_text = get_theme_mod('reporthub_title_font_family', 'Work Sans');
        $reporthub_title_font_weight = get_theme_mod('reporthub_title_font_weight', '700');
        $paragrap_style_text = get_theme_mod('reporthub_p_font_family', 'Roboto');
        $reporthub_p_font_weight = get_theme_mod('reporthub_p_font_weight', '400');
        $menu_font_style = get_theme_mod('reporthub_menu_font_family', 'Roboto');
        $reporthub_menu_font_weight = get_theme_mod('reporthub_menu_font_weight', '600');
        $reporthub_sub_menu_font_weight = ',' . get_theme_mod('reporthub_sub_menu_font_weight', '600');
        $subsets  = 'latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese';
        $google_font = add_query_arg(
            array(
                'family' => urlencode($title_style_text . ':' . $reporthub_title_font_weight . '|' . $paragrap_style_text . ':' . $reporthub_p_font_weight . '|' . $menu_font_style . ':' . $reporthub_menu_font_weight . $reporthub_sub_menu_font_weight),
                'subset' => urlencode($subsets),
            ),
            '//fonts.googleapis.com/css'
        );

        return esc_url_raw($google_font);
    }

    function reporthub_font_scripts() {
        wp_enqueue_style('reporthub_fonts_url', reporthub_fonts(), array(), '1.6');
    }

    add_action('wp_enqueue_scripts', 'reporthub_font_scripts');

?>