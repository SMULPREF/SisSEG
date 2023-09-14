<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'sisseg';

global $conn;

$conn = mysqli_connect($host, $user, $password, $db_name);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>


