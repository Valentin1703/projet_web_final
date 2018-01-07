

<?php
$obj = new Vue_ordinateurDB($cnx);
$liste = $obj->getVue_ordinateur();
$nbrG = count($liste);
//var_dump($liste);
?>




<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <table class="table table-bordered table-hover" id="tab_logic">
                <thead>
                    <tr >

                        <th class="text-center">
                            Type de l'ordinateur
                        </th>
                        <th class="text-center">
                            Désignation
                        </th>
                        <th class="text-center">
                            marque
                        </th>
                        <th class="text-center">
                            memoire
                        </th>
                        <th class="text-center">
                            processeur
                        </th>
                        <th class="text-center">
                            stockage
                        </th>
                        <th class="text-center">
                            type de stockage
                        </th>

                        <th class="text-center">
                            Prix unitaire
                        </th>
                        <th class="text-center">
                            image
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < $nbrG; $i++) {
                        ?>
                        <tr id='addr0'>
 
                            <td>
                                <?php print utf8_encode($liste[$i]['type']); ?>
                            </td>
                            <td>
                                <span contenteditable="true" name="designation" class="ecart" id="<?php print $liste[$i]['id_type_ordi']; ?>">
                                    <?php print utf8_encode($liste[$i]['designation']); ?>
                                </span>
                            </td>
                            <td>
                                <span contenteditable="true" name="marque" class="ecart" id="<?php print $liste[$i]['id_type_ordi']; ?>">
                                    <?php print $liste[$i]['marque']; ?>
                                </span>
                            </td>
                            <td>
                                <span contenteditable="true" name="memoire" class="ecart" id="<?php print $liste[$i]['id_type_ordi']; ?>">
                                    <?php print $liste[$i]['memoire']; ?>
                                </span>
                            </td>
                            <td>
                                <span contenteditable="true" name="processeur" class="ecart" id="<?php print $liste[$i]['id_type_ordi']; ?>">
                                    <?php print $liste[$i]['processeur']; ?>
                                </span>
                            </td>
                            <td>
                                <span contenteditable="true" name="stockage" class="ecart" id="<?php print $liste[$i]['id_type_ordi']; ?>">
                                    <?php print $liste[$i]['stockage']; ?>
                                </span>
                            </td>
                            <td>
                                <span contenteditable="true" name="type_stockage" class="ecart" id="<?php print $liste[$i]['id_type_ordi']; ?>">
                                    <?php print $liste[$i]['type_stockage']; ?>
                                </span>
                            </td>
                            
                            <td>
                                <span contenteditable="true" name="prix_unitaire" class="ecart" id="<?php print $liste[$i]['id_type_ordi']; ?>">
                                    <?php print $liste[$i]['prix_unitaire']; ?>
                                </span>
                            </td>
                             <td>
                                 <img class="image_produit" width="40px" src="./images/<?php print $liste[$i]['image']; ?>" alt="ordinateur"/>
                            </td>

                        </tr>
                        <?php
                    }
                    ?>

                    <tr id='addr1'></tr>
                </tbody>
            </table>
        </div>
    </div>
    <a href ="./pages/imprimer.php"><img width="100px" src="../images/PDF.jpg" alt="PDF"/></a>


</div>