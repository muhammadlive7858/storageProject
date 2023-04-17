<?php

$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "sklad";
try {
    $pdo = new PDO("mysql:host=$serverName;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo 'connection  error  ' . $e->getMessage();
}
?>