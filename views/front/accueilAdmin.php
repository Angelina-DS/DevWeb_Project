<?php 
ob_start(); 
echo styleTitreNiveau1("Connexion : à venir ...",COLOR_TITLES);
?>


<html>
<head>
	<title>Page d'accueil client</title>
</head>
<body>
</div> modifier le menu client ici</body>
</html>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>