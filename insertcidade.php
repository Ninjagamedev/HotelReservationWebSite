<?php

include("Conexao.php");
  session_start();
if(isset($_POST['submit']))
{
  $Nome = $_POST['Nome'];

$Pais = $_POST['Pais'];
  $sql = $conn->prepare("SELECT paisNome FROM pais WHERE paisNome LIKE '%".$Pais."%' LIMIT 1");
  $sql->execute();

  $result = $sql->get_result();
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    $Pais = $row['paisNome'];
    }
  }else{
    $Pais = "Invalido";
  }
if($Pais ==  "Invalido"){
  $_SESSION['erro'] = "O País escolhido não existe";

  header('location: admincidades.php');

exit();

}
$Descricao = $_POST['Descricao'];

$move = "D:/xampp/htdocs/PAP/images/";

$filename =  $_FILES['Thumbnail']['name'];
$tmpname = $_FILES['Thumbnail']['tmp_name'];
$filetype = $_FILES['Thumbnail']['type'];
$tipos = array("image/jpeg", "image/jpg", "image/png");
if(!in_array($filetype, $tipos)) {

}else{
$temp = explode(".", $filename);
$newfilename = round(microtime(true)) . '.' . end($temp);

  $location = $move . $filename;
  move_uploaded_file($tmpname, $move.$newfilename);
}
$CidadeImagem = $newfilename;

$stmt = $conn->prepare("INSERT INTO Cidade (Nome, Pais, Descricao, Imagem) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss",$Nome,$Pais,$Descricao,$CidadeImagem);


$stmt->execute();
  header('location: admincidades.php');
}
?>
