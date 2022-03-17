<div class="jl_single_style1">
    <div class="single_post_entry_content single_bellow_left_align jl_top_single_title jl_top_title_feature">
        <?php shareblock_post_cat(get_the_ID());?>
        <h1 class="single_post_title_main">
            <?php the_title()?>
        </h1>
        <div class="jl_mt_wrap">
        <?php shareblock_post_meta(get_the_ID());?>                        
      </div>
    </div>
    <div class="single_content_header jl_single_feature_below">
            <div class="image-post-thumb jlsingle-title-above">
                <?php $cus_ipfs = get_post_meta( get_the_ID(), 'cus_ipfs', true );
                  if ($cus_ipfs =='') {
                  }else{?>
                  <img src="<?php echo $cus_ipfs;?>">                    
                  <?php }?>
            </div>
            
        </div>
    </div>