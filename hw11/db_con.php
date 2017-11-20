<?php
    function connect_to_db()
    {
        define("USER", "zenohm");
        define("PASS", "");
        define("DB", "hw11");
    
        // connect to database
        $connection = new mysqli('localhost', USER, PASS, DB);
    
        if ($connection->connect_error) {
            die('Connect Error (' . $connection->connect_errno . ') '
                . $connection->connect_error);
        }
        
        return $connection;   
    }
?>
