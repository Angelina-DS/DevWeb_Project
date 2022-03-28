<?php 
require_once "public/utile/formatage.php"; 
require_once "config/config.php";

function getPageAccueil(){
    $title = "Page d'accueil";
    $description = "Pharmacon";

    require_once "views/front/accueil.view.php";
}