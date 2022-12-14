<?php

class Sql extends PDO {
    private $conn;

    public function __construct(){
        $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "root");
    }

    private function setParams($statment, $parameters = array()){
        foreach ($parameters as $key => $value) {
            $statment->setParam($key, $value);
        }
    }
   
    private function setParams($statment, $key, $value){
        $statment->bindParam($key, $value);
    }

    public function query($rawQuery, $params = array()){
        $stmt = $this->conn->prepere($rawQuery);
        $this->setParams($stmt, $params);
        return $stmt->execute();
    }

    public function select($rawQuery, $params = array()){
        $stmt = $this->query($rawQuery, $params);

        $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>