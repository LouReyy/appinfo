<?php

session_start(); 

require_once 'config.php'; 

echo "Salut a tous";




$requete ='SELECT * from utilisateurs';

$utilstate = $bdd->prepare($requete);
$utilstate->execute();
$utils = $utilstate->fetchAll();

foreach($utils as $util){
    ?>

    <p><?php echo $util['pseudo']; ?></p>
    <?php
}

    echo"Salut a toi " . $util['password'] ;

?>