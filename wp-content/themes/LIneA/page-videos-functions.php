<?php
require_once 'ytb_functions.php';

function get_video_grupos($con) {
  $sql = 'SELECT * FROM video_grupos ORDER BY titulo';
  $prep = $con->prepare($sql);
  $prep->execute();
  return $prep->fetchAll();
}

function get_videos_por_grupo($con, $grupo_id) {
  $sql = <<<SQL
    SELECT v.id as v_id, v.titulo as v_titulo, v.video as v_video FROM
    videos AS v INNER JOIN video_grupos_relac AS vgr ON v.id = vgr.video_id
    WHERE vgr.grupo_id = ? ORDER BY titulo
SQL;
  $prep = $con->prepare($sql);
  $prep->execute(array($grupo_id));
  return $prep->fetchAll();
}

function get_videos_sem_categoria($con) {
  $sql = <<<SQL
    SELECT * FROM videos AS v INNER JOIN video_grupos_relac AS vgr ON
    v.id = vgr.video_id WHERE vgr.grupo_id IS NULL ORDER BY titulo
SQL;
  $prep = $con->prepare($sql);
  $prep->execute();
  return $prep->fetchAll();
}

function get_grupo_por_id_video($con, $id_video) {
    $sql = <<<SQL
    SELECT grupo_id FROM video_grupos_relac WHERE video_id = ?;
SQL;
    $prep = $con->prepare($sql);
    $prep->execute(array($id_video));
    $result = $prep->fetchAll();
    return $result[0]['grupo_id'];
}

function video_card($row, $login) {
    $ytbID = getID($row['v_video']);
    $str = '';
    $str .= '<div class="video-card">';
    $str .= '<a href="' . $row['v_video'] . '">';
    $str .= '<img src="http://img.youtube.com/vi/' . $ytbID . '/hqdefault.jpg"/>';
    $str .= '<div class="video-caption">';
    $str .= '<p>' . $row['v_titulo'] . '</p>';
    $str .= '</div>';
    $str .= '</a>';
    $str .= '<span class="video-group-icon">';
    $str .= get_video_action('update', $login, $row['v_id']);
    $str .= get_video_action('delete', $login, $row['v_id']);
    $str .= '</span>';
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
