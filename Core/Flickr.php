<?php
class Photonic_Flickr {
    public static function fetch_photoset($user_id, $photoset_id) {
        $api_key = get_option('photonic_flickr_api_key');
        $endpoint = "https://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key={$api_key}&photoset_id={$photoset_id}&user_id={$user_id}&format=json&nojsoncallback=1";
        $response = wp_remote_get($endpoint);
        if (is_wp_error($response)) return [];

        $body = json_decode(wp_remote_retrieve_body($response), true);
        return $body['photoset']['photo'] ?? [];
    }
}
