<?php

class ClientDB extends Client{

    private $_db;
    private $_clientArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    
    public function getClient($email){
        $query="select * from client where email=:email";
        try {
        $resultset = $this->_db->prepare($query);
        $resultset->bindValue(':email',$email, PDO::PARAM_STR);
        $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                //$_clientArray[] = new Client ($data);
                $_clientArray[]=$data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_clientArray;
    }
    
   
    
    public function addClient(array $data) {
//en commentaire : appel d'une fonction plpgsql stockée dans Postgresql, avec récupération
//de la valeur retournée
        /*$query="select ajout_client (:nom_client,:prenom_client,:email_client,:telephone,:adresse_client,"
                . ":numero,:codepostal,:localite) as retour";
         */
        $query = "insert into client (nom,prenom,num_tel,adresse,email,mdp)"
                . " values (:nom_client,:prenom_client,:telephone,:adresse,:email,:mdp)";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom_client',$data['nom'], PDO::PARAM_STR);
            $resultset->bindValue(':prenom_client',$data['prenom'], PDO::PARAM_STR);
            $resultset->bindValue(':telephone',$data['telephone'], PDO::PARAM_STR);
            $resultset->bindValue(':adresse',$data['adresse'], PDO::PARAM_STR);     
            $resultset->bindValue(':email',$data['email1'], PDO::PARAM_STR);  
            $resultset->bindValue(':mdp',$data['mdp'], PDO::PARAM_STR);     
            $resultset->execute();
            //$retour = $resultset->fetchColumn(0);
            
            //return $retour;
        }catch(PDOException $e){
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }        
    }
    
    
    function isConnected($email, $mdp) {
        $mdp = md5($mdp);
        try {
            $query = "select * from client where email=:email and mdp=:mdp";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':email', $email);
            $resultset->bindValue(':mdp', $mdp);
            $resultset->execute();
            $data = $resultset->fetch();
            //var_dump($data);
            if (!empty($data)) {
                try {
                    $_client[] = new Client($data);
                    
                    if ($_client[0]->EMAIL == "$email" && $_client[0]->MDP == $mdp) {
                        return $_client;
                    } else {
                        return null;
                    }
                } catch (PDOException $e) {
                    print $e->getMessage();
                
                }
            }
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te." . $e->getMessage();
        }
    }


    
    
    
    
    
    
    
    
}
