<?php require_once "models/admin.dao.php"; ?>

<?php 
ob_start(); 
echo styleTitreNiveau1("Connexion : à venir ...",COLOR_TITLES);
?>

<!DOCTYPE html>
    <html >
        <body>
            
            <form action="inscription_traitement.php" method="post">
                <div class="form-group">
                    <input type="text" name="pseudo" placeholder="Pseudo" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="email" name="email"  placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password_retype"  placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit">Inscription</button>
                </div>   
            </form>

</body></html>



<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>
            
      