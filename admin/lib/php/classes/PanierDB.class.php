<?php

class PanierDB extends Panier {
 
    
    private $_db;
    private $_clientArray = array();
    public function __construct($cnx) {
        $this->_db = $cnx;
    }
       public function addPanier(array $data) {

        $query = "insert into panier2 (id_ordinateur,id_client,quantite,prix_total)"
                . " values (:id,:id_client,:quantite,:prix_t)";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':id',$data['id_pc'], PDO::PARAM_STR);
            $resultset->bindValue(':id_client',$data['id_client'], PDO::PARAM_STR);
            $resultset->bindValue(':quantite',$data['qte'], PDO::PARAM_STR);
            $resultset->bindValue(':prix_t',$data['prix'], PDO::PARAM_STR);


            $resultset->execute();
            //$retour = $resultset->fetchColumn(0);
           ?>
            <div class="alert alert-success">Votre commande est validée</div>
           <?php
            //return $retour;
        }catch(PDOException $e)
        {
            
            ?>  <div class="alert alert-success">Votre commande est annulée</div> <?php
            
        }        
    }
}
