<?php
/**
    *this si short code generate file
*/

// Don't call the file directly
if( !defined('ABSPATH'))exit;

function shortcode_contact_form($atts, $content){
    $atts = Shortcode_atts(array(
        'email' => get_option('admin_email'),
        'submit' => __('Send Email', '')
    ), $atts);
    
    $submit = false;
    if( isset( $_POST['form_submit'])){
         $name = $_POST['form_name'];
         $email = $_POST['form_email'];
         $subject = $_POST['form_subject'];
         $massage = $_POST['form_massage'];
         $submit = true;
    }

    ob_start();
    ?>
    <?php if($submit){?>
    <h1><?php _e('Emial Sent SUccessfully')?></h1>
    <?php } ?>

    <form action="" id="contact_form" method="post">
        <div>
            <label for="name">Name</label>
            <input type="text" name="form_name" value="">
        </div>
        <div>
            <label for="name">Email</label>
            <input type="email" name="form_email" value="">
        </div>
        <div>
            <label for="name">Subject</label>
            <input type="text" name="form_subject" value="">
        </div>
        <div>
            <label for="massage">Massage</label>
            <textarea name="form_massage" id="massage"cols="30" row="5"></textarea>
        </div>
        <div>
            <input type="submit" name="form_submit" value="<?php echo esc_attr($atts['submit'] );?>">
        </div>
    </form>
    <?php
    return ob_get_clean();
}

add_shortcode('contact_form_sc', 'shortcode_contact_form');