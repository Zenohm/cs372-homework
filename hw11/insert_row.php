<?php
    function insert_row($connection, $table, $headers, $values) {
        // KISS is sometimes violated by DRY.
        // I'm going to bed now, goodbye PHP.
        // I hope I never use you again. XOXO
        function surround($val) {
            return "\"" . $val . "\"";
        }
        
        $sql = "INSERT INTO " . $table . " (" . implode(", ", $headers). ") VALUES (" . implode(", ", array_map(surround, $values)) . ");";
        $connection->query($sql) or die(mysqli_error($connection));
    }
?>