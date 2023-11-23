<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="css/Cards.css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<title>Home</title>
</head>
<?php
include('Conexao.php');
include_once('navbar.php');?>
	<body>
<div class="Background" style="height:120vh;">





<?php



  if(isset($_GET["Id"]))
  {

    foreach($_SESSION["carrinho"] as $keys => $values)
    {
      if($values["ID_Reserva"] == $_GET["Id"])
      {
        unset($_SESSION["carrinho"][$keys]);
      }
    }
  }



?>





			<div class="table-responsive">
				<table class="table table-bordered" style="border-radius:5px;">
					<tr>
						<th  class="table" style="font-size:15px;width:100px;"></th>
						<th  class="table" style="font-size:15px;;width:30px;">Hotel/Atividade</th>
						<th  class="table" style="font-size:15px;;width:30px;">Data Check-In</th>
						<th  class="table" style="font-size:15px;width:30px;">Data Check-Out</th>
						<th  class="table" style="font-size:15px;width:10px;">Hóspedes/Participantes</th>
						<th  class="table" style="font-size:15px;width:30px;">Total</th>
						<th  class="table" style="font-size:15px;width:30px;">Eliminar</th>
					</tr>
					<?php

					if(!empty($_SESSION["carrinho"]))
					{
						$total = 0;
						foreach($_SESSION["carrinho"] as $keys => $values)
						{
                $ID_Utilizador = $values["ID_Utilizador"];

								$ID_Alojamento = $values["IDAlojamento"];
					?>
					<?php
						$sql1 ="SELECT username FROM utilizador WHERE ID= $ID_Utilizador ";
						$result1= $conn->query($sql1);
						$row1=$result1->fetch_assoc();

						$sql2 =						"(SELECT Thumbnail,Nome FROM alojamento WHERE ID = '".$ID_Alojamento."')
																 UNION
																 (SELECT Thumbnail,Nome FROM atividade WHERE ID = '".$ID_Alojamento."')";


						$result2= $conn->query($sql2);
						$row2=$result2->fetch_assoc();
						?>

						<td class="table black white-text" style="font-size:15px;width:100px;"><?php

						echo'
											<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="" style="width:250px;height:130px;"
												 data-image="http://localhost/pap/images/' . $row2['Thumbnail'] . '"
												 data-target="#image-gallery">
													<img class="img-thumbnail" style="width:250px;height:130px;"
															 src="http://localhost/pap/images/' . $row2['Thumbnail'] . '"
															 alt="Another alt text">
											</a>

						';

            ?>
          </td>

						<td class="table black white-text" style="font-size:15px;width:100px;"><?php

            echo $row2["Nome"];

            ?>
          </td>

						<td class="table black white-text" style="font-size:15px;width:30px;"> <?php

            echo $values["DataInicio"]
            ?>
          </td>

					<td class="table black white-text" style="font-size:15px;width:30px;"> <?php

					echo $values["DataFim"]
					?>
				</td>
				<td class="table black white-text" style="font-size:15px;width:30px;"> <?php

				echo $values["Hospedes"];
				?>

				</td>
				<td class="table black white-text" style="font-size:15px;width:30px;"> <?php
				$total = $total + $values["Total"];
				echo $values["Total"];
				?>
			</td>
			<td class="table black white-text" style="font-size:15px;width:100px;"><?php

			echo'<a class="delete" title="Delete" data-toggle="tooltip" style="color:black;" href="carrinho.php?Id='.$values['ID_Reserva'].'"><i class="material-icons">&#xE872;</i></a></td>';


			?>

							</tr>
					<?php

						}
					}
					?>

				</table>
        <form action="Marcarx.php" method="post" autocomplete="off">
					<input type="number" name="total" value="<?php 	echo $total; ?>" hidden>
					<?php
					if(isset($_SESSION['carrinho'])){
						echo'<button class="btn btn-outline-primary waves-effect" type="submit" name="submit">Proceder para o pagamento</button>';
					}else {
						echo'<button class="btn btn-outline-primary waves-effect" type="submit" name="submit" disabled>Proceder para o pagamento</button>';
					}
					 ?>

      </form>
			</div>
		</div>
	</div>
	<br /><br><br><br>
</div>

	</body>
</html>
