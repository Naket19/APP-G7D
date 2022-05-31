<?php

session_start();


$bdd = new PDO('mysql:host=localhost; dbname=app-g7d;', 'root', '');
$alluser = $bdd->query('SELECT * FROM utilisateur WHERE userType="parent"  ORDER BY idUser ');
if (isset($_GET['s']) and !empty($_GET['s'])) {
    $recherche = htmlspecialchars($_GET['s']);
    $alluser = $bdd->query('SELECT * FROM utilisateur WHERE nom LIKE"%' . $recherche . '%"
        OR prénom LIKE"%' . $recherche . '%" ORDER BY idUser ');
}

$arrayUser = array();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/P_medecin.css">
    <script src="https://kit.fontawesome.com/bb762585be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/responsive.css">
    <link rel="icon" href="image/logo_infinte_measure.png">
    <title>Infinite Measure</title>
</head>

    <?php include("headerMedecin.php")   ?>

<body>
    <div class="border">
        <div class="slt">
        <p> Bonjour <?php echo $_SESSION['nom']." ".$_SESSION['prénom']; ?> ! </p>
        </div>
        <div class="barre_recherche">
            <form method="GET">
                <input class='barre' type="search" name="s" placeholder="recherche un utilisateur">
                <input class='b_envoie' type="submit" name="envoyer" value="Rechercher">

            </form>
            <div class="afficher_utilisateur">

            </div>
        </div>

        <table>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th> Consulter Profils</th>
                <th> Bannir Profils</th>

            </tr>
            <?php
            if ($alluser->rowCount() > 0) {

                $i = 0;
                while ($r_userS = $alluser->fetch()) {
                    $arrayUser[] = $r_userS['idUser'];
            ?>
                    <tr>
                        <td><?= $r_userS['nom']; ?></td>
                        <td> <?= $r_userS['prénom']; ?></td>
                        <td> <?php echo '<a href="consulter.php?idUser= ' . $arrayUser[$i] . '" style="color:red; text-decoration: none;"><p> consulter le profil</a></p>'; ?>
                        <td><a href="bannir.php?idUser=<?= $r_userS['idUser']; ?>" style="color:red;
                            text-decoration: none;"> Bannir le membre</a>

                            <?php $i++; ?>
                    </tr>
                <?php
                }
            } else {
                ?>

                <td>vide</td>
                <td>vide</td>
                <td>vide</td>
                <td>vide</td>
            <?php
            }
            ?>
        </table>
    </div>
    <footer>
        <a href="P_nousContacter.php">Nous contacter</a>
        <a href="mentions_légales.php">Mentions légales</a>
        <a href="">&copy;INFINITE MEASURE</a>
    </footer>
    <script src="app.js">
        function disconnect() {
            var txt;
            if (confirm("etes vous sur de vouloir vous déconnecter?")) {
                location.replace("deconnexion.php");
            }
        }
    </script>
</body>

</html>