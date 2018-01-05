 <?php
if (isset($_SESSION['admin'])) {
    ?>

        <link rel="stylesheet" type="text/css" href="lib/css/bootstrap-4.0.0-beta/"/>
        <link rel="stylesheet" type="text/css" href="lib/css/styles.css"/>
    <ul>
        <li><a href="index.php?page=accueil_admin" >Accueil</a></li>
        <li><a href="index.php?page=tabl_dynamique">nos produits</a></li>
        <li><a href="index.php?page=imprimer">PDF</a></li>
        <li><a href="index.php?page=disconnect">Déconnexion</a></li>
    </ul>


    <?php
} else {
    ?>
    
    <ul>
        <li><a href="index.php?page=accueil" >Accueil</a></li>
        <li><a href="index.php?page=produit" >Nos Produits</a></li>
        <!----         <li><a href="index.php?page=Commande">Commander</a></li> --->
        <li><a href=" index.php?page=Contact">Contact</a></li>
        <li><a href="index.php?page=inscription_connexion" >Mon compte</a></li>
        <li><a href="index.php?page=Panier" >panier</a></li>
    </ul>
    
    
    <?php
}
?>

    <!---
    
            <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
       <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.js"></script>
    <script>
      $(document).ready(function() {
          $("a.dropdown-toggle").click(function(ev) {
              $("a.dropdown-toggle").dropdown("toggle");
              return true;
          });
          $("ul.dropdown-menu a").click(function(ev) {
              $("a.dropdown-toggle").dropdown("toggle");
              return true;
          });
      });
    </script>
    
        <div class="dropdown">
      <a class="dropdown-toggle" id="dropdownMenu1" href="#">Mon compte</a>
      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation"><a role="menuitem" tabindex="-1"href="index.php?page=inscription_connexion" >inscription</a></li>
        <li role="presentation" class="divider"></li>
        <li role="presentation"><a role="menuitem" tabindex="-1"href="index.php?page=inscription_connexion" >connection</a></li>
      </ul>
        </div>
    ------->