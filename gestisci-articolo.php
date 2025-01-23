<?php
require_once 'bootstrap.php';

if(!isUserLoggedIn() || !isset($_GET["action"]) || ($_GET["action"]!=1 && $_GET["action"]!=2 && $_GET["action"]!=3) || ($_GET["action"]!=1 && !isset($_GET["id"]))){
    header("location: index.php?page=login");
}

if($_GET["action"]!=1){
    $risultato = $dbh->getPostByIdAndAuthor($_GET["id"], $_SESSION["idvenditore"]);
    if(count($risultato)==0){
        $templateParams["articolo"] = null;
    }
    else{
        $templateParams["articolo"] = $risultato[0];
        $templateParams["articolo"]["categorie"] = explode(",", $templateParams["articolo"]["categorie"]);
    }
}
else{
    $templateParams["articolo"] = getEmptyArticle();
}




$templateParams["titolo"] = "GiroPerfetto - Gestisci Articolo";
$templateParams["nome"] = "Gestione Articolo";
$templateParams["contenuto"] = "admin-form.php";
$templateParams["categorie"] = $dbh->getCategories();

$templateParams["azione"] = $_GET["action"];

require 'template/base.php';
?>