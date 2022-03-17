<div class="menu-primary-container navigation_wrapper">
                        <?php if ( has_nav_menu( 'top_menu' ) ){ ?>
                        <?php $top_menu = array('theme_location' => 'top_menu', 'container' => '', 'menu_class' => 'jl_main_menu', 'menu_id' => 'jl_top_menu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($top_menu);?>
                        <?php }else{ ?>
                        <?php if ( current_user_can( 'manage_options' ) ){ ?>
                        <ul id="jl_top_menu" class="jl_main_menu">
                            <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                                    <?php esc_html_e( 'Click here to add top menu', 'shareblock' ); ?></a></li>
                        </ul>
                        <?php }}?>
</div>