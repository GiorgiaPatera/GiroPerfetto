<?php

require_once 'bootstrap.php';

$templateParams["titolo"] = "GiroPerfetto - Login";
$templateParams["nome"] = "Benvenuto";
$templateParams["js"] = array("js/login.js");


require 'template/base-login.php';

?>