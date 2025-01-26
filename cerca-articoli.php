<?php 

require_once 'bootstrap.php';

$templateParams["titolo"] = "GiroPerfetto - Home";
$templateParams["nome"] = "Informazioni";
$templateParams["contenuto"] = "lista-articoli.php";
if($_POST["cerca"] != null && isset($_POST["cerca"])){
    $templateParams["articoli"] = $dbh->searchArticle($_POST["cerca"]);
}else{
    //$templateParams["articoli"] = [];
}
require 'template/base.php';

?>