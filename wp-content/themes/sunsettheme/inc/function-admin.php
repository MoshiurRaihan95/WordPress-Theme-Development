<?php
/*
@package sunsettheme
    =========================
            ADMIN PAGE
    =========================
*/

function sunset_add_admin_page()
{
    //Generate Sunset Admin Page
    add_menu_page('Sunset Theme Options', 'Sunset', 'manage_options', 'sunset_custom_option', 'sunset_theme_create_page', get_template_directory_uri() . '/assets/img/sunset-icon.png', 110);

    //Generate Sunset Admin Sub Pages
    add_submenu_page('sunset_custom_option', 'Sunset Sidebar Options', 'Sidebar', 'manage_options', 'sunset_custom_option', 'sunset_theme_create_page');
    add_submenu_page('sunset_custom_option', 'Sunset Theme Options', 'Theme Options', 'manage_options', 'sunset_custom_settins', 'sunset_theme_support_page');
    add_submenu_page('sunset_custom_option', 'Sunset CSS Options', 'Custom CSS', 'manage_options', 'sunset_custom_css', 'sunset_theme_settings_page');
    

    // Activate Custom Setting
    add_action('admin_init', 'sunset_custom_settings');
}
add_action('admin_menu', 'sunset_add_admin_page');

// Function Custom Setting
function sunset_custom_settings(){
    //Sidebar Options
    register_setting('sunset-setting-group', 'profile_picture');
    register_setting('sunset-setting-group', 'first_name');
    register_setting('sunset-setting-group', 'last_name');
    register_setting('sunset-setting-group', 'user_description');
    register_setting('sunset-setting-group', 'twitter_handler', 'sunset_sanitize_twitter_handler');
    register_setting('sunset-setting-group', 'facebook_handler');
    register_setting('sunset-setting-group', 'gplus_handler');
    
    add_settings_section('sunset-sidebar-options','Sidebar option','sunset_sidebar_options', 'sunset_custom_option' ,'sunset-sidebar-options');

    add_settings_field('sidebar-profile-picture','Profile Picture','sunset_sidebar_profile', 'sunset_custom_option' ,'sunset-sidebar-options');
    add_settings_field('sidebar-name', 'Full Name', 'sunset_sidebar_name', 'sunset_custom_option' ,'sunset-sidebar-options');
    add_settings_field('sidebar-description', 'Description', 'sunset_sidebar_description', 'sunset_custom_option' ,'sunset-sidebar-options');
    add_settings_field('sidebar-twitter', 'Twitter Handler', 'sunset_sidebar_twitter', 'sunset_custom_option' ,'sunset-sidebar-options');
    add_settings_field('sidebar-facebook', 'Facebook Handler', 'sunset_sidebar_facebook', 'sunset_custom_option' ,'sunset-sidebar-options');
    add_settings_field('sidebar-gplus', 'Google Plus Handler', 'sunset_sidebar_gplus', 'sunset_custom_option' ,'sunset-sidebar-options');

    //Theme Support Option
    register_setting('sunset-theme-support', 'post-formats', 'sunset_post_formats_callback');
    add_settings_section('sunset-theme-options', 'Theme Optons', 'sunset_theme_options', 'sunset_theme_support_page');
    add_settings_field('post-formats', 'Post Formats', 'sunset_post_formats', 'sunset_theme_support_page', 'sunset-theme-options');
}

//Post formats callback Function
function sunset_post_formats_callback($input){
    return $input;
}
function sunset_theme_options(){
    echo 'Activate and deactivate spacific theme support options';
}

function sunset_post_formats(){
    $formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
    $output = '';
    // foreach ($formats as $format){
    //     $output .= '<label><input type="checkbox" id="'.$format.'" name="'.$format.'" value="1"> '.$format.'</label><br>;
    // }
    // echo $output;
}

//Sidebar Options Functions
function sunset_sidebar_options(){
    echo 'Customize your sidebar information';
}
function sunset_sidebar_profile(){
    $picture = esc_attr(get_option('profile_picture'));
    echo'<input type="button" class="button button-secondary" value="Upload profile picture" id="upload-button"/>';
    echo '<input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'"/>';
}

function sunset_sidebar_name(){
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name"> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name">';
}
function sunset_sidebar_description(){
    $description = esc_attr(get_option('user_description'));
    echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description"> <p class="description">Write Something About Your.</p>';
}
function sunset_sidebar_twitter(){
    $twitter = esc_attr(get_option('twitter_handler'));
    echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter"> <p class="description">Input your Twitter username without the @ character.</p>';
}
function sunset_sidebar_facebook(){
    $facebook = esc_attr(get_option('facebook_handler'));
    echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook">';
}
function sunset_sidebar_gplus(){
    $gplus = esc_attr(get_option('gplus_handler'));
    echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Google Plus">';
}

//Sanitization Settings
// function sunset_sanitize_twitter_handler($input){
//     $output = sanitize_text_field($input);
//     $output = str_repeat('@', '', $output);
//     return $output;
// }

// Tempate submenu fuctions
function sunset_theme_create_page(){
    require_once(get_template_directory() . '/inc/templates/sunset-admin.php');
}
//
function sunset_theme_support_page(){
    require_once(get_template_directory() . '/inc/templates/sunset-theme-support.php');
}



// Custom CSS Optons
function sunset_theme_settings_page(){
    echo '<h1>Custom CSS</h1>';
}


