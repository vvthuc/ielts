<?php
add_action( 'admin_init', function() {
	if (class_exists('MB_ADMIN_COLUMNS_POST')) {
    	class ADMIN_COLUMNS_POST_MBAC extends MB_ADMIN_COLUMNS_POST { 
    	}
	} elseif (class_exists('\MBAC\Post')) {
    	class ADMIN_COLUMNS_POST_MBAC extends \MBAC\Post {
    	}
	}
	class Post_Custom_Admin extends ADMIN_COLUMNS_POST_MBAC {
		public function columns( $columns ) {
			$columns  = parent::columns( $columns );
			$position = 'after';
			$target   = 'title';

			$this->add( $columns, 'home', 'Home', $position, $target );
			$this->add( $columns, 'act', 'Kích hoạt', $position, $target );
			$this->add( $columns, 'ord', 'Sắp xếp', $position, $target );
			return $columns;
		}
		public function show( $column, $post_id ) {
			switch ( $column ) {
				case 'home':
					$value = rwmb_get_value('home',array('object_type' => 'post'),$post_id ,false);
					echo '<div class="post_checkbox"><input '.($value==1?'checked':'').' name="home" data-post-id="'.$post_id .'" type="checkbox" /></div>';
					break;
				case 'act':
					$value = rwmb_get_value('act',array('object_type' => 'post'),$post_id ,false);
					echo '<div class="post_checkbox"><input '.($value==1?'checked':'').' name="act" data-post-id="'.$post_id .'" type="checkbox" /></div>';
					break;
				case 'ord':
					$value = rwmb_get_value('ord',array('object_type' => 'post'),$post_id ,false);;
					echo '<div class="post_text"><input value="'.$value.'"  name="ord" data-post-id="'.$post_id .'" type="text" /></div>';
					break;
			}
		}
	}
	new Post_Custom_Admin( 'post', array() );
},20 );

add_action( 'wp_ajax_post_custom_admin', 'post_custom_admin_init' );
add_action( 'wp_ajax_nopriv_post_custom_admin', 'post_custom_admin_init' );
function post_custom_admin_init() {
    $name = (isset($_GET['name']))?esc_attr($_GET['name']) : 0;
    $post = (isset($_GET['post']))?(int)esc_attr($_GET['post']) : 0;
    $value = (isset($_GET['value']))?(int)esc_attr($_GET['value']) : 0;
	update_post_meta($post, $name, $value );
    wp_send_json_success('Đã cập nhật!');
    die();
}
