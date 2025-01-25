<?php
require_once 'bootstrap.php';
$templateParams["titolo"]="GiroPerfetto";
$templateParams["nome"] = "Carrello";
if (isset($_GET["id"]) && in_array($dbh->getPostById($_GET["id"])[0], $_SESSION['cart'])) {
    $postToRemove = $dbh->getPostById($_GET["id"])[0];
    if(($key = array_search($postToRemove, $_SESSION['cart']))!==false) {
        // Rimuovi l'elemento dall'array
        unset($_SESSION['cart'][$key]);
    }
    
    // Per reindicizzare l'array (opzionale, se necessario)
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}
$templateParams["contenuto"] = "base-carrello.php";
require 'template/base.php';
?>