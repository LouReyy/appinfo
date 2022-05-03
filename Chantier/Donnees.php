
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

$tempTable=getTable($values_temp,'temperature');//table température
$type=$tempTable[2][0];
$try=array(array(0,'temperature'));
for ($i=1;$i<count($tempTable);$i++){
    $try[$i]= array($i+2,$tempTable[$i][1]);
}
echo ($try[1][0]);



$test= array(array($tempTable[0][0],'temperature'),array($tempTable[1][0],10),array($tempTable[2][0],20),array($tempTable[3][0],30));

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
      var testTable=<?php echo json_encode($test);?>;
      console.log(table);
      console.log(testTable);


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
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
    
</body>
</html>