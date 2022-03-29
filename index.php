<?php
session_start();
require_once "controllers/backend.controller.php";
require_once "controllers/frontend.controller.php";
require_once "config/Securite.class.php";

try {
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $page = Securite::secureHTML($_GET['page']);
        switch ($page){
            case "accueil": getPageAccueil();
            break;
            case "test": getPageTest();
            break;

            case "error301": 
            case "error302": 
            case "error400": 
            case "error401": 
            case "error402": 
            case "error405": 
            case "error500": 
            case "error505": throw new Exception("Error de type : "+$page);
            break;
            case "error403": throw new Exception("vous n'avez pas le droit d'accéder à ce dossier");
            break;
            case "error404":
            default: throw new Exception("La page n'existe pas");
        }
    } else {
        getPageAccueil();
    }
} catch(Exception $e){
    $title = "Error";
    $description = "Page de gestion des erreurs";
    $errorMessage = $e->getMessage();
    require "views/commons/erreur.view.php";
}


