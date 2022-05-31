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
            <a href="Index.php">Accueil</a>
            <a href="P_faq.php">FAQ</a>
            <a href="applilud.html">Application Ludique</a>
            <a class="connect" href="connexion.php" >Connexion</a>
        </div>
            <input class="button" type="button" onclick="window.location.href='connexion.php';"value='Connexion'
                style='background:rgb(101, 137, 244); padding:15px;border-radius: 10px;
                border: rgba(48, 48, 48, 0.5) solid 2px;
                box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25);'/>
            
    </nav>
    <script src="app.js">
        function disconnect() {
            var txt;
            if (confirm("etes vous sur de vouloir vous déconnecter?")) {
                location.replace("deconnexion.php");
            }
        }
    </script>

</header>