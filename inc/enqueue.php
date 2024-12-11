<?php

defined('ABSPATH') || exit;

define("YOOZ_VERSION", '1.0.0');
define("YOOZ_ASSETS_VERSION", defined('WP_DEBUG') && WP_DEBUG ? time() : YOOZ_VERSION);

// For Styles

function yooz_styles($hook){
    
    wp_enqueue_style(
        'my-social-button-style',
        RAYIUM_YOOZ_CSS . 'yooz.css',
        YOOZ_ASSETS_VERSION
    );

}
add_action( 'wp_head', 'yooz_styles', 1);

// For JavaScripts

function yooz_scripts($hook){
    
    wp_enqueue_script(
        'my-social-button-script',
        RAYIUM_YOOZ_JS . 'script.js',
        array('jquery'),
	    YOOZ_ASSETS_VERSION,
        true
    );

    $input_code = get_option('my_chat_plugin_text');
    $button_color = get_option('my_chat_plugin_button_color', '#0073aa');
    $initial_question = get_option('my_chat_plugin_initial_question', 'سوالی بپرسید تا جواب بدم');
    
    $selected_icon = get_option('my_chat_plugin_button_icon', 'icon1');
    $icons = get_default_chat_icons();
    $button_icon_url = isset($icons[$selected_icon]) ? $icons[$selected_icon] : $icons['icon1']; // Icon selected

    wp_localize_script('my-social-button-script', 'myChatPluginData', array(
        'inputCode' => $input_code,
        'buttonColor' => $button_color,
        'initialQuestion' => $initial_question,
        'buttonIconUrl' => $button_icon_url 
    ));

}
add_action( 'wp_footer', 'yooz_scripts');

// Loading Scripts For Admin

function admin_scripts($hook_suffix) {

    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script(
        'my-chat-plugin-color-picker',
        RAYIUM_YOOZ_JS . 'admin-script.js',
        array('wp-color-picker'),
	    YOOZ_ASSETS_VERSION,
        true
    );
  }
  add_action('admin_enqueue_scripts', 'admin_scripts');