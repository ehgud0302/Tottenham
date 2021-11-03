<?php

    

    $db_host = "localhost";
    $db_user = "root";
    $db_password = "1234";
    $db_name = "spurs";

    $con = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($con->connect_errno) {die('Connection Error : '.$con->connection_error);}

?>