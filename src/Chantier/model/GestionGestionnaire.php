<?php include('DataGestionnaire.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PageChantier</title>
    <link rel="stylesheet" href="../css/Chantier.css" media="screen" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>

</head>


<body>


    <div class="container"> 
        <?php include("../views/header.php");
        include("../views/menu_deroulant_tel2.php")  ?>
        <div id="sidebar">
            <div class="noms_onglets">
                <div class="onglets" data-anim="1">
                    <div class="ongletInactif">
                        <h1>Fréquence cardiaque</h1><p><br><br>Dernière valeur : <?php echo $lastCard; ?> bpm</p>
                    </div>
                </div> 
                <!--La syntaxe "data-" permet de rajouter un attribut qui sera utilisé ensuite avec javascript-->
                <div class="onglets" data-anim="2">
                    <div class="ongletInactif bis">
                        <h1>Niveau de bruit</h1><p><br><br>Dernière valeur : <?php echo $lastSon; ?> dB</p>
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
                <h3>Votre exposition au CO2</h3>
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

            <?php echo("test");

$ch = curl_init();
curl_setopt(
$ch,
CURLOPT_URL,
"http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G9-C");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);
echo "Raw Data:<br />";
echo("$data"); ?>

        </main>
        
    </div>
    <script src="../js/Chantier.js"></script>
    <?php include("../views/footer.php")  ?>
</body>
</html>


