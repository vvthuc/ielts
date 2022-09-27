<?php
add_action( 'admin_init', function() {
	if (class_exists('MB_ADMIN_COLUMNS_POST')) {
    	class ADMIN_COLUMNS_FAQ_MBAC extends MB_ADMIN_COLUMNS_POST { 
    	}
	} elseif (class_exists('\MBAC\Post')) {
    	class ADMIN_COLUMNS_FAQ_MBAC extends \MBAC\Post {
    	}
	}
	class Faq_Custom_Admin extends ADMIN_COLUMNS_FAQ_MBAC {
		public function columns( $columns ) {
			$columns  = parent::columns( $columns );
			$position = 'after';
			$target   = 'title';
			$this->add( $columns, 'ord', 'Sắp xếp', $position, $target );
			$this->add( $columns, 'act', 'Kích hoạt', $position, $target );
			return $columns;
		}
		public function show( $column, $post_id ) {
			switch ( $column ) {
				case 'ord':
					$value = rwmb_get_value('ord',array('object_type' => 'post'),$post_id ,false);;
					echo '<div class="post_text group_input"><input value="'.$value.'"  name="ord" data-post-id="'.$post_id .'" type="text" /></div>';
					break;
				case 'act':
					$value = $value = rwmb_get_value('act',array('object_type' => 'post'),$post_id ,false);
					echo '<div class="post_checkbox group_input"><input '.($value==1?'checked':'').' name="act" data-post-id="'.$post_id .'" type="checkbox" /></div>';
					break;
			}
		}
	}
	new Faq_Custom_Admin( 'faq', array() );
	
},20 );
