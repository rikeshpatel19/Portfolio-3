<?php 
$db_host = 'localhost';
$db_name = 'u_230118588_db';
$dsn = "mysql:dbname=$db_name;host=$db_host";
$username = 'u-230118588';
$password = 'wSHdi9TuzMOHVY5';
try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $ex) {
    echo ("Failed to connect to the database.<br>");
    echo ($ex->getMessage());
    exit;
}
?>