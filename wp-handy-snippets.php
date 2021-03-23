<?php
/**
 * Plugin Name:       WP Handy Snippets
 * Plugin URI:        https://github.com/otavianopires/wp-protected-attachments
 * Description:       Handy snippets for WordPress Themes or Plugins
 * Version:           0.1
 * Author:            Otaviano Pires Amancio
 * Author URI:        https://github.com/otavianopires
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Redirect Subscribers from Dashboard
 */
function redirect_subscribers_from_dashboard() {
    if ( is_admin() && current_user_can( 'subscriber' ) && $_SERVER['REQUEST_METHOD'] == 'GET' ) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
        wp_safe_redirect( home_url('/404') );
        exit;
    }
}
add_action( 'admin_init', 'redirect_subscribers_from_dashboard', 1 );