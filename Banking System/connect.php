<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername,$username,$password);
    mysqli_select_db($conn, "banking system");
    if (mysqli_connect_error()) {
        die("Connection failed" . $conn->connect_error);
    }
?>
