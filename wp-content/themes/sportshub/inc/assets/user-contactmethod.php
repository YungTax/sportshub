<?php

$extra_fields =  array( 
    array( 'facebook', __( 'Facebook', 'sportshub' ), true ),
    array( 'twitter', __( 'Twitter ', 'sportshub' ), true ),
    array( 'googleplus', __( 'Google+', 'sportshub' ), true ),
    array( 'linkedin', __( 'Linked In', 'sportshub' ), false ),
    array( 'pinterest', __( 'Pinterest ', 'sportshub' ), false ),
    array( 'wordpress', __( 'WordPress ', 'sportshub' ), false ),
    array( 'phone', __( 'Phone Number', 'sportshub' ), true ),
    array( 'instagram',__( 'Instagram','sportshub'),true),
    array( 'tumblr',__( 'Tumblr','sportshub'),true ),
    array( 'youtube',__('Youtube','sportshub'),true ),
    array( 'dribbble',__('Dribbble','sportshub'),true ),
    array( 'email',__('E-mail','sportshub'),true ),
);

// Use the user_contactmethods to add new fields
add_filter( 'user_contactmethods', 'sportshub_add_user_contactmethods' );

function  sportshub_add_user_contactmethods( $user_contactmethods ) {

    // Get fields
    global $extra_fields;
    
    // Display each fields
    foreach( $extra_fields as $field ) {
        if ( !isset( $contactmethods[ $field[0] ] ) )
            $user_contactmethods[ $field[0] ] = $field[1];
    }

    // Returns the contact methods
    return $user_contactmethods;
}
// Add our fields to the registration process
add_action( 'register_form', 'sportshub_register_form_display_extra_fields' );
add_action( 'user_register', 'sportshub_user_register_save_extra_fields', 100 );

function sportshub_register_form_display_extra_fields() {
    
    // Get fields
    global $extra_fields;
    foreach( $extra_fields as $field ) {
        if ( $field[2] == true ) { 
        $field_value = isset( $_POST[ $field[0] ] ) ? $_POST[ $field[0] ] : '';
        echo '<p>
            <label for="'. esc_attr( $field[0] ) .'">'. esc_html( $field[1] ) .'<br />
            <input type="text" name="'. esc_attr( $field[0] ) .'" id="'. esc_attr( $field[0] ) .'" class="input" value="'. esc_attr( $field_value ) .'" size="20" /></label>
            </label>
        </p>';
        } 
    }
}

function sportshub_user_register_save_extra_fields( $user_id, $password = '', $meta = array() )  {

    global $extra_fields;
    
    $userdata       = array();
    $userdata['ID'] = $user_id;
    foreach( $extra_fields as $field ) {
        if( $field[2] == true ) { 
            $userdata[ $field[0] ] = $_POST[ $field[0] ];
        } 
    } 
    $new_user_id = wp_update_user( $userdata );
}
?>