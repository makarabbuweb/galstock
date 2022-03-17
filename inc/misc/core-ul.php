<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
define( 'shareblock_VERSION', '1.0' );
define( 'shareblock_URL', plugin_dir_url( __FILE__ ) );
add_filter('wpcf7_autop_or_not', '__return_false');
// Author contact info
if ( !function_exists( 'shareblock_contact_info' ) ){
function shareblock_contact_info($contactmethods) {
$contactmethods['rss'] = esc_html__( 'Rss feed', 'shareblock' );
$contactmethods['linkedin'] = esc_html__( 'Linkedin', 'shareblock' );
$contactmethods['pinterest'] = esc_html__( 'Pinterest', 'shareblock' );
$contactmethods['devianart'] = esc_html__( 'Devianart', 'shareblock' );
$contactmethods['dribble'] = esc_html__( 'Dribble', 'shareblock' );
$contactmethods['behance'] = esc_html__( 'Behance', 'shareblock' );
$contactmethods['youtube'] = esc_html__( 'Youtube', 'shareblock' );
$contactmethods['instagram'] = esc_html__( 'Instagram', 'shareblock' );
$contactmethods['twitter'] = esc_html__( 'Twitter', 'shareblock' );
$contactmethods['facebook'] = esc_html__( 'Facebook', 'shareblock' );
return $contactmethods;
}
add_filter('user_contactmethods', 'shareblock_contact_info');
}
// Author link
if ( !function_exists( 'shareblock_author_share_link' ) ){
function shareblock_author_share_link( $author_id ) {?>
<ul class="jl_auth_link clearfix">                                                          
<?php if ((get_the_author_meta('url')) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('url')); ?>" target="_blank"><i class="jli-globe"></i></a></li>
<?php }?>
<?php if ((get_the_author_meta('facebook')) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('facebook')); ?>" target="_blank"><i class="jli-facebook1"></i></a></li>
<?php }?>
<?php if ((get_the_author_meta('pinterest')) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('pinterest')); ?>" target="_blank"><i class="jli-pinterest"></i></a></li>
<?php }?>
<?php if ((get_the_author_meta('instagram')) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('instagram')); ?>" target="_blank"><i class="jli-instagram"></i></a></li>
<?php }?>                              
<?php if ((get_the_author_meta('linkedin')) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('linkedin')); ?>" target="_blank"><i class="jli-linkedin"></i></a></li>
<?php }?>
<?php if ((get_the_author_meta('rss')) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('rss')); ?>" target="_blank"><i class="jli-rss"></i></a></li>
<?php }?>
<?php if ((get_the_author_meta('devianart')) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('devianart')); ?>" target="_blank"><i class="jli-deviantart"></i></a></li>
<?php }?>
<?php if ((get_the_author_meta('dribble')) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('dribble')); ?>" target="_blank"><i class="jli-dribble"></i></a></li>
<?php }?>
<?php if ((get_the_author_meta('behance')) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('behance')); ?>" target="_blank"><i class="jli-behance"></i></a></li>
<?php }?>
<?php if ((get_the_author_meta('youtube')) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('youtube')); ?>" target="_blank"><i class="jli-youtube"></i></a></li>
<?php }?>                                
<?php if ((get_the_author_meta('twitter')) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('twitter')); ?>" target="_blank"><i class="jli-twitter"></i></a></li>
<?php }?>
</ul>
<?php }}

if ( !function_exists( 'shareblock_author_list_share' ) ){
function shareblock_author_list_share( $author_id ) {?>
<ul class="jl_auth_link clearfix">                                                          
<?php if ((get_the_author_meta('url', $author_id)) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('url', $author_id)); ?>" target="_blank"><i class="jli-globe"></i></a></li>
<?php }?>
<?php if ((get_the_author_meta('facebook', $author_id)) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('facebook', $author_id)); ?>" target="_blank"><i class="jli-facebook1"></i></a></li>
<?php }?>
<?php if ((get_the_author_meta('pinterest', $author_id)) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('pinterest', $author_id)); ?>" target="_blank"><i class="jli-pinterest"></i></a></li>
<?php }?>
<?php if ((get_the_author_meta('instagram', $author_id)) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('instagram', $author_id)); ?>" target="_blank"><i class="jli-instagram"></i></a></li>
<?php }?>                              
<?php if ((get_the_author_meta('linkedin', $author_id)) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('linkedin', $author_id)); ?>" target="_blank"><i class="jli-linkedin"></i></a></li>
<?php }?>
<?php if ((get_the_author_meta('rss', $author_id)) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('rss', $author_id)); ?>" target="_blank"><i class="jli-rss"></i></a></li>
<?php }?>
<?php if ((get_the_author_meta('devianart', $author_id)) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('devianart', $author_id)); ?>" target="_blank"><i class="jli-deviantart"></i></a></li>
<?php }?>
<?php if ((get_the_author_meta('dribble', $author_id)) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('dribble', $author_id)); ?>" target="_blank"><i class="jli-dribble"></i></a></li>
<?php }?>
<?php if ((get_the_author_meta('behance', $author_id)) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('behance', $author_id)); ?>" target="_blank"><i class="jli-behance"></i></a></li>
<?php }?>
<?php if ((get_the_author_meta('youtube', $author_id)) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('youtube', $author_id)); ?>" target="_blank"><i class="jli-youtube"></i></a></li>
<?php }?>                                
<?php if ((get_the_author_meta('twitter', $author_id)) != ''){ ?>
<li><a href="<?php echo esc_url(get_the_author_meta('twitter', $author_id)); ?>" target="_blank"><i class="jli-twitter"></i></a></li>
<?php }?>
</ul>
<?php }}

if ( !function_exists( 'shareblock_slink' ) ){
function shareblock_slink( $post_id ) {
$single_fake_counter = get_post_meta( get_the_ID(), 'single_fake_counter', true );
if ($single_fake_counter){
?>
<div class="jl_share_wrapper">
	<span class="jl_share_num"><?php echo esc_attr( shareblock_numcalc($single_fake_counter)); ?></span>
	<span class="jl_share_label"><?php esc_html_e( 'Shares', 'shareblock' ); ?></span>
</div>
<?php }else{?>
<div class="jl_share_wrapper">
	<span class="jl_share_num"><?php echo esc_attr( shareblock_numcalc( shareblock_total_val( $post_id ) ) ); ?></span>
	<span class="jl_share_label"><?php esc_html_e( 'Shares', 'shareblock' ); ?></span>
</div>
<?php }?>
<div class="jl_single_share_wrapper jl_clear_at">
<ul class="single_post_share_icon_post">
    <li class="single_post_share_facebook"><a href="http://www.facebook.com/share.php?u=<?php echo esc_url(get_permalink());?>" target="_blank"><i class="jli-facebook1"></i><span><?php esc_html_e( 'Share on Facebook', 'shareblock' );?></span></a></li>
    <li class="single_post_share_twitter"><a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title();?>&url=<?php echo esc_url(get_permalink());?>" target="_blank"><i class="jli-twitter"></i><span><?php esc_html_e( 'Share on Twitter', 'shareblock' );?></span></a></li>
    <li class="single_post_share_pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url(get_permalink());?>&media=<?php if ( has_post_thumbnail()) {$thumbnail_pin_id = get_post_thumbnail_id(); if( !empty($thumbnail_pin_id) ){ $thumbnail_pin = wp_get_attachment_image_src( $thumbnail_pin_id , 'slider-normal' );} echo esc_attr($thumbnail_pin[0]);}?>" target="_blank"><i class="jli-pinterest"></i></a></li>
    <li class="single_post_share_linkedin"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url(get_permalink());?>&title=<?php echo esc_url(get_permalink());?>" target="_blank"><i class="jli-linkedin"></i></a></li>
    <li class="single_post_share_mail"><a href="mailto:?subject=<?php echo get_the_title();?>" target="_blank"><i class="jli-email-envelope"></i></a></li>
</ul>
</div>
<?php }}

if ( ! function_exists( 'shareblock_counter_num' ) ) {
	function shareblock_counter_num( $number ) {
		$number = intval( $number );
		if ( $number > 1000000 ) {
			$number = round( $number / 1000000, 2 ) .'m';
		} elseif ( $number > 10000 ) {
			$number = round( $number / 1000, 1 ) . 'k';
		} elseif ( $number > 1000 ) {
			$number = round( $number / 1000, 2 ) . 'k';
		}
		return $number;
	}
}
function shareblock_bac_PostViews($post_ID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($post_ID, $count_key, true);
    if($count == ''){
        $count = 0; // set the counter to zero.
        delete_post_meta($post_ID, $count_key);
        add_post_meta($post_ID, $count_key, '0');
        $input = number_format($count);
        $input_count = substr_count($input, ',');
        if($input_count != '0'){
        if($input_count == '1'){
            return ''.round($count/1000, 1) .'k';
        } else if($input_count == '2'){
            return ''.round($count/1000000, 1) .'k';
        } else if($input_count == '3'){
            return substr($input, 0,  -12).'bil';
        } else {
            return;
        }
    } else {
        return ''.$input;
    }
     
    }else{
        $count++; //increment the counter by 1.
        update_post_meta($post_ID, $count_key, $count);
        if($count == '1'){
        //return '<i class="icon-jl_fire"></i>'.$count;
        $input = number_format($count);
        $input_count = substr_count($input, ',');
        if($input_count != '0'){
        if($input_count == '1'){
            return ''.round($count/1000, 1) .'k';
        } else if($input_count == '2'){
            return ''.round($count/1000000, 1) .'k';
        } else if($input_count == '3'){
            return substr($input, 0,  -12).'bil';
        } else {
            return;
        }
    } else {
        return ''.$input;
    }

        }
        else {
        //return '<i class="icon-jl_fire"></i>'.$count;
        $input = number_format($count);
        $input_count = substr_count($input, ',');
        if($input_count != '0'){
        if($input_count == '1'){
            return ''.round($count/1000, 1) .'k';
        } else if($input_count == '2'){
            return ''.round($count/1000000, 1) .'k';
        } else if($input_count == '3'){
            return substr($input, 0,  -12).'bil';
        } else {
            return;
        }
    } else {
        return ''.$input;
    }

        }
    }
}

function shareblock_get_PostViews($post_ID){
    $count_key = 'post_views_count';
    
    $count = get_post_meta($post_ID, $count_key, true);
    if($count){
    $input = number_format($count);
    //$input = number_format($count);
    $input_count = substr_count($input, ',');
    if($input_count != '0'){
        if($input_count == '1'){
            return round($count/1000, 1) .'k';
        } else if($input_count == '2'){
            return round($count/1000000, 1) .'k';
        } else if($input_count == '3'){
            return substr($input, 0,  -12).'bil';
        } else {
            return;
        }
    } else {
        return $input;
    }
    }else{
        return 0;
    }
   
    //return $count;
} 
function shareblock_post_column_views($newcolumn){
    $newcolumn['post_views'] = esc_html__('Views', 'shareblock');
    return $newcolumn;
}
 
function shareblock_post_custom_column_views($column_name, $id){
     
    if($column_name === 'post_views'){
        echo shareblock_get_PostViews(get_the_ID());
    }
}
add_filter('manage_posts_columns', 'shareblock_post_column_views');
add_action('manage_posts_custom_column', 'shareblock_post_custom_column_views',10,2);

if (!function_exists('shareblock_jlmedia_gallery_upload_get_images')) {
	function shareblock_jlmedia_gallery_upload_get_images(){
		$ids=$_POST['ids'];
		$ids=explode(",",$ids);
		foreach($ids as $id):
			$image = wp_get_attachment_image_src($id,'thumbnail', true);
			echo '<li class="jlmedia-gallery-image-holder"><img src="'.esc_url($image[0]).'"/></li>';
		endforeach;
		exit;
	}
	add_action( 'wp_ajax_shareblock_jlmedia_gallery_upload_get_images', 'shareblock_jlmedia_gallery_upload_get_images');
}

if ( ! class_exists( 'shareblock_jl_social_fan' ) ) {
	class shareblock_jl_social_fan {
			
		static function count_facebook( $url, $token = '' ) {

			if ( empty( $url ) ) {
				return false;
			}

			$params = array(
				'sslverify' => false,
				'timeout'   => 100
			);

			// set token
			if ( ! empty( $token ) ) {
				$response = wp_remote_get( 'https://graph.facebook.com/v2.9/' . urlencode( $url ) . '?access_token=' . $token . '&fields=fan_count', $params );
				if ( ! is_wp_error( $response ) && isset( $response['response']['code'] ) && '200' == $response['response']['code'] ) {
					$response = json_decode( wp_remote_retrieve_body( $response ) );
					if ( ! empty( $response->fan_count ) ) {
						return $response->fan_count;
					}
				}
			}

			$filter = array(
				array(
					'start_1' => 'id="PagesLikesCountDOMID"',
					'start_2' => '<span',
					'start_3' => '>',
					'end_4'   => '<span',
				),
				array(
					'start_1' => '["PagesLikesTab","renderLikesData",["',
					'start_2' => '},',
					'start_3' => '],',
					'end_4'   => '],[]],["PagesLikesTab"',
				)
			);

			$response = wp_remote_get( 'https://www.facebook.com/' . $url );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				$response = wp_remote_get( 'https://www.facebook.com/' . $url, $params );
			}

			if ( ! is_wp_error( $response ) && ! empty( $response['response']['code'] ) && '200' == $response['response']['code'] ) {

				// get content
				$response = wp_remote_retrieve_body( $response );

				if ( ! empty( $response ) && $response !== false ) {

					$flag            = false;
					$response_backup = $response;

					foreach ( $filter as $filter_el ) {
						$response = $response_backup;
						foreach ( $filter_el as $key => $value ) {

							$key = explode( '_', $key );
							$key = $key[0];

							if ( $key == 'start' ) {
								$key = false;
							} elseif ( $value == 'end' ) {
								$key = true;
							}

							$key = (bool) $key;

							$index = strpos( $response, $value );
							if ( $index === false ) {
								break;
							}

							if ( $key ) {
								$response = substr( $response, 0, $index );
								$flag     = true;

							} else {
								$response = substr( $response, $index + strlen( $value ) );
							}
						}

						// exit if found
						if ( $flag ) {
							break;
						}
					}

					if ( strlen( $response ) < 150 ) {
						$count = self::extract_one_number( $response );

						if ( is_numeric( $count ) && strlen( number_format( $count ) ) < 16 ) {
							return intval( $count );
						}
					}
				}
			};

			return false;

		}

		
		static function count_google( $user, $api ) {

			if ( empty( $user ) || empty( $api ) ) {
				return false;
			}

			$url      = 'https://www.googleapis.com/plus/v1/people/' . $user . '?key=' . $api . '';
			$args     = array( 'timeout' => 60, 'sslverify' => false );
			$response = wp_remote_get( $url, $args );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = wp_remote_retrieve_body( $response );
			$response = json_decode( $response, true );
			if ( isset( $response['circledByCount'] ) ) {
				$result = (int) $response['circledByCount'];

				return $result;
			} else {
				return false;
			}
		}
		
		static function count_twitter( $user, $api = array() ) {

			if ( empty( $user ) ) {
				return false;
			}

			if ( ! empty( $api['consumer_key'] ) && ! empty( $api['consumer_secret'] ) ) {

				$credentials = $api['consumer_key'] . ':' . $api['consumer_secret'];
				$to_send     = base64_encode( $credentials );
				$token       = get_option( 'tn_twitter_token' );

				if ( empty( $token ) ) {
					$args = array(
						'method'      => 'POST',
						'httpversion' => '1.1',
						'blocking'    => true,
						'headers'     => array(
							'Authorization' => 'Basic ' . $to_send,
							'Content-Type'  => 'application/x-www-form-urlencoded',
						),
						'body'        => array( 'grant_type' => 'client_credentials' )
					);
					add_filter( 'https_ssl_verify', '__return_false' );
					$response = wp_remote_post( 'https://api.twitter.com/oauth2/token', $args );
					$keys     = json_decode( wp_remote_retrieve_body( $response ) );
					if ( $keys ) {
						$token = $keys->access_token;
						update_option( 'tn_twitter_token', $token );
					};
				}

				$args = array(
					'httpversion' => '1.1',
					'blocking'    => true,
					'headers'     => array(
						'Authorization' => "Bearer $token"
					)
				);
				add_filter( 'https_ssl_verify', '__return_false' );
				$api_url  = "https://api.twitter.com/1.1/users/show.json?screen_name=$user";
				$response = wp_remote_get( $api_url, $args );
				if ( ! is_wp_error( $response ) ) {
					$followers = json_decode( wp_remote_retrieve_body( $response ) );
					if ( ! empty( $followers->followers_count ) ) {
						return $followers->followers_count;
					}
				}
			}

			$params = array(
				'timeout'   => 60,
				'sslverify' => false
			);

			$filter = array(
				'start_1' => 'ProfileNav-item--followers',
				'start_2' => 'title',
				'end'     => '>'
			);

			$response = wp_remote_get( 'https://twitter.com/' . $user, $params );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = wp_remote_retrieve_body( $response );

			if ( ! empty( $response ) && $response !== false ) {
				foreach ( $filter as $key => $value ) {

					$key = explode( '_', $key );
					$key = $key[0];

					if ( $key == 'start' ) {
						$key = false;
					} else if ( $value == 'end' ) {
						$key = true;
					}
					$key = (bool) $key;

					$index = strpos( $response, $value );
					if ( $index === false ) {
						return false;
					}
					if ( $key ) {
						$response = substr( $response, 0, $index );
					} else {
						$response = substr( $response, $index + strlen( $value ) );
					}
				}

				if ( strlen( $response ) > 100 ) {
					return false;
				}

				$count = self::extract_one_number( $response );

				if ( ! is_numeric( $count ) || strlen( number_format( $count ) ) > 15 ) {
					return false;
				}

				$count = intval( $count );

				return $count;
			} else {
				return false;
			}
		}


		static function extract_one_number( $str ) {
			return intval( preg_replace( '/[^0-9]+/', '', $str ), 10 );
		}

		
		static function count_instagram( $api ) {

			if ( empty( $api ) ) {
				return false;
			}

			$users = explode( ".", $api );
			if ( empty( $users[0] ) ) {
				return false;
			}
			$data = array();
			$url  = 'https://api.instagram.com/v1/users/' . $users[0] . '/?access_token=' . $api;

			$params = array(
				'sslverify' => false,
				'timeout'   => 60
			);

			$response = wp_remote_get( $url, $params );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = json_decode( wp_remote_retrieve_body( $response ), true );
			if ( empty( $response['data']['counts']['followed_by'] ) || empty( $response['data']['username'] ) ) {
				return false;
			}

			$data['count']     = $response['data']['counts']['followed_by'];
			$data['user_name'] = $response['data']['username'];
			$data['url']       = 'https://instagram.com/' . $data['user_name'];

			return $data;
		}

		
		static function  count_dribbble( $user, $token ) {
			if ( empty( $user ) || empty( $token ) ) {
				return false;
			}

			$params = array(
				'sslverify' => false,
				'timeout'   => 60,
			);

			$response = wp_remote_get( 'https://api.dribbble.com/v1/users/' . $user . '?access_token=' . $token, $params );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = json_decode( wp_remote_retrieve_body( $response ) );
			if ( ! empty( $response->followers_count ) ) {
				return $response->followers_count;
			} else {
				return false;
			}
		}

		
		static function count_youtube( $user, $channel ) {

			if ( empty( $user ) && empty ( $channel ) ) {
				return false;
			};

			if ( ! empty( $user ) ) {
				$url = "https://www.googleapis.com/youtube/v3/channels?part=statistics&forUsername=" . $user . "&key=AIzaSyD-285A_JgDpjbEFnXYzjYXo0Vwi64txKE";
			} else {
				$url = 'https://www.googleapis.com/youtube/v3/channels?part=statistics&id=' . $channel . '&key=AIzaSyD-285A_JgDpjbEFnXYzjYXo0Vwi64txKE';
			};

			$params = array(
				'sslverify' => false,
				'timeout'   => 60
			);

			$response = wp_remote_get( $url, $params );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = json_decode( wp_remote_retrieve_body( $response ) );
			if ( ! empty( $response->items[0]->statistics->subscriberCount ) ) {
				return $response->items[0]->statistics->subscriberCount;
			} else {
				return false;
			}
		}

		
		static function count_soundclound( $user, $api ) {

			if ( empty( $user ) || empty( $api ) ) {
				return false;
			}

			$url      = 'https://api.soundcloud.com/users/' . $user . '.json?consumer_key=' . $api;
			$response = wp_remote_get( $url, array( 'timeout' => 60 ) );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = json_decode( wp_remote_retrieve_body( $response ), true );
			if ( empty( $response['followers_count'] ) || empty( $response['permalink_url'] ) ) {
				return false;
			};
			$data['count'] = esc_attr( $response['followers_count'] );
			$data['url']   = esc_url( $response['permalink_url'] );

			return $data;
		}


		static function count_pinterest( $user ) {

			if ( empty( $user ) ) {
				return false;
			}

			$response = get_meta_tags( 'https://pinterest.com/' . $user . '/' );
			if ( ! empty( $response ) && ! empty( $response['pinterestapp:followers'] ) ) {
				return intval( strip_tags( $response['pinterestapp:followers'] ) );
			} else {
				return false;
			}
		}

		
		static function count_vimeo( $user ) {

			if ( empty( $user ) ) {
				return false;
			};

			$params = array(
				'sslverify' => false,
				'timeout'   => 60
			);

			$url      = 'https://vimeo.com/api/v2/' . $user . '/info.json';
			$response = wp_remote_get( $url, $params );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = json_decode( wp_remote_retrieve_body( $response ) );
			if ( ! empty( $response->total_contacts ) ) {
				return $response->total_contacts;
			} else {
				return false;
			}
		}

		
		static function count_vk( $user ) {
			if ( empty( $user ) ) {
				return false;
			};

			$params = array(
				'sslverify' => false,
				'timeout'   => 60
			);

			$url      = 'https://api.vk.com/method/groups.getById?gid=' . $user . '&fields=members_count';
			$response = wp_remote_get( $url, $params );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = json_decode( wp_remote_retrieve_body( $response ) );
			if ( ! empty( $response->response[0]->members_count ) ) {
				$result = $response->response[0]->members_count;
			}

			if ( ! empty( $result ) ) {
				return $result;
			} else {
				return false;
			}
		}

static function shareblock_social_counter( $social = '', $option = array() ) {
			$cache_data_name = 'shareblock_social_fan_' . $social;
			$cache           = get_transient( $cache_data_name );

			if ( false === $cache ) {
				$data        = '';
				$cache_hours = 12;

				switch ( $social ) {
					case 'facebook_page' :
						$data = self::count_facebook( $option['facebook_page'], $option['facebook_token'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'google' :
						$data = self::count_google( $option['google_user'], $option['google_api'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'twitter' :
						$data = self::count_twitter( $option['twitter_user'], $option['twitter_api'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'instagram' :
						$data = self::count_instagram( $option['instagram_api'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'youtube' :
						$data = self::count_youtube( $option['youtube_user'], $option['youtube_channel'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'dribbble' :
						$data = self::count_dribbble( $option['dribbble_user'], $option['dribbble_token'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'pinterest' :
						$data = self::count_pinterest( $option['pinterest_user'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'soundcloud' :
						$data = self::count_soundclound( $option['soundcloud_user'], $option['soundcloud_api'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'vimeo' :
						$data = self::count_vimeo( $option['vimeo_user'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'vk' :
						$data = self::count_vk( $option['vk_user'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
				}

				return $data;
			} else {
				return $cache;
			}
		}
	}
}

add_action( 'wp_footer', 'shareblock_gdpr' );
if ( ! function_exists( 'shareblock_gdpr' ) ) :
	function shareblock_gdpr() {
		$cookiebox = get_theme_mod('jl_cookie_enable');
		if ( empty( $cookiebox ) ) {
			return;
		}
		?>
		<aside id="jl-gdpr" class="jl-gdpr">
			<p class="cookie-content"><?php echo wp_kses_post(get_theme_mod('jl_cookie_dec')); ?></p>
			<div class="jl-gdpr-w">
				<a id="jl-gdpr-accept" class="jl-gdpr-accept" href="#"><?php echo esc_html__(get_theme_mod('jl_cookie_btn', 'Accept')); ?></a>
			</div>
		</aside>
	<?php
	}
endif;

if ( ! function_exists( 'shareblock_topbar' ) ) :
	function shareblock_topbar() {
		$cookiebox = get_theme_mod('jl_topbar_enable');
		if ( empty( $cookiebox ) ) {
			return;
		}		
		?>
		<div id="jl_tp_info" class="jl_tp_info">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
          <div class="jl_tp_info_c">
            <div class="jl_tp_info_text"><?php echo wp_kses_post(get_theme_mod('jl_topbar_dec')); ?></div>
            <div class="jl_tp_info_link"><a href="<?php echo esc_url(get_theme_mod('jl_topbar_btn_url'))?>" target="_blank"><?php echo esc_html__(get_theme_mod('jl_topbar_btn', 'Learn More')); ?></a></div>
         </div>
         <span class="jl_close_wapper"><a id="tp_link" href="#"><span class="jl_close_1"></span><span class="jl_close_2"></span></a></span>
         </div>
         </div>
         </div>
         </div>		
	<?php
	}
endif;

function shareblock_imgmlz( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
	return str_replace( '<img', '<img loading="lazy"', $html );
}
function shareblock_addimgclass( $html = '', $new_class = '' ) {
	$on = 'on';
	// if ( 'on' === $on ) {
		$pattern = '/class="([^"]*)"/';		
		if ( preg_match( $pattern, $html, $matches ) ) {
			$predefined_classes = explode( ' ', $matches[1] );
			if ( ! in_array( $new_class, $predefined_classes, true ) && ! in_array( 'rev-slidebg', $predefined_classes, true ) && ! in_array( 'jl-bgs', $predefined_classes, true ) ) {
				$predefined_classes[] = $new_class;
				$html                 = str_replace(
					$matches[0],
					sprintf( 'class="%s"', implode( ' ', $predefined_classes ) ),
					$html
				);
			}
		} else {
			$html = preg_replace( '/(\<.+("\s))/', sprintf( '$1class="%s" ', $new_class ), $html );
		}
	// }
	return $html;
}
function shareblock_filimg( $content ) {
	$on = 'on';
	// if ( 'on' === $on ) {
		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
			return $content;
		}
		if ( is_feed()
			|| intval( get_query_var( 'print' ) ) === 1
			|| intval( get_query_var( 'printpage' ) ) === 1
			|| strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mini' ) !== false
		) {
			return $content;
		}

		$matches            = array();
		$resp_replace       = 'data-sizes="auto" data-srcset=';
		$skip_images_regex  = '/class=".*lazyload.*"/';
		$skip_images_regex2 = '/class=".*rev-slidebg.*"/';
		$skip_images_regex3 = '/class=".*tp-bgimg.*"/';
		$skip_images_regex4 = '/class=".*attachment-woocommerce_thumbnail.*"/';
		$placeholder        = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
		preg_match_all( '/<img\s+.*?>/', $content, $matches );
		$search  = array();
		$replace = array();

		foreach ( $matches[0] as $img_html ) {
			if ( ! preg_match( $skip_images_regex, $img_html ) && ! preg_match( $skip_images_regex2, $img_html ) && ! preg_match( $skip_images_regex3, $img_html ) && ! preg_match( $skip_images_regex4, $img_html ) ) {
				$replace_html = preg_replace( '/<img(.*?)src=/i', '<img$1src="' . $placeholder . '" data-src=', $img_html );
				$replace_html = preg_replace( '/srcset=/i', $resp_replace, $replace_html );
				$replace_html = shareblock_addimgclass( $replace_html, 'lazyload' );
				array_push( $search, $img_html );
				array_push( $replace, $replace_html );
			}
		}
		$content = str_replace( $search, $replace, $content );
	// }
	return $content;
}
function shareblock_lsmall_img( $attr, $attachment, $size ) {
	$on = 'on';
	// if ( 'on' === $on && is_string( $size ) ) {
	// if ( 'on' === ot_get_option( 'lazy_load', 'on' ) && is_string( $size ) ) {
		$placeholder = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';

		$name = explode( '_', $size );
		if ( 'shareblock' === $name[0] ) {
			$name[2]     = 'sload';
			$size        = implode( '_', $name );
			$placeholder = wp_get_attachment_image_src( $attachment->ID, $size );
			$placeholder = $placeholder[0];
		}

		$attr['data-src']   = $attr['src'];
		$attr['src']        = $placeholder;
		$attr['class']     .= 'jl-lazyload lazyload';
		unset( $attr['sizes'] );
		if ( isset( $attr['srcset'] ) ) {
			$attr['data-srcset'] = $attr['srcset'];
			unset( $attr['srcset'] );
		}
	// }
	return $attr;
}
function shareblock_img_sizes($img_in) {
  $noscript_pos = strpos( $img_in, '</noscript>') + 11;
  $noscript_img = substr ( $img_in , 0 , $noscript_pos );
  $_img = substr ( $img_in , $noscript_pos );
  return $noscript_img . str_replace( 'sizes=', 'data-sizes=', $_img );
}

if ( ! is_admin() ) {
	add_filter( 'the_content', 'shareblock_filimg', 200 );
	add_filter( 'wp_get_attachment_image_attributes', 'shareblock_lsmall_img', 10, 3 );
	add_filter('the_content','shareblock_img_sizes');
}

class shareblock_post_share_calc {
	private $url;
	private $timeout;
	public function __construct( $url, $timeout = 20 ) {
		$this->url     = rawurlencode( $url );
		$this->raw_url = $url;
		$this->timeout = $timeout;
	}
	public function shareblock_facebook_calc() {
		// $social_fb_access_token = ot_get_option( 'social_fb_access_token' );
		// $shareblock_fb_access_token    = apply_filters( 'shareblock_fb_access_token', $social_fb_access_token );
		// if ( defined( 'shareblock_DEMO_SITE' ) ) {
			$shareblock_fb_access_token = '2187816051486436|FhSa3jBsZeAmkfzdIYWzN7v0jSU';
		// }
		$json_url = 'https://graph.facebook.com/?id=' . $this->url . '&fields=engagement&access_token=' . $shareblock_fb_access_token;
		$json = wp_remote_get( $json_url, array( 'timeout' => $this->timeout ) );
		if ( is_wp_error( $json ) ) {
			error_log( $json->get_error_message() );
			return;
		}
		$data = wp_remote_retrieve_body( $json );
		$json = json_decode( $data );
		return isset( $json->engagement->share_count ) ? intval( $json->engagement->share_count ) : 0;
	}
	public function shareblock_pin_calc() {
		$return_data = wp_remote_get( 'https://api.pinterest.com/v1/urls/count.json?url=' . $this->url, array( 'timeout' => $this->timeout ) );

		if ( is_wp_error( $return_data ) ) {
			error_log( $return_data->get_error_message() );
			return 0;
		}
		$return_data = wp_remote_retrieve_body( $return_data );
		$json_string = preg_replace( '/[^(]*\((.*)\)/', '$1', $return_data );
		$json        = json_decode( $json_string, true );
		return isset( $json['count'] ) ? intval( $json['count'] ) : 0;
	}
	public function shareblock_total_val() {
		$count = 0;

		$fb    = $this->shareblock_facebook_calc();
		$pi    = $this->shareblock_pin_calc();
		$count = $fb + $pi;
		return $count;
	}
}
function shareblock_share_val( $function, $post_id = 0 ) {
	$cache = array();
	$cache = get_transient( 'shareblock_count_calc' );
	if ( ! $post_id ) {
		$post_id = get_the_ID(); }
	$count = isset( $cache[ $function . '_' . $post_id ] ) ? $cache[ $function . '_' . $post_id ] : false;
	if ( empty( $count ) && '0' !== $count ) {
		$url = get_permalink( $post_id );
		if ( ! empty( $url ) ) {
			$share_counter = new shareblock_post_share_calc( $url );
			$count         = call_user_func( array( $share_counter, $function ) );
		}
		if ( empty( $count ) ) {
			$count = '0';
		}
		$cache[ $function . '_' . $post_id ] = $count;
		$time = DAY_IN_SECONDS;
		set_transient( 'shareblock_count_calc', $cache, $time );
	}
	if ( 'shareblock_total_val' === $function ) {
		update_post_meta( $post_id, 'shareblock_total_vals', $count );
	}
	return $count;
}
function shareblock_facebook_calc( $post_id = 0 ) {
	return shareblock_share_val( __FUNCTION__, $post_id );
}
function shareblock_pin_calc( $post_id = 0 ) {
	return shareblock_share_val( __FUNCTION__, $post_id );
}
function shareblock_total_val( $post_id = 0 ) {
	return shareblock_share_val( __FUNCTION__, $post_id );
}
function shareblock_numcalc( $number ) {
	$abbrevs = array(
		12 => 't',
		9  => 'b',
		6  => 'm',
		3  => 'k',
		0  => '',
	);
	if ( $number > 999 ) {
		foreach ( $abbrevs as $exponent => $abbrev ) {
			if ( $number >= pow( 10, $exponent ) ) {
				$display_num = $number / pow( 10, $exponent );
				$decimals    = ( $exponent >= 3 && round( $display_num ) < 100 ) ? 1 : 0;
				return number_format( $display_num, $decimals ) . $abbrev;
			}
		}
	} else {
		return $number;
	}
}

function shareblock_font_info() {
	if (isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'jl_custom_fonts') {
    ?>
    <div class="notice notice-warning">
       <ol>
		 <li>Prepare your webfont files by convert your <code>ttf</code> fonts at <a href="https://www.fontsquirrel.com/tools/webfont-generator" target="_blank">Font Squirrel</a></li>
		 <li>Upload your font files</li>
		 <li>Your font will show in Appearance → Customise → Theme options → Typography with prefix name Custom font</li>
	   </ol>
    </div>
    <?php
}}
add_action( 'admin_notices', 'shareblock_font_info' );