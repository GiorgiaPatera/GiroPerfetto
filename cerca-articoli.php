<?php 

require_once 'bootstrap.php';

$templateParams["titolo"] = "GiroPerfetto - Home";
$templateParams["nome"] = "Informazioni";
$templateParams["contenuto"] = "lista-articoli.php";
$templateParams["articoli"] = $dbh->searchArticle($_POST["cerca"]);

require 'template/base.php';

?>