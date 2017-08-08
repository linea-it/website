<?php
require_once 'ytb_functions.php';

function get_video_grupos($con) {
  $sql = 'SELECT * FROM video_grupos ORDER BY titulo';
  $prep = $con->prepare($sql);
  $prep->execute();
  return $prep->fetchAll();
}

function get_videos_por_grupo($con, $grupo_id) {
  $sql = 'SELECT * FROM videos WHERE video_grupo_id = ? ORDER BY titulo';
  $prep = $con->prepare($sql);
  $prep->execute(array($grupo_id));
  return $prep->fetchAll();
}

function get_videos_sem_categoria($con) {
  $sql = 'SELECT * FROM videos WHERE video_grupo_id IS NULL ORDER BY titulo';
  $prep = $con->prepare($sql);
  $prep->execute();
  return $prep->fetchAll();
}

function video_card($row, $login) {
    $ytbID = getID($row['video']);
    $str = '';
    $str .= '<div class="video-card">';
    $str .= '<a href="' . $row['video'] . '">';
    $str .= '<img src="http://img.youtube.com/vi/' . $ytbID . '/hqdefault.jpg"/>';
    $str .= '<div class="video-caption">';
    $str .= '<p>' . $row['titulo'] . '</p>';
    $str .= '</div>';
    $str .= '</a>';
    $str .= '<span class="video-group-icon">';
    $str .= get_video_action('update', $login, $row['id']);
    $str .= get_video_action('delete', $login, $row['id']);
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

function get_video_grupos_select($con, $categoria) {
  $row_grupos = get_video_grupos($con);
  $str = '';
  $str .= '<select name="categoria" id="categoria">';
  foreach ($row_grupos as $row) {
    $selected = ( $categoria == $row['id'] )?'selected':'';
    $str .= '<option value="' . $row['id'] . '" '. $selected .' >' . $row['titulo'] . '</option>';
  }
  $str .= '</select>';
  return $str;
}

?>
