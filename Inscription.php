<?php

require "PHP/config.php";

//Verification des champs



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST["nom"];
    $prénom = $_POST["prénom"];
    $nombre_de_patient = $_POST["nombre_de_patient"];
    $email = $_POST["email"];
    $téléphone = $_POST["téléphone"];
    $adresse = $_POST["adresse"];
    $mot_de_passe = md5($_POST["mot_de_passe"]);


    if (isset($_POST['nom'], $_POST['prénom'], $_POST['nombre_de_patient'], $_POST['email'], $_POST['téléphone'], $_POST['adresse'], $_POST['mot_de_passe'])) {
        if (empty($_POST['nom']) || empty($_POST['nom']) || empty($_POST['nom']) || empty($_POST['nom']) || empty($_POST['nom']) || empty($_POST['nom']) || empty($_POST['nom']) || empty($_POST['nom'])) {
            echo "Veuillez remplir tous les champs";
        } elseif (!preg_match('/[a-zA-Z]+$/', trim($_POST['nom']))) {
            echo "Veuillez ecrire le nom seulent en lettre minuscile et majuscule";
        } elseif (!preg_match('/[a-zA-Z]+$/', trim($_POST['prénom']))) {
            echo "Veuillez ecrire le prénom seulent en lettre minuscile et majuscule";
        } elseif (!preg_match('/[1-9]+$/', trim($_POST['nombre_de_patient']))) {
            echo "Veuillez indiquer combien d'enfant sont a la charge";
        } elseif (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
            echo filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
            echo "Veuillez ecrire un mail valide";
        } elseif (!preg_match('/[0-9]{10}+$/', trim($_POST['téléphone']))) {
            echo "Veuillez indiquer un numéro de téléphone valide";
        } else {

            if ($link->connect_error) {
                die('Error : (' . $link->connect_errno . ') ' . $link->connect_error);
            }

            $statement = $link->prepare("INSERT INTO parent (nom, prénom, nombre_de_patient, email, téléphone, adresse, mot_de_passe) VALUES(?, ?, ?, ?, ?, ?, ?)");
            $statement->bind_param('sssssss', $nom, $prénom, $nombre_de_patient, $email, $téléphone, $adresse, $mot_de_passe);

            if ($statement->execute()) {
                print "incription fini";
            } else {
                print $link->error;
            }
        }
    }
}


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/P_inscription.css">
    <link rel="stylesheet" href="CSS/responsive.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"> </script>
    <script src="https://kit.fontawesome.com/bb762585be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="script.js" defer></script>
    <title>Mon site - Connexion</title>
</head>

<body>
    <header>

        <nav>
            <img src="image/logo_infinte_measure.png" alt="">
            <div class="toggle">
                <i class="fa-solid fa-bars ouvrir"></i>
                <i class="fa-solid fa-circle-xmark fermer"></i>
            </div>
            <div class="acc-menu">
                <a href="Index.html">Accueil</a>
                <a href="">Données Capteurs</a>
                <a href="P_faq.html">FAQ</a>
                <a href="">Application Ludique</a>
                <a href="Profil.html">Mon compte</a>
                <div class="connect"><a href="connexion.php">connexion</a></div>

            </div>
            <button><a href="connexion.php"> Connexion</a></button>
        </nav>
    </header>
    <div class="F_contenu">
        <div class="text-title">
            <h1>Inscription</h1>
            <div class="text">
                <div class="separation"></div>
            </div>
        </div>

        <form method="post" action="Inscription.php">
            <div class="champ">
                <br><input type="text" name="nom" class="input" placeholder="Nom">
            </div>
            <div class="champ">
                <input type="text" name="prénom" class="input" placeholder="Prénom">
            </div>
            <div class="champ">
                <input type="text" name="nombre_de_patient" class="input" placeholder="Nombre d'enfant">
            </div>
            <div class="champ">
                <input type="text" name="email" class="input" placeholder="Adresse Mail">
            </div>
            <div class="champ">
                <input type="text" name="téléphone" class="input" placeholder="Numéro de téléphone">
            </div>
            <div class="champ">
                <input type="text" name="adresse" class="input" placeholder="Adresse">
            </div>
            <div class="champ">
                <input type="password" name="mot_de_passe" class="input" placeholder="Mot de Passe">
            </div>
            <div class="champ">
                <button type="submit">Inscription</button>
            </div>
        </form>
    </div>
    <footer>
        <a href="P_nousContacter.php">Nous contacter</a>
        <a href="">Mention légal</a>
        <a href="">&copy;INFINITE MEASURE</a>
    </footer>
    <script src="app.js"></script>
</body>

</html>