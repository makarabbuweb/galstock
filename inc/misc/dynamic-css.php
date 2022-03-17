<?php
//Menu
$shareblock_menu_font_family = get_theme_mod('shareblock_menu_font_family', 'DM Sans');
$shareblock_menu_font_size = get_theme_mod('shareblock_menu_font_size', '17px');
$shareblock_menu_font_weight = get_theme_mod('shareblock_menu_font_weight', '600');
$shareblock_menu_transform = get_theme_mod('shareblock_menu_transform', 'capitalize');
$letter_spacing_menu = get_theme_mod('letter_spacing_menu', '-.03em');
$sub_menu_transform = get_theme_mod('sub_menu_transform', 'capitalize');
$sub_spacing_menu = get_theme_mod('sub_spacing_menu', '0em');
//Sub Menu
$shareblock_sub_menu_font_size = get_theme_mod('shareblock_sub_menu_font_size', '14px');
$shareblock_sub_menu_font_weight = get_theme_mod('shareblock_sub_menu_font_weight', '400');
//Paragraph
$shareblock_p_font_family = get_theme_mod('shareblock_p_font_family', 'DM Sans');
$shareblock_p_font_size = get_theme_mod('shareblock_p_font_size', '16px');
$shareblock_p_font_weight = get_theme_mod('shareblock_p_font_weight', '400');
$p_line_height = get_theme_mod('p_line_height', '1.8');
$body_font_size = get_theme_mod('body_font_size', '15px');
$body_line_height = get_theme_mod('body_line_height', '1.5');
//Title
$shareblock_title_font_family = get_theme_mod('shareblock_title_font_family', 'DM Sans');
$shareblock_title_font_weight = get_theme_mod('shareblock_title_font_weight', '600');
$shareblock_title_transform = get_theme_mod('shareblock_title_transform', 'none');
$letter_spacing_heading = get_theme_mod('letter_spacing_heading', '0em');
$line_height_heading = get_theme_mod('line_height_heading', '1.15');
//Catgory, Meta, Button
$shareblock_cat_font_size    = get_theme_mod('shareblock_cat_font_size', '13px');
$shareblock_cat_font_weight = get_theme_mod('shareblock_cat_font_weight', '700');
$shareblock_cat_transform	= get_theme_mod('shareblock_cat_transform', 'capitalize');
$letter_spacing_cat 	= get_theme_mod('letter_spacing_cat', '0em');
$shareblock_meta_font_size 	= get_theme_mod('shareblock_meta_font_size', '13px');
$shareblock_meta_font_weight = get_theme_mod('shareblock_meta_font_weight', '400');
$shareblock_meta_transform     = get_theme_mod('shareblock_meta_transform', 'capitalize');
$letter_spacing_meta     = get_theme_mod('letter_spacing_meta', '0em');
// Button setting
$shareblock_button_font_size = get_theme_mod('shareblock_button_font_size', '13px');
$shareblock_button_font_weight = get_theme_mod('shareblock_button_font_weight', '700');
$shareblock_button_transform = get_theme_mod('shareblock_button_transform', 'capitalize');
$letter_spacing_button = get_theme_mod('letter_spacing_button', '0em');
$shareblock_loadmore_font_size = get_theme_mod('shareblock_loadmore_font_size', '12px');
$shareblock_loadmore_font_weight = get_theme_mod('shareblock_loadmore_font_weight', '700');
$shareblock_loadmore_transform = get_theme_mod('shareblock_loadmore_transform', 'capitalize');
$letter_spacing_loadmore = get_theme_mod('letter_spacing_loadmore', '0.1em');
// Other blog
$large_post_font_size = get_theme_mod('large_post_font_size', '30px');
$grid_post_font_size = get_theme_mod('grid_post_font_size', '22px');
$list_post_font_size = get_theme_mod('list_post_font_size', '25px');  
$border_rounded = get_theme_mod('border_rounded', '0px');  
//topbar
$jl_topbar_dec_size = get_theme_mod('jl_topbar_dec_size', '14px');
$jl_topbar_btn_size = get_theme_mod('jl_topbar_btn_size', '10px');
$jl_topbar_btn_space = get_theme_mod('jl_topbar_btn_space', '0em');  
$jl_topbar_btn_tranform = get_theme_mod('jl_topbar_btn_tranform', 'capitalize');  
//cookie
$jl_cookie_dec_size = get_theme_mod('jl_cookie_dec_size', '13px');  
$jl_cookie_btn_size = get_theme_mod('jl_cookie_btn_size', '12px');  
$jl_cookie_btn_space = get_theme_mod('jl_cookie_btn_space', '0em');  
$jl_cookie_btn_tranform = get_theme_mod('jl_cookie_btn_tranform', 'capitalize');
// Theme color
$color = get_theme_mod('theme_color');
if(empty($color)){ $color = '#f23737';}
$single_color = get_theme_mod('single_color');
if(empty($single_color)){ $single_color = '#ffed6c';}

$jl_page_padding = get_post_meta( get_the_ID(), 'jl_page_padding', true );
$jl_body_bg = get_post_meta( get_the_ID(), 'jl_body_bg', true );
$jl_hide_menu = get_post_meta( get_the_ID(), 'jl_hide_menu', true );
$jl_half_screen = get_post_meta( get_the_ID(), 'jl_half_screen', true );
$jl_hide_footer = get_post_meta( get_the_ID(), 'jl_hide_footer', true );

$bar_nav = 36;
$bar_cart= 48;
$bar_mode= 0;
$bar_search= 29;
if(! empty(get_theme_mod('disable_mb_nav'))){
$bar_nav = 0;    
}
if ( ! class_exists( 'Woocommerce' ) || ! function_exists( 'wc_get_cart_url' ) || ! function_exists( 'is_cart' ) || is_cart() ) {
$bar_cart = 0;    
}
if(! empty(get_theme_mod('enable_dark_mode'))){
$bar_mode = 50;    
}
if(! empty(get_theme_mod('disable_top_search'))){
$bar_search = 0;
}
$space_bar = $bar_nav + $bar_cart + $bar_mode + $bar_search.'px';
?>
:root{
    --jl-title-font: <?php echo esc_attr($shareblock_title_font_family);?>;
    --jl-title-font-weight: <?php echo esc_attr($shareblock_title_font_weight);?>;
    --jl-title-transform: <?php echo esc_attr($shareblock_title_transform);?>;
    --jl-title-space: <?php echo esc_attr($letter_spacing_heading);?>;
    --jl-title-line-height: <?php echo esc_attr($line_height_heading);?>;
    --jl-body-font: <?php echo esc_attr($shareblock_p_font_family);?>;
    --jl-body-font-size: <?php echo esc_attr($body_font_size);?>;
    --jl-body-font-weight: <?php echo esc_attr($shareblock_p_font_weight);?>;
    --jl-body-line-height: <?php echo esc_attr($body_line_height);?>;
    --jl-content-font-size: <?php echo esc_attr($shareblock_p_font_size);?>;
    --jl-content-line-height: <?php echo esc_attr($p_line_height);?>;
    --jl-menu-font: <?php echo esc_attr($shareblock_menu_font_family);?>;
    --jl-menu-font-size: <?php echo esc_attr($shareblock_menu_font_size);?>;
    --jl-menu-font-weight: <?php echo esc_attr($shareblock_menu_font_weight);?>;
    --jl-menu-transform: <?php echo esc_attr($shareblock_menu_transform);?>;
    --jl-menu-space: <?php echo esc_attr($letter_spacing_menu);?>;
    --jl-submenu-font-size: <?php echo esc_attr($shareblock_sub_menu_font_size);?>;
    --jl-submenu-font-weight: <?php echo esc_attr($shareblock_sub_menu_font_weight);?>;
    --jl-submenu-transform: <?php echo esc_attr($sub_menu_transform);?>;
    --jl-submenu-space: <?php echo esc_attr($sub_spacing_menu);?>;
    --jl-cat-font-size: <?php echo esc_attr($shareblock_cat_font_size);?>;
    --jl-cat-font-weight: <?php echo esc_attr($shareblock_cat_font_weight);?>;
    --jl-cat-font-space: <?php echo esc_attr($letter_spacing_cat);?>;
    --jl-cat-transform: <?php echo esc_attr($shareblock_cat_transform);?>;
    --jl-meta-font-size: <?php echo esc_attr($shareblock_meta_font_size);?>;
    --jl-meta-font-weight: <?php echo esc_attr($shareblock_meta_font_weight);?>;
    --jl-meta-font-space: <?php echo esc_attr($letter_spacing_meta);?>;
    --jl-meta-transform: <?php echo esc_attr($shareblock_meta_transform);?>;
    --jl-button-font-size: <?php echo esc_attr($shareblock_button_font_size);?>;
    --jl-button-font-weight: <?php echo esc_attr($shareblock_button_font_weight);?>;
    --jl-button-transform: <?php echo esc_attr($shareblock_button_transform);?>;
    --jl-button-space: <?php echo esc_attr($letter_spacing_button);?>;
    --jl-loadmore-font-size: <?php echo esc_attr($shareblock_loadmore_font_size);?>;
    --jl-loadmore-font-weight: <?php echo esc_attr($shareblock_loadmore_font_weight);?>;
    --jl-loadmore-transform: <?php echo esc_attr($shareblock_loadmore_transform);?>;
    --jl-loadmore-space: <?php echo esc_attr($letter_spacing_loadmore);?>;
    --jl-main-color: <?php echo esc_attr($color);?>;
    --jl-single-color: <?php echo esc_attr($single_color);?>;
    --jl-space-bar: <?php echo esc_attr($space_bar);?>;
    --jl-border-rounded: <?php echo esc_attr($border_rounded);?>;
    
    --jl-topbar-des-size: <?php echo esc_attr($jl_topbar_dec_size);?>;
    --jl-topbar-btn-size: <?php echo esc_attr($jl_topbar_btn_size);?>;
    --jl-topbar-btn-space: <?php echo esc_attr($jl_topbar_btn_space);?>;
    --jl-topbar-btn-transform: <?php echo esc_attr($jl_topbar_btn_tranform);?>;

    --jl-cookie-des-size: <?php echo esc_attr($jl_cookie_dec_size);?>;
    --jl-cookie-btn-size: <?php echo esc_attr($jl_cookie_btn_size);?>;
    --jl-cookie-btn-space: <?php echo esc_attr($jl_cookie_btn_space);?>;
    --jl-cookie-btn-transform: <?php echo esc_attr($jl_cookie_btn_tranform);?>;
    
}
<?php
if(function_exists('shareblock_bac_PostViews')){
$jl_cus_font = $shareblock_menu_font_family.','.$shareblock_p_font_family.','.$shareblock_title_font_family;
$jl_cus_font_arr = explode( ',', $jl_cus_font );
$jl_cus_font_unique = array_unique($jl_cus_font_arr);           
    if (strpos($jl_cus_font, 'jl_c_') !== false) {
        $fonts = shareblock_font_tax::shareblock_get_fonts();         
        foreach ( $fonts as $font => $values ){
            foreach ($jl_cus_font_unique as $font_text) {
                 if($font_text == 'jl_c_'.$font ){             
                ?>
                @font-face {
                  font-family: '<?php echo esc_attr('jl_c_'.$font);?>';
                  <?php if(!empty($values['font_eot-0'])){?>
                  src: url('<?php echo esc_url($values['font_eot-0']);?>');
                  <?php }?>
                  src:<?php if(!empty($values['font_eot-0'])){?> url('<?php echo esc_url($values['font_eot-0']);?>?#iefix') format('embedded-opentype'),
                       <?php }
                       if(!empty($values['font_woff_2-0'])){?>
                       url('<?php echo esc_url($values['font_woff_2-0']);?>') format('woff2'),
                       <?php }
                       if(!empty($values['font_woff-0'])){?>
                       url('<?php echo esc_url($values['font_woff-0']);?>') format('woff'),
                       <?php }
                       if(!empty($values['font_ttf-0'])){?>
                       url('<?php echo esc_url($values['font_ttf-0']);?>')  format('truetype'),
                       <?php }
                       if(!empty($values['font_svg-0'])){?>
                       url('<?php echo esc_url($values['font_svg-0']);?>#<?php echo esc_attr('jl_c_'.$font);?>') format('svg');
                       <?php }?>
                }
<?php }}}}}?>
<?php if(! empty($jl_hide_menu)){?>
.navigation_wrapper{display: none;}
<?php }?>
<?php if(! empty($jl_half_screen)){?>
@media only screen and (min-width: 1022px) {
.jl_header_tp .header-wraper{width: 50%;}
.jl_header_tp.jl_nav_stick .jl_r_menu{display: none !important;}
.jl_header_tp .header-wraper{position: fixed; top:10px;}
.header_magazine_full_screen.jl_head6 .container{padding: 0px 30px;}
}
<?php }?>
<?php if(! empty($jl_hide_footer)){?>
#footer-container{display: none;}
<?php }?>
<?php if(! empty($jl_page_padding)){?>
body{padding: <?php echo esc_attr($jl_page_padding);?>; background: <?php echo esc_attr($jl_body_bg);?>;}
@media only screen and (min-width: 768px) and (max-width: 992px) {body{padding: 30px !important;}}
@media only screen and (max-width: 767px) {body{padding: 0px !important;background: transparent !important;}}
<?php }?>
<?php if(! empty(get_theme_mod('logo_width'))){?>
.logo_small_wrapper_table .logo_small_wrapper a img, .headcus5_custom.header_layout_style5_custom .logo_link img, .jl_logo6 .logo_link img, .jl_head_lobl.header_magazine_full_screen .logo_link img{max-height: inherit; max-width: inherit; width: <?php echo esc_attr(get_theme_mod('logo_width'));?>;}
<?php }?>
<?php if(! empty(get_theme_mod('m_logo_width'))){?>
@media only screen and (max-width:767px) {
.logo_small_wrapper_table .logo_small_wrapper a img, .headcus5_custom.header_layout_style5_custom .logo_link img, .jl_logo6 .logo_link img, .jl_head_lobl.header_magazine_full_screen .logo_link img{max-height: inherit; max-width: inherit; width: <?php echo esc_attr(get_theme_mod('m_logo_width'));?>;}
}
<?php }?>
<?php if(! empty(get_theme_mod('f_logo_width'))){?>
.jl_ft_mini .footer-logo-holder img{width: <?php echo esc_attr(get_theme_mod('f_logo_width'));?>;}
<?php }?>
<?php if(! empty(get_theme_mod('s_logo_width'))){?>
.jl_mobile_nav_wrapper .logo_small_wrapper_table .logo_small_wrapper img{max-height: inherit; max-width: inherit; width: <?php echo esc_attr(get_theme_mod('s_logo_width'));?>;}
<?php }?>
<?php if ($large_post_font_size) {?>
.grid-sidebar .box .jl_post_title_top .image-post-title, .grid-sidebar .blog_large_post_style .post-entry-content .image-post-title, .grid-sidebar .blog_large_post_style .post-entry-content h1, .blog_large_post_style .post-entry-content .image-post-title, .blog_large_post_style .post-entry-content h1, .blog_large_overlay_post_style.box .post-entry-content .image-post-title a{font-size: <?php echo esc_attr($large_post_font_size);?> !important; }
<?php }?>
<?php if ($grid_post_font_size) {?>
.grid-sidebar .box .image-post-title, .show3_post_col_home .grid4_home_post_display .blog_grid_post_style .image-post-title{font-size: <?php echo esc_attr($grid_post_font_size);?> !important; }
<?php }?>
<?php if ($list_post_font_size) {?>
.sd{font-size: <?php echo esc_attr($list_post_font_size);?> !important; }
<?php }?>
<?php
$footer_bg_color = get_theme_mod('footer_bg_color');
$footer_text_color = get_theme_mod('footer_text_color');
if ($footer_bg_color) {?>
.jl_ft_mini, .jl_ft_mini .footer-bottom{background: <?php echo esc_attr($footer_bg_color);?> !important;}
.jl_ft_mini .cp_txt, #menu-footer-menu li a, .footer-columns *, .footer-columns a, .ft_s2.jl_ft_mini .social_icon_header_top li a i, .ft_s2.jl_ft_mini .social_icon_header_top li a:hover i{color: <?php echo esc_attr($footer_text_color);?> !important;}
.enable_footer_columns_dark, .enable_footer_copyright_dark{background: <?php echo esc_attr($footer_bg_color);?> !important;}
.enable_footer_columns_dark .widget_categories ul li, .widget_nav_menu ul li, .widget_pages ul li, .widget_categories ul li{border-bottom: 1px solid rgba(0,0,0,.1) !important;}
<?php }?>
<?php
$footer_bg_dark = get_theme_mod('footer_bg_dark');
$footer_text_dark = get_theme_mod('footer_text_dark');
if ($footer_bg_dark) {?>
.options_dark_skin .jl_ft_mini, .options_dark_skin .jl_ft_mini .footer-bottom{background: <?php echo esc_attr($footer_bg_dark);?> !important;}
.options_dark_skin .jl_ft_mini .cp_txt, .options_dark_skin #menu-footer-menu li a{color: <?php echo esc_attr($footer_text_dark);?> !important;}
<?php }?>
<?php
$footer_bg_dark = get_theme_mod('footer_bg_dark');
if ($footer_bg_dark) {?>
.options_dark_skin .enable_footer_columns_dark, .options_dark_skin .enable_footer_copyright_dark{background: <?php echo esc_attr($footer_bg_dark);?> !important;}
<?php }?>
.h_ss_share .jl_content{max-width: 100%;}
.jl_post_meta span:first-child:before{display: none;}
.jl_box_c { display: block; }
.jl_box_w { display: grid; grid-column-gap: 30px; grid-row-gap: 30px; }
.d_col3.jl_box_w { grid-template-columns: repeat(3,minmax(0,1fr)); }
.d_col4.jl_box_w{ grid-template-columns: repeat(4,minmax(0,1fr)); }
.d_col5.jl_box_w{ grid-template-columns: repeat(5,minmax(0,1fr)); }
.jl_box_info { position: relative; height: 200px; display: flex; align-items: center; justify-content: center; }
.jl_box_info .jl_box_title { position: absolute; z-index: 2; margin: 0px; background: #fff; padding: 5px 10px 5px 10px; font-size: 11px; }
.jl_box_info .jl_box_link { width: 100%; height: 100%; top: 0px; left: 0px; position: absolute; z-index: 3; }
.jl_box_info .jl_box_bg { z-index: 1; display: block; height: 100%; width: 100%; }
.jl_box_info .jl_box_bg img{ width: 100% !important; height: 100% !important; -o-object-fit: cover; object-fit: cover; position: absolute; top: 0px; left: 0px; }
.jl-post-image-caption{font-size: 12px; position: absolute; bottom: 0px; right: 0px; color: #fff; padding: 1px 5px; background: rgba(0,0,0,0.3); z-index: 99;}
<?php if(get_theme_mod('disable_s_share_fb') ==1){?>
.post_s .jl_share_wrapper, .jl_sfoot .jl_share_wrapper{display: none !important;}
<?php }?>
<?php if(get_theme_mod('disable_s_share_fb') ==1){?>
.jl_single_share_wrapper .single_post_share_facebook{display: none !important;}
<?php }?>
<?php if(get_theme_mod('disable_s_share_tw') ==1){?>
.jl_single_share_wrapper .single_post_share_twitter{display: none !important;}
<?php }?>
<?php if(get_theme_mod('disable_s_share_pin') ==1){?>
.jl_single_share_wrapper .single_post_share_pinterest{display: none !important;}
<?php }?>
<?php if(get_theme_mod('disable_s_share_in') ==1){?>
.jl_single_share_wrapper .single_post_share_linkedin{display: none !important;}
<?php }?>
<?php if(get_theme_mod('disable_s_share_mail') ==1){?>
.jl_single_share_wrapper .single_post_share_mail{display: none !important;}
<?php }?>
.postnav_w .jl_navpost .jl_cpost_title{font-size:<?php echo get_theme_mod('shareblock_nav_post_size', '15px');?>}
.related-posts .text-box h3{font-size:<?php echo get_theme_mod('shareblock_related_size', '16px');?>}
<?php
$categories_widget_color = get_terms('category');
        if ($categories_widget_color) {
            foreach( $categories_widget_color as $tag) {
              $tag_link = get_category_link($tag->term_id);
              $title_bg_Color = get_term_meta($tag->term_id, "category_bgcolor_options", true);
             echo '.cat-item-'.$tag->term_id.' span{background: '.$title_bg_Color.' !important;}';
            }
        }
?>