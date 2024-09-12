<!DOCTYPE html>
<html <?php language_attributes(); ?>> <!-- Sets the language attributes for the HTML tag -->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>

    <title><?php echo wp_get_document_title(); ?></title>
    
    <meta name="description" content="<?php echo esc_attr(get_the_excerpt() ? get_the_excerpt() : 'Default site description here.'); ?>">
    <link rel="canonical" href="<?php echo esc_url(get_permalink()); ?>">
    <meta name="robots" content="index, follow">
    <meta name="Googlebot" content="index"/>
    <!-- Open Graph / Facebook -->
      
    <meta property="og:type" content="<?php echo is_single() ? 'article' : 'website'; ?>">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
    <meta property="og:title" content="<?php echo esc_attr(get_the_title()); ?>">
    <meta property="og:locale" content="en_US">
    <meta property="og:updated_time" content="<?php echo get_the_modified_time('c'); ?>">
    <meta property="og:description" content="<?php echo esc_attr(get_the_excerpt()); ?>">
    <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>">
    <?php if (has_post_thumbnail()) : ?>
    <meta property="og:image" content="<?php echo esc_url(get_the_post_thumbnail_url(null, 'large')); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <?php endif; ?>

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr(get_the_title()); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr(get_the_excerpt()); ?>">
    <?php if (has_post_thumbnail()) : ?>
    <meta name="twitter:image" content="<?php echo esc_url(get_the_post_thumbnail_url(null, 'large')); ?>">
    <?php endif; ?>

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo esc_attr(get_the_title()); ?>">
    <meta itemprop="description" content="<?php echo esc_attr(get_the_excerpt()); ?>">
    <?php if (has_post_thumbnail()) : ?>
    <meta itemprop="image" content="<?php echo esc_url(get_the_post_thumbnail_url(null, 'large')); ?>">
    <?php endif; ?>

    <?php wp_head(); ?>
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