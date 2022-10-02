<?php 
/*
Plugin Name: Word Counter
Plugin URI: 
Description: This is plugin to count word in a post.
Version: 1.0
Author: Raihan
Author URI:
License: GPLv2 Or later
Text Domain: word-conter
Domain Path: /languages/
*/

//Plugin Activation Hook
function wordcount_activation_hook(){

}
register_activation_hook(__File__,"wordcount_activation_hook");

//Plugin Deactivation Hook
function wordcount_deactivation_hook(){

}
register_deactivation_hook(__File__,"wordcount_deactivation_hook");

//Load Text Domain
function wordcount_load_textdomain(){
    load_plugin_textdomain('word-conter', false,dirname(__FILE__)."/languages");
}
add_action("plugin_loaded",'wordcount_load_textdomain');


function wordcount_count_words($content){
    $stripped_content = strip_tags($content);
    $wordn = str_word_count($stripped_content);
    $label = __('Total Number Of Words', 'word-conter');
    $content .= sprintf('<h6>%s: %s</h6>',$label,$wordn);
    return $content;
}
add_filter('the_content',"wordcount_count_words");