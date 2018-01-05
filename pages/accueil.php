

<?php

$info = new InfoClientDB($cnx);
$texte = $info->getInfoClient("accueil");
$id=1;
$id2=4;
$i=0;
/* pc 1 vente flash */
$ordi = new Vue_ordinateurDB($cnx);
$liste = $ordi->getVue_ordinateurProduit($id);
$nbrOrdi = count($liste);

/* pc2 vente flash */
$ordi2 = new Vue_ordinateurDB($cnx);
$liste2 = $ordi2->getVue_ordinateurProduit($id2);
$nbrOrdi2 = count($liste2);

?>

      
        <section id="main-image">
		<div class="wrapper">
            <!----       <h2>Organisez votre<br><strong>voyage sur mesure</strong></h2>
                        <a href="#" class="button-1">Par ici</a>  ---->
		</div>
        </section>
        
        
        
        <section id="steps">
            
             <div class="wrapper">
                 <ul>
                    <li id="step-1">
                        <a href="index.php?page=produit"><h4>PC fix</h4></A>
                        <p>Nos meilleur pc fix.</p>
                     </li>
                     <li id="step-2">
                         <a href="index.php?page=produit"><h4>PC portable</h4></a>
                        <p>Nos meilleur pc portable.</p>
                     </li>
                 </ul>
                  <div class="clear"></div>
            </div>
            
        </section>
        
       <section id="possibilities">
			<div class="wrapper">
                            
                            <article  style="background-image: url(admin/images/pc5.jpg); ">

                                       
                        <div class="overlay">
                            <h4>Vente flash</h4>
                            <p>
                                <?php
                                    print utf8_decode($liste[$i]['designation']);
                                    
                                    ?>
                                
                                    <br>
                                    <?php
                                    print utf8_decode($liste[$i]['marque']);
                                    ?> 
                                    <br>
                                    <?php
                                    print utf8_decode($liste[$i]['processeur']);
                                    ?> 
                                    <br>
                                    <?php print ($liste[$i]['prix_unitaire']);?> euro 
                             
                            </p>
                            <a href="#" class="button-2">Plus d'infos</a>
                        </div>
                </article>

                  <article  style="background-image: url(admin/images/pc7.jpg); ">

                        <div class="overlay">
                            <h4>Vente flash</h4>
                            <p>
                                <?php
                                
                                    print utf8_decode($liste2[$i]['designation']);
                                    ?>
                                    <br>
                                    <?php
                                    print utf8_decode($liste2[$i]['marque']);
                                    ?> 
                                    <br>
                                    <?php
                                    print utf8_decode($liste2[$i]['processeur']);
                                    ?> 
                                    <br>
                                    <?php print ($liste2[$i]['prix_unitaire']);?> euro 
                             
                            </p>
                            <a href="#" class="button-2">Plus d'infos</a>
                        </div>
                    </article>
    


                    <div class="clear"></div>

                            </div>
                    </section>
        
        <section id="contact_accueil">
            <div class="wrapper">
                <h3>Contactez-nous</h3>
                <p>N'hésitez pas à nous contacter nous vous répondrons dans les plus brefs délais</p>
                
                <br>
                <a href="index.php?page=Contact"class="button-3">GO</a>
                
            </div>
        </section>
        
        
   
    