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

function getPageAccueilPatient(){
    $title = "Page d'accueil";
    $description = "Pharmacon";

    require_once "views/front/acceuilPatient.php";
}

function getPageAccueilAdmin(){
    $title = "Page d'accueil";
    $description = "Pharmacon";

    require_once "views/front/acceuilAdmin.php";
}

function getPageAccueilDocteur(){
    $title = "Page d'accueil";
    $description = "Pharmacon";

    require_once "views/front/acceuilDocteur.php";
}

function getPageAjoutMedecin(){
    $title = "Ajouter un nouveau médecin";
    $description = "Pharmacon";

    require_once "views/front/ajoutMedecin.php";
}