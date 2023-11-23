<?php
include "Conexao.php";
$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";

	$sql = $conn->prepare("SELECT * FROM pais WHERE paisNome LIKE ?");
	$sql->bind_param("s",$search_param);
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$countryResult[] = $row["paisNome"];
		}
		echo json_encode($countryResult);
	}

$conn->close();
?>
