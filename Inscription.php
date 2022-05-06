<?php

require "PHP/config.php";

//Verification des champs
function Genere_Password($size)
{
    $password = "a";
    $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

    for($i=0;$i<$size;$i++)
    {
    
        $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
    }
		
    return $password;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST["nom"];
    $prénom = $_POST["prénom"];
    $nombre_de_patient = $_POST["nombre_de_patient"];
    $email = $_POST["email"];
    $téléphone = $_POST["téléphone"];
    $adresse = $_POST["adresse"];
    $mot_de_passenc= Genere_Password(12);
    $mot_de_passe = md5($mot_de_passenc);
    $sujet = " Informations de connexion à la plateforme";
    $corp = "Bonjour $nom $prénom, Voici vos informations de connexion pour votre compte chez infinite measures : E-mail de connexion : $email  Mot de passe : $mot_de_passenc ";
    $headers ="";
    if (isset($_POST['nom'], $_POST['prénom'], $_POST['nombre_de_patient'], $_POST['email'], $_POST['téléphone'], $_POST['adresse'])) {
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
                echo "c'est bon";
                mail($email, $sujet, $corp, $headers);
                header('Location: P_admin.php');
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
                <a href="P_admin.php">Tableau de bord</a>
                <a href="Inscription.php">Inscription</a>
                <a href="Profil.html">Mon compte</a>
                <div class="connect"><a href="connexion.php" >Déconnexion</a></div>
                
            </div>
            <button style='background:rgb(101, 137, 244); padding:15px;
                border: rgba(48, 48, 48, 0.5) solid 2px;
                box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25);'
            ><a href="connexion.php" style='text-decoration:none;color:black;'> Déconnexion</a></button>
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
                <button type="submit">Inscription</button>
            </div>
        </form>
    </div>
    <!-- <footer>
        <a href="P_nousContacter.php">Nous contacter</a>
        <a href="mentions_légales.html">Mentions légales</a>
        <a href="">&copy;INFINITE MEASURE</a>
    </footer> -->
    <script src="app.js"></script>
</body>

</html>