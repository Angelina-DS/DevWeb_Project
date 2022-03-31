<nav class="navbar navbar-expand-xl navbar-dark bg-dark perso_size20">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?= COLOR_DOCTORS ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Prise de Rendez-Vous
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item <?= COLOR_DOCTORS ?>" href="<?= URL ?>?page=test">Docteur 1</a>
                <a class="dropdown-item <?= COLOR_DOCTORS ?>" href="<?= URL ?>docteur_2">Docteur 2</a>
                <a class="dropdown-item <?= COLOR_DOCTORS ?>" href="<?= URL ?>docteur_3">Docteur 3</a>
            </div>
        </li>

        <?php if( $_SESSION['acces'] == 2 || $_SESSION['acces'] == 3){ ?>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?= COLOR_ADMINISTRATION ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Administration
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item <?= COLOR_ADMINISTRATION ?>" href="<?= URL ?>">Utilisateurs</a>
                <a class="dropdown-item <?= COLOR_ADMINISTRATION ?>" href="<?= URL ?>">Pannel d'aministration</a>
                <?php if(Securite::verifAccessSession()){ ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item perso_ColorAdminMenu" href="<?= URL ?>genererNewsAdmin">Gestion des news</a>
                <?php } ?>
            </div>
        </li>
        <?php } ?>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?= COLOR_CONTACT ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Contacts
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item <?= COLOR_CONTACT ?>" href="<?= URL ?>contact">Contact</a>
                <a class="dropdown-item <?= COLOR_CONTACT ?>" href="<?= URL ?>mentions">Mentions légales</a>
            </div>
        </li>
    </ul>
  </div>
</nav>