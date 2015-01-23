<?php
/**
 * @package WP-Cedexis
 */
/*
Plugin Name: Cedexis Radar for WordPress
Description: Track site performance with Cedexis Radar
Version: 0.1
Author: Erik L. Arneson
Author URI: http://www.arnesonium.com/
License: GPLv2 or later

    Copyright 2015 Erik L. Arneson (email : earneson@arnesonium.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

defined('ABSPATH') or die("No script kiddies please!");

function wp_cedexis_add_tag () {
    $radarTagId = get_option('cedexis_radar_tag_id');

    // If the plugin isn't configured, fail silently.
    if (false == $radarTagId) {
        return;
    }

    $radarTag =<<< EOT
<script> 
(function(a,b,c,d,e){function f(){var a=b.createElement("script");a.async=!0;
a.src="//radar.cedexis.com/1/%s/radar.js";b.body.appendChild(a)}/\bMSIE 6/i
.test(a.navigator.userAgent)||(a[c]?a[c](e,f,!1):a[d]&&a[d]("on"+e,f))})
(window,document,"addEventListener","attachEvent","load");
</script> 
EOT;

    printf($radarTag, $radarTagId);
}
add_action('wp_footer', 'wp_cedexis_add_tag');

function wp_cedexis_register_settings () {
    register_setting('wp-cedexis-settings', 'cedexis_radar_tag_id');
    register_setting('wp-cedexis-settings', 'cedexis_api_client_id');
    register_setting('wp-cedexis-settings', 'cedexis_api_client_secret');
}

function wp_cedexis_settings_menu () {
?>
<div class="wrap"><div id="icon-tools" class="icon32"></div>
<img src="<?php echo plugins_url('img/logo-cedexis.png', __FILE__); ?>" style="float:right">
<h2>Cedexis Radar Configuration</h2>
<form method="post" action="options.php">
<?php 
settings_fields('wp-cedexis-settings');
do_settings_sections('wp-cedexis-settings'); 
?>
  <table class="form-table">
    <tr valign="top">
      <th scope="row">Radar Tag ID</th>
      <td>
<input type="text" name="cedexis_radar_tag_id" value="<?php echo esc_attr(get_option('cedexis_radar_tag_id')); ?>" />
<p>To find your Radar tag ID, log into the <a target="_top" href="https://portal.cedexis.com">Cedexis Portal</a> and 
go to the <b>Radar Tag</b> page. On line 3 of the code, you will see a number before the "radar.js" script. Enter that 
number into this box.</p>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row">API Client ID</th>
      <td>
        <input type="text" name="cedexis_api_client_id" value="<?php echo esc_attr(get_option('cedexis_api_client_id')); ?>" />
        <p>This parameter is not yet used.</p>
      </td>
    </tr>
    <tr valign="top">
      <th scope="row">API Client Secret</th>
      <td>
        <input type="text" name="cedexis_api_client_secret" value="<?php echo esc_attr(get_option('cedexis_api_client_secret')); ?>" />
        <p>This parameter is not yet used.</p>
      </td>
    </tr>
  </table>
  <?php submit_button(); ?>
</form>
</div>
<?php
}

function wp_cedexis_register_settings_menu () {
    add_submenu_page( 
        'options-general.php',
        'Cedexis Radar',
        'Cedexis Radar',
        'manage_options', 
        'wp_cedexis_radar', 
        'wp_cedexis_settings_menu' 
    );
}

function wp_cedexis_action_links ($links) {
    $actionLinks = array(
        'settings' => '<a href="' . admin_url('options-general.php?page=wp_cedexis_radar') . '" title="Cedexis Radar settings">Settings</a>',
        'portal' => '<a target="_blank" href="https://portal.cedexis.com/">Cedexis Portal</a>'
    );

    return array_merge($actionLinks, $links);
}

add_action('admin_menu', 'wp_cedexis_register_settings_menu');
add_action('admin_init', 'wp_cedexis_register_settings');
add_action('plugin_action_links_' . plugin_basename(__FILE__), 'wp_cedexis_action_links');
