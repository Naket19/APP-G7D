<?php 
require "PHP/config.php";
session_start();
$idcompte = $_SESSION['APP']['numero'];
$resultat = mysqli_query($link,"SELECT nom FROM parent WHERE idParent = '".$idcompte."'");
$row = mysqli_fetch_array($resultat, '1');
$nom = $row['nom'];

$resultat = mysqli_query($link,"SELECT prénom FROM parent WHERE idParent = '".$idcompte."'");
$row = mysqli_fetch_array($resultat, '1');
$prenom = $row['prénom'];

$resultat = mysqli_query($link,"SELECT nombre_de_patient FROM parent WHERE idParent = '".$idcompte."'");
$row = mysqli_fetch_array($resultat, '1');
$nbenfants = $row['nombre_de_patient'];

if(isset($_POST['deconnexion'])){
    session_destroy();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/P_accueil.css">
    <script src="https://kit.fontawesome.com/bb762585be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/responsive.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="CSS/P_accueil_client.css">
    <title>Infinite Measure</title>
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
                <div class="connect"><a href="connexion.php" >Connexion</a></div>
                
            </div>
            <button><a href="connexion.php" type="submit" name="deconnexion" value="deconnexion"> déconnexion</a></button>
        </nav>
    </header>

    <section class="categories">
        <div class="container categories_container">
            <div class="categories_left">
                <h1>Données médicales mesurées</h1>
                    <p>
                        nom: <?php echo $nom ?> <br>
                        prénom : <?php echo $prenom  ?> <br>
                    </p>
                    <button><a href="profil.php" type="submit" name="infos" value="infos"> informations du compte </a></button>
            </div>
            <div class="categories_right">
                <article class="category">
                    <span class="category_icon"><i class="uil uil-heartbeat"></i></span>
                    <h5>Capteur cardiaque</h5>
                    <p>80 Bpm</p>
                </article>

                <article class="category">
                    <span class="category_icon"><i class="uil uil-comparison"></i></span>
                    <h5>Concentration en CO2</h5>
                    <p>400 Ppm</p>
                </article>

                <article class="category">
                    <span class="category_icon"><i class="uil uil-volume-up"></i></span>
                    <h5>Niveau sonore</h5>
                    <p>52 dB</p>
                </article>

                <article class="category">
                    <span class="category_icon"><i class="uil uil-tear"></i></span>
                    <h5>Niveau d'humidité</h5>
                    <p>43 %</p>
                </article>
            </div>
        </div>
    </section>






    <footer>
        <a href="P_nousContacter.php">Nous contacter</a>
        <a href="mentions_légales.html">Mentions légales</a>
        <a href="">&copy;INFINITE MEASURE</a>
    </footer>
    <script src="app.js"></script>
</body>
</html>