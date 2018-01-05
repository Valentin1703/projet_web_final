<?php
class Vue_ordinateurDB {
    private $_db;
    function __construct($_db) {
        $this->_db = $_db;
    }
    
    //liste des gâteaux correspondant au choix du type dans liste déroulante
    function getVue_ordinateurType($id){
         try {            
            $query = "SELECT * FROM vue_ordinateur WHERE id_type_ordi=:id_type_ordi";
            $resultset = $this->_db->prepare($query);  
            $resultset->bindValue(':id_type_ordi',$id);
            $resultset->execute();
            $data = $resultset->fetchAll();
            
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }
    

    function getVue_ordinateur(){
         try {
            $query = "SELECT * FROM vue_ordinateur ORDER BY type,designation";
            $resultset = $this->_db->prepare($query);  
            $resultset->execute();
            $data = $resultset->fetchAll();
            //var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }
    
    function getVue_ordinateurProduit($id){
         try {            
            $query = "SELECT * FROM vue_ordinateur WHERE id_ordinateur=:id_ordinateur";
            $resultset = $this->_db->prepare($query);  
            $resultset->bindValue(':id_ordinateur',$id);
            $resultset->execute();
            $data = $resultset->fetchAll();
            //var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }
}
