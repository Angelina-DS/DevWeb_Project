<?php ob_start(); 
styleTitreNiveau1("Login", COLOR_ADMINISTRATION) ?>


<div class='m-5'>
    <form action="" method="post">
        <div>
            <label>User ID</label>
            <input type="text" name="login">
        </div>

        <div >
            <label>Password</label>
            <input type="Password" name="password">
        <div >

            <button type="submit" name="Login" class="button">Login</button>
        </div>

        <p>
            Not a member? <a href="<?= URL ?>?page=inscription">Sign Up </a>
        </p>
    </form>
</div>

<?php if($alert !== ""){ 
    echo afficherAlert($alert, ALERT_DANGER);
} 
?>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>