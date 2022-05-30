<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/P_faqcss.css">
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
                <a href="Index.php">Accueil</a>
                <a href="P_faq.php">FAQ</a>
                <a href="applilud.html">Application Ludique</a>
                <?php 
                if(isset ($SESSION["loggedin"])){
                ?>
                    <a href="Profil.html">Mon compte</a>
                    <a href="donnee_capteur.php">Données Capteurs</a>
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
                    <button 
                    style='background:rgb(101, 137, 244); padding:15px;
                    border: rgba(48, 48, 48, 0.5) solid 2px;
                    box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25);'onclick="disconnect">Déconnexion</button>
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
    <div class="centredepage">
        <div class="parent">
            <div class="titre"> <p class="letitre">F.A.Q</p></div>
            <div class="image"><img src= ></div>
            <div class="lafaq"> 
                    <div class="row">
                        <div class="tabs">
                        <div class="tab">
                            <input type="radio" id="rd1" name="rd">
                            <label class="tab-label" for="rd1">1. Comment créer un compte ?</label>
                            <div class="tab-content">
                            Si vous voulez créer un compte pour accéder aux données de votre enfant, il faut nous envoyer une demande de création de compte dans l'onglet "Nous contacter".
                            <br><br>Veuillez renseigner ces informations : prénom, nom, nombre d'enfant, numéro de téléphone et votre adresse postale.
                            </div>
                        </div>
                        <div class="tab">
                            <input type="radio" id="rd2" name="rd">
                            <label class="tab-label" for="rd2">2. Comment se connecter ?</label>
                            <div class="tab-content">
                            Vous pouvez vous connecter, en renseignant dans la page de connexion votre adresse mail ainsi que le mail de mot que nous vous avons transmis par mail.
                            </div>
                        </div>
                        <div class="tab">
                            <input type="radio" id="rd3" name="rd">
                            <label class="tab-label" for="rd3">3. ... ?</label>
                            <div class="tab-content">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil, aut.
                            </div>
                        </div>
                        <div class="tab">
                            <input type="radio" id="rd4" name="rd">
                            <label class="tab-label" for="rd4">4. ... ?</label>
                            <div class="tab-content">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil, aut.
                            </div>
                        </div>
                        <div class="tab">
                            <input type="radio" id="rd5" name="rd">
                            <label class="tab-label" for="rd5">5. ... ?</label>
                            <div class="tab-content">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil, aut.
                            </div>
                        </div>
                        <div class="tab">
                            <input type="radio" id="rd6" name="rd">
                            <label class="tab-label" for="rd6">6. ... ?</label>
                            <div class="tab-content">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil, aut.
                            </div>
                        </div>
                        <div class="tab">
                            <input type="radio" id="rd7" name="rd">
                            <label class="tab-label" for="rd7">7. ... ?</label>
                            <div class="tab-content">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil, aut.
                            </div>
                        </div>
                        <div class="tab">
                            <input type="radio" id="rd8" name="rd">
                            <label for="rd8" class="tab-close">Close others &times;</label>
                        </div>
                    </div>
                    </div> </div>
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