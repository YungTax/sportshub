<?php
/**
 * Include the header template.
 */
get_header(); ?>

<div class="themelazer-blog-body">
    <div class="container" id="wrapper_masonry">
        <div class="row">
            <div class="col-md-8 themelazer_content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="themelazer_title_p themelazer_title_search">
                            <h2>
                                <?php
                                // Display the search phrase
                                esc_html_e('Search for: ', 'reporthub');
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
                    $reporthub_qry = reporthub_get_qry();

                    // Check if there are posts
                    if ($reporthub_qry->have_posts()) {
                        // Loop through the posts
                        while ($reporthub_qry->have_posts()) {
                            $reporthub_qry->the_post();
                            $reporthub_post_id = $post->ID;
                            // Include the post layout template
                            get_template_part('inc/post-layout/content', 'grid');
                        }
                    } else {
                        // Display a message if no results found
                        echo '<div class="col-md-12">';
                        if (is_search()) {
                            esc_html_e('No result found', 'reporthub');
                        }
                        echo '</div>';
                    } ?>
                </div>
                <?php
                // Display pagination
                reporthub_pagination($reporthub_qry); 
                // Reset post data
                wp_reset_postdata();
                ?>
            </div>
            <div class="col-md-4 themelazer_sidebar themelazer_sticky">
                <?php
                // Display the general sidebar
                if (is_active_sidebar('general-sidebar')) :
                    dynamic_sidebar('general-sidebar');
                endif; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
