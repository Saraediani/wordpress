<?php

if( ! function_exists( 'devita_get_slider_setting' ) ) {
	function devita_get_slider_setting() {
		$status_opt = array(
			'',
			__( 'Yes', 'devita' ) => true,
			__( 'No', 'devita' ) => false,
		);
		
		$effect_opt = array(
			'',
			__( 'Fade', 'devita' ) => 'fade',
			__( 'Slide', 'devita' ) => 'slide',
		);
	 
		return array( 
			array(
				'type' => 'checkbox',
				'heading' => __( 'Enable slider', 'devita' ),
				'param_name' => 'enable_slider',
				'value' => true,
				'save_always' => true, 
				'group' => __( 'Slider Options', 'devita' ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Items Default', 'devita' ),
				'param_name' => 'items',
				'group' => __( 'Slider Options', 'devita' ),
				'value' => 5,
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Item Desktop', 'devita' ),
				'param_name' => 'item_desktop',
				'group' => __( 'Slider Options', 'devita' ),
				'value' => 4,
			), 
			array(
				'type' => 'textfield',
				'heading' => __( 'Item Small', 'devita' ),
				'param_name' => 'item_small',
				'group' => __( 'Slider Options', 'devita' ),
				'value' => 3,
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Item Tablet', 'devita' ),
				'param_name' => 'item_tablet',
				'group' => __( 'Slider Options', 'devita' ),
				'value' => 2,
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Item Mobile', 'devita' ),
				'param_name' => 'item_mobile',
				'group' => __( 'Slider Options', 'devita' ),
				'value' => 1,
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Navigation', 'devita' ),
				'param_name' => 'navigation',
				'value' => $status_opt,
				'save_always' => true,
				'group' => __( 'Slider Options', 'devita' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Pagination', 'devita' ),
				'param_name' => 'pagination',
				'value' => $status_opt,
				'save_always' => true,
				'group' => __( 'Slider Options', 'devita' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Speed sider', 'devita' ),
				'param_name' => 'speed',
				'value' => '500',
				'save_always' => true,
				'group' => __( 'Slider Options', 'devita' )
			),
			array(
				'type' => 'checkbox',
				'heading' => __( 'Slider Auto', 'devita' ),
				'param_name' => 'auto',
				'value' => false, 
				'group' => __( 'Slider Options', 'devita' )
			),
			array(
				'type' => 'checkbox',
				'heading' => __( 'Slider loop', 'devita' ),
				'param_name' => 'loop',
				'value' => false, 
				'group' => __( 'Slider Options', 'devita' )
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Effects', 'devita' ),
				'param_name' => 'effect',
				'value' => $effect_opt,
				'save_always' => true,
				'group' => __( 'Slider Options', 'devita' )
			), 
		);
	}
}
//Shortcodes for Visual Composer

add_action( 'vc_before_init', 'devita_vc_shortcodes' );
function devita_vc_shortcodes() { 

	//Main Menu
	vc_map( array(
		'name' => esc_html__( 'Main Menu', 'devita'),
		'base' => 'roadmainmenu',
		'class' => '',
		'category' => esc_html__( 'Theme', 'devita'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Upload sticky logo image', 'devita' ),
				'param_name' => 'sticky_logoimage',
				'value' => '',
			),
		)
	) );

	//Categories Menu
	vc_map( array(
		'name' => esc_html__( 'Categories Menu', 'devita'),
		'base' => 'roadcategoriesmenu',
		'class' => '',
		'category' => esc_html__( 'Theme', 'devita'),
		'params' => array(
		)
	) );
  

	//Mini Cart
	vc_map( array(
		'name' => esc_html__( 'Mini Cart', 'devita'),
		'base' => 'roadminicart',
		'class' => '',
		'category' => esc_html__( 'Theme', 'devita'),
		'params' => array(
		)
	) );

	//Products Search
	vc_map( array(
		'name' => esc_html__( 'Product Search', 'devita'),
		'base' => 'roadproductssearch',
		'class' => '',
		'category' => esc_html__( 'Theme', 'devita'),
		'params' => array(
		)
	) );
 
	//Brand logos
	vc_map( array(
		'name' => esc_html__( 'Brand Logos', 'devita' ),
		'base' => 'ourbrands',
		'class' => '',
		'category' => esc_html__( 'Theme', 'devita'),
		'params' => array_merge( 
			array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Number of columns', 'devita' ),
					'param_name' => 'colsnumber',
					'value' => esc_html__( '6', 'devita' ),
				),
				array(
					'type' => 'dropdown',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__( 'Number of rows', 'devita' ),
					'param_name' => 'rowsnumber',
					'value' => array(
							'1'	=> '1',
							'2'	=> '2',
							'3'	=> '3',
							'4'	=> '4',
						),
				),
			),devita_get_slider_setting()
		)

	) );

	//popular category
	vc_map( array(
		"name" => esc_html__( "Popular Categories", "devita" ),
		"base" => "popular_categories",
		"class" => "",
		"category" => esc_html__( "Theme", "devita"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Category slug", "devita" ),
				"param_name" => "category",
				"value" => "",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Thumbnail URL", "devita" ),
				"param_name" => "image",
				"value" => "",
			),
		)
	) );
 
	
	//MailPoet Newsletter Form
	vc_map( array(
		'name' => esc_html__( 'Newsletter Form (MailPoet)', 'devita' ),
		'base' => 'wysija_form',
		'class' => '',
		'category' => esc_html__( 'Theme', 'devita'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Form ID', 'devita' ),
				'param_name' => 'id',
				'value' => '',
				'description' => esc_html__( 'Enter form ID here', 'devita' ),
			),
		)
	) );

	//Timesale
	vc_map( array(
		'name' => esc_html__( 'Time Sale', 'devita' ),
		'base' => 'timesale',
		'class' => '',
		'category' => esc_html__( 'Theme', 'devita'),
		'params' => array( 
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Date Sale', 'devita' ),
				'description' => esc_html__( 'Date Sale M-D-Y. example: 06/16/2030', 'devita' ),
				'param_name' => 'date', 
			),
			array(
			  "type" => "attach_image",
			  "class" => "",
			  "heading" => __( "The image", "devita" ),
			  "param_name" => "image",
			  "value" => '',
			  "description" => __( "Enter description.", "devita" )
			),
			array(
				'type' => 'textarea_html',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Short description', 'devita' ),
				'param_name' => 'description', 
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'URL', 'devita' ),
				'description' => esc_html__( 'Link go to sale page', 'devita' ),
				'param_name' => 'url', 
			), 
		)
	) );
	
	//Latest posts
	vc_map( array(
		'name' => esc_html__( 'Latest posts', 'devita' ),
		'base' => 'latestposts',
		'class' => '',
		'category' => esc_html__( 'Theme', 'devita'),
		'params' =>  array_merge(array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of posts', 'devita' ),
				'param_name' => 'posts_per_page',
				'value' => esc_html__( '5', 'devita' ),
			),
			  
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Excerpt length', 'devita' ),
				'param_name' => 'length',
				'value' => esc_html__( '20', 'devita' ),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of columns', 'devita' ),
				'param_name' => 'colsnumber',
				'value' => esc_html__( '4', 'devita' ),
			), 
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of rows', 'devita' ),
				'param_name' => 'rowsnumber',
				'value' => array(
						'1'	=> '1',
						'2'	=> '2',
						'3'	=> '3',
						'4'	=> '4',
					),
			), 
		),devita_get_slider_setting() )
	) );
	
	//Testimonials
	vc_map( array(
		'name' => esc_html__( 'Testimonials', 'devita' ),
		'base' => 'woothemes_testimonials',
		'class' => '',
		'category' => esc_html__( 'Theme', 'devita'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of testimonial', 'devita' ),
				'param_name' => 'limit',
				'value' => esc_html__( '10', 'devita' ),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Display Author', 'devita' ),
				'param_name' => 'display_author',
				'value' => array(
					'Yes'	=> 'true',
					'No'	=> 'false',
				),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Display Avatar', 'devita' ),
				'param_name' => 'display_avatar',
				'value' => array(
					'Yes'	=> 'true',
					'No'	=> 'false',
				),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Avatar image size', 'devita' ),
				'param_name' => 'size',
				'value' => '',
				'description' => esc_html__( 'Avatar image size in pixels. Default is 50', 'devita' ),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Display URL', 'devita' ),
				'param_name' => 'display_url',
				'value' => array(
					'Yes'	=> 'true',
					'No'	=> 'false',
				),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Category', 'devita' ),
				'param_name' => 'category',
				'value' => esc_html__( '0', 'devita' ),
				'description' => esc_html__( 'ID/slug of the category. Default is 0', 'devita' ),
			),
		)
	) );
	
	
	//Rotating tweets
	vc_map( array(
		'name' => esc_html__( 'Rotating tweets', 'devita' ),
		'base' => 'rotatingtweets',
		'class' => '',
		'category' => esc_html__( 'Theme', 'devita'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Twitter user name', 'devita' ),
				'param_name' => 'screen_name',
				'value' => '',
			),
		)
	) );

	//Twitter feed
	vc_map( array(
		'name' => esc_html__( 'Twitter feed', 'devita' ),
		'base' => 'AIGetTwitterFeeds',
		'class' => '',
		'category' => esc_html__( 'Theme', 'devita'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Your Twitter Name(Without the "@" symbol)', 'devita' ),
				'param_name' => 'ai_username',
				'value' => '',
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number Of Tweets', 'devita' ),
				'param_name' => 'ai_numberoftweets',
				'value' => '',
			),
			// array(
			// 	'type' => 'textfield',
			// 	'holder' => 'div',
			// 	'class' => '',
			// 	'heading' => esc_html__( 'Your Title', 'devita' ),
			// 	'param_name' => 'ai_tweet_title',
			// 	'value' => '',
			// ),
		)
	) );
	 
	
	//Counter
	vc_map( array(
		'name' => esc_html__( 'Counter', 'devita' ),
		'base' => 'devita_counter',
		'class' => '',
		'category' => esc_html__( 'Theme', 'devita'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Image icon', 'devita' ),
				'param_name' => 'image',
				'value' => '',
				'description' => esc_html__( 'Upload icon image', 'devita' ),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number', 'devita' ),
				'param_name' => 'number',
				'value' => '',
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Text', 'devita' ),
				'param_name' => 'text',
				'value' => '',
			),
		)
	) );
}
?>