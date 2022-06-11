<?php
include("model/setup_homepage.php");

echo("test2");

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
echo("$data");
var_dump($data);
var_dump($ch);

$data_tab = str_split($data,33);
echo "Tabular Data:<br />";
for($i=0, $size=count($data_tab); $i<$size; $i++){
echo "Trame $i: $data_tab[$i]<br />";
}

$trame = $data_tab[1];
// décodage avec des substring
$t = substr($trame,0,1);
$o = substr($trame,1,4);
// …
// décodage avec sscanf
list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
echo("<br />$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/homepage.css" media="screen" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="icon" type="image/png" href="img/InfiniteMeasures.png" />

    <title>Tech4Health</title>
</head>
<body>

<?php include("views/header.php"); 

?>

        <main>
            <?php include("views/menu_deroulant_tel.php");?>

		
            <h1> Bienvenue
            <hr/>
            </h1>
            <br>
            <div id="container">
                <div id="enfantimage">
                    <img src="img/eolienne1.png">
                </div>
                <div id="enfanttexte">
                    <div class="boxdetexte">
                    <h2><img src="img/deco1.png" align="left">L'environnement</h2>
                    <p>Soucieux de l'environnement et du développement humain nous avons pensé une solution afin d'agir pour la cause des ouvriers. Les journées de travail sont donc souvent très longues ; souvent plus de 12 heures quotidiennes, quelquefois 15 heures. Ce rythme effréné couplé à de mauvaises conditions de travail peut être fatal pour un homme en développement  </p>
                    </div>
                </div>
    </div>
    <div id="container">
                <div id="enfanttexte">
                    <div class="boxdetexte">
                    <h2>
                    <img src="img/deco2.png" align="left">
                    Les ouvriers ? </h2><br>
                    <p>Bienvenue sur notre site Internet, que vous soyez architecte, maitre d'ouvre ou encore ouvrier alors ce site est fait pour vous ! En effet, notre projet est d'analyser l'impact sur la santé d'un chantier et de ses dérives. Le constat est sans appel, les conditions de travail sont en désaccord avec les droits humains à l'image des dérives au Qatar avec la création des stades. Inscrivez -vous sur notre site Internet afin d'avoir un aperçu des statistiques de votre chantier.</p>
                    </div>
                </div>
                <div id="enfantimage">
                    <img src="img/chantier1.png">
                </div>
            </div>

    <h1>
        Nos services
        <hr />
    </h1>
<br>
    <div id="containerpartie2">

        <div class="chantier">
            <img src="img/grues.jpg" alt="">
            <h2>Votre chantier</h2>
            <p>Accéder à cette section pour découvrir les informations sur votre chantier : Localisation, les dates & la nature du chantier.</p>
            <a class = btn_forum href = "/<?php echo $chantier ?>">Accès au chantier</a>

        </div>


        <div class="stats">
            <img src="img/stats2.jpg" alt="">
            <h2>Statistiques</h2>
            <p>Accéder à cette page afin de constater les statistiqes de votre chantier, l'environnement de travail des ouvriers est notre priorité.</p>
            <a class = btn_forum href = "/<?php echo $chantier ?>">Accès aux statistiques</a>

        </div>
    

        <div class="forum" >
            <img src="img/forum.jpg" alt="">

            <h2>Forum</h2>
            <p>Sur cette page, vous trouverez un ensemble de questions-réponses pour différents sujets.</p>
            <a class = btn_forum href = "/forum/forum.php">Accès au forum</a>

        </div>
    </div>
    </main> 
</body>

<?php include ("views/footer.php");?>

<script src = js/homepage.js></script>


</html>