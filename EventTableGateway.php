<?php

class EventTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getEvents() {
        // execute a query to get all programmers
        $sqlQuery = "SELECT e.*, em.name AS managerName 
                     FROM event e
                     LEFT JOIN eventmanager em ON em.id = e.eventmanager";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve users");
        }

        return $statement;
    }
    
    public function getEventsByManagerId($managerId) {
        // execute a query to get all programmers
        $sqlQuery = "SELECT e.*, em.name AS managerName 
                     FROM event e
                     LEFT JOIN eventmanager em ON em.id = e.eventmanager
                     WHERE e.manager_id = :managerId ";

        $params = array(
            'managerId' => $managerId
        );
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve users");
        }

        return $statement;
    }

    public function getEventById($id) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM event WHERE id = :id";

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

    public function insertEvent($d, $tm, $tt, $at, $ad, $em, $p) {
        $sqlQuery = "INSERT INTO event " .
                "(date, time, title, attending, address, eventManager, price) " .
                "VALUES (:date, :time, :title, :attending, :address, :eventManager, :price)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "date" => $d,
            "time" => $tm,
            "title" => $tt,
            "attending" => $at,
            "address" => $ad,
            "eventManager" => $em,
            "price" => $p
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert event");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteEvent($id) {
        $sqlQuery = "DELETE FROM event WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete event");
        }

        return ($statement->rowCount() == 1);
    }

    public function updateEvent($id, $d, $tm, $tt, $at, $ad, $em, $p) {
        $sqlQuery =
                "UPDATE event SET " .
                "date = :date, " .
                "time = :time, " .
                "title = :title, " .
                "attending = :attending, " .
                "address= :address, " .
                "eventManager = :eventManager, " .
                "price = :price " .
                "WHERE id = :id ";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "date" => $d,
            "time" => $tm,
            "title" => $tt,
            "attending" => $at,
            "address" => $ad,
            "eventManager" => $em,
            "price" => $p
        );

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}