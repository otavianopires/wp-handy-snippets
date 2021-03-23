<?php
/**
 * Plugin Name:       WP Handy Snippets
 * Plugin URI:        https://github.com/otavianopires/wp-handy-snippets
 * Description:       Handy snippets for WordPress Themes or Plugins
 * Version:           0.1
 * Author:            Otaviano Pires Amancio
 * Author URI:        https://github.com/otavianopires
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) exit;

require_once plugin_dir_path(__FILE__) . 'includes/user-restrictions.php';
require_once plugin_dir_path(__FILE__) . 'includes/custom-user-meta.php';