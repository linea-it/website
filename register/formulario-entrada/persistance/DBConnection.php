<?php
require_once("../infra/ErrorHandler.php");

class DBConnection {

    public function getConnection() {
        $pdo = new PDO(
            'mysql:host=localhost;dbname=test;charset=utf8', 'wordpress', 'chariklo'
        , array(
            PDO::ATTR_PERSISTENT => true
            )
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}

