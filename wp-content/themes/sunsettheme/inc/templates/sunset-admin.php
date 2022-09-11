<h1>Sunset Theme Options</h1>
<?php settings_errors(); ?>
<form method="POST" action="options.php">
    <?php settings_fields('sunset-setting-group'); ?>
    <?php do_settings_sections('sunset_custom_option');?>
    <?php submit_button();?>
</form>