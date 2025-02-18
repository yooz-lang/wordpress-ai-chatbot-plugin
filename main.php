<?php
/*
Plugin Name:  yooz chatbot
Plugin URI: https://yooz.run/plugin-demo/
Description: یوز یک زبان داده است که می‌توانید با آن یک چت‌بات هوش مصنوعی برای سایت خود بسازید.
Version: 1.0
Author: yooz
Author URI: https://yooz.run/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
add_action('admin_menu', 'product_info_export_menu');
function get_default_chat_icons()
{
    return array(
        'icon1' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2"><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3h-5l-5 3v-3H6a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3zM9.5 9h.01m4.99 0h.01"/><path d="M9.5 13a3.5 3.5 0 0 0 5 0"/></g></svg>',
        'icon2' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 27"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.05" color="currentColor"><path d="M11 8h2c2.828 0 4.243 0 5.121.879C19 9.757 19 11.172 19 14s0 4.243-.879 5.121C17.243 20 15.828 20 13 20h-1s-.5 2-4 2c0 0 1-1.009 1-2.017c-1.553-.047-2.48-.22-3.121-.862C5 18.243 5 16.828 5 14s0-4.243.879-5.121C6.757 8 8.172 8 11 8m8 3.5h.5c.935 0 1.402 0 1.75.201a1.5 1.5 0 0 1 .549.549c.201.348.201.815.201 1.75s0 1.402-.201 1.75a1.5 1.5 0 0 1-.549.549c-.348.201-.815.201-1.75.201H19m-14-5h-.5c-.935 0-1.402 0-1.75.201a1.5 1.5 0 0 0-.549.549C2 12.598 2 13.065 2 14s0 1.402.201 1.75a1.5 1.5 0 0 0 .549.549c.348.201.815.201 1.75.201H5m8.5-13a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0M12 5v3m-3 4v1m6-1v1"/><path d="M10 16.5s.667.5 2 .5s2-.5 2-.5"/></g></svg>',
        'icon3' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 32 32"><path fill="currentColor" d="M16 19a6.99 6.99 0 0 1-5.833-3.129l1.666-1.107a5 5 0 0 0 8.334 0l1.666 1.107A6.99 6.99 0 0 1 16 19m4-11a2 2 0 1 0 2 2a1.98 1.98 0 0 0-2-2m-8 0a2 2 0 1 0 2 2a1.98 1.98 0 0 0-2-2"/><path fill="currentColor" d="M17.736 30L16 29l4-7h6a1.997 1.997 0 0 0 2-2V6a1.997 1.997 0 0 0-2-2H6a1.997 1.997 0 0 0-2 2v14a1.997 1.997 0 0 0 2 2h9v2H6a4 4 0 0 1-4-4V6a4 4 0 0 1 4-4h20a4 4 0 0 1 4 4v14a4 4 0 0 1-4 4h-4.835Z"/></svg>',
        'icon4' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.05" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227q1.694.25 3.423.379c.35.026.67.21.865.501L12 21l2.755-4.132a1.14 1.14 0 0 1 .865-.502a48 48 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.4 48.4 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741z"/></svg>',
        'icon5' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 52"><ellipse cx="24" cy="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" rx="9.636" ry="20.5"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M28.818 15.655c9.805 5.66 15.597 13.986 12.936 18.595s-12.767 3.756-22.572-1.905S3.586 18.36 6.247 13.75c1.064-1.843 3.318-2.812 6.267-2.95c4.427-.208 10.42 1.457 16.304 4.855"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M28.818 32.345c-9.805 5.661-19.91 6.514-22.571 1.905s3.13-12.934 12.935-18.595c5.662-3.27 11.424-4.935 15.795-4.871c3.198.046 5.652 1.018 6.777 2.966c2.66 4.609-3.13 12.934-12.936 18.595M20.43 21.251h7.14M19.314 24h9.372m-6.745 2.749h4.118"/></svg>',
        'icon6' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="currentColor" d="M11.999 0c-2.25 0-4.5.06-6.6.21a5.57 5.57 0 0 0-5.19 5.1c-.24 3.21-.27 6.39-.06 9.6a5.644 5.644 0 0 0 5.7 5.19h3.15v-3.9h-3.15c-.93.03-1.74-.63-1.83-1.56c-.18-3-.15-6 .06-9c.06-.84.72-1.47 1.56-1.53c2.04-.15 4.2-.21 6.36-.21s4.32.09 6.36.18c.81.06 1.5.69 1.56 1.53c.24 3 .24 6 .06 9c-.12.93-.9 1.62-1.83 1.59h-3.15l-6 3.9V24l6-3.9h3.15c2.97.03 5.46-2.25 5.7-5.19c.21-3.18.18-6.39-.03-9.57a5.57 5.57 0 0 0-5.19-5.1c-2.13-.18-4.38-.24-6.63-.24m-5.04 8.76c-.36 0-.66.3-.66.66v2.34c0 .33.18.63.48.78c1.62.78 3.42 1.2 5.22 1.26c1.8-.06 3.6-.48 5.22-1.26c.3-.15.48-.45.48-.78V9.42c0-.09-.03-.15-.09-.21a.65.65 0 0 0-.87-.36c-1.5.66-3.12 1.02-4.77 1.05c-1.65-.03-3.27-.42-4.77-1.08a.6.6 0 0 0-.24-.06"/></svg>',
        'icon7' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="currentColor" d="M12.28 19.23q1.056-.075 2.084-.337a5.8 5.8 0 0 0 2.602.168a1 1 0 0 1 .104-.008c.31 0 .717.178 1.31.553v-.616a.6.6 0 0 1 .311-.525c.258-.143.498-.31.717-.492c.864-.723 1.352-1.686 1.352-2.706a3.2 3.2 0 0 0-.159-.993c.26-.48.472-.986.627-1.51c.5.74.77 1.61.772 2.503c0 1.386-.654 2.68-1.785 3.625a6 6 0 0 1-.595.436v1.442c0 .496-.58.78-.989.486a15 15 0 0 0-1.2-.8a3 3 0 0 0-.369-.184q-.51.076-1.038.077c-1.412 0-2.717-.419-3.744-1.12m-7.466-2.885C3.03 14.854 2 12.818 2 10.64c0-4.454 4.258-8.014 9.457-8.014s9.458 3.56 9.458 8.014s-4.259 8.013-9.458 8.013q-.877 0-1.728-.133c-.245.057-1.224.631-2.635 1.648c-.51.369-1.236.013-1.236-.608V17.1a9 9 0 0 1-1.044-.754m4.95.658q.063 0 .13.01a9.5 9.5 0 0 0 1.563.128c4.392 0 7.907-2.939 7.907-6.502s-3.515-6.501-7.907-6.501c-4.39 0-7.907 2.939-7.907 6.501c0 1.723.821 3.345 2.273 4.559q.55.458 1.196.821c.241.135.39.385.39.655v1.419c1.116-.74 1.85-1.09 2.354-1.09"/><path fill="currentColor" d="M7.625 12a1.25 1.25 0 1 0 0-2.5a1.25 1.25 0 0 0 0 2.5m4.062 0a1.25 1.25 0 1 0 0-2.5a1.25 1.25 0 0 0 0 2.5m4.063.001a1.25 1.25 0 1 0 0-2.5a1.25 1.25 0 0 0 0 2.5"/></svg>',
        'icon8' => '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 1848 2048"><path fill="currentColor" d="M768 1024H640V896h128zm512 0h-128V896h128zm512-128v256h-128v320q0 40-15 75t-41 61t-61 41t-75 15h-264l-440 376v-376H448q-40 0-75-15t-61-41t-41-61t-15-75v-320H128V896h128V704q0-40 15-75t41-61t61-41t75-15h448V303q-29-17-46-47t-18-64q0-27 10-50t27-40t41-28t50-10q27 0 50 10t40 27t28 41t10 50q0 34-17 64t-47 47v209h448q40 0 75 15t61 41t41 61t15 75v192zm-256-192q0-26-19-45t-45-19H448q-26 0-45 19t-19 45v768q0 26 19 45t45 19h448v226l264-226h312q26 0 45-19t19-45zm-851 462q55 55 126 84t149 30q78 0 149-29t126-85l90 91q-73 73-167 112t-198 39q-103 0-197-39t-168-112z"/></svg>'
    );
}


function my_social_button_add_html()
{
    echo '
<div id="yooz_chatPage" class="yooz_chat_page">
  <div id="yooz_btn-id" onclick="openChatBox()" class="yooz_chat_button" style="color : white ; ">
    <svg id="yooz_chatOpen" style="color : white ; " xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.05" color="currentColor"><path d="M11 8h2c2.828 0 4.243 0 5.121.879C19 9.757 19 11.172 19 14s0 4.243-.879 5.121C17.243 20 15.828 20 13 20h-1s-.5 2-4 2c0 0 1-1.009 1-2.017c-1.553-.047-2.48-.22-3.121-.862C5 18.243 5 16.828 5 14s0-4.243.879-5.121C6.757 8 8.172 8 11 8m8 3.5h.5c.935 0 1.402 0 1.75.201a1.5 1.5 0 0 1 .549.549c.201.348.201.815.201 1.75s0 1.402-.201 1.75a1.5 1.5 0 0 1-.549.549c-.348.201-.815.201-1.75.201H19m-14-5h-.5c-.935 0-1.402 0-1.75.201a1.5 1.5 0 0 0-.549.549C2 12.598 2 13.065 2 14s0 1.402.201 1.75a1.5 1.5 0 0 0 .549.549c.348.201.815.201 1.75.201H5m8.5-13a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0M12 5v3m-3 4v1m6-1v1"/><path d="M10 16.5s.667.5 2 .5s2-.5 2-.5"/></g></svg>
  </div>
<style>
.yooz_chat-input input[type="text"] {
    border: none !important;
    background-color: #f5f8fc !important;
}
</style>

<div id="yooz_chatbar" class="yooz_chat_box animated fadeInUp">
  <div class="yooz_app-main">
    <div class="yooz_chat-wrapper">
        <div class="yooz_message-wrapper"><img class="yooz_message-pp" src="https://yooz.run/pb_img/bot.png" alt="bot-pic"><div class="yooz_message-box-wrapper"><div class="yooz_message-box" style="text-align: right; font-family: yekan;"><div id="ini-msg" class="yooz_mo">سلام خوش اومدی 🙂 هر سوالی در مورد فروشگاه و محصولات داری بپرس جواب بدم 🙃
        </div></div></div></div>
  </div>
  <div class="yooz_chat-input-wrapper" style="border: 1px solid rgb(145, 144, 144);">
      <input name="submit" class="yooz_chat-input" style="text-align: right;font-family: yekan;height: 25px;border : none ; background-color : #f5f8fc ; " placeholder="سوالی بپرسید تا جواب بدم" autocomplete="off">
      <button class="yooz_send" style="float: left; background-color: #f5f8fc; border: none;">
          <svg style="margin-left : -10px" xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="#b5b5b5" d="M20.235 5.686c.432-1.195-.726-2.353-1.921-1.92L3.709 9.048c-1.199.434-1.344 2.07-.241 2.709l4.662 2.699l4.163-4.163a1 1 0 0 1 1.414 1.414L9.544 15.87l2.7 4.662c.638 1.103 2.274.957 2.708-.241z"/></g></svg>
      </button>
        </div>
        <p style="font-size : smaller ; color : lightgray; margin-bottom : -8px;text-align : center ;margin-top : 2px;font-family : yekan; ">قدرت گرفته از <a href="https://yooz.run/" style="color : lightgrey">زبان یوز </a></p>
  </div>
</div>
</div>
';
}
add_action('wp_footer', 'my_social_button_add_html');

function product_info_export_menu()
{
    add_menu_page(
        'چت بات یوز',
        'چت بات یوز',
        'manage_options',
        'yooz_chat_plugin_page',
        'yooz_chat_plugin_page_content',
        'dashicons-format-chat',
        6
    );
}
function yooz_chat_plugin_page_content()
{
    // دریافت داده‌های ذخیره‌شده
    $store_name = get_option('store_name', '');
    $store_description = get_option('store_description', '');
    $button_color = get_option('my_chat_plugin_button_color', '#0073aa');
    $margin_bottom = get_option('my_chat_plugin_bottom', 0);
    $initial_msg = get_option('my_chat_plugin_initial_msg', 'سلام خوش اومدی 🙂 هر سوالی در مورد فروشگاه و محصولات داری بپرس جواب بدم 🙃');
    $initial_question = get_option('my_chat_plugin_initial_question', 'سوالی بپرسید تا جواب بدم');
    $icons = get_default_chat_icons();
    $selected_icon = get_option('my_chat_plugin_button_icon', 'icon1');
    $button_position = get_option('my_chat_plugin_button_position', 'right');
    $store_name = get_option('store_name', '');
    $store_description = get_option('store_description', '');
    $shipping_method = get_option('shipping_method', '');
    $contact_method = get_option('contact_method', '');
    $return_policy = get_option('return_policy', '');
    $payment_method = get_option('payment_method', '');
    $shipping_time = get_option('shipping_time', '');
    wp_enqueue_style('main', plugin_dir_url(__FILE__) . 'css/style.css');
    wp_enqueue_style('my-social-button-style', plugin_dir_url(__FILE__) . 'css/admin.css');


    echo '<h1 style="font-family : yekan"><a href="https://yooz.run"><img src="https://yooz.run/images/about.png" style="width: 1.2em;margin-bottom : -10px;"></a> چت بات هوش مصنوعی یوز</h1>';
    // افزودن HTML برای تب‌ها

    // css
    echo '
    <div class="nav-tab-wrapper">
        <a href="#tab-1" class="nav-tab nav-tab-active" onclick="showTab(event, \'tab-2\')">داده ها</a>
        <a href="#tab-3" class="nav-tab" onclick="showTab(event, \'tab-1\')">خروجی محصولات</a>
        <a href="#tab-2" class="nav-tab" onclick="showTab(event, \'tab-2\')">شخصی‌سازی</a>
        <a href="#tab-4" class="nav-tab" onclick="showTab(event, \'tab-2\')">گفتگو ها</a>
        <a href="#tab-5" class="nav-tab" onclick="showTab(event, \'tab-2\')">حمایت کنید</a>
    </div>';

    echo '<div id="tab-3" class="tab-content" style="display: none;">';
    echo '<form method="post" action="" style="background: #f9f9f9; padding: 20px; border-radius: 8px;">';
    echo '<label for="store_name">نام فروشگاه</label><br>';
    echo '<input type="text" name="store_name" value="' . esc_attr($store_name) . '" style="width: 100%; padding: 8px;" /><br><br>';

    echo '<label for="store_description">توضیحات فروشگاه</label><br>';
    echo '<textarea name="store_description" style="width: 100%; padding: 8px;">' . esc_textarea($store_description) . '</textarea><br><br>';

    echo '<label for="shipping_method">نحوه ارسال</label><br>';
    echo '<input type="text" name="shipping_method" value="' . esc_attr($shipping_method) . '" style="width: 100%; padding: 8px;" /><br><br>';

    echo '<label for="contact_method">پل ارتباطی و شماره تماس</label><br>';
    echo '<input type="text" name="contact_method" value="' . esc_attr($contact_method) . '" style="width: 100%; padding: 8px;" /><br><br>';

    echo '<label for="return_policy">قوانین بازگشت کالا</label><br>';
    echo '<textarea name="return_policy" style="width: 100%; padding: 8px;">' . esc_textarea($return_policy) . '</textarea><br><br>';

    echo '<label for="payment_method">روش پرداخت</label><br>';
    echo '<input type="text" name="payment_method" value="' . esc_attr($payment_method) . '" style="width: 100%; padding: 8px;" /><br><br>';

    echo '<label for="shipping_time">مدت زمان ارسال</label><br>';
    echo '<input type="text" name="shipping_time" value="' . esc_attr($shipping_time) . '" style="width: 100%; padding: 8px;" /><br><br>';

    // دکمه‌های ذخیره و خروجی گرفتن
    echo '<button type="submit" name="export_products" class="button button-primary" style="margin-right: 10px; float: left;">
    <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24" style="vertical-align: middle; margin-right: 5px;">
        <g fill="none">
            <path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/>
            <path fill="currentColor" d="M9.107 5.448c.598-1.75 3.016-1.803 3.725-.159l.06.16l.807 2.36a4 4 0 0 0 2.276 2.411l.217.081l2.36.806c1.75.598 1.803 3.016.16 3.725l-.16.06l-2.36.807a4 4 0 0 0-2.412 2.276l-.081.216l-.806 2.361c-.598 1.75-3.016 1.803-3.724.16l-.062-.16l-.806-2.36a4 4 0 0 0-2.276-2.412l-.216-.081l-2.36-.806c-1.751-.598-1.804-3.016-.16-3.724l.16-.062l2.36-.806A4 4 0 0 0 8.22 8.025l.081-.216zM19 2a1 1 0 0 1 .898.56l.048.117l.35 1.026l1.027.35a1 1 0 0 1 .118 1.845l-.118.048l-1.026.35l-.35 1.027a1 1 0 0 1-1.845.117l-.048-.117l-.35-1.026l-1.027-.35a1 1 0 0 1-.118-1.845l.118-.048l1.026-.35l.35-1.027A1 1 0 0 1 19 2"/>
        </g>
    </svg>
    خزش و خروجی محصولات
  </button>';
    echo '<button type="submit" name="save_store_info" class="button button-primary" style="margin-right: 10px; float: left;background-color : green ;border : none ; ">
    <svg style="margin-bottom : -3px" xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7v12q0 .825-.587 1.413T19 21H5q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h12zm-9 11q1.25 0 2.125-.875T15 15t-.875-2.125T12 12t-2.125.875T9 15t.875 2.125T12 18m-6-8h9V6H6z"/>
    </svg>
    ذخیره اطلاعات صفحه
  </button>';
    echo '</form>';
    echo '</div>';

    // ذخیره اطلاعات فروشگاه
    if (isset($_POST['save_store_info'])) {
        update_option('store_name', sanitize_text_field($_POST['store_name']));
        update_option('store_description', sanitize_textarea_field($_POST['store_description']));
        update_option('shipping_method', sanitize_text_field($_POST['shipping_method']));
        update_option('contact_method', sanitize_text_field($_POST['contact_method']));
        update_option('return_policy', sanitize_textarea_field($_POST['return_policy']));
        update_option('payment_method', sanitize_text_field($_POST['payment_method']));
        update_option('shipping_time', sanitize_text_field($_POST['shipping_time']));
        echo '<div class="updated"><p>اطلاعات و مشخصات سایت با موفقیت ذخیره شد !</p></div>';
    }

    // خروجی گرفتن محصولات به فایل
    if (isset($_POST['export_products'])) {
        product_info_export_to_file();
    }
    
    // تب داده ها 
$file_path = plugin_dir_path(__FILE__) . 'data.yooz';

// مقدار پیش‌فرض
$yooz_code = '';

// اگر فایل وجود دارد، محتویات را بخوان
if (file_exists($file_path)) {
    $yooz_code = file_get_contents($file_path);
}

// پردازش ذخیره‌سازی هنگام ارسال فرم
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['my_chat_plugin_text'])) {
    check_admin_referer('my_chat_plugin_code_settings'); // امنیت

    // دریافت مقدار ورودی و ذخیره در فایل
    $new_content = sanitize_textarea_field($_POST['my_chat_plugin_text']);
    file_put_contents($file_path, $new_content);

    // ریدایرکت برای جلوگیری از ارسال مجدد
    wp_redirect(admin_url('admin.php?page=yooz_chat_plugin_page'));
}

    echo '<div id="tab-1" class="tab-content">
    <form method="post">';
    wp_nonce_field('my_chat_plugin_code_settings');
    echo '<table class="form-table">
                <tr valign="top">
                    <td>
                        <textarea id="my_chat_plugin_textarea" name="my_chat_plugin_text" rows="10" cols="50" class="large-text code-editor">' . esc_textarea($yooz_code) . '</textarea>
                    </td>
                </tr>
        </table>';
    submit_button('ذخیره تغییرات');
    echo '</form>
  </div>';

    // تب دوم: شخصی‌سازی
    echo '<div id="tab-2" class="tab-content" style="display: none;">';
    echo '<form method="post" action="options.php">';
    settings_fields('my_chat_plugin_customization_settings');

    echo '<table class="form-table">
    <tr valign="top">
        <th scope="row">انتخاب رنگ دکمه:</th>
        <td>
            <input type="text" id="my_chat_plugin_button_color" name="my_chat_plugin_button_color" value="' . esc_attr($button_color) . '" class="my-color-field" data-default-color="#0073aa" />
        </td>
    </tr>
    <tr valign="top">
        <th scope="row">فاصله از پایین صفحه : </th>
    <td>
            <input type="number" id="my_chat_plugin_bottom" name="my_chat_plugin_bottom" value="' . esc_attr($margin_bottom) . '" class="regular-text" />
        </td>
    </tr>
    <tr valign="top">
        <th scope="row">مکان قرار گیری دکمه :</th>
        <td>
            <select id="my_chat_plugin_button_position" name="my_chat_plugin_button_position">
                <option value="right"' . selected($button_position, 'right', false) . '>راست</option>
                <option value="left"' . selected($button_position, 'left', false) . '>چپ</option>
            </select>
        </td>
    </tr>
    <tr valign="top">
            <th scope="row">پیام اولیه:</th>
        <td>
            <input type="text" id="my_chat_plugin_initial_question" name="my_chat_plugin_initial_msg" value="' . esc_attr($initial_msg) . '" class="regular-text" />
        </td>
    </tr>
    <tr valign="top">
            <th scope="row">متن درون inputbox :</th>
        <td>
            <input type="text" id="my_chat_plugin_initial_question" name="my_chat_plugin_initial_question" value="' . esc_attr($initial_question) . '" class="regular-text" />
        </td>
    </tr>
    <tr valign="top">
        <th scope="row">انتخاب آیکن:</th>
        <td>';

    foreach ($icons as $icon_key => $icon_svg) {
        echo '<label>
                <input type="radio" name="my_chat_plugin_button_icon" value="' . esc_attr($icon_key) . '" ' . checked($selected_icon, $icon_key, false) . '>
                ' . $icon_svg . '
            </label>';
    }

    echo '      </td>
            </tr>
        </table>';

    submit_button();
    echo '</form>';
    echo '</div>';


    // تب گفتگو
    function parseYoozFile($filename) {
        $filename = __DIR__ . "/" . $filename; // مسیر کامل فایل
    
        if (!file_exists($filename)) {
            die("File not found: $filename");
        }
    
        $content = file_get_contents($filename);
        
        // الگوی ریجکس برای استخراج پیام‌های جلوی + و -
        preg_match_all('/\(\s*\+([^\n]+)\n\s*-([^\)]+)\)/', $content, $matches, PREG_SET_ORDER);
        
        $parsedData = [];
        foreach ($matches as $match) {
            $parsedData[] = [
                'user' => trim($match[1]),
                'bot' => trim($match[2])
            ];
        }
    
        return $parsedData;
    }
    
    // خواندن و پردازش فایل
    $yoozData = parseYoozFile("chat_log.yooz");
    $yoozData = array_reverse($yoozData);
    
    // نمایش نتیجه
    echo '<div id="tab-4" class="tab-content" style="display: none;height : 100%" >
        <main class="msger-chat" style="height : 100%;">';
    
    foreach ($yoozData as $message) {
        echo '<div class="msg right-msg">
          <div class="msg-img" style="background-image: url(https://yooz.run/pb_img/user.png)"></div>
          <div class="msg-bubble">
            <div class="msg-info">
              <div class="msg-info-name">user</div>
            </div>
            <div class="msg-text">'.htmlspecialchars($message['user']).'</div>
          </div>
        </div>';
    
        echo '<div class="msg left-msg">
          <div class="msg-img" style="background-image: url(https://yooz.run/pb_img/blue.png)"></div>
          <div class="msg-bubble">
            <div class="msg-info">
              <div class="msg-info-name">BOT</div>
            </div>
            <div class="msg-text">'.htmlspecialchars($message['bot']).'</div>
          </div>
        </div>';
    }
    
    echo '</main></div>';
    

    // تب حمایت 
    echo '<div id="tab-5" class="tab-content" style="display: none;">
    <div class="help-div" > 
    <h1 style="font-family : yekan ;text-align : center ;margin-top : 30px;">❤️ این افزونه بصورت کاملا رایگان برای تسهیل ارتباطات و ارتقا کیفی سایت ها ارائه شده ❤️</h1>
    <h4 style="font-family : yekan ;text-align : center ;margin-top : 30px;">اما توسعه دهندگان این افزونه نیاز به حمایت دارند تا این افزونه همیشه رایگان و در دسترس بماند و قدرتمند تر شود ! به همین منظور اگر توان مالی داشتید حتما برنامه نویس های این افزونه را یک قهوه مهمان کنید 🙂 </h4>
    <a href="https://www.coffeete.ir/yooz" ><button class="help-me" >یک قهوه مهمان کن   <svg style="margin-bottom : -3px;" xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 32 32"><path fill="#fff" d="M2 28h28v2H2zm22.5-17H8a2 2 0 0 0-2 2v8a5.006 5.006 0 0 0 5 5h8a5.006 5.006 0 0 0 5-5v-1h.5a4.5 4.5 0 0 0 0-9M22 21a3.003 3.003 0 0 1-3 3h-8a3.003 3.003 0 0 1-3-3v-8h14zm2.5-3H24v-5h.5a2.5 2.5 0 0 1 0 5M19 9h-2v-.146a1.99 1.99 0 0 0-1.105-1.789L13.21 5.724A3.98 3.98 0 0 1 11 2.146V1h2v1.146a1.99 1.99 0 0 0 1.106 1.789l2.683 1.341A3.98 3.98 0 0 1 19 8.854z"/></svg></button></a>
    </div>
    </div>
    ' ; 
    // جاوااسکریپت برای مدیریت تب‌ها
    echo '
    <script>
        function showTab(event, tabId) {
            event.preventDefault();
            var tabs = document.getElementsByClassName("tab-content");
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].style.display = "none";
            }
            document.getElementById(tabId).style.display = "block";

            var tabLinks = document.getElementsByClassName("nav-tab");
            for (var i = 0; i < tabLinks.length; i++) {
                tabLinks[i].classList.remove("nav-tab-active");
            }
            event.currentTarget.classList.add("nav-tab-active");
        }
    </script>';
}


function product_info_export_to_file()
{
    $store_name = get_option('store_name', 'Unnamed Store');
    $store_name = str_replace(' ', '،', $store_name);
    $store_description = get_option('store_description', 'No description provided.');
    $shipping_method = get_option('shipping_method', ' ');
    $contact_method = get_option('contact_method', ' ');
    $return_policy = get_option('return_policy', ' ');
    $payment_method = get_option('payment_method', ' ');
    $shipping_time = get_option('shipping_time', ' ');
    $type5 = "
(
    + {روش، ارسال / تحویل / فرستادن / فرستاد}
    - $shipping_method
)";
    $type6 = "
(
    + {برگشت / تعویض / عوض}
    - $return_policy
)";
    $type7 = "
(
    + {پشتیبانی / تماس / زنگ / واتساپ / تلگرام / اینستاگرام}
    - $contact_method
)";
    $type8 = "
(
    + {زمان ،ارسال / فرستادن / فرستاد}
    - $shipping_time
)";
    $type9 = "
(
    + {روش / نحوه / چجوری / چجوریه ، پرداخت / پرداختتون}
    - $payment_method
)";
    $tyep10 = "
(
    + { فروشگاه / سایت / مغازه ، $store_name / مشخصات / نام / اسم / نامت }
    - $store_description
)";
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1
    );
    $products = get_posts($args);

    $file_path = plugin_dir_path(__FILE__) . 'product-info.yooz';
    $file = fopen($file_path, 'w');

    if (!$file) {
        echo '<p>Could not open file for writing.</p>';
        return;
    }
    fwrite($file, $type5);
    fwrite($file, $type6);
    fwrite($file, $type7);
    fwrite($file, $type8);
    fwrite($file, $type9);
    fwrite($file, $tyep10);

// کوئری برای دریافت تمام محصولات
$query = new WP_Query(array(
    'post_type' => 'product', // نوع پست (در اینجا محصول)
    'posts_per_page' => -1,   // تعداد محصولات (در اینجا همه محصولات)
));

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();

        // دریافت اطلاعات محصول
        $product_id = get_the_ID();
        $product_name = get_the_title();

        // دریافت دو کلمه اول از عنوان
        $words = explode(' ', $product_name);
        $firstTwoWords = array_slice($words, 0, 2);
        $product_name = implode('،', $firstTwoWords);
        $product_name = str_replace(' ', '،', $product_name);

        // دریافت توضیحات، قیمت، لینک و تصویر
        $product_desc = get_post_field('post_content', $product_id);
        if (stripos($product_desc, '<p>') !== false) {
            // اگر توضیحات شامل تگ <p> باشد
            $doc = new DOMDocument();
            @$doc->loadHTML(mb_convert_encoding($product_desc, 'HTML-ENTITIES', 'UTF-8'));
            $paragraphs = $doc ? $doc->getElementsByTagName('p') : null;
            $product_desc = $paragraphs->length > 0 ? trim($paragraphs->item(0)->nodeValue) : $product_desc;
        } elseif (strpos($product_desc, "\n") !== false) {
            // اگر توضیحات شامل خط جدید باشد
            $paragraphs = explode("\n", wp_strip_all_tags($product_desc));
            $product_desc = isset($paragraphs[0]) ? trim($paragraphs[0]) : $product_desc;
        } else {
            // اگر هیچ‌کدام از حالت‌های بالا نبود، کل متن را ذخیره کن
            $product_desc = wp_strip_all_tags($product_desc);
        }
        $product_price = get_post_meta($product_id, '_price', true);
        $product_link = get_permalink($product_id);
        $product_image = get_the_post_thumbnail_url($product_id, 'full');

        // نوشتن اطلاعات در فایل
        $type1 = "
(
    + { {$product_name} ، داری / موجود / هست / میفروشی / فروش / دار / چطور / معرفی}
    - 
    <img src='$product_image'>
    </br>
    بله {$product_name} موجوده و میتونید همین الان از لینک زیر خریداری کنید 👇
    <br/>
    <a style='color : blue;' href='{$product_link}'>برای خرید محصول {$product_name} کلیک کنید</a>
)";
        fwrite($file, $type1);

        $type3 = "
(
    +  { {$product_name} ، قیمت / چند / چقدر / هزینه }
    -<img src='$product_image'><br>قیمت محصول مورد نظر شما {$product_price} می باشد<br><a style='color : blue;' href='{$product_link}'>برای خرید محصول {$product_name} کلیک کنید</a>
)";
        fwrite($file, $type3);
        
        $type2 = "
(
    + { {$product_name} }
    -<img src='$product_image'><br>{$product_desc}<br><a style='color : blue;' href='{$product_link}'>برای خرید محصول {$product_name} کلیک کنید</a>
)";
        fwrite($file, $type2);

        // دریافت تگ‌های محصول
        $product_tags = wp_get_post_terms($product_id, 'product_tag');

        if (!empty($product_tags)) {
            foreach ($product_tags as $tag) {
                $tag_name = $tag->name;
                $tag_description = get_post_field('post_content', $product_id);
                if (stripos($tag_description, '<p>') !== false) {
                    // اگر توضیحات شامل تگ <p> باشد
                    $doc = new DOMDocument();
                    @$doc->loadHTML(mb_convert_encoding($tag_description, 'HTML-ENTITIES', 'UTF-8'));
                    $paragraphs = $doc ? $doc->getElementsByTagName('p') : null;
                    $tag_description = $paragraphs->length > 0 ? trim($paragraphs->item(0)->nodeValue) : $tag_description;
                } elseif (strpos($tag_description, "\n") !== false) {
                    // اگر توضیحات شامل خط جدید باشد
                    $paragraphs = explode("\n", wp_strip_all_tags($tag_description));
                    $tag_description = isset($paragraphs[0]) ? trim($paragraphs[0]) : $tag_description;
                } else {
                    // اگر هیچ‌کدام از حالت‌های بالا نبود، کل متن را ذخیره کن
                    $tag_description = wp_strip_all_tags($tag_description);
                }
                $product_link = get_permalink($product_id);
                $type4 = "
(
    + { {$tag_name} }
    - {$tag_description}<br><a style='color : blue;' href='{$product_link}'>برای خرید محصول {$tag_name} کلیک کنید</a>
)";
                fwrite($file, $type4);
            }
        }

        fwrite($file, "\n"); // جداسازی محصولات
    }
}

    $tyep11 = "
(
    + { محصول }
    - دنبال هر محصولی که میگردی بهم بگو و ازم بپرس ببینم اونو دارم یا نه 😎
)
(
    + { دیگه / چی / داری }
    - هر چی بخوای دارم کافیه یه سری به محصولات فروشگاه بزنی یا ازم بپرسی 😇
)
(
    + { نمی / خرم }
    - خواهش میکنم چیزی بخر من زن و بچه رباتی دارم تو پول ندی پول سرورامو از کجا بیارم 😭
)";
    fwrite($file, $tyep11);
    fclose($file);
    echo '<div class="updated"><p>اطلاعات محصولات و مشخصات سایت با موفقیت به مدل هوش مصنوعی آموزش داده شد!</p></div>';
}
function my_chat_plugin_enqueue_admin_scripts($hook_suffix)
{
    // بارگذاری استایل و اسکریپت‌های مربوط به color picker
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('my-chat-plugin-color-picker', plugin_dir_url(__FILE__) . 'js/admin-script.js', array('wp-color-picker'), false, true);
}
add_action('admin_enqueue_scripts', 'my_chat_plugin_enqueue_admin_scripts');

function my_chat_plugin_enqueue_code_editor()
{
    // بارگذاری استایل و اسکریپت‌های کد ادیتور
    wp_enqueue_code_editor(array('type' => 'text/javascript'));

    // فعال کردن CodeMirror برای تکست ایریا
    wp_add_inline_script(
        'code-editor',
        'jQuery(function($){
            var editor = wp.codeEditor.initialize($("#my_chat_plugin_textarea"), {
                codemirror: {
                    mode: "javascript", 
                    lineNumbers: true,
                    matchBrackets: true,
                    autoCloseBrackets: true,
                    theme: "default"
                }
            });
        });'
    );
}
add_action('admin_enqueue_scripts', 'my_chat_plugin_enqueue_code_editor');
function my_chat_plugin_register_settings()
{
    // ثبت تنظیمات تب شخصی‌سازی
    register_setting('my_chat_plugin_customization_settings', 'my_chat_plugin_button_color');
    register_setting('my_chat_plugin_customization_settings', 'my_chat_plugin_initial_question');
    register_setting('my_chat_plugin_customization_settings', 'my_chat_plugin_initial_msg');
    register_setting('my_chat_plugin_customization_settings', 'my_chat_plugin_button_icon');
    register_setting('my_chat_plugin_customization_settings', 'my_chat_plugin_bottom');
    register_setting('my_chat_plugin_customization_settings', 'my_chat_plugin_button_position');
    
}
add_action('admin_init', 'my_chat_plugin_register_settings');
function my_social_button_enqueue_scripts()
{
    // بارگذاری CSS و JavaScript
    wp_enqueue_style('my-social-button-style', plugin_dir_url(__FILE__) . 'css/style.css');
    wp_enqueue_script('my-social-button-script', plugin_dir_url(__FILE__) . 'js/script.js', array('jquery'), null, true);

    // خواندن محتویات فایل product.txt و بررسی وجود فایل
    $file_path = plugin_dir_path(__FILE__) . 'product-info.yooz'; // مسیر کامل فایل برای جلوگیری از خطا
    $data_code = plugin_dir_path(__FILE__) . 'data.yooz';

    if (file_exists($file_path)) {
        $product_file = file_get_contents($file_path);
        $data_content = file_exists($data_code) ? file_get_contents($data_code) : "";
        $input_code = $data_content . $product_file;
    } else {
        $input_code = file_exists($data_code) ? file_get_contents($data_code) : "";
    }
    

    // دریافت تنظیمات شخصی‌سازی از پایگاه داده
    $button_color = get_option('my_chat_plugin_button_color', '#0073aa');
    $initial_msg = get_option('my_chat_plugin_initial_msg', 'سلام خوش اومدی 🙂 هر سوالی در مورد فروشگاه و محصولات داری بپرس جواب بدم 🙃');
    $initial_question = get_option('my_chat_plugin_initial_question', 'سوالی بپرسید تا جواب بدم');
    $button_position = get_option('my_chat_plugin_button_position', 'right'); // دریافت مقدار مکان دکمه
    $selected_icon = get_option('my_chat_plugin_button_icon', 'icon1');
    $margin_bottom = get_option('my_chat_plugin_bottom', 0);
    $icons = get_default_chat_icons();
    $button_icon_url = isset($icons[$selected_icon]) ? $icons[$selected_icon] : $icons['icon1']; // آیکن انتخاب شده

    // ارسال داده‌ها به جاوااسکریپت
    wp_localize_script('my-social-button-script', 'myChatPluginData', array(
        'inputCode' => $input_code,
        'buttonColor' => $button_color,
        'initialmsg' => $initial_msg,
        'initialQuestion' => $initial_question,
        'buttonIconUrl' => $button_icon_url ,
        'marginbottom' => $margin_bottom ,
        'buttonPosition' => $button_position // ارسال مکان دکمه
    ));
}

add_action('wp_enqueue_scripts', 'my_social_button_enqueue_scripts');

// ثبت و لود فایل جاوااسکریپت و مقداردهی متغیر yooz_ajax
function yooz_plugin_enqueue_scripts() {
    wp_enqueue_script('yooz-script', plugin_dir_url(__FILE__) . 'js/ajax.js', array('jquery'), null, true);

    wp_localize_script('yooz-script', 'yooz_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php') // آدرس AJAX وردپرس
    ));
}
add_action('wp_enqueue_scripts', 'yooz_plugin_enqueue_scripts');

// ثبت اکشن برای ایجکس
add_action('wp_ajax_save_chat_log', 'save_chat_log_function');
add_action('wp_ajax_nopriv_save_chat_log', 'save_chat_log_function');

function save_chat_log_function() {
    // ارسال داده‌ها به فایل save_chat_log.php
    require_once plugin_dir_path(__FILE__) . 'save_chat_log.php';
    
    wp_die(); // برای جلوگیری از ارسال خروجی اضافی
}
