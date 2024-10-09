<?php if (get_theme_mod('header_layout_design')=='header_layout_1'){?>
   <header class="themelazer_main_header">
      <!-- Header Middle -->
      <div class="themelazer_middle_header white_bg">
         <?php if (is_active_sidebar('instagram-header')) : ?>
               <div class="header_insta">                    
                  <?php  if (is_active_sidebar('instagram-header')) : dynamic_sidebar('instagram-header'); endif; ?>  
               </div>
         <?php endif; ?> 
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="themelazer_promomenu_wrapper">
                     <div class="themelazer_header_social_icons">
                        <div class="themelazer_btn_dark_mode">
                           <div class="themelazer_btn_dark_mode-inner-left"></div>
                           <div class="themelazer_btn_dark_mode-inner"></div>
                        </div>
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
                     
                     <div class="themelazer_mobile_logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php $logo = get_theme_mod('sportshub_logo_white'); ?>
                        <?php if (!empty($logo)): ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php else: ?>
                        <img src="<?php echo esc_url(get_template_directory_uri().'/img/sportshub_white.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php endif; ?></a>
                     </div>
                     <div class="themelazer-nav">
                        <!-- Main Menu -->
                        <div class="themelazer-navigation">
                        <?php if ( has_nav_menu( 'Main_Menu' ) ){
                        wp_nav_menu(array(
                           'theme_location' => 'Main_Menu', 
                           'container' => '',
                           'menu_class' => 'menu',
                           'menu_id' => 'themelazer_m_menu',
                           'fallback_cb' => false,
                           'link_after' => ''
                        ));
                     }else{ ?>
                           <?php if ( current_user_can( 'manage_options' ) ){ ?>
                           <ul class="menu">
                              <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                                 <?php esc_html_e( 'Click here to add navigation menu', 'sportshub' ); ?></a>
                              </li>
                           </ul>
                           <?php }}?>
                        </div>
                        <!-- Main Menu End-->
                     </div>
                     <ul class="header-s-m black_color">
                        <li>
                           <?php if(!get_theme_mod('disable_top_search')==1){?>
                              <a href="#search_popup"  title="Search" aria-label="Search" class="toggle-search-box">
                                 <i class="ti-search"></i>
                              </a>
                           <?php }?>
                        </li>
                        <li class="themelazer_mb_themelazern sidemenuoption-open is-active"><i class="ti-menu"></i></li>
                     </ul>
                     
                  
                  </div>
               </div>
            </div>
         </div>
         <div id="themelazer_search_wrapper">
            <i class="ti-close"></i>
            <form class="form-search" method="get" id="s" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
               <input spellcheck="false" autocomplete="off" type="text" value="" name="s" placeholder="<?php esc_attr_e('Search...', 'sportshub'); ?>" />
            </form>
            <p>Type above and press Enter to search. Press Esc to cancel.</p> 
            <div class="themelazer_category_list"> 
               <?php
                  $categories = get_categories();
                  echo '<div class="category_header_search" ><div class="themelazer_post_categories_search_form">';
                     foreach($categories as $category) {
                           $title_bg_Color = get_term_meta($category->term_id, "category_color_options", true); 
                           echo '<a '.'style="background:'.$title_bg_Color. '"'.' href="'. get_category_link($category->term_id) . '">' . $category->name .' '.$category->category_count.''. '</a>';
                     }
                  echo '</div></div>';
               ?>
            </div>
            </div>
            <div class="themelazer_search_wrapper">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">            
                        <?php get_search_form(); ?>                    
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <!--Header Top-->   
      <div id="themelazer_top_bar">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="themelazer_logo_header2">
                     <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php $logo = get_theme_mod('sportshub_logo_white'); ?>
                        <?php if (!empty($logo)): ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php else: ?>
                        <img src="<?php echo esc_url(get_template_directory_uri().'/img/sportshub_white.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                        <?php endif; ?>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Header Top -->
   </header>
<?php }elseif (get_theme_mod('header_layout_design')=='header_layout_2'){?>
   <header class="themelazer_main_header">
      <!--Header Top-->   
      <div id="themelazer_top_bar">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="themelazer_logo_header2">
                     <a href="<?php echo esc_url(home_url('/')); ?>">
               <?php $logo = get_theme_mod('sportshub_logo_white'); ?>
               <?php if (!empty($logo)): ?>
               <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
               <?php else: ?>
               <img src="<?php echo esc_url(get_template_directory_uri().'/img/sportshub_white.png'); ?>" alt="<?php bloginfo('description'); ?>" />
               <?php endif; ?></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Header Top -->
      <!-- Header Middle -->
      <div class="themelazer_middle_header header_layout2">
      <?php if (is_active_sidebar('instagram-header')) : ?>
      <div class="header_insta">       
      <?php  if (is_active_sidebar('instagram-header')) : dynamic_sidebar('instagram-header'); endif; ?>  
      </div>
      <?php endif; ?> 
      <div class="container clearfix">
         <div class="row">
            <div class="col-md-12">
               <div class="themelazer_promomenu_wrapper">
                  <div class="themelazer_header_social_icons">
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
                  <ul class="header-s-m black_color">
                     <li>
                        <?php if(!get_theme_mod('disable_top_search')==1){?>
                           <a href="#search_popup" title="Search" aria-label="Search"  class="toggle-search-box">
                                 <i class="ti-search"></i>
                              </a>
                        <?php }?>
                     </li>
                     <li class="themelazer_mb_themelazern sidemenuoption-open is-active"><i class="ti-menu"></i></li>
                  </ul>
                  <div class="themelazer_mobile_logo">
                     <a href="<?php echo esc_url(home_url('/')); ?>">
                     <?php $logo = get_theme_mod('sportshub_logo_white'); ?>
                     <?php if (!empty($logo)): ?>
                     <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                     <?php else: ?>
                     <img src="<?php echo esc_url(get_template_directory_uri().'/img/sportshub_white.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                     <?php endif; ?></a>
                  </div>
                  <div class="themelazer-nav clearfix">
                     <!-- Main Menu -->
                     <div class="themelazer-navigation">
                         <?php if ( has_nav_menu( 'Main_Menu' ) ){
                        wp_nav_menu(array(
                           'theme_location' => 'Main_Menu', 
                           'container' => '',
                           'menu_class' => 'menu',
                           'menu_id' => 'themelazer_m_menu',
                           'fallback_cb' => false,
                           'link_after' => ''
                        ));
                     }else{ ?>
                        <?php if ( current_user_can( 'manage_options' ) ){ ?>
                        <ul class="menu">
                           <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                              <?php esc_html_e( 'Click here to add navigation menu', 'sportshub' ); ?></a>
                           </li>
                        </ul>
                        <?php }}?>
                     </div>
                     <!-- Main Menu End-->
                  </div>

               </div>
            </div>
         </div>
      </div>
      <div id="themelazer_search_wrapper">
         <i class="ti-close"></i>
         <form class="form-search" method="get" id="s" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
            <input spellcheck="false" autocomplete="off" type="text" value="" name="s" placeholder="<?php esc_attr_e('Search...', 'sportshub'); ?>" />
         </form>
         <p>Type above and press Enter to search. Press Esc to cancel.</p> 
         <div class="themelazer_category_list"> 
            <?php
               $categories = get_categories();
               echo '<div class="category_header_search" ><div class="themelazer_post_categories_search_form">';
                  foreach($categories as $category) {
                        $title_bg_Color = get_term_meta($category->term_id, "category_color_options", true); 
                        echo '<a '.'style="background:'.$title_bg_Color. '"'.' href="'. get_category_link($category->term_id) . '">' . $category->name .' '.$category->category_count.''. '</a>';
                  }
               echo '</div></div>';
            ?>
         </div>
         </div>
         <div class="themelazer_search_wrapper">
            <div class="container">
               <div class="row">f

                  <div class="col-md-12">            
                     <?php get_search_form(); ?>                    
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>
<?php }elseif (get_theme_mod('header_layout_design')=='header_layout_3'){?>

   <header class="themelazer_main_header">
      <div class="top-header-menu">
         <div class="container">
            <div class="themelazer_header_social_icons">
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
            
            <?php
            if ( has_nav_menu( 'top-header-menu' ) ) {
               wp_nav_menu( array(
                     'theme_location' => 'top-header-menu',
                     'menu_class'     => 'top-header-menu-class', // Add your custom CSS class for styling
                     'container'      => 'nav',
                     'container_class'=> 'top-header-nav-container',
               ) );
            }
            ?>
         </div>
      </div>   
      <!-- Header Middle -->
      <div class="themelazer_middle_header layout3">
               <?php if (is_active_sidebar('instagram-header')) : ?>
      <div class="header_insta">
                  <?php  if (is_active_sidebar('instagram-header')) : dynamic_sidebar('instagram-header'); endif; ?>
      </div>
      <?php endif; ?> 
         <div class="container clearfix">
            <div class="themelazer_promomenu_wrapper">
               <div class="themelazer_logo_header3">
               <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php bloginfo('name'); ?>">
                  <?php $logo = get_theme_mod('sportshub_logo'); ?>
                  <?php if (!empty($logo)): ?>
                     <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>" />
                  <?php else: ?>
                     <img src="<?php echo esc_url(get_template_directory_uri().'/img/sportshub-black.png'); ?>" alt="<?php bloginfo('name'); ?>" />
                  <?php endif; ?>
               </a>
               </div>
               <div class="themelazer_logo_header3 darkmode">
                  <a href="<?php echo esc_url(home_url('/')); ?>">
                     <?php $logo = get_theme_mod('sportshub_logo_white'); ?>
                     <?php if (!empty($logo)): ?>
                     <img src="<?php echo esc_url($logo); ?>" aria-label="<?php bloginfo('description'); ?>" />
                     <?php else: ?>
                     <img src="<?php echo esc_url(get_template_directory_uri().'/img/sportshub-whtie.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                     <?php endif; ?>
                  </a>
               </div>

               <div class="themelazer-nav clearfix">
                  <!-- Main Menu -->
                  <div class="themelazer-navigation header_layout_3">
                     <?php if ( has_nav_menu( 'Main_Menu' ) ){
                        wp_nav_menu(array(
                           'theme_location' => 'Main_Menu', 
                           'container' => '',
                           'menu_class' => 'menu',
                           'menu_id' => 'themelazer_m_menu',
                           'fallback_cb' => false,
                           'link_after' => ''
                        ));
                     }else{ ?>
                     <?php if ( current_user_can( 'manage_options' ) ){ ?>
                     <ul class="menu">
                        <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                           <?php esc_html_e( 'Click here to add navigation menu', 'sportshub' ); ?></a>
                        </li>
                     </ul>
                     <?php }}?>
                  </div>
                  <!-- Main Menu End-->
               </div>
                  <ul class="header-s-m">
                     <li class="themelazer_btn_dark_mode">
                        <div class="themelazer_btn_dark_mode-inner-left"></div>
                        <div class="themelazer_btn_dark_mode-inner"></div>
                     </li>
                     <li><?php if(!get_theme_mod('disable_top_search')==1){?>
                        <a href="#search_popup"  title="Search" aria-label="Search" class="toggle-search-box layout_3">
                     <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="m16.9994165 16.2923098 3.8541369 3.8541368c.1952621.1952622.1952621.5118446 0 .7071068-.1952622.1952621-.5118446.1952621-.7071068 0l-3.8541368-3.8541369c-1.4103486 1.2450743-3.2630999 2.0005835-5.2923098 2.0005835-4.418278 0-8-3.581722-8-8s3.581722-8 8-8 8 3.581722 8 8c0 2.0292099-.7555092 3.8819612-2.0005835 5.2923098zm-5.9994165 1.7076902c3.8659932 0 7-3.1340068 7-7 0-3.86599325-3.1340068-7-7-7-3.86599325 0-7 3.13400675-7 7 0 3.8659932 3.13400675 7 7 7z"/></svg>
                     </a>
                     <?php }?>
                     </li>
                     <li class="themelazer_mb_themelazern sidemenuoption-open is-active">
                        <svg viewBox="0 0 100 80" width="20" height="20">
                           <rect y="20" width="100" height="5"></rect>
                           <rect y="60" width="100" height="5"></rect>
                        </svg>
                     </li>
                  </ul>
            </div>
         </div>
         <?php if(get_theme_mod('disable_post_marquee') !=1){ ?>
            <?php
               $args = array(
               'posts_per_page' => 20, // Number of posts to display
               'post_type'      => 'post', // Or any other post type you are working with
               'orderby'        => 'date', // Order by date (most recent)
               'order'          => 'DESC', // Descending order
            );

            $query = new WP_Query($args);

            ?>
            <div class="themelazer_feature_link_marquee">
               <div class="themelazer_top_list_in">
                  <?php $i = 0; while ($query->have_posts()) : $query->the_post(); $i++;?>
                        <div class="themelazer_article_list">
                           <div class="post-outer">
                              <div class="post-inner">
                                    <div class="post-thumbnail">
                                       <?php if ( has_post_thumbnail()) {the_post_thumbnail('sportshub_small_breaking_news');} ?> 
                                       <a href="<?php the_permalink(); ?>"></a>
                                    </div>
                              </div>
                              <div class="post-inner">
                                    <div class="entry-header">                    
                                       <h2 class="entry-title">
                                          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" tabindex="-1">
                                                <?php the_title(); ?>
                                          </a>
                                       </h2>
                                    </div>
                              </div>
                           </div>
                        </div>
                  <?php endwhile; wp_reset_postdata(); ?>
               </div>
            </div>
         <?php } ?>             
   </header> 
                           
   <div id="themelazer_search_wrapper">
            <i class="ti-close"></i>
            <form  class="form-search" method="get" id="s" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
               <input spellcheck="false" autocomplete="off" type="text" value="" name="s" placeholder="<?php esc_attr_e('Search...', 'sportshub'); ?>" />
            </form>
            <p>Type above and press Enter to search. Press Esc to cancel.</p> 
            <div class="themelazer_category_list"> 
               <?php
                  $categories = get_categories();
                  echo '<div class="category_header_search" ><div class="themelazer_post_categories_search_form">';
                     foreach($categories as $category) {
                           $title_bg_Color = get_term_meta($category->term_id, "category_color_options", true); 
                           echo '<a '.'style="background:'.$title_bg_Color. '"'.' href="'. get_category_link($category->term_id) . '">' . $category->name .' '.$category->category_count.''. '</a>';
                     }
                  echo '</div></div>';
               ?>
            </div>
            </div>
            <div class="themelazer_search_wrapper">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">            
                        <?php get_search_form(); ?>                    
                     </div>
                  </div>
               </div>
            </div>
         </div>
<?php }elseif (get_theme_mod('header_layout_design')=='header_layout_4'){?>
   <header class="themelazer_main_header">
      <!-- Header Middle -->
      <div class="themelazer_middle_header layout4">
         <?php if (is_active_sidebar('instagram-header')) : ?>
      <div class="header_insta">  
         <?php  if (is_active_sidebar('instagram-header')) : dynamic_sidebar('instagram-header'); endif; ?>
      </div>
      <?php endif; ?> 
         <div class="container clearfix">
            <div class="row">
               <div class="col-md-12">
                  <div class="themelazer_promomenu_wrapper">
                     <div class="themelazer_logo_header3">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                           <?php $logo = get_theme_mod('sportshub_logo'); ?>
                           <?php if (!empty($logo)): ?>
                                    <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('description'); ?>" />
                           <?php else: ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri().'/img/sportshub.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                           <?php endif; ?>
                        </a>
                     </div>
                     <div class="themelazer-nav clearfix">
                        <!-- Main Menu -->
                        <div class="themelazer-navigation header_layout_3">
                        <?php if ( has_nav_menu( 'Main_Menu' ) ){
                        wp_nav_menu(array(
                           'theme_location' => 'Main_Menu', 
                           'container' => '',
                           'menu_class' => 'menu',
                           'menu_id' => 'themelazer_m_menu',
                           'fallback_cb' => false,
                           'link_after' => ''
                        ));
                     }else{ ?>
                           <?php if ( current_user_can( 'manage_options' ) ){ ?>
                           <ul class="menu">
                              <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                                 <?php esc_html_e( 'Click here to add navigation menu', 'sportshub' ); ?></a>
                              </li>
                           </ul>
                           <?php }}?>
                        </div>
                        <!-- Main Menu End-->
                     </div>
                     <ul class="header-s-m">
                        <li>
                           <?php if(!get_theme_mod('disable_top_search')==1){?>
                              <a href="#search_popup"  title="Search" aria-label="Search" class="toggle-search-box layout_3">
                                 <i class="ti-search"></i>
                              </a>
                           <?php }?>
                        </li>
                        <li class="themelazer_mb_themelazern sidemenuoption-open is-active"><i class="ti-menu"></i></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div id="themelazer_search_wrapper">
            <i class="ti-close"></i>
            <form class="form-search" method="get" id="s" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
               <input spellcheck="false" autocomplete="off" type="text" value="" name="s" placeholder="<?php esc_attr_e('Search...', 'sportshub'); ?>" />
            </form>
            <p>Type above and press Enter to search. Press Esc to cancel.</p> 
            <div class="themelazer_category_list"> 
               <?php
                  $categories = get_categories();
                  echo '<div class="category_header_search" ><div class="themelazer_post_categories_search_form">';
                     foreach($categories as $category) {
                           $title_bg_Color = get_term_meta($category->term_id, "category_color_options", true); 
                           echo '<a '.'style="background:'.$title_bg_Color. '"'.' href="'. get_category_link($category->term_id) . '">' . $category->name .' '.$category->category_count.''. '</a>';
                     }
                  echo '</div></div>';
               ?>
            </div>
            </div>
            <div class="themelazer_search_wrapper">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">            
                        <?php get_search_form(); ?>                    
                     </div>
                  </div>
               </div>
            </div>
         </div>

   </header> 
   <?php }else{?>
      <header class="themelazer_main_header">
      <div class="top-header-menu">
         <div class="container">
            <div class="themelazer_header_social_icons">
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
            
            <?php
            if ( has_nav_menu( 'top-header-menu' ) ) {
               wp_nav_menu( array(
                     'theme_location' => 'top-header-menu',
                     'menu_class'     => 'top-header-menu-class', // Add your custom CSS class for styling
                     'container'      => 'nav',
                     'container_class'=> 'top-header-nav-container',
               ) );
            }
            ?>
         </div>
      </div>   
      <!-- Header Middle -->
      <div class="themelazer_middle_header layout3">
               <?php if (is_active_sidebar('instagram-header')) : ?>
      <div class="header_insta">
                  <?php  if (is_active_sidebar('instagram-header')) : dynamic_sidebar('instagram-header'); endif; ?>
      </div>
      <?php endif; ?> 
         <div class="container clearfix">
            <div class="themelazer_promomenu_wrapper">
               <div class="themelazer_logo_header3">
               <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php bloginfo('name'); ?>">
                  <?php $logo = get_theme_mod('sportshub_logo'); ?>
                  <?php if (!empty($logo)): ?>
                     <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>" />
                  <?php else: ?>
                     <img src="<?php echo esc_url(get_template_directory_uri().'/img/sportshub-black.png'); ?>" alt="<?php bloginfo('name'); ?>" />
                  <?php endif; ?>
               </a>
               </div>
               <div class="themelazer_logo_header3 darkmode">
                  <a href="<?php echo esc_url(home_url('/')); ?>">
                     <?php $logo = get_theme_mod('sportshub_logo_white'); ?>
                     <?php if (!empty($logo)): ?>
                     <img src="<?php echo esc_url($logo); ?>" aria-label="<?php bloginfo('description'); ?>" />
                     <?php else: ?>
                     <img src="<?php echo esc_url(get_template_directory_uri().'/img/sportshub-whtie.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                     <?php endif; ?>
                  </a>
               </div>

               <div class="themelazer-nav clearfix">
                  <!-- Main Menu -->
                  <div class="themelazer-navigation header_layout_3">
                     <?php if ( has_nav_menu( 'Main_Menu' ) ){
                        wp_nav_menu(array(
                           'theme_location' => 'Main_Menu', 
                           'container' => '',
                           'menu_class' => 'menu',
                           'menu_id' => 'themelazer_m_menu',
                           'fallback_cb' => false,
                           'link_after' => ''
                        ));
                     }else{ ?>
                     <?php if ( current_user_can( 'manage_options' ) ){ ?>
                     <ul class="menu">
                        <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                           <?php esc_html_e( 'Click here to add navigation menu', 'sportshub' ); ?></a>
                        </li>
                     </ul>
                     <?php }}?>
                  </div>
                  <!-- Main Menu End-->
               </div>
                  <ul class="header-s-m">
                     <li class="themelazer_btn_dark_mode">
                        <div class="themelazer_btn_dark_mode-inner-left"></div>
                        <div class="themelazer_btn_dark_mode-inner"></div>
                     </li>
                     <li><?php if(!get_theme_mod('disable_top_search')==1){?>
                        <a href="#search_popup"  title="Search" aria-label="Search" class="toggle-search-box layout_3">
                     <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="m16.9994165 16.2923098 3.8541369 3.8541368c.1952621.1952622.1952621.5118446 0 .7071068-.1952622.1952621-.5118446.1952621-.7071068 0l-3.8541368-3.8541369c-1.4103486 1.2450743-3.2630999 2.0005835-5.2923098 2.0005835-4.418278 0-8-3.581722-8-8s3.581722-8 8-8 8 3.581722 8 8c0 2.0292099-.7555092 3.8819612-2.0005835 5.2923098zm-5.9994165 1.7076902c3.8659932 0 7-3.1340068 7-7 0-3.86599325-3.1340068-7-7-7-3.86599325 0-7 3.13400675-7 7 0 3.8659932 3.13400675 7 7 7z"/></svg>
                     </a>
                     <?php }?>
                     </li>
                     <li class="themelazer_mb_themelazern sidemenuoption-open is-active">
                        <svg viewBox="0 0 100 80" width="20" height="20">
                           <rect y="20" width="100" height="5"></rect>
                           <rect y="60" width="100" height="5"></rect>
                        </svg>
                     </li>
                  </ul>
            </div>
         </div>
         <?php if(get_theme_mod('disable_post_marquee') !=1){ ?>
            <?php
               $args = array(
               'posts_per_page' => 20, // Number of posts to display
               'post_type'      => 'post', // Or any other post type you are working with
               'orderby'        => 'date', // Order by date (most recent)
               'order'          => 'DESC', // Descending order
            );

            $query = new WP_Query($args);

            ?>
            <div class="themelazer_feature_link_marquee">
               <div class="themelazer_top_list_in">
                  <?php $i = 0; while ($query->have_posts()) : $query->the_post(); $i++;?>
                        <div class="themelazer_article_list">
                           <div class="post-outer">
                              <div class="post-inner">
                                    <div class="post-thumbnail">
                                       <?php if ( has_post_thumbnail()) {the_post_thumbnail('sportshub_small_breaking_news');} ?> 
                                       <a href="<?php the_permalink(); ?>"></a>
                                    </div>
                              </div>
                              <div class="post-inner">
                                    <div class="entry-header">                    
                                       <h2 class="entry-title">
                                          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" tabindex="-1">
                                                <?php the_title(); ?>
                                          </a>
                                       </h2>
                                    </div>
                              </div>
                           </div>
                        </div>
                  <?php endwhile; wp_reset_postdata(); ?>
               </div>
            </div>
         <?php } ?>             
   </header> 
                           
   <div id="themelazer_search_wrapper">
            <i class="ti-close"></i>
            <form  class="form-search" method="get" id="s" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
               <input spellcheck="false" autocomplete="off" type="text" value="" name="s" placeholder="<?php esc_attr_e('Search...', 'sportshub'); ?>" />
            </form>
            <p>Type above and press Enter to search. Press Esc to cancel.</p> 
            <div class="themelazer_category_list"> 
               <?php
                  $categories = get_categories();
                  echo '<div class="category_header_search" ><div class="themelazer_post_categories_search_form">';
                     foreach($categories as $category) {
                           $title_bg_Color = get_term_meta($category->term_id, "category_color_options", true); 
                           echo '<a '.'style="background:'.$title_bg_Color. '"'.' href="'. get_category_link($category->term_id) . '">' . $category->name .' '.$category->category_count.''. '</a>';
                     }
                  echo '</div></div>';
               ?>
            </div>
            </div>
            <div class="themelazer_search_wrapper">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">            
                        <?php get_search_form(); ?>                    
                     </div>
                  </div>
               </div>
            </div>
         </div>
<?php } ?>




