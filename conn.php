<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud";

    try {
        $conn = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDO $exception) {
        echo $exception->getMessage();
    }
?>