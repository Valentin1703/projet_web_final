<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php
//on a besoin des classe Type_gateauDB et Type_gateau
$types = new Type_ordinateurDB($cnx);
$tabTypes = $types->getType_ordinateur();
$nbrTypes = count($tabTypes);
//traitement du formulaire de choix du type
if (isset($_GET['choix_type'])) {
    $ordi = new Vue_ordinateurDB($cnx);
    
    $liste = $ordi->getVue_ordinateurType($_GET['id_type_ordi']);
  
    $nbrOrdi = count($liste);
 
}
?>

<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_commande">  

        <div class="row">
            <div class="col-sm-1">
                <span class="txtGras">Type</span>
            </div>
            <div class="col-sm-3">
                <select name="id_type_ordi" id="id_type_ordi">     
                    <?php
                    for ($i = 0; $i < $nbrTypes; $i++) 
                    {
                        ?>
                    <option value="<?php print $tabTypes[$i]->ID_TYPE_ORDI; ?>" selected="selected">
                            <?php print utf8_decode($tabTypes[$i]->TYPE); ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-sm-2">
                <input type="submit" name="choix_type" value="Choisir"/>
            </div>

        </div>
    </form>
</div>
<br/>


<div class="container">
 <?php
    if (isset($liste)) {
        if ($nbrOrdi > 0) {
            ?>
                                                                          
  <div class="table-responsive">          
  
      
   <?php for ($i = 0; $i < $nbrOrdi; $i++) { ?>   
      
  <table class="table">
    <thead class="thead-dark">
      <tr>

        <th>image</th>
        <th>designation</th>
        <th>marque</th>
        <th>Commander</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
			<img class="image_produit" width="90px" src="admin/images/<?php print $liste[$i]['image']; ?>" alt="ordinateur"/>
	</td>
        <td> 
			<?php print utf8_decode($liste[$i]['designation']); ?>
	</td>
        <td>
			<?php print utf8_decode($liste[$i]['marque']);?>
	</td>
        <td>
			<a class="vert" href="index.php?page=commande&id=<?php print $liste[$i]['id_ordinateur']; ?>">  fiche technique</a>
	</td>
      </tr>
    </tbody>
  </table>
   <?php
    } //fin for $i
   ?>
   <?php
   }
   ?>
   <?php
   }
   ?>
  </div>
</div>

