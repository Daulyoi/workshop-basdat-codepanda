<?php
    $host = 'localhost';
    $db_name = 'workshop-codepanda';
    $db_user = 'postgres';
    $db_pass = 'root';

    $db_con = pg_connect("host=$host dbname=$db_name user=$db_user password=$db_pass");
    if (!$db_con) {
        die("Connection failed: " . pg_last_error());
    }
?>