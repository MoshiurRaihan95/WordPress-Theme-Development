<h1>Sunset Sidebar Theme Support</h1>
<?php settings_errors(); ?>

<?php
    //$picture = esc_attr(get_option('profile_picture'));
?>


<form method="POST" action="options.php" class="sunset_general_form">
    <?php settings_fields('sunset-theme-support'); ?>
    <?php do_settings_sections('sunset_theme_support_page'); ?>
    <?php submit_button(); ?>
</form>