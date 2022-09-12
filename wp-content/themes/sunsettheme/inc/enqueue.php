<?php
/*
@package sunsettheme
    =========================
            ADMIN ENQUEUE FUNCTIONS
    =========================
*/

function sunset_load_admin_script( $hook ){

    if('toplevel_page_sunset_custom_option' != $hook){
        return;
    }
    wp_register_style('sunset_admin', get_template_directory_uri() . '/assets/css/sunset.admin.css', array(),'1.0.0', 'all'); 
    wp_enqueue_style('sunset_admin');

    // cunect jQuery file
    wp_register_script('sunset_admin_script', get_template_directory_uri() . '/assets/js/sunset.admin.js', array('jQuery'), '1.0.0', true);
    wp_enqueue_script('sunset_admin_script');
}
add_action('admin_enqueue_scripts', 'sunset_load_admin_script');