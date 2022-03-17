<?php get_header();
get_template_part( 'inc/misc/header', 'home' );
?>
<div class="jl_post_loop_wrapper">
        <div class="container" id="wrapper_masonry">
            <div class="row">
                <div class="col-md-12">
                    <div class="jl_wrapper_cat">
                        <div class="jl_cgrid">
                             <?php 
                            if (have_posts()){ 
                                while (have_posts()){ 
                                the_post();                         
                                get_template_part( 'inc/misc/content', 'list' );
                            }}else{       
                            if (is_search()) {  esc_html_e('No result found', 'shareblock');}
                            }
                            ?>
                        </div>
                        <?php
                        shareblock_pagination();
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>                
            </div>

        </div>
    </div>
<!-- end content -->
<?php get_footer(); ?>