<?php 


    require_once "config.php";

    if(!empty($_POST['email'])){
        $email = htmlspecialchars($_POST['email']);

        $check = $bdd->prepare('SELECT token FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row){
            $token = bin2hex(openssl_random_pseudo_bytes(24));
            $token_user = $data['token']; 

            $insert = $bdd->prepare('INSERT INTO mdp_recover(token_user, token) VALUES(?,?)');
            $insert->execute(array($token_user, $token));

            $link = 'http://localhost/appinfo/auth/views/recover.php?u='.base64_encode($token_user).'&token='.base64_encode($token);
            $headers = 'Content-type: text/html; charset=utf-8'."\r\n";
            $to_email = $email;
            $subject = "Test envoi mail";
            $body = '<a href="'.$link.'">Réinitialise ton email en cliquant ici !</a>';
 
            mail($to_email, $subject, $body, $headers);

            if (mail($to_email, $subject, $body, $headers)) {
                echo "l'email a bien été envoyé à $to_email...";
            } else {
                echo "Email sending failed...";
            }

        }else{
            echo "Compte non existant";
            header('Location: ../index.php');
            die();
        }
    }
