<?php

use LDAP\Result;

    require "PHP/config.php";

    session_start();
    $link = DbConnect();
    
    $idConsulting = $_GET['idUser'];
    
    

    if(!$link){
        die('ERROR Could not connect to data base ' . mysqli_connect_error());
    } else{
        
        $resultatReq= array();
        $mysqli = mysqli_connect('localhost','root','','app-g7d');
        
        $sql='SELECT nom,prénom,adresse,téléphone,email,userType FROM utilisateur WHERE idUser = '.$idConsulting.'';
        
        if($stmt =mysqli_prepare($mysqli,$sql))
        {
            if(mysqli_stmt_execute($stmt))
            {
                $nom=$prenom=$adresse=$telephone=$email=$userType="";

                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt,$nom,$prenom,$adresse,$telephone,$email,$userType);
                if(mysqli_stmt_fetch($stmt))
                {
                    $resultatReq['nom']= $nom;
                    $resultatReq['prenom']= $prenom;
                    $resultatReq['adresse']= $adresse;
                    $resultatReq['telephone']= $telephone;
                    $resultatReq['email']= $email;
                    $resultatReq['userType']=$userType;
                }
            }
            
        }
        mysqli_stmt_close($stmt);
        
        }
        mysqli_close($mysqli);

    
    
    

  
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/consulter.css">
    <script src="https://kit.fontawesome.com/bb762585be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/responsive.css">
    <link rel="icon" href="image/logo_infinte_measure.png">
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
                <a href="P_admin.php">Tableau de bord</a>
                <a href="Inscription.php">Inscription</a>
                <div class="connect"><a href="connexion.php">Connexion</a></div>
                
            </div>
            <button style='background:rgb(101, 137, 244); padding:15px;
                border: rgba(48, 48, 48, 0.5) solid 2px;
                box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25);'
            ><a href="connexion.php" style='text-decoration:none;color:black;'> Déconnexion</a></button>
        </nav>
    </header>
    <div class="info">
        <h1>Visualisation de compte</h1>
        <p> Type : <?=  $resultatReq['userType']?><br><br>
            Nom : <?=  $resultatReq['nom']?><br><br>
            Prénom : <?= $resultatReq['prenom']?><br><br>
            Téléphone : <?= $resultatReq['telephone']?><br><br>
            Adresse : <?= $resultatReq['adresse']?><br><br>
            Adresse-électronique : <?= $resultatReq['email']?><br><br>
        </p>
        <div class="capteur">
        <a href="donnee_capteur.php"style="color:black;
        text-decoration:none;">données des capteurs</a>
        </div>
    </div>
    <footer>
        <a href="P_nousContacter.php">Nous contacter</a>
        <a href="mentions_légales.php">Mentions légales</a>
        <a href="">&copy;INFINITE MEASURE</a>
    </footer>
    <script src="app.js">
         function disconnect(){
            var txt;
            if (confirm("etes vous sur de vouloir vous déconnecter?")){
            location.replace("deconnexion.php");
            }
        }
    </script>
</body>
</html>