<?php
namespace MBViews;

/**
 * Make all functions available via function mb.function.
 *
 * @link https://inchoo.net/dev-talk/wordpress/twig-wordpress-part2/
 */
class TwigProxy {
	private $meta_box_renderer;

	public function __construct( $meta_box_renderer ) {
		$this->meta_box_renderer = $meta_box_renderer;
	}

	public function __call( $function, $arguments ) {
		return function_exists( $function ) ? call_user_func_array( $function, $arguments ) : null;
	}

	public function get_post( $post = null ) {
		$post = get_post( $post );

		$post_object = new Renderer\Post( $this->meta_box_renderer );
		$post_object->set_post( $post );
		return $post_object;
	}

	public function get_term( $term, $taxonomy = '' ) {
		$term = get_post( $term, $taxonomy );

		$term_object = new Renderer\Term( $this->meta_box_renderer );
		$term_object->set_term( $term );
		return $term_object;
	}

	public function get_user( $user_id ) {
		return $this->get_userdata( $user_id );
	}

	public function get_userdata( $user_id ) {
		$user_object = new Renderer\User( $this->meta_box_renderer );
		$user_object->set_user_id( $user_id );
		return $user_object;
	}

	public function get_posts( $args ) {
		$posts = get_posts( $args );
		if ( empty( $posts ) || ! is_array( $posts ) ) {
			$posts = [];
		}
		$posts = array_map( function( $post ) {
			$post_object = new Renderer\Post( $this->meta_box_renderer );
			$post_object->set_post( $post );
			return $post_object;
		}, $posts );

		return $posts;
	}

	public function get_terms( $args ) {
		$terms = get_terms( $args );
		if ( empty( $terms ) || ! is_array( $terms ) ) {
			$terms = [];
		}
		$terms = array_map( function( $term ) {
			$term_object = new Renderer\Term( $this->meta_box_renderer );
			$term_object->set_term( $term );
			return $term_object;
		}, $terms );

		return $terms;
	}

	public function get_users( $args ) {
		$users = get_users( $args );
		$users = array_map( function( $user ) {
			$user_object = new Renderer\User( $this->meta_box_renderer );
			$user_object->set_user_id( $user->ID );
			return $user_object;
		}, $users );

		return $users;
	}

	public function map( $field_id, $width = '100%', $height = '480px', $zoom = 14, $marker_icon = '', $marker_title = '', $info_window = '' ) {
		$args     = compact( 'width', 'height', 'zoom', 'marker_icon', 'marker_title', 'info_window' );
		$field_id = str_replace( 'post.', '', $field_id );
		return rwmb_the_value( $field_id, $args, null, false );
	}

	public function checkbox( $value, $checked = '', $unchecked = '' ) {
		return $value ? $checked : $unchecked;
	}

	public function post_comments() {
		$comments = '';
		if ( comments_open() || get_comments_number() ) {
			ob_start();
			comments_template();
			$comments = ob_get_clean();
		}
		return $comments;
	}
}
