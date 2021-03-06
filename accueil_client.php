<?php 
require "PHP/config.php";
$link = DbConnect();
session_start();

$nom=$_SESSION['nom'];
$prénom=$_SESSION['prénom'];




if(!$_SESSION["loggedin"]){
    header('Location: connexion.php');
}

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
    <link rel="icon" href="image/logo_infinte_measure.png">
    
    <title>Infinite Measure</title>
</head>

<?php include("headerParent.php")   ?>
<body>

    <section class="categories">
        <div class="container categories_container">
            <div class="categories_left">
                <h1>Données médicales mesurées</h1>
                    <p>
                        Nom: <?php echo $nom ?> <br>
                        Prénom : <?php echo $prénom  ?> <br>
                    </p>
                    <button style="background:rgb(101, 137, 244); padding:15px;border: rgba(48, 48, 48, 0.5) solid 2px;box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25); border-radius: 10px"><a href="profil.php" type="submit" name="infos" value="infos" style="text-decoration:none; color:black; font-family:Poppins"> Informations du compte </a></button>
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
        <a href="mentions_légales.php">Mentions légales</a>
        <a href="">&copy;INFINITE MEASURE</a>
    </footer>
    <script src="app.js"></script>
</body>
</html>