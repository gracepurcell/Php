<?php

class ManagerTableGateway {
   
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getManager(){
        //execute a query to get all managers 
        $sqlQuery = "SELECT * FROM eventmanager";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve managers");
        }
        
        return $statement; 
    }
    
    public function getManagerById($id) {
        //execute a query to get the manager specified by the id 
        $sqlQuery = "SELECT * FROM eventmanager WHERE ID = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
                
        if (!$status) {
            die("Could not retrieve user");
        }

        return $statement;
    }
    
    public function insertManager($n, $p) {
        $sqlQuery = "INSERT INTO eventManager " .
                "(name, phone) " .
                "VALUES (:name, :phone)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "phone" => $p
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert manager");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteManager($id) {
        $sqlQuery = "DELETE FROM eventmanager WHERE ID = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete manager");
        }

        return ($statement->rowCount() == 1);
    }

    public function updateManager($id, $n, $p) {
        $sqlQuery =
                "UPDATE eventmanager SET " .
                "name = :name, " .
                "phone = :phone " .
                "WHERE ID = :id ";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "name" => $n,
            "phone" => $p
        );

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
    
}
