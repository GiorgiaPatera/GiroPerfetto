<?php
require_once 'bootstrap.php';
$templateParams["titolo"]="GiroPerfetto";
$templateParams["nome"] = "Carrello";
$templateParams["articoli"] = [];
array_push($templateParams["articoli"], $dbh->getPostById($_GET["id"]));
$templateParams["contenuto"] = "base-carrello.php";
require 'template/base.php';
?>