<?php

include("Conexao.php");

if(isset($_GET['Id'])) {


  $ID = $_GET['Id'];
    $stmt = $conn->prepare("DELETE FROM utilizador WHERE ID = ? and Admin = 0");
    $stmt->bind_param('i', $ID);
    $stmt->execute();
    $stmt->close();
    $sql = "TRUNCATE TABLE `utilizador`";
    $statement = $conn->prepare($sql);
    $statement->execute();
    header('location: adminutilizadores.php');
}
?>
