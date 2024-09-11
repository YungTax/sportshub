<div class="single_header_wrapper">
   <?php if (get_theme_mod('disable_post_category') != 1) :
         $categories = get_the_category(get_the_ID());
         if ($categories) : ?>
            <div class="themelazer_post_categories">
               <?php foreach ($categories as $tag) :
                  $tag_link = get_category_link($tag->term_id);
                  $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
                  $title_reactions = get_term_meta($tag->term_id, "sportshub_cat_reactions", true);
                  if (!$title_reactions) : ?>
                     <a class="post-category-color-text" itemprop="articleSection" style="background:<?php echo esc_attr($title_bg_Color); ?>" href="<?php echo esc_url($tag_link); ?>"><?php echo $tag->name; ?></a>
               <?php endif;
               endforeach; ?>
            </div>
   <?php endif;
   endif; ?>
   <h1><?php the_title()?></h1>
   <div class="themelazer_excerpt_wrapper"><?php the_excerpt(); ?></div>
   <?php echo sportshub_singlepost_meta(get_the_ID()); ?>
</div>

<?php if (has_post_format('gallery')) : ?>
   <div class="themelazer_single_feature">
      <div class="justified-gallery-post">
         <?php $image_gallery_val = get_post_meta(get_the_ID(), 'gallery_post_format', true);
         if ($image_gallery_val !== "") :
            $image_gallery_array = explode(',', $image_gallery_val);
            if (isset($image_gallery_array) && count($image_gallery_array) != 0) :
               foreach ($image_gallery_array as $gimg_id) :
                     $the_image = wp_get_attachment_image_src($gimg_id, 'sportshub_justify_feature');
                     $the_caption = get_post_field('post_excerpt', $gimg_id); ?>
                     <a<?php if ($the_caption) {echo ' title="' . esc_attr($the_caption) . '"';}?> class="featured-thumbnail" href="<?php echo esc_url($the_image[0]); ?>">
                           <img<?php if ($the_caption) {echo ' alt="' . esc_attr($the_caption) . '"';}?> src="<?php echo esc_url($the_image[0]); ?>" />
                        <div class="background_over_image"></div>
                     </a>
               <?php endforeach;
            endif;
         endif; ?>
      </div>
   </div>
<?php elseif (has_post_format('quote')) : ?>
   <?php $slider_large_thumb_id = get_post_thumbnail_id();
   if ($slider_large_thumb_id) : ?>
      <div class="themelazer_single_feature">
         <div class="themelazer_full_post">
            <?php if (get_post_meta($post->ID, 'quote_post_title', true)) : ?>
               <?php $slider_large_image_header = wp_get_attachment_image_src($slider_large_thumb_id, 'sportshub_justify_feature', true); ?>
               <?php if ($slider_large_thumb_id) : ?>
                     <div class="themelazer_item_img" style="background-image: url('<?php echo esc_attr($slider_large_image_header[0]); ?>')"></div>
               <?php else : ?>
                     <div class="themelazer_item_img" style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/img/feature_img/header_carousel.jpg'); ?>')"></div>
               <?php endif; ?>
                     <div class="single_header_wrapper">
                        <blockquote>
                           <p>
                              <?php echo get_post_meta($post->ID, 'quote_post_title', true); ?>
                              <cite><?php echo get_post_meta($post->ID, 'quote_post_author', true); ?></cite>
                           </p>
                        </blockquote>
                     </div>
            <?php endif; ?>
         </div>
      </div>
   <?php endif;
elseif (has_post_format('video')) : ?>
   <div class="themelazer_single_feature">
      <?php
      $format_video_post = get_post_meta($post->ID, 'video_post_embed', true);
      $format_video_local = get_post_meta($post->ID, 'video_post_link', true);
      if ($format_video_post) :
         echo get_post_meta($post->ID, 'video_post_embed', true);
      else :
         echo do_shortcode('[video width="1280" height="720" mp4="' . esc_url($format_video_local) . '"][/video]');
      endif; ?>
   </div>
<?php elseif (has_post_format('audio')) : ?>
   <div class="themelazer_single_feature">
      <?php $audio_embed = get_post_meta($post->ID, 'auto_post_embed', true);
      if ($audio_embed != "") :
         echo get_post_meta($post->ID, 'auto_post_embed', true);
      else : ?>
         <?php $audio_url_host = get_post_meta($post->ID, 'auto_post_link', true);
         if (has_post_thumbnail()) {
            the_post_thumbnail('sportshub_justify_feature');
         }
         echo do_shortcode('[audio mp3="' . esc_url($audio_url_host) . '"][/audio]');
      endif; ?>
   </div>
<?php else : ?>
   <?php if (has_post_thumbnail()) : ?>
      <div class="themelazer_single_feature">
         <?php if (has_post_thumbnail()) {
            the_post_thumbnail('sportshub_justify_feature');
         } ?>
      </div>
   <?php endif; ?>
<?php endif; ?>
