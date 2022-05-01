<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/P_nousContact.css">
    <link rel="stylesheet" href="CSS/responsive.css">
    <script src="https://kit.fontawesome.com/bb762585be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> 
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
                <div class="connect"><a href="P_connexion.html" >connexion</a></div>
                
            </div>
            <button><a href="P_connexion.html"> Connexion</a></button>
        </nav>
    </header>
    <div class="contenu">
        <div class="form-page">
            <div class="form-title">
                <div class="text-title">
                    <h1>Nous Contacter</h1>
                    <div class="text" align="center"> 
                        <div class="separation"></div>
                        <h1>Pour joindre l'adiministrateur,
                                merci de joindre votre email ainsi
                                que votre demande ci-dessous : 
                            </h1>
                    </div>
                </div>
                <div class="formulaire">
                    <form method="post">
                        <div class="mail">
                            <label for="email">Email :</label>
                            <div class="space-mail">
                                <input type="email" name="email" required>
                            </div>
                        </div>
                        <div class="demande">
                            <label for="text">Message :</label>
                            <textarea name="message" required  cols="30" rows="10"></textarea>
                        </div>
                        <div class="bout-connect">
                            <button type="submit"> ENVOYER </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["message"])){
        $retour = mail("appg7d@gmail.com","envoie depuis la page de contact de  ",$_POST["message"],'From: webmaster@monsite.fr' . "\r\n" . 'Reply-to: ' . $_POST['email']);
    }
    
    ?>
    <footer>
        <a href="P_nousContacter.html">Nous contacter</a>
        <a href="">Mention légal</a>
        <a href="">&copy;INFINITE MEASURE</a>
    </footer>
    <script src="app.js"></script>
</body>
</html>