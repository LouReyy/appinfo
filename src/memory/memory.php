<?php

include("model/setup.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/memo.css" media="screen" type="text/css" />
    <title>Memory</title>
    <link rel="icon" type="image/png" href="../homepage/img/InfiniteMeasures.png" />

</head>

<body>

    <div id="container1">
        <?php include("views/header.php");
        include("views/menu_deroulant_tel.php"); ?>

        <main>
            <h1> Memory
                <hr />
            </h1>


            <div id=container align="center">

                <div id="jeu2">
                    <table id="tabledejeu2">
                        <tr>
                            <td><img src="img/face.png" class="img2" id="1">
                            <td><img src="img/face.png" class="img2" id="2">
                            <td><img src="img/face.png" class=img2 id="3">
                            <td><img src="img/face.png" class=img2 id="4">
                            <td><img src="img/face.png" class=img2 id="5">
                        </tr>
                        <tr>
                            <td><img src="img/face.png" class=img2 id="6">
                            <td><img src="img/face.png" class=img2 id="7">
                            <td><img src="img/face.png" class=img2 id="8">
                            <td><img src="img/face.png" class=img2 id="9">
                            <td><img src="img/face.png" class=img2 id="10">
                        </tr>
                        <tr>
                            <td><img src="img/face.png" class=img2 id="11">
                            <td><img src="img/face.png" class=img2 id="12">
                            <td><img src="img/face.png" class=img2 id="13">
                            <td><img src="img/face.png" class=img2 id="14">
                            <td><img src="img/face.png" class=img2 id="15">
                        </tr>
                        <tr>
                            <td><img src="img/face.png" class=img2 id="16">
                            <td><img src="img/face.png" class=img2 id="17">
                            <td><img src="img/face.png" class=img2 id="18">
                            <td><img src="img/face.png" class=img2 id="19">
                            <td><img src="img/face.png" class=img2 id="20">
                        </tr>
                    </table>
                </div>

                <div id="jeu">
                    <table id="tabledejeu">
                        <tr>
                            <td><img src="img/face.png" class="img1" id="1a">
                            <td><img src="img/face.png" class="img1" id="2a">
                            <td><img src="img/face.png" class=img1 id="3a">
                            <td><img src="img/face.png" class=img1 id="4a">
                            <td><img src="img/face.png" class=img1 id="5a">
                        </tr>
                        <tr>
                            <td><img src="img/face.png" class=img1 id="6a">
                            <td><img src="img/face.png" class=img1 id="7a">
                            <td><img src="img/face.png" class=img1 id="8a">
                            <td><img src="img/face.png" class=img1 id="9a">
                            <td><img src="img/face.png" class=img1 id="10a">
                        </tr>
                        <tr>
                            <td><img src="img/face.png" class=img1 id="11a">
                            <td><img src="img/face.png" class=img1 id="12a">
                            <td><img src="img/face.png" class=img1 id="13a">
                            <td><img src="img/face.png" class=img1 id="14a">
                            <td><img src="img/face.png" class=img1 id="15a">
                        </tr>
                        <tr>
                            <td><img src="img/face.png" class=img1 id="16a">
                            <td><img src="img/face.png" class=img1 id="17a">
                            <td><img src="img/face.png" class=img1 id="18a">
                            <td><img src="img/face.png" class=img1 id="19a">
                            <td><img src="img/face.png" class=img1 id="20a">
                        </tr>
                    </table>

                    <div id="rejouer">
                        <form>
                            <input type="button" value="Rejouer" onClick="history.go(0)">
                        </form>
                    </div>

                    <div id="coups-display">
                        <h2>Nombre de coups:</h2>
                        <div id="coups">0</div>
                    </div>


                    <div id=regle>
                        <h2> Règles du jeu
                            <hr>
                        </h2>
                        <p>Vous devez retrouver toutes les paires du jeu!</p>
                        <p>Pour cela retournez 2 cartes et si elles sont identiques, vous avez formé une paire. Sinon, les cartes se retournent et vous devez repiocher.</p>
                        <p>Mais attention, n'oubliez pas les positions des cartes que vous avez deja vu!</p>
                    </div>
                </div>

            </div>
        </main>

        <script src="js/memory.js"></script>


</body>
<?php include("views/footer.php")?>

</html>