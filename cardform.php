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

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="aos.js"></script>
<script type="text/javascript" src="typeahead.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
	<?php
	include "Conexao.php";
	include "navbar.php";


	?>
	<div class="limiter">

		<div class="container-login100" style="background-image: url('images/bg-01.jpg'); display:flex; flex-direction:column;justify-content: space-between;padding:40px;">


			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33" style="padding:50px;">

        <form  method="post" action="InsertDatabase.php" class="form-horizontal" role="form" style="font-size:25px;">
              <legend style="font-size:40px;">Pagamento</legend>

              <div class="form-group">
                <label class="col-sm-7 control-label" for="card-holder-name">Titular do cartão</label>
                <div class="col-sm-12">

                  <input type="text" class="input100" name="card-holder-name" id="card-holder-name" placeholder="Nome do titular do cartão *" style="height:35px;width:75%;font-size:15px;border:1px solid;" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-7 control-label" for="card-number">Numero do cartão</label>
                <div class="col-sm-12">
                  <input type="text" class="input100" name="card-number" id="card-number" placeholder="Numero de cartão *" style="height:35px;width:75%;font-size:15px;border:1px solid;" required>
                </div>

              </div>
              <div class="form-group">
                <label class="col-sm-7 control-label" for="expiry-month">Valido até</label>
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-12">
                      <select class="form-control col-sm-12" name="expiry-month" id="expiry-month" style="height:35px;width:100%;font-size:15px;margin-left:15px;border:1px solid;" required>
                        <option>Mês</option>
                        <option value="01">Janeiro (01)</option>
                        <option value="02">Fevereiro (02)</option>
                        <option value="03">Março (03)</option>
                        <option value="04">Abril (04)</option>
                        <option value="05">Maio (05)</option>
                        <option value="06">Junho (06)</option>
                        <option value="07">Julho (07)</option>
                        <option value="08">Agosto (08)</option>
                        <option value="09">Setembro (09)</option>
                        <option value="10">Outubro (10)</option>
                        <option value="11">Novembro (11)</option>
                        <option value="12">Dezembro (12)</option>
                      </select>
                    </div>
                    <div class="col-xs-12">
                      <select class="form-control" name="expiry-year" style="height:35px;width:100%;font-size:15px;margin-left:15px;border:1px solid;" required>
                        <option value="20">2020</option>
                        <option value="21">2021</option>
                        <option value="22">2022</option>
                        <option value="23">2023</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-7 control-label" for="cvv">Código de verificação</label>
                <div class="col-sm-12">
                  <input type="text" class="input100" name="cvv" id="cvv" placeholder="CCV *" style="height:35px;width:30%;font-size:15px;border:1px solid;">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                      <br>
                  <button type="submit" value="submit" class="login100-form-btn" name="submit">Realizar Pagamento</button>
                </div>
              </div>
          </form>
			</div><span></span>
		</div>
	</div>


</body>
</html>
