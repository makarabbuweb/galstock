<div class="header_intro_wrapper">
<?php
$args = array(
  'post_type' => 'post',
  'orderby' => 'rand',
  'posts_per_page' => 1  
); 
$query = new WP_query ( $args );
if ( $query->have_posts() ) { 
    while ( $query->have_posts() ) : $query->the_post();
?>
<?php $cus_ipfs = get_post_meta( get_the_ID(), 'cus_ipfs', true );
if ($cus_ipfs =='') {
}else{?>
<img src="<?php echo $cus_ipfs;?>">
<?php
}
endwhile;
wp_reset_postdata();    
}
?>
<div class="jl_head_wrapper">
<h1>The best Web3 stock photos for free with IPFS</h1>
<div class="jl_search_head"><?php get_search_form(); ?></div>
</div>
</div>