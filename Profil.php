<?php 
require "PHP/config.php";

session_start();

$nom = $_SESSION['nom'];
$prénom = $_SESSION['prénom'];
$mail = $_SESSION['email'];
$adresse= $_SESSION['adresse'];
$tel = $_SESSION['téléphone'];
$type = $_SESSION['userType'];


if(isset($_POST['deconnexion'])){
        session_destroy();
    // ne marche pas 
}
if(!$_SESSION["loggedin"]){
    header('Location: connexion.php');
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
    <link rel="icon" href="image/logo_infinte_measure.png">
    <title>Infinite Measure</title>
</head>

<?php 
        if($_SESSION['userType']=="parent"){
            include("headerParent.php");                  
        }elseif($_SESSION['userType']=="médecin"){
            include("headerMedecin.php");              
        }else{
            include("headerAdmin.php");
        }
?>
<body>
    <div class="contenu ">
        <div class="form-title">
            <div class="text-title">
                <h1>Profil</h1>
                <div class="text">
                    <div class="separation"></div>
                </div>
            </div>
            <div class="profil">
                <div class="encadrer">
                    Type: <?php echo $type ?>
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
                    Prénom: <?php echo $prénom ?>
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