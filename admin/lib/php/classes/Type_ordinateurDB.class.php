<?php
class Type_ordinateurDB  extends Type_ordinateur{

    private $_db;
    private $_typeArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getType_ordinateur() {
        try {
            $query = "select * from type_ordinateur order by type";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();
            
            $resultset->execute();
            //var_dump($data);
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_typeArray[] = new Type_ordinateur($data);
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_typeArray;
        
    }
    
    
}
