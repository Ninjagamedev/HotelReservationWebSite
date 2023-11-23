<?php
include("Conexao.php");

if(isset($_POST['submit']))
{
$Email = $_POST['Email'];

$Password = $_POST['Password'];
$Username = $_POST['Username'];

$move = "D:/xampp/htdocs/PAP/images/";

$filename =  $_FILES['Thumbnail']['name'];
$tmpname = $_FILES['Thumbnail']['tmp_name'];
$filetype = $_FILES['Thumbnail']['type'];
$tipos = array("image/jpeg", "image/jpg", "image/png");
if(!in_array($filetype, $tipos)) {
  $sql = "UPDATE utilizador SET Email=?, Password=? WHERE Username=?";
  $stmt=$conn->prepare($sql);
  $stmt->bind_param('sss',$Email,$Password,$Username);

$stmt->execute();
}else{
$temp = explode(".", $filename);
$newfilename = round(microtime(true)) . '.' . end($temp);

  $location = $move . $filename;
  move_uploaded_file($tmpname, $move.$newfilename);
  $Perfil = $newfilename;
  $sql = "UPDATE utilizador SET Email=?, Password=?, PerfilFoto=? WHERE Username=?";
  $stmt=$conn->prepare($sql);
  $stmt->bind_param('ssss',$Email,$Password,$Perfil,$Username);

  $stmt->execute();

}
  header('location: index.php');

}
  header('location: index.php');

?>
