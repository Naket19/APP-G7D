
<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/P_mentions_légales.css">
        <link rel="stylesheet" href="CSS/P_accueil.css">
        <script src="https://kit.fontawesome.com/bb762585be.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="stylesheet" href="CSS/responsive.css">
        <link rel="icon" href="image/logo_infinte_measure.png">
        <title>Infinite Measure</title>
    </head>

    <?php   if(isset($_SESSION['loggedin'])){
            if($_SESSION['userType']=="parent"){        
             include("headerParent.php");
            }else{
                include("headerMedecin.php");
            }
        }else{
            include("header.php");
        }

?>

<body>
    <div class="contenu">
        <div class="barre-verticale">
            <li onclick="document.getElementById('service').style.display='block';
            document.getElementById('objet').style.display='none';
            document.getElementById('hebergeur').style.display='none';
            document.getElementById('information').style.display='none';
            document.getElementById('limitation').style.display='none';
            document.getElementById('liberte').style.display='none';"
            >Présentation du service</li>

            <li onclick="document.getElementById('service').style.display='none';
            document.getElementById('objet').style.display='none';
            document.getElementById('hebergeur').style.display='block';
            document.getElementById('information').style.display='none';
            document.getElementById('limitation').style.display='none';
            document.getElementById('liberte').style.display='none';"
            >1. Hébergeur</li>

            <li onclick="document.getElementById('service').style.display='none';
            document.getElementById('objet').style.display='block';
            document.getElementById('hebergeur').style.display='none';
            document.getElementById('information').style.display='none';
            document.getElementById('limitation').style.display='none';
            document.getElementById('liberte').style.display='none';"
            >2. Objet</li>

            <li onclick="document.getElementById('service').style.display='none';
            document.getElementById('objet').style.display='none';
            document.getElementById('hebergeur').style.display='none';
            document.getElementById('information').style.display='block';
            document.getElementById('limitation').style.display='none';
            document.getElementById('liberte').style.display='none';"
            >3. Information d'ordre technique</li>

            <li onclick="document.getElementById('service').style.display='none';
            document.getElementById('objet').style.display='none';
            document.getElementById('hebergeur').style.display='none';
            document.getElementById('information').style.display='none';
            document.getElementById('limitation').style.display='block';
            document.getElementById('liberte').style.display='none';"
            >4. Limitation de responsabilité</li>

            <li onclick="document.getElementById('service').style.display='none';
            document.getElementById('objet').style.display='none';
            document.getElementById('hebergeur').style.display='none';
            document.getElementById('information').style.display='none';
            document.getElementById('limitation').style.display='none';
            document.getElementById('liberte').style.display='block';"
            >5. Informatique et libertés</li>
        </div>
        <div class="form-page">
            <div class="form-title">
                    
                    <h1>MENTIONS LEGALES</h1>
                    <div class="separation"></div>
                    <div id="service" class="service">
                        <h2>PRESENTATION DU SERVICE</h2>
                        <p>www.infinitemeasures.fr est un site Internet 
                            exploité par la société HEXANSWERS 
                            (en cours de formation ) au capital de 1000 euros,
                            représenté par M Stanislas, Président – infinitemeasuresfr@gmail.com 
                            HEXANSWERS SAS (Dorénavant « Société ») 
                            a son siège social au 28 Rue Notre Dame des Champs, 75006 Paris.</p>
                    </div>
                    <div id="hebergeur" class="hebergeur">
                        <h2>1. HEBERGEUR</h2>
                        <p>OVH. RCS Lille Métropole 424 761 419 00045Code APE 2620ZN° TVA : FR 22 424 761 419Siège social : 2 rue Kellermann - 59100 Roubaix - France.</p>
                    </div>

                    <div id="objet" class="objet">
                        <h2>2. OBJET</h2>
                        <p>La présente notice a pour objet de définir les modalités selon lesquelles la Société met à la disposition des internautes son site Internet www.infinitemeasures.fr et les conditions selon lesquelles les internautes accèdent et utilisent ce site Internet. Toute connexion au Site www.infinitemeasures.fr est subordonnée au respect de la présente notice légale que la Société se réserve de modifier ou de mettre à jour à tout moment.</p>
                    </div>
                    <div id="information" class="information">
                        <h2>3. INFORMATIONS D’ORDRE TECHNIQUE</h2>
                        <p>Vous reconnaissez disposer de la compétence et des moyens nécessaires pour accéder à ce Site et l’utiliser, et avoir vérifié que la configuration informatique utilisée ne contient aucun virus et qu’elle est en parfait état de fonctionnement. Le présent site est accessible 24 heures sur 24 et 7 jours sur 7, à l’exception des cas de force majeure, difficultés informatiques, difficultés liées à la structure des réseaux de communications ou difficultés techniques. Pour des raisons de maintenance, la Société pourra interrompre le site et s’efforcera de vous en avertir préalablement.</p>
                    </div>
                    <div id="limitation" class="limitation">
                        <h2>4. LIMITATION DE RESPONSABILITE</h2>
                        <p>Les documents et informations diffusés sur ce site sont fournis » en l’état » sans aucune garantie expresse ou tacite de quelque sorte que ce soit. La Société se réserve le droit de modifier ou de corriger le contenu de son site à tout moment, sans préavis. La Société ne pourra être tenu pour responsable en cas de contamination des matériels informatiques des internautes résultant de la propagation d’un virus ou autres infections informatiques. Les photographies et les textes reproduits sur le site www.infinitemeasures.fr le sont à titre purement indicatif et ne sauraient avoir une valeur contractuelle. La responsabilité de la Société ne saurait être engagée si une erreur s’est glissée dans l’une de ces photographies ou l’un de ces textes.</p>
                    </div>
                    <div id="liberte" class="liberte">
                        <h2>5. INFORMATIQUE ET LIBERTÉS</h2>
                        <p>La Société dispose de moyens informatiques destinés à gérer plus facilement les commandes et la promotion de ses produits. Les informations enregistrées sont réservées à l’usage du traitement des commandes et à la promotion. Conformément aux articles 39 et suivants de la loi n° 78-17 du 6 janvier 1978 modifiée en 2004 relative à l’informatique, aux fichiers et aux libertés, toute personne peut obtenir communication et, le cas échéant, rectification ou suppression des informations la concernant, en s’adressant à infinitemeasuresfr@gmail.com.</p>
                    </div>
            </div>
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