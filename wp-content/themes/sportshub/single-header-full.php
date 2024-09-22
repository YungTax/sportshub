<div class="themelazer_full_post">
  
    <?php
    // Get the ID of the featured image for the post
    $feature_img_main = get_post_thumbnail_id();

    // Get the URL of the featured image in the 'sportshub_large_slider_image' size
    $feature_img_main_bg = wp_get_attachment_image_src($feature_img_main, 'sportshub_large_slider_image', true);

    // If there's a featured image, display it as background
    if ($feature_img_main) {
    ?>
        <div class="themelazer_item_img" style="background-image: url('<?php echo esc_url($feature_img_main_bg[0]); ?>')"></div>
    <?php
    } else {
        // Otherwise, display an empty div
        echo '<div class="themelazer_item_img"></div>';
    }
    ?>

    <div class="single_header_wrapper">
        <?php
        // Check if post categories are enabled
        if (get_theme_mod('disable_post_category') != 1) {
            // Get the categories for the post
            $categories = get_the_category(get_the_ID());

            // If there are categories, display them
            if ($categories) {
                echo '<div class="themelazer_post_categories">';
                foreach ($categories as $tag) {
                    $tag_link = get_category_link($tag->term_id);
                    $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
                    echo '<a class="post-category-color-text" itemprop="articleSection" style="background:' . $title_bg_Color . '" href="' . esc_url($tag_link) . '">' . $tag->name . '</a>';
                }
                echo "</div>";
            }
        }
        ?>
        <h1><?php the_title() ?></h1>
        <?php echo sportshub_singlepost_meta(get_the_ID()); ?>
    </div>
</div>
