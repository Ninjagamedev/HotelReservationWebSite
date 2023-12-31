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

	<div class="limiter">
		<?php include "navbar.php";?>
		<div class="container-login100" style="background-image: url('images/backgroundconfirma.jpg'); display:flex; flex-direction:column;justify-content: space-between;">

			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33" style="margin-top:100px;">
				<form class="login100-form validate-form flex-sb flex-w" action="server.php" method="post">
					<span class="login100-form-title p-b-53">
						Iniciar sessão
					</span>
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Nome de utilizador
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Nome de utilizador necessário">
						<input class="input100" type="text" name="username" required>
						<span class="focus-input100"></span>
					</div>

					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" required>
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn" name="login_user">
							Iniciar Sessão
						</button>
					</div>

					<div class="w-full text-center p-t-55">
						<span class="txt2">
							Ainda não é membro?
						</span>

						<a href="register.php" class="txt2">
							Crie uma conta
						</a>
					</div>
				</form>
			</div><span></span>
		</div>
	</div>


</body>
</html>
