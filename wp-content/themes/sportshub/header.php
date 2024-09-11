<!DOCTYPE html>
<html class="ie ie9" <?php language_attributes(); ?>> <!-- Declares the document type and sets IE-specific classes and language attributes -->
<html <?php language_attributes(); ?>> <!-- Sets the language attributes for the HTML tag -->
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>"> <!-- Specifies the character encoding for the document -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Ensures compatibility with IE rendering engine -->
      <meta name="viewport" content="width=device-width, initial-scale=1" /> <!-- Sets the viewport to ensure proper scaling on mobile devices -->
      <meta property="og:title" content="<?php echo get_the_title(); ?>" />
      <meta property="og:description" content="<?php echo get_the_excerpt(); ?>" />
      <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>" />
      <meta property="og:url" content="<?php echo get_permalink(); ?>" />
      <?php wp_head(); ?> <!-- Hook for WordPress to insert scripts, styles, and other elements into the head section -->
   </head>

   <!-- Progress bar wrapper (commented out) -->
   <!--
   <div class="themelazer_progress_bar_wrapper">
      <div class="themelazer_progress_bar" id="progress_bar_active"></div>
   </div>
   -->

   <body <?php body_class(); ?>> <!-- Adds classes to the body element for easier styling based on the current page, post, or other conditions -->
      <!-- Scroll indicator element -->
      <div class="themelazer_scroll">
         <p class="themelazer_scroll_body">
            <span class="themelazer_scroll_text"><?php esc_html_e('SCROLL' , 'sportshub'); ?></span> <!-- Localized text for 'SCROLL' -->
            <span class="themelazer_scroll_line"></span> <!-- Line element for the scroll indicator -->
         </p>
      </div>

      <!-- Main wrapper with conditional classes based on theme settings -->
      <div class="themelazer_main_wrapper 
            <?php 
            if (get_theme_mod('category_layout_design') == 'category_layout_2') {
               echo 'themelazer_cat_s1'; // Adds a class if the category layout design is set to 'category_layout_2'
            } else {
               echo 'fdasfasf'; // Adds a different class otherwise
            }
            ?> 
            <?php 
            if(get_theme_mod('en_border_radius') == 1) {
               echo 'themelazer_en_radius'; // Adds a class if border radius is enabled in theme settings
            } 
            ?>
      ">

      <?php wp_body_open(); ?> <!-- WordPress hook for adding elements right after the opening body tag -->
      <?php get_template_part('header-layout'); ?> <!-- Includes the header layout template part -->