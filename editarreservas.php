<?php
include('Conexao.php');
$sql = "UPDATE reserva SET IDUtilizador=?, IDAlojamento=?, NQuarto=?, DataInicio=?, DataFim=?, Hospedes=?, Total= ? WHERE ID=?";
$stat=$conn->prepare($sql);
$stat->bind_param('iiissiii',$_POST["1"],$_POST["2"],$_POST["3"],$_POST["4"],$_POST["5"],$_POST["6"],$_POST["7"],$_POST["0"]);
if ($stat->execute())
{
}else{
echo $_POST["1"],$_POST["2"],$_POST["3"],$_POST["4"],$_POST["5"],$_POST["6"],$_POST["7"],$_POST["0"],$_POST["ID"];
}
$stat->close();
$conn->close();

?>
