<?php
/**
 * Include the header template.
 */
get_header(); ?>

<div class="themelazer-blog-body">
    <div class="container" id="wrapper_masonry">
        <div class="row">
            <div class="col-12 col-md-12 col-sm-12 col-lg-8 themelazer_content">
                <?php echo sportshub_breadcrumb();?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="themelazer_title_p themelazer_title_search">
                            <h2>
                                <?php
                                // Display the search phrase
                                esc_html_e('Search for: ', 'sportshub');
                                the_search_query(); ?>
                            </h2>
                            <div class="sidebar">
                                <div class="single-sidebar search-widget">
                                    <?php
                                    // Display the search form
                                    get_search_form(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    // Get the search query results
                    $sportshub_qry = sportshub_get_qry();

                    // Check if there are posts
                    if ($sportshub_qry->have_posts()) {
                        while ($sportshub_qry->have_posts()) {
                            $sportshub_qry->the_post();
                            $sportshub_post_id = $post->ID;
                            get_template_part('inc/post-layout/content', 'list');
                        }
                    } else {
                        // Display a message if no results found
                        echo '<div class="col-md-12">';
                        if (is_search()) {
                            esc_html_e('No result found', 'sportshub');
                        }
                        echo '</div>';
                    } ?>
                </div>
                <?php
                // Display pagination
                sportshub_pagination($sportshub_qry); 
                wp_reset_postdata();
                ?>
            </div>
            <div class="col-12 col-md-12 col-sm-12 col-lg-4 themelazer_sidebar themelazer_sticky">
                <?php
                if (is_active_sidebar('general-sidebar')) :
                    dynamic_sidebar('general-sidebar');
                endif; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
