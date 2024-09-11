<div class="theme_lazersearch_form_wrapper">
    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <input type="text" class="theme_lazersearch_inout header_layout_3" data-swplive="true" 
            placeholder="<?php echo esc_attr('What are you looking for?', 'sportshub'); ?>" 
            value="<?php echo esc_attr( get_search_query() ); ?>" 
            name="keyword" id="keyword" onkeyup="fetch()" />
        <button type="submit" class="theme_lazersearch_submit">
            <i class="fa fa-search"></i>
            <span><?php esc_html_e('Search', 'sportshub'); ?></span>
        </button>
    </form>
</div>
