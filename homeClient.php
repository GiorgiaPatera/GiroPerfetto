<?php

require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "GiroPerfetto - homeClient";
$templateParams["nome"] = 'Informazioni';
$templateParams["articoli"] = $dbh->getPosts();

require 'template/base.php';

?>