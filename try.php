<?php
$db   = 'crud';
$user = 'root';
$pass = '';


$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES   => false,
);

$dsn = "mysql:host;dbname=$db;";


     $pdo = new PDO($dsn, $user, $pass, $options);

?>