
<header>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/responsive.css">
    <nav>
        <img src="image/logo_infinte_measure.png" alt="">
        <div class="toggle">
            <i class="fa-solid fa-bars ouvrir"></i>
            <i class="fa-solid fa-circle-xmark fermer"></i>
        </div>
        <div class="acc-menu">
            <a href="P_medecin.php">Tableau de bord</a>
            <a href="InscriptionParent.php">Ajout d'un parent</a>
            <a href="InscriptionEnfant.php">Ajout d'un enfant</a>
            <a href="profil.php">Mon compte</a>

            <a class="connect" href="deconnexion.php" >Déconnexion</a>
        </div>

            <input class="button" type="button" onclick="window.location.href='deconnexion.php';" value='Déconnexion'
                style='background:rgb(101, 137, 244); padding:15px;border-radius: 10px;
                border: rgba(48, 48, 48, 0.5) solid 2px;
                box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25);'/>
            
    </nav>
    <script src="app.js">
    </script>

</header>