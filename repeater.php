<?php
///////////////////////////////////////////////////////////////////////////
//DCB 2020-03-12

/////////////////////
// EDUCATION FORM
/*
// Adjust your form ID
//add_filter( 'gform_form_post_get_meta_14', 'add_fields_from_education' );
function add_fields_from_education( $form ) {
 
    $repeater = GF_Fields::create( array(
        'type'   => 'repeater',
        'id'     => 1000,
        'formId' => $form['id'],
        'label'  => 'Educational Experience',
        'addButtonText' => 'Add Education',
        'removeButtonText' => 'Remove Education',
        'pageNumber'  => 2
    ) );
 
    $another_form = GFAPI::get_form( 12 );
    foreach ( $another_form['fields'] as $field ) {
        $field->id = $field->id + 1000;
        $field->formId = $form['id'];
            if ( is_array( $field->inputs ) ) {
            foreach ( $field->inputs as &$input ) {
                $input['id'] = (string) ( $input['id'] + 1000 );
            }
        }  
    }
 
    $repeater->fields = $another_form['fields'];
    $form['fields'][] = $repeater;
 
    return $form;
}

// Remove the field before the form is saved. Adjust your form ID
//add_filter( 'gform_form_update_meta_14', 'remove_my_education_field', 10, 3 );
function remove_my_education_field( $form_meta, $form_id, $meta_name ) {
 
    if ( $meta_name == 'display_meta' ) {
        // Remove the Repeater field: ID 1000
        $form_meta['fields'] = wp_list_filter( $form_meta['fields'], array( 'id' => 1000 ), 'NOT' );
    }
 
    return $form_meta;
}

///////////////
// EMPLOYMENT FORM
//add_filter( 'gform_form_post_get_meta_14', 'add_fields_from_employment' );
function add_fields_from_employment( $form ) {
 
    $repeater = GF_Fields::create( array(
        'type'   => 'repeater',
        'id'     => 2000,
        'formId' => $form['id'],
        'label'  => 'Employment Experience',
        'addButtonText' => 'Add Employment',
        'removeButtonText' => 'Remove Employment',
        'pageNumber'  => 3
    ) );
 
    $another_form = GFAPI::get_form( 13 );
    foreach ( $another_form['fields'] as $field ) {
        $field->id = $field->id + 2000;
        $field->formId = $form['id'];
            if ( is_array( $field->inputs ) ) {
            foreach ( $field->inputs as &$input ) {
                $input['id'] = (string) ( $input['id'] + 2000 );
            }
        }  
    }
 
    $repeater->fields = $another_form['fields'];
    $form['fields'][] = $repeater;
 
    return $form;
}

// Remove the field before the form is saved. Adjust your form ID
//add_filter( 'gform_form_update_meta_14', 'remove_my_employment_field', 10, 3 );
function remove_my_employment_field( $form_meta, $form_id, $meta_name ) {
 
    if ( $meta_name == 'display_meta' ) {
        // Remove the Repeater field: ID 1000
        $form_meta['fields'] = wp_list_filter( $form_meta['fields'], array( 'id' => 2000 ), 'NOT' );
    }
 
    return $form_meta;
}
*/

// Adjust your form ID
add_filter( 'gform_form_post_get_meta_14', 'add_education_field' );
function add_education_field( $form ) {
	$oid = 1000;
 	$id = $oid+1;
	$pageNumber = 2;
	
    // Create a Single Line text field for the team member's name
    $fields[] = GF_Fields::create( array(
        'type'   => 'text',
        'id'     => $id++, // The Field ID must be unique on the form
        'formId' => $form['id'],
        'label'  => 'School Name',
        'pageNumber'  => $pageNumber, // Ensure this is correct
    ) );
	// Create a Single Line text field for the team member's name
    $fields[] = GF_Fields::create( array(
        'type'   => 'text',
        'id'     => $id++, // The Field ID must be unique on the form
        'formId' => $form['id'],
        'label'  => 'City, State',
        'pageNumber'  => $pageNumber, // Ensure this is correct
    ) );
 
    // Create an email field for the team member's email address
    $email = GF_Fields::create( array(
        'type'   => 'email',
        'id'     => $id++, // The Field ID must be unique on the form
        'formId' => $form['id'],
        'label'  => 'Email',
        'pageNumber'  => $pageNumber, // Ensure this is correct
    ) );
 
    // Create a repeater for the team members and add the name and email fields as the fields to display inside the repeater.
    $education = GF_Fields::create( array(
        'type'             => 'repeater',
        'description'      => 'Maximum of 3 team members  - set by the maxItems property',
        'id'               => $oid, // The Field ID must be unique on the form
        'formId'           => $form['id'],
        'label'            => 'Educational Experience',
        'addButtonText'    => 'Add Education', // Optional
        'removeButtonText' => 'Remove Education', // Optional
        'maxItems'         => 3, // Optional
        'pageNumber'       => $pageNumber, // Ensure this is correct
        //'fields'           => array( $name, $email ), // Add the fields here.
        'fields'           => $fields,
    ) );
 
    $form['fields'][] = $education;
 
    return $form;
}
 
// Remove the field before the form is saved. Adjust your form ID
add_filter( 'gform_form_update_meta_14', 'remove_education_field', 10, 3 );
function remove_education_field( $form_meta, $form_id, $meta_name ) {
 
    if ( $meta_name == 'display_meta' ) {
        // Remove the Repeater field: ID 1000
        $form_meta['fields'] = wp_list_filter( $form_meta['fields'], array( 'id' => 1000 ), 'NOT' );
    }
 
    return $form_meta;
}