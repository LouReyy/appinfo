<?php include("../model/setup_modif.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modifier_user.css" media="screen" type="text/css" />
    <title>Modification Info Utilisateur</title>
</head>
<body>

<?php include("header.php");
include("menu_deroulant_tel.php");?>



    <div id ="container">

        


        <div id = container-title>
                

            <img id = "forme1"src="/auth/img/forme1.png"></img>

            <h1 class="text-center">Modifier un Utilisateur</h1>

        </div>



        <div id = gauche>

            

            <form action="../model/modifier.php" method="post">      
                <div class="form-group">
                    <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" value= "<?php echo $data['pseudo']; ?>"  required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" value= "<?php echo $data['email']; ?>"  required="required" autocomplete="off">
                </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="Nouveau Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>

                <label for="pet-select">Choix du role:</label>

                <select name="type" id="type-select">
                    <option value=""><?php echo $data['type']; ?> </option>
                    <option value="Utilisateur">Utilisateur</option>
                    <option value="Gestionnaire">Gestionnaire</option>
                    <option value="Administrateur">Administrateur</option>
    
                 </select>




                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Modifier</button>
                        
                        
                </div>   
                    

            </form>

               

        </div> 

        <img class = line src = ../img/Line4.png>

        <div id = pp>

            <img class = "avatar"src="<?php echo $file_name; ?>.jpg"></img>

            <form class = "form-img" method="POST" action = "/appinfo/auth/model/modify_profilpic.php" enctype="multipart/form-data" >

                <label class="file">
                    <input type="file" name = "picture" id="avatar"   accept="image/jpg">
                    <span class="file-custom"></span>
                </label>    

                <button type="submit" class="btn btn-primary btn-block">Modifier la photo</button>

            </form>


        </div>

           

           



    </div>


    
</body>
<script src = ../js/admin.js></script>

</html>