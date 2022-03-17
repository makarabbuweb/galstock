<?php
/*
  Template Name: Page Upload
 */
get_header();
$jl_dn_option = isset( $_COOKIE['jlmode_dn'] ) ? $_COOKIE['jlmode_dn'] : '';
if ( $jl_dn_option) {
}else{
    wp_redirect( home_url() ); exit;
}
?>
<section id="content_main" class="clearfix">
    <div class="container">
        <div class="row main_content">
            <!-- Start content -->
            <div class="col-md-12 jl_single_page">              
              <div class="jl_admin_wrapp">
              <div class="jl_admin_sidebar">
              <ul>
                  <li class="up_dashpage"><a href="<?php echo esc_url(home_url('/dashboard')); ?>">Dashboard</a></li>
                  <li class="up_lispage"><a href="<?php echo esc_url(home_url('/list-all-media')); ?>">List Media</a></li>
                  <li class="up_mdpage"><a href="<?php echo esc_url(home_url('/upload-media')); ?>">Upload Media</a></li>
              </ul>
              </div>              
<div <?php post_class( 'content_single_page jl_content'); ?>>
    <?php
              echo '<div class="jl_pc_sec_title">';
              echo '<h3 class="jl_pc_sec_hs">';
              echo get_the_title();
              echo '</h3>';
              echo '</div>';
    ?>
<?php  echo do_shortcode( ' [jl_upload_form] ' ); ?>                    
                </div>
            </div> 
            </div>            
        </div>
    </div>
</section>
<!-- end content -->
<?php get_footer(); ?>