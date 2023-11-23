<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">


    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style2.css">
        <link rel="stylesheet" href="css/main.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />

</head>
<style>
*{
    margin: 0;
    padding: 0;
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

input{
    padding:5px;
    margin:10px 0 10px;
    border-radius:5px;
    border:1px solid black;
}
.Classeteste{

      padding:5px;
      margin:10px 0 10px;
      border-radius:5px;
      border:1px solid black;


}
textarea {
  resize: none;
}
body{ padding:20px;}

.custom-file-upload input[type="file"] {
    display: none;
}
.custom-file-upload .custom-file-upload1 {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}


input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 50px;
    max-width: 50px;
    min-height: 50px;
      min-width: 50px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
  background-size: cover;
}
.pip {
  display: inline-block;
  margin: 5px 5px 0 0;
}




.transparente{
  background: none ;
  color: white ;
  border: none;
}

.filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #333;
}
.image-upload>input {
  display: none;
}

</style>
<body>

  <?php
  session_start();
  if(isset($_SESSION['erro']) || isset($_SESSION['erro2']))
  {
  	echo '<div class="Erro ErroFadeOut">'.$_SESSION['erro'].'</div>';
  	unset($_SESSION['erro']);
  	unset($_SESSION['erro2']);
  }





   ?>
    <div class="wrapper">
        <!-- Sidebar  -->

        <?php



      include "sidebar.html";
      if (isset($_POST['Offset'])) {
                 $no_of_records_per_page =  $_POST['Offset'];
    }else{
      $_POST['Offset'] = 25;
    }



        ?>



            <div class="container" style="margin-top:-20px;">

                <div class="row">


                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
    <h3 class="panel-title">Cidades</h3>
                            <div class="pull-right">
                              <button class="btn btn-default btn-xs" data-toggle="modal" data-target=".animate" data-ui-class="a-lightSpeed"  style="background: #d2d9d4;"><span class="glyphicon glyphicon-filter"></span>Inserir Cidade</button>
                                <button class="btn btn-default btn-xs btn-filter"  style="background: #d2d9d4;"><span class="glyphicon glyphicon-filter"></span> Filtros</button>
 <form name="myform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                                <select data-trigger="" name="Offset" class="btn btn-default btn-xs " onchange="myform.submit();" style="Position:absolute; right:20vh;margin-top:-40px;">
                                  <option  <?php if ($_POST['Offset'] == '25') { ?>selected="true" <?php }; ?> value="25">25</option>
                                  <option <?php if ($_POST['Offset'] == '50') { ?>selected="true" <?php }; ?> value="50">50</option>
                                  <option <?php if ($_POST['Offset'] == '75') { ?>selected="true" <?php }; ?> value="75">75</option>
                                  <option <?php if ($_POST['Offset'] == '100') { ?>selected="true" <?php }; ?> value="100">100</option>
                                  <option <?php if ($_POST['Offset'] == '999999999') { ?>selected="true" <?php }; ?> value="999999999">Todos</option>
                                </select>
</form>
                            </div>
                        </div>
                          <form action="" method="POST">
                        <table class="table">
                            <thead>

                                <tr class="filters" style="text-align:center">

                                    <th><input type="text" class="form-control" placeholder="ID" disabled style="width:45px;"></th>
                                    <th><input type="text" class="form-control" placeholder="Nome" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Pais" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Descricao" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Imagem" disabled></th>
                                    <th><input type="text" style=" background-color: transparent;border: none;  cursor: auto;  box-shadow: none;padding: 0;" class="form-control" placeholder="Alterar" disabled readonly></th>

                                </tr>
                            </thead>
                            <tbody>

                              <?php
                              include("Conexao.php");

 $no_of_records_per_page =  $_POST['Offset'];

                                if (isset($_GET['pageno'])) {
                                     $pageno = $_GET['pageno'];
                                 } else {
                                     $pageno = 1;
                                 }

                                 $offset = ($pageno-1) * $no_of_records_per_page;
                                 $total_pages_sql = "SELECT COUNT(*) FROM cidade";
                                 $result = mysqli_query($conn,$total_pages_sql);
                                 $total_rows = mysqli_fetch_array($result)[0];
                                 $total_pages = ceil($total_rows / $no_of_records_per_page);
                                 $sql = "SELECT ID,Nome,Pais,left(Descricao, 10) as Descricao,Imagem FROM cidade LIMIT $offset, $no_of_records_per_page";
                                 $res_data = mysqli_query($conn,$sql);
                                 while($row = mysqli_fetch_array($res_data)){
                                     echo "<tr>";
                                     echo "<td>" . $row['ID'] . "</td>";
                                     echo "<td>" . $row['Nome'] . "</td>";
                                     echo "<td>" . $row['Pais']  . "</td>";
                                      echo "<td>" . $row['Descricao']  . "</td>";
                                     echo "<td>" . $row['Imagem']  . "</td>";

                                     echo '  <td>
                                     <a class="edit" title="Edit" data-toggle="tooltip" href="editarcidade.php?Id='.$row["ID"].'"><i class="material-icons">&#xE254;</i></a>
                                     <a class="delete" title="Delete" data-toggle="tooltip" href="deletecidade.php?Id='.$row["ID"].'"><i class="material-icons">&#xE872;</i></a>
                                                           </td>';
                                     echo "</tr>";
                                 }

                                 mysqli_close($conn);

                                 ?>

                            </tbody>

                                </form>
                        </table>

                    </div>
                    <ul class="pagination">
                        <li><button class="btn btn-outline-primary"><a style="color:black;" href="?pageno=1">Primeiro</a></button></li>
                        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                            <button class="btn btn-outline-primary"><a style="color:black;" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Anterior</a></button>
                        </li>
                        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                            <button class="btn btn-outline-primary"><a style="color:black;" href="<?php if($pageno >= $total_pages){ echo "#"; } else { echo "?pageno=".($pageno + 1); } ?>">Proximo</a></button>
                        </li>
                        <li> <button class="btn btn-outline-primary"><a style="color:black;" href="?pageno=<?php echo $total_pages; ?>">Ultimo</a></li> </button>
                    </ul>
                </div>
            </div>
            <div class="modal animate col-md-12 col-lg-12" tabindex="-1" role="dialog" id="modalad" aria-hidden="true" data-backdrop="true" style="max-height:120vh;">
            			<div class="modal-dialog" role="document" style="width:120vw;max-width:700px">
            				<div class="modal-content" >
            					<div class="modal-header">
            						<h5 class="modal-title" id="exampleModalLabel">Inserir Alojamento</h5>
            						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            							<span aria-hidden="true">×</span>
            						</button>
            					</div>
            					<div class="modal-body text-center p-lg"  style="height:76vh;">
                        <form class="" action="insertcidade.php" method="post" enctype="multipart/form-data">
      <div class="row" id="menu" style="width:100%">
    <ul class="nav nav-tabs" id="tabContent" style="width:100%">

    <div class="col-sm-12">
        <li  class="nav-item"><a href="#Informacoes" id="Informacoes" class="nav-link active" aria-controls="1" data-toggle="tab">Informações</a></li>
        </div>


</ul>
</div>

      <div class="tab-content">
        <br>
        <br>
                    <div class="tab-pane active" id="Informacoes">
                      <div class="row">

                    <div class="col-sm-6">
<h5>Nome</h5>
                    <input type="text" name="Nome" id="Nome" value="" placeholder="Nome da Cidade" autocomplete="off">
                  </div>

                    <div class="col-sm-6">
<h5>País</h5>
  <input id="txtCountry" type="text" name="Pais"  class="typeahead" placeholder="Procure um lugar" autocomplete="off"/>
                    </div>
                                    </div>

</div>
  <div class="row">
    <div class="col-sm-12">
<p style="color:black">Descrição</p>
      <textarea id="Descricao" name="Descricao" rows="4" cols="50">

  </textarea>
    </div>

    </div>

    <div class="row">
      <div class="col-sm-12">
  <p style="color:black">Imagem</p>
  <div class="image-upload" style="text-align:center">
  <label for="file-input" >
  <img id="preview"  src="images/citytemplate.jpg" style="width:50vw;height:25vh;max-width: 50%;max-height: 50%;" >
  </label>

  <input id="file-input" type="file" name="Thumbnail" />
  </div>
      </div>

      </div>



                  </div>


</div>

<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
  <button type="submit" name="submit" class="btn btn-primary">Concluir</button>
</div>






</form>


            					</div>
            				</div>
            			</div>


            		</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" src="typeahead.js"></script>
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



    $(".nav-tabs a.nav-link").click(function(){
    	var x = $(this).attr("href");
    	x = x.replace("#", "");
    	$(".tab-content .tab-pane").each(function(){
    		var y = $(this).attr("id");
    		if (x == y) $(this).addClass("active show");
    		else $(this).removeClass("nav-link active show");
    	});
    });
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        var code = e.keyCode || e.which;
        if (code == '9') return;
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">Sem Resultados</td></tr>'));
        }
    });
});


$(document).ready(function() {
  var x = 0;
  if (window.File && window.FileList && window.FileReader) {
    $("#file-upload").on("change", function(e) {
      if(x=1)
      {
                    $(".imageThumb").parent(".pip").remove();
      }
      if (x=0)
      {
        x = 1;
      }
      var files = e.target.files,
        filesLength = files.length;
        if (filesLength > 5)
        {
          filesLength = 5;
        }
      for (var i = 0; i < filesLength; i++) {

        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $(" <span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/>" +
            "</span>").insertAfter("#imagensx");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});

    </script>

</body>
<script src="Editar/EditarAlojamento.js"></script>

</html>
