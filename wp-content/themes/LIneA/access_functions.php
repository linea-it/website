<?php

Class AuthLIneA {
    private $auth_groups = array(
        'Public' => array('public'),
        'LIneA User' => array('public', 'linea-user'),
        'LIneA Admin' => array('public', 'linea-user', 'linea-admin')
    );

    private $lpaccess_taxonomy = 'lpaccess';
    
    private $user_auth_terms = array();

    function __construct(){
        $this->user_auth();
    }
    
    public function user_auth(){
        if (current_user_can('administrator')){
            $this->user_auth_terms = $this->auth_groups['LIneA Admin'];
        } else if (is_user_logged_in()){
            $this->user_auth_terms = $this->auth_groups['LIneA User'];
        } else {
            $this->user_auth_terms = $this->auth_groups['Public'];
        }
    }
    
    public function get_user_auth_terms(){
        return $this->user_auth_terms;
    }

    public function can_access($post_id) {
        $lpaccess_terms = get_the_terms($post_id, $this->lpaccess_taxonomy);
        if ($lpaccess_terms && in_array($lpaccess_terms[0]->slug, $this->user_auth_terms)) {
            return true;
        } else {
            return false;
        }
    }
}


?>