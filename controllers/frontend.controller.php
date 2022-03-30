<?php 
require_once "public/utile/formatage.php"; 
require_once "config/config.php";

function getPageAccueil(){
    $title = "Page d'accueil";
    $description = "Pharmacon";

    require_once "views/front/accueil.view.php";
}

function getPageTest(){
    $title = "Page d'accueil";
    $description = "Pharmacon";

    require_once "views/front/test.php";
}

function getPageAccueilClient(){
    $title = "Page d'accueil";
    $description = "Pharmacon";

    require_once "views/front/acceuilClient.php";
}

function getPageAccueilAdmin(){
    $title = "Page d'accueil";
    $description = "Pharmacon";

    require_once "views/front/acceuilAdmin.php";
}

function getPageAccueilDoctor(){
    $title = "Page d'accueil";
    $description = "Pharmacon";

    require_once "views/front/acceuilDoctor.php";
}

function getPageInscription(){
    $title = "Page d'accueil";
    $description = "Pharmacon";

    require_once "views/front/inscription.php";
}