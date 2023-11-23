<?php
include_once('Conexao.php');
session_start();
session_destroy();
header ("location: index.php");
 ?>
