<?php

if(isset($_GET['search']) AND !empty($_GET['search'])){

$search = htmlspecialchars($_GET['search']);
$topic = $search;

$req2= $bdd->prepare('SELECT * FROM question WHERE topic = ?');
    $req2->execute(array($topic));
    $data2 = $req2->fetchAll();

}else{
$req2= $bdd->prepare('SELECT * FROM question');
$req2->execute();
$data2 = $req2->fetchAll();
}



$i = 0;
foreach($data2 as $row){

$i++;


?>

<div id = 'question<?php echo $i ?>' class = question>

<?php 

if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){

    $button = "button2";

}
else{
    $button = "button2invisible";

}
?>


         <div id = 'topic<?php echo $i ?>' class = topic>

             <topic id = "topic_flex"> <?php echo $row['topic']; ?> </topic>

             <a  class="<?php echo $button ?>" id = "btnsup" href="model/supprimer-question.php?id=<?php echo $row['id_question']?>">Supprimer</a> 

                <img id = 'fleche<?php echo $i ?>' src ="img/fleche.png" class = fleche>
         </div>

         <div id = 'content<?php echo $i ?>' class = content>
            <qst> <?php echo $row['content']; ?> </qst>
        
           
         </div>

         

                 
        
</div>
        <?php

    }

    ?>