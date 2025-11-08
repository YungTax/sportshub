<?php get_header(); // Include the header template ?>

<!-- Main body container for the blog content -->
<div class="themelazer-blog-body">
   <div class="container">
      <div class="row justify-content-center"> 
         <div class="col-md-6"> 
            <div class="page-notfound text-center">
               <!-- Display the 404 error title -->
               <h1 class="page-title">
                  <?php esc_html_e('404', 'sportshub'); ?>
               </h1>
               <!-- Display the error description -->
               <p class="page-desc">
                  <?php esc_html_e('We’re sorry but we can’t seem to find the page you requested. This might be because you have typed the web address incorrectly', 'sportshub'); ?>
               </p>
               <!-- Provide a link to the home page -->
               <a href="<?php echo esc_url(home_url('')); ?>" class="themelazern_404_page">
                  <?php esc_html_e('Go To Home Page', 'sportshub'); ?>
               </a>
            </div>
         </div> 
      </div>
   </div>
</div> <!-- End of themelazer-blog-body div -->

<?php get_footer(); ?>