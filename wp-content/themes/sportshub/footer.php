<!-- Start footer -->
<?php if (is_active_sidebar('instagram-sidebar')) : ?>
      <div class="footer_insta">
                  <?php  if (is_active_sidebar('instagram-sidebar')) : dynamic_sidebar('instagram-sidebar'); endif; ?> 
      </div>
<?php endif; ?>
<div class="clearfix"></div>
<div class="theme_lazerfooter_widget_area <?php if (is_active_sidebar('footer1-sidebar') || is_active_sidebar('footer2-sidebar') || is_active_sidebar('footer3-sidebar') || is_active_sidebar('footer4-sidebar')) {echo ' theme_lazerfooter_active';}else{echo ' theme_lazerfooter_noactive';}?>">
      <?php if(get_theme_mod('footer_columns') == 'footer0col') {}else{?>
         <div class="container">
            <div class="row">
               <?php if(get_theme_mod('footer_columns') == 'footer1col' ){?>
                  <div class="col-md-12">
                     <?php if (is_active_sidebar('footer1-sidebar')) : dynamic_sidebar('footer1-sidebar'); endif; ?>
                  </div>
                  <?php }elseif(get_theme_mod('footer_columns') == 'footer2col' ){?>
                  <div class="col-md-6">
                     <?php if (is_active_sidebar('footer1-sidebar')) : dynamic_sidebar('footer1-sidebar'); endif; ?>
                  </div>
                  <div class="col-md-6">
                     <?php if (is_active_sidebar('footer2-sidebar')) : dynamic_sidebar('footer2-sidebar'); endif; ?>
                  </div>
                  <!-- column 3 -->
                  <?php }elseif(get_theme_mod('footer_columns') == 'footer3col' ){?>
                  <div class="col-md-4">
                     <?php if (is_active_sidebar('footer1-sidebar')) : dynamic_sidebar('footer1-sidebar'); endif; ?>
                  </div>
                  <div class="col-md-4">
                     <?php if (is_active_sidebar('footer2-sidebar')) : dynamic_sidebar('footer2-sidebar'); endif; ?>
                  </div>
                  <div class="col-md-4">
                     <?php if (is_active_sidebar('footer3-sidebar')) : dynamic_sidebar('footer3-sidebar'); endif; ?>
                  </div>
                  <!-- column 4 -->
                  <?php }elseif(get_theme_mod('footer_columns') == 'footer4col' ){?>
                  <div class="col-12 col-md-6  col-sm-12 col-lg-3">
                     <?php if (is_active_sidebar('footer1-sidebar')) : dynamic_sidebar('footer1-sidebar'); endif; ?>
                  </div>
                  <div class="col-12 col-md-6 col-sm-12 col-lg-3">
                     <?php if (is_active_sidebar('footer2-sidebar')) : dynamic_sidebar('footer2-sidebar'); endif; ?>
                  </div>
                  <div class="col-12 col-md-6 col-sm-12 col-lg-3">
                     <?php if (is_active_sidebar('footer3-sidebar')) : dynamic_sidebar('footer3-sidebar'); endif; ?>
                  </div>
                  <div class="col-12 col-md-6 col-sm-12 col-lg-3">
                     <?php if (is_active_sidebar('footer4-sidebar')) : dynamic_sidebar('footer4-sidebar'); endif; ?>
                  </div>
                  <?php }elseif(get_theme_mod('footer_columns') == 'footer4cola' ){?>
                  <div class="col-md-2">
                     <?php if (is_active_sidebar('footer1-sidebar')) : dynamic_sidebar('footer1-sidebar'); endif; ?>
                  </div>
                  <div class="col-md-2">
                     <?php if (is_active_sidebar('footer2-sidebar')) : dynamic_sidebar('footer2-sidebar'); endif; ?>
                  </div>
                  <div class="col-md-4">
                     <?php if (is_active_sidebar('footer3-sidebar')) : dynamic_sidebar('footer3-sidebar'); endif; ?>
                  </div>
                  <div class="col-md-4">
                     <?php if (is_active_sidebar('footer4-sidebar')) : dynamic_sidebar('footer4-sidebar'); endif; ?>
                  </div>
                  <?php }elseif(get_theme_mod('footer_columns') == 'footer5col' ){?>
                  <div class="col-md-2">
                     <?php if (is_active_sidebar('footer1-sidebar')) : dynamic_sidebar('footer1-sidebar'); endif; ?>
                  </div>
                  <div class="col-md-2">
                     <?php if (is_active_sidebar('footer2-sidebar')) : dynamic_sidebar('footer2-sidebar'); endif; ?>
                  </div>
                  <div class="col-md-2">
                     <?php if (is_active_sidebar('footer3-sidebar')) : dynamic_sidebar('footer3-sidebar'); endif; ?>
                  </div>
                  <div class="col-md-2">
                     <?php if (is_active_sidebar('footer4-sidebar')) : dynamic_sidebar('footer4-sidebar'); endif; ?>
                  </div>
                  <div class="col-md-4">
                     <?php if (is_active_sidebar('footer5-sidebar')) : dynamic_sidebar('footer5-sidebar'); endif; ?>
                  </div>
                  <?php }elseif(get_theme_mod('footer_columns') == 'footer5cola' ){?>
                  <div class="col-md-4">
                     <?php if (is_active_sidebar('footer1-sidebar')) : dynamic_sidebar('footer1-sidebar'); endif; ?>
                  </div>
                  <div class="col-md-2">
                     <?php if (is_active_sidebar('footer2-sidebar')) : dynamic_sidebar('footer2-sidebar'); endif; ?>
                  </div>
                  <div class="col-md-2">
                     <?php if (is_active_sidebar('footer3-sidebar')) : dynamic_sidebar('footer3-sidebar'); endif; ?>
                  </div>
                  <div class="col-md-2">
                     <?php if (is_active_sidebar('footer4-sidebar')) : dynamic_sidebar('footer4-sidebar'); endif; ?>
                  </div>
                  <div class="col-md-2">
                     <?php if (is_active_sidebar('footer5-sidebar')) : dynamic_sidebar('footer5-sidebar'); endif; ?>
                  </div>
                  <?php }else{?>
                  <div class="col-md-4">
                     <?php if (is_active_sidebar('footer1-sidebar')) : dynamic_sidebar('footer1-sidebar'); endif; ?>
                  </div>
                  <div class="col-md-4">
                     <?php if (is_active_sidebar('footer2-sidebar')) : dynamic_sidebar('footer2-sidebar'); endif; ?>
                  </div>
                  <div class="col-md-4">
                     <?php if (is_active_sidebar('footer3-sidebar')) : dynamic_sidebar('footer3-sidebar'); endif; ?>
                  </div>
               <?php }?>
            </div>
         </div>
      </div>
   <?php }?>
   <footer class="footer-area">
      <div class="themelazer_footer_widget_area">
         <div class="container">
            <div class="row-centered">       
               <div class="col-md-4">
                  <div class="themelazer_footer_menu">  
                  <?php
                     $footer_menu_args = array(
                        'theme_location' => 'Footer_Menu', // Should match the registered location
                        'depth' => 1,
                        'container' => false,
                        'menu_class' => 'themelazer_footer_menu',
                        'menu_id' => 'menu-footer-menu',
                        'fallback_cb' => false
                     );
                     wp_nav_menu(array(
                        'theme_location' => 'Footer_Menu', // Should match the registered location
                        'depth' => 1,
                        'container' => false,
                        'menu_class' => 'themelazer_footer_menu',
                        'menu_id' => 'menu-footer-menu',
                        'fallback_cb' => false
                     ));
                  ?>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="themelazer_logo_footer2">
                     <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php $logo = get_theme_mod('sportshub_logo'); ?>
                        <?php if (!empty($logo)): ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php else: ?>
                        <img src="<?php echo esc_url(get_template_directory_uri().'/img/sportshub-black.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php endif; ?>
                     </a>
                  </div>
                  <div class="themelazer_logo_footer2 darkmode">
                     <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php $logo = get_theme_mod('sportshub_logo_white'); ?>
                        <?php if (!empty($logo)): ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php else: ?>
                        <img src="<?php echo esc_url(get_template_directory_uri().'/img/sportshub-whtie.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php endif; ?>
                     </a>
                  </div>
               </div>
               <div class="col-md-4">   
                     <div class="themelazer_footer_social_media">
                        <?php if(!get_theme_mod('disable_social_icons')==1){?>
                        <ul class="themelazer_social_wrapper">
                           <?php if(get_theme_mod('facebook')){?>
                           <li><a class="facebook" href="<?php echo esc_url(get_theme_mod('facebook'));?>" title="facebook" aria-label="facebook"  target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('twitter')){?>
                           <li><a class="twitter" href="<?php echo esc_url(get_theme_mod('twitter'));?>" title="twitter" aria-label="twitter"  target="_blank"><i class="fab fa-twitter"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('vk')){?>
                           <li><a class="vk" href="<?php echo esc_url(get_theme_mod('vk'));?>" title="vk" aria-label="vk"  target="_blank"><i class="fab fa-vk"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('telegram')){?>
                           <li><a class="telegram" href="<?php echo esc_url(get_theme_mod('telegram'));?>" title="telegram" aria-label="telegram"   target="_blank"><i class="fa fa-paper-plane"></i></a></li>
                           <?php }?>                        
                           <?php if(get_theme_mod('behance')){?>
                           <li><a class="behance" href="<?php echo esc_url(get_theme_mod('behance'));?>"  title="Behance" aria-label="Behance"  target="_blank"><i class="fab fa-behance"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('vimeo')){?>
                           <li><a class="vimeo" href="<?php echo esc_url(get_theme_mod('vimeo'));?>" title="vimeo" aria-label="vimeo"  target="_blank"><i class="fab fa-vimeo"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('youtube')){?>
                           <li><a class="youtube" href="<?php echo esc_url(get_theme_mod('youtube'));?>" title="youtube" aria-label="youtube"   target="_blank"><i class="fab fa-youtube"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('instagram')){?>
                           <li><a class="instagram" href="<?php echo esc_url(get_theme_mod('instagram'));?>"  title="Instgram" aria-label="Instgram" target="_blank"><i class="fab fa-instagram"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('linkedin')){?>
                           <li><a class="linkedin" href="<?php echo esc_url(get_theme_mod('linkedin'));?>" title="linkedin" aria-label="linkedin"  target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('pinterest')){?>
                           <li><a class="pinterest" href="<?php echo esc_url(get_theme_mod('pinterest'));?>" title="pinterest" aria-label="pinterest"  target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('deviantart')){?>
                           <li><a class="deviantart" href="<?php echo esc_url(get_theme_mod('deviantart'));?>" title="deviantart" aria-label="deviantart"  target="_blank"><i class="fab fa-deviantart"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('dribble')){?>
                           <li><a class="dribble" href="<?php echo esc_url(get_theme_mod('dribble'));?>" title="dribble" aria-label="dribble"  target="_blank"><i class="fab fa-dribbble"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('dropbox')){?>
                           <li><a class="dropbox" href="<?php echo esc_url(get_theme_mod('dropbox'));?>" title="dropbox" aria-label="dropbox"  target="_blank"><i class="fab fa-dropbox"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('rss')){?>
                           <li><a class="rss" href="<?php echo esc_url(get_theme_mod('rss'));?>" title="rss" aria-label="rss"  target="_blank"><i class="fa fa-rss"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('skype')){?>
                           <li><a class="skype" href="<?php echo esc_url(get_theme_mod('skype'));?>" title="skype" aria-label="skype"  target="_blank"><i class="fab fa-skype"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('stumbleupon')){?>
                           <li><a class="stumbleupon" href="<?php echo esc_url(get_theme_mod('stumbleupon'));?>"title="stumbleupon" aria-label="stumbleupon"   target="_blank"><i class="fab fa-stumbleupon"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('wordpress')){?>
                           <li><a class="wordpress" href="<?php echo esc_url(get_theme_mod('wordpress'));?>" title="wordpress" aria-label="wordpress"  target="_blank"><i class="fab fa-wordpress"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('yahoo')){?>
                           <li><a class="yahoo" href="<?php echo esc_url(get_theme_mod('yahoo'));?>" title="yahoo" aria-label="yahoo"  target="_blank"><i class="fab fa-yahoo"></i></a></li>
                           <?php }?>
                           <?php if(get_theme_mod('sound_cloud')){?>
                           <li><a class="sound_cloud" href="<?php echo esc_url(get_theme_mod('sound_cloud'));?>" title="sound cloud" aria-label="sound cloud" target="_blank"><i class="fab fa-soundcloud"></i></a></li>
                           <?php }?>
                        </ul>
                        <?php }?>
                     </div>
               </div>
         </div>
      </div>  
   </div>
   <a href="#" class="themelazer_go_to_top">
      <p class="themelazer_go_to_top_body">
         <span class="themelazer_go_to_text_layout_one"><?php esc_html_e('GO TO TOP', 'sportshub');?></span>
         <span class="themelazer_go_to_scroll_line"></span>
      </p>
   </a>
   <div class="container">
      <div class="copyright-area">   
         <div class="copyright-area-inner">
            <?php echo esc_html(get_theme_mod('themelazer_copyright', __('© Copyright 2024 Themelazer. All Rights Reserved', 'sportshub'))); ?>
         </div>
      </div>   
   </div>   
</footer>
   <!-- End footer -->
   <aside class="sidemenuoption">
      <div class="sidemenuoption-inner">
         <span class="menuoption-close"><i class="ti-close"></i></span>
            <div class="site-name-logo">
               <div class="site-name">
                  <a href="<?php echo esc_url(home_url('/')); ?>">
                  <?php $logo = get_theme_mod('sportshub_logo'); ?>
                        <?php if (!empty($logo)): ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php else: ?>
                        <img src="<?php echo esc_url(get_template_directory_uri().'/img/sportshub-black.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php endif; ?></a>
               </div>
            </div>
            <div class="site-name-logo darkmode">
               <div class="site-name">
                  <a href="<?php echo esc_url(home_url('/')); ?>">
                  <?php $logo = get_theme_mod('sportshub_logo_white'); ?>
                        <?php if (!empty($logo)): ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php else: ?>
                        <img src="<?php echo esc_url(get_template_directory_uri().'/img/sportshub-whtie.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php endif; ?></a>
               </div>
            </div>
         <div class="themelazer-mob_navigation">
            <?php if ( has_nav_menu( 'Side_Menu' ) ){ ?>
            <?php $main_menu = array( 'theme_location' => 'Side_Menu', 'container' => '', 'menu_class' => 'menu', 'menu_id' => 'themelazer_m_menu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
            <?php }else{ ?>
            <?php if ( current_user_can( 'manage_options' ) ){ ?>
            <ul class="menu">
               <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                  <?php esc_html_e( 'Click here to add navigation menu', 'sportshub' ); ?></a>
               </li> 
            </ul>
            <?php }}?>
         </div>
         <div class="themelazer_mobile_menu"></div>
         <div class="container p-4">
            <!-- <div class="single-sidebar ">
            <div class="title">
               <h3><?php echo esc_html('Top 3 Most Popular'); ?></h3>
            </div>
            </div> 
            <div class="recent-post-wrapper">
         
               <?php
               $args = array(
                  'posts_per_page' => 3,
                  'post_status'    => 'publish',
                  'orderby'        => 'comment_count',  // Order by number of comments (popularity)
                  'order'          => 'DESC'  // Show most popular first
               );
               $i=0;
               $query = new WP_Query($args);
               while($query->have_posts()){ 
                  $i++;	
                  $query->the_post();
                  $post_id = get_the_ID(); 
                  $categories = get_the_category(get_the_ID());          
                     if ($categories) {
                           foreach( $categories as $tag) {
                              $tag_link = get_category_link($tag->term_id);
                              $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
                           }
                     }?>
                     <div class="themelazer_article_list">
                           <div class="post-outer">
                              <?php if ( has_post_thumbnail()) {?>
                                 <div class="post-inner">
                                    <div class="post-thumbnail sidebar"> 
                                    <?php the_post_thumbnail('sportshub_small_recent_feature'); ?>
                                    <span class="themelazer_site_count" style="color:<?= $title_bg_Color; ?> !important;">
                                       <?= $i; ?>
                                    </span>
                                       <a href="<?php the_permalink(); ?>"></a>
                                    </div>
                                 </div>
                              <?php }?>
                              <div class="post-inner">
                                 <div class="entry-header">
                                       <h2 class="entry-title"> 
                                          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title()?></a>
                                       </h2>
                                       <?php sportshub_post_meta_w(get_the_ID());?>
                                 </div>
                              </div>
                           </div>
                     </div>
                  <?php }
               wp_reset_postdata();
               ?>
            </div>
            <div class="wrapper_category_image">
               <div class="single-sidebar ">
                  <div class="title">
                     <h3><?php echo esc_html('All Categories'); ?></h3>
                  </div>
               <?php
                  $cat_id = isset($instance['cat_id']) ? $instance['cat_id']: "";
                  if($cat_id){$cat_id = explode(",",$cat_id);}else{$cat_id = "";}
                  $args = array(
                  'orderby'       => 'include', 
                  'order'         => 'ASC',
                  'hide_empty'    => false,
                  'fields'        => 'all',
                  'pad_counts'    => false, 
                  'include'       => $cat_id,
                  'exclude'       => array(1)
                  );
                  $categories = get_terms('category', $args);
                  if ($categories) {
                  echo '<div class="category_image_wrapper_main">';
                  foreach( $categories as $tag) {
                     $tag_link = get_category_link($tag->term_id);
                     $tag_dec =  category_description($tag->term_id);
                     $title_bg_Color = get_term_meta($tag->term_id, "category_color_options", true);
                     $category_image_main = get_term_meta($tag->term_id, "sportshub_cat_header_image_id", true);
                     
                     $category_image = '';
                     $lazer_header_id = absint( get_term_meta( $tag->term_id, 'lazer_header_id', true ) );
                     if ($lazer_header_id){
                     $category_image = wp_get_attachment_image_src( $lazer_header_id , 'sportshub_slider_grid_small' );
                     echo '<div class="category_image_bg_image" style="background-image: url('.$category_image[0].');">';
                     }else{
                     echo '<div class="category_image_bg_image">';
                     }
                  echo '<a class="category_image_link" id="category_color_'.$tag->term_id.'" href="'.esc_url($tag_link).'"><span class="themelazer_cm_overlay"><span class="themelazer_cm_name">'.$tag->name.'</span><span class="sportshub_tag_dec">'.$tag_dec.'</span><span class="themelazer_cm_count" style="background:'.$title_bg_Color.' !important;">'.$tag->count.'</span></span></a>';
                  echo '<div class="category_image_bg_overlay" style="background: '.$title_bg_Color.';"></div>';
                  echo '</div>';
                  }
                  echo "</div>";
                  }
               ?>
               <?php
                  echo '<span class="themelazer_none_space"></span>';
                  echo "</div>";
               ?> -->

         <?php 
            if (is_active_sidebar('moobile-sidebar')) : 
               dynamic_sidebar('moobile-sidebar');
            endif; 
         ?>      
         </div>   
         <div class="container">
           
            <div class="copyright-area">   
               <div class="copyright-area-inner-sidebar">
                  <?php echo esc_html(get_theme_mod('themelazer_copyright', __('© Copyright 2024 Themelazer. All Rights Reserved', 'sportshub'))); ?>
               </div>
            </div>   
         </div>   
      </div>
   </aside>
<div class="body-overlay"></div>

<?php wp_footer();?>
</body>
</html>
