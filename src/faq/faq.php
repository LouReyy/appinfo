<?php

include('model/paramfaq.php')


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/faq/css/faq.css" media="screen" type="text/css" />
    <title>FAQ</title>
</head>

<body>

    <div id="container1">

        <?php
        include("views/header.php");
        include("views/menu_deroulant_tel.php");

        include("views/container1faq.php");

        include("views/affichage_question.php");

        ?>

    </div>
    </div>
    </div>


</body>

<?php
include("views/footer.php");

?>

<script src="/faq/js/faq.js"></script>

</html>