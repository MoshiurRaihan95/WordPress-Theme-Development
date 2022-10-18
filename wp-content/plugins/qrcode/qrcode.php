<?php
/*
Plugin Name: Word Counter
Plugin URI: 
Description: This is plugin to count word in a post.
Version: 1.0
Author: Raihan
Author URI:
License: GPLv2 Or later
Text Domain: qrcode
Domain Path: /languages/
*/

//Plugin Activation Hook
function wordcount_activation_hook(){
}
register_activation_hook(__File__, "wordcount_activation_hook");

//Plugin Deactivation Hook
function wordcount_deactivation_hook(){
}
register_deactivation_hook(__File__, "wordcount_deactivation_hook");

//Load Text Domain
function wordcount_load_textdomain(){
    load_plugin_textdomain('word-conter', false, dirname(__FILE__) . "/languages");
}