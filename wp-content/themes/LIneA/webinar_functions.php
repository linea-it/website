<?php

function get_next_webinar() {
    $pdo = Database::connect();
    $sql = 'SELECT * FROM webinars ORDER BY data DESC';
    $prep = $pdo->prepare($sql);
    $prep->execute();
    $result = $prep->fetchAll();

    Database::disconnect();
    $futureWebinars = array();

    foreach ($result as $row) {

        $data = strtotime($row['data']);
        $h = strtotime($row['horario']);

        if ( (date('Y-m-d', $data) > date('Y-m-d')) || (date('Y-m-d', $data) == date('Y-m-d')) && (date('H:i', strtotime('-1hour')) <= date('H:i', $h)) ) {
            array_push($futureWebinars, $row);
        }
    }
    $rev = array_reverse($futureWebinars);
    return $rev[0];
}