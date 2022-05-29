<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style_capteur.css">
    <script src="https://kit.fontawesome.com/bb762585be.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/responsive.css">
    <title>Infinite Measure</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>


<body>
    <div class="container"> 
        <header>
            
            <nav>
                <img src="image/logo_infinte_measure.png" alt="">
                
                <div class="acc-menu">
                    <a href="Index.php">Accueil</a>
                    <a href="donnee_capteur.html">Données Capteurs</a>
                    <a href="P_faq.html">FAQ</a>
                    <a href="applilud.html">Application Ludique</a>
                    <a href="Profil.html">Mon compte</a>
                    
                </div>
                <button style='background:rgb(101, 137, 244); padding:15px;
                    border: rgba(48, 48, 48, 0.5) solid 2px;
                    box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25);'
                ><a href="connexion.php" style='text-decoration:none;color:black;'> Connexion</a></button>
            </nav>
        </header>

            <div id="sidebar">
                <div class="noms_onglets">
                    <div class="onglets" data-anim="1">
                        <div class="ongletInactif">
                            <h1>Fréquence cardiaque</h1><p><br><br>Dernière valeur : <?php echo $lastCard; ?> Bpm</p>
                        </div>
                    </div> 
                    <!--La syntaxe "data-" permet de rajouter un attribut qui sera utilisé ensuite avec javascript-->
                    <div class="onglets" data-anim="2">
                        <div class="ongletInactif bis">
                            <h1>Niveau sonore</h1><p><br><br>Dernière valeur : <?php echo $lastSon; ?> dB</p>
                        </div>   
                    </div> <!--idem-->
                        <div class="onglets" data-anim="3">
                            <div class="ongletInactif bis">
                                <h1>Température</h1><p><br><br>Dernière valeur : <?php echo $lastTemp; ?> °C</p>
                            </div> 
                        </div> <!--idem-->
                        <div class="onglets" data-anim="4">
                            <div class="ongletInactif bis">
                                <h1>CO2</h1><p><br><br>Dernière valeur : <?php echo $lastCO2; ?> ppm</p>
                            </div> 
                        </div> <!--idem-->
                </div>

            </div>
            
            <main>
                <div class="contenu activeContenu">
                    <div class="imgStat"></div>
                    <h2>Statistiques de <?php echo $prénom; ?></h2>
                    <p1><br><br><br><br><br>Consultez les données de votre enfants en direct via cette rubrique</p1>
                    <h4><br><br><br><br><br><br><br><br><br><br><br>Seuils :</h4>
                    <p><br>Fréquence cardiaque : La fréquence cardiaque de votre enfant devrait être entre 90 Bpm et 190 Bpm</p>
                    <p><br>Niveau sonore : Le niveau sonore est sans risque en dessous de 90 dB.</p>
                    <p><br>Température : La temprérature ambiante idéale se situe entre 18°C et 22°C</p>
                    <p><br>CO2 : Le niveau de CO2 est trop élevé à partir de 800 ppm de CO2 dans l'air.</p>
                </div>    
                <div class="contenu" data-anim="1">
                    <!--Classe représentant le contenu de l'onglet 1 (il a donc le même attribut que son titre)-->
                    <h3>Fréquence Cardiaque de <?php echo $prénom; ?></h3>
                    <hr>
                    
                    <div id="graph1">
                        <canvas id="card"></canvas>
                        <script> 
                            var Xcard= <?php echo json_encode($Xcard);?>;
                            var Ycard= <?php echo json_encode($Ycard);?>;
                            const hor =Xcard;

                            const data = {
                                labels: hor,
                                datasets: [{
                                    label: 'Fréquence cardique en bpm',
                                    backgroundColor: 'rgb(0,204,255)',
                                    borderColor: 'rgb(0,204,255)',
                                    data: Ycard,
                                    fill: true,
                                }]
                            };

                            const config = {
                                type: 'line',
                                data: data,
                                options: {
                                    scales: {
                                        tension: 0.4,
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            };
                        </script>
                        <script>
                            const myChart = new Chart(
                            document.getElementById('card'),
                            config
                            );
                        </script>
                    </div>
                </div>
                <div class="contenu" data-anim="2">
                    <!--Classe représentant le contenu de l'onglet 2 (il a donc le même attribut que son titre)-->
                    <h3>Niveau sonore dans la chambre</h3>
                    <hr>
                    <div id="graph2">
                    <canvas id="son"></canvas>
                            <script>
                                var Xson= <?php echo json_encode($Xson);?>;
                                var Yson= <?php echo json_encode($Yson);?>; 
                                const horSon =Xson;

                                const dataSon = {
                                    labels: horSon,
                                    datasets: [{
                                        label: 'Intensité sonore en dB',
                                        backgroundColor: 'rgb(0,204,255)',
                                        borderColor: 'rgb(0,204,255)',
                                        data: Yson,
                                        fill: true,
                                    }]
                                };

                                const config2 = {
                                    type: 'line',
                                    data: dataSon,/////////
                                    options: {
                                        tension: 0.4,
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                };
                            </script>
                            <script>
                                const myChart2 = new Chart(
                                document.getElementById('son'),
                                config2
                                );
                            </script>
                    </div>  
                </div> 

                <div class="contenu" data-anim="3">
                    <!--Classe représentant le contenu de l'onglet 3 (il a donc le même attribut que son titre)-->
                    <h3>La température dans la chambre</h3>
                    <hr>
                    <div id="graph3">
                        <canvas id="temp"></canvas>
                            <script>
                                //CHANGE
                                var Xtemp= <?php echo json_encode($Xtemp);?>;    //CHANGE
                                var Ytemp= <?php echo json_encode($Ytemp);?>; //CHANGE
                                const labels =Xtemp;                         //CHANGE labels aussi 

                                const dataTemp = {  //CHANGE
                                    labels: labels, //CHANGE
                                    datasets: [{
                                        label: 'Température en degré', //CHANGE
                                        backgroundColor: 'rgb(0,204,255)',
                                        borderColor: 'rgb(0,204,255)',
                                        data: Ytemp, //CHANGE
                                        fill: true,
                                    }]
                                };

                                const config1 = {  //CHANGE
                                    type: 'line',
                                    data: dataTemp, //CHANGE
                                    options: {
                                        tension: 0.4,
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                };
                            </script>
                            <script>
                                const myChart1 = new Chart( //CHANGE
                                document.getElementById('temp'), //CHANGE
                                config1  //CHANGE
                                );
                            </script>
                    </div>   
                </div>
                <div class="contenu" data-anim="4">
                    <h3>Niveau de CO2</h3>
                    <hr>
                    <div id="graph3">
                        <canvas id="CO2"></canvas>
                            <script>
                            //CHANGE
                                var XCO2= <?php echo json_encode($XCO2);?>;    //CHANGE
                                var YCO2= <?php echo json_encode($YCO2);?>; //CHANGE
                                const label2 =XCO2;                         //CHANGE labels aussi 

                                const dataCO2 = {  //CHANGE
                                    labels: label2, //CHANGE
                                    datasets: [{
                                        label: 'taux de CO2 en ppm', //CHANGE
                                        backgroundColor: 'rgb(0,204,255)',
                                        borderColor: 'rgb(0,204,255)',
                                        data: YCO2, //CHANGE
                                        fill: true,
                                    }]
                                };

                                const config3 = {  //CHANGE
                                    type: 'line',
                                    data: dataCO2, //CHANGE
                                    options: {
                                        tension: 0.4,
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                };
                            </script>
                            <script>
                                const myChart3 = new Chart( //CHANGE
                                document.getElementById('CO2'), //CHANGE
                                config3  //CHANGE
                                );
                            </script>
                    </div>   
                </div>

            </main>
    </div>
    <script src="Data.js"></script>

    
        
    


            <footer>
                <a href="P_nousContacter.php">Nous contacter</a>
                <a href="mentions_légales.html">Mentions légales</a>
                <a href="">&copy;INFINITE MEASURE</a>
            </footer>
            <script src="app.js"></script>
</body>
</html>
