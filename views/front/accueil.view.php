<?php require_once "models/admin.dao.php"; ?>

<?php 
ob_start(); 
echo styleTitreNiveau1("Accueil",COLOR_TITLES);
?>
<p>
	Nous vous souhaitons la bienvenue au cabinet pharmacon !
</p>

<p>
	Si vous souhaitez prendre rendez vous, vous devez vous connecter au préalable.
	Pour ce faire, cliquez sur le Pharmacon en haut à droite.
</p>

<p>
	Pour toute question sans connexion, veuillez utilisez le formulaire de contact !
</p>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>
            
      