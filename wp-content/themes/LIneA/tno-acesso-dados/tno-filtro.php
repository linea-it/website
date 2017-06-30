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
  for ($i=1;$i<=$total_paginas;$i++) {
    $pagina_ativa = ($pagina == $i)?'paginacao-atual':'';
    $str_paginacao .= '<button class="btn btn-paginacao ' . $pagina_ativa . '" form="filtro" type="submit" name="pagina" value="' . $i .'">' . $i . '</button>';
  }
  $str_paginacao .= '</div>';
  return $str_paginacao;
}

function tno_objetos_select($lista_tno_nomes, $nome_selecionado) {
  $str_select = '';
  $str_select .= '<select class="tno-sel" name="nome_tno">';
  foreach ($lista_tno_nomes as $nome_tno) {
    $selecionado = '';
    if ($nome_selecionado == $nome_tno) {
      $selecionado = 'selected';
    }
    $str_select .= '<option value="' . $nome_tno . '" ' . $selecionado . '>' . $nome_tno;
    $str_select .= '</option>';
  }
  $str_select .= '</select>';
  return $str_select;
}
?>
