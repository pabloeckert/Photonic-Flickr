<?php
function photonic_flickr_visual_panel() {
    add_menu_page('Portfolio MC Panel', 'Portfolio MC', 'manage_options', 'portfolio-mc', 'portfolio_mc_panel', 'dashicons-format-gallery');
}
add_action('admin_menu', 'photonic_flickr_visual_panel');

function portfolio_mc_panel() {
    $token = get_option('portfolio_mc_token');
    ?>
    <div class="wrap">
        <h2>Panel Visual Portfolio MC</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields('portfolio_mc_settings');
            do_settings_sections('portfolio_mc');
            submit_button();
            ?>
        </form>
        <hr>
        <h3>Shortcode Generator</h3>
        <p>Usá este generador para crear tu shortcode visualmente.</p>
        <input type="text" name="user_id" placeholder="Flickr User ID" />
        <input type="text" name="photoset_id" placeholder="Photoset ID" />
        <select name="layout">
            <option value="justified">Justified</option>
            <option value="grid-square">Grid Cuadrado</option>
            <option value="grid-circle">Grid Circular</option>
            <option value="masonry">Masonry</option>
            <option value="mosaic">Mosaico</option>
            <option value="slideshow">Slideshow</option>
        </select>
        <button onclick="generateShortcode()">Generar</button>
        <pre id="shortcode-output"></pre>
        <script>
        function generateShortcode() {
            const uid = document.querySelector('[name="user_id"]').value;
            const pid = document.querySelector('[name="photoset_id"]').value;
            const layout = document.querySelector('[name="layout"]').value;
            document.getElementById('shortcode-output').textContent =
                `[photonic_flickr user_id="${uid}" photoset_id="${pid}" layout="${layout}"]`;
        }
        </script>
    </div>
    <?php
}

function portfolio_mc_register_settings() {
    register_setting('portfolio_mc_settings', 'portfolio_mc_token');
    add_settings_section('token_section', 'Token de Seguridad', null, 'portfolio_mc');
    add_settings_field('token_field', 'Token', function() {
        $value = get_option('portfolio_mc_token', '');
        echo "<input type='text' name='portfolio_mc_token' value='" . esc_attr($value) . "' size='50' />";
    }, 'portfolio_mc', 'token_section');
}
add_action('admin_init', 'portfolio_mc_register_settings');
