<?php session_start(); ?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="style.css">
<title>Evaluations maths CE1</title> 
</head>
<body>
 <section class="quiz">
 <form action="traitement.php" method="POST">
     <?php
     if(isset($_GET['score'])){
         ?>


 <t> Ton score est de <?php echo $_GET['score'] ?> essaie encore </t>



 <?php 

 if($_GET['score'] < 6){
    $prenom = $_SESSION['prenom'];


 }else{
     $prenom ="";
 }


 

}
else{
    $prenom ="";
}
 
 ?>

 <div class="msg-form">
                <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'error':
                        ?>
                            <div class="alert alert-success">
                                <strong>Erreur</strong> N'oublie pas d'ecrire ton prénom
                            </div>
                        <?php

                    }
                }
                ?>
            </div>

 
 <label for="prenom">Prénom : </label><br>
 <input type="text" id="prenom" name="prenom" value ="<?php echo($prenom); ?>" ><br><br>
 <fieldset>


 Calcul mental :</br>
 10 + 3 = <input class="operation" type="text" id="op1" name="op1"><br>
 9 + 9 = <input class="operation" type="text" id="op2" name="op2"><br>
 7 + 13 = <input class="operation" type="text" id="op3" name="op3"><br>
 
 </fieldset>
 <br><br>
 <fieldset>
 829 est un nombre avec 
 <select class="operation" name="centaine">
 <option value=""> -</option>
 <option value="1"> 1</option>
 <option value="2"> 2</option>
 <option value="3"> 3</option>
 <option value="4"> 4</option>
 <option value="5"> 5</option>
 <option value="6"> 6</option>
 <option value="7"> 7</option>
 <option value="8"> 8</option>
 <option value="9"> 9</option>
 </select> centaines +
 <select class="operation" name="dizaine">
 <option value=""> -</option>
 <option value="1"> 1</option>
 <option value="2"> 2</option>
 <option value="3"> 3</option>
 <option value="4"> 4</option>
 <option value="5"> 5</option>
 <option value="6"> 6</option>
 <option value="7"> 7</option>
 <option value="8"> 8</option>
 <option value="9"> 9</option>
 </select> dizaines + 
 <select class="operation" name="unite">
 <option value=""> -</option>
 <option value="1"> 1</option>
 <option value="2"> 2</option>
 <option value="3"> 3</option>
 <option value="4"> 4</option>
 <option value="5"> 5</option>
 <option value="6"> 6</option>
 <option value="7"> 7</option>
 <option value="8"> 8</option>
 <option value="9"> 9</option>
 </select> unités <br><br>
 
 </fieldset>
 <br><br>
 <input type="submit" value="Vérifier" id ="submit">
 <input type="reset" value="effacer les réponses">
 </form>
 </section>
</body>

<script src = script.js></script>
</html>