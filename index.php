<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "GiroPerfetto - Home";

if(!isset($_GET["page"])){
    $_GET["page"] = "home";
}
switch($_GET["page"]){
    case "home":
        //Home Template
        $templateParams["nome"] = "Informazioni";
        $templateParams["contenuto"] = "lista-articoli.php";
        $templateParams["articoli"] = $dbh->getPosts();
        break;
    case "offerte":
        $templateParams["nome"] = "Informazioni";
        $templateParams["contenuto"] = "lista-articoli.php";
        $templateParams["articoli"] = $dbh->getPostByCategory(15);
        break;
    case "nuovo":
        $templateParams["nome"] = "Informazioni";
        $templateParams["contenuto"] = "lista-articoli.php";
        $templateParams["articoli"] = $dbh->getPostByCategory(13);
        break;
    case "usato":
        $templateParams["nome"] = "Informazioni";
        $templateParams["contenuto"] = "lista-articoli.php";
        $templateParams["articoli"] = $dbh->getPostByCategory(14);
        break;
    case "notifiche":
        break;
    case "login":
        // da modificare
        logout();
        if(isset($_POST["username"]) && isset($_POST["password"])){
            $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
            if(count($login_result)==0){
                //Login fallito
                $templateParams["errorelogin"] = "Errore! Controllare username o password!";
            }
            else{
                // se spuntato il remember me 
                registerLoggedUser($login_result[0]);
            }
        }
        
        if(isUserLoggedIn()){
            $templateParams["titolo"] = "GiroPerfetto - Admin";
            $templateParams["nome"] = "Informazioni";
            $templateParams["contenuto"] = "login-home.php";
            $templateParams["articoli"] = $dbh->getPostByAuthorId($_SESSION["idautore"]);
            if(isset($_GET["formmsg"])){
                $templateParams["formmsg"] = $_GET["formmsg"];
            }
        }
        else{
            $templateParams["titolo"] = "GiroPerfetto - Login";
            $templateParams["nome"] = "Benvenuto";
            $templateParams["contenuto"] = "baselogin.php";
        }
        break;
    default:
        $templateParams["nome"] = "Informazioni";
        $templateParams["contenuto"] = "lista-articoli.php";
        $templateParams["articoli"] = $dbh->getPosts();
}

require 'template/base.php';
?>