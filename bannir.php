<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost; dbname=app-g7d;','root','');
    if(isset($_GET['idUser']) AND !empty($_GET['idUser'])){
        $getid = $_GET['idUser'];
        $recupEnfant = $bdd->prepare('SELECT * FROM patient WHERE idUser = ?');
        $recupUser = $bdd->prepare('SELECT * FROM utilisateur WHERE idUser = ?');
        $recupUser->execute(array($getid));
        if($recupUser->rowCount()>0){
            $bannirEnfant = $bdd->prepare('DELETE FROM patient WHERE idUser = ?');
            $bannirEnfant->execute(array($getid));
            $bannirUser = $bdd->prepare('DELETE FROM utilisateur WHERE idUser = ?');
            $bannirUser->execute(array($getid));
            header('Location: P_admin.php');
        }else{
            echo "Aucun membre n'a été trouvé";
        }
    }else{
        echo "L'identifiant n'a pas été récupéré";
    }
?>