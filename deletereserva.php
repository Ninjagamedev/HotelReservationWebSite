<?php
include("Conexao.php");

if(isset($_GET['Id'])) {


  $ID = $_GET['Id'];
    $stmt = $conn->prepare("DELETE FROM reserva WHERE ID = ?");
    $stmt->bind_param('i', $ID);
    $stmt->execute();
    $stmt->close();
    header('location: adminreservas.php');
}
?>
