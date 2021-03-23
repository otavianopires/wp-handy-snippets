<?php
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
// add_action( 'admin_init', 'redirect_subscribers_from_dashboard', 1 );

/**
 * Hide Admin Bar for Subscribers
 */
function remove_admin_bar_for_subscribers() {
    if ( current_user_can( 'subscriber' ) ) {
        show_admin_bar(false);
    }
}
// add_action('after_setup_theme', 'remove_admin_bar_for_subscribers' );
