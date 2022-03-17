<?php get_header(); ?>
<section id="content_main" class="clearfix">
    <div class="container">
        <div class="row main_content">
            <!-- begin content -->
            <div class="col-md-12 page_error_404">
                <h1 class="big">
                    <?php esc_html_e('404', 'shareblock'); ?>
                </h1>
                <p class="description">
                    <?php esc_html_e('OOOOOPS!! The page you are looking for not exist!', 'shareblock'); ?>
                </p>
                <a class="link_home404" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php esc_html_e('Back to Home', 'shareblock'); ?>
                    </p></a>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>