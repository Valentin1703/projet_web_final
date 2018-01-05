<?php

class InfoClientDB extends InfoClient {
    private $_db;
    private $_infoArray = array();
    
    public function __construct($cnx){
        $this->_db = $cnx;
    }
    
    public function getInfoClient($page){
        try {
            $query="select * from TEXTE where page=:page";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':page',$page,PDO::PARAM_STR);
            $resultset->execute();
            while($data = $resultset->fetch()){
                $_infoArray[] = new InfoClient($data);
            }
            return $_infoArray;
        }catch(PDOException $e){
            print "Erreur ".$e->getMessage();
        }       
       
    }
}