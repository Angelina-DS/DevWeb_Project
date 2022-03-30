<?php require_once "models/admin.dao.php"; ?>

<?php 
ob_start(); 
echo styleTitreNiveau1("Connexion : à venir ...",COLOR_TITLES);
?>

<html> <head>
	<title>Patient</title>
</head>
<body>
	<div class="header">
	<h2>Patient Login</h2>
</div>

<form method="post" action="accueil.view.php">
    

	<div>
		<label>User ID</label>
		<input type="text" name="UserID">
	</div>

	<div >
		<label>Password</label>
		<input type="Password" name="password">
	<div >

		<button type="submit" name="Login" class="button" onclick=isConnexionValid($login,$password)> Login</button>
	</div>

	<p>
		Not a member? <a href="<?= URL ?>?page=inscription">Sign Up </a>
	</p>
	




</form>

</body></html>



<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>
            
      