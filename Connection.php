<?php
class Connection {

    private static $connection = NULL;

    public static function getInstance() {
        if (Connection::$connection === NULL) {
            // connect to the database
            $host = "daneel";
            $database = "n00132610";
            $username = "N00132610";
            $password = "N00132610";

            $dsn = "mysql:host=" . $host . ";dbname=" . $database;
            Connection::$connection = new PDO($dsn, $username, $password);
            if (!Connection::$connection) {
                die("Could not connect to database");
            }
        }

        return Connection::$connection;
    }
}
