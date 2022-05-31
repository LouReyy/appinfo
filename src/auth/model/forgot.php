<?php 


    require_once "config.php";

    if(!empty($_POST['email'])){
        $email = htmlspecialchars($_POST['email']);

        $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        var_dump($data);

        if($row){
            $token = bin2hex(openssl_random_pseudo_bytes(24));
            $token_user = $data['token']; 

            $insert = $bdd->prepare('INSERT INTO mdp_recover(token_user, token,id) VALUES(?,?,?)');
            $insert->execute(array($token_user, $token,$data['id']));

            include("../model/mail.php");

            $link = 'https://appinfofinal.herogu.garageisep.com/auth/views/recover.php?u='.base64_encode($token_user).'&token='.base64_encode($token);
            $from_email = "tech4healthg9c@gmail.com";
            $to_email = $email;
            $subject = "Modification de votre mot de passe";
            $body = '<a href="'.$link.'">Reinitialisez votre mot de passe en cliquant ici !</a>';
            $name = "Mot de passe oublie";
 

            if (smtpmailer($to_email,$from_email,$name, $subject, $body, )) {
                echo "l'email a bien été envoyé à $to_email...";
                header('Location: /auth/views/edit_password.php?reg_err=success');

            } else {
                echo "Email sending failed...";
                if (!empty($error)) echo $error;
            die();
            }

        }else{
            echo "Compte non existant";
            header('Location: ../index.php?login_err=noexist');
            die();
        }
    }
