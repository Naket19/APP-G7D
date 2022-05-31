<?php
require "PHP/config.php";
$link = DbConnect();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userId = $_SESSION['idUser'];
    $email = $_POST["newEmail"];
    $oldmot_de_passe = $_POST["oldmdp"];
    $mot_de_passe = $_POST["mot_de_passe"];
    $mot_de_passe1 = $_POST["newmdp1"];

      
    $stmt = $link->prepare("SELECT * FROM utilisateur WHERE email=? AND idUser <> ?");
    $stmt->execute([$email,$userId]); 
    $validEmail = $stmt->fetch(); 

    $req1 = $link->prepare("SELECT * FROM utilisateur WHERE idUser = ?");
    $req1->execute([$_SESSION['idUser']]);
    $req_user = $req1->fetch();

    if (isset($_POST['newEmail'],$_POST['oldmdp'], $_POST['mot_de_passe'], $_POST['newmdp1'])) {

        if (empty($_POST['newEmail']) ||empty($_POST['oldmdp']) ||empty($_POST['mot_de_passe']) || empty($_POST['newmdp1'])) {
            echo "Veuillez remplir tous les champs";
        }elseif (!filter_var(trim($_POST['newEmail']), FILTER_VALIDATE_EMAIL)) {           
            echo filter_var(trim($_POST['newEmail']), FILTER_VALIDATE_EMAIL);
            echo "Veuillez ecrire un mail valide";
        } elseif ($validEmail) {
            echo "Le mail est deja utilisé";
        } elseif($req_user['mot_de_passe'] <> md5($oldmot_de_passe)) {
            echo "L'ancien mot de passe est incorrecte";
        }elseif($mot_de_passe <> $mot_de_passe1 ){
            echo "Le mot de passe et le mot de passe de confirmation sont different";
        }elseif($oldmot_de_passe==$mot_de_passe){
            echo "Le mot de passe doit être différent de l'ancien";
        }else{
            $statement = $link->prepare("UPDATE utilisateur SET email= ? , mot_de_passe= ? WHERE idUser = ? ") ;
            $result = $statement->execute([$email, md5($mot_de_passe),$req_user['idUser']]);
            if ($result) {
                echo "c'est bon";
                header('Location: Profil.php');
            } else {
               // print $link->error;
            }
        }
    }
}



if (isset($_POST['deconnexion'])) {
    session_destroy();
    // ne marche pas 
}
if (!$_SESSION["loggedin"]) {
    header('Location: connexion.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/P_inscription.css">
    <script src="https://kit.fontawesome.com/bb762585be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/responsive.css">
    <link rel="icon" href="image/logo_infinte_measure.png">
    <title>Modifier le profil</title>
</head>

<?php
if ($_SESSION['userType'] == "parent") {
    include("headerParent.php");
} elseif ($_SESSION['userType'] == "médecin") {
    include("headerMedecin.php");
} else {
    include("headerAdmin.php");
}
?>

<body>
    <div class="F_contenu">
        <h1>Edition du profil</h1>
            <table>
                <form method="post" action="modifierProfil.php">
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="email" name="newEmail" placeholder="Email">
                    </td>
                </tr>
                <tr>
                    <td><br>
                        <label>Ancien mot de passe</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="oldmdp" placeholder="Mot de passe actuel">
                    </td>
                </tr>
                <tr>
                    <td><br>
                        <label>Nouveau mot de passe</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="mot_de_passe" placeholder="Nouveau mot de passe">
                    </td>
                </tr>
                <tr>
                    <td><br>
                        <label>Confirmer le mot de passe </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="newmdp1" placeholder="Confirmer mot de passe">
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <input type="submit" value="Enregistrer">
                    </td>
                </tr>
                </form>
            </table>
    </div>

</body>

</html>