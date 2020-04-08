<?php

require_once 'access_functions.php';

function the_breadcrumb($grupo_id){
    $args = array(
        'format'    => 'slug',
        'separator' => '/',
        'link'      => false,
        'inclusive' => true
    );
    if ($grupo_id != 0) {
        $list = explode("/",get_term_parents_list($grupo_id, 'lpcategory', $args));
        array_pop($list);
        $base_url = get_page_link(get_the_ID()) . "?lpcategory_id=";
        $output = '<p><a href="' . get_page_link(get_the_ID()) . '">Landing Page</a> ';
        foreach($list as $grupo){
            $term = get_term_by('slug', $grupo, 'lpcategory');
            $output .= '>> ' . '<a href="' . $base_url . $term->term_id . '">';
            $output .= $term->name;
            $output .= '</a> ';
        }
        $output .= '</p>';
        echo $output;
    }
    
}

function get_lpcards_por_subgrupo($subgrupo) {
    $args = array(
        'post_type' => 'lpcard',
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => -1,
        'tax_query' => array (
            array(
                'taxonomy' => 'lpcategory',
                'field' => 'slug',
                'terms' => $subgrupo
            )
        )
    );
    $query_result = new WP_Query($args);
    return $query_result;
}

function lpcard($row, $post_id, $auth) {
    $permissao = $auth->can_access($post_id);
    $main_link = $row['main_link'];
    $class_desativado = '';
    if (!$permissao) {
        $class_desativado = 'lpcard-desativado';
    }
    $str = '';
    $str .= '<div class="lpcard ' . $class_desativado . '">';
    if ($row['alt_link'] != '' && $permissao){
        $str .= '<a href="' . $row['alt_link'] . '" title="+ leia mais">';
        $str .= '   <div class="card-more"></div>';
        $str .= '   <span class="card-more-plus">+</span>';
        $str .= '</a>';
    }
    if ($permissao && $main_link != '') {
        $str .= '<a href="' . $main_link . '" >';
    } else if (!is_user_logged_in()) {
        $str .= '<a class="lrm-login">';
    }
    $str .= '<div class="lpcard-title">';
    $str .= '   <p>' . $row['titulo'] . '</p>';
    $str .= '</div>';
    $str .= '<div class="lpcard-container">';
    $str .= '   <div class="lpcard-icon-container">';
    $str .= $row['thumb_tag'];
    $str .= '   </div>';
    $str .= '</div>';
    if ($permissao) {
        if ( $main_link != ''){
            $str .= '</a>';
        }
    } else {
        if (!is_user_logged_in()){
            $str .= '</a>';
        }
        $str .= '<span class="lpcard-desativado"><img src="' . get_bloginfo('template_url') . '/imagens/round_lock_black_24dp.png" alt="lock icon"/></span>';
    }
    if (current_user_can('administrator')){
        $str .= '<a class="lpcard-edit" href="' . get_edit_post_link() . '">Edit</a>';
    }
    $str .= '</div>';
    if (has_tag('card-break', get_the_ID())){
        $str .= '</div>';
        $str .= '<div class="lpcards-container ' . $main_card_class . '">';
    }
    return $str;

}

function main_lpcard($row, $post_id, $auth) {
    $permissao = $auth->can_access($post_id);
    $main_link = $row['main_link'];
    $class_desativado = '';
    if (!$permissao) {
        $class_desativado = 'lpcard-desativado';
    }
    $str = '';
    $str .= '<div class="lpcard main-lpcard '. $class_desativado .'">';
    if ($row['alt_link'] != '' && $permissao){
        $str .= '<a href="' . $row['alt_link'] . '" title="+ leia mais">';
        $str .= '   <div class="card-more"></div>';
        $str .= '   <span class="card-more-plus">+</span>';
        $str .= '</a>';
    }
    if ($permissao && $main_link != '') {
        $str .= '<a href="' . $main_link . '" >';
    } else if (!is_user_logged_in()) {
        $str .= '<a class="lrm-login">';
    }
    $str .= '<div class="lpcard-title main-lpcard">';
    $str .= '   <p>' . $row['titulo'] . '</p>';
    $str .= '</div>';
    $str .= '<div class="lpcard-container main-lpcard">';
    $str .= '   <div class="lpcard-icon-container main-lpcard">';
    $str .= $row['thumb_tag'];
    $str .= '   </div>';
    $str .= '</div>';
    if ($permissao) {
        if ( $main_link != ''){
            $str .= '</a>';
        }
    } else {
        if (!is_user_logged_in()){
            $str .= '</a>';
        }
        $str .= '<span class="lpcard-desativado"><img src="' . get_bloginfo('template_url') . '/imagens/round_lock_black_24dp.png" alt="lock icon"/></span>';
    }
    if (current_user_can('administrator')){
        $str .= '<a class="lpcard-edit" href="' . get_edit_post_link() . '">Edit</a>';
    }
    $str .= '</div>';
    return $str;

}

function build_auth_tax_query($auth_terms){
    $tax_query = array(
        'relation' => 'OR'
    );
    foreach($auth_terms as $term){
        array_push($tax_query, array(
            'taxonomy' => 'lpaccess',
            'field' => 'slug',
            'terms' => $term,
            'include_children' => false
        ));
    }
    return $tax_query;
}
?>
