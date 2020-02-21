<?php
/**
 * VC Copyright config
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

vc_map( array(
	'base' => 'uncode_copyright',
	'name' => esc_html__('Copyright', 'uncode-core') ,
	'icon' => 'fa fa-copyright',
	'php_class_name' => 'uncode_socials',
	'weight' => 855,
	'category' => esc_html__('Content', 'uncode-core') ,
	'description' => esc_html__('Dynamic Copyright', 'uncode-core') ,
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Element ID', 'uncode-core') ,
			'param_name' => 'el_id',
			'description' => esc_html__('This value has to be unique. Change it in case it\'s needed.', 'uncode-core') ,
		) ,
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Extra class name', 'uncode-core') ,
			'param_name' => 'el_class',
			'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'uncode-core') ,
		) ,
		$add_css_animation,
		$add_animation_speed,
		$add_animation_delay,
	)
) );
