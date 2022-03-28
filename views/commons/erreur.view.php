<?php ob_start();  ?>

<?= styleTitreNiveau1("Erreur", COLOR_TITLES) ?>

<div class="alert alert-danger" role="alert">
    <?= $errorMessage ?>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>

            
      