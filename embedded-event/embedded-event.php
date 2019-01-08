<?php
/*
Plugin Name: CanadaHelps Embedded Event
Plugin URI:  https://github.com/CanadaHelps/embedded-event
Description: Adds a shortcode to support embedded event pages. [embedevent id="168"]
Version:     1.0.0
Author:      CanadaHelps.org
Author URI:  https://www.canadahelps.org/
License:     GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

define('EMBEDDED_EVENT_PLUGIN_VERSION', '1.0.0');

function embeded_event_plugin_add_shortcode_cb($atts) {
	$defaults = array(
		'id' => '',
		'language' => 'en'
	);
	foreach ($defaults as $default => $value) {
		if (!@array_key_exists($default, $atts)) {
			$atts[$default] = $value;
		}
	}
	$html =  "\n";
	$html .= '<!-- embedded event plugin v.'.EMBEDDED_EVENT_PLUGIN_VERSION.' https://github.com/CanadaHelps/embedded-event -->';
	$html .= "\n";
	$html .= '<script';
	$html .= ' id="ch_event_embed"';
	$html .= ' type="text/javascript"';
	$html .= ' data-cfasync="false"';
	$html .= ' data-page-id="' . $atts["id"] . '"';
	$html .= ' data-language="' . $atts["language"] . '"';
	$html .= ' src="https://www.canadahelps.org/secure/js/ch_events_embed.min.js"';
	$html .= '></script>';
	$html .= "\n";
	return $html;
}
add_shortcode('embedevent', 'embeded_event_plugin_add_shortcode_cb');
