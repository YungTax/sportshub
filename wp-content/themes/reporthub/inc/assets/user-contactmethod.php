<?php

$extra_fields =  array( 
    array( 'facebook', __( 'Facebook', 'reporthub' ), true ),
    array( 'twitter', __( 'Twitter ', 'reporthub' ), true ),
    array( 'googleplus', __( 'Google+', 'reporthub' ), true ),
    array( 'linkedin', __( 'Linked In', 'reporthub' ), false ),
    array( 'pinterest', __( 'Pinterest ', 'reporthub' ), false ),
    array( 'wordpress', __( 'WordPress ', 'reporthub' ), false ),
    array( 'phone', __( 'Phone Number', 'reporthub' ), true ),
    array( 'instagram',__( 'Instagram','reporthub'),true),
    array( 'tumblr',__( 'Tumblr','reporthub'),true ),
    array( 'youtube',__('Youtube','reporthub'),true ),
    array( 'dribbble',__('Dribbble','reporthub'),true ),
    array( 'email',__('E-mail','reporthub'),true ),
);

// Use the user_contactmethods to add new fields
add_filter( 'user_contactmethods', 'reporthub_add_user_contactmethods' );

function  reporthub_add_user_contactmethods( $user_contactmethods ) {

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
add_action( 'register_form', 'reporthub_register_form_display_extra_fields' );
add_action( 'user_register', 'reporthub_user_register_save_extra_fields', 100 );

function reporthub_register_form_display_extra_fields() {
    
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

function reporthub_user_register_save_extra_fields( $user_id, $password = '', $meta = array() )  {

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