<?php include('DataChantier.php') ?>
<?php

session_start(); 

$id= $_SESSION['id'];
echo ($id);
echo($_SESSION['pseudo']);



if(isset($_SESSION['user'])){
        $editprofil ="landing.php";
        $title = "Profil";
    }
    else{
        $editprofil ="index.php";
        $title = "Connexion";

    }

    if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
        $chantier = "Chantier/PageChantier.php";
    }
    else{
        $chantier = "VotreChantier/votrechantier.php";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PageChantier</title>
    <link rel="stylesheet" href="Chantier.css" media="screen" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    </head>


<body>
<header>
            <div id ="logoimg">
            <a  href="/appinfo/homepage/homepage.php"><img src="../auth/logo_infinite.png" alt="logo"></a>
            </div>  
            <nav>
                <ul class="nav__links">
                    <li><a href="/appinfo/homepage/homepage.php">Accueil</a></li>
                    <li><a href="/appinfo/<?php echo $chantier ?>" >Votre chantier</a></li>
                    <li><a href="/appinfo/forum/forum.php">Forum</a></li>
                    <li><a href="/appinfo/faq/faq.php">FAQ</a></li>
                    <li><a href="/appinfo/contact/contact_essai.php">Contactez-nous</a></li>
                    <li><a href="/appinfo/notre_solution/notre_solution.php">Notre solution</a></li>
                    <li><a href="/appinfo/cgu/cgu.php">CGU</a></li>

                </ul>
            </nav>
            <div id="logomemo">
                <a href="/appinfo/memory/memory.php"><img src="../memory/memoryim.png" alt="memory"></a>
            </div>
            <a class="cta" href= "/appinfo/auth/<?php  echo $editprofil?> "> <?php echo $title ?></a>

            <?php
           

           if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
            
            ?>
            <a class="cta" href= "/appinfo/admin/admin.php">Admin</a>

            <?php }?>
        </header>

    <div class="container"> 

        <div class="noms_onglets">
            <div class="onglets active" data-anim="1">
                <div class="Actif">
                <h1>Fréquence cardiaque</h1>
                </div>
            </div> 
            <!--La syntaxe "data-" permet de rajouter un attribut qui sera utilisé ensuite avec javascript-->
            <div class="onglets" data-anim="2">
                <div class="ongletInactif">
                    <h1>Niveau de bruit</h1>
                </div>   
            </div> <!--idem-->
            <div class="onglets" data-anim="3">
                <div class="ongletInactif">
                    <h1>Température</h1>
                </div> 
            </div> <!--idem-->
            <div class="onglets" data-anim="4">
                <div class="ongletInactif">
                    <h1>CO2</h1>
                </div> 
            </div> <!--idem-->
        </div>

        <div class="contenu activeContenu" data-anim="1">
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
    </div>
    <script src="Chantier.js"></script>
</body>
</html>