<?php 
ob_start(); 
echo styleTitreNiveau1("Accueil",COLOR_TITLES);
?>


</div> modifier le menu Admin ici</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>