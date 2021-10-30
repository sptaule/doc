<?php

$dbHost = $_POST['db_host'];
$dbName = $_POST['db_name'];
$dbUsername = $_POST['db_username'];
$dbPassword = $_POST['db_password'];

try {
    $dbh = new pdo( "mysql:host=$dbHost;dbname=$dbName",
        $dbUsername,
        $dbPassword,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    echo 1; die();
} catch (PDOException $ex) {
    echo 0; die();
}