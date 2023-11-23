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
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<?php
session_start();
if(isset($_SESSION['erro']) || isset($_SESSION['erro2']))
{
	echo '<div class="Erro ErroFadeOut">Nome de Utilizador ou Email já existem</div>';
	unset($_SESSION['erro']);
	unset($_SESSION['erro2']);
}

 ?>


	<div class="limiter">
			<?php include "navbar.php";?>
		<div class="container-login100" style="background-image: url('images/backgroundconfirma.jpg');">

			<div class="wrap-login100 p-l-100 p-r-100 p-t-62 p-b-33" style="margin-top:20px;margin-bottom:20px;">
				<form class="login100-form validate-form flex-sb flex-w" action="server.php" method="post">
					<span class="login100-form-title p-b-70">
						Criar Conta
					</span>
					<div>
						<span class="txt1">
							Nome
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Email necessário">
						<input class="input100" type="text" name="nome" required>
						<span class="focus-input100"></span>
					</div>
					<div>
						<span class="txt1">
							Email
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Email necessário">
						<input class="input100" type="text" name="email"  required>
						<span class="focus-input100"></span>
					</div>
					<div>
						<span class="txt1">
							Nome de utilizador
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Nome de utilizador necessário">
						<input class="input100" type="text" name="username" required>
						<span class="focus-input100"></span>
					</div>

					<div>
						<span class="txt1">
							Password
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password_1" required>
						<span class="focus-input100"></span>
					</div>

					<div>
						<span class="txt1">
							Confirmar password
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password_2" required>
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" name="reg_user">
							Sign In
						</button>
					</div>

					<div class="w-full text-center p-t-55">
						<span class="txt2">
							Já tem uma conta?
						</span>

						<a href="Login.php" class="txt2">
							Iniciar Sessão
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
