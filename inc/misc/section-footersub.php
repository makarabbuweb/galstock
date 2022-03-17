<div class="footer-bottom enable_footer_copyright_dark jl_ft_mini">
        <div class="container">
            <div class="row bottom_footer_menu_text">
                <div class="col-md-12">
                    <div class="jl_ft_cw">
                    <div class="footer-logo-holder">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php $logo_f = get_theme_mod('shareblock_flogo'); ?>
                    <?php if (!empty($logo_f)): ?>
                                <img class="jl_logo_w" src="<?php echo esc_url($logo_f); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php else: ?>
                                <img class="jl_logo_w" src="<?php echo esc_url(get_template_directory_uri().'/img/logo_w.png'); ?>" alt="<?php bloginfo('description'); ?>" />
                                <?php endif; ?>
                    </a>
                    </div>                    
                    <?php if ( has_nav_menu( 'footer_menu' ) ){ ?>
                    <?php $footer_menu = array('theme_location' => 'footer_menu', 'depth' => 1, 'container' => false, 'menu_class' => 'menu-footer', 'menu_id' => 'menu-footer-menu', 'fallback_cb' => false ); wp_nav_menu($footer_menu); ?>
                    <?php }else{ ?>
                        <?php if ( current_user_can( 'manage_options' ) ){ ?>
                        <ul id="menu-footer-menu" class="menu-footer">
                            <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                                    <?php esc_html_e( 'Click here to add footer menu', 'shareblock' ); ?></a></li>
                        </ul>
                        <?php }}?>
                        <div class="cp_txt"><?php echo wp_kses_post(get_theme_mod('jl_copyright')); ?></div>
                        <?php get_template_part( 'inc/misc/section', 'social' );?>                        
                </div>
                </div>
            </div>
        </div>
</div>