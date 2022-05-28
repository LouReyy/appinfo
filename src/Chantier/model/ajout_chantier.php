<?php

require_once 'config.php'; 

    
if(!empty($_POST['id_chantier']) && !empty($_POST['nom']) && !empty($_POST['localisation']) && !empty($_POST['date_debut']) && !empty($_POST['date_fin']))
{

    $id_chantier = htmlspecialchars($_POST['id_chantier']);
    $nom = htmlspecialchars($_POST['nom']);
    $localisation = htmlspecialchars($_POST['localisation']);
    $date_debut = htmlspecialchars($_POST['$date_debut']);
    $date_fin = htmlspecialchars($_POST['date_fin']);


    $insert = $bdd->prepare('INSERT INTO `chantier`(`id_chantier`, `nom`, `localisation`, `date_debut`, `date_fin`) VALUES (:id_chantier, :nom, :localisation, :date_debut, :date_fin)');
                            $insert->execute(array(
                                'id_chantier' => $id_chantier,
                                'nom' => $nom,
                                'localisation' => $localisation,
                                'date_debut' => $date_debut,
                                'date_fin' => $date_fin
                            ));



}




?>