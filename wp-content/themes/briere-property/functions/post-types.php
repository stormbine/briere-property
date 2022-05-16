<?php
	add_action('init', 'reviews_register');
	
	function reviews_register() {
		//Arguments to create post type.
	    $args = array(  
	        'label' => __('Reviews'),  
	        'singular_label' => __('Review'),  
	        'public' => true,  
	        'show_ui' => true,  
	        'capability_type' => 'post',  
	        'hierarchical' => true,  
	        'has_archive' => false,
	        'supports' => array('title', 'editor', 'page-attributes'),
			'rewrite' => false,
			'menu_position' => 55,
			'menu_icon' => 'dashicons-format-quote',
	       );  

	    register_post_type( 'reviews' , $args );
	}	
?>