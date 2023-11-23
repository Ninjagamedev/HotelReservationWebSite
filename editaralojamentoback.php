<?php
include("Conexao.php");

if (!empty($_POST["NomeAlojamento"]) && !empty($_POST["Morada"]) && !empty($_POST["Cidade"]) && !empty($_POST["Categoria"])) {
$last_id = $_POST["ID"];
$NomeAlojamento = $_POST["NomeAlojamento"];
$Categoria = $_POST["Categoria"];
$Cidade = $_POST["Cidade"];
$Morada = $_POST["Morada"];
$Descricao = $_POST["Descricao"];
$Preco = $_POST['Preco'];
if (isset($_POST['submit'])) {

  $move = "D:/xampp/htdocs/PAP/images/";
  $filename =  $_FILES['Thumbnail']['name'];
  $tmpname = $_FILES['Thumbnail']['tmp_name'];
  $filetype = $_FILES['Thumbnail']['type'];
  $tipos = array("image/jpeg", "image/jpg", "image/png");
  if(!in_array($filetype, $tipos)) {
  echo $filename;
  }else{
    $temp = explode(".", $filename);
    $newfilename = round(microtime(true)) . '.' . end($temp);

      $location = $move . $filename;
      move_uploaded_file($tmpname, $move.$newfilename);

    $stmt3 = $conn->prepare("UPDATE alojamento SET Thumbnail=? Where ID = ?");
    $stmt3->bind_param('si',$newfilename,$last_id);
    $stmt3->execute();
  }

}else {
  $Thumbnail = $_POST['thumbnailtext'];
}

$Classificacao = $_POST['rate'];
$Contador = $_POST['ImagensInput'];


$MyValue = explode(',', $Cidade);

$Cidade = $MyValue[0];
$Pais = $MyValue[1];

$sql = "UPDATE alojamento SET Nome=?, Categoria=?, Cidade=?,Pais=?, Descricao=?, Morada=?, Classificacao=?,Preco=? WHERE ID=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param('ssssssiii',$NomeAlojamento,$Categoria,$Cidade,$Pais,$Descricao,$Morada,$Classificacao,$Preco,$last_id);

if ($stmt->execute()) {

for ($i=0; $i < $Contador ; $i++) {
    $IDImagem = $_POST['id'.$i.''];

if (isset($_POST['submit'])) {

  $move = "D:/xampp/htdocs/PAP/images/";
  $filename =  $_FILES['img'.$i.'']['name'];
  $tmpname = $_FILES['img'.$i.'']['tmp_name'];
  $filetype = $_FILES['img'.$i.'']['type'];
  $tipos = array("image/jpeg", "image/jpg", "image/png");
  if(!in_array($filetype, $tipos)) {
  echo $filename;
  }else{
    $temp = explode(".", $filename);
    $newfilename = round(microtime(true)) . '.' . end($temp);

      $location = $move . $filename;
      move_uploaded_file($tmpname, $move.$newfilename);
    $stmt2 = $conn->prepare("UPDATE imagem SET CaminhoImagem=? Where IDProduto = ? and ID = ?");
    $stmt2->bind_param('sii',$newfilename,$last_id,$IDImagem);
    $stmt2->execute();
  }
  header('location: adminalojamentos.php');

}else {
  header('location: adminalojamentos.php');

}


}





}
}








?>
