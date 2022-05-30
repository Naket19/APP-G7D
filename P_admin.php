<?php

    session_start();
    $bdd = new PDO('mysql:host=localhost; dbname=app-g7d;','root','');
    $alluser = $bdd->query('SELECT * FROM utilisateur WHERE userType="parent" OR userType="medecin"  ORDER BY idUser ');
    if(isset($_GET['s']) AND !empty($_GET['s']) ){
        $recherche = htmlspecialchars($_GET['s']);
        $alluser = $bdd->query('SELECT * FROM utilisateur WHERE nom LIKE"%'.$recherche.'%"
        OR prénom LIKE"%'.$recherche.'%" ORDER BY idUser ');
    }
    
    $arrayUser= array();

    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/P_admin.css">
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
                <?php 
                if(isset ($_SESSION["loggedin"])){
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
            if(isset ($_SESSION["loggedin"])){
                ?><a class="mon-compte" href="Profil.php">Mon Compte</a>
                    <input type="button" onclick="disconnect"value='Déonnexion'
                style='background:rgb(101, 137, 244); padding:15px;border-radius: 10px;
                border: rgba(48, 48, 48, 0.5) solid 2px;
                box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25);'/>
            <?php
            } else{
                ?> 
                <input type="button" onclick="window.location.href='connexion.php';"value='Connexion'
                style='background:rgb(101, 137, 244); padding:15px;border-radius: 10px;
                border: rgba(48, 48, 48, 0.5) solid 2px;
                box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25);'/>
                <?php
            }
            ?>
            
        </nav>
    </header>
    <div class="tableau_bord">
        <h1 style='text-align:center;font-size:32px'> Tableau de bord </h1>
        <div class="barre_recherche">
            <form method="GET">
                <input class= 'barre'type="search" name="s" placeholder="recherche un utilisateur">
                <input class='b_envoie' type="submit"name="envoyer">

            </form>
            <div class="afficher_utilisateur">
    
            </div>
        </div>
       <div class="table">
            <div class="Id">
                <h1> ID </h1>
                <div class="ligne2"style='display: flex;
                    height: 2px;background-color: #000;'>
                </div>
                <?php
                    if($alluser->rowCount()>0){
                        while($r_user = $alluser->fetch()){
                            ?>
                            
                            <P><?= $r_user['idUser'];?><div class="ligne2" style='display: flex;
                                height: 2px;background-color: #000;'></div>
                            </P>
                            
                            <?php
                            $arrayUser[]=$r_user['idUser'];
                        }
                    }else {
                        ?>
                        <p>vide</p>
                        <?php
                    }
                ?>
            </div>
            <div class="Type">
                <h1>Type </h1>
                <div class="ligne2"style='display: flex;
                    height: 2px;background-color: #000;'>
                </div>
                <?php
                     $alluser1 = $bdd->query('SELECT * FROM utilisateur WHERE userType="parent" OR userType="medecin" ORDER BY idUser ');
                     if(isset($_GET['s']) AND !empty($_GET['s']) ){
                         $recherche = htmlspecialchars($_GET['s']);
                         $alluser1 = $bdd->query('SELECT * FROM utilisateur WHERE nom LIKE"%'.$recherche.'%" 
                         OR prénom LIKE"%'.$recherche.'%" ORDER BY idUser');
                     }
                 
                    if($alluser1->rowCount()>0){
                        while($r_userS = $alluser1->fetch()){
                            ?>
                            <P> <?= $r_userS['userType'];?> 
                                <div class="ligne2" style='display: flex;
                                height: 2px;background-color: #000;'></div>
                            </P>
                            <?php
                        }
                    }else {
                        ?>
                        <p>vide</p>
                        <?php
                    }
                ?>
            </div>
            <div class="nom">
                <h1>Nom </h1>
                <div class="ligne2"style='display: flex;
                    height: 2px;background-color: #000;'>
                </div>
                <?php
                     $alluser1 = $bdd->query('SELECT * FROM utilisateur WHERE userType="parent" OR userType="medecin" ORDER BY idUser ');
                     if(isset($_GET['s']) AND !empty($_GET['s']) ){
                         $recherche = htmlspecialchars($_GET['s']);
                         $alluser1 = $bdd->query('SELECT * FROM utilisateur WHERE nom LIKE"%'.$recherche.'%" 
                         OR prénom LIKE"%'.$recherche.'%" ORDER BY idUser');
                     }
                 
                    if($alluser1->rowCount()>0){
                        while($r_userS = $alluser1->fetch()){
                            ?>
                            <P> <?= $r_userS['nom'];?> <?= $r_userS['prénom'];?>
                                <div class="ligne2" style='display: flex;
                                height: 2px;background-color: #000;'></div>
                            </P>
                            <?php
                        }
                    }else {
                        ?>
                        <p>vide</p>
                        <?php
                    }
                ?>
            </div>
            <div class="bannir">
                <h1>Bannir </h1>
                <div class="ligne2"style='display: flex;
                    height: 2px;background-color: #000;'>
                </div>
                <?php
                     $alluser2 = $bdd->query('SELECT * FROM utilisateur WHERE userType="parent" OR userType="medecin" ORDER BY idUser ');
                     if(isset($_GET['s']) AND !empty($_GET['s']) ){
                         $bannir = htmlspecialchars($_GET['s']);
                         $alluser2 = $bdd->query('SELECT * FROM utilisateur WHERE nom LIKE"%'.$bannir.'%" OR 
                         prénom LIKE"%'.$bannir.'%" ORDER BY idUser ');
                     }
                 
                    if($alluser2->rowCount()>0){
                        while($r_user2 = $alluser2->fetch()){
                            ?>
                            <P> <a href="bannir.php?idUser=<?= $r_user2['idUser'];?>" style="color:red;
                            text-decoration: none;"> Bannir le membre</a>
                            <div class="ligne2" style='display: flex;
                                height: 2px;background-color: #000;'></div>
                            </P>
                            <?php
                        }
                    }else {
                        ?>
                        <p>vide</p>
                        <?php
                    }
                ?>
            </div>
            <div class="consulter">
                <h1>Consulter </h1>
                <div class="ligne2"style='display: flex;
                    height: 2px;background-color: #000;'>
                </div>
                <?php
                     $alluser2 = $bdd->query('SELECT * FROM utilisateur WHERE userType="parent" OR userType="medecin" ORDER BY idUser ');
                     if(isset($_GET['s']) AND !empty($_GET['s']) ){
                         $bannir = htmlspecialchars($_GET['s']);
                         $alluser2 = $bdd->query('SELECT * FROM utilisateur WHERE nom LIKE"%'.$bannir.'%" OR 
                         prénom LIKE"%'.$bannir.'%" ORDER BY idUser ');
                     }
                 
                    if($alluser2->rowCount()>0)
                    {
                        $i=0;
                        while($r_user2 = $alluser2->fetch())
                        {
                            echo '<a href="consulter.php?idUser= '.$arrayUser[$i].'" style="color:red; text-decoration: none;"><p> consulter le profil</a></p>';
                            echo '<div class="ligne2" style="display: flex; height: 2px;background-color: #000;"></div>';
                            $i++;
                            
                             
                        }
                    }else {
                        
                        echo '<p>vide</p>';
                        
                    }
                ?>
            </div>
        </div>
        <div class="bout">
        <a href="inscriptionParent.php"style="color:black;
        text-decoration:none;"> Ajouter un utilisateur</a>
        
        </div>
        
    </div>

    <!-- <footer>
        <a href="P_nousContacter.php">Nous contacter</a>
        <a href="mentions_légales.php">Mentions légales</a>
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