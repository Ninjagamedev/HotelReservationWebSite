<?php

include_once('Conexao.php');
$sql = "UPDATE quarto SET Disponivel=? WHERE ID=?";
$stat=$conn->prepare($sql);
$stat->bind_param('ii',$_POST["3"],$_POST["ID"]);
if ($stat->execute())
{   header("Location: adminquartos.php");
}else{
echo "Ocorreu um erro";
}
$stat->close();
$conn->close();

?>
