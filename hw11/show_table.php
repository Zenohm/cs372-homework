<?php
    function show_table($sql, $connection, $headers)
    {
        echo "<html>";
        echo "<body>";
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        foreach ($headers as $head) {
            echo "<td>";
            echo $head;
            echo "</td>";
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        // execute query
        
        $result = $connection->query($sql) or die(mysqli_error($connection));           
    
        // check whether we found a row
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($headers as $head) {
                echo "<td>";
                echo "$row[$head]";
                echo "</td>";
            }
            echo "</tr>";
        }
    }

    echo "</body>";
    echo "</html>";
?>