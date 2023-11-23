<!DOCTYPE html>

<html lang="en-US" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="css/PaginaHotel.css"/>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="aos.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<title>NowTravel</title>
</head>


<body  style="transform: none;">


	<?php
	include "Conexao.php";
	session_start();
	if(isset($_SESSION['username']))
	{

	}else {

		header("Location: register.php");


	}
include "navbar.php";



	$ID = $_GET['ID'];

	if(isset($_GET['DataInicio'])){
	$DataInicio= $_GET['DataInicio'];
	$DataFim= $_GET['DataFim'];
	$Dias= $_GET['Dias'];
	$Adultos = $_GET['Adultos'];
	$Criancas = $_GET['Criancas'];

}

$sql = "(SELECT Categoria as Tipo FROM alojamento WHERE ID = '".$ID."')
				 UNION
				 (SELECT Categoria as Tipo FROM atividade WHERE ID = '".$ID."')";


				 $res_data = mysqli_query($conn,$sql);


		 while($row = mysqli_fetch_array($res_data)){
	$Tipo = $row['Tipo'];
		 }
 if ($Tipo == "Hotel" ||  $Tipo == "Motel" ||  $Tipo == "Resort") {
 	$sql = "SELECT ID ,Nome,Categoria,Descricao,Morada,Cidade,Pais,Preco, Classificacao, Thumbnail FROM alojamento Where ID = ".$ID."";
$Horario = 0;
}elseif ($Tipo == "Tours" ||  $Tipo == "Mergulho" ||  $Tipo == "Escalada"){
 		$sql = "SELECT ID ,Nome,Categoria,Descricao,Morada,Cidade,Pais,Preco,Horario,Classificacao, Thumbnail FROM atividade Where ID = ".$ID."";
$Horario = 1;
 }


 $res_data = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res_data)){
	if ($Horario == 1) {
		$Horario = $row['Horario'];
	}else {
		$Horario = 0;

	}
 }
  ?>







<div class="c-wrapper">
	<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
	    <!--Indicators-->
	    <ol class="carousel-indicators">
				<?php
	$sql = "SELECT Count(CaminhoImagem) as Numero FROM imagem Where IDProduto = ".$ID."";
	$res_data = mysqli_query($conn,$sql);

 while($row = mysqli_fetch_array($res_data)){
for ($i=0; $i < $row['Numero'] ; $i++) {
	if($row['Numero'] == 1){

	echo'<li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>';
	}else {

	echo'<li data-target="#carousel-example-2" data-slide-to="'.$i.'"></li>';
	}
}

}
				 ?>

	    </ol>
			<script type="text/javascript">
			$.each( jQuery('.carousel .item'), function( i, val ) {
	 $(this).css('background-image','url('+$(this).find('img').attr('src')+')').css('background-size','cover').find('img').css('visibility','hidden');
 });

			</script>
	    <!--/.Indicators-->
	    <!--Slides-->
	    <div class="carousel-inner" role="listbox" style=" ; max-height:750px !important;">
				<?php
	$sql = "SELECT CaminhoImagem as Imagem FROM imagem Where IDProduto = ".$ID."";
	$res_data = mysqli_query($conn,$sql);
$x = 0;
 while($row = mysqli_fetch_array($res_data)){

	if($x == 0){

	echo' <div class="carousel-item active">
	<div class="view">
			<img class="d-block w-100"src="http://localhost/pap/images/' . $row['Imagem'] . '"  alt="Second slide">
			<div class="mask rgba-black-strong"></div>
	</div>
	 </div>';
	}else {

	echo'<div class="carousel-item">
			<!--Mask color-->
			<div class="view">
					<img class="d-block w-100"src="http://localhost/pap/images/' . $row['Imagem'] . '"  alt="Second slide">
					<div class="mask rgba-black-strong"></div>
			</div>

	</div>';
	}

$x++;
}
				 ?>


	    </div>
	    <!--/.Slides-->
	    <!--Controls-->
	    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
	        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	        <span class="sr-only">Previous</span>
	    </a>
	    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
	        <span class="carousel-control-next-icon" aria-hidden="true"></span>
	        <span class="sr-only">Next</span>
	    </a>
	    <!--/.Controls-->
	</div>
	</div>

<section class="main-content-area detail-property-page detail-property-page-v1" style="transform: none;">
    <div class="container" style="transform: none;">
        <div class="row" style="transform: none;">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="content-area">
                    <div class="title-section">
    <div class="block block-top-title">
        <div class="block-body">
         <h1>
					 <?php
					  if ($Tipo == "Hotel" ||  $Tipo == "Motel" ||  $Tipo == "Resort") {
		 $sql = "SELECT Nome FROM alojamento Where ID = ".$ID."";
		 $res_data = mysqli_query($conn,$sql);

		while($row = mysqli_fetch_array($res_data)){
			echo $row['Nome'];

	 }
 }elseif ($Tipo == "Tours" ||  $Tipo == "Mergulho" ||  $Tipo == "Escalada"){
	 $sql = "SELECT Nome FROM atividade Where ID = ".$ID."";
	 $res_data = mysqli_query($conn,$sql);

	while($row = mysqli_fetch_array($res_data)){
		echo $row['Nome'];
 }
}
						?>
            </h1>

                        <address><i class="fa fa-map-marker" aria-hidden="true"></i>

													<?php
													if ($Tipo == "Hotel" ||  $Tipo == "Motel" ||  $Tipo == "Resort") {
										$sql = "SELECT Morada,Cidade,Pais FROM alojamento Where ID = ".$ID."";
										$res_data = mysqli_query($conn,$sql);

									 while($row = mysqli_fetch_array($res_data)){
										 echo ''.$row['Morada'].','.$row['Cidade'].','.$row['Pais'].'';

									}
									 }elseif ($Tipo == "Tours" ||  $Tipo == "Mergulho" ||  $Tipo == "Escalada"){
										 $sql = "SELECT Morada,Cidade,Pais FROM atividade Where ID = ".$ID."";
 										$res_data = mysqli_query($conn,$sql);

 									 while($row = mysqli_fetch_array($res_data)){
 										 echo ''.$row['Morada'].','.$row['Cidade'].','.$row['Pais'].'';
										 }
									 }

													 ?>
												 </address>


                    </div><!-- block-body -->
    </div><!-- block -->
</div><!-- title-section --><div id="about-section" class="about-section">


        <div class="block">
        <div class="block-body">
            <h2>Descrição</h2>
            <p>													<?php
						if ($Tipo == "Hotel" ||  $Tipo == "Motel" ||  $Tipo == "Resort") {
																$sql = "SELECT Descricao FROM alojamento Where ID = ".$ID."";
																$res_data = mysqli_query($conn,$sql);

															 while($row = mysqli_fetch_array($res_data)){
																 echo $row['Descricao'];

															}
															}elseif ($Tipo == "Tours" ||  $Tipo == "Mergulho" ||  $Tipo == "Escalada"){
																$sql = "SELECT Descricao FROM atividade Where ID = ".$ID."";
																$res_data = mysqli_query($conn,$sql);

															 while($row = mysqli_fetch_array($res_data)){
																 echo $row['Descricao'];
															}
														}
																			 ?>
																		 </p>
        </div>
    </div><!-- block-body -->



</div>
<div id="gallery-section" class="gallery-section">
	<div class="row">
		<div class="row">


			<?php
		$sql = "SELECT CaminhoImagem as Imagem FROM imagem Where IDProduto = ".$ID."";
		$res_data = mysqli_query($conn,$sql);
		$x = 0;
		while($row = mysqli_fetch_array($res_data)){



		echo' 			<div class="col-lg-3 col-md-4 col-xs-6 thumb" >
							<a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="" style="width:250px;height:130px;"
								 data-image="http://localhost/pap/images/' . $row['Imagem'] . '"
								 data-target="#image-gallery">
									<img class="img-thumbnail" style="width:250px;height:130px;"
											 src="http://localhost/pap/images/' . $row['Imagem'] . '"
											 alt="Another alt text">
							</a>
					</div>
		';


		$x++;
		}
			 ?>






        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="" style="width:100%;height:500px;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>







<div id="availability-section" class="availability-section">
    <div class="block">

    </div><!-- block -->
</div>
<div id="reviews-section" class="reviews-section">



	<input type="hidden" name="review_listing_id" id="review_listing_id" value="267">
	<input type="hidden" name="review_paged" id="review_paged" value="1">
	<input type="hidden" name="total_pages" id="total_pages" value="1">
	<input type="hidden" name="page_sort" id="page_sort" value="">
	<ul id="homey_reviews" class="list-unstyled">

				<li id="review-808" class="review-block">

		</li>
					</ul>

	</div><!-- reviews-section -->
	<div id="OutrosHoteis" class="OutrosHoteis">

	</div>
                </div>
            </div>
						  </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 homey_sticky" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

            <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"><div class="sidebar right-sidebar">
                <div id="homey_remove_on_mobile" class="sidebar-booking-module hidden-sm hidden-xs">
	<div class="block">
		<div class="sidebar-booking-module-header">
			<div class="block-body-sidebar">


					<span class="item-price">
					<sup>$</sup>			<?php
						if ($Tipo == "Hotel" ||  $Tipo == "Motel" ||  $Tipo == "Resort") {
															$sql = "SELECT Preco FROM alojamento Where ID = ".$ID."";
															$res_data = mysqli_query($conn,$sql);

														 while($row = mysqli_fetch_array($res_data)){
															 echo $row['Preco'];
$Preco = $row['Preco'];
echo "<sub>/Noite</sub>";
														}
													}elseif ($Tipo == "Tours" ||  $Tipo == "Mergulho" ||  $Tipo == "Escalada"){
														$sql = "SELECT Preco FROM atividade Where ID = ".$ID."";
														$res_data = mysqli_query($conn,$sql);

													 while($row = mysqli_fetch_array($res_data)){
														 echo $row['Preco'];
$Preco = $row['Preco'];
echo "<sub>/Sessão</sub>";
													}
												}
																		 ?>
					</span>


			</div>
		</div>
		<div class="sidebar-booking-module-body">
			<div class="homey_notification block-body-sidebar">

				<div id="single-listing-date-range" class="search-date-range">






				<div id="homey_booking_cost" class="payment-list"></div>

<form method="post" action="Confirmar.php">



				<input type="text" name="DataInicio" id="data1" value=" <?php echo ''.$DataInicio.''; ?>" hidden>
											<input type="text"  name="DataFim" id="data2" value="<?php echo ''.$DataFim.''; ?>" hidden>
											<input type="text" name="Dias" id="dias" value="<?php echo ''.$Dias.''; ?>" hidden>
<input type="text" name="ID" id="ID" value="<?php echo ''.$ID.''; ?>" hidden>
<input type="text" name="Tipo" id="Tipo" value="<?php echo ''.$Tipo.''; ?>" hidden>
<input type="text" name="Adultos" id="Adultos" value="<?php echo ''.$Adultos.''; ?>" hidden>
<input type="text" name="Criancas" id="Criancas" value="<?php echo ''.$Criancas.''; ?>" hidden>
<input type="text" name="Preco" id="Preco" value="<?php echo ''.$Preco.''; ?>" hidden>
<?php if ($Horario != 0){
echo '<input type="text" name="Horario" id="Horario" value="'.$Horario.'" hidden>';

} ?>



									<button id="instance_reservation" type="submit" class="btn btn-full-width btn-primary">Efectuar Reserva</button>

	</form>
		</div>

	</div>
</div>

                </div></div></div>
        </div>
    </div>
</section><!-- main-content-area -->


















<div class="pac-container pac-logo" style="display: none; width: 1844px; position: absolute; left: 20px; top: 1084px;"></div></body></html>


<script type="text/javascript">
let modalId = $('#image-gallery');

$(document)
.ready(function () {

	loadGallery(true, 'a.thumbnail');

	//This function disables buttons when needed
	function disableButtons(counter_max, counter_current) {
		$('#show-previous-image, #show-next-image')
			.show();
		if (counter_max === counter_current) {
			$('#show-next-image')
				.hide();
		} else if (counter_current === 1) {
			$('#show-previous-image')
				.hide();
		}
	}

	/**
	 *
	 * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
	 * @param setClickAttr  Sets the attribute for the click handler.
	 */

	function loadGallery(setIDs, setClickAttr) {
		let current_image,
			selector,
			counter = 0;

		$('#show-next-image, #show-previous-image')
			.click(function () {
				if ($(this)
					.attr('id') === 'show-previous-image') {
					current_image--;
				} else {
					current_image++;
				}

				selector = $('[data-image-id="' + current_image + '"]');
				updateGallery(selector);
			});

		function updateGallery(selector) {
			let $sel = selector;
			current_image = $sel.data('image-id');
			$('#image-gallery-title')
				.text($sel.data('title'));
			$('#image-gallery-image')
				.attr('src', $sel.data('image'));
			disableButtons(counter, $sel.data('image-id'));
		}

		if (setIDs == true) {
			$('[data-image-id]')
				.each(function () {
					counter++;
					$(this)
						.attr('data-image-id', counter);
				});
		}
		$(setClickAttr)
			.on('click', function () {
				updateGallery($(this));
			});
	}
});

// build key actions
$(document)
.keydown(function (e) {
	switch (e.which) {
		case 37: // left
			if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
				$('#show-previous-image')
					.click();
			}
			break;

		case 39: // right
			if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
				$('#show-next-image')
					.click();
			}
			break;

		default:
			return; // exit this handler for other keys
	}
	e.preventDefault(); // prevent the default action (scroll / move caret)
});

</script>
