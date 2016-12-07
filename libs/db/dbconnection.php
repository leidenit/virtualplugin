<!-- Connection to database -->
<?php
$host = 'localhost';
$database = 'virtualplugin';
$user = 'root';
$pass = 'root';

$dsn = "mysql:host=$host;dbname=$database;";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$pdo = new PDO($dsn, $user, $pass, $options);
?>
