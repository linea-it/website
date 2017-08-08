<?php

function get_projetos($con) {
  $sql = "SELECT * FROM projetos";
  $prep = $con->prepare($sql);
  $prep->execute();
  return $prep->fetchAll();
}

function get_projeto_id($projetos_todos, $nome) {
  foreach ($projetos_todos as $projeto) {
    if ( $projeto['nome_projeto'] == $nome ) {
      return $projeto['id'];
    }
  }
  return FALSE;
}

function get_projetos_associados($con, $afiliado_id) {
  $sql = "SELECT nome_projeto FROM projetos AS p INNER JOIN projetos_associados AS pa ON p.id = pa.projeto_id WHERE pa.afiliado_id = ? ORDER BY nome_projeto";
  $prep = $con->prepare($sql);
  $prep->execute(array($afiliado_id));
  $result = $prep->fetchAll();
  if ($result) {
    $projetos = array();
    foreach ($result as $row) {
      array_push($projetos, $row['nome_projeto']);
    }
    return $projetos;
  }
  return FALSE;
}

function get_projetos_associados_string($con, $afiliado_id) {
  $projetos = get_projetos_associados($con, $afiliado_id);
  if ($projetos) {
    return implode(', ', $projetos);
  } else {
    return '';
  }
}

function salva_projeto_associado($con, $projeto_id, $afiliado_id) {
  $sql = "INSERT INTO projetos_associados (projeto_id, afiliado_id) VALUES (?,?)";
  $prep = $con->prepare($sql);
  $prep->execute(array($projeto_id, $afiliado_id));
}

function remove_projeto_associado($con, $projeto_id, $afiliado_id) {
  $sql = "DELETE FROM projetos_associados WHERE projeto_id = ? AND afiliado_id = ?";
  $prep = $con->prepare($sql);
  $prep->execute(array($projeto_id, $afiliado_id));
}

function remove_todos_projetos_associados($con, $afiliado_id){
  $sql = "DELETE FROM projetos_associados WHERE afiliado_id = ?";
  $prep = $con->prepare($sql);
  $prep->execute(array($afiliado_id));
}
