<?php
include("Conexao.php");

if (!empty($_POST["NomeCidade"]) && !empty($_POST["Pais"])) {
$last_id = $_POST["ID"];
$Nome = $_POST["NomeCidade"];
$Pais = $_POST["Pais"];
$Descricao = $_POST["Descricao"];
  $newfilename = $_POST['thumbnailtext'];
if (isset($_POST['submit'])) {

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

  }


$sql = "UPDATE cidade SET Nome=?, Pais=?, Descricao=?, Imagem=? WHERE ID=?";
$stmt=$conn->prepare($sql);
$stmt->bind_param('ssssi',$Nome,$Pais,$Descricao,$newfilename,$last_id);

if ($stmt->execute()) {


  header('location: admincidades.php');


}

}












?>
