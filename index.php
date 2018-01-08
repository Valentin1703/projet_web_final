
<?php
include ('admin/lib/php/admin_list_include.php');

$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>
<html>
    <head>
        
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Crete+Round' >
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"/> 
        <link rel="stylesheet" type="text/css" href="admin/lib/css/bootstrap-4.0.0-beta/"/>
        <link rel="stylesheet" type="text/css" href="admin/lib/css/styles.css"/>
        <script src="admin/lib/js/function.js"></script>
        <script src="admin/lib/js/functionsVal.js"></script>
        <title>Val informatique</title>
    </head>

    <body>
        <header> 
            <div class="wrapper">
                <a href="index.php?page=accueil" ><h1>Val informatique<span class="orange">.</span></h1></a>
                <nav>
                    <?php require './lib/php/p_menu.php'; ?>    
                </nav>

            </div>
        </header>

        <section>
            <?php
            //on arrive sur le site
            if (!isset($_SESSION['page'])) {
                $_SESSION['page'] = "accueil";
            }
            //on a cliquez sur un lien du menu
            if (isset($_GET['page'])) {
                $_SESSION['page'] = $_GET['page'];
            }
            $path = "./pages/" . $_SESSION['page'] . ".php";
            if (file_exists($path)) {
                include ($path);
            } else {
                print "Oups , la  page n'existe pas";
            }
            ?>
        </section>


        <footer>        
<?php require './lib/php/p_footer.php'; ?>      
        </footer>
    </body>
</html>





