<?php

class ManagerTableGateway {
   
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getManagers(){
        //execute a query to get all managers 
        $sqlQuery = "SELECT * FROM eventmanager";
        
        $managers = $this->connection->prepare($sqlQuery);
        $status = $managers->execute();
        
        if (!$status) {
            die("Could not retrieve managers");
        }
        
        return $managers; 
    }
    
    public function insertManager($n, $p, $ma, $ema) {
        $sqlQuery = "INSERT INTO eventManager " .
                "(Name, phone, address, email) " .
                "VALUES (:Name, :phone, :address, :email)";

        $manager = $this->connection->prepare($sqlQuery);
        $params = array(
            "Name" => $n,
            "phone" => $p,
            "address" => $ma,
            "email" => $ema
        );

        $status = $manager->execute($params);

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
                "phone = :phone, " .
                "address = :address, " .
                "email = :email " .
                "WHERE ID = :ID ";

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
