<?php
require_once 'bootstrap.php';
$templateParams["titolo"]="GiroPerfetto";
$templateParams["nome"] = "Carrello";
if(isset($_SESSION['idvenditore'])){
    $articolivenditore = $dbh->getArticlesByAuthors($_SESSION['idvenditore']);
    if (isset($_GET["id"]) && !in_array($_GET["id"], $articolivenditore)) {
        $dbh->insertArticleAlVenditore($_SESSION['idvenditore'], $_GET["id"]);
    }
}
$templateParams["contenuto"] = "base-carrello.php";
require 'template/base.php';
?>