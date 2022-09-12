<h1>Sunset Theme Options</h1>
<?php settings_errors(); ?>

<?php 
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    $fullName = $firstName . ' ' . $lastName;
    $description = esc_attr(get_option('user_description'));
?>

<div class="sunset_sidebar_preview">
    <div class="sunset_sidebar">
        <h1 class="sunset_username"><?php print $fullName; ?></h1>
        <h2 class="sunset_description"><?php print $description; ?></h2>
        <div class="icons_warpper">

        </div>
    </div>
</div>

<form method="POST" action="options.php" class="sunset_general_form">
    <?php settings_fields('sunset-setting-group'); ?>
    <?php do_settings_sections('sunset_custom_option');?>
    <?php submit_button();?>
</form>