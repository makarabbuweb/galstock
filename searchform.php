<form method="get" class="searchform_theme" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="text" placeholder="<?php echo esc_attr__('Search ...', 'shareblock'); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" class="search_btn" />
    <button type="submit" class="button"><i class="jli-search"></i></button>
</form>