<div class="menu-primary-container navigation_wrapper jl_cus_share_mnu">
                        <?php if ( has_nav_menu( 'main_menu' ) ){ ?>
                        <?php $main_menu = array('walker' => new jellywp_walker(), 'theme_location' => 'main_menu', 'container' => '', 'menu_class' => 'jl_main_menu', 'menu_id' => 'mainmenu', 'fallback_cb' => false, 'link_after'=>'<span class="border-menu"></span>'); wp_nav_menu($main_menu);?>
                        <?php }else{ ?>
                        <?php if ( current_user_can( 'manage_options' ) ){ ?>
                        <ul id="mainmenu" class="jl_main_menu">
                            <li><a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?>">
                                    <?php esc_html_e( 'Click here to add main menu', 'shareblock' ); ?>
                                </a>
                            </li>
                        </ul>
                        <?php }}?>
</div>