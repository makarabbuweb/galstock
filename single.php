<?php get_header();?>
<?php
if (have_posts()) { while (have_posts()) { the_post();
$categories = get_the_category();
$tags = get_the_tags();
$post_id = get_the_ID();
?>
<section id="content_main" class="clearfix jl_spost">
    <div class="container">
        <div class="row main_content single_pl">            
            <div class="col-md-12 loop-large-post">
                <div class="widget_container content_page">
                    <!-- start post -->
                    <div <?php post_class(); ?> id="post-<?php the_ID();?>">
                        <div class="single_section_content box blog_large_post_style">                        
                            
                            <div class="post_content_w">                            

                                <div class="single_content_header jl_single_feature_below">
                                            <div class="image-post-thumb jlsingle-title-above">
                                                <?php $cus_ipfs = get_post_meta( get_the_ID(), 'cus_ipfs', true );
                                                  if ($cus_ipfs =='') {
                                                  }else{?>
                                                  <img src="<?php echo $cus_ipfs;?>">                    
                                                  <?php }?>
                                            </div>
                                            
                                        </div>

                            <div class="post_content jl_content">
                                <div class="jl_single_style1">
                                    <div class="single_post_entry_content single_bellow_left_align jl_top_single_title jl_top_title_feature">
                                        <?php shareblock_post_cat(get_the_ID());?>
                                        <h1 class="single_post_title_main">
                                            <?php the_title()?>
                                        </h1>
                                        <div class="jl_mt_wrap">
                                        <?php shareblock_single_meta_txt(get_the_ID());?>                        
                                      </div>
                                    </div>                                    
                                    </div>
                                <?php the_content();?>                                
                            </div>
                            </div>
                            <?php wp_link_pages( array( 'before' => '<div class="page-links">', 'after' => '</div>', 'link_before' => '<span class="jl_nav_c">', 'link_after' => '</span>' ) ); ?>
                            <div class="clearfix"></div>
                            <div class="single_tag_share <? if (empty($tags)){echo 'jl_tag_none';}?>">
                                <?php if(get_theme_mod('disable_post_tag') !=1){?>
                                <div class="tag-cat">
                                    <?php if (!empty($tags)){ ?>
                                    <?php the_tags('<ul class="single_post_tag_layout"><li>', '</li><li>', '</li></ul>'); ?>
                                    <?php } ?>
                                </div>
                                <?php }?>
                            </div>
                            <?php if(get_theme_mod('disable_post_nav') !=1){?>
                            <div class="postnav_w">                            
                            <?php
                                $prev_post = get_previous_post();
                                if (!empty($prev_post)){
                                ?>
                            <div class="jl_navpost postnav_left">
                                <a class="jl_nav_link" href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" id="prepost">                                                                                                                
                                        <?php echo get_the_post_thumbnail( $prev_post->ID, 'thumbnail' ); ?>
                                        <span class="jl_nav_wrap">
                                        <span class="jl_nav_label"><?php esc_html_e('Previous post', 'shareblock'); ?></span>
                                        <span class="jl_cpost_title"><?php echo esc_attr($prev_post->post_title); ?></span>
                                        </span>
                                </a>                               
                            </div>
                            <?php } ?>

                            <?php
                                $next_post = get_next_post();
                                if (!empty($next_post)){
                                ?>
                            <div class="jl_navpost postnav_right">
                                    <a class="jl_nav_link" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" id="nextpost">                                        
                                        <?php echo get_the_post_thumbnail( $next_post->ID, 'thumbnail' ); ?>
                                        <span class="jl_nav_wrap">
                                        <span class="jl_nav_label"><?php esc_html_e('Next post', 'shareblock'); ?></span>
                                        <span class="jl_cpost_title"><?php echo esc_attr($next_post->post_title); ?></span>                                    
                                        </span>
                                    </a>                                
                            </div>
                            <?php }?>
                        </div>       
                        <?php }?>                                             
                            
                            <?php
                            if(get_theme_mod('disable_post_share_footer') !=1){
                                if(function_exists('shareblock_slink')){
                                    echo '<div class="jl_sfoot">';
                                    shareblock_slink(get_the_ID());
                                    echo '</div>';
                                }
                            }
                            ?>                                                                                  

                            <?php shareblock_rel();?>

                            <?php }?>
                            <?php } // end of the loop.   ?>
                            <?php
                            comments_template('', true);
                            ?>
                        </div>
                    </div>
                    <!-- end post -->
                    <div class="brack_space"></div>
                </div>
            </div>            
            <div class="col-md-4" id="sidebar">
                <div class="jl_sidebar_w">
                <?php shareblock_post_sidebar();?>
                </div>
            </div>
        </div>        
    </div>
</section>
<!-- end content -->
<?php get_footer(); ?>