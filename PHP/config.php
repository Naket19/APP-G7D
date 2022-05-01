<?php
/* Données de login pour la base de données */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'app_g7d_infinite_measure');

/* Connexion */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // test connexion
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>