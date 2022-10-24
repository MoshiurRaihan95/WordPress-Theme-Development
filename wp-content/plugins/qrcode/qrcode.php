<?php
/*
Plugin Name: QR Code
Plugin URI: 
Description: Display QA Code under every prost.
Version: 1.0
Author: Raihan
Author URI:
License: GPLv2 Or later
Text Domain: qrcode
Domain Path: /languages/
*/

//Plugin Activation Hook
function qrcode_activation_hook(){
}
register_activation_hook(__File__, "qrcode_activation_hook");

//Plugin Deactivation Hook
function qrcode_deactivation_hook(){
}
register_deactivation_hook(__File__, "qrcode_deactivation_hook");

//Load Text Domain
function qrcode_load_textdomain(){
    load_plugin_textdomain('qrcode', false, dirname(__FILE__) . "/languages");
}
function pqrc_display_qr_code($content){
    $current_post_id = get_the_ID();
    $current_post_title = get_the_title($current_post_id);
    $current_post_url = urlencode(get_the_permalink($current_post_id));
    $image_src = sprintf('https://api.qrserver.com/v1/create-qr-code/?size=185x185&ecc=L&qzone=1&data=https://orangetoolz.com', $current_post_url);
    $content .= sprintf("<div class='qrcode'> <img src='%s' alt='%s'></div>", $image_src, $current_post_title);
    return $content;
}
add_filter('the_content', 'pqrc_display_qr_code');