

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
  .btn-outline {
      background-color: orange;
      color: white !important;
      transition: all .5s;
  }

  .btn-primary.btn-outline {
      color: white !important;
  }

  .btn-outline {
      color: white !important;
  }
  </style>
  <body>
    <script type="text/javascript">
      AOS.init({
        duration: 2400,
      }
    );

    </script>
  <?php


  include "Conexao.php";
  session_start();

include "navbar.php";



if(isset($_POST['submit'])){

}else {

}







$DataInicio= $_POST['DataInicio'];
$DataFim= $_POST['DataFim'];
$Dias= $_POST['Dias'];
$Adultos = $_POST['Adultos'];
$Criancas = $_POST['Criancas'];












  ?>

  <div class="container-fluid">
  <div class="row" style="width:100%">
    <div class="col-md-12">
      <div class="grid search">
        <div class="grid-body">
          <div class="row">
            <!-- Inicio Dos Filtros -->

            <div class="col-md-3">
              <h2 class="grid-title"><i class="fa fa-filter"></i> Filtros de Pesquisa</h2>
              <hr>
  <form name="Pesquisa2" id="Pesquisa2"  method="post" action="">

    <input type="text" name="DataInicio" id="data1" value=" <?php echo ''.$DataInicio.''; ?>" hidden required>
                   <input type="text"  name="DataFim" id="data2" value="<?php echo ''.$DataFim.''; ?>" hidden required>
                   <input type="number" name="Dias" id="dias" value="<?php echo ''.$Dias.''; ?>" hidden>
           <input type="number" name="Adultos" id="Adultos" value="<?php echo ''.$Adultos.''; ?>" hidden>
           <input type="number" name="Criancas" id="Criancas" value="<?php echo ''.$Criancas.''; ?>" hidden>

              <h4>Por Categoria:</h4>
              <a href="#SubMenuAlojamentos" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"   style="color:black !important;">Alojamentos</a>
              <ul class="collapse list-unstyled" id="SubMenuAlojamentos">
              <li>
              <div class="checkbox">
                <label><input type="checkbox" name="Hotel">Hotel</label>
              </div>
              </li>
              <li>
              <div class="checkbox">
                <label><input type="checkbox" name="Motel">Motel</label>
              </div>
              </li>
              <li>
              <div class="checkbox">
                <label><input type="checkbox" name="Resort">Resort</label>
              </div>
              </li>
            </ul>
            <div>
            </div>
              <a href="#SubMenuAtividades" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="color:black !important;">Atividades</a>
              <ul class="collapse list-unstyled" id="SubMenuAtividades">
                <li>
              <div class="checkbox">
                <label><input type="checkbox" name="Tours">Tours</label>
              </div>
                </li>
                <li>
              <div class="checkbox">
                <label><input type="checkbox" name="Mergulho">Mergulho</label>
              </div>
              </li>
              <li>
              <div class="checkbox">
                <label><input type="checkbox" name="Escalada">Escalada</label>
              </div>
              </li>
              </ul>
              <!-- Fim dos fillros -->

              <div class="padding"></div>

              <!-- Filtro Por Data -->
              <h4>Alterar Data:</h4>

              <div class="input-group date form_date">
                <input class="datepicker" id="depart" type="text" placeholder="" required/>
              </div>

              <!-- Fim do filtro por data -->
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
              <div class="padding"></div>


            </div>
            <!-- Fim dos filtros -->

            <!-- Pesquisa -->
            <div class="col-md-9">
              <h2><i class="fa fa-building"></i> Resultados</h2>
              <hr>
              <!-- Barra de pesquisa -->
              <div class="input-group" style="display:flex;">
                <input id="txtCountry" type="text" name="txtCountry"  style="width:70%;">

                  <button class="btn btn-primary" name="Pesquisa2" type="submit"><i class="fa fa-search"></i></button>

              </div>
              <!-- END SEARCH INPUT -->
              <p></p>

              <div class="padding"></div>

              <div class="row">
                <!-- BEGIN ORDER RESULT -->
                
                <!-- END ORDER RESULT -->


              </div>
</Form>
              <!-- BEGIN TABLE RESULT -->
              <div class="table-responsive">
                <table class="table table-hover">
                  <tbody>
                    <form method="get" action="PaginaReserva.php">
                    <?php
                    include("Conexao.php");

$no_of_records_per_page =  10;
$pageno = 1;
$offset = ($pageno-1) * $no_of_records_per_page;




if(isset($_POST['Hotel'])){
  $total_pages_sql = "SELECT COUNT(*) FROM alojamento WHERE Categoria = 'Hotel'";
  $result = mysqli_query($conn,$total_pages_sql);
  $total_rows = mysqli_fetch_array($result)[0];
  $total_pages = ceil($total_rows / $no_of_records_per_page);
  $sql = "SELECT ID,Nome,Categoria as Tipo,Cidade,Pais,left(Descricao, 50) as Descricao,Classificacao,Thumbnail,Preco  FROM alojamento WHERE alojamento.categoria = 'Hotel' LIMIT $offset, $no_of_records_per_page";
  $Night = 1;
  $DataInicio= $_POST['DataInicio'];
  $DataFim= $_POST['DataFim'];
  $Dias= $_POST['Dias'];
  $Adultos = $_POST['Adultos'];
  $Criancas = $_POST['Criancas'];
}
else if(isset($_POST['Motel'])){
  $total_pages_sql = "SELECT COUNT(*) FROM alojamento WHERE Categoria = 'Motel'";
  $result = mysqli_query($conn,$total_pages_sql);
  $total_rows = mysqli_fetch_array($result)[0];
  $total_pages = ceil($total_rows / $no_of_records_per_page);
  $sql = "SELECT ID,Nome,Categoria as Tipo,Cidade,Pais,left(Descricao, 50) as Descricao,Classificacao,Thumbnail,Preco  FROM alojamento WHERE alojamento.categoria = 'Motel' LIMIT $offset, $no_of_records_per_page";
  $Night = 1;
  $DataInicio= $_POST['DataInicio'];
  $DataFim= $_POST['DataFim'];
  $Dias= $_POST['Dias'];
  $Adultos = $_POST['Adultos'];
  $Criancas = $_POST['Criancas'];

}
else if(isset($_POST['Resort'])){
  $total_pages_sql = "SELECT COUNT(*) FROM alojamento WHERE Categoria = 'Resort'";
  $result = mysqli_query($conn,$total_pages_sql);
  $total_rows = mysqli_fetch_array($result)[0];
  $total_pages = ceil($total_rows / $no_of_records_per_page);
  $sql = "SELECT ID,Nome,Categoria as Tipo,Cidade,Pais,left(Descricao, 50) as Descricao,Classificacao,Thumbnail,Preco  FROM alojamento WHERE alojamento.categoria = 'Resort' LIMIT $offset, $no_of_records_per_page";
  $Night = 1;
  $DataInicio= $_POST['DataInicio'];
  $DataFim= $_POST['DataFim'];
  $Dias= $_POST['Dias'];
  $Adultos = $_POST['Adultos'];
  $Criancas = $_POST['Criancas'];
}
else if(isset($_POST['Tours'])){
  $total_pages_sql = "SELECT COUNT(*) FROM atividade WHERE Categoria = 'Tours'";
  $result = mysqli_query($conn,$total_pages_sql);
  $total_rows = mysqli_fetch_array($result)[0];
  $total_pages = ceil($total_rows / $no_of_records_per_page);
  $sql = "SELECT ID,Nome,Categoria as Tipo,Cidade,Pais,left(Descricao, 50) as Descricao,Classificacao,Thumbnail,Preco  FROM atividade WHERE atividade.categoria = 'Tours' LIMIT $offset, $no_of_records_per_page";
  $Night = 1;
  $DataInicio= $_POST['DataInicio'];
  $DataFim= $_POST['DataFim'];
  $Dias= $_POST['Dias'];
  $Adultos = $_POST['Adultos'];
  $Criancas = $_POST['Criancas'];
}
else if(isset($_POST['Mergulho'])){
  $total_pages_sql = "SELECT COUNT(*) FROM atividade WHERE Categoria = 'Mergulho'";
  $result = mysqli_query($conn,$total_pages_sql);
  $total_rows = mysqli_fetch_array($result)[0];
  $total_pages = ceil($total_rows / $no_of_records_per_page);
  $sql = "SELECT ID,Nome,Categoria as Tipo,Cidade,Pais,left(Descricao, 50) as Descricao,Classificacao,Thumbnail,Preco  FROM atividade WHERE atividade.categoria = 'Mergulho' LIMIT $offset, $no_of_records_per_page";
  $Night = 1;
  $DataInicio= $_POST['DataInicio'];
  $DataFim= $_POST['DataFim'];
  $Dias= $_POST['Dias'];
  $Adultos = $_POST['Adultos'];
  $Criancas = $_POST['Criancas'];
}
else if(isset($_POST['Escalada'])){
  $total_pages_sql = "SELECT COUNT(*) FROM atividade WHERE Categoria = 'Escalada'";
  $result = mysqli_query($conn,$total_pages_sql);
  $total_rows = mysqli_fetch_array($result)[0];
  $total_pages = ceil($total_rows / $no_of_records_per_page);
  $sql = "SELECT ID,Nome,Categoria as Tipo,Cidade,Pais,left(Descricao, 50) as Descricao,Classificacao,Thumbnail,Preco  FROM atividade WHERE atividade.categoria = 'Escalada' LIMIT $offset, $no_of_records_per_page";
  $Night = 1;
  $DataInicio= $_POST['DataInicio'];
  $DataFim= $_POST['DataFim'];
  $Dias= $_POST['Dias'];
  $Adultos = $_POST['Adultos'];
  $Criancas = $_POST['Criancas'];
}


else if(isset($_POST['Pesquisa'])){
  $Nome = $_POST['txtCountry'];
  $NomeArray = explode(" , ", $Nome);
  $DataInicio= $_POST['DataInicio'];
  $DataFim= $_POST['DataFim'];
  $Dias= $_POST['Dias'];
  $Adultos = $_POST['Adultos'];
  $Criancas = $_POST['Criancas'];
if (COUNT($NomeArray) == 2) {
  $sql = "(SELECT ID,Nome,Categoria as Tipo,Cidade,Pais,left(Descricao, 50) as Descricao,Classificacao,Thumbnail,Preco  FROM alojamento WHERE Cidade LIKE '%".$NomeArray[0]."%' AND Pais LIKE '%".$NomeArray[1]."%')
           UNION
           (SELECT ID,Nome,Categoria as Tipo,Cidade,Pais,left(Descricao, 50) as Descricao,Classificacao,Thumbnail,Preco  FROM atividade WHERE Cidade LIKE '%".$NomeArray[0]."%' AND Pais LIKE '%".$NomeArray[1]."%')";
}else{
  $sql = "(SELECT ID,Nome,Categoria as Tipo,Cidade,Pais,left(Descricao, 50) as Descricao,Classificacao,Thumbnail,Preco  FROM alojamento WHERE Nome LIKE '%".$Nome."%' OR Pais LIKE '%".$Nome."%')
           UNION
           (SELECT ID,Nome,Categoria as Tipo,Cidade,Pais,left(Descricao, 50) as Descricao,Classificacao,Thumbnail,Preco  FROM atividade WHERE Nome LIKE '%".$Nome."%' OR Pais LIKE '%".$Nome."%')";

}


}else if(isset($_POST['Pesquisa2'])){
  $Nome = $_POST['txtCountry'];
  $NomeArray = explode(" , ", $Nome);
  $DataInicio= $_POST['DataInicio'];
  $DataFim= $_POST['DataFim'];
  $Dias= $_POST['Dias'];
  $Adultos = $_POST['Adultos'];
  $Criancas = $_POST['Criancas'];
if (COUNT($NomeArray) == 2) {
  $sql = "(SELECT ID,Nome,Categoria as Tipo,Cidade,Pais,left(Descricao, 50) as Descricao,Classificacao,Thumbnail,Preco  FROM alojamento WHERE Cidade LIKE '%".$NomeArray[0]."%' AND Pais LIKE '%".$NomeArray[1]."%')
           UNION
           (SELECT ID,Nome,Categoria as Tipo,Cidade,Pais,left(Descricao, 50) as Descricao,Classificacao,Thumbnail,Preco  FROM atividade WHERE Cidade LIKE '%".$NomeArray[0]."%' AND Pais LIKE '%".$NomeArray[1]."%')";
}else{
  $sql = "(SELECT ID,Nome,Categoria as Tipo,Cidade,Pais,left(Descricao, 50) as Descricao,Classificacao,Thumbnail,Preco  FROM alojamento WHERE Nome LIKE '%".$Nome."%' OR Pais LIKE '%".$Nome."%')
           UNION
           (SELECT ID,Nome,Categoria as Tipo,Cidade,Pais,left(Descricao, 50) as Descricao,Classificacao,Thumbnail,Preco  FROM atividade WHERE Nome LIKE '%".$Nome."%' OR Pais LIKE '%".$Nome."%')";

}

}







                       $res_data = mysqli_query($conn,$sql);


                   while($row = mysqli_fetch_array($res_data)){

                           echo '<tr style="height:150px;">';
                            echo '<td class="number text-center"></td>';
                            echo '<td class="image" style="height:150px;width:125px;"><img src=http://localhost/pap/images/' . $row['Thumbnail'] . ' alt="" style="height:150px;width:150px;"></td>';
                            echo '<td class="product"><strong>' . $row['Nome'] .'</strong><br><p style="font-size:12px;">'.    $row['Tipo'].'</p><p style="font-size:15px;">' . $row['Descricao']  . '...</p><p style="font-size:15px;">' . $row['Cidade'].", ".$row['Pais'].'</p></td>';
echo '<td class="rate text-right"><span>';
                            for ($i=0; $i < $row['Classificacao']; $i++) {
                             echo '  <i class="fa fa-star"></i>';
                            }
echo "</span></td>";

                           echo '<td class="price text-right">        <div class="text-success">
                                     <p>Apenas por:</p>';

                                     if ($row['Tipo'] == "Hotel" ||  $row['Tipo'] == "Motel" ||  $row['Tipo'] == "Resort") {
                                       echo'           <h5>'.$row['Preco'].'€/Noite</h5>

                                                </div> &nbsp &nbsp<br><button type="submit" class="btn btn-latest" style="background-color:white;color:black;" name="ID" value='.$row['ID'].'>Reservar</button></td>';
                                     }elseif ($row['Tipo'] == "Tours" ||  $row['Tipo'] == "Mergulho" ||  $row['Tipo'] == "Escalada") {
                                       // code...

                                       echo'           <h5>'.$row['Preco'].'€/Sessão</h5>


                                                </div> &nbsp &nbsp<br><button type="submit" class="btn btn-latest" style="background-color:white;color:black;" name="ID"  value='.$row['ID'].'>Reservar</button></td>';


                                     }





                           echo "</tr>";
                       }

                       mysqli_close($conn);

                       ?>

                       <input type="text" name="DataInicio" id="data1" value=" <?php echo ''.$DataInicio.''; ?>" hidden required>
                                      <input type="text"  name="DataFim" id="data2" value="<?php echo ''.$DataFim.''; ?>" hidden required>
                                      <input type="text" name="Dias" id="dias" value="<?php echo ''.$Dias.''; ?>" hidden>
                              <input type="text" name="Adultos" id="Adultos" value="<?php echo ''.$Adultos.''; ?>" hidden>
                              <input type="text" name="Criancas" id="Criancas" value="<?php echo ''.$Criancas.''; ?>" hidden>
  </form>



                  </tr>

                </tbody></table>
              </div>
              <!-- END TABLE RESULT -->

              <!-- BEGIN PAGINATION -->
              <ul class="pagination">
                <li class="disabled"><a href="#">«</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
              </ul>
              <!-- END PAGINATION -->
            </div>
            <!-- END RESULT -->
          </div>
        </div>
      </div>
    </div>
    <!-- END SEARCH RESULT -->
  </div>
  </div>
</body>




  <script type="text/javascript" src="typeahead.js"></script>



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
  $(function(){
   $('.checkbox').on('change',function(){
      $('#Pesquisa2').submit();
      });
  });

  const height = (elem) => {

  	return elem.getBoundingClientRect().height

  }

  const distance = (elemA, elemB, prop) => {

  	const sizeA = elemA.getBoundingClientRect()[prop]
  	const sizeB = elemB.getBoundingClientRect()[prop]

  	return sizeB - sizeA

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

  		const authorDistance = distance(head, author, 'height')
  		author.style.transform = `translateY(${ authorDistance }px)`

  	}

  	elem.onmouseleave = () => {

  		elem.classList.remove('hover')

  		image.style.transform = `none`
  		body.style.transform = `none`
  		author.style.transform = `none`

  	}

  })
  </script>
</html>
