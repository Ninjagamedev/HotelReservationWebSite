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
	<link rel="stylesheet" type="text/css" href="css/marcar.css">
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

	<div class="limiter">
		<?php
	include "Conexao.php";
		include "navbar.php";

		?>
		<div class="container-login100" style="background-image: url('images/backgroundconfirma.jpg'); display:flex; flex-direction:column;justify-content: space-between;padding:40px;">

	<?php
$sql = "SELECT utilizador.ID as ID FROM utilizador Where utilizador.Username='".$_SESSION['username']."'LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
			$IDUtilizador = $row["ID"];
	}
	}

$sql2 = "SELECT quarto.NQuarto as ID FROM quarto,alojamento Where alojamento.ID=quarto.IDAlojamento and quarto.Disponivel = 1 LIMIT 1";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
	while($row = $result2->fetch_assoc()) {
		$IDQuarto = $row["ID"];
	}
}
		if (isset($_POST['Horario'])) {

if(!isset($_SESSION["carrinho"])){

$_SESSION["carrinho"]=[];
}
			$Quantidade = count($_SESSION["carrinho"]);
			$Reserva = array(
        'ID_Reserva'       => $Quantidade,

				'ID_Utilizador'			=>	$IDUtilizador,

				'IDAlojamento'			=>	$_POST["ID"],

				'NQuarto'		=> $IDQuarto,
				'DataInicio' =>$_POST['DataInicio'],
				'DataFim' => $_POST['DataFim'],
				'Hospedes' => $_POST['Adultos'] + $_POST['Criancas'],

				'Horario'=> $_POST['Horario'],


				'Total' => ($_POST['Preco'] * ($_POST['Adultos'] + $_POST['Criancas'])) * $_POST['Dias'],

			);
			$_SESSION["carrinho"][$Quantidade] = $Reserva;
	}else {
		if(!isset($_SESSION["carrinho"])){

		$_SESSION["carrinho"]=[];
		}
					$Quantidade = count($_SESSION["carrinho"]);
					$Reserva = array(
		        'ID_Reserva'       => $Quantidade,

						'ID_Utilizador'			=>	$IDUtilizador,

						'IDAlojamento'			=>	$_POST["ID"],

						'NQuarto'		=> $IDQuarto,
						'DataInicio' =>$_POST['DataInicio'],
						'DataFim' => $_POST['DataFim'],
						'Hospedes' => $_POST['Adultos'],




						'Total' => ($_POST['Preco'] * ($_POST['Adultos'] + $_POST['Criancas'])) * $_POST['Dias'],

					);
					$_SESSION["carrinho"][$Quantidade] = $Reserva;
	}
	 ?>

			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33" style="padding:100px;">

		<div class="paymentCont">
						<div class="headingWrap">
								<h1 class="">Reserva Realizada</h1>
						</div>
            <br>
            <a href="Carrinho.php">
            <button href="Carrinho.php" class="login100-form-btn" name="login_user">
              Prosseguir para o pagamento
            </button>
              </a>
            <br>
            <a href="index.php">
            <button class="login100-form-btn" name="login_user">
              Voltar á pagina inicial
            </button>
            </a>


	</div>
			</div><span></span>
		</div>
	</div>


</body>
</html>
