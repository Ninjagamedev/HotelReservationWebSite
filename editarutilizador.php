<?php

include_once('Conexao.php');
$sql = "UPDATE utilizador SET Nome=?, Username=?, Email=?, Admin=? WHERE ID=?";
$stat=$conn->prepare($sql);
$stat->bind_param('sssii',$_POST["1"],$_POST["2"],$_POST["3"],$_POST["4"],$_POST["ID"]);
if ($stat->execute())
{   header("Location: adminutilizadores.php");
}else{
echo "Ocorreu um erro";
}
$stat->close();
$conn->close();

?>
