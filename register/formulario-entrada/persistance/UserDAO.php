<?php

require_once("../infra/ErrorHandler.php");
require_once("DBConnection.php");
require_once("../infra/I18nHandler.php");

class UserDAO {

    private $pdo;

    public function __construct() {
        $db = new DBConnection();
        $this->pdo = $db->getConnection();
    }

    function insert(User $user) {
        $this->pdo->beginTransaction();

        $sql =
                 "INSERT INTO user ("
               . "    name, birth_date, nationality, street, city, zip_code, state, country, telephone_1, telephone_2, institution, position, linea_email, gmail, contact_email, cpf, passport, rg, organ_of_consultation, uf"
               . ")"
               . "VALUES ("
               . "    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?"
               . ")";

        try {
            $stmt = $this->pdo->prepare( $sql );

            /* atribui os parâmetros aos marcadores */
            $stmt->bindValue(1,  $user->name, PDO::PARAM_STR);
            $birthDate = \DateTime::createFromFormat("d/m/Y", $user->birthDate);
            $stmt->bindValue(2,  $birthDate->format("Y-m-d"), PDO::PARAM_STR);
            $stmt->bindValue(3,  $user->nationality, PDO::PARAM_STR);
            $stmt->bindValue(4,  $user->street, PDO::PARAM_STR);
            $stmt->bindValue(5,  $user->city, PDO::PARAM_STR);
            $stmt->bindValue(6,  $user->zipCode, PDO::PARAM_STR);
            $stmt->bindValue(7,  $user->state, PDO::PARAM_STR);
            $stmt->bindValue(8,  $user->country, PDO::PARAM_STR);
            $stmt->bindValue(9,  $user->telephone1, PDO::PARAM_STR);
            $stmt->bindValue(10, $user->telephone2, PDO::PARAM_STR);
            $stmt->bindValue(11, $user->institution, PDO::PARAM_STR);
            $stmt->bindValue(12, $user->position, PDO::PARAM_STR);
            $stmt->bindValue(13, $user->lineaEmail, PDO::PARAM_STR);
            $stmt->bindValue(14, $user->gmail, PDO::PARAM_STR);
            $stmt->bindValue(15, $user->contactEmail, PDO::PARAM_STR);
            $stmt->bindValue(16, $user->cpf, PDO::PARAM_STR);
            $stmt->bindValue(17, $user->passport, PDO::PARAM_STR);
            $stmt->bindValue(18, $user->rg, PDO::PARAM_STR);
            $stmt->bindValue(19, $user->organOfConsultation, PDO::PARAM_STR);
            $stmt->bindValue(20, $user->uf, PDO::PARAM_STR);

            /* executa a query */
            $success = $stmt->execute();

            if($success) {
                $returnObject = new ReturnObject();
                $returnObject->message = L::userDao_insertSuccess;
                $returnObject->data = $this->pdo->lastInsertId();
            } else {
                throw new Exception(L::userDao_insertFail);
            }

            $this->pdo->commit();

        } catch(Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }

        return $returnObject;
    }

}