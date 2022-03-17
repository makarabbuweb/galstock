<?php
if ( ! class_exists( 'Woocommerce' ) || ! function_exists( 'wc_get_cart_url' ) || ! function_exists( 'is_cart' ) || is_cart() ) {
	return false;
}
?>
	<div class="jl_h_cart nav-cart is-hover">
		<a class="jl_l_cart cart-link" href="<?php echo esc_url( wc_get_cart_url() ) ?>" title="<?php echo esc_attr( 'view cart', 'shareblock' ); ?>">
			<span class="jl_i_cart"><i class="jli-bag"></i><em class="cart-counter jl_count_cart"><?php echo esc_attr( WC()->cart->cart_contents_count ); ?></em></span>
		</a>
		<?php if ( function_exists( 'woocommerce_mini_cart' ) ): ?>
			<div class="jl-nav-cart jl-hshow">
				<div class="jl-cart-wrap woocommerce">
					<div class="widget_shopping_cart_content">
						<?php woocommerce_mini_cart(); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
</div>
