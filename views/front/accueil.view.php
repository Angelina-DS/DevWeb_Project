<?php 
ob_start(); 
echo styleTitreNiveau1("Connexion : à venir ...",COLOR_TITLES);
?>
<p>
Non connecte :
    - Login<br>
    - Password<br>
    - Case à cocher : conditions d'utilisations<br>
    - Bouton valider<br>
    - Bouton Register : Login / Password 1 / Password 2
</p>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>
            
      