<?php


function get_user_auth(){
    $auth_groups = array(
        'Public' => array('public'),
        'LIneA User' => array('public', 'linea-user'),
        'LIneA Admin' => array('public', 'linea-user', 'linea-admin')
    );
    
    if (current_user_can('administrator')){
        return $auth_groups['LIneA Admin'];
    } else if (is_user_logged_in()){
        return $auth_groups['LIneA User'];
    } else {
        return $auth_groups['Public'];
    }
}

function get_user_auth_terms(){
    return get_user_auth();
}

?>