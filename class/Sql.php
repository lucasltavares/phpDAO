<?php

class Sql extends PDO {

    private $conn;

    public function __construct() {

        $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "eb0e67ee60@A");

    }

    private function setParams($statement, $parameters = array()) { // Insere uma série de parâmetros em um array.

        foreach ($parameters as $key => $value) {

            $this->setParam($key, $value); //Invoca a função criada que faz o bind dos parâmetros.

        }

    }

    private function setParam($statement, $key, $value) { // Insere um único parâmetro

        $statement->bindParam($key, $value);

    }

    public function query($rawQuery, $params = array()) { // Faz o prepare e o bind e retorna o execute da query.

        $stmt = $this->conn->prepare($rawQuery);    
          
        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
    }

    public function select($rawQuery, $params = array()):array {

        $stmt = $this->query($rawQuery,$params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }


}

?>