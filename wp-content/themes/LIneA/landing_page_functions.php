<?php

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

function get_permissao($post_id) {
    if (is_user_logged_in()) {
        return true;
    } else {
        return !has_tag('restrito', $post_id);
    }
}

function lpcard($row, $permissao) {
    $main_link = $row['main_link'];
    $class_desativado = '';
    if (!$permissao) {
        $class_desativado = 'lpcard-desativado';
    }
    $str = '';
    $str .= '<div class="lpcard ' . $class_desativado . '">';
    if ($row['alt_link'] != ''){
        $str .= '<a href="' . $row['alt_link'] . '" title="+ leia mais">';
        $str .= '   <div class="card-more"></div>';
        $str .= '   <span class="card-more-plus">+</span>';
        $str .= '</a>';
    }
    if ($permissao && $main_link != '') {
        $str .= '<a href="' . $main_link . '">';
    }
    $str .= '<div class="lpcard-title">';
    $str .= '   <p>' . $row['titulo'] . '</p>';
    $str .= '</div>';
    $str .= '<div class="lpcard-container">';
    $str .= '   <div class="lpcard-content">';
    $str .= '       <p>' . $row['content'] . '</p>';
    $str .= '   </div>';
    $str .= '   <div class="lpcard-icon-container">';
    $str .= $row['thumb_tag'];
    $str .= '   </div>';
    $str .= '</div>';
    if ($permissao) {
        if ( $main_link != ''){
            $str .= '</a>';
        }
    } else {
        $str .= '<span class="lpcard-desativado">RESTRITO</span>';
    }
    if (is_user_logged_in()){
        $str .= '<a class="lpcard-edit" href="' . get_edit_post_link() . '">Edit</a>';
    }
    $str .= '</div>';
    return $str;

}

function main_lpcard($row) {
    $main_link = $row['main_link'];
    $str = '';
    $str .= '<div class="lpcard main-lpcard">';
    if ($row['alt_link'] != ''){
        $str .= '<a href="' . $row['alt_link'] . '" title="+ leia mais">';
        $str .= '   <div class="card-more"></div>';
        $str .= '   <span class="card-more-plus">+</span>';
        $str .= '</a>';
    }
    $str .= '<a href="' . $main_link . '">';
    $str .= '<div class="lpcard-title main-lpcard">';
    $str .= '   <p>' . $row['titulo'] . '</p>';
    $str .= '</div>';
    $str .= '<div class="lpcard-container main-lpcard">';
    $str .= '   <div class="lpcard-icon-container main-lpcard">';
    $str .= $row['thumb_tag'];
    $str .= '   </div>';
    $str .= '</div>';
    $str .= '</a>';
    if (is_user_logged_in()){
        $str .= '<a class="lpcard-edit" href="' . get_edit_post_link() . '">Edit</a>';
    }
    $str .= '</div>';
    return $str;

}

?>
