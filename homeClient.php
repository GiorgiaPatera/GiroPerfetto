<?php

require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "GiroPerfetto - homeClient";
$templateParams["articoli"] = $dbh->getPosts();

require 'template/base.php';

?>