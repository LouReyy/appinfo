<?php

require_once 'config.php'; 

    


    $id_chantier = htmlspecialchars($_POST['id_chantier']);
    $nom = htmlspecialchars($_POST['nom']);
    $localisation = htmlspecialchars($_POST['localisation']);
    $date_debut = htmlspecialchars($_POST['$date_debut']);
    $date_fin = htmlspecialchars($_POST['date_fin']);

    echo($id_chantier . $nom . $localisation . $date_debut . $date_fin);


    $insert = $bdd->prepare('INSERT INTO `chantier`(`id_chantier`, `nom`, `localisation`, `date_debut`, `date_fin`) VALUES (:id_chantier, :nom, :localisation, :date_debut, :date_fin)');
                            $insert->execute(array(
                                'id_chantier' => $id_chantier,
                                'nom' => $nom,
                                'localisation' => $localisation,
                                'date_debut' => $date_debut,
                                'date_fin' => $date_fin
                            ));

                            echo("ajout de chantier");








?>