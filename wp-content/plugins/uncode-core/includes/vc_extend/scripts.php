<?php
/**
 * VC scripts
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * 	Deregister VC scripts
 */
function uncode_dequeue_visual_composer() {
	wp_dequeue_style('js_composer_front');
	wp_deregister_style('js_composer_front');
	wp_dequeue_style('vc_inline_css');
	wp_deregister_style('vc_inline_css');
	if ( ! function_exists('vc_is_page_editable') || ! vc_is_page_editable() ) {
		wp_deregister_script( 'wpb_composer_front_js' );
	} else {
		wp_deregister_script('vc_inline_iframe_js');
		wp_register_script( 'vc_inline_iframe_js', plugins_url( 'assets/js/min/page_editable.min.js', __FILE__ ), array( 'jquery', 'underscore', ), UncodeCore_Plugin::VERSION);
		wp_enqueue_script( 'vc_inline_iframe_js', plugins_url( 'assets/js/min/page_editable.min.js', __FILE__ ), array( 'jquery', 'underscore', ), UncodeCore_Plugin::VERSION, true );
		wp_enqueue_script( 'uncode-frontend-app', plugins_url( 'assets/js/frontend-app.js', __FILE__ ), array( 'jquery', 'uncode-app', ), UncodeCore_Plugin::VERSION, true );
		$google_api_key = ot_get_option('_uncode_gmaps_api');
		if ($google_api_key !== '') {
			$google_api_key = '?key=' . $google_api_key;
		}
		wp_enqueue_script('google-maps-api', '//maps.googleapis.com/maps/api/js' . $google_api_key, array(), false, true);
		wp_enqueue_script('uncode-google-maps', get_template_directory_uri() . '/library/js/min/uncode.gmaps.min.js', array('google-maps-api') , UncodeCore_Plugin::VERSION, true);
	}
	wp_deregister_script('vc_pie');
	wp_deregister_script('waypoints');
}

/**
 * 	Custom frontend CSS in iframe
 */
function uncode_core_custom_vc_front_iframe_scripts() {
	wp_enqueue_style( 'uncode_js_composer_front', plugins_url( 'assets/css/vc-frontend-editor.css', __FILE__ ), false, UncodeCore_Plugin::VERSION);
	if ( is_rtl() ) {
		wp_enqueue_style('uncode_js_composer_front-rtl', plugins_url( 'assets/css/vc-frontend-editor-rtl.css', __FILE__ ), 'uncode_js_composer_front', UncodeCore_Plugin::VERSION);
	}
}
add_action( 'vc_load_iframe_jscss', 'uncode_core_custom_vc_front_iframe_scripts' );

/**
 * 	Custom backend scripts
 */
function uncode_init_custom_js() {
	if ( ! defined( 'UNCODE_SLIM' ) ) {
		return;
	}

	wp_enqueue_style('vc-admin', plugins_url( 'assets/css/vc_admin.css', __FILE__ ), false, UncodeCore_Plugin::VERSION);

	if ( is_rtl() ) {
		wp_enqueue_style('vc-admin-rtl', plugins_url( 'assets/css/vc_admin-rtl.css', __FILE__ ), 'vc-admin', UncodeCore_Plugin::VERSION);
	}

	global $post;

	$post_id = isset( $post ) && isset( $post->ID ) ? $post->ID : 0;

	if ( function_exists( 'wp_enqueue_media' ) ) {
		wp_enqueue_media( array( 'post' => $post_id ) );
	}

	wp_enqueue_script('uncode-admin-fix-inputs', plugins_url( 'assets/js/fix_inputs.js', __FILE__ ), false, UncodeCore_Plugin::VERSION);
	wp_enqueue_script('uncode-admin-index-items', plugins_url( 'assets/js/index_items.js', __FILE__ ), false, UncodeCore_Plugin::VERSION);
	wp_enqueue_script('uncode-admin-extend', plugins_url( 'assets/js/js_composer_extend.js', __FILE__ ), false, UncodeCore_Plugin::VERSION);
	wp_enqueue_script('uncode-admin-media-elements', plugins_url( 'assets/js/media_element.js', __FILE__ ), false, UncodeCore_Plugin::VERSION);

	$media_el_parameters = array(
		'disable_media_filtering' => apply_filters( 'uncode_disable_media_filtering', false ),
	);

	wp_localize_script( 'uncode-admin-media-elements', 'MediaElParameters', $media_el_parameters );

	global $wp_styles;
	if ( isset( $wp_styles->registered['font-awesome'] ) ) {
		wp_dequeue_style('font-awesome');
	}
	if ( isset( $wp_styles->registered['vc_font_awesome_5'] ) ) {
		wp_dequeue_style('vc_font_awesome_5');
	}
}
add_action('vc_backend_editor_render', 'uncode_init_custom_js');

/**
 * 	Custom frontend scripts
 */
function uncode_init_front_css() {
	wp_enqueue_style('vc-admin', plugins_url( 'assets/css/vc_admin.css', __FILE__ ), false, UncodeCore_Plugin::VERSION);
	if ( is_rtl() ) {
		wp_enqueue_style('vc-admin-rtl', plugins_url( 'assets/css/vc_admin-rtl.css', __FILE__ ), 'vc-admin', UncodeCore_Plugin::VERSION);
	}
}
add_action('vc_frontend_editor_render', 'uncode_init_front_css');

function uncode_init_front_js() {
	$post_id = isset( $_GET[ 'post_id' ] ) ? $_GET[ 'post_id' ] : 0;

	if ( function_exists( 'wp_enqueue_media' ) ) {
		wp_enqueue_media( array( 'post' => $post_id ) );
	}
	wp_enqueue_script('uncode-admin-fix-inputs', plugins_url( 'assets/js/fix_inputs.js', __FILE__ ), false, UncodeCore_Plugin::VERSION, true);
	wp_enqueue_script('uncode-admin-index-items', plugins_url( 'assets/js/index_items.js', __FILE__ ), false, UncodeCore_Plugin::VERSION);
	wp_enqueue_script('uncode-admin-media-elements', plugins_url( 'assets/js/media_element.js', __FILE__ ), false, UncodeCore_Plugin::VERSION, true);

	$media_el_parameters = array(
		'disable_media_filtering' => apply_filters( 'uncode_disable_media_filtering', false ),
	);

	wp_localize_script( 'uncode-admin-media-elements', 'MediaElParameters', $media_el_parameters );

	global $wp_styles;
	if (isset($wp_styles->registered['font-awesome'])) {
		wp_dequeue_style('font-awesome');
	}
	if (isset($wp_styles->registered['vc_font_awesome_5'])) {
		wp_dequeue_style('vc_font_awesome_5');
	}
}
add_action('vc_frontend_editor_hook_load_edit', 'uncode_init_front_js');

function uncode_frontend_re_register_script() {
	if ( function_exists('vc_is_frontend_editor') && vc_is_frontend_editor() ) {
		wp_deregister_script('vc-frontend-editor-min-js');
		wp_register_script( 'vc-frontend-editor-min-js', plugins_url( 'assets/js/min/frontend-editor.min.js', __FILE__ ), 'vc_accordion_script', UncodeCore_Plugin::VERSION);
		wp_enqueue_script( 'vc-frontend-editor-min-js', plugins_url( 'assets/js/min/frontend-editor.min.js', __FILE__ ), 'vc_accordion_script', UncodeCore_Plugin::VERSION, true );
		wp_localize_script( 'vc-frontend-editor-min-js', 'i18nLocale', visual_composer()->getEditorsLocale() );

		if ( function_exists( 'uncode_core_get_front_editor_shortkeys' ) ) {
			wp_localize_script( 'vc-frontend-editor-min-js', 'uncodeFrontEditorShortkeysConf', uncode_core_get_front_editor_shortkeys_configuration() );
		}
	}
}
add_action('admin_enqueue_scripts', 'uncode_frontend_re_register_script');

/**
 * Remove custom VC scripts when Gutenberg is active
 */
function uncode_core_remove_custom_vc_scripts_if_gutenberg_is_active() {
	if ( ! is_admin() ) {
		return;
	}

	if ( ! function_exists( 'uncode_is_gutenberg_current_editor' ) || ! function_exists( 'use_block_editor_for_post_type' ) ) {
		return;
	}

	$screen    = get_current_screen();
	$post_type = isset( $screen->post_type ) ? $screen->post_type : false;

	if ( $post_type && uncode_is_gutenberg_current_editor( $post_type ) ) {
		remove_action('vc_backend_editor_render', 'uncode_init_custom_js');
	}
}
add_action( 'admin_print_styles', 'uncode_core_remove_custom_vc_scripts_if_gutenberg_is_active' );
