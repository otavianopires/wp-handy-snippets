<?php

/**
 * Add Last Login user meta when user is created
 */
function addLastLoginUserMeta( $user_id ) {
    add_user_meta( $user_id, 'npr_last_login', 0);
}
add_action('user_register', 'addLastLoginUserMeta' );

/**
 * Update Last Login user meta when user is created
 */
function updateLastLoginUserMeta( $user, $password) {    
    update_user_meta( $user->ID, 'npr_last_login', time() );
    return $user;      
}
add_action('wp_authenticate_user', 'updateLastLoginUserMeta', 10, 2);