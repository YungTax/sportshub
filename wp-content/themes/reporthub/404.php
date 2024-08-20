<?php get_header(); // Include the header template ?>

<!-- Main body container for the blog content -->
<div class="themelazer-blog-body">
   <div class="container">
      <div class="row justify-content-center"> <!-- Center the content horizontally -->
         <div class="col-md-6"> <!-- Set the column width to 6 out of 12 for medium devices -->
            <div class="page-notfound text-center"> <!-- Center-align text inside the not found page -->
               <!-- Display the 404 error title -->
               <h1 class="page-title">
                  <?php esc_html_e('404', 'reporthub'); ?>
               </h1>
               <!-- Display the error description -->
               <p class="page-desc">
                  <?php esc_html_e('We’re sorry but we can’t seem to find the page you requested. This might be because you have typed the web address incorrectly', 'reporthub'); ?>
               </p>
               <!-- Provide a link to the home page -->
               <a href="<?php echo esc_url(home_url('')); ?>" class="themelazern_404_page">
                  <?php esc_html_e('Go To Home Page', 'reporthub'); ?>
               </a>
            </div> <!-- End of page-notfound div -->
         </div> <!-- End of col-md-6 div -->
      </div> <!-- End of row div -->
   </div> <!-- End of container div -->
</div> <!-- End of themelazer-blog-body div -->

<?php get_footer(); // Include the footer template ?>