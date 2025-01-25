<?php

session_start();
define("UPLOAD_DIR", "./img/");
require_once("utils/functions.php");

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "GiroPerfettoDataBase", 3307);

?>