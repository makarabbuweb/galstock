<div id="content_nav" class="jl_mobile_nav_wrapper">
            <div id="nav" class="jl_mobile_nav_inner">
               <div class="logo_small_wrapper_table">
                        <div class="logo_small_wrapper">
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
                        </div>
                        </div>
               <div class="menu_mobile_icons mobile_close_icons closed_menu"><span class="jl_close_wapper"><span class="jl_close_1"></span><span class="jl_close_2"></span></span></div>
               <?php if ( has_nav_menu( 'main_menu' ) ){?>
               <?php $main_menu = array('theme_location' => 'main_menu', 'container' => '', 'menu_class' => 'menu_moble_slide', 'menu_id' => 'mobile_menu_slide', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
               <?php }else{ ?>
               <?php if ( current_user_can( 'manage_options' ) ){ ?>
               <ul id="mobile_menu_slide" class="menu_moble_slide">
                  <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                     <?php esc_html_e( 'Click here to add mobile menu', 'shareblock' ); ?></a>
                  </li>
               </ul>
               <?php }}?>
               <?php if (is_active_sidebar('mobile-menu-sidebar')) : dynamic_sidebar('mobile-menu-sidebar'); endif; ?>
            </div>
            <div class="nav_mb_f">
            <?php get_template_part( 'inc/misc/section', 'social' );?>                        
            <div class="cp_txt"><?php echo wp_kses_post(get_theme_mod('jl_copyright')); ?></div>
            </div>            
         </div>
         <div class="search_form_menu_personal">
            <div class="menu_mobile_large_close"><span class="jl_close_wapper search_form_menu_personal_click"><span class="jl_close_1"></span><span class="jl_close_2"></span></span></div>
            <?php get_search_form(); ?>
         </div>
         <div class="mobile_menu_overlay"></div>