<?php
    # Exemple de config qui sera modifie
    const COLOR_DOCTORS = "perso_ColorVioletMenu";
    const COLOR_ADMINISTRATION = "perso_ColorAdminMenu";
    const COLOR_CONTACT = "perso_ColorBleuCielMenu";
    const COLOR_TITLES = "perso_ColorGray";

    const TYPE_NEWS = 1;

    const COOKIE_PROTECT = "timer";

    const ALERT_SUCCESS = 1;
    const ALERT_DANGER = 2;
    const ALERT_INFO = 3;
    const ALERT_WARNING = 4;

    define("URL",str_replace("index.php","", (isset($_SERVER["HTTPS"])? "https" : "http"). "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));