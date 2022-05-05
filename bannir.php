<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost; dbname=app_g7d_infinite_measure;','root','');
    if(isset($_GET['idParent']) AND !empty($_GET['idParent'])){
        $getid = $_GET['idParent'];
        $recupUser = $bdd->prepare('SELECT * FROM parent WHERE idParent = ?');
        $recupUser->execute(array($getid));
        if($recupUser->rowCount()>0){
            $bannirUser = $bdd->prepare('DELETE FROM parent WHERE idParent = ?');
            $bannirUser->execute(array($getid));
            header('Location: P_admin.php');
        }else{
            echo "Aucun membre n'a été trouvé";
        }
    }else{
        echo "L'identifiant n'a pas été récupéré";
    }
?>