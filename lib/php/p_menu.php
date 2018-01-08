 <?php

 /* Menu pour l'admin */ 
if (isset($_SESSION['admin']))
{
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
     /* Menu pour le client */ 
} 
else
{
    ?>
    
    <ul>
        <li><a href="index.php?page=accueil" >Accueil</a></li>
        <li><a href="index.php?page=produit" >Nos Produits</a></li>
        <li><a href=" index.php?page=Contact">Contact</a></li>
        <li><a href="index.php?page=inscription_connexion" >Mon compte</a></li>
        <li><a href="index.php?page=Panier" >panier</a></li>
    </ul>
    
    
    <?php
}
?>

