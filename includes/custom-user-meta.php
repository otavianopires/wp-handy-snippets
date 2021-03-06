<?php

/**
 * Add custom user meta field to edit form
 */
function custom_meta_field( $user )
{
    $my_custom_meta = get_user_meta( $user->ID, 'my_custom_meta', true);
    $my_custom_meta = !empty($my_custom_meta) ? $my_custom_meta : '';
    echo $my_custom_meta;
    ?>
    <table class="form-table">
        <tr>
            <th>
                <label for="my_custom_meta">My Custom Meta</label>
            </th>
            <td>
                <input type="text" id="my_custom_meta" name="my_custom_meta" value="<?php echo $my_custom_meta; ?>" />
            </td>
        </tr>
    </table>
    <?php
}
add_action( 'show_user_profile', 'custom_meta_field' ); // for user's own profile form
add_action( 'edit_user_profile', 'custom_meta_field' ); // for existing user edit form
add_action( 'user_new_form', 'custom_meta_field' ); // for new user edit form

/**
 * Save custom user meta
 */
function custom_meta_field_update( $user_id )
{
    if ( ! current_user_can( 'edit_user', $user_id ) ) {
        return;
    }

    if (!isset($_POST['my_custom_meta'])) {
        return;
    }

    update_user_meta( $user_id, 'my_custom_meta', $_POST['my_custom_meta'] );
}
add_action( 'personal_options_update', 'custom_meta_field_update' ); // update on user's own profile form
add_action( 'edit_user_profile_update', 'custom_meta_field_update' ); // update on existing user edit form
add_action( 'user_register', 'custom_meta_field_update' ); // update on new user edit form

/**
 * Sanitize custom user meta
 */
function custom_meta_field_sanitize( $value ) {

    return sanitize_text_field( $value );
}
add_filter( 'sanitize_user_meta_' . 'my_custom_meta', 'custom_meta_field_sanitize' );

/**
 * Add column to custom meta field
 */
function add_custom_meta_field_column($columns) {
    $columns['my_custom_meta'] = __( 'My Custom Meta', 'text-domain' );
    return $columns;
}
add_filter('manage_users_columns', 'add_custom_meta_field_column');


/**
 * Output custom metafield content in column
 */
function show_custom_meta_field_column_content($value, $column_name, $user_id) {
    if ( 'my_custom_meta' == $column_name ) {
        $my_custom_meta = get_user_meta( $user_id, 'my_custom_meta', true);
        $my_custom_meta = !empty($my_custom_meta) ? $my_custom_meta : '';

        return $my_custom_meta;
    }
    return $value;
}
add_filter('manage_users_custom_column', 'show_custom_meta_field_column_content', 10, 3);
