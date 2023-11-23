<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pap";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
