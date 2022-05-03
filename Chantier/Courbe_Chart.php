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
function tableX($table){
    $newTable= array();
    for ($i=1;$i<count($table);$i++){
        $newTable[$i-1]=$table[$i]['Time'];
    }
    return $newTable;
}
function tableY($table){
    $newTable= array();
    for ($i=1;$i<count($table);$i++){
        $newTable[$i-1]=floatval($table[$i]['Valeur']);
    }
    return $newTable;
}

$tempTable=getTable($values_temp,'temperature'); $Xtemp=tableX($values_temp); $Ytemp=tableY($values_temp);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart js</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
</head>
<body>
    <canvas id="temp"></canvas>
    <script>
    var table= <?php echo json_encode($tempTable);?>; 
    var Xtemp= <?php echo json_encode($Xtemp);?>;
    var Ytemp= <?php echo json_encode($Ytemp);?>; 
  const labels =Xtemp;

  const data = {
    labels: labels,
    datasets: [{
      label: 'Température',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: Ytemp,
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
  };
</script>
<script>
  const myChart = new Chart(
    document.getElementById('temp'),
    config
  );
</script>

    
</body>
</html>