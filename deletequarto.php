<?php
include("Conexao.php");

if(isset($_GET['Id'])) {


  $ID = $_GET['Id'];
    $stmt = $conn->prepare("DELETE FROM quarto WHERE ID = ?");
    $stmt->bind_param('i', $ID);
    $stmt->execute();
    $stmt->close();

    $sql = "ALTER TABLE my_table MODIFY COLUMN ID INT(10) UNSIGNED";
    $statement = $conn->prepare($sql);
    $statement->execute();

    $sql = "ALTER TABLE my_table MODIFY COLUMN ID INT(10) UNSIGNED AUTO_INCREMENT";
    $statement = $conn->prepare($sql);
    $statement->execute();


    header('location: adminquartos.php');

}
?>
