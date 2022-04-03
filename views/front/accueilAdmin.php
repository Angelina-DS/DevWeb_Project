<?php require_once "models/admin.dao.php"; ?>

<?php 
ob_start(); 
echo styleTitreNiveau1("Accueil",COLOR_TITLES);
?>

<html >
    <body>
		<p> modifier le menu Admin ici</p>
</body>
</html>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>