<?php
require_once 'bootstrap.php';
$templateParams["titolo"]="GiroPerfetto";
$templateParams["nome"] = "Articolo";
$templateParams["contenuto"] = "base-article.php";
$templateParams["articoli"] = $dbh->getPostById($_GET["id"]);
require 'template/base.php';
?>