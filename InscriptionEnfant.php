<?php
session_start();
require "PHP/config.php";
$link = DbConnect();
if(!$_SESSION["loggedin"]){
    header('Location: connexion.php');
}
//Verification des champs

function mediaParent(){

    $link = DbConnect();
    $statement = $link->prepare("SELECT * FROM utilisateur");
    $statement->execute();

    $ans = $statement->setFetchMode(PDO::FETCH_ASSOC);

    while($state = $statement->fetch()){
        extract($state);
        echo "<option value='$idUser'>Nom : $nom | Prénom : $prénom | Email : $email</option>";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST["nom"];
    $prénom = $_POST["prénom"];
    $date_de_naissance = $_POST["date_de_naissance"];
    $numéro_de_chambre = $_POST["numéro_de_chambre"];
    $description = $_POST["description"];  
    $parent = $_POST["parent"];
    $headers ="";




    if (isset($_POST['nom'], $_POST['prénom'], $_POST["date_de_naissance"], $_POST["numéro_de_chambre"],$_POST["description"] )) {
        if (empty($_POST['nom']) || empty($_POST['prénom']) || empty($_POST["date_de_naissance"]) || empty($_POST["numéro_de_chambre"]) || empty($_POST["description"])) {
            echo "Veuillez remplir tous les champs";
        } elseif (!preg_match('/[a-zA-Z]+$/', trim($_POST['nom']))) {
            echo "Veuillez ecrire le nom seulent en lettre minuscile et majuscule";
        } elseif (!preg_match('/[a-zA-Z]+$/', trim($_POST['prénom']))) {
            echo "Veuillez ecrire le prénom seulent en lettre minuscile et majuscule";
        }     
        elseif (!preg_match('/[0-9]+$/', trim($_POST['numéro_de_chambre']))) {
            echo "Veuillez indiquer un numéro de chambre valide";
        }
        
        else {

            $statement = $link->prepare("INSERT INTO patient (nom, prénom, date_de_naissance ,numéro_de_chambre, description, idUser ) VALUES(?, ?, ?, ?, ?,?)");
            $result =$statement->execute( [$nom, $prénom, $date_de_naissance, $numéro_de_chambre, $description, $parent]);
            if ($result) {
                echo "Enfant ajouter ";
                //header('Location: P_admin.php');
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
    <link rel="icon" href="image/logo_infinte_measure.png">
    <script src="script.js" defer></script>
    <title>Mon site - Ajout d'enfant</title>
</head>
<?php include("headerMedecin.php")   ?>

<body>
    
    <div class="F_contenu">
        <div class="text-title">
            <h1>Ajout d'un enfant</h1>
            <div class="text">
                <div class="separation"></div>
            </div>
        </div>

        <form method="post" action="InscriptionEnfant.php">
            <div class="champ">
                Parent : <select name="parent" >
                <?php
                  
                    mediaParent();
                ?>
                </select>

            </div>
            <div class="champ">
                <br><input type="text" name="nom" class="input" placeholder="Nom">
            </div>
            <div class="champ">
                <input type="text" name="prénom" class="input" placeholder="Prénom">
            </div>
            <div class="champ">
                <input type="date" name="date_de_naissance" class="input" placeholder="Jour-Mois-Année">
            </div>
            <div class="champ">
                <input type="text" name="numéro_de_chambre" class="input" placeholder="Numéro de la chambre">
            </div>
            <div class="champ">
                <input type="text" name="description" class="input" placeholder="Description">
            </div>
            <div class="champ">
                <button type="submit">Ajouter un enfant</button>
            </div>
        </form>
    </div>
    <!-- <footer>
        <a href="P_nousContacter.php">Nous contacter</a>
        <a href="mentions_légales.html">Mentions légales</a>
        <a href="">&copy;INFINITE MEASURE</a>
    </footer> -->
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