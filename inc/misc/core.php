<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'shareblock_blog_param' ) ) {
  function shareblock_blog_param() {
    global $wp_query;
    $str   = '';
    $param = array();
    $cur_cat_id = get_query_var('cat');
    $cat_head = get_term_meta( $cur_cat_id, 'shareblock_cat_featured_op', true);          
    if ($cat_head == 'style_1'){
    $offset = 3;
    }elseif($cat_head == 'style_2'){
    $offset = 2;
    }elseif($cat_head == 'style_4'){
    $offset = 5;
    }elseif($cat_head == 'style_7'){
    $offset = 3;
    }elseif($cat_head == 'style_9'){
    $offset = 1;
    }else{
    $offset = NULL;
    }
    $param['data-page_current'] = 1;
    if ( get_query_var( 'paged' ) ) {
      $param['data-page_current'] = get_query_var( 'paged' );
    } elseif ( get_query_var( 'page' ) ) {
      $param['data-page_current'] = get_query_var( 'page' );
    }

    if ( ! empty( $wp_query->max_num_pages ) ) {
      $param['data-page_max'] = $wp_query->max_num_pages;
    }    
    $param['data-posts_per_page'] = get_option('posts_per_page');
    if ( $offset != NULL) {
    $param['data-offset'] = $offset;
    }
    $param['data-order'] = 'date_post';
    $param['data-section_style'] = 'jl_cat_list';
    if ( is_author() ) {
      $param['data-author'] = get_the_author_meta( 'ID' );
    } elseif ( is_tag() ) {
      $param['data-tags'] = single_tag_title( '', false );
    } elseif ( is_category() ) {
      global $wp_query;
      $param['data-categories'] = $wp_query->get_queried_object_id();
    }

    foreach ( $param as $k => $v ) {
      if ( ! empty( $k ) ) {
        $str .= esc_attr( $k ) . '= ' . esc_attr( $v ) . ' ';
      }
    }
    return $str;
  }
}
if ( ! function_exists( 'shareblock_cat_listing' ) ) :
    function shareblock_cat_listing( $module = array(), $query_data = null ) {
        
        if ( method_exists( $query_data, 'have_posts' ) ) :
            $counter = 1;
            while ( $query_data->have_posts() ) :
                $query_data->the_post();                
                get_template_part( 'inc/misc/content', 'list' );
            endwhile;           
        endif;
    }
endif;

if ( ! function_exists( 'shareblock_search_opt' ) ) {    
function shareblock_search_opt($query) {
    if ($query->is_search) {
        $query->set('post_type', array('post','page'));
    }
    return $query;
}
add_filter('pre_get_posts','shareblock_search_opt');
}

if ( !function_exists( 'shareblock_rm_type' ) ){
add_action( 'template_redirect', 'shareblock_rm_type' );
function shareblock_rm_type() {
  ob_start( function ( $type ) {
    return preg_replace( "%[ ]type=['\"]text\/(javascript|css)['\"]%", '', $type );
  } );
}
}

if ( ! function_exists( 'shareblock_rel' ) ) {
function shareblock_rel() {
if(get_theme_mod('disable_post_related') !=1){
                        $args = array(
                        'posts_per_page' => 3,
                        'post__not_in'   => array( get_the_ID() ),
                        'no_found_rows'  => true,
                        );
                        $cats = wp_get_post_terms( get_the_ID(), 'category' ); 
                        $cats_ids = array();  
                        foreach( $cats as $related_cat ) {
                            $cats_ids[] = $related_cat->term_id; 
                        }
                        if ( ! empty( $cats_ids ) ) {
                            $args['category__in'] = $cats_ids;
                        }
                        $post_query = new wp_query( $args );
                        if ( $post_query->have_posts() ) {
                        ?>
                        <div class="jl_relsec">
                        <div class="related-posts">
                        <h4><?php esc_html_e('Related Images', 'shareblock'); ?></h4>
                        <div class="single_related_post">
                        <?php
                        while ( $post_query->have_posts() ) {
                            $post_query->the_post();
                            $post_id = get_the_ID();
                            $categories = get_the_category(get_the_ID());
                            shareblock_rgrid();
                        }?>
                        </div>
                        </div>
                        </div>
<?php }
wp_reset_postdata();
}}}
if ( ! function_exists( 'shareblock_rgrid' ) ) {
function shareblock_rgrid() {?>
<div <?php post_class( 'box jl_grid_layout1 blog_grid_post_style');?>>
      <div class="jl_grid_w <?php if ( has_post_thumbnail()) {echo 'jl_has_img';}else{echo 'jl_none_img';}?>">                              
          <div class="jl_img_box jl_radus_e">
          <?php echo shareblock_post_type();?>
          <a href="<?php the_permalink(); ?>">
            <?php $cus_ipfs = get_post_meta( get_the_ID(), 'cus_ipfs', true );
                  if ($cus_ipfs =='') {
                  }else{?>
                  <img src="<?php echo $cus_ipfs;?>">                    
                  <?php }?>
          </a>
          </div>                 
          <div class="text-box">                                          
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h3>                                                
                        <?php shareblock_author_date_meta(get_the_ID());?>                                                
           </div>
       </div>
</div>
<?php }
}

if(!function_exists('shareblock_vid_wrap')){
    add_filter('embed_oembed_html', 'shareblock_vid_wrap', 10, 4);
    function shareblock_vid_wrap($html, $url, $attr, $post_ID) {
        if (strpos($url, 'youtube') !== false || strpos($url, 'vimeo') !== false || strpos($url, 'soundcloud') !== false) {
            $html = '<div class="jlvid_container">'.$html.'</div>';
        }
        return $html;
    }
}

function insta_embed($string) {
    $pattern = '@(http|https)://(www\.)?instagram[^\s]*@i';
    $matches = array();
    preg_match_all($pattern, $string, $matches);
    foreach ($matches[0] as $match) {
        $string = str_replace($match, '
            <div class="instagram-wrapper">
            <blockquote style="display:none;" class="instagram-media" data-instgrm-permalink="' . $match . '">
            </blockquote></div>', $string);
    }
    return $string;
}
add_filter( 'the_content', 'insta_embed' );

if ( !function_exists( 'shareblock_generate_dynamic_css' ) ){
    function shareblock_generate_dynamic_css() {
        ob_start();
        get_template_part( 'inc/misc/dynamic-css' );
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}

function shareblock_sanitize_wp_kses( $data ) {
    return wp_kses( $data, array(
        'a' => array(
            'href'  => array(),
            'class'  => array(),
            'style'    => array(),
            'id'  => array(),
            'target'  => array(),
            'rel' => array(),
            'data-format' => array(),
            'class' => array(),
            'data-source' => array(),
            'data-type' => array(),
            'data-src' => array(),
            'title' => array(),
        ),
        'span' => array(
            'class' => array(),
            'id'    => array(),
            'style'    => array(),
        ),
        'p' => array(
            'class' => array(),
            'id'    => array(),
            'style'    => array(),
            'br'    => array(),
            'a' => array(
                'href'  => array(),
                'class'  => array(),
                'style'    => array(),
                'id'  => array(),
                'target'  => array(),
                'rel' => array(),
                'data-format' => array(),
                'class' => array(),
                'data-source' => array(),
                'data-type' => array(),
                'data-src' => array(),
                'title' => array(),
            ),
        ),
        'h1' => array(
            'class' => array(),
            'id'    => array(),
            'style'    => array(),
        ),
        'h2' => array(
            'class' => array(),
            'id'    => array(),
            'style'    => array(),
        ),
        'h3' => array(
            'class' => array(),
            'id'    => array(),
            'style'    => array(),
        ),
        'h4' => array(
            'class' => array(),
            'id'    => array(),
            'style'    => array(),
        ),
        'h5' => array(
            'class' => array(),
            'id'    => array(),
            'style'    => array(),
        ),
        'img' => array(
            'src'    => array(),
            'srcset' => array(),
            'alt'    => array(),
        ),
        'div' => array(
            'class' => array(),
            'id'    => array(),
            'style'    => array(),
        ),
        'i' => array(
            'class' => array(),
            'id'    => array(),
            'style'    => array(),
        ),
        'u' => array(
            'class' => array(),
            'id'    => array(),
            'style'    => array(),
        ),
        'br'     => array(),
        'b'     => array(
            'style'    => array(),
        ),
        'em'     => array(
            'class' => array(),
            'style'    => array(),
        ),
        'ul'     => array(
            'class' => array(),
            'style'    => array(),
        ),
        'ol'     => array(
            'class' => array(),
            'style'    => array(),
        ),
        'li'     => array(
            'class' => array(),
            'style'    => array(),
        ),
        'strong' => array(
            'class' => array(),
            'style'    => array(),
        ),
        'italic' => array(
            'class' => array(),
            'style'    => array(),
        ),
        'iframe'  => array(
            'class' => array(),
            'id'    => array(),
            'src'    => array(),
            'width'    => array(),
            'style'    => array(),
            'height'    => array(),
        ),
    ));
}

function shareblock_review_score($num, $type, $star = false) {    
    switch ($type) :
      case 'star' :
        if(!$star == false){
          if ( $num <= 2 ) $output = '<span class="jl_star_val">'.$num.'</span><span title="1 star"><i class="jli-star-full"></i><i class="jli-star"></i><i class="jli-star"></i><i class="jli-star"></i><i class="jli-star"></i></span>';
          if ( $num > 2 && $num <= 4 ) 
          $output = '<span class="jl_star_val">'.$num.'</span><span title="2 stars"><i class="jli-star-full"></i><i class="jli-star-full"></i><i class="jli-star"></i><i class="jli-star"></i><i class="jli-star"></i></span>';
          if ( $num > 4 && $num <= 6 )
          $output = '<span class="jl_star_val">'.$num.'</span><span title="3 stars"><i class="jli-star-full"></i><i class="jli-star-full"></i><i class="jli-star-full"></i><i class="jli-star"></i><i class="jli-star"></i></span>';
          if ( $num > 6 && $num <= 8 ) 
          $output = '<span class="jl_star_val">'.$num.'</span><span title="4 stars"><i class="jli-star-full"></i><i class="jli-star-full"></i><i class="jli-star-full"></i><i class="jli-star-full"></i><i class="jli-star"></i></span>';
          if ( $num > 8 && $num <= 10 ) 
          $output = '<span class="jl_star_val">'.$num.'</span><span title="5 stars"><i class="jli-star-full"></i><i class="jli-star-full"></i><i class="jli-star-full"></i><i class="jli-star-full"></i><i class="jli-star-full"></i></span>';
        } else {
          $output = $num;
        }
        break;
      
      case 'letter' :
        if ( $num <= 2 ) $output = 'E';
        if ( $num > 2 && $num <= 4 ) $output = 'D';
        if ( $num > 4 && $num <= 6 ) $output = 'C';
        if ( $num > 6 && $num <= 8 ) $output = 'B';
        if ( $num > 8 && $num <= 10 ) $output = 'A';
        break;
      
      case 'percent';
        $output = $num * 10 . '<span class="jl_score_sign">%</span>';
        break;

      case 'percent_front';
        $output = $num * 10;
        break;  
      
      case 'number';
        $output = $num;
        break;
      
    endswitch;
    if(isset($output)){
    return $output;
    }
}

function shareblock_review_box($post_id, $class, $echo = true) {    
    $single_post_review = get_post_meta( $post_id, 'single_post_review', true );    
    $review_box_title = get_post_meta( $post_id, 'review_box_title', true );
    $review_summary = get_post_meta( $post_id, 'review_summary', true );
    $review_imageid = get_post_meta( $post_id, 'review_image', true );
    $review_color = get_post_meta( $post_id, 'review_color', true );
    $review_pos = get_post_meta( $post_id, 'review_pos', true );
    $review_neg = get_post_meta( $post_id, 'review_neg', true );    
    $rating_type = get_post_meta( $post_id, 'rating_type', true );
    $rating_type_front = esc_attr('percent_front');
    $rating_criteria = get_post_meta( $post_id, 'rating_criteria', true );    
    if($single_post_review){
    if(empty($rating_criteria)){
      $rating_criteria = '';
      $rating_criteria_count = '';
    }else{
      $rating_criteria_count = count($rating_criteria);
    }
    if(empty($review_color)){
      $review_color = esc_attr('#ffcd00');
    }    
    $score_array = array();
    if($rating_criteria){
      foreach ($rating_criteria as $criteria) {
        $score_array []= $criteria['score'];
      }
    }
    $final_score = array_sum($score_array);
    $final_score = $final_score / $rating_criteria_count;
    $final_score = number_format($final_score, 1, '.', '');

    $value = shareblock_review_score($final_score, $rating_type_front, true);
    $full = 180;
    if($value <= 50){
    $right = $value * 3.6;
    $right = $full-$right;
    $right = '-'. $right;
    }else{
    $right = 0; 
    }
    if($value > 50){
    $left = $value -50; 
    $left = $left * 3.6;
    $left = $full+$left;
    }else{
    $left = 0;  
    }
    
    $output = '';
    $output .= '<div id="jl-review-box">';
    $output .= '<div class="jl_score_h">';
    if (!empty($review_imageid)) {            
    $output .= wp_get_attachment_image( $review_imageid, 'shareblock_featurelarge', true );
    }
    $output .= '<div class="jl_score_main_w">';    
    $output .= '<div class="jl_score_main">';    
    if($rating_type == "star"){
    $output .= '<span class="jl_star_re_w"><span class="jl_star_re" style="background-color:'.$review_color.';">'.shareblock_review_score($final_score, $rating_type, true).'</span></span>';  
    }else{
    $output .= '<div class="container-donut">';
    $output .= '<div class="jl-renut-container">';
    $output .= '<div class="jl-renut">';
    $output .= '<div class="jl-renut-sections" style="transform: rotate(0deg);">';
    $output .= '<div class="jl-renut-section jl-renut-section-right" style="transform: rotate(0deg);">';
    $output .= '<div class="jl-renut-filler" style="background-color:'.$review_color.'; transform: rotate('.$right.'deg);">';
    $output .= '</div>';
    $output .= '</div>';
    if($value > 50){
    $output .= '<div class="jl-renut-section jl-renut-section-left" style="transform: rotate(0deg);">';
    $output .= '<div class="jl-renut-filler" style="background-color:'.$review_color.'; transform: rotate('.$left.'deg);">';
    $output .= '</div>';
    $output .= '</div>';
    }
    $output .= '</div>';
    $output .= '<div class="jl-renut-overlay">';
    $output .= '<div class="jl-renut-text">';
    $output .= '<div>';
    $output .= '<span>'.shareblock_review_score($final_score, $rating_type, true).'</span>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    }
    $output .= '</div>';    
    $output .= '<div class="review-ht">';      
    $output .= '<h5 class="itemreviewed">'.$review_box_title.'</h5>';    
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '<div class="jl_ideas_sum">';
    $output .= '<div class="jl_sub_title">';
    $output .= '<h6 class="jl_sum_title">'.esc_html__( 'Summary', 'shareblock' ).'</h6>';
    $output .= '<p>'.$review_summary.'</p>';    
    $output .= '</div>';
    if($review_pos){
      $output .= '<div class="jl_review_pros">';
      $output .= '<h6>'.esc_html('The Pros', 'shareblock').'</h6>';
      $output .= '<span>'.str_replace(array("\r","\n\n","\n"),array('',"\n","</span>\n<span>"),trim($review_pos,"\n\r")).'</span>';
      $output .= '</div>';
    }
    if($review_neg){
      $output .= '<div class="jl_review_cons">';
      $output .= '<h6>'.esc_html('The Cons', 'shareblock').'</h6>';
      $output .= '<span>'.str_replace(array("\r","\n\n","\n"),array('',"\n","</span>\n<span>"),trim($review_neg,"\n\r")).'</span>';
      $output .= '</div>';
    }
    $output .= '</div>';
    $output .= '<ul>';
    if($rating_criteria){
      foreach ($rating_criteria as $criteria) {
        $percentage_score = $criteria['score'] * 10;
        
        if($criteria['c_label'])
        $output .= '<li><div class="review-criteria-score clearfix"><span class="left">'.$criteria['c_label'].'</span><span class="right">'.shareblock_review_score($criteria['score'], $rating_type, true).'</span></div>';
        $output .= '<div class="review-criteria-bar-container"><div class="review-criteria-bar" style="background:'.$review_color.'; width:'.$percentage_score.'%"></div></div></li>';
        
      }
    }
    $output .= '</ul>';    
    $output .= '</div>';
    
    if($echo == 'true') :
    print '<span class="jl_none"></span>'.$output;
    else :
    return $output;
    endif;
    }
}
function shareblock_review_bar($post_id, $class, $echo = true) {   
    $single_post_review = get_post_meta( $post_id, 'single_post_review', true );    
    $review_box_title = get_post_meta( $post_id, 'review_box_title', true );
    $review_summary = get_post_meta( $post_id, 'review_summary', true );
    $review_color = get_post_meta( $post_id, 'review_color', true );
    $review_pos = get_post_meta( $post_id, 'review_pos', true );
    $review_neg = get_post_meta( $post_id, 'review_neg', true );        
    $rating_type = get_post_meta( $post_id, 'rating_type', true );
    if($rating_type == 'star'){
        $rating_type = esc_attr('number');  
    }else{
        $rating_type = get_post_meta( $post_id, 'rating_type', true );    
    }
    $rating_type_front = esc_attr('percent_front');
    $rating_criteria = get_post_meta( $post_id, 'rating_criteria', true );    
    if($single_post_review){
    if(empty($rating_criteria)){
      $rating_criteria = '';
      $rating_criteria_count = '';
    }else{
      $rating_criteria_count = count($rating_criteria);
    }
    if(empty($review_color)){
      $review_color = esc_attr('#ffcd00');
    }    
    $score_array = array();
    if($rating_criteria){
      foreach ($rating_criteria as $criteria) {
        $score_array []= $criteria['score'];
      }

    $final_score = array_sum($score_array);
    $final_score = $final_score / $rating_criteria_count;
    $final_score = number_format($final_score, 1, '.', '');

    $value = shareblock_review_score($final_score, $rating_type_front, true);

    $full = 180;
    if($value <= 50){
    $right = $value * 3.6;
    $right = $full-$right;
    $right = '-'. $right;
    }else{
    $right = 0; 
    }
    if($value > 50){
    $left = $value -50; 
    $left = $left * 3.6;
    $left = $full+$left;
    }else{
    $left = 0;  
    }
    
    
    $output = '';
    
    $output .= '<div class="container-donut jl-donut-front">';
    $output .= '<div class="jl-renut-container">';
    $output .= '<div class="jl-renut">';
    $output .= '<div class="jl-renut-sections" style="transform: rotate(0deg);">';
    $output .= '<div class="jl-renut-section jl-renut-section-right" style="transform: rotate(0deg);">';
    $output .= '<div class="jl-renut-filler" style="background-color:'.$review_color.'; transform: rotate('.$right.'deg);">';
    $output .= '</div>';
    $output .= '</div>';
    if($value > 50){
    $output .= '<div class="jl-renut-section jl-renut-section-left" style="transform: rotate(0deg);">';
    $output .= '<div class="jl-renut-filler" style="background-color:'.$review_color.'; transform: rotate('.$left.'deg);">';
    $output .= '</div>';
    $output .= '</div>';
    }
    $output .= '</div>';
    $output .= '<div class="jl-renut-overlay">';
    $output .= '<div class="jl-renut-text">';
    $output .= '<div>';
    $output .= '<span>'.shareblock_review_score($final_score, $rating_type, true).'</span>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';
}else{
    $output = '';
}
    
    if($echo == 'true') :
    print '<span class="jl_none"></span>'.$output;
    else :
    return $output;
    endif;
    }
}
if ( ! function_exists( 'shareblock_foot_feed' ) ) {
function shareblock_foot_feed() {?>
<div class="jl-insta-foot">
    <?php    
        if(get_theme_mod('insta_label', esc_html__('Follow Me', 'shareblock'))){?>
            <span class="i_foot_l">
                <?php if(get_theme_mod('insta_link')){?>
                <a target="_blank" href="<?php echo esc_url(get_theme_mod('insta_link')); ?>"><?php }?>
                    <i class="jli-instagram"></i>
                    <?php echo esc_html(get_theme_mod('insta_label', esc_html__('Follow Me', 'shareblock'))); ?>
                <?php if(get_theme_mod('insta_link')){?></a><?php }?>
            </span>
        <?php } ?>
    <?php if ( function_exists( 'sb_instagram_feed_init' ) ) { echo do_shortcode('[instagram-feed num='.get_theme_mod('insta_col',6).' cols='.get_theme_mod('insta_col',6).' imagepadding=0 showheader=false showbutton=false showfollow=false disablemobile=true]'); }?>
</div>
<?php }}
if ( ! function_exists( 'shareblock_head_share' ) ) {
function shareblock_head_share() {
if(!get_theme_mod('disable_social_icons')==1){?>
                            <ul class="social_icon_header_top jl_socialcolor">
                                <?php if(get_theme_mod('facebook')){?>
                                <li><a class="facebook" href="<?php echo esc_url(get_theme_mod('facebook'));?>" target="_blank"><i class="jli-facebook"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('vk')){?>
                                <li><a class="vk" href="<?php echo esc_url(get_theme_mod('vk'));?>" target="_blank"><i class="jli-vk"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('telegram')){?>
                                <li><a class="telegram" href="<?php echo esc_url(get_theme_mod('telegram'));?>" target="_blank"><i class="jli-telegram"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('behance')){?>
                                <li><a class="behance" href="<?php echo esc_url(get_theme_mod('behance'));?>" target="_blank"><i class="jli-behance"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('vimeo')){?>
                                <li><a class="vimeo" href="<?php echo esc_url(get_theme_mod('vimeo'));?>" target="_blank"><i class="jli-vimeo"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('youtube')){?>
                                <li><a class="youtube" href="<?php echo esc_url(get_theme_mod('youtube'));?>" target="_blank"><i class="jli-youtube"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('instagram')){?>
                                <li><a class="instagram" href="<?php echo esc_url(get_theme_mod('instagram'));?>" target="_blank"><i class="jli-instagram"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('linkedin')){?>
                                <li><a class="linkedin" href="<?php echo esc_url(get_theme_mod('linkedin'));?>" target="_blank"><i class="jli-linkedin"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('pinterest')){?>
                                <li><a class="pinterest" href="<?php echo esc_url(get_theme_mod('pinterest'));?>" target="_blank"><i class="jli-pinterest"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('twitter')){?>
                                <li><a class="twitter" href="<?php echo esc_url(get_theme_mod('twitter'));?>" target="_blank"><i class="jli-twitter"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('deviantart')){?>
                                <li><a class="deviantart" href="<?php echo esc_url(get_theme_mod('deviantart'));?>" target="_blank"><i class="jli-deviantart"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('dribble')){?>
                                <li><a class="dribble" href="<?php echo esc_url(get_theme_mod('dribble'));?>" target="_blank"><i class="jli-dribbble"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('dropbox')){?>
                                <li><a class="dropbox" href="<?php echo esc_url(get_theme_mod('dropbox'));?>" target="_blank"><i class="fjli-dropbox"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('rss')){?>
                                <li><a class="rss" href="<?php echo esc_url(get_theme_mod('rss'));?>" target="_blank"><i class="jli-rss"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('skype')){?>
                                <li><a class="skype" href="<?php echo esc_url(get_theme_mod('skype'));?>" target="_blank"><i class="jli-skype"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('stumbleupon')){?>
                                <li><a class="stumbleupon" href="<?php echo esc_url(get_theme_mod('stumbleupon'));?>" target="_blank"><i class="jli-stumbleupon"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('wordpress')){?>
                                <li><a class="wordpress" href="<?php echo esc_url(get_theme_mod('wordpress'));?>" target="_blank"><i class="jli-wordpress"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('yahoo')){?>
                                <li><a class="yahoo" href="<?php echo esc_url(get_theme_mod('yahoo'));?>" target="_blank"><i class="jli-yahoo"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('sound_cloud')){?>
                                <li><a class="sound_cloud" href="<?php echo esc_url(get_theme_mod('sound_cloud'));?>" target="_blank"><i class="jli-soundcloud"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('spotify_i')){?>
                                <li><a class="spotify_i" href="<?php echo esc_url(get_theme_mod('spotify_i'));?>" target="_blank"><i class="jli-spotify"></i></a></li>
                                <?php }?>
                                <?php if(get_theme_mod('wechat')){?>
                                <li><a class="wechat" href="<?php echo esc_url(get_theme_mod('wechat'));?>" target="_blank"><i class="jli-wechat"></i></a></li>
                                <?php }?>                                
                            </ul>
                            <?php }
}
}
add_action( 'wp_ajax_nopriv_shareblock_loadnavs', 'shareblock_loadnavs' );
add_action( 'wp_ajax_shareblock_loadnavs', 'shareblock_loadnavs' );
if ( ! function_exists( 'shareblock_loadnavs' ) ) {
    function shareblock_loadnavs() {

        $module            = array();
        $response            = array();
        $response['content'] = '';
        $notice_class        = 'jl_end_wrp';

        if ( ! empty( $_POST['data'] ) ) {
            $module = shareblock_module_opt( $_POST['data'] );
        }
        if ( empty( $module['page_next'] ) ) {
            $module['page_next'] = 2;
        }
        $query_data = shareblock_query( $module, intval( $module['page_next'] ) );
        add_filter( 'wp_get_attachment_image_attributes', 'shareblock_lsmall_img', 10, 3 );
        if ( $query_data->have_posts() ) {
            $response['page_max'] = $query_data->max_num_pages;

            if ( ! empty( $query_data->paged ) ) {
                $response['page_current'] = $query_data->paged;
            } else {
                $response['page_current'] = $module['page_next'];
            }
            if ( $response['page_current'] == $response['page_max'] ) {
                $response['notice'] = '<div class="' . $notice_class . '"><span class="jl_end_post">' . esc_html__( 'No post to load', 'shareblock' ) . '</span></div>';
            }

            $response['content'] = shareblock_ajax_get_content( $module, $query_data );

            wp_reset_postdata();
        }

        wp_send_json( $response, null );
    }
}

if ( ! function_exists( 'shareblock_menu_cat_opt' ) ) {
    add_action( 'wp_ajax_nopriv_shareblock_menu_cat_opt', 'shareblock_menu_cat_opt' );
    add_action( 'wp_ajax_shareblock_menu_cat_opt', 'shareblock_menu_cat_opt' );

    function shareblock_menu_cat_opt() {

        $module                    = array();
        $data_response            = array();
        $data_response['content'] = '';
        if ( ! empty( $_POST['data'] ) ) {
            $module = shareblock_module_opt( $_POST['data'] );
        }
        $data_query = shareblock_query( $module );
        if ( ! empty( $data_query->max_num_pages ) ) {
            $data_response['page_max'] = $data_query->max_num_pages;
        }
        $data_response['content'] = shareblock_ajax_get_content( $module, $data_query );
        wp_reset_postdata();
        die( json_encode( $data_response ) );
    }
}


if ( ! function_exists( 'shareblock_module_opt' ) ) {
    function shareblock_module_opt( $module ) {
        if ( is_array( $module ) ) {
            foreach ( $module as $key => $val ) {
                $key              = sanitize_text_field( $key );
                $module[ $key ] = sanitize_text_field( $val );
            }
        } elseif ( is_string( $module ) ) {
            $module = sanitize_text_field( $module );
        } else {
            $module = '';
        }
        return $module;
    }
}

if ( ! function_exists( 'shareblock_ajax_get_content' ) ) :
    function shareblock_ajax_get_content( $module, $query_data ) {
        if ( empty( $module['section_style'] ) ) {
            $module['section_style'] = 'jl_mgrid';
        }
        ob_start();
        switch ( $module['section_style'] ) {
            case 'jl_lgrid' :
                shareblock_lgrid_listing( $module, $query_data );
            break;
            case 'jl_mgrid' :
                shareblock_mgrid_listing( $module, $query_data );
            break;
            case 'jl_captext' :
                shareblock_jl_captext_listing( $module, $query_data );
            break;
            case 'jl_sqgrid' :
                shareblock_jl_sqgrid_listing( $module, $query_data );
            break;
            case 'jl_numcap' :
                shareblock_jl_numcap_listing( $module, $query_data );
            break;
            case 'jl_magrid' :
                shareblock_magrid_listing( $module, $query_data );
            break;
            case 'jl_mgrid_sm' :
                shareblock_mgrid_sm_listing( $module, $query_data );
            break;
            case 'jl_mgrid_overlay' :
                shareblock_mgrid_overlay_listing( $module, $query_data );
            break;
            case 'jl_layout_m_r' :
                shareblock_layout_m_r_listing( $module, $query_data );
            break;
            case 'jl_m_list' :
                shareblock_m_list_listing( $module, $query_data );
            break;
            case 'list_style2' :
                shareblock_m_list_listing2( $module, $query_data );
            break;
            case 'jl_sg' :
                shareblock_sg_listing( $module, $query_data );
            break;
            case 'jl_cat_list' :
                shareblock_cat_listing( $module, $query_data );
            break;
            case 'jl_menu_g' :
                shareblock_menu_g_listing( $module, $query_data );
            break;
        }

        return ob_get_clean();
    }
endif;


if ( ! function_exists( 'shareblock_get_ajax_attributes' ) ) :
    function shareblock_get_ajax_attributes( $module = array(), $query_data = null ) {
        if ( null == $query_data ) {
            return;
        }
        
        if ( empty( $module['blockid'] ) || ( empty( $module['pagination'] ) && empty( $module['tabs_link'] ) ) ) {
            return;
        }
        if ( ! empty( $query_data->max_num_pages ) && ! isset( $module['page_max'] ) ) {
            $module['page_max'] = $query_data->max_num_pages;
        }
        $module['page_current'] = 1;
        $defaults = array(
            'blockid'          => '',
            'section_style'    => '',
            'page_max'         => '',
            'page_current'     => '',
            'category'         => '',
            'categories'       => '',
            'tags'             => '',
            'format'           => '',
            'author'           => '',
            'post_not_in'      => '',
            'post_in'          => '',
            'order'            => '',
            'posts_per_page'   => '',
            'offset'           => '',
            'text_style'       => '',
            'post_columns'     => '',
            'tabs_link'        => '',
            'tabs_link_ids'    => '',
            'show_excep'       => '',
            'sl_type'          => '',
        );
        foreach ( $defaults as $key => $val ) {
            if ( ! empty( $module[ $key ] ) ) {
                echo 'data-' . $key . '="' . esc_attr( $module[ $key ] ) . '" ';
            }
        }
    }
endif;

if ( ! function_exists( 'shareblock_blocknav' ) ) :
    function shareblock_blocknav( $module, $query_data = null ) {
        if ( empty( $module['pagination'] ) ) {
            return false;
        }
        switch ( $module['pagination'] ) {
            case 'loadmore' :
                shareblock_blocknav_loadmore( $query_data );
                break;
            case 'next_prev' :
                shareblock_blocknav_nextprev( $query_data );
                break;          
            case 'autoload' :
                shareblock_blocknav_autoload( $query_data );
            break;          
            default:
                return false;
        }
    }
endif;

if ( ! function_exists( 'shareblock_blocknav_autoload' ) ):
    function shareblock_blocknav_autoload( $query_data = null ) {

        if ( empty( $query_data ) || ! is_object( $query_data ) ) {
            global $wp_query;
            $query_data = $wp_query;
        }
        if ( $query_data->max_num_pages < 2 ) {
            return false;
        } ?>
        <div class="jl_lmore_wrap">
            <div class="jl_autoload">
            <span class="jl-load-animation"><span></span></span>
        </div>
        </div>
    <?php
    }
endif;

if ( ! function_exists( 'shareblock_blocknav_loadmore' ) ) :
    function shareblock_blocknav_loadmore( $query_data = null ) {

        if ( empty( $query_data ) || ! is_object( $query_data ) ) {
            global $wp_query;
            $query_data = $wp_query;
        }

        if ( $query_data->max_num_pages < 2 ) {
            return false;
        } ?>
        <div class="jl_lmore_wrap">
            <div class="jl_lmore_c">
            <a href="#" class="jl-load-link"><span><?php echo esc_html__( 'load more', 'shareblock' ); ?></span></a>
            <span class="jl-load-animation"><span></span></span>
        </div>
        </div>
    <?php
    }
endif;

if ( ! function_exists( 'shareblock_blocknav_nextprev' ) ):
    function shareblock_blocknav_nextprev( $query_data = null ) {

        if ( empty( $query_data ) || ! is_object( $query_data ) ) {
            global $wp_query;
            $query_data = $wp_query;
        }
        if ( $query_data->max_num_pages < 2 ) {
            return false;
        } ?>
        <div class="pagination-wrap pagination-nextprev clearfix">
            <a href="#" class="jl-foot-nav jl-block-link jl-prev-nav jl_disable" data-type="prev"><i class="jli-left-chevron"></i></a>
            <a href="#" class="jl-foot-nav jl-block-link jl-next-nav" data-type="next"><i class="jli-right-chevron"></i></a>
        </div>
    <?php
    }
endif;


if ( ! function_exists( 'shareblock_query' ) ) {
    function shareblock_query( $data = array(), $paged = null ) {

        $defaults = array(
            'categories'          => '',
            'category'            => '',
            'author'              => '',
            'format'              => '',
            'tags'                => '',
            'tag_in'              => '',
            'posts_per_page'      => '',
            'paged'               => '',
            'no_found_rows'       => false,
            'offset'              => '',
            'order'               => 'date_post',
            'post_type'           => 'post',
            'meta_key'            => '',
            'post_in'             => '',
            'post_not_in'         => '',
            'tax_query'           => array(),
            'ignore_sticky_posts' => 1
        );

        $data = wp_parse_args( $data, $defaults );      

        $params = array();

        $params['post_status']         = 'publish';
        $params['ignore_sticky_posts'] = $data['ignore_sticky_posts'];
        $params['post_type']           = $data['post_type'];
        $params['no_found_rows']       = boolval( $data['no_found_rows'] );
        $params['tax_query']           = array();

        if ( ! empty( $data['posts_per_page'] ) ) {
            $params['posts_per_page'] = intval( $data['posts_per_page'] );
        }

        if ( ! empty( $data['post_in'] ) ) {
            if ( is_string( $data['post_in'] ) ) {
                $params['post__in'] = explode( ',', $data['post_in'] );
            } elseif ( is_array( $data['post_in'] ) ) {
                $params['post__in'] = $data['post_in'];
            }
        } elseif ( ! empty( $data['post_not_in'] ) ) {
            if ( is_array( $data['post_not_in'] ) ) {
                $params['post__not_in'] = $data['post_not_in'];
            } else {
                $params['post__not_in'] = explode( ',', $data['post_not_in'] );
            }
        }
        if ( ! empty( $data['categories'] ) && 'all' != $data['categories'] ) {
            if ( is_array( $data['categories'] ) ) {
                $params['cat'] = implode( ',', $data['categories'] );
            } elseif ( is_string( $data['categories'] ) ) {
                $params['cat'] = trim( $data['categories'] );
            }
        } elseif ( ! empty( $data['category'] ) && 'all' != $data['category'] ) {
            $params['cat'] = $data['category'];
        }

        if ( ! empty( $data['author'] ) ) {
            $params['author'] = $data['author'];
        }

        if ( ! empty( $data['format'] ) && 'post' == $data['post_type'] ) {
            if ( 'default' != $data['format'] ) {
                $params['tax_query'][] = array(
                    'taxonomy' => 'post_format',
                    'field'    => 'slug',
                    'terms'    => array( 'post-format-' . trim( $data['format'] ) ),
                );
            } else {
                $params['tax_query'][] = array(
                    'taxonomy' => 'post_format',
                    'field'    => 'slug',
                    'terms'    => array( 'post-format-gallery', 'post-format-video', 'post-format-audio' ),
                    'operator' => 'NOT IN',
                );
            }
        }

        if ( ! empty( $data['tax_query'] ) ) {
            $params['tax_query'][] = $data['tax_query'];
        }

        if ( ! empty( $paged ) ) {
            $params['paged'] = intval( $paged );
        } elseif ( ! empty( $data['paged'] ) ) {
            $params['paged'] = intval( $data['paged'] );
        }

        if ( ! empty( $data['offset'] ) ) {
            if ( $paged > 1 ) {
                $params['offset'] = intval( $data['offset'] ) + intval( ( $paged - 1 ) * intval( $data['posts_per_page'] ) );
            } else {
                $params['offset'] = intval( $data['offset'] );
            }

            unset( $params['paged'] );
        }

        if ( ! empty( $data['tags'] ) ) {
            $data['tags']  = preg_replace( '/\s+/', '', $data['tags'] );
            $params['tag'] = $data['tags'];
        }

        if ( ! empty( $data['tag_in'] ) && is_array( $data['tag_in'] ) ) {
            $params['tag__in'] = $data['tag_in'];
        }

        if ( ! empty( $data['meta_key'] ) ) {
            $params['meta_key'] = $data['meta_key'];
            $params['orderby']  = 'meta_value_num';
        }

        switch ( $data['order'] ) {

            case 'date_post' :
                $params['orderby'] = 'date';
                $params['order']   = 'DESC';
                break;

            case 'comment_count' :
                $params['orderby'] = 'comment_count';
                break;

            case 'post_type' :
                $params['orderby'] = 'type';
                break;          
            
            case 'rand':
                $params['orderby'] = 'rand';
                break;

            case 'alphabetical_order_decs':
                $params['orderby'] = 'title';
                $params['order']   = 'DECS';
                break;

            case 'alphabetical_order_asc':
                $params['orderby'] = 'title';
                $params['order']   = 'ASC';
                break;

            default :
                $params['orderby'] = 'date';
                break;
        }

        $query_data = new WP_Query( $params );
        do_action( 'shareblock_after_post_query', $query_data );

        return $query_data;
    }
}

if ( ! function_exists( 'shareblock_add_settings_tabs_links' ) ) {
    function shareblock_add_settings_tabs_links( $type = 'category', $custom_data = '' ) {

        $data = array();

        switch ( $type ) {

            case 'category' :
                $data_cat = get_categories( array(
                    'include'    => esc_attr( $custom_data ),
                    'number'     => 10,
                    'hide_empty' => 1,
                ) );
                if ( ! empty( $custom_data ) ) {
                    $custom_cat_ids = explode( ',', $custom_data );
                    foreach ( $custom_cat_ids as $custom_cat_id_el ) {
                        $custom_cat_id_el = trim( $custom_cat_id_el );
                        foreach ( $data_cat as $data_cat_el ) {
                            if ( $custom_cat_id_el == $data_cat_el->cat_ID ) {
                                $data[] = array(
                                    'id'   => $data_cat_el->cat_ID,
                                    'name' => $data_cat_el->name
                                );
                            }
                        }
                    }
                } else {
                    foreach ( $data_cat as $data_cat_el ) {
                        $data[] = array(
                            'id'   => $data_cat_el->cat_ID,
                            'name' => $data_cat_el->name
                        );
                    }
                }
                break;

            case 'tag' :
                $data_tag = get_tags( array(
                        'include'    => esc_attr( $custom_data ),
                        'number'     => 10,
                        'hide_empty' => 1
                    )
                );
                if ( ! empty( $custom_data ) ) {
                    $custom_tag_ids = explode( ',', $custom_data );
                    foreach ( $custom_tag_ids as $custom_tag_id_el ) {

                        $custom_tag_id_el = trim( $custom_tag_id_el );
                        foreach ( $data_tag as $data_tag_el ) {
                            if ( $custom_tag_id_el == $data_tag_el->name ) {
                                $data[] = array(
                                    'id'   => $data_tag_el->slug,
                                    'name' => $data_tag_el->name
                                );
                            }
                        }
                    }
                } else {
                    foreach ( $data_tag as $data_tag_el ) {
                        $data[] = array(
                            'id'   => $data_tag_el->slug,
                            'name' => $data_tag_el->name
                        );
                    }
                }
                break;

            case 'author' :
                $data_author = get_users( array(
                        'who'     => 'authors',
                        'include' => esc_attr( $custom_data ),
                    )
                );
                if ( ! empty( $data_author ) && is_array( $data_author ) ) {
                    foreach ( $data_author as $data_author_el ) {
                        $data[] = array(
                            'id'   => $data_author_el->ID,
                            'name' => $data_author_el->display_name
                        );
                    };
                }
                break;
        };

        return $data;
    }
}

add_action( 'wp_ajax_nopriv_shareblock_block_link', 'shareblock_block_link' );
add_action( 'wp_ajax_shareblock_block_link', 'shareblock_block_link' );
if ( ! function_exists( 'shareblock_block_link' ) ) {
    function shareblock_block_link() {

        $module = array();
        $response = array( 'page_max' => '', 'content' => '' );
        if ( ! empty( $_POST['data'] ) ) {
            $module = shareblock_module_opt( $_POST['data'] );
        }

        $query_data = shareblock_query( $module );
        if ( $query_data->have_posts() ) {
            $response['page_max'] = $query_data->max_num_pages;
            $response['content']  = shareblock_ajax_get_content( $module, $query_data );

            wp_reset_postdata();
        }

        wp_send_json( $response, null );
    }
}