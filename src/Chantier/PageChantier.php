<?php include('model/DataChantier.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Chantier</title>
    <link rel="icon" type="image/png" href="../homepage/img/InfiniteMeasures.png" />

    <link rel="stylesheet" href="css/Chantier.css" media="screen" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

</head>


<body>


    <div class="container"> 
    <header>
            <div id ="logoimg">
            <a  href="/homepage/homepage.php"><img src="/auth/img/logo_infinite.png" alt="logo"></a>
            </div>  
            <nav>
                <ul class="nav__links">
                    <li><a href="/homepage/homepage.php">Accueil</a></li>
                    <li><a href="/<?php echo $chantier ?>" >Votre chantier</a></li>
                    <li><a href="/forum/forum.php">Forum</a></li>
                    <li><a href="/faq/faq.php">FAQ</a></li>
                    <li><a href="/contact/contact_essai.php">Contactez-nous</a></li>
                    <li><a href="/notre_solution/notre_solution.php">Notre solution</a></li>

                </ul>
            </nav>
            <div id="logomemo">
                <a href="/memory/memory.php"><img src="/memory/img/memoryim.png" alt="memory"></a>
            </div>
            <a class="cta" href= "<?php echo $editprofil?> "> <?php echo $title ?></a>

            <?php
           

           if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
            
            ?>
            <a class="cta" href= "/admin/admin.php">Admin</a>

            <?php }?>
        </header>
        <?php include("views/menu_deroulant_tel.php") ?>
        <div id="sidebar">
            <a class = btn_data href = model/add_data.php> Charger les données </a>
            <div class="noms_onglets">
                <div class="onglets" data-anim="1">
                    <div class="ongletInactif">
                        <h1>Fréquence cardiaque</h1><p><br><br>Dernière valeur : <?php if(isset($lastCard)){ echo $lastCard;} ?> bpm</p>
                    </div>
                </div> 
                <!--La syntaxe "data-" permet de rajouter un attribut qui sera utilisé ensuite avec javascript-->
                <div class="onglets" data-anim="2">
                    <div class="ongletInactif bis">
                        <h1>Niveau de bruit</h1><p><br><br>Dernière valeur : <?php if(isset($lastSon)){echo $lastSon;} ?> dB</p>
                    </div>   
                </div> <!--idem-->
                    <div class="onglets" data-anim="3">
                        <div class="ongletInactif bis">
                            <h1>Température</h1><p><br><br>Dernière valeur : <?php if(isset($lastTemp)){echo $lastTemp;} ?> °C</p>
                        </div> 
                    </div> <!--idem-->
                    <div class="onglets" data-anim="4">
                        <div class="ongletInactif bis">
                            <h1>Taux d'humidité</h1><p><br><br>Dernière valeur : <?php if(isset($lasthum)){echo $lasthum;} ?> %</p>
                        </div> 
                    </div>
                    <div class="onglets" data-anim="5">
                        <div class="ongletInactif bis">
                            <h1>CO2</h1><p><br><br>Dernière valeur : <?php if(isset($lastCO2)){echo $lastCO2;} ?> ppm</p>
                        </div> 
                    </div> <!--idem-->
            </div>

        </div>
        
        <main>
            <div class="contenu activeContenu">
                <div class="imgStat"></div>
                <h2>Statistiques de <?php echo $pseudo; ?></h2>
                <p1><br><br>Dans cette rubrique vous pouvez consulter les différentes statistiques concernant votre chantier, grâce aux différents capteurs disposés sur la HealthBox.</p1>
                <h4><br><br><br><br><br>Seuils :</h4>
                <p><br>Fréquence cardiaque : Si votre fréquence cardiaque est supérieur à 80 bpm, vous avez soit été exposé à une situation de stress ou à un effort important.</p>
                <p><br>Niveau de Bruit : Les sons deviennent nocifs pour l'oreille humaine à partir de 90 dB.</p>
                <p><br>Température : Donnée familière.</p>
                <p><br>CO2 : Considère exposé à la pollution à partir de 800 ppm de CO2 dans l'air.</p>
            </div>    
            <div class="contenu" data-anim="1">
                <!--Classe représentant le contenu de l'onglet 1 (il a donc le même attribut que son titre)-->
                <h3>Votre Fréquence Cardiaque</h3>
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
                <h3>Votre exposition aux bruits</h3>
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
                <h3>La température de votre environnement</h3>
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
                <h3>Votre exposition à l'humidité</h3>
                <hr>
                <div id="graph4">
                    <canvas id="hum"></canvas>
                        <script>
                        //CHANGE
                            var Xhum= <?php echo json_encode($Xhum);?>;    //CHANGE
                            var Yhum= <?php echo json_encode($Yhum);?>; //CHANGE
                            const label2 =Xhum;                         //CHANGE labels aussi 

                            const datahum = {  //CHANGE
                                labels: label2, //CHANGE
                                datasets: [{
                                    label: "taux d'humidité en %", //CHANGE
                                    backgroundColor: 'rgb(0,204,255)',
                                    borderColor: 'rgb(0,204,255)',
                                    data: Yhum, //CHANGE
                                    fill: true,
                                }]
                            };

                            const config3 = {  //CHANGE
                                type: 'line',
                                data: datahum, //CHANGE
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
                            document.getElementById('hum'), //CHANGE
                            config3  //CHANGE
                            );
                        </script>
                </div>   
            </div>

            <div class="contenu" data-anim="5">
                <h3>Votre exposition au CO2</h3>
                <hr>
                <div id="graph5">
                    <canvas id="CO2"></canvas>
                        <script>
                        //CHANGE
                            var XCO2= <?php echo json_encode($XCO2);?>;    //CHANGE
                            var YCO2= <?php echo json_encode($YCO2);?>; //CHANGE
                            const label3 =XCO2;                         //CHANGE labels aussi 

                            const dataCO2 = {  //CHANGE
                                labels: label3, //CHANGE
                                datasets: [{
                                    label: 'taux de CO2 en ppm', //CHANGE
                                    backgroundColor: 'rgb(0,204,255)',
                                    borderColor: 'rgb(0,204,255)',
                                    data: YCO2, //CHANGE
                                    fill: true,
                                }]
                            };

                            const config4 = {  //CHANGE
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
                            const myChart4 = new Chart( //CHANGE
                            document.getElementById('CO2'), //CHANGE
                            config4  //CHANGE
                            );
                        </script>
                </div>   
            </div>

        </main>
        
    </div>
    <script src="js/Chantier.js"></script>
    <footer class="footer">
        <div class="footerContent">
            <div class="row">
                <div class=" footer-col">
                    <img src="/appinfo/auth/img/logo_infinite.png" class="logo">
                    </div>
                <div class=" footer-col">
                    <h4>NAVIGATION</h4>
                    <ul>
                        <li><a href= "/appinfo/homepage/homepage.php">Accueil</a></li>
                        <li><a href= "/appinfo/<?php echo $chantier ?>">Votre chantier</a></li>
                        <li><a href= "/appinfo/forum/forum.php">Forum</a></li>
                        <li><a href= "/appinfo/faq/faq.php">FAQ</a></li>
                        <li><a href= "/appinfo/contact/contact_essai.php">Contactez-nous</a></li>
                        <li><a href= "/appinfo/notre_solution/notre_solution.php">Notre solution</a></li>
                    </ul>
                </div>
                <div class=" footer-col">
                    <h4>PLUS D'INFOS</h4>
                    <ul>
                        <li><a href= "/appinfo/auth/views/inscription.php">Inscription</a></li>
                        <li><a href= "/appinfo/auth/model/connexion.php">Connexion</a></li>
                        <li><a href= "/appinfo/cgu/cgu.php">Mentions Légales</a></li>
                    </ul>
                </div>
                <div class=" footer-col">
                    <h4>SUIVEZ-NOUS</h4>
                    <div class="social-links">
                        <a href= "#"><i class="fab fa-facebook-f"></i></a>
                        <a href= "#"><i class="fab fa-twitter"></i></a>
                        <a href= "#"><i class="fab fa-instagram"></i></a>
                        <a href= "#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    
                </div>
            </div>
        </div> 
    </footer>
</body>
</html>