
<?php
$conn=mysqli_connect('localhost','root','','appinfo');
if (!$conn){
    echo 'Connection error: ' . mysqli_connect_error();

}
//La connexion fonctionne
$req_temp='SELECT Time,Valeur FROM `capteur_table` WHERE id_utilisateur=1 AND type="temp";';
$result=mysqli_query($conn,$req_temp);
$values_temp=mysqli_fetch_all($result, MYSQLI_ASSOC);

function getTable($table,$type){  //fonction pour créer un tableau qu'on va utiliser pour afficher la courbe
    $newTable= array(array('Time',$type));
    for ($i=1;$i<count($table);$i++){
        $newTable[$i]=array($table[$i]['Time'], floatval($table[$i]['Valeur']));
    }
    return $newTable;
}
function getX($table){
    $newTable= array();
    for ($i=1;$i<count($table);$i++){
        $newTable[$i]=$table[$i]['Time'];
    }
    return $newTable;
}
function getY($table){
    $newTable= array();
    for ($i=1;$i<count($table);$i++){
        $newTable[$i]=floatval($table[$i]['Valeur']);
    }
    return $newTable;
}

$tempTable=getTable($values_temp,'temperature'); $Xtemp=getX($values_temp); $Ytemp=getY($values_temp);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graph</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      var table=<?php echo json_encode($tempTable);?>;
      console.log(table);


      function drawChart() {
        var data = google.visualization.arrayToDataTable(table);

        var options = {
          title: 'Graphique',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
</head>
<body>
    <canvas id="graph1"></canvas>
    <div id="curve_chart" style="width: 900px; height: 500px"></div> 
</body>
</html>