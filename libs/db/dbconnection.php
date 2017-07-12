<!-- Connection to database -->
<?php

$dsn = "mysql:host=$db_host;dbname=$db_database;";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$pdo = new PDO($dsn, $db_user, $db_pass, $options);
?>
