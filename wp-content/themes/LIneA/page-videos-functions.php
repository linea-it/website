<?php
require_once 'ytb_functions.php';

function the_breadcrumb($grupo_id){
    $args = array(
        'format'    => 'slug',
        'separator' => '/',
        'link'      => false,
        'inclusive' => true
    );
    if ($grupo_id != 0) {
        $list = explode("/",get_term_parents_list($grupo_id, 'grupo', $args));
        array_pop($list);
        $base_url = get_page_link(get_the_ID()) . "?grupo_id=";
        $output = '<p><a href="' . get_page_link(get_the_ID()) . '">Vídeos</a> ';
        foreach($list as $grupo){
            $term = get_term_by('slug', $grupo, 'grupo');
            $output .= '>> ' . '<a href="' . $base_url . $term->term_id . '">';
            $output .= $term->name;
            $output .= '</a> ';
        }
        $output .= '</p>';
        echo $output;
    }
    
}

function get_num_videos_grupo($grupo_slug) {
    $args = array(
        'post_type' => 'video',
        'posts_per_page' => -1,
        'tax_query' => array (
            array(
                'taxonomy' => 'grupo',
                'field' => 'slug',
                'terms' => $grupo_slug,
            )
        )
    );
    $query_result = new WP_Query($args);
    return count($query_result->posts);
}

function get_videos_por_subgrupo($subgrupo) {
    $args = array(
        'post_type' => 'video',
        'orderby' => 'date',
        'posts_per_page' => -1,
        'tax_query' => array (
            array(
                'taxonomy' => 'grupo',
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

function video_card($row, $permissao) {
    $ytbID = getID($row['v_video']);
    $url = $row['v_video'];
    $class_desativado = '';
    if (!$permissao) {
        $class_desativado = 'video-desativado';
    }
    $str = '';
    $str .= '<div class="video-card ' . $class_desativado . '">';
    if ($permissao) {
        $str .= '<a href="' . $url . '">';
    }
    $str .= '<img src="http://img.youtube.com/vi/' . $ytbID . '/hqdefault.jpg"/>';
    $str .= '<div class="video-caption">';
    $str .= '<p>' . $row['v_titulo'] . '</p>';
    $str .= '</div>';
    if ($permissao) {
        $str .= '</a>';
    } else {
        $str .= '<span class="video-desativado">RESTRITO</span>';
    }
    $str .= '<span class="video-data">';
    $str .= get_the_date('d/m/Y');
    $str .= '</span>';
    $str .= '</div>';
    return $str;

}

function ano_card($ano) {
    $ytbID = getID($row['v_video']);
    $str = '';
    $str .= '<div class="video-card ano-card">';
    $str .= '<p>' . $ano . '</p>';
    $str .= '</div>';
    return $str;

}

function get_video_action($action, $login, $id) {
  $str = '';
  $str .= '<a class="icon ' . $login . '" title="Video: '. $action .'" href="';
  $str .= get_bloginfo('template_url') . '/videos-'. $action .'.php?id=' . $id . '">';
  $str .= '<img src="' . get_bloginfo('template_url') . '/imagens//'. $action .'.png" alt="'. $action .' icon"/>';
  $str .= '</a>';
  return $str;
}

function get_video_group_action($action, $login, $id) {
  if ( !empty($id) ) {
    $param = '?id=' . $id;
  }
  $str = '';
  $str .= '<a class="icon ' . $login . '" title="Categoria: '. $action .'" href="';
  $str .= get_bloginfo('template_url') . '/video-group-'. $action .'.php' . $param . '">';
  $str .= '<img src="' . get_bloginfo('template_url') . '/imagens//'. $action .'.png" alt="'. $action .' icon"/>';
  $str .= '</a>';
  return $str;
}

function get_video_subgroup_action($action, $login, $id) {
  if ( !empty($id) ) {
    $param = '?id=' . $id;
  }
  $str = '';
  $str .= '<a class="icon ' . $login . '" title="Categoria: '. $action .'" href="';
  $str .= get_bloginfo('template_url') . '/video-subgroup-'. $action .'.php' . $param . '">';
  $str .= '<img src="' . get_bloginfo('template_url') . '/imagens//'. $action .'.png" alt="'. $action .' icon"/>';
  $str .= '</a>';
  return $str;
}

function get_video_grupos_select($con, $categoria, $input_name) {
  $row_grupos = get_video_grupos($con);
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
