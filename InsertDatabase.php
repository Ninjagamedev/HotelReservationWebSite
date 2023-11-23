<?php
			include "Conexao.php";
			session_start();

if(isset($_POST['submit'])){

	foreach($_SESSION["carrinho"] as $values)
	{
		$IDUtilizador = $values["ID_Utilizador"];
		$ID_Reserva = $values['ID_Reserva'];
		$IDAlojamento = $values['IDAlojamento'];
		$NQuarto = $values['NQuarto'];
		$DataInicio=$values['DataInicio'];
		$DataFim=$values['DataFim'];
		$Hospedes=$values['Hospedes'];

		$Total=$values['Total'];


		$stmt = $conn->prepare("INSERT INTO reserva (ID, IDUtilizador, IDAlojamento,NQuarto,DataInicio,DataFim, Hospedes, Total) VALUES (?,?,?,?,?,?,?,?)");
		$stmt->bind_param('iiiissii', $ID_Reserva, $IDUtilizador, $IDAlojamento,$NQuarto,$DataInicio,$DataFim,$Hospedes,$Total);
		$stmt->execute();
		$stmt2 = $conn->prepare("UPDATE quarto SET Disponivel = 0 WHERE NQuarto = ? and IDAlojamento = ?");
		$stmt2->bind_param('ii', $NQuarto,$IDAlojamento);
		$stmt2->execute();

	}
	$stmt->close();
	$conn->close();
        header('Location: '.$_SERVER['REQUEST_URI']);
				exit();
	}




?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="css/Cards.css"/>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="aos.js"></script>
<script type="text/javascript" src="typeahead.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
<?php 	include "navbar.php"; ?>
	<div class="limiter">

		<div class="container-login100" style="background-image: url('images/bg-01.jpg'); display:flex; flex-direction:column;justify-content: space-between;padding:40px;">

<div class="centrar" style="display:flex; flex-direction:column;justify-content: space-between;padding:40px;">


			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33" style="padding:50px;margin-bottom:200px;">
				              <legend style="font-size:40px;">Compra realizada com sucesso!</legend>

											<br><br>
											<form  method="post" action="criar_pdf.php" class="form-horizontal" role="form" style="font-size:25px;">
		                  <button type="submit" value="submit" class="login100-form-btn" name="submit">Ver Fatura e enviar para o email</button>
											</form>
									<br>
									<br>
									<form  method="post" action="index.php" class="form-horizontal" role="form" style="font-size:25px;">
									<button type="submit" value="submit" class="login100-form-btn" name="submit">Voltar á pagina inicial</button>
									</form>

	</div>
</div>
	</div>
</div>

</body>
</html>
