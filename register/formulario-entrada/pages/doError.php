<?php
/**
 * Created by PhpStorm.
 * User: Home Work
 * Date: 02/08/2014
 * Time: 21:39
 */

require_once("../infra/ErrorHandler.php");

$mysqli = new mysqli("127.0.0.1", "linea-appuser", "123", "formulario-entrada");
$mysqli->set_charset('utf8');

if (mysqli_connect_errno()) {
    throw new Exception(mysqli_connect_error());
}

$sql = "SELECT * FROM user WHERE name=?";

$id = 1;

if( ! $stmt = $mysqli->prepare( $sql ) ) {
    throw new Exception($mysqli->error);
}

/* atribui os parâmetros aos marcadores */
$stmt->bind_param("d", $id);

/* executa a query */
$stmt->execute();

$rowCount = 0;
$tabela = "<table>";
if ($result = $stmt->get_result()) {
    while ($row = $result->fetch_array()) {
        $rowCount++;
//        $message = new Message();
        foreach ($row as $key => $value) {
//            $message->$key = $value;
            $tabela += "Results: " . $value . "\n";
        }
//        array_push($messages, $message);
    }
}
$tabela += "</table>";

if($rowCount == 0) {
    throw new Exception("Nenhuma linha retornada");
}

$returnObject = new ReturnObject();
$returnObject->message = "Concluido";
$returnObject->data = $tabela;

echo json_encode($returnObject);