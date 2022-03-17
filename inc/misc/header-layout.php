<div class="header_wraper_b"></div>
<header class="header-wraper header_magazine_full_screen header_magazine_full_screen jl_topa_menu_sticky options_dark_header jl_cus_sihead jl_base_menu">
    <div class="menu_wrapper">
    <div class="container">
            <div class="row">
                <div class="col-md-12">    
                    <div class="jl_hwrap jl_clear_at">    
        <!-- begin logo -->
        <div class="logo_small_wrapper_table">
            <div class="logo_small_wrapper">
                <!-- begin logo -->
                            <a class="logo_link" href="<?php echo esc_url(home_url('/')); ?>">
                                <?php $logo_n = get_theme_mod('shareblock_logo'); ?>
                                <?php if (!empty($logo_n)): ?>
                                <img class="jl_logo_n" src="<?php echo esc_url($logo_n); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php else: ?>
                                <img class="jl_logo_n" src="<?php echo esc_url(get_template_directory_uri().'/img/logo_n.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php endif; ?>
                                <?php $logo_w = get_theme_mod('shareblock_logow'); ?>
                                <?php if (!empty($logo_w)): ?>
                                <img class="jl_logo_w" src="<?php echo esc_url($logo_w); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php else: ?>
                                <img class="jl_logo_w" src="<?php echo esc_url(get_template_directory_uri().'/img/logo_w.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php endif; ?>
                            </a>
                            <!-- end logo -->
            </div>
        </div>
        <!-- end logo -->
        <!-- main menu -->
        <div class="menu-primary-container navigation_wrapper header_layout_style1_custom">
            <?php if ( has_nav_menu( 'main_menu' ) ){ ?>
            <?php $main_menu = array( 'theme_location' => 'main_menu', 'container' => '', 'menu_class' => 'jl_main_menu', 'menu_id' => 'mainmenu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
            <?php }else{ ?>
            <?php if ( current_user_can( 'manage_options' ) ){ ?>
            <ul id="mainmenu" class="jl_main_menu">
                <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                        <?php esc_html_e( 'Click here to add navigation menu', 'shareblock' ); ?></a></li>
            </ul>
            <?php }}?>

            <div class="clearfix"></div>
        </div>
        <!-- end main menu -->
        <div class="search_header_menu jl_nav_mobile">
                        <div class="menu_mobile_icons <?php if(!empty(get_theme_mod('disable_mb_nav'))){echo 'jl_desk_hide';}?>"><div class="jlm_w"><span class="jlma"></span><span class="jlmb"></span><span class="jlmc"></span></div></div>
<?php
$jl_dn_option = isset( $_COOKIE['jlmode_dn'] ) ? $_COOKIE['jlmode_dn'] : '';
if ( $jl_dn_option ) {?>
    <div class="jl_login_btn" id="btn-login">
<?php }else{?>
    <div class="jl_login_btn" id="btn-login">
<?php }?>
<span class="h_lico">
<svg version="1.1" viewBox="0 0 752 752" xmlns="http://www.w3.org/2000/svg">
 <path d="m376 168.81c-54.949 0-107.65 21.832-146.5 60.688-38.855 38.855-60.688 91.555-60.688 146.5 0 54.953 21.832 107.65 60.688 146.51 38.855 38.855 91.555 60.684 146.5 60.684 54.953 0 107.65-21.828 146.51-60.684 38.855-38.855 60.684-91.555 60.684-146.51 0-36.367-9.5703-72.098-27.758-103.59-18.184-31.496-44.34-57.652-75.836-75.84-31.496-18.184-67.227-27.758-103.6-27.758zm-103.59 351.34c0-37.012 19.746-71.211 51.797-89.719 32.055-18.504 71.543-18.504 103.6 0 32.051 18.508 51.797 52.707 51.797 89.719-30.141 21.809-66.395 33.551-103.6 33.551s-73.457-11.742-103.59-33.551zm235.61-25.75h-2.0703c-8.9297-39.633-35.453-73.02-72.035-90.68s-79.227-17.66-115.81 0c-36.582 17.66-63.109 51.047-72.035 90.68h-2.0703c-30.785-34.211-47.09-79.035-45.473-125.03 1.6133-45.996 21.02-89.566 54.129-121.53 33.105-31.965 77.332-49.832 123.35-49.832 46.023 0 90.246 17.867 123.36 49.832s52.516 75.535 54.129 121.53c1.6172 45.992-14.688 90.816-45.473 125.03zm-132.01-266.39c-19.625 0-38.445 7.7969-52.324 21.672-13.875 13.879-21.672 32.699-21.672 52.324s7.7969 38.445 21.672 52.324c13.879 13.879 32.699 21.672 52.324 21.672s38.449-7.793 52.324-21.672c13.879-13.879 21.676-32.699 21.676-52.324s-7.7969-38.445-21.676-52.324c-13.875-13.875-32.699-21.672-52.324-21.672zm0 118.39c-11.773 0-23.066-4.6758-31.395-13.004-8.3242-8.3242-13.004-19.617-13.004-31.395 0-11.773 4.6797-23.066 13.004-31.395 8.3281-8.3242 19.621-13.004 31.395-13.004 11.777 0 23.07 4.6797 31.395 13.004 8.3281 8.3281 13.004 19.621 13.004 31.395 0 11.777-4.6758 23.07-13.004 31.395-8.3242 8.3281-19.617 13.004-31.395 13.004z"/>
</svg></span>
<span class="btn-span">
<?php
$jl_dn_option = isset( $_COOKIE['jlmode_dn'] ) ? $_COOKIE['jlmode_dn'] : '';
if ( $jl_dn_option ) {
    echo '<span class="uids" id="login_info">'.$jl_dn_option.'</span>';
}else{
    echo '<span id="login_info">Login</span>';
}
?>
</span>
</div>
                        <a href="<?php echo esc_url(home_url('/upload-media')); ?>" class="jl_upload_img">
                            <svg version="1.1" viewBox="0 0 752 752" xmlns="http://www.w3.org/2000/svg">
 <g>
  <path d="m490.7 302.66c-8.5898-34.34-32.109-63.023-64.102-78.172-31.992-15.152-69.086-15.172-101.09-0.058594s-55.562 43.77-64.195 78.098c-40.805 3.8281-76.73 28.492-94.965 65.195-18.238 36.707-16.191 80.234 5.4062 115.07 21.598 34.836 59.672 56.023 100.66 56.008h44.398c5.2852 0 10.172-2.8203 12.816-7.3984 2.6445-4.5781 2.6445-10.219 0-14.797-2.6445-4.582-7.5312-7.4023-12.816-7.4023h-44.398c-31.723 0.09375-61.09-16.746-77.031-44.172-15.941-27.43-16.039-61.277-0.25781-88.797 15.781-27.52 45.047-44.531 76.77-44.625 3.7969 0.28906 7.5664-0.84766 10.574-3.1836 3.0078-2.3359 5.043-5.7031 5.707-9.4531 4.0508-28.418 21.609-53.113 47.117-66.273 25.508-13.164 55.809-13.164 81.316 0 25.508 13.16 43.062 37.855 47.117 66.273 0.77344 3.6211 2.7773 6.8594 5.6758 9.1641 2.8945 2.3047 6.5 3.5312 10.203 3.4727 31.723 0 61.039 16.926 76.898 44.398 15.863 27.477 15.863 61.324 0 88.797-15.859 27.477-45.176 44.398-76.898 44.398h-44.398c-5.2891 0-10.172 2.8203-12.816 7.4023-2.6445 4.5781-2.6445 10.219 0 14.797 2.6445 4.5781 7.5273 7.3984 12.816 7.3984h44.398c40.68-0.42578 78.293-21.707 99.605-56.359 21.316-34.652 23.344-77.824 5.375-114.32-17.969-36.5-53.418-61.219-93.883-65.457z"/>
  <path d="m439.54 430.86c3.7578 3.6289 9.1562 5.0078 14.195 3.6289 5.0391-1.3828 8.9766-5.3203 10.359-10.359 1.3828-5.043 0.003906-10.438-3.6289-14.195l-73.996-73.996v-0.003906c-2.7773-2.7734-6.5391-4.332-10.465-4.332-3.9219 0-7.6875 1.5586-10.461 4.332l-73.996 73.996v0.003906c-3.6328 3.7578-5.0117 9.1523-3.6289 14.195 1.3828 5.0391 5.3203 8.9766 10.359 10.359 5.0391 1.3789 10.434 0 14.195-3.6289l48.734-48.734v186.27c0 5.2852 2.8203 10.172 7.3984 12.816 4.5781 2.6445 10.219 2.6445 14.801 0 4.5781-2.6445 7.3984-7.5312 7.3984-12.816v-186.27z"/>
 </g>
</svg>Upload</a>
                        <?php
                        get_template_part( 'inc/misc/section', 'basket' );
                        get_template_part( 'inc/misc/section', 'switch' );
                        ?>                        
                    </div>
    </div>
    </div>
</div>
</div>
</div>
</header>