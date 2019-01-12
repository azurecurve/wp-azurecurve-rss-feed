<?php
/*
Plugin Name: azurecurve RSS Feed
Plugin URI: http://development.azurecurve.co.uk/plugins/rss-feed

Description: Provides opposite rss feed to that configured in WordPress; e.g. if WordPress is configured for summary then an alternative feed called detail will be created
Version: 1.0.0

Author: azurecurve
Author URI: http://development.azurecurve.co.uk

Text Domain: azc_rssf
Domain Path: /languages

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.

The full copy of the GNU General Public License is available here: http://www.gnu.org/licenses/gpl.txt
*/

add_action('init', 'azc_rssf_init');

function azc_rssf_init(){
	if (get_option('rss_use_excerpt')){
		$rss_type = 'detail';
	}else{
		$rss_type = 'summary';
	}
	add_feed($rss_type, 'azc_rssf_create_feed');
	
	//Ensure the $wp_rewrite global is loaded
	global $wp_rewrite;
	//Call flush_rules() as a method of the $wp_rewrite object
	$wp_rewrite->flush_rules( false );
}

function azc_rssf_create_feed(){
	load_template( plugin_dir_path( __FILE__ ) . 'templates/rss_feed2.php' );
}

?>