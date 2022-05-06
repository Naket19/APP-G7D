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

$resultat = mysqli_query($link,"SELECT email FROM parent WHERE idParent = '".$idcompte."'");
$row = mysqli_fetch_array($resultat, '1');
$mail = $row['email'];

$resultat = mysqli_query($link,"SELECT téléphone FROM parent WHERE idParent = '".$idcompte."'");
$row = mysqli_fetch_array($resultat, '1');
$tel = $row['téléphone'];

$resultat = mysqli_query($link,"SELECT adresse FROM parent WHERE idParent = '".$idcompte."'");
$row = mysqli_fetch_array($resultat, '1');
$adresse = $row['adresse'];

$resultat = mysqli_query($link,"SELECT nombre_de_patient FROM parent WHERE idParent = '".$idcompte."'");
$row = mysqli_fetch_array($resultat, '1');
$nbpatients = $row['nombre_de_patient'];

if(isset($_POST['deconnexion'])){
        session_destroy();
    // ne marche pas 
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/P_profil.css">
    <script src="https://kit.fontawesome.com/bb762585be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/responsive.css">
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
                <a href="Index.php">Accueil</a>
                <a href="">Données Capteurs</a>
                <a href="P_faq.html">FAQ</a>
                <a href="">Application Ludique</a>
                <a href="Profil.html">Mon compte</a>
                <div class="connect"><a href="connexion.php">Connexion</a></div>

            </div>
            <button style='background:rgb(101, 137, 244); padding:5px;
                border: rgba(48, 48, 48, 0.5) solid 2px;
                box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25);'
            ><a href="connexion.php" style='text-decoration:none;color:black;'> Déconnexion</a></button>
        </nav>
    </header>
    <div class="contenu ">
        <div class="form-title">
            <div class="text-title">
                <h1>Profil</h1>
                <div class="text">
                    <div class="separation"></div>
                </div>
            </div>
            <div class="profil">
                <div class="circle">
                </div>
                <div class="encadrer">
                    Type:
                </div>
            </div>
            <div class="profil">
                <div class="encadrer">
                    Nom: <?php echo $nom ?>
                </div>
                <div class="encadrer">
                    Mail: <?php echo $mail ?>
                </div>
                <div class="encadrer">
                    Prénom: <?php echo $prenom ?>
                </div>
                <div class="encadrer">
                    Nb de patients : <?php echo $nbpatients ?>
                </div>
                <div class="encadrer">
                    Adresse: <?php echo $adresse ?>
                </div>
                <div class="encadrer">
                    Telephone: <?php echo $tel ?>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <a href="P_nousContacter.php">Nous contacter</a>
        <a href="mentions_légales.html">Mentions légales</a>
        <a href="">&copy;INFINITE MEASURE</a>
    </footer>
    <script src="app.js"></script>
</body>

</html>