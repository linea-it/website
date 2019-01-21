<?php
require_once 'ytb_functions.php';

function get_num_documentos_ano($query_result, $year){
    $filtered = array();
    foreach ($query_result->posts as $p) {
        //var_dump($p);
        $post_year = date('Y', strtotime($p->post_date));
        if ($post_year == $year) {
            array_push($filtered, $p);
        }
    }
    return count($filtered);
}

function the_breadcrumb($grupo_id){
    $args = array(
        'format'    => 'slug',
        'separator' => '/',
        'link'      => false,
        'inclusive' => true
    );
    if ($grupo_id != 0) {
        $list = explode("/",get_term_parents_list($grupo_id, 'categoria', $args));
        array_pop($list);
        $base_url = get_page_link(get_the_ID()) . "?categoria_id=";
        $output = '<p><a href="' . get_page_link(get_the_ID()) . '">Documentos</a> ';
        foreach($list as $grupo){
            $term = get_term_by('slug', $grupo, 'categoria');
            $output .= '>> ' . '<a href="' . $base_url . $term->term_id . '">';
            $output .= $term->name;
            $output .= '</a> ';
        }
        $output .= '</p>';
        echo $output;
    }
    
}

function get_num_documentos_grupo($grupo_slug) {
    $args = array(
        'post_type' => 'documento',
        'posts_per_page' => -1,
        'tax_query' => array (
            array(
                'taxonomy' => 'categoria',
                'field' => 'slug',
                'terms' => $grupo_slug,
            )
        )
    );
    $query_result = new WP_Query($args);
    return count($query_result->posts);
}

function get_documentos_por_subgrupo($subgrupo) {
    $args = array(
        'post_type' => 'documento',
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => -1,
        'tax_query' => array (
            array(
                'taxonomy' => 'categoria',
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

function documento_card($row, $permissao) {
    $url = $row['v_documento'];
    $doc_icon_src = get_bloginfo('template_url') . '/imagens/file.png';
    $class_desativado = '';
    if (!$permissao) {
        $class_desativado = 'documento-desativado';
    }
    $str = '';
    $str .= '<div class="documento-card ' . $class_desativado . '">';
    if ($permissao) {
        $str .= '<a href="' . $url . '">';
    }
    $str .= '<img class="documento-card-icon" src="' . $doc_icon_src . '"/>';
    $str .= '<div class="documento-caption">';
    $str .= '<p>' . $row['v_titulo'] . '</p>';
    $str .= '</div>';
    if ($permissao) {
        $str .= '</a>';
    } else {
        $str .= '<span class="documento-desativado">RESTRITO</span>';
    }
    $str .= '</div>';
    return $str;

}

function ano_card($ano) {
    $ytbID = getID($row['v_documento']);
    $str = '';
    $str .= '<div class="documento-card ano-card">';
    $str .= '<p>' . $ano . '</p>';
    $str .= '</div>';
    return $str;

}

function get_documento_action($action, $login, $id) {
  $str = '';
  $str .= '<a class="icon ' . $login . '" title="Documento: '. $action .'" href="';
  $str .= get_bloginfo('template_url') . '/docs-'. $action .'.php?id=' . $id . '">';
  $str .= '<img src="' . get_bloginfo('template_url') . '/imagens//'. $action .'.png" alt="'. $action .' icon"/>';
  $str .= '</a>';
  return $str;
}

function get_documento_group_action($action, $login, $id) {
  if ( !empty($id) ) {
    $param = '?id=' . $id;
  }
  $str = '';
  $str .= '<a class="icon ' . $login . '" title="Categoria: '. $action .'" href="';
  $str .= get_bloginfo('template_url') . '/docs-group-'. $action .'.php' . $param . '">';
  $str .= '<img src="' . get_bloginfo('template_url') . '/imagens//'. $action .'.png" alt="'. $action .' icon"/>';
  $str .= '</a>';
  return $str;
}

function get_documento_subgroup_action($action, $login, $id) {
  if ( !empty($id) ) {
    $param = '?id=' . $id;
  }
  $str = '';
  $str .= '<a class="icon ' . $login . '" title="Categoria: '. $action .'" href="';
  $str .= get_bloginfo('template_url') . '/documento-subgroup-'. $action .'.php' . $param . '">';
  $str .= '<img src="' . get_bloginfo('template_url') . '/imagens//'. $action .'.png" alt="'. $action .' icon"/>';
  $str .= '</a>';
  return $str;
}

function get_documento_grupos_select($con, $categoria, $input_name) {
  $row_grupos = get_documento_grupos($con);
  $str = '';
  $str .= '<select name='.$input_name.' id'.$input_name.'>';
  foreach ($row_grupos as $row) {
    $selected = ( $categoria == $row['id'] )?'selected':'';
    $str .= '<option value="' . $row['id'] . '" '. $selected .' >' . $row['titulo'] . '</option>';
  }
  $str .= '</select>';
  return $str;
}

?>
