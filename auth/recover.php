<?php 
    require_once __DIR__.'/config.php';

    if(!empty($_GET['u']) && !empty($_GET['token']) ){
        $u = htmlspecialchars(base64_decode($_GET['u']));
        $token = htmlspecialchars(base64_decode($_GET['token']));

 

        $check = $bdd->prepare('SELECT * FROM mdp_recover WHERE token_user = ? and token = ? ');
        $check->execute(array($u, $token));
        $row = $check->rowCount();
        $data = $check->fetch();

       


        if($row){
            
            $get = $bdd->prepare('SELECT token FROM utilisateurs WHERE token = ?');
            $get->execute(array($u));
            $data_u = $get->fetch();

            echo $data_u['token'] . " test " .$u;

            if(hash_equals($data_u['token'], $u)){

                header('Location: password_change.php?u='.base64_encode($u));
                die();
            }else{
                echo "Erreur : compte non valide";
            }
        }else{
            echo "Lien non valide";
        }
    }
