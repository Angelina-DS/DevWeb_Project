<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?= $description?>">
    <title><?= $title?></title>
    <link href="<?= URL ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= URL ?>public/css/main.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Copse" rel="stylesheet">
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
</head>
<body>
    <div class='container p-0 mt-2 rounded perso_shadow'>
        <!-- Header du site -->
        <header class='bg-dark text-white rounded-top perso_policeTitre'>
            <div class='row align-items-center m-0'>
                <div class='col-2 p-2 text-center'>
                    <a href='accueil'>
                        <img src='<?= URL ?>public/sources/images/Autres/logo.svg' class='rounded-circle img-fluid perso_logoSize' alt='logo du site' />
                    </a>
                </div>

                <div class='col-6 col-lg-8 m-0 p-0'>
                    <?php include("views/commons/menu.php") ?>
                </div>
                <div class='col-4 col-lg-2 text-right pt-1 pr-4'>
                    <a href="login" class='nav-link text-white text-center'>Pharmacon</a>
                </div>
            </div>
        </header>
        <!-- Contenu du site -->
        <?php print_r($_SESSION) ?>
        <div class='border p-1 perso_minCorpSize px-5'>
            <?= $content ?>
        </div>
        <!-- footer du site -->
        <footer class='bg-dark text-center text-white rounded-bottom'>
            <p class='p-2'>&copy; Parmacon 2022 </p>      
        </footer>
    </div>
    <script src='<?= URL ?>public/bootstrap/js/bootstrap.js'> </script>
</body>
</html>