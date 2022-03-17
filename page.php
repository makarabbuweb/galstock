<?php
/*
  The main template file for display page
 */
get_header();
?>

<section id="content_main" class="clearfix">
    <div class="container">
        <div class="row main_content">
            <!-- Start content -->
            <div class="col-md-12 jl_single_page" id="content">
              <?php
              echo '<div class="jl_pc_sec_title">';
              echo '<h3 class="jl_pc_sec_h">';
              echo get_the_title();
              echo '</h3>';
              echo '</div>';
              ?>
                <div <?php post_class( 'content_single_page jl_content'); ?>>

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php if ( has_post_thumbnail()) {
  echo '<div class="image-post-thumb">';
  the_post_thumbnail('shareblock_featurelarge');
  echo '</div>';}?>
                    <?php the_content(); ?>
                    <?php endwhile; // end of the loop.  ?>
                    <?php endif; ?>
                    <?php comments_template('', true); ?>
                    <?php wp_link_pages( array( 'before' => '<div class="page-links">', 'after' => '</div>', 'link_before' => '<span class="jl_nav_c">', 'link_after' => '</span>' ) ); ?>
                </div>
            </div>
            <!-- End content -->                        
        </div>
    </div>
</section>
<!-- end content -->
<?php get_footer(); ?>