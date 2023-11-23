<?php
include("Conexao.php");
if (!empty($_POST["NomeAlojamento"]) && !empty($_POST["Categoria"]) && !empty($_POST["Cidade"]) && !empty($_POST["Morada"]) && !empty($_POST["Descricao"]) && !empty($_POST["Preco"]) && !empty($_POST["Quarto"])) {
$NomeAlojamento = $_POST["NomeAlojamento"];
$Categoria = $_POST["Categoria"];
$Cidade = $_POST["Cidade"];
$Morada = $_POST["Morada"];
$Descricao = $_POST["Descricao"];
$Preco = $_POST["Preco"];
$Quartos = $_POST['Quarto'];
$Classificacao = $_POST['rate'];



$MyValue = explode(',', $Cidade);

$Cidade = $MyValue[0];
$Pais = $MyValue[1];



$stmt = $conn->prepare("INSERT INTO alojamento (Nome, Categoria, Cidade, Pais, Descricao, Morada, Preco, Classificacao) VALUES (?, ?, ?,?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssii",$NomeAlojamento,$Categoria,$Cidade,$Pais,$Descricao,$Morada,$Preco,$Classificacao);



if ($stmt->execute()) {
$last_id = $conn->insert_id;
$Disponivel = 1;


$move = "D:/xampp/htdocs/PAP/images/";
$filename =  $_FILES["files"]['name'];



$tmpname =  $_FILES["files"]['tmp_name'];
$filetype = $_FILES["files"]['type'];


for ($i=0; $i <= count($tmpname)-1 ; $i++) {
$tipos = array("image/jpeg", "image/jpg", "image/png");
if(!in_array($filetype[$i], $tipos)) {
  $_SESSION['erro'] = "O ficheiro inserido não é uma imagem";
  header('location: adminalojamentos.php');

exit();
}
}


for ($i=0; $i <= count($tmpname)-1 ; $i++) {
$name = addslashes($filename[$i]);
$tmp = addslashes(file_get_contents($tmpname[$i]));
$temp = explode(".", $filename[$i]);
$newfilename = round(microtime(true) + $i) . '.' . end($temp);

$filename[$i] = $newfilename;
  move_uploaded_file($tmpname[$i], $move.$newfilename);


if ($i==0){
  $stmt3 = $conn->prepare("UPDATE alojamento SET thumbnail = '" . $filename[$i] . "' where ID = '" . $last_id . "'");
  $stmt3->execute();

}

$stmt2 = $conn->prepare("INSERT INTO imagem (IDProduto,CaminhoImagem) VALUES (?, ?)");
$stmt2->bind_param("is",$last_id,$filename[$i]);
$stmt2->execute();
}
for ($i=1; $i<$Quartos+1 ; $i++)
{

  $socorro = $conn->query("INSERT INTO quarto (NQuarto,IDAlojamento,Disponivel) VALUES ($i,$last_id,$Disponivel)");

}

}else {
  $_SESSION['erro'] = "Não pode deixar campos vazios";

  header('location: adminalojamentos.php');
}

}else{
  session_start();
  $_SESSION['erro'] = "Não pode deixar campos vazios";
  header('location: adminalojamentos.php');

}

  header('location: adminalojamentos.php');






?>
