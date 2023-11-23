<?php
include "Conexao.php";
session_start();
if(isset($_POST['submit'])){
            unset($_SESSION["carrinho"]);
            header('Location: '.$_SERVER['REQUEST_URI']);
            exit();
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/aos.css"/>
    <link rel="stylesheet" type="text/css" href="css/Tipos.css"/>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="css/Cards.css"/>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="aos.js"></script>
  <script type="text/javascript" src="typeahead.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title>Home</title>
  </head>
  <style>

  </style>
  <body>
    <script type="text/javascript">
      AOS.init({
        duration: 2400,
      }
    );

    </script>
<div class="Background">
  <?php


include "navbar.php";
  ?>
      <br>
      <br>
      <br>

      <div class="container-fluid">
<h3  data-aos="fade-up">Explorar o mundo nunca foi tão barato!</h3>
<div class="s002" data-aos="fade-up">
  <form class="" action="result.php" method="post">
    <div class="inner-form animacao">
      <div class="input-field first-wrap">
        <div class="icon-wrap">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
          </svg>
        </div>


        <input id="txtCountry" type="text" name="txtCountry"  placeholder="Procure um lugar"/>
      </div>
      <div class="input-field third-wrap" style="width:100px !important; ">
        <div class="icon-wrap">
          <svg xmlns="http://www.w3.org/2000/svg" width="45" height="24" viewBox="0 0 24 24">
            <path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"></path>
          </svg>
        </div>
        <input class="datepicker" id="depart" type="text"  />
      </div>

      <div class="input-field fouth-wrap" style="margin-left:0px;">
        <div class="icon-wrap">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
          </svg>
        </div>
        <select data-trigger="" name="Adultos">
          <option value="1">1 Adulto</option>
          <option value="2">2 Adultos</option>
          <option value="3">3 Adultos</option>
          <option value="4">4 Adultos</option>
          <option value="5">5 Adultos</option>
        </select>
      </div>
      <div class="input-field fouth-wrap" style="margin-left:1px;">
        <div class="icon-wrap">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
          </svg>
        </div>
        <select data-trigger="" name="Criancas">
          <option value="0">0 Crianças</option>
          <option value="1">1 Criança</option>
          <option value="2">2 Crianças</option>
          <option value="3">3 Crianças</option>
        </select>
      </div>
      <div class="input-field fifth-wrap">
        <input type="text" name="DataInicio" id="data1" value="0" hidden>
        <input type="text"  name="DataFim" id="data2" value="0" hidden>
        <input type="text" name="Dias" id="dias" value="0" hidden>
        <button type="submit" name="Pesquisa" class="btn-search">Procurar</button>
      </div>
    </div>
  </form>
</div>

<script src="js/extention/choices.js"></script>
<script src="js/extention/flatpickr.js"></script>
<script>










  flatpickr(".datepicker",
  {
    format: "d-m-Y",
altFormat: "d-m-Y",
altInput: true,
 minDate: "today",
 mode: "range",

 onChange: function(selectedDates, dateStr, instance) {
       data = selectedDates[0],


       data2  = selectedDates[1],

       dias = data2-data
       dias = dias/1000/60/60/24

       date = new Date(data),
 data = (date.getDate() + '/' + Number(date.getMonth() + 1) + '/' + date.getFullYear()),
       date = new Date(data2),
 data2 = (date.getDate() + '/' + Number(date.getMonth() + 1) + '/' + date.getFullYear()),

       $('#data1').attr('value', data)
       $('#data2').attr('value', data2)
       $('#dias').attr('value', dias)
   },
  });

</script>
<script>
  const choices = new Choices('[data-trigger]',
  {
    searchEnabled: false,
    itemSelectText: '',
  });

</script>
<!--
<div class="jumbotron" style="width:28rem;height:70vh;margin-left:5vw;border-radius:10px;border: solid black 0.5px">

<div align="center">
  <h4 style="margin-top:-30px;">Faça já a sua reserva</h4>
  <form name="Pesquisa" method="post" action="search.php">
    <input type = "number" hidden name = "data" required>
                <input type="text" class="Inicio" id="NomeHotel" name="NomeHotel" placeholder="Para onde vai?" style="padding-left: 10px;" required autocomplete="off"/>
                <br>
                <br>
                <input type="text" class="Inicio Data" id="stardate" name="DataInicio" placeholder="Data de Ida"required autocomplete="off"/>
                <input type="text" class="Inicio Data" id="enddate" name="DataFim" placeholder="Data de Regresso"required autocomplete="off"/>
                <br>
                <br>
              <button type="submit" class="btn btn-outline-primary waves-effect" id="buttonstart" name=Pesquisa style="margin-top:80px;">Pesquisar</button>
                </div>
</form>

</div>
-->
</div>
</div>
<div class="container-fluid" align=center style="margin-top:10vh;">
<div class="Alojamentos" data-aos="fade-up">




<h3 style="color:black !important">Tipos de Alojamentos</h3>
<br>
        <div class="row">
          <div class="col-sm-4">
            <a href="#" class="card" data-aos="fade-left" >
            	<div class="card__head">
            		<div class="card__image" style="background-image: url(images/HOTEL.jpg)"></div>
            	</div>
            	<div class="card__body">
            		<h2 class="card__headline">Hotel</h2>
            		<p class="card__text">Aqui pode encontrar os melhores Hoteis aos melhores preços, tanto para uma viagem sozinho, ou acompanhado.</p>
            	</div>
            	<div class="card__foot">
                  <form method="post" action="result.php">
                    <input type="text" name="DataInicio" id="data1" value="0" hidden>
                    <input type="text"  name="DataFim" id="data2" value="0" hidden>
                    <input type="text" name="Dias" id="dias" value="0" hidden>
                    <input type="text" name="Adultos" id="Adultos" value="1" hidden>
                    <input type="text" name="Criancas" id="Criancas" value="0" hidden>
            		<button type="submit" class="btn btn-latest" style="background-color:white;color:black;" name=Hotel>Pesquisar Hoteis</button>
                  </form>
            	</div>
            	<div class="card__border"></div>
            </a>
          </div>

          <div class="col-sm-4">
            <a href="#" class="card" data-aos="fade-up" >
            	<div class="card__head">
            		<div class="card__image" style="background-image: url(images/Motel.jpg)"></div>
            	</div>
            	<div class="card__body">
            		<h2 class="card__headline">Motel</h2>
            		<p class="card__text">Aqui pode encontrar os melhores Motéis aos melhores preços, tanto para uma viagem sozinho, ou acompanhado.</p>
            	</div>
            	<div class="card__foot">
                  <form method="post" action="result.php">
                    <input type="text" name="DataInicio" id="data1" value="0" hidden>
                    <input type="text"  name="DataFim" id="data2" value="0" hidden>
                    <input type="text" name="Dias" id="dias" value="0" hidden>
                    <input type="text" name="Adultos" id="Adultos" value="1" hidden>
                    <input type="text" name="Criancas" id="Criancas" value="0" hidden>
            		<button type="submit" class="btn btn-latest" style="background-color:white;color:black;" name=Motel>Pesquisar Motéis</button>
                  </form>
            	</div>
            	<div class="card__border"></div>
            </a>
          </div>
          <div class="col-sm-4">
            <a href="#" class="card" data-aos="fade-right" >
            	<div class="card__head">
            		<div class="card__image" style="background-image: url(images/Restort.jpg)"></div>
            	</div>
            	<div class="card__body">
            		<h2 class="card__headline">Resort</h2>
            		<p class="card__text">Aqui pode encontrar os melhores Resorts aos melhores preços, tanto para uma viagem sozinho, ou acompanhado.</p>
            	</div>
            	<div class="card__foot">
                  <form method="post" action="result.php">
                    <input type="text" name="DataInicio" id="data1" value="0" hidden>
                    <input type="text"  name="DataFim" id="data2" value="0" hidden>
                    <input type="text" name="Dias" id="dias" value="0" hidden>
                    <input type="text" name="Adultos" id="Adultos" value="1" hidden>
                    <input type="text" name="Criancas" id="Criancas" value="0" hidden>

            		<button type="submit" class="btn btn-latest" style="background-color:white;color:black;" name=Resort>Pesquisar Resorts</button>
                  </form>
            	</div>
            	<div class="card__border"></div>
            </a>
          </div>
        </div>
</div>
<br>
<br>
<br>
<br>
<div class="Atividades" data-aos="fade-up">
<h3 style="color:black !important">Tipos de Atividades</h3>
<br>
<div class="row">
  <div class="col-sm-4">
    <a href="#" class="card" data-aos="fade-left" >
      <div class="card__head">
        <div class="card__image" style="background-image: url(images/Tour.jpg)"></div>
      </div>
      <div class="card__body">
        <h2 class="card__headline">Tours</h2>
        <p class="card__text">Quer explorar um novo país? Uma nova Cidade? Não tem a certeza se consegue visitar tudo sozinho? Aqui na NowTravel oferecemos os melhores Tours pelos melhores preços</p>
      </div>
      <div class="card__foot">
          <form method="post" action="result.php">
            <input type="text" name="DataInicio" id="data1" value="0" hidden>
            <input type="text"  name="DataFim" id="data2" value="0" hidden>
            <input type="text" name="Dias" id="dias" value="0" hidden>
            <input type="text" name="Adultos" id="Adultos" value="1" hidden>
            <input type="text" name="Criancas" id="Criancas" value="0" hidden>
        <button type="submit" class="btn btn-latest" style="background-color:white;color:black;" name=Tours>Pesquisar Tours</button>
          </form>
      </div>
      <div class="card__border"></div>
    </a>
  </div>

  <div class="col-sm-4">
    <a href="#" class="card" data-aos="fade-up" >
      <div class="card__head">
        <div class="card__image" style="background-image: url(images/Mergulho.jpg)"></div>
      </div>
      <div class="card__body">
        <h2 class="card__headline">Mergulho</h2>
        <p class="card__text">Não se limite apenas por explorar a terra, explore o fundo dos Oceanos! Aqui na NowTravel oferecemos as melhores ofertas para quem quer exprimentar, ou para quem já experiente em Mergulho</p>
      </div>
      <div class="card__foot">
        <form method="post" action="result.php">
          <input type="text" name="DataInicio" id="data1" value="0" hidden>
          <input type="text"  name="DataFim" id="data2" value="0" hidden>
          <input type="text" name="Dias" id="dias" value="0" hidden>
          <input type="text" name="Adultos" id="Adultos" value="1" hidden>
          <input type="text" name="Criancas" id="Criancas" value="0" hidden>
        <button type="submit" class="btn btn-latest" style="background-color:white;color:black;" name=Mergulho>Pesquisar Mergulhos</button>
          </form>
      </div>
      <div class="card__border"></div>
    </a>
  </div>
  <div class="col-sm-4">
    <a href="#" class="card" data-aos="fade-right" >
      <div class="card__head">
        <div class="card__image" style="background-image: url(images/Escalada.jpeg)"></div>
      </div>
      <div class="card__body">
        <h2 class="card__headline">Escalada</h2>
        <p class="card__text">Deseja-se sentir o dono do mundo? Explorar os lugares mais altos e desbravar a natureza? Aqui na NowTravel oferecemos as melhores ofertas para quem gosta de se aventurar, sempre mantendo a segurança em primeiro lugar!</p>
      </div>
      <div class="card__foot">
        <form method="post" action="result.php">
          <input type="text" name="DataInicio" id="data1" value="0" hidden>
          <input type="text"  name="DataFim" id="data2" value="0" hidden>
          <input type="text" name="Dias" id="dias" value="0" hidden>
          <input type="text" name="Adultos" id="Adultos" value="1" hidden>
          <input type="text" name="Criancas" id="Criancas" value="0" hidden>
        <button type="submit" class="btn btn-latest" style="background-color:white;color:black;" name=Escalada>Pesquisar Escaladas</button>
          </form>
      </div>
      <div class="card__border"></div>
    </a>
  </div>
</div>
    </div>


<br>
  <h3 style="color:black !important">Cidades com mais alojamentos</h3>
  <div class="options" style="margin-top: 10vh;">
    <?php
    include "Conexao.php";

    $sql = "SELECT count(Cidade.ID) as Count, Cidade.Imagem as Imagem, Cidade.Nome as Nome, Cidade.Pais as Pais, Cidade.Descricao as Descricao FROM alojamento,Cidade Where alojamento.Cidade = Cidade.Nome and alojamento.Pais = Cidade.Pais GROUP BY Cidade.Nome ORDER BY Count DESC LIMIT 6";

    $result = $conn->query($sql);


    if($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
        echo '
        <div class="option active" style="Background:url(images/'.$row['Imagem'].');background-size: cover;">
           <div class="shadow"></div>
           <div class="label">
              <div class="info">
                 <div class="main">'.$row['Nome'].', '.$row['Pais'].'</div>
                 <div class="sub">'.$row['Descricao'].'</div>
              </div>
           </div>
        </div>
            ';
      }
    }



     ?>

  </div>
</div>
<br>
<br>
<br>
<footer class="section footer-classic context-dark bg-image" style="background: #2d3246;">
  <br>
  <br>
        <div class="container">
          <div class="row row-30">
            <div class="col-md-4 col-xl-5">
              <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light" src="images/agency/logo-inverse-140x37.png" alt="" width="140" height="37" srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a>
                <p>A NowTravel é uma empresa de reserva de atividades e alojamentos, garantimos sempre a melhor qualidade para os nossos ultilizadores a um preço acessivel</p>
                <!-- Rights-->
                <p class="rights"><span>©  </span><span class="copyright-year">2020</span><span> </span><span>NowTravel</span><span>. </span><span>Todos os direitos reservados.</span></p>
              </div>
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-4">
              <h5>Contactos</h5>
              <dl class="contact-list">
                <dt>Endereço</dt>
                <dd>2800 Avenida Da Liberdade, Lisboa, Portugal</dd>
              </dl>
              <dl class="contact-list">
                <dt>Email:</dt>
                <dd><a href="mailto:NowTravelOficial@gmail.com">NowTravelOficial@gmail.com</a></dd>
              </dl>
            </div>

          </div>
        </div>
        <div class="row no-gutters social-container">
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-facebook"></span><span>Facebook</span></a></div>
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-instagram"></span><span>instagram</span></a></div>
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-twitter"></span><span>twitter</span></a></div>

        </div>
      </footer>
</body>






<script>
    $(document).ready(function () {
        $('#txtCountry').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "livesearch.php",
					data: 'query=' + query,
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>



  <script>
  const height = (elem) => {

  	return elem.getBoundingClientRect().height

  }



  const factor = (elemA, elemB, prop) => {

  	const sizeA = elemA.getBoundingClientRect()[prop]
  	const sizeB = elemB.getBoundingClientRect()[prop]

  	return sizeB / sizeA

  }

  document.querySelectorAll('.card').forEach((elem) => {

  	const head = elem.querySelector('.card__head')
  	const image = elem.querySelector('.card__image')
  	const author = elem.querySelector('.card__author')
  	const body = elem.querySelector('.card__body')
  	const foot = elem.querySelector('.card__foot')

  	elem.onmouseenter = () => {

  		elem.classList.add('hover')

  		const imageScale = 1 + factor(head, body, 'height')
  		image.style.transform = `scale(${ imageScale })`

  		const bodyDistance = height(foot) * -1
  		body.style.transform = `translateY(${ bodyDistance }px)`



  	}

  	elem.onmouseleave = () => {

  		elem.classList.remove('hover')

  		image.style.transform = `none`
  		body.style.transform = `none`


  	}

  })
  </script>
</html>
