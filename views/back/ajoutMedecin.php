<?php 
ob_start(); 
echo styleTitreNiveau1("Création d'un nouveau médecin",COLOR_TITLES);
?>


<!DOCTYPE html>
    <html >
        <body>
            
            <form action="" method="POST">

                <div class="form-group">
                    <input type="text" name="nom"  placeholder="Nom" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="prenom"  placeholder="Prénom" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="login"  placeholder="Login" required="required" autocomplete="off"> 
                </div>
                <div class="form-group">

                <div class="form-group">
                    <input type="password" name="password" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password_retype"  placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="email" name="email"  placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="telephone" placeholder="Téléphone" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="bureau" placeholder="Bureau" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="submit" value="Ajouter" class="col btn btn-primary">
                </div>   


            </form>

</body></html>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>