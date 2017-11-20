<?php
    require_once('db_con.php');
    require_once('show_table.php');
    $connection = connect_to_db();

    $sql = "SELECT * FROM review";
    show_table($sql, $connection, ["id", "name", "email", "referrer", "rating", "comments"]);
?>