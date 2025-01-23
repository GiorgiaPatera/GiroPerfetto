<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn() || !isset($_POST["action"])){
    header("location: index.php?page=home");
}
if($_POST["action"]==1){
    //Inserisco
    $titoloarticolo = htmlspecialchars($_POST["titoloarticolo"]);
    $testoarticolo = htmlspecialchars($_POST["testoarticolo"]);
    $dataarticolo = date("Y-m-d");
    $venditore = $_SESSION["idvenditore"];
    $prezzoarticolo = htmlspecialchars($_POST["prezzoarticolo"]);
    $imgarticolo = htmlspecialchars($_POST["imgarticolo"]);

    $categorie = $dbh->getCategories();
    $categorie_inserite = array();
    foreach($categorie as $categoria){
        if(isset($_POST["categoria_".$categoria["idcategoria"]])){
            array_push($categorie_inserite, $categoria["idcategoria"]);
        }
    }

    $idarticolo = $dbh->insertArticle($titoloarticolo, $testoarticolo, $dataarticolo, $imgarticolo, $venditore, $prezzoarticolo);
    if($idarticolo!=false){
        foreach($categorie_inserite as $categoria){
            $ris = $dbh->insertCategoryOfArticle($idarticolo, $categoria);
        }
    }
        
    header("location: index.php?page=login");
}
if($_POST["action"]==2){
    //modifico
    $idarticolo = htmlspecialchars($_POST["idarticolo"]);
    $titoloarticolo = htmlspecialchars($_POST["titoloarticolo"]);
    $testoarticolo = htmlspecialchars($_POST["testoarticolo"]);
    $dataarticolo = date("Y-m-d");
    $venditore = $_SESSION["idvenditore"];
    $prezzoarticolo = htmlspecialchars($_POST["prezzoarticolo"]);

    if(isset($_POST["imgarticolo"])){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_POST["imgarticolo"]);
        if($result == 0){
            header("location: index.php?formmsg=".$msg);
        }
        $imgarticolo = $msg;

    }
    else{
        $imgarticolo = $_POST["oldimg"];
    }

    $dbh->updateArticleOfAuthor($idarticolo, $titoloarticolo, $testoarticolo, $dataarticolo, $imgarticolo, $venditore, $prezzoarticolo);

    $categorie = $dbh->getCategories();
    $categorie_inserite = array();
    foreach($categorie as $categoria){
        if(isset($_POST["categoria_".$categoria["idcategoria"]])){
            array_push($categorie_inserite, $categoria["idcategoria"]);
        }
    }
    $categorievecchie = explode(",", $_POST["categorie"]);

    $categoriedaeliminare = array_diff($categorievecchie, $categorie_inserite);
    foreach($categoriedaeliminare as $categoria){
        $ris = $dbh->deleteCategoryOfArticle($idarticolo, $categoria);
    }
    $categoriedainserire = array_diff($categorie_inserite, $categorievecchie);
    foreach($categoriedainserire as $categoria){
        $ris = $dbh->insertCategoryOfArticle($idarticolo, $categoria);
    }

    header("location: index.php?page=login");
}

if($_POST["action"]==3){
    //cancello
    echo "entro";
    $idarticolo = $_POST["idarticolo"];
    $venditore =  $_SESSION["idvenditore"];
    $dbh->deleteCategoriesOfArticle($idarticolo);
    $dbh->deleteArticleOfAuthor($idarticolo, $venditore);
    
    $msg = "Cancellazione completata correttamente!";
    header("location: index.php?page=login");
}

?>