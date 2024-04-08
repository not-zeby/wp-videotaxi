<?php
/*
Plugin Name: VideoTaxi
Plugin URI: https://github.com/not-zeby/wp-videotaxi
Description: Ein WordPress-Plugin zum Einbetten von Videos von VideoTaxi mit Hilfe eines Shortcodes.
Version: 1.2
Author: Sebastian Streich
Author URI: https://github.com/not-zeby
*/

// create shortcode element
function videotaxi_embed_video($atts) {
    $atts = shortcode_atts(array(
        'id' => '',
    ), $atts);

    // Check for VideoTaxi ID
    if (empty($atts['id'])) {
        return '<p style="color: red;">Error: Please provide a VideoTaxi ID!</p>';
    }

    // Create URL
    $video_url = 'https://media.video.taxi/embed/' . sanitize_text_field($atts['id']);

    // CSS for responsive iFrame
    $css = '<style>.videotaxi-embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .videotaxi-embed-container iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>';

    // Generate iFrame
    $iframe_code = '<div class="videotaxi-embed-container"><iframe src="' . esc_url($video_url) . '" frameborder="0" allowfullscreen></iframe></div>';

    return $css . $iframe_code;
}
add_shortcode('videotaxi', 'videotaxi_embed_video');
