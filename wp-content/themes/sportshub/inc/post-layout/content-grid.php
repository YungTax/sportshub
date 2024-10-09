<div <?php post_class( 'col-md-6');?>>
     <div class=" blog-style-one blog-small-grid">
         <div class="single-blog-style-one">
            <div class="img-box <?php if ( has_post_thumbnail()){echo 'ghave_img';}else{echo 'gnone_img';}?>">
               <!-- <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail()) {the_post_thumbnail('sportshub_slider_grid_small');} ?></a> -->
               <?php
                // Check for the video_url custom field
                $video_post_link = get_post_meta(get_the_ID(), 'video_post_link', true);
                if ($video_post_link) :
                    // Extract the YouTube video ID
                    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video_post_link, $matches);
                    if ($matches) :
                        $video_id = $matches[1];
                ?>
                    <!-- Embed the YouTube video with autoplay and mute -->
                    <div class="featured-video">
                        <iframe width="560" height="315" 
                                src="https://www.youtube.com/embed/<?php echo esc_attr($video_id); ?>?autoplay=1&mute=1&modestbranding=1&rel=0&controls=1&showinfo=0" 
                                frameborder="0" 
                                allow="autoplay; encrypted-media" 
                                allowfullscreen>
                        </iframe>
                    </div>
                <?php else : ?>
                    <!-- Display the regular featured image if no video URL is found -->
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="featured-image">
                            <?php the_post_thumbnail('sportshub_list'); ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php else : ?>
                    <!-- Display the regular featured image if no video URL is found -->
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="featured-image">
                            <?php the_post_thumbnail('sportshub_list'); ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>                        
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
            <div class="text-box">
               <h3>
                  <a href="<?php the_permalink(); ?>" tabindex="-1"><?php the_title()?></a>
               </h3>
            <?php sportshub_singlepost_large(get_the_ID());?>
            <!-- <p><?php echo wp_trim_words( get_the_content(), 14, '...' );?> </p> -->
         </div>
      </div>
   </div>
</div>