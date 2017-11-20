<?php
    require_once('db_con.php');
    require_once('show_table.php');
    $connection = connect_to_db();

    // Ask me to complicate my code to remove repetition in any other language and I'll be happy to. Not here.
    $sql = "DROP TABLE courses;";
    $connection->query($sql) or die(mysqli_error($connection));
    
    $sql = "CREATE TABLE courses (Semester VARCHAR(255), Course VARCHAR(255));";
    $connection->query($sql) or die(mysqli_error($connection));
    
    $sql = "INSERT INTO courses (Semester, Course) VALUES ('Fall 2016', 'Web Application Development'), ('Spring 2016', 'Computer Networks');";
    $connection->query($sql) or die(mysqli_error($connection));
    
    $sql = sprintf("SELECT * FROM courses");
    show_table($sql, $connection, ["Semester", "Course"]);
?>