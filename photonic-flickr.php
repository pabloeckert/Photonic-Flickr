<?php
/*
Plugin Name: Photonic Flickr Only
Description: Versión minimalista de Photonic para mostrar galerías de Flickr con lightbox.
Version: 1.0
Author: Pablo Eckert + Copilot
*/

define('PHOTONIC_FLICKR_PATH', plugin_dir_path(__FILE__));
define('PHOTONIC_FLICKR_URL', plugin_dir_url(__FILE__));

require_once PHOTONIC_FLICKR_PATH . 'Core/Flickr.php';
require_once PHOTONIC_FLICKR_PATH . 'Shortcodes/Flickr_Shortcode.php';
require_once PHOTONIC_FLICKR_PATH . 'Admin/Settings.php';

function photonic_flickr_enqueue_assets() {
    wp_enqueue_script('glightbox', PHOTONIC_FLICKR_URL . 'Assets/glightbox.min.js', [], '1.0', true);
    wp_enqueue_style('glightbox-style', PHOTONIC_FLICKR_URL . 'Assets/glightbox.min.css');
}
add_action('wp_enqueue_scripts', 'photonic_flickr_enqueue_assets');
