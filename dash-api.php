<?php 
/*
Plugin Name: Parse.ly - Dash Widget
Plugin URI: https://github.com/whyisjake/dash
Description: This plugin makes it easy to add Dash Analytics to your site.
Author: Jake Spurlock (jspurlock@oreilly.com)
Version: 0.5
Requires at least: 2.5
Author URI: http://makezine.com
License: GPL2

/**
 * Pulls content from the Dash API.
 *
 * @param string $type Which analytivs to return. Current options are 'realtime', 'analytics', and 'shares'.
 * @param string $hits String to preface the hit counter. If blank, nothing is added.
 * @param string $limit Integer, defaults to 5
 * @param string $size Integer, size of image to return.
 * @param string $api String, likely the site URL, like makezine.com
 * @param string $secret String, Not needed unless decreen via the Dash analytics
 * @return string List of items.
 */

function make_the_dash_shares_widget( $type, $hits = null, $limit = 5, $size = 80, $api = null, $secret = null ) {

	
	$url = 'http://api.parsely.com/v2/'.$type.'/posts?limit=' . $limit . '&apikey=' . $api . '&secret=' . $secret;
	$contents = file_get_contents( $url );
	$json_output = json_decode($contents);

	$data = $json_output->data;

	foreach ($data as $item) {
		$content .= '<div class="row-fluid item"><div class="span4"><a href="';
		$content .= $item->link;
		$content .= '">';
		$content .= '<img src="' . ($item->thumb_url_medium) . '" class="thumbnail" alt="' . ($item->title) . '" />';
		
		$content .= '</a></div><div class="span8"><a href="';
		if ($type == 'shares') {
			$content .= ($item->url);
		} else {
			$content .= ($item->link);
		}
		$content .= '">';
		$content .= ($item->title);
		$content .= '</a></h4><ul class="unstyled"><li>By: ' . ($item->author)  . '</li>';
		if ($type == 'shares' && $hits != null) {
			$content .= '<li>'  . $hits .' <span class="badge badge-info">'.  ($item->_shares) . '</span></li>';
		} elseif ($hits != null) {
			$content .= '<li>'  . $hits .' <span class="badge badge-info">'.  ($item->_hits) . '</span></li>';
		}
		$content .= '</ul></div></div>';
	}

	return $content;

}
