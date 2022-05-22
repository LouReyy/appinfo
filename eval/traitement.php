<?php
session_start();
var_dump($_POST);
$prenom = $_POST['prenom'];



if(strlen($prenom) == 0){  //Si prénom est vide


   header('Location: ./index.php?reg_err=error');

    
}
else{
    $op1 = $_POST['op1'];
    $op2 = $_POST['op2'];
    $op3 = $_POST['op3'];
    $centaine =$_POST['centaine'];
    $dizaine =$_POST['dizaine'];
    $unite =$_POST['unite'];

    $score =0;

    if($op1 == 13){
        $score++;
    }
    if($op2 == 18){
        $score++;
    }
    if($op3 == 20){
        $score++;
    }
    if($centaine == 8){
        $score++;
    }
    if($dizaine == 2    ){
        $score++;
    }
    if($unite == 9 ){
        $score++;
    }

    echo("Votre score est de $score");

    header('Location: ./index.php?score='.$score);

    if($score ==6){
        echo "BRAVO";
        try {
            $db = new PDO('mysql:host=localhost:3306;dbname=ce1;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $insert = $db->prepare('INSERT INTO `eleve`(`nom`) VALUES (:nom)');
                            $insert->execute(array(
                                'nom' => $prenom,
                                
                            ));

            header('Location: bravo.php');



    }
}
?>