<?php

require 'lineadb.php';

function checkImg($index, $inputName) {

    $target_dir = FOTO_DIR;
    $target_file = $target_dir . basename($_FILES[$inputName]["name"][$index]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image

    $check = getimagesize($_FILES[$inputName]["tmp_name"][$index]);
    if(!$check) {
        $err = "O arquivo não é uma imagem.";
        return $err;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $err = "O arquivo já existe.";
        return $err;
    }

     // Check file size
    if ($_FILES[$inputName]["size"][$index] > 500000) {
        $err = "Arquivo muito grande. Máx: 500kB.";
        return $err;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $err = "Usar somente JPG, JPEG, PNG e GIF.";
        return $err;
    }
    return false;
}

function upload($index, $inputName, $basedir) {

    $target_file = $basedir . basename($_FILES[$inputName]["name"][$index]);

    if (move_uploaded_file($_FILES[$inputName]["tmp_name"][$index], $target_file)) {
        return true;
    } else {
        return false;
    }

}


function checkDoc($index, $inputName) {

    $target_dir = APRESENTACAO_DIR;
    $target_file = $target_dir . basename($_FILES[$inputName]["name"][$index]);

    // Check if file already exists
    if (file_exists($target_file)) {
        $err = "O arquivo já existe.";
        return $err;
    }

     // Check file size
    if ($_FILES[$inputName]["size"][$index] > 100000000) {
        $err = "Arquivo muito grande. Máx: 100mB.";
        return $err;
    }

    return false;
}

?>
