<?php require_once "models/admin.dao.php"; ?>

<?php 
ob_start(); 
echo styleTitreNiveau1("Accueil",COLOR_TITLES);
?>


<p> modifier le menu Admin ici</p>


<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>