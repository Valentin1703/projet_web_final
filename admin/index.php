<?php
session_start(); // index admin
include('lib/php/admin_list_include.php');

$cnx = Connexion::getInstance($dsn, $user, $pass);




?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="lib/css/styles.css"/>
        <link rel="stylesheet" type="text/css" href="lib/css/bootstrap-4.0.0-beta/"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Crete+Round' >
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"/> 
        <script src="lib/js/function.js"></script>
        <script src="lib/js/functionsVal.js"></script> 
        <title>Val informatique</title>
    </head>

    <body>
        <header> 
            <div class="wrapper">
                <a href="index.php?page=accueil_admin" ><h1>Val informatique<span class="orange">.</span></h1></a>
                <nav>
                   <?php
                        if (isset($_SESSION['admin'])) {
                            if (file_exists("../lib/php/p_menu.php")) {
                                include ("../lib/php/p_menu.php");

                            }
                        }
                        ?>
                </nav>

            </div>
        </header>
        



         
        
       
        <section>
            <?php
            if (!isset($_SESSION['admin'])) {
                $_SESSION['page'] = "admin_login";
            } else {
                if (!isset($_SESSION['page'])) {

                    $_SESSION['page'] = "accueil_admin";
                }
                //on a cliqué sur un lien du menu`

                if (isset($_GET['page'])) {

                    $_SESSION['page'] = $_GET['page'];
                }
            }
            $path = "./pages/" . $_SESSION['page'] . ".php";

            if (file_exists($path)) {

                include ($path);
            } else {
                print "Oupssss";
            }
            ?>

        </section>


        <footer>        
            <?php require '../lib/php/p_footer.php'; ?>      
        </footer>
  
    </body>
</html>





