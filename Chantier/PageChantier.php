<?php include('DataChantier.php') ?>
<?php

session_start(); 

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

                </ul>
            </nav>
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
        </div>

        <div class="contenu activeContenu" data-anim="1">
            <!--Classe représentant le contenu de l'onglet 1 (il a donc le même attribut que son titre)-->
            <h3>Votre Fréquence Cardiaque</h3>
            <hr>
            <p>Graphique de la fréquence cardiaque</p>
            
            <div id="graph1">
                <canvas id="card"></canvas>
                <script>
                    var table= <?php echo json_encode($cardTable);?>; 
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
                        }]
                    };

                    const config = {
                        type: 'line',
                        data: data,
                        options: {
                            scales: {
                                tension: 1,
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
            <p>Niveau de bruit en dB</p>
            <div id="graph2">
            <canvas id="son"></canvas>
                    <script>
                        var sonTable= <?php echo json_encode($sonTable);?>; 
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
            <p>On affiche la température et son évolution</p>
            <div id="graph3">
                <canvas id="temp"></canvas>
                    <script>
                        var tempTable= <?php echo json_encode($tempTable);?>; 
                        var Xtemp= <?php echo json_encode($Xtemp);?>;
                        var Ytemp= <?php echo json_encode($Ytemp);?>; 
                        const labels =Xtemp;

                        const dataTemp = {
                            labels: labels,
                            datasets: [{
                                label: 'Température',
                                backgroundColor: 'rgb(0,204,255)',
                                borderColor: 'rgb(0,204,255)',
                                data: Ytemp,
                            }]
                        };

                        const config1 = {
                            type: 'line',
                            data: dataTemp,
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
                        const myChart1 = new Chart(
                        document.getElementById('temp'),
                        config1
                        );
                    </script>
            </div>   
    </div>
    <script src="Chantier.js"></script>
</body>
</html>