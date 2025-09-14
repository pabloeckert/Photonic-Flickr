<?php
function photonic_flickr_settings_menu() {
    add_options_page('Photonic Flickr Settings', 'Photonic Flickr', 'manage_options', 'photonic-flickr', 'photonic_flickr_settings_page');
}
add_action('admin_menu', 'photonic_flickr_settings_menu');

function photonic_flickr_settings_page() {
?>
    <div class="wrap">
        <h2>Photonic Flickr Settings</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields('photonic_flickr_settings');
            do_settings_sections('photonic_flickr');
            submit_button();
            ?>
        </form>
    </div>
<?php }

function photonic_flickr_register_settings() {
    register_setting('photonic_flickr_settings', 'photonic_flickr_api_key');
    add_settings_section('main_section', 'API Key', null, 'photonic_flickr');
    add_settings_field('api_key', 'Flickr API Key', 'photonic_flickr_api_key_field', 'photonic_flickr', 'main_section');
}
add_action('admin_init', 'photonic_flickr_register_settings');

function photonic_flickr_api_key_field() {
    $value = get_option('photonic_flickr_api_key', '');
    echo "<input type='text' name='photonic_flickr_api_key' value='" . esc_attr($value) . "' size='50' />";
}
