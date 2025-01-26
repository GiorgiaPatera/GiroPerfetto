<?php
require_once 'bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idnotifica'])) {
    $idnotifica = intval($_POST['idnotifica']);
    $success = $dbh->setLetto($idnotifica, 1); // Aggiorna lo stato della notifica

    // Reindirizza nuovamente alla pagina delle notifiche
    header("Location: index.php?page=notifiche");
    exit;
}

// Risposta di default in caso di errore
header("Location: index.php?page=notifiche");
exit;
?>

