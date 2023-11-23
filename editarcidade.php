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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
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
      $sql = "SELECT * FROM cidade Where ID='". $ID ."' ";

  $result = $conn->query($sql);





    if($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {


    ?>




<div class="container-login100" style="background-image: url('images/bg-01.jpg'); display:flex; flex-direction:column;justify-content: space-between;">
      <div class="wrap-login100 p-l-70 p-r-70 p-t-62 p-b-33" style="margin-top:30px;width:60vw;">

        <span class="login100-form-title p-b-53" style="margin-top:-25px;">
              <label class="logo">Editar Cidade</label>
        </span>
<br>

				<form class="" action="editarcidadeback.php" method="post" enctype="multipart/form-data">
          <input type="text" name="ID"  value="<?php echo $row['ID'] ?>"  hidden>
<div class="row" style="width:100%">

      <div class="col-sm-5">
        <div class="image-upload">
      <label for="file-input" >
      <img id="preview" src="images/<?php echo $row['Imagem'] ?>"/ style="width:100vw;height:25vh;max-width: 100%;max-height: 100%;" >
      </label>

      <input id="file-input" type="file" name="Thumbnail" />
      </div>
      <input type="text" name="thumbnailtext" value="<?php echo $row['Imagem'] ?>" hidden>
        </div>
          <div class="col-sm-1">
            </div>
        <div class="col-sm-6">
          <h5 style="text-align:left;">Nome</h5>
                              <input type="text" name="NomeCidade" id="NomeAlojamento" value="<?php echo $row['Nome'] ?>" placeholder="Nome da Cidade" style="width:100%">
<br>
<h5 style="text-align:left;">País</h5>
                    <input type="text" id="txtCountry" name="Pais"  class="typeahead" value="<?php echo $row['Pais'] ?>" placeholder="País" style="width:100%">


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




<div class="row" style="width:100%;margin-top:25px;">
  <div class="col-sm-6" style="text-align:center;">
            <a href="admincidades.php" class="btn btn-info" role="button">Cancelar</a>

    </div>
      <div class="col-sm-6" style="text-align:center;">
<button type="submit" class="btn btn-success" name="submit">Guardar</button>
        </div>
</div>

</div>



				</form>
			</div>
    </div>
    <?php
    }


    ?>
</body>


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" src="typeahead.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<script>
$(document).ready(function () {
    $('#txtCountry').typeahead({
        source: function (query, result) {
            $.ajax({
                url: "livesearchcidade.php",
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
