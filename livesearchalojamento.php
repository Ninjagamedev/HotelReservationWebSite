<?php
include "Conexao.php";
$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";




	$sql = $conn->prepare("SELECT nome,Pais FROM cidade WHERE nome LIKE ?");
	$sql->bind_param("s",$search_param);
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$countryResult[] = $row["nome"].",".$row["Pais"];
		}

	}
	echo json_encode($countryResult);
$conn->close();
?>
