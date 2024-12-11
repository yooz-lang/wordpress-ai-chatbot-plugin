<?php
/*
 * Plugin Name: Yooz AI Chatbot
 * Version: 2.0
 * Author: yooz
 * Author URI: https://yooz.run/
 * Description: یوز یک زبان نشانه گذاری هوش مصنوعی است که میتوایند با آن یک چت بات هوش مصنوعی برای سایت خود بسازید . با فعالسازی این افزونه یک گزینه چت در سایت خود مشاهده خواهدی کرد که اطلاعات گفتگوی خود را از پنل ادمین شما می گیرد
 */

 if(!defined('ABSPATH')){
    exit;
}

// Calling Files

define( 'RAYIUM_YOOZ_INC', plugin_dir_path( __FILE__ ) . 'inc/' );
define( 'RAYIUM_YOOZ_CSS', plugin_dir_url( __FILE__ ) . 'css/' );
define( 'RAYIUM_YOOZ_JS', plugin_dir_url( __FILE__ ) . 'js/' );

// Include modules

require( RAYIUM_YOOZ_INC . 'functions.php' );
require( RAYIUM_YOOZ_INC . 'enqueue.php' );

