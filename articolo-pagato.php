<?php 
require_once 'bootstrap.php';
$idarticolo = $_GET["id"];
if (isset($_GET["id"]) && in_array($dbh->getPostById($_GET["id"])[0], $_SESSION['cart'])) {
    $postToRemove = $dbh->getPostById($_GET["id"])[0];
    if(($key = array_search($postToRemove, $_SESSION['cart']))!==false) {
        // Rimuovi l'elemento dall'array
        unset($_SESSION['cart'][$key]);
    }
    
    // Per reindicizzare l'array (opzionale, se necessario)
    $_SESSION['cart'] = array_values($_SESSION['cart']);
}
$dbh->deleteCategoriesOfArticle($idarticolo);
$dbh->deleteArticle($idarticolo);
$dbh->insertNotifica("Pagamento Accettato, la consegna verrà effettuata all'interno del Campus di Cesena.");
$idnotifica = $dbh->getLastNotifica();
$dbh->insertNotificaAlVenditore($_SESSION["idvenditore"], $idnotifica[0]["idnotifica"]); 
header("location: index.php?page=home");
?>