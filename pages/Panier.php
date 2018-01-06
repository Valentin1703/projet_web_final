<?php
if (isset($_GET['commander'])) {

    extract($_GET,EXTR_OVERWRITE);
    
        $commande = new PanierDB($cnx);
        $p = $_GET['prix'];
        $qte = $_GET['qte'];
        $id_pc = $_GET['id_pc'];
        $prix = $p * $qte;
     
       
        $array = array("id_pc" =>$id_pc,
                       "qte"=> $qte,
                        "prix"=>$prix);
        $_GET=$array;
     
        ($commande->addPanier($_GET)); 

        
}

if(isset($_SESSION['client']))
    {

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
?>
 


        <script type="text/javascript" src="panier.js"></script>
        <script type="text/javascript">
            function ajouter()
            {
                var code = String(document.getElementById("id").value);
                var qte = parseInt(document.getElementById("qte").value);
                var prix = parseInt(document.getElementById("prix").value);
                if(qte<=0 )
                {
                    // errreur quantité inferieur a 0
                }
                else
                {
                    var monPanier = new Panier();
                    monPanier.ajouterArticle(code, qte, prix);
                    var tableau = document.getElementById("tableau");
                    var longueurTab = parseInt(document.getElementById("nbreLignes").innerHTML);
                    if (longueurTab > 0)
                    {
                        for (var i = longueurTab; i > 0; i--)
                        {
                            monPanier.ajouterArticle(parseInt(tableau.rows[i].cells[0].innerHTML), parseInt(tableau.rows[i].cells[1].innerHTML), parseInt(tableau.rows[i].cells[2].innerHTML));
                            tableau.deleteRow(i);
                        }
                    }
                    var longueur = monPanier.liste.length;
                    for (var i = 0; i < longueur; i++)
                    {
                        var ligne = monPanier.liste[i];
                        var ligneTableau = tableau.insertRow(-1);
                        var colonne1 = ligneTableau.insertCell(0);
                        colonne1.innerHTML += ligne.getCode();
                        var colonne2 = ligneTableau.insertCell(1);
                        colonne2.innerHTML += ligne.qteArticle;
                        var colonne3 = ligneTableau.insertCell(2);
                        colonne3.innerHTML += ligne.prixArticle;
                        var colonne4 = ligneTableau.insertCell(3);
                        colonne4.innerHTML += ligne.getPrixLigne();
                        var colonne5 = ligneTableau.insertCell(4);
                        colonne5.innerHTML += "<button class=\"btn btn-primary\" type=\"submit\" onclick=\"supprimer(this.parentNode.parentNode.cells[0].innerHTML)\"><span class=\"glyphicon glyphicon-remove\"></span> Retirer</button>";
                    }
                    document.getElementById("prixTotal").innerHTML = monPanier.getPrixPanier();
                    document.getElementById("nbreLignes").innerHTML = longueur;
                }

                function supprimer(code)
                {
                    var monPanier = new Panier();
                    var tableau = document.getElementById("tableau");
                    var longueurTab = parseInt(document.getElementById("nbreLignes").innerHTML);
                    if (longueurTab > 0)
                    {
                        for (var i = longueurTab; i > 0; i--)
                        {
                            monPanier.ajouterArticle(parseInt(tableau.rows[i].cells[0].innerHTML), parseInt(tableau.rows[i].cells[1].innerHTML), parseInt(tableau.rows[i].cells[2].innerHTML));
                            tableau.deleteRow(i);
                        }
                    }
                    monPanier.supprimerArticle(code);
                    var longueur = monPanier.liste.length;
                    for (var i = 0; i < longueur; i++)
                    {
                        var ligne = monPanier.liste[i];
                        var ligneTableau = tableau.insertRow(-1);
                        var colonne1 = ligneTableau.insertCell(0);
                        colonne1.innerHTML += ligne.getCode();
                        var colonne2 = ligneTableau.insertCell(1);
                        colonne2.innerHTML += ligne.qteArticle;
                        var colonne3 = ligneTableau.insertCell(2);
                        colonne3.innerHTML += ligne.prixArticle;
                        var colonne4 = ligneTableau.insertCell(3);
                        colonne4.innerHTML += ligne.getPrixLigne();
                        var colonne5 = ligneTableau.insertCell(4);
                        colonne5.innerHTML += "<button class=\"btn btn-primary\" type=\"submit\" onclick=\"supprimer(this.parentNode.parentNode.cells[0].innerHTML)\"><span class=\"glyphicon glyphicon-remove\"></span> Retirer</button>";
                    }
                    document.getElementById("prixTotal").innerHTML = monPanier.getPrixPanier();
                    document.getElementById("nbreLignes").innerHTML = longueur;
                }
                function LignePanier(code, qte, prix)
                {
                    this.codeArticle = code;
                    this.qteArticle = qte;
                    this.prixArticle = prix;
                    this.ajouterQte = function (qte)
                    {
                        this.qteArticle += qte;
                    }
                    this.getPrixLigne = function ()
                    {
                        var resultat = this.prixArticle * this.qteArticle;
                        return resultat;
                    }
                    this.getCode = function ()
                    {
                        return this.codeArticle;
                    }
                }

                function Panier()
                {
                    this.liste = [];
                    this.ajouterArticle = function (code, qte, prix)
                    {
                        var index = this.getArticle(code);
                        if (index == -1)
                            this.liste.push(new LignePanier(code, qte, prix));
                        else
                            this.liste[index].ajouterQte(qte);
                    }
                    this.getPrixPanier = function ()
                    {
                        var total = 0;
                        for (var i = 0; i < this.liste.length; i++)
                            total += this.liste[i].getPrixLigne();
                        return total;
                    }
                    this.getArticle = function (code)
                    {
                        for (var i = 0; i < this.liste.length; i++)
                            if (code == this.liste[i].getCode())
                                return i;
                        return -1;
                    }
                    this.supprimerArticle = function (code)
                    {
                        var index = this.getArticle(code);
                        if (index > -1)
                            this.liste.splice(index, 1);
                    }
                }
                    }
                
               
        </script>

      <form class="form-horizontal" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_commande">

        <section  class="container">
            
            <article class="well form-inline pull-left col-lg-12">
                <legend>Gestion du panier</legend>
                
                <label class="col-lg-1">
                    
                </label>
                <input  id = "id_pc" name="id_pc" style="width:30px;
                        visibility: hidden" class="input-sm form-control"
                         value="<?php print utf8_decode($liste[0]['id_ordinateur']); ?>">
                </input>
                
                <br><br>
                
                <img class="image_produit" width="150px"
                     src="admin/images/<?php print $liste[0]['image']; ?>"
                     alt="ordinateur"/>
                
                <br><br>
                
                <label class="col-lg-3">Designation</label>
                <input  id = "id" style="width:120px;" class="input-sm
                        form-control" 
                        value="<?php print utf8_decode($liste[0]['designation']); ?>">
                </input>
                
                <br><br>
                
                <label class="col-lg-3" >Quantité</label>
                <input type = "number" id = "qte" name="qte"
                       style="width:120px" 
                class="input-sm form-control">
                           
                </input>
                
                <br><br> 
                
                
                <label class="col-lg-3">Prix</label>
                <input type = "number" id = "prix" name="prix" style="width:120px" 
                       class="input-sm form-control" 
                       value="<?php print utf8_decode($liste[0]['prix_unitaire']);?>"> euros
                </input>
                
                <br><br>
                
                
                <button class="btn btn-primary" type="button" onclick="ajouter()"><span class="glyphicon glyphicon-shopping-cart"></span> Ajouter au panier</button>
            
            </article>
      
            
            
            
            
            <article class="well form-inline pull-left col-lg-12">
                        <legend>Contenu du panier</legend>
                        <table id="tableau" class="table">
                            <thead>
                                <tr>
                                    <th>Designation</th>
                                    <th>Quantite</th>
                                    <th>Prix unitaire</th>
                                    <th>Prix de la ligne</th>
                                    <th>Supprimer</th>

                                </tr>
                            </thead>
                        </table>
                        
                        <br><label>Prix du panier total</label> : <label id = "prixTotal"></label>
                        <label id = "nbreLignes" hidden>0</label></br>
                        <input type="submit" class="btn btn-primary" name="commander" id="commander" value="Commander" class="pull-right"/>&nbsp;   
                        
                    </article>
                </section>

              </form>

              <?php
          }
          ?>

          <?php
      }
    else
    {
        ?> <p>Vous devez etre authentifié pour pouvoir commander <a href="index.php?page=inscription_connexion" >cliquez ici</a> </p> <?php
        
    }
    
?>