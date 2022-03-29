<?php ob_start();  ?>

<?= styleTitreNiveau1("Page d'administration du site", COLOR_ADMINISTRATION) ?>

<div class="row">
    <div class="col text-center">
        <a href="accueil" class="btn btn-primary">Page 1</a>
    </div>
    <div class="col text-center">
        <a href="accueil" class="btn btn-primary">Page 2</a>
    </div>
    <div class="col text-center">
        <form method="POST" action="">
            <input type='hidden' name='deconnexion' value="true" />
            <input type="submit" class="btn btn-primary" value="se déconnecter" />
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>

            
      