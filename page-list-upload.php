<?php
/*
  Template Name: Page List Upload
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
<div <?php post_class( 'content_single_page jl_content jlcustcc'); ?>>
    <?php
              echo '<div class="jl_pc_sec_title">';
              echo '<h3 class="jl_pc_sec_hs">';
              echo get_the_title();
              echo '</h3>';
              echo '</div>';
    ?>


<div class="dash_list_gal">
<?php if( current_user_can('administrator') ) {
 $args = array(
  'post_type' => 'post',  
  'posts_per_page' => 100,  
);

}else{

$jl_dn_option = isset( $_COOKIE['jlmode_dn'] ) ? $_COOKIE['jlmode_dn'] : '';
$args = array(
  'post_type' => 'post',
  'meta_key'   => 'cus_uid',
  'posts_per_page' => 100,
  'meta_query' => array(
        array(
            'key'     => 'cus_uid',
            'value'   => $jl_dn_option,
            'compare' => '=',
        ),
    )
);

} 
$query = new WP_query ( $args );
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) : $query->the_post();
?>
<div class="gal_list_wrap">
<div class="gal_list_content">
<div class="gal_list_img">
<?php $cus_ipfs = get_post_meta( get_the_ID(), 'cus_ipfs', true );
if ($cus_ipfs =='') {
}else{?>
<img src="<?php echo $cus_ipfs;?>">
<?php }?>
</div>
<div class="gal_list_title">
    <h2 class="entry-title"> <a href="<?php the_permalink(); ?>" tabindex="-1"><?php the_title()?></a></h2>
    <?php shareblock_post_meta(get_the_ID());?>                        
    <span class="ipfs_hash">IPFS hash: <?php echo get_post_meta( get_the_ID(), 'cus_hash', true )?></span>
</div>


</div>

<div class="gal_list_action" style="display:none !important;"><span class="del_list" href="#" data-id="<?php the_ID() ?>" data-nonce="<?php echo wp_create_nonce('my_delete_post_nonce') ?>" class="delete-post"><i class="jli-close-o"></i></span></div>
</div>

<?php
endwhile;
wp_reset_postdata();    
}
?>
</div>


                </div>
            </div> 
            </div>            
        </div>
    </div>
</section>
<!-- end content -->
<?php get_footer(); ?>