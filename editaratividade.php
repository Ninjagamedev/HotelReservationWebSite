<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    	<link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/aos.css"/>
    <link rel="stylesheet" type="text/css" href="css/Tipos.css"/>
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="css/Cards.css"/>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title>Home</title>
  </head>
  <style>
  label.logo{
    color:	#FF4500;
    font-size: 28px;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
  }
  .image-upload>input {
    display: none;
  }
  .Classeteste{

        padding:5px;
        margin:10px 0 10px;
        border-radius:5px;
        border:1px solid black;


  }
  input{
      padding:5px;
      margin:10px 0 10px;
      border-radius:5px;
      border:1px solid black;
  }
  .rate {
      height: 46px;
      padding: 0 10px;
      float: left;
      margin-left: 25%
  }
  .rate:not(:checked) > input {
      position:absolute;
      top:-9999px;
  }
  .rate:not(:checked) > label {
      float:right;
      width:1em;
      overflow:hidden;
      white-space:nowrap;
      cursor:pointer;
      font-size:30px;
      color:#ccc;
  }
  .rate:not(:checked) > label:before {
      content: '★ ';
  }
  .rate > input:checked ~ label {
      color: #ffc700;
  }
  .rate:not(:checked) > label:hover,
  .rate:not(:checked) > label:hover ~ label {
      color: #deb217;
  }
  .rate > input:checked + label:hover,
  .rate > input:checked + label:hover ~ label,
  .rate > input:checked ~ label:hover,
  .rate > input:checked ~ label:hover ~ label,
  .rate > label:hover ~ input:checked ~ label {
      color: #c59b08;
  }
  </style>
  <body>
    <?php
    include("Conexao.php");

    if(isset($_GET['Id'])) {


      $ID = $_GET['Id'];
      $sql = "SELECT * FROM atividade Where ID='". $ID ."' ";

  $result = $conn->query($sql);





    if($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {


    ?>




<div class="container-login100" style="background-image: url('images/bg-01.jpg'); display:flex; flex-direction:column;justify-content: space-between;">
      <div class="wrap-login100 p-l-70 p-r-70 p-t-62 p-b-33" style="margin-top:30px;width:60vw;">

        <span class="login100-form-title p-b-53" style="margin-top:-25px;">
              <label class="logo">Editar Alojamento</label>
        </span>
<br>

				<form class="" action="editaratividadeback.php" method="post" enctype="multipart/form-data">
          <input type="text" name="ID"  value="<?php echo $row['ID'] ?>"  hidden>
<div class="row" style="width:100%">

      <div class="col-sm-5">
        <div class="image-upload">
      <label for="file-input" >
      <img id="preview" src="images/<?php echo $row['Thumbnail'] ?>"/ style="width:100vw;height:25vh;max-width: 100%;max-height: 100%;" >
      </label>

      <input id="file-input" type="file" name="Thumbnail" />
      </div>
      <input type="text" name="thumbnailtext" value="images/<?php echo $row['Thumbnail'] ?>" hidden>
        </div>
          <div class="col-sm-1">
            </div>
        <div class="col-sm-6">
          <h5 style="text-align:left;">Nome</h5>
                              <input type="text" name="NomeAlojamento" onkeyup="success()" id="NomeAlojamento" value="<?php echo $row['Nome'] ?>" placeholder="Nome do Alojamento" style="width:100%">

                              <h5 style="text-align:left;margin-top:20px;">Morada</h5>
                                                    <input type="text" name="Morada" onkeyup="success()" id="Morada" value="<?php echo $row['Morada'] ?>" placeholder="Morada" style="width:100%">

</div>

</div>
<div class="row" style="width:100%;margin-top:15px;">
  <div class="col-sm-6">
    <h5>Categoria</h5>
    <select name="Categoria"  class="Classeteste" id="Categoria" style="width:218px;">
    <option value='Tours' selected>Tour</option>
    <option value='Escalada'>Escalada</option>
    <option value='Mergulho'>Mergulho</option>

    </select>

</div>
      <div class="col-sm-6">
<h5>Cidade</h5>
        <input type="text" name="Cidade" class="typeahead" autocomplete="off" onkeyup="success()"id="Cidade" value="<?php echo $row['Cidade'].','.$row['Pais'];?>" placeholder="Cidade" style="width:100%">
      </div>

</div>
<div class="row" style="width:100%;margin-top:25px;">
  <div class="col-sm-6" style="text-align:center;">
    <h5>Horario</h5>
    <?php

    $MyValue = explode('-', $row['Horario']);

    $HoraInicio = $MyValue[0];
    $HoraFim = $MyValue[1];


     ?>
    <input type="Number" name="HoraInicio" onkeyup="success()" id="HoraInicio" min="1" max="24" value="<?php echo $HoraInicio ?>" placeholder="Hora de Inicio" style="width:65%">
    <input type="Number" name="HoraFim" onkeyup="success()" id="HoraFim" min="1" max="24" value="<?php echo $HoraFim ?>" placeholder="Hora De Encerramento" style="width:65%">
    </div>
    <div class="col-sm-6" style="text-align:center;">
      <h5>Preço</h5>
      <input type="Number" name="Preco" onkeyup="success()" id="Preco" min="1" max="5000" value="<?php echo $row['Preco'] ?>" placeholder="Preço" style="width:65%">
      </div>



</div>
<div class="row" style="width:100%;margin-top:25px;">
  <div class="col-sm-12" style="text-align:center;">
        <h5>Descrição</h5>
          <textarea id="Descricao" name="Descricao" rows="7" cols="60">
<?php echo $row['Descricao'] ?>
      </textarea>
    </div>




</div>
<?php
}
}

?>
<div class="row" style="width:100%;margin-top:25px;">
  <div class="col-sm-12" style="text-align:center;">
        <h5>Imagens</h5>
        <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
        <div class="carousel-inner w-100" role="listbox">
<?php

$ID = $_GET['Id'];
$sql = "SELECT * FROM imagem Where IDProduto='". $ID ."' ";

$result = $conn->query($sql);





if($result->num_rows > 0)
{
  $x = 0;
  $i = 0;
  echo '<div class="carousel-item row no-gutters active">';
while($row = $result->fetch_assoc())
{
if ($i % 4 == 0 && $i != 0)
{

echo " </div>";
echo '<div class="carousel-item row no-gutters">';
}

          echo'      <div class="col-3 float-left">        <div class="image-upload">

                    <input id="img'.$x.'" name="img'.$x.'" type="file" class="qwe" />
          <label for="img'.$x.'" >
          <img id="img'.$x.'x" src="images/'.$row['CaminhoImagem'].'" style="width:25vw;height:17.5vh;max-width: 100%;max-height: 100%;">
          </label>
                <input type="text" name="text'.$x.'" value="images/'.$row['CaminhoImagem'].'" hidden>
                <input type="text" name="id'.$x.'" value="'.$row['ID'].'" hidden>

          </div></div>';
          $x++;

$i++;
            }
            echo " </div>";
                echo'<input type="input" name="ImagensInput" value=" '.$x.' " hidden>';
          }
        }
?>
        </div>
        <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    </div>




</div>



<div class="row" style="width:100%;margin-top:25px;">
  <div class="col-sm-6" style="text-align:center;">
            <a href="adminalojamentos.php" class="btn btn-info" role="button">Cancelar</a>

    </div>
      <div class="col-sm-6" style="text-align:center;">
<button type="submit" class="btn btn-success" name="submit">Guardar</button>
        </div>
</div>

</div>



				</form>
			</div>
    </div>

    <script type="text/javascript" src="typeahead.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

              <script>
                  $(document).ready(function () {
                      $('#Cidade').typeahead({
                          source: function (query, result) {
                              $.ajax({
                                  url: "livesearchalojamento.php",
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

<script type="text/javascript">

$(document).on("change","select",function(){
  $("option[value=" + this.value + "]", this)
  .attr("selected", true).siblings()
  .removeAttr("selected")
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      console.log(e.target.result)
      $('#preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#file-input").change(function() {
  readURL(this);
});



$(".qwe").change(function() {
var id = this.id;
readURL2(id);
});

function readURL2(input) {

          if (document.getElementById(input).files && document.getElementById(input).files[0]) {

  var imagens = document.getElementsByTagName('img');
  for (var i = 0; i < imagens.length; i++) {
console.log(imagens[i].id)
      if (imagens[i].id == input + 'x') {
console.log(imagens[i].id)

          var reader = new FileReader();
var id2= imagens[i].id
var id3= id2.toString();
          reader.onload = function(e) {
            $('#'+id3).attr('src', e.target.result);
            console.log("#"+id3)
          }

          reader.readAsDataURL(document.getElementById(input).files[0]); // convert to base64 string
        }
      }
  }




};



</script>

</body>
