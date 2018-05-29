<?php
require_once 'ytb_functions.php';

function get_num_videos_grupo($grupo_slug) {
    $args = array(
        'post_type' => 'video',
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
