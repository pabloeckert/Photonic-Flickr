<?php
function photonic_flickr_shortcode($atts) {
    $atts = shortcode_atts([
        'user_id' => '',
        'photoset_id' => '',
        'layout' => 'grid-square',
    ], $atts);

    if (!$atts['user_id'] || !$atts['photoset_id']) return '<p>Error: Falta user_id o photoset_id.</p>';

    $photos = Photonic_Flickr::fetch_photoset($atts['user_id'], $atts['photoset_id']);
    $template = Layout_Manager::get_template($atts['layout']);
    ob_start();
    include PHOTONIC_FLICKR_PATH . 'Templates/' . $template;
    return ob_get_clean();
}
add_shortcode('photonic_flickr', 'photonic_flickr_shortcode');
