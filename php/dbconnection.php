<?php
// DB connection code here
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "servicehub";
    $port="3306";

    $con= new mysqli($host, $username, $password, $database, $port);

    if ($con->connect_error) {
        die("Connection failed");
    }

?>