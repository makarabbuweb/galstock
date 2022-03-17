<?php
if ( ! defined( 'ABSPATH' ) ) exit;
	class shareblock_Meta_Box{
		
		protected $_metabox;
		
		function __construct( $metabox ) {
			if ( !is_admin() ) return;
	
			$this->_metabox = $metabox;
	
			add_action( 'admin_menu', array( &$this, 'add' ) );
			add_action( 'save_post', array( &$this, 'save' ) );
	
		}
		
		// Add metaboxes
		function add() {
			$this->_metabox['context'] = empty($this->_metabox['context']) ? 'normal' : $this->_metabox['context'];
			$this->_metabox['priority'] = empty($this->_metabox['priority']) ? 'high' : $this->_metabox['priority'];
			
			foreach ( $this->_metabox['pages'] as $page ) {
				add_meta_box( $this->_metabox['id'], $this->_metabox['title'], array(&$this, 'show'), $page, $this->_metabox['context'], $this->_metabox['priority']) ;
			}
		}
		
		// Show fields
		function show() {
			global $post;
			
			echo '<input type="hidden" name="wp_meta_box_nonce" value="', wp_create_nonce( basename(__FILE__) ), '" />';
			echo '<div class="jl_tabbox_wrapper">';
			
			if ( get_post_type( get_the_ID() ) == 'post' ) {
			echo '
			<div class="jl_nab_tab">
	        <a id="options-group-1-tab" class="generalsetting-tab" title="General Setting" href="#options-group-1">Image Settings</a>
	        </div>
	    	';
			}
			if ( get_post_type( get_the_ID() ) == 'page' ) {
			echo '
			<div class="jl_nab_tab">
	        <a id="options-group-1-tab" class="generalsetting-tab" title="General Setting" href="#options-group-1">Page Header</a>	        
	        <a id="options-group-2-tab" class="generalsetting-tab" title="General Setting" href="#options-group-2">Page Settings</a>	        
	        </div>
	    	';
			}
			
			foreach ( $this->_metabox['fields'] as $field ) {
				
				if ( !isset( $field['name'] ) ) $field['name'] = '';
				if ( !isset( $field['desc'] ) ) $field['desc'] = '';
				if ( !isset( $field['std'] ) ) $field['std'] = '';
			
				// get value of this field if it exists for this post
				$meta = get_post_meta($post->ID, $field['id'], true);
				
				// Use standard value if empty
				$meta = ( '' === $meta || array() === $meta ) ? $field['std'] : $meta;
				
				// begin a table row with
				echo '<div class="jl_trow group" id="'.$field['id'].'">';
					echo '<div class="jl_th"><label for="input-'.$field['id'].'">'.$field['label'].'</label></div>';
					
					echo '<div class="jl_td">';
					switch($field['type']) {						
						
						case 'text':
							echo '<input type="text" name="'.$field['id'].'" id="input-'.$field['id'].'" value="'.$meta.'" size="64" />';
							echo '<br /><span style="margin-top: 0px; display: block;" class="description">'.$field['desc'].'</span>';
							break;
						case 'image':
							echo '<input id="jelly_cat_header_image_id" type="hidden" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="64" />';
							echo '<span style="margin-top: 0px; display: block;" class="description">'.$field['desc'].'</span>';
							echo '<div id="jelly_cat_header" style="margin-bottom:10px; width: 100px;">';
							if(!empty($meta)){
							$review_img = wp_get_attachment_image_src($meta, 'medium');
							if(!empty($review_img)){
							echo '<img src="'.$review_img[0].'" style="max-width: 100px;"/>';
							}
							}else{
							echo '<img src="'.esc_url(plugin_dir_url( __FILE__ ).'asset/images/none_image.png').'" style="max-width: 100px;"/>';
							}
							echo'</div>';
							echo '<button type="submit" class="jelly_upload_header jladdbtn">Add Media</button>';
							echo '<button type="submit" class="jelly_remove_header jlremovebtn">Remove Media</button>';
							break;
						case 'color':
							echo '<input type="text" class="colorpicker" name="'.$field['id'].'" id="input-'.$field['id'].'" value="'.$meta.'" size="64" />';
							echo '<br /><span style="margin-top: 0px; display: block;" class="description">'.$field['desc'].'</span>';
							break;
						case 'line':							
							echo '<span style="margin-top: 0px; display: block;" class="description">'.$field['desc'].'</span>';							
							break;		
						case 'topen':							
							echo '<div id="'.$field['id'].'">';
							break;		
						case 'tclose':							
							echo '</div>';							
							break;		
						case 'gallery':
							echo '<br /><span style="margin-top: 0px; display: block;" class="description">'.$field['desc'].'</span>';
							?>
							<ul class="jlmedia-gallery-images-holder clearfix">
								<?php
								$image_gallery_val = get_post_meta( $post->ID, $field['id'], true);
								if($image_gallery_val!='' ) $image_gallery_array=explode(',',$image_gallery_val);

								if(isset($image_gallery_array) && count($image_gallery_array)!=0):

									foreach($image_gallery_array as $gimg_id):
										$gimage_wp = wp_get_attachment_image_src($gimg_id,'thumbnail', true);
										echo '<li class="jlmedia-gallery-image-holder"><img src="'.esc_url($gimage_wp[0]).'"/></li>';

									endforeach;

								endif;
								?>
							</ul>
							<input type="hidden" value="<?php echo esc_attr($image_gallery_val); ?>" id="<?php echo esc_attr( $field['id']) ?>" name="<?php echo esc_attr( $field['id']) ?>">
							<div class="jlmedia-gallery-uploader">
								<a class="jlmedia-gallery-upload-btn btn btn-sm btn-primary"
								   href="javascript:void(0)"><?php esc_html_e('Upload or Edit', 'shareblock'); ?></a>
								<a class="jlmedia-gallery-clear-btn btn btn-sm btn-default pull-right"
								   href="javascript:void(0)"><?php esc_html_e('Remove All', 'shareblock'); ?></a>
							</div>
							<?php
							break;
						case 'textarea':
							echo '<textarea name="'.$field['id'].'" id="input-'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>';
							echo '<br /><span style="margin-top: 0px; display: block;" class="description">'.$field['desc'].'</span>';
							break;
						case 'checkbox':
							echo '<input style="margin-right: 10px;" type="checkbox" name="'.$field['id'].'" id="input-'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>';
							echo '<label for="input-'.$field['id'].'">'.$field['desc'].'</label>';
							break;
						case 'select':
							echo '<select name="'.$field['id'].'" id="input-'.$field['id'].'">';
							foreach ($field['options'] as $key => $val) {
								echo '<option', $meta == $key ? ' selected="selected"' : '', ' value="'.$key.'">'.$val.'</option>';
							}
							echo '</select><br /><span style="margin-top: 0px; display: block;" class="description">'.$field['desc'].'</span>';
							break;
						case 'radio':
							foreach ( $field['options'] as $key => $val ) {
								echo '<input type="radio" name="'.$field['id'].'" id="input-'.$field['id'].'_'.$key.'" value="'.$key.'" ',$meta == $key ? ' checked="checked"' : '',' />';
								echo '<label for="'.$field['id'].'_'.$key.'">'.$val.'</label><br>';
							}
							break;
						case 'rating_criteria':
                            
                            $rows = array();
                            if($meta) $rows = $meta;
                            $c = 0;
                            if ( count( $rows ) > 0 ) {
                                foreach( $rows as $row ) {
                                    if ( isset( $row['c_label'] ) || isset( $row['score'] ) ) {
                                        echo '
                                        <p class="rating_row" style="margin-bottom:10px;">
                                        <label for="'.$field['id'].'['.$c.'][c_label]">Label :</label> 
                                        <input type="text" name="'.$field['id'].'['.$c.'][c_label]" value="'.$row['c_label'].'" />
                                        <label for="'.$field['id'].'['.$c.'][score]">Score :</label> 
                                        <input type="text" name="'.$field['id'].'['.$c.'][score]" value="'.$row['score'].'" />
                                        <a class="remove_review button-secondary">Remove</a>
                                        </p>';
                                        $c = $c + 1;
                                    }
                                }
                            }
                            echo '<span id="criteria-placeholder"></span>';
                            echo '<a class="add-criteria button-primary" href="#">Add Criteria</a>';
                            echo '<br /><span style="margin-top: 0px; display: block;" class="description">'.$field['desc'].'</span>';
                            ?>
                            <script>
                                var $ = jQuery.noConflict();
                                $(document).ready(function() {
                                    var count = <?php echo esc_attr($c); ?>;
                                    $('.add-criteria').click(function() {
                                        count = count + 1;                                
                                        $('#criteria-placeholder').append('<p class="rating_row" style="margin-bottom:10px;"><label for="<?php echo esc_attr($field['id']); ?>['+count+'][c_label]">Label : </label><input type="text" name="<?php echo esc_attr($field['id']); ?>['+count+'][c_label]" value="" /><label for="<?php echo esc_attr($field['id']); ?>['+count+'][score]"> Score : </label><input type="text" name="<?php echo esc_attr($field['id']); ?>['+count+'][score]" value="" /> <a class="remove_review button-secondary">Remove</a></p>');
                                        return false;
                                    });
                                    
                                    $('body').on('click', '.remove_review', function(){
                                        $(this).parent('.rating_row').remove();
                                    });                                 
                                    
                                });
                            </script>
                            <?php
                        break; 
						
					}
					echo '</div>';
				echo '</div>';
				
			}
			
			echo '</div>';
		}
		

		// Save data from metabox
		function save( $post_id)  {
			// verify nonce
			if ( ! isset( $_POST['wp_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['wp_meta_box_nonce'], basename(__FILE__) ) ) {
				return $post_id;
			}
			
			// check autosave
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
				return $post_id;
				
			// check permissions
			if ('page' == $_POST['post_type']) {
				if (!current_user_can('edit_page', $post_id))
					return $post_id;
				} elseif (!current_user_can('edit_post', $post_id)) {
					return $post_id;
			}
			
			// loop through fields and save the data
			foreach ( $this->_metabox['fields'] as $field ) {
				
				$old = get_post_meta($post_id, $field['id'], true);
				
				$new = isset( $_POST[$field['id']] ) ? $_POST[$field['id']] : null;
				
				if ($new && $new != $old) {
					update_post_meta($post_id, $field['id'], $new);
				} 
				elseif ('' == $new && $old) {
					delete_post_meta($post_id, $field['id'], $old);
				}
				
			} // end foreach
		}
	}
	


/*	Initialize Metabox
 *	--------------------------------------------------------- */
	function shareblock_init_metaboxes() {
		if ( class_exists( 'shareblock_Meta_Box' ) ) {
	
	

//// user metabox field
add_filter( 'shareblock_meta_metaboxes', 'shareblock_meta_metaboxes' );
	
function shareblock_meta_metaboxes( array $metaboxes ) {	

	$option_sidebar = array();
	$sidebars = get_option('sbg_sidebars');
	$option_sidebar['default']= esc_html__( 'Default Sidebar', 'shareblock' );
	if(isset($sidebars)) {
		if(is_array($sidebars)) {
			foreach($sidebars as $sidebar) {
				$sidebar_lower = strtolower($sidebar);
				$sidebarid = str_replace(' ','-', $sidebar_lower);
				$option_sidebar[$sidebarid] = $sidebar;
			}			
		}
	}
	


		$metaboxes[] = array(
			'id'		 => 'jl_single_post_layouts',
			'title'      => esc_html__('Single Post Options', 'shareblock'),
			'pages'      => array('post'), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'fields' => array(
				
				// tab open
                array(
					'label' => "",
					'id'	=> 'options-group-1',
					'type'	=> 'topen'
				),
                // tab open

                

				array(
					'label' => esc_html__('cus_uid', 'shareblock'),
					'id'	=> 'cus_uid',
					'type'	=> 'text'
				),				
				array(
					'label' => esc_html__('cus_ipfs', 'shareblock'),
					'id'	=> 'cus_ipfs',
					'type'	=> 'text'
				),				
				array(
					'label' => esc_html__('cus_hash', 'shareblock'),
					'id'	=> 'cus_hash',
					'type'	=> 'text'
				),				
				
				// tab close
				array(
					'label' => "",
					'id'	=> 'post_option_close',
					'type'	=> 'tclose'
				),
				// tab close

				

		
							
			)
		);

		
		
	return $metaboxes;
}
//// end user metabox field
			$metaboxes = array();
			$metaboxes = apply_filters ( 'shareblock_meta_metaboxes' , $metaboxes );
			foreach ( $metaboxes as $metabox ) {
				$my_box = new shareblock_Meta_Box( $metabox );
			}
		}
	}
	
add_action( 'init', 'shareblock_init_metaboxes', 9999 );

//Enqueue Color Picker
function shareblock_colorpicker_enqueue() {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_media();
    wp_enqueue_script( 'category-colorpicker-js', get_template_directory_uri() . '/inc/asset/meta.js', array( 'wp-color-picker' ) );
    wp_enqueue_style( 'category-template-style-admin', get_template_directory_uri().'/inc/asset/meta.css', false, '1.0' ); 
}
add_action('admin_enqueue_scripts', 'shareblock_colorpicker_enqueue' );