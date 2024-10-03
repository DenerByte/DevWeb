<?php


$host = 'localhost';
$db   = 'autonomos_db';
$user = 'root';
$pass = ''; 


$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

