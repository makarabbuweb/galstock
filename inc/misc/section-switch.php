<?php if(get_theme_mod('enable_dark_mode')==1){?>
<div class="shareblock_day_night <?php $jl_dn_option = isset( $_COOKIE['jlmode_dn'] ) ? $_COOKIE['jlmode_dn'] : '';if ( 'true' === $jl_dn_option ) {echo 'jl_night_en';}else{echo 'jl_day_en';}?>">
	<span class="jl-night-toggle-icon">
		<span class="jl_moon">
			<i class="jli-moon"></i>
		</span>
		<span class="jl_sun">
			<i class="jli-sun"></i>
		</span>
	</span>
</div>
<?php }?>