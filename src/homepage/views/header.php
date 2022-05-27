<header>
            <div id ="logoimg">
            <a  href="/homepage/homepage.php"><img src="/auth/img/logo_infinite.png" alt="logo"></a>
            </div>  
            <nav>
                <ul class="nav__links">
                    <li><a href="/home">Accueil</a></li>
                    <li><a href="/<?php echo $chantier ?>" >Votre chantier</a></li>
                    <li><a href="/forum">Forum</a></li>
                    <li><a href="/faq">FAQ</a></li>
                    <li><a href="/contact">Contactez-nous</a></li>
                    <li><a href="/solution">Notre solution</a></li>

                </ul>
            </nav>
            <div id="logomemo">
                <a href="/memor"><img src="/memory/img/memoryim.png" alt="memory"></a>
            </div>
            <a class="cta" href= "<?php echo $editprofil?> "> <?php echo $title ?></a>

            <?php
           

           if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
            
            ?>
            <a class="cta" href= "/admin/admin.php">Admin</a>

            <?php }?>
        </header>