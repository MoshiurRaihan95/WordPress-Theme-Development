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
function wordcount_activation_hook()
{
}
register_activation_hook(__File__, "wordcount_activation_hook");

//Plugin Deactivation Hook
function wordcount_deactivation_hook()
{
}
register_deactivation_hook(__File__, "wordcount_deactivation_hook");

//Load Text Domain
function wordcount_load_textdomain()
{
    load_plugin_textdomain('word-conter', false, dirname(__FILE__) . "/languages");
}
add_action("plugin_loaded", 'wordcount_load_textdomain');


function wordcount_count_words($content)
{
    $stripped_content = strip_tags($content);
    $wordn = str_word_count($stripped_content);
    $label = __('Total Number Of Words', 'word-conter');
    $label = apply_filters("wordcount_heading", $label);
    $tag = apply_filters("wordcount_tag", 'h2', 'h2');
    $content .= sprintf('<%s>%s: %s</%s>', $tag, $label, $wordn, $tag);
    return $content;
}
add_filter('the_content', "wordcount_count_words");

function wordcount_reading_time($content)
{
    $stripped_content = strip_tags($content);
    $wordn = str_word_count($stripped_content);
    $reding_minute = floor($wordn / 200);
    $reding_seconds = floor($wordn % 200 / (200 / 60));
    $is_visible = apply_filters('wordcount_display_readingtime', 1);
    if ($is_visible) {
        $label = __('Total Reading Time', 'word-conter');
        $label = apply_filters("wordcount_readingtime_heading", $label);
        $tag = apply_filters("wordcount_readingtime_tag", 'h4', 'h4');
        $content .= sprintf('<%s>%s: %s minutes %s seconds</%s>', $tag, $label, $reding_minute, $reding_seconds, $wordn, $tag);
    }

    return $content;
}
add_filter('the_content', "wordcount_reading_time");
