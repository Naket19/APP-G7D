<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/P_accueil.css">
    <script src="https://kit.fontawesome.com/bb762585be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
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
                <a href="donnee_capteur.php">Données Capteurs</a>
                <a href="P_faq.html">FAQ</a>
                <a href="applilud.html">Application Ludique</a>
                <?php 
                if(isset ($SESSION["loggedin"])){
                ?>
                    <a href="Profil.html">Mon compte</a>
                    <a class="connect" onclick="disconnect" >Déconnexion</a>
                <?php
                } else{
                    ?>
                    <a class="connect" href="connexion.php" >Connexion</a>
                    <?php
                }
                ?>
            </div>
            <?php 
            if(isset ($SESSION["loggedin"])){
                ?><a class="mon-compte" href="Profil.php">Mon Compte</a>
                    <button onclick="disconnect">Déconnexion</button>
            <?php
            } else{
                ?> 
                <button style='background:rgb(101, 137, 244); padding:15px;
                border: rgba(48, 48, 48, 0.5) solid 2px;
                box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25);'
                ><a href="connexion.php" style='text-decoration:none;color:black;'> Connexion</a></button>
                <?php
            }
            ?>
            
        </nav>
    </header>
    <div class="test-contenu">
        <div class="barre-vertical">
            <div class="elements-pages">
                <li class = product
                onclick="document.getElementById('part1').style.display='block';
                document.getElementById('gauche').style.display='none';
                document.getElementById('presentation').style.display='block';
                document.getElementById('avantages').style.display='none'"
                >
                Notre produit
                </li>
                <li class="produit" 
                onclick="document.getElementById('part1').style.display='block';
                document.getElementById('gauche').style.display='block';
                document.getElementById('avantages').style.display='none'">Notre Produit</li>

                <li class="why"onclick="document.getElementById('part1').style.display='none';
                document.getElementById('avantages').style.display='block'"
                >Pourquoi notre produit ?</li>

                <li class="fonct" onclick="document.getElementById('part1').style.display='block';
                document.getElementById('gauche').style.display='block';
                document.getElementById('avantages').style.display='none';
                document.getElementById('presentation').style.display='none';"
                > <a href=""></a> fonctionnement </li>
            </div>
        </div>
        <div class="scroll">
            <div id= "part1" class="Part1 ">
                <div class="img-medecin">
                    <div class="gauche" id="gauche">
                        <img src="image/medecins-soignants.jpg" alt="">
                        <div class="fonctionnement">
                            <h3>Fonctionnement du produit</h3>
                            <p> Nos capteurs sont mis sur vos enfants 
                                ensuite les données sont récoltées et envoyer
                                sur le site web où le corps médical peut
                                vérifier que les constantes de vos enfants et 
                                de l'environnement où il se trouve sont 
                                bonnes.  
                            </p>
                        </div>
                    </div>

                    <div id="presentation" class="presentation">
                        <h3>Presentation du produit  </h3>
                        <p>c'est un dispositif électronique constitué de 
                            4 capteurs permettant d'obtenir les données de 
                            votre enfant et son environnement.
                        </p>
                        <div class="text1">
                            <div class="cardiaque"style="display: flex;
                            align-items:center;flex-direction:row">
                                <i style="display: flex; font-size: 25px;
                                padding:8px;border-radius:70px; width:25px;
                                align-items: center;
                                background: url(../image/back-ecriture.png);"
                                class="uil uil-heartbeat"></i>
                                <p> un capteur cardiaque pour pouvoir vérifier
                                    la fréquence cardiaque.
                                </p>
                            </div>
                            <div class="sonnore" style="display: flex;
                                align-items:center;flex-direction:row">
                                <i style="display: flex; font-size: 25px;
                                    padding:8px;border-radius:70px; height:25px;
                                    align-items: center;
                                    background: url(../image/back-ecriture.png);"
                                    class="uil uil-volume-up">
                                </i>
                                <p style="display: flex;"> 
                                    Un capteur Sonnore pour mesurer le niveau 
                                    de bruit autour de votre enfant. 
                                </p>
                            </div>
                            <div class=" humidité" style="display: flex;
                            align-items:center;flex-direction:row">
                                <i style="display: flex; font-size: 25px;
                                padding:8px; border-radius:70px; height:25px;
                                align-items: center;
                                background: url(../image/back-ecriture.png);"
                                class="uil uil-tear"></i>
                                <p style="display: flex;">
                                    Un capteur d'humidité pour mesurer le niveau 
                                    de d'humidité et la temprérature
                                    autour de votre enfant. 
                                </p>
                            </div>
                            <div class="CO2" style="display: flex;
                                align-items:center;flex-direction:row">
                                <i style="display: flex; font-size: 25px;
                                padding:8px; border-radius:70px; height:25px;
                                align-items: center;
                                background: url(../image/back-ecriture.png);"
                                class="uil uil-comparison"></i>
                                <p> Un capteur de C02 pour mesurer le niveau 
                                    de CO2 dans l'air autour de votre enfant. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="part2">
                <div id= "avantages"class="avantages">
                    <h2>Les avantages de notre produit</h2>
                    <div class="Apport">
                        <h3>Notre apport</h3>
                        <p>Nous fournissons une vision globale sur 
                            la prise en charge d’un nouveau-né.
                             Que vous soyez médecin,
                             parent ou membre de la famille,
                             vous aurez un suivi détaillé et
                              intuitif du bien-être du bébé. 
                        </p>
                    </div>
                    <div class="data">
                        <h3> Vos données</h3>
                        <p>Notre produit récolte différentes types de 
                            données (sonore, cardiaque, qualité de l’air)
                            afin d’assurer la bonne santé du nourrisson.
                        </p>
                    </div>
                    <div class="a-faire">
                        <h3> Une seule chose à faire</h3>
                        <p>Créez votre compte et accédez à l'affichage
                            des résultats du dispostif électronique sur
                            notre site internet ergonomique.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>       
    <footer>
        <a href="P_nousContacter.php">Nous contacter</a>
        <a href="mentions_légales.html">Mentions légales</a>
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