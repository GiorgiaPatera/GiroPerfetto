<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn() || !isset($_GET["action"])){
    header("location: index.php?page=login");
}
if($_GET["action"]==1){

    $titoloarticolo = htmlspecialchars($_POST["titoloarticolo"]);
    $testoarticolo = htmlspecialchars($_POST["testoarticolo"]);
    $prezzoarticolo = $_POST["prezzoarticolo"];
    $dataarticolo = date("Y-m-d");
    $venditore = $_SESSION["idvenditore"];

    // $categorie = $dbh->getCategories();
    // $categorie_inserite = array();
    // foreach($categorie as $categoria){
    //     if(isset($_POST["categoria_".$categoria["idcategoria"]])){
    //         array_push($categorie_inserite, $categoria["idcategoria"]);
    //     }
    // }

    // list($result, $msg) = uploadImage(UPLOAD_DIR, $_POST["imgarticolo"]);
    // if($result != 0){
        // $imgarticolo = $msg;
        $idarticolo = $dbh->insertArticle($titoloarticolo, $testoarticolo, $dataarticolo, $_POST["imgarticolo"], $venditore, $prezzoarticolo);
        if($idarticolo != false){
            // foreach($categorie_inserite as $categoria){
            //     $ris = $dbh->insertCategoryOfArticle($idarticolo, $categoria);
            // }
            $msg = "Inserimento completato correttamente";
        }else{
            $msg = "Errore in inserimento";
        // }
    }
    header("location: index.php?page=login");
}
?>