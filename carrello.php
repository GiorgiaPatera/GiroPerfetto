<?php
require_once 'bootstrap.php';
$templateParams["titolo"]="GiroPerfetto";
$templateParams["nome"] = "Carrello";
if (isset($_GET["id"]) && !in_array($dbh->getPostById($_GET["id"])[0], $_SESSION['cart'])) {
    array_push($_SESSION['cart'],$dbh->getPostById($_GET["id"])[0]);
}
$templateParams["contenuto"] = "base-carrello.php";
require 'template/base.php';
?>