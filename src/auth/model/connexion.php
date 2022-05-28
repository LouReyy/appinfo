<?php 
echo "test";
    session_start(); 
    require_once 'config.php'; 

    if(!empty($_POST['email']) && !empty($_POST['password'])) 
    {
        $email = htmlspecialchars($_POST['email']); 
        $password = htmlspecialchars($_POST['password']);
        
        $email = strtolower($email); 
        
        $check = $bdd->prepare('SELECT id, pseudo, email, password, token,type,id_chantier FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        $parent = dirname($_SERVER['REQUEST_URI']);

        if($row > 0)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                if(password_verify($password, $data['password']))
                {
                    $_SESSION['user'] = $data['token'];
                    $_SESSION['type'] = $data['type'];
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['pseudo'] = $data['pseudo'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['id_chantier'] = $data['id_chantier'];


                    header('Location: /forum/forum.php');die();
                }else{ header('Location: ../index.php?login_err=password'); die(); }
            }else{ header('Location: ../index.php?login_err=email'); die(); }
        }else{ header('Location: ../index.php?login_err=already'); die(); }
    }else{ header('Location: ../index.php'); die();} 
