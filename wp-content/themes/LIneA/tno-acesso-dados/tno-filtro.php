<?php

define (TNO_BASE_URL, 'http://tno.linea.gov.br/');

function get_tno_nomes($con) {
  $sql = 'SELECT DISTINCT nome_tno FROM tno_objetos ORDER BY nome_tno';
  $prep = $con->prepare($sql);
  $prep->execute();
  $result = $prep->fetchAll();
  $lista_tno_nomes = array();
  foreach ($result as $row) {
    array_push($lista_tno_nomes, $row['nome_tno']);
  }
  return $lista_tno_nomes;
}

function get_tno_nomes_alternativos($con) {
  $sql = 'SELECT nome_tno, nome_alternativo FROM tno_info';
  $prep = $con->prepare($sql);
  $prep->execute();
  $result = $prep->fetchAll();
  $lista_tno_nomes_alternativos = array();
  foreach ($result as $row) {
    $lista_tno_nomes_alternativos[$row['nome_tno']] = $row['nome_alternativo'];
  }
  return $lista_tno_nomes_alternativos;
}

function compara_nomes_tno($a, $b) {
  $pattern = '/(^\d+)_/';
  preg_match($pattern, $a, $a_matches);
  preg_match($pattern, $b, $b_matches);
  $a_match = $a_matches[1];
  $b_match = $b_matches[1];
  if ( is_numeric($a_match) && !is_numeric($b_match) ) {
    return 1;
  } else if ( !is_numeric($a_match) && is_numeric($b_match) ){
    return -1;
  } else {
    return ( $a < $b )? -1 : 1;
  }
}

function merge_nomes_alternativos($lista_tno_nomes, $lista_tno_nomes_alternativos) {
  $lista = array();
  foreach ($lista_tno_nomes as $nome_tno) {
    if ( array_key_exists($nome_tno, $lista_tno_nomes_alternativos) ) {
      $nome_tno = $lista_tno_nomes_alternativos[$nome_tno];
    }
    array_push($lista, $nome_tno);
  }
  usort($lista, 'compara_nomes_tno');
  return $lista;
}

function get_tno_mapas($con, $nome_tno, $data_inicio, $data_fim, $limite, $pagina) {
  $sql = 'SELECT * FROM tno_objetos WHERE nome_tno = ? and data >= ? and data <= ? and tipo_arquivo = ? ORDER BY data LIMIT ?, ?';
  $prep = $con->prepare($sql);
  $prep->execute(array($nome_tno, $data_inicio, $data_fim, 'jpg', ($pagina-1)*$limite, $limite));
  return $prep->fetchAll();
}

function get_tno_mapas_total($con, $nome_tno, $data_inicio, $data_fim) {
  $sql = 'SELECT COUNT(*) as total FROM tno_objetos WHERE nome_tno = ? and data >= ? and data <= ? and tipo_arquivo = ?';
  $prep = $con->prepare($sql);
  $prep->execute(array($nome_tno, $data_inicio, $data_fim, 'jpg'));
  $result = $prep->fetchAll();
  return $result[0]['total'];
}

function get_tno_tables($con, $nome_tno) {
  $sql = 'SELECT * FROM tno_objetos WHERE nome_tno = ? and tipo_arquivo = ? ORDER BY ano';
  $prep = $con->prepare($sql);
  $prep->execute(array($nome_tno, 'table'));
  return $prep->fetchAll();
}

function cria_paginacao($limite, $pagina, $total_imagens) {
  $total_paginas = ceil($total_imagens/$limite);
  $str_paginacao = '<div class="paginacao">';
  $intervalo = 4;
  $inicio_btn = $pagina - $intervalo;
  $fim_btn = $pagina + $intervalo;
  if ( $inicio_btn <= 1 ) {
    $inicio_btn = 1;
  } else {
    $str_paginacao .= '<button class="btn btn-paginacao '.
      '" form="filtro" type="submit" name="pagina" value="' . 1 .'">' . 1 .
      '</button><span class="gap-paginacao">...</span>';
  }
  if ( $fim_btn >= $total_paginas ) {
    $fim_btn = $total_paginas;
  }
  for ($i=$inicio_btn;$i<=$fim_btn;$i++) {
    $pagina_ativa = ($pagina == $i)?'paginacao-atual':'';
    $str_paginacao .= '<button class="btn btn-paginacao ' . $pagina_ativa .
    '" form="filtro" type="submit" name="pagina" value="' . $i .'">' . $i . '</button>';
  }
  if ( $fim_btn < $total_paginas ) {
    $str_paginacao .= '<span class="gap-paginacao">...</span><button class="btn btn-paginacao '.
      '" form="filtro" type="submit" name="pagina" value="' . $total_paginas .'">' . $total_paginas .
      '</button>';
  }
  $str_paginacao .= '</div>';
  return $str_paginacao;
}

function tno_objetos_select($lista_tno_nomes, $lista_tno_nomes_alternativos, $nome_selecionado) {
  $str_select = '';
  $str_select .= '<select class="tno-sel" name="nome_tno">';
  foreach ($lista_tno_nomes as $nome_tno) {
    $value = $nome_tno;
    $nome_alternativo_key = array_search($nome_tno, $lista_tno_nomes_alternativos);
    if ( $nome_alternativo_key !== FALSE ) {
      $value = $nome_alternativo_key;
    }
    $selecionado = '';
    if ($nome_selecionado == $value) {
      $selecionado = 'selected';
    }
    $str_select .= '<option value="' . $value . '" ' . $selecionado . '>' . $nome_tno;
    $str_select .= '</option>';
  }
  $str_select .= '</select>';
  return $str_select;
}
?>
