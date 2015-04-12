<?php

class ManagerTableGateway {
   
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getManagers(){
        //execute a query to get all managers 
        $sqlQuery = "SELECT * FROM eventmanager";
        
        $manager = $this->connection->prepare($sqlQuery);
        $status = $manager->execute();
        
        if (!$status) {
            die("Could not retrieve managers");
        }
        
        return $manager; 
    }
    
    public function insertManager($n, $p, $ma, $ema) {
        $sqlQuery = "INSERT INTO eventManager " .
                "(Name, phone, address, email) " .
                "VALUES (:Name, :phone, :address, :email)";

        $managers = $this->connection->prepare($sqlQuery);
        $params = array(
            "Name" => $n,
            "phone" => $p,
            "address" => $ma,
            "email" => $ema
        );

        $status = $managers->execute($params);

        if (!$status) {
            die("Could not insert manager");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteManager($id) {
        $sqlQuery = "DELETE FROM eventmanager WHERE ID = :id";

        $managers = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $managers->execute($params);

        if (!$status) {
            die("Could not delete manager");
        }

        return ($managers->rowCount() == 1);
    }

    public function updateManager($id, $n, $p, $ma, $ema) {
        $sqlQuery =
                "UPDATE eventmanager SET " .
                "Name = :Name, " .
                "phone = :phone " .
                "address = :address" .
                "email = :email" .
                "WHERE ID = :id ";

        $manager = $this->connection->prepare($sqlQuery);
        $params = array(
            "ID" => $id,
            "Name" => $n,
            "phone" => $p,
            "address" => $ma,
            "email" => $ema
        );

        $status = $manager->execute($params);

        return ($manager->rowCount() == 1);
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
