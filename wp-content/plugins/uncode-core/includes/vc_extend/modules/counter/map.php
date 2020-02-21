<?php
/**
 * VC Counter config
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

vc_map(array(
	'name' => esc_html__('Counter', 'uncode-core') ,
	'base' => 'uncode_counter',
	'weight' => 900,
	'icon' => 'fa fa-sort-numerically',
	'php_class_name' => 'uncode_counter',
	'category' => esc_html__('Content', 'uncode-core') ,
	'description' => esc_html__('Animated Counter', 'uncode-core') ,
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Counter value', 'uncode-core') ,
			'param_name' => 'value',
			'description' => esc_html__('Input counter value here.', 'uncode-core') ,
			'value' => '1000',
			'admin_label' => true
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Prefix', 'uncode-core') ,
			'param_name' => 'prefix',
			'description' => esc_html__('Input a prefix to the value.', 'uncode-core') ,
			'value' => ''
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Suffix', 'uncode-core') ,
			'param_name' => 'suffix',
			'description' => esc_html__('Input a suffix to the value.', 'uncode-core') ,
		) ,
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Counter color", 'uncode-core') ,
			"param_name" => "counter_color",
			"description" => esc_html__("Specify a color for the counter.", 'uncode-core') ,
			"value" => $uncode_colors,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Counter font family", 'uncode-core') ,
			"param_name" => "font",
			"description" => esc_html__("Specify the counter font family.", 'uncode-core') ,
			"value" => $heading_font,
			'std' => '',
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Counter font size", 'uncode-core') ,
			"param_name" => "size",
			"description" => esc_html__("Specify the counter font dimension.", 'uncode-core') ,
			"value" => $heading_size,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Counter font weight", 'uncode-core') ,
			"param_name" => "weight",
			"description" => esc_html__("Specify the counter font weight.", 'uncode-core') ,
			"value" =>$heading_weight,
			'std' => '',
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Counter text transform", 'uncode-core') ,
			"param_name" => "transform",
			"description" => esc_html__("Specify the counter text transformation.", 'uncode-core') ,
			"value" => array(
				esc_html__('Default CSS', 'uncode-core') => '',
				esc_html__('Uppercase', 'uncode-core') => 'uppercase',
				esc_html__('Lowercase', 'uncode-core') => 'lowercase',
				esc_html__('Capitalize', 'uncode-core') => 'capitalize'
			) ,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Counter line height", 'uncode-core') ,
			"param_name" => "height",
			"description" => esc_html__("Specify the counter line height.", 'uncode-core') ,
			"value" => $heading_height,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Counter letter spacing", 'uncode-core') ,
			"param_name" => "text_space",
			"description" => esc_html__("Specify letter spacing.", 'uncode-core') ,
			"value" => $heading_space,
		) ,
		array(
			"type" => 'dropdown',
			"heading" => esc_html__("Counter text italic", 'uncode-core') ,
			"param_name" => "text_italic",
			"description" => esc_html__("Transform the counter text to italic.", 'uncode-core') ,
			"value" => array(
				esc_html__('Normal', 'uncode-core') => '',
				esc_html__('Italic', 'uncode-core') => 'yes',
			) ,
		) ,
		array(
			"type" => 'checkbox',
			"heading" => esc_html__("Separator", 'uncode-core') ,
			"param_name" => "separator",
			"description" => esc_html__("Activate this to add a separator between the value and the description.", 'uncode-core') ,
			"value" => Array(
				esc_html__("Yes, please", 'uncode-core') => 'yes'
			) ,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Text under', 'uncode-core') ,
			'param_name' => 'text',
			'description' => esc_html__('Input a text under the counter.', 'uncode-core') ,
			'value' => ''
		) ,
		$add_css_animation,
		$add_animation_speed,
		$add_animation_delay,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Element ID', 'uncode-core') ,
			'param_name' => 'el_id',
			'description' => esc_html__('This value has to be unique. Change it in case it\'s needed.', 'uncode-core') ,
			"group" => esc_html__("Extra", 'uncode-core')
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Extra class name', 'uncode-core') ,
			'param_name' => 'el_class',
			'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'uncode-core') ,
			"group" => esc_html__("Extra", 'uncode-core')
		) ,
	) ,
));
