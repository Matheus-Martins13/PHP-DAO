<?php

class Sql extends Pdo {

    private $conn;

    public function __construct() {
        $this->conn = new Pdo("mysql:dbname=dbphp7; host=127.0.0.1", "root", "");
    }

    private function setParams($statmensts, $parameters=array()) {

        foreach ($parameters as $key => $value) {
            $this->setParam($statmensts, $key, $value);
        }
     }
     private function setParam($statmensts, $key, $value){
        $statmensts->bindParam($key, $value);
     }

     public function execQuery($rawQuery, $params=array()){
         $stmt = $this->conn->prepare($rawQuery);
         $this->setParams($stmt, $params);
         $stmt->execute();
         return $stmt;
     }

     public function select($rawQuery, $params=array()):array 
     {
        $stmt= $this->execQuery($rawQuery, $params);
        return $stmt->fetchALL(PDO::FETCH_ASSOC);

     }

}



?>