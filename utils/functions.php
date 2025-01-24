<?php

function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
}

function getIdFromName($name){
    return preg_replace("/[^a-z]/", '', strtolower($name));
}

function isUserLoggedIn(){
    return !empty($_SESSION['idvenditore']);
}

function registerLoggedUser($user){
    $_SESSION["idvenditore"] = $user["idvenditore"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["nome"] = $user["nome"];
}

function logout(){
    unset($_SESSION["idvenditore"]);
    unset($_SESSION["username"]);
    unset($_SESSION["nome"]);
}

function getEmptyArticle(){
    return array("idarticolo" => "", "titoloarticolo" => "", "testoarticolo" => "", "prezzoarticolo" => "", "imgarticolo" => "", "categorie" => array());
}

function getAction($action){
    $result = "";
    switch($action){
        case 1:
            $result = "Inserisci";
            break;
        case 2:
            $result = "Modifica";
            break;
        case 3:
            $result = "Cancella";
            break;
    }

    return $result;
}

function getCategoryFromPage($page){
    switch($page){
        case "offerte":
            $category = 15;
            break;
        case "nuovo":
            $category = 13;
            break;
        case "usato":
            $category = 14;
            break;
        default:
            $category = null;
            break;
    }
    return $category;
}

function getPostBySecondaryCategories($idpost, $categories, $i, $categoriesFromPost){
    foreach ($categories as $idcat) {
        if (in_array($idcat, $categoriesFromPost)) {
            //non entra qui
            $i = $i + 1;
        }
    }
    if ($i > 0) {
        return true;
    }else{
        return false;
    }
}


function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;
    
    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}

?>