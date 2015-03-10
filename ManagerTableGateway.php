<?php

class ManagerTableGateway {
   
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getManagers(){
        //execute a query to get all managers 
        $sqlQuery = "SELECT * FROM eventmanager";
        
        $statementManager = $this->connection->prepare($sqlQuery);
        $status = $statementManager->execute();
        
        if (!$status) {
            die("Could not retrieve managers");
        }
        
        return $statementManager; 
    }
    
    public function insertManager($n, $p) {
        $sqlQuery = "INSERT INTO eventManager " .
                "(name, phone) " .
                "VALUES (:name, :phone)";

        $statementManager = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "phone" => $p
        );

        $status = $statementManager->execute($params);

        if (!$status) {
            die("Could not insert manager");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteManager($id) {
        $sqlQuery = "DELETE FROM eventmanager WHERE ID = :id";

        $statementManager = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statementManager->execute($params);

        if (!$status) {
            die("Could not delete manager");
        }

        return ($statementManager->rowCount() == 1);
    }

    public function updateManager($id, $n, $p) {
        $sqlQuery =
                "UPDATE eventmanager SET " .
                "name = :name, " .
                "phone = :phone " .
                "WHERE ID = :id ";

        $statementManager = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "name" => $n,
            "phone" => $p
        );

        $status = $statementManager->execute($params);

        return ($statementManager->rowCount() == 1);
    }

    public function getManagerById($id) {
        //execute a query to get the manager specified by the id 
        $sqlQuery = "SELECT * FROM eventmanager WHERE ID = :id";
        
        $managers = $this->connection->prepare($sqlQuery);
        $params = array("id" => $id);
        
        $status = $managers->execute($params);
                
        if (!$status) {
            die("Could not retrieve user");
        }

        return $managers;
    }

}
