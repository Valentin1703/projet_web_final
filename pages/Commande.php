 <meta name="viewport" content="width=device-width, initial-scale=1">
<?php




//si aucun id de gâteau dans l'url
if (!isset($_GET['id']) && !isset($_SESSION['id_commande'])) {
    ?>
    <p class="txtRouge">Pour commander, choisissez 
        <a href="index.php?page=produit">ici</a> 
        votre ordinateur</p>
    <?php
}
else if(isset($_GET['id'])){ //on vient de la page produit
    $_SESSION['id_commande'] = $_GET['id'];
}
if(isset($_SESSION['id_commande'])){
    $ordi = new Vue_ordinateurDB($cnx);
    $liste = $ordi->getVue_ordinateurProduit($_SESSION['id_commande']);
    //var_dump($liste);
}
    
  ?>
            <table  class="tb table table-hover">
            <tr>
                     <td>
                         <img class="image_produit" width="300px" src="admin/images/<?php print $liste[0]['image']; ?>" alt="ordinateur"/>
                     </td>

                     
            </tr>
            </table>
    <table class=" tb table table-hover">
            <tr>        
                      <td>
                            Designation :
                      </td>
                      <td> 
                            <?php print utf8_decode($liste[0]['designation']); ?>
                      </td>
       
            </tr>

            </tr>
            <tr>
                      <td>
                            Marque du produit :
                      </td>
                 <td>
                     <?php print utf8_decode($liste[0]['marque']); ?>
                 </td>
            </tr>
            <tr>
                 <td>
                            Type :
                 </td>
                 <td>
                     <?php print utf8_decode($liste[0]['type']); ?>
                 </td>
            </tr>
            <tr>
                 <td>
                            Mémoire :
                 </td>
                 <td>
                     <?php print utf8_decode($liste[0]['memoire']); ?>
                 </td>
            </tr>
            <tr>
                 <td>
                            Processeur :
                 </td>
                 <td>
                     <?php print utf8_decode($liste[0]['processeur']); ?>
                 </td>
            </tr>
            <tr>
                 <td>
                            Capacité :
                 </td>
                 <td>
                     <?php print utf8_decode($liste[0]['stockage']); ?>
                 </td>
            </tr>
            <tr>
                 <td>
                            Type de stockage :
                 </td>
                 <td>
                     <?php print utf8_decode($liste[0]['type_stockage']); ?>
                 </td>
            </tr>
            <tr>
                 <td>
                            Prix :
                 </td>
                 <td>
                     <?php print utf8_decode($liste[0]['prix_unitaire']); ?>
                 </td>
            </tr>
            <table class=" tb table">
            <tr>
                     <td>
                         <button type="button" class="btn btn-success"><a href="index.php?page=Panier&id=<?php print $liste[0]['id_ordinateur']; ?>">Commander</button>
                     </td>

                     
            </tr> 
            </table>

