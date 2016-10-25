<?php

require_once("../infra/ErrorHandler.php");
require_once("../infra/PHPMailer.php");
require_once("../infra/I18nHandler.php");
require_once("../classes/User.php");
require_once("../persistance/UserDAO.php");

header('Content-Type: application/json');

$user = new User();
$user->name                 = isset($_POST["name"])             ? $_POST["name"]            : null;
$user->birthDate            = isset($_POST["birth-date"])       ? $_POST["birth-date"]      : null;
$user->nationality          = isset($_POST["nationality"])      ? $_POST["nationality"]     : null;
$user->street               = isset($_POST["street"])           ? $_POST["street"]          : null;
$user->city                 = isset($_POST["city"])             ? $_POST["city"]            : null;
$user->zipCode              = isset($_POST["zip-code"])         ? $_POST["zip-code"]        : null;
$user->state                = isset($_POST["state"])            ? $_POST["state"]           : null;
$user->country              = isset($_POST["country"])          ? $_POST["country"]         : null;
$user->telephone1           = isset($_POST["telephone-1"])      ? $_POST["telephone-1"]     : null;
$user->telephone2           = isset($_POST["telephone-2"])      ? $_POST["telephone-2"]     : null;
$user->institution          = isset($_POST["institution"])      ? $_POST["institution"]     : null;
$user->position             = isset($_POST["position"])         ? $_POST["position"]        : null;
$user->lineaEmail           = isset($_POST["linea-email"])      ? $_POST["linea-email"]     : null;
$user->gmail                = isset($_POST["gmail"])            ? $_POST["gmail"]           : null;
$user->contactEmail         = isset($_POST["contact-email"])    ? $_POST["contact-email"]   : null;
$user->cpf                  = isset($_POST["cpf"])              ? $_POST["cpf"]             : null;
$user->passport             = isset($_POST["passport"])         ? $_POST["passport"]        : null;
$user->rg                   = isset($_POST["rg"])               ? $_POST["rg"]              : null;
$user->organOfConsultation  = isset($_POST["org"])              ? $_POST["org"]             : null;
$user->uf                   = isset($_POST["uf"])               ? $_POST["uf"]              : null;

$userDAO = new UserDAO();
$returnObject = $userDAO->insert($user);

$bodytext = $homepage = file_get_contents('../templates/userRegistrationMail.html');

$bodytext = str_replace("{{nameLabel}}", L::registrationForm_name, $bodytext);
$bodytext = str_replace("{{name}}", $user->name, $bodytext);
$bodytext = str_replace("{{id}}", $returnObject->data, $bodytext);

$email = new PHPMailer();
$email->isHTML();
$email->isSMTP();
$email->From      = 'registration@linea.gov.br';
$email->FromName  = 'Linea';
$email->Subject   = 'Linea registration';
$email->Body      = $bodytext;

if(isset($user->contactEmail)) {
    $email->AddAddress( $user->contactEmail );
} elseif(isset($user->gmail)) {
    $email->AddAddress( $user->gmail );
}

// Descomentar!
//if(!$email->Send()) {
//    throw new Exception("Não foi possível enviar e-mail de acessos.");
//}

echo json_encode($returnObject);

