<?php
/////////////////////
// EDUCATION FORM
// 
// Adjust your form ID
add_filter( 'gform_form_post_get_meta_14', 'add_fields_from_education' );
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
    //$form['fields'][] = $repeater;
	array_splice( $form['fields'], 23, 0, array( $repeater ) );
 
    return $form;
}

// Remove the field before the form is saved. Adjust your form ID
add_filter( 'gform_form_update_meta_14', 'remove_my_education_field', 10, 3 );
function remove_my_education_field( $form_meta, $form_id, $meta_name ) {
 
    if ( $meta_name == 'display_meta' ) {
        // Remove the Repeater field: ID 1000
        $form_meta['fields'] = wp_list_filter( $form_meta['fields'], array( 'id' => 1000 ), 'NOT' );
    }
 
    return $form_meta;
}

///////////////
// EMPLOYMENT FORM
add_filter( 'gform_form_post_get_meta_14', 'add_fields_from_employment' );
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
 
    $another_form = GFAPI::get_form( 16 );
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
    //$form['fields'][] = $repeater;
	array_splice( $form['fields'], 26, 0, array( $repeater ) );
 
    return $form;
}

// Remove the field before the form is saved. Adjust your form ID
add_filter( 'gform_form_update_meta_14', 'remove_my_employment_field', 10, 3 );
function remove_my_employment_field( $form_meta, $form_id, $meta_name ) {
 
    if ( $meta_name == 'display_meta' ) {
        // Remove the Repeater field: ID 5000
        $form_meta['fields'] = wp_list_filter( $form_meta['fields'], array( 'id' => 2000 ), 'NOT' );
    }
 
    return $form_meta;
}
