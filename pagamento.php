<?php
require_once 'bootstrap.php';
$templateParams["titolo"]="GiroPerfetto";
$templateParams["nome"] = "Pagamento";
$templateParams["contenuto"] = "base-pagamento.php";
$templateParams["articoli"] = $dbh->getPostById($_GET["id"]);
require 'template/base.php';
?>