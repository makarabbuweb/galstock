<div <?php post_class( 'jl_m_right jl_m_list jl_clear_at');?>>
            <div class="jl_m_right_w">
                <div class="jl_m_right_img jl_radus_e">
                  <a href="<?php the_permalink(); ?>">
                  <?php $cus_ipfs = get_post_meta( get_the_ID(), 'cus_ipfs', true );
                  if ($cus_ipfs =='') {
                  }else{?>
                  <img src="<?php echo $cus_ipfs;?>">                    
                  <?php }?>
                  </a></div>
                <div class="jl_m_right_content">          
                  <?php shareblock_post_cat(get_the_ID());?>
                        <h2 class="entry-title"> <a href="<?php the_permalink(); ?>" tabindex="-1"><?php the_title()?></a></h2>
                        <?php shareblock_post_meta(get_the_ID());?>                        

      </div>
    </div>
</div>