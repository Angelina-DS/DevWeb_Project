<?php 
ob_start(); 
echo styleTitreNiveau1("Connexion : à venir ...",COLOR_TITLES);
?>


<html>
<head>
	<title>Page d'accueil des docteurs</title>
</head>
<body>
</div> modifier le menu docteurs ici</body>
</html>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>