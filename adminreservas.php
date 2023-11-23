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


</style>
<body>


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
    <h3 class="panel-title">Reservas</h3>
                            <div class="pull-right">
                                <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtros</button>
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
                          <form action="editarreservas.php" method="POST">


                        <table class="table" id="tabelapaginator">
                            <thead>

                                <tr class="filters" style="text-align:center">

                                    <th><input type="text" class="form-control" placeholder="ID Reserva" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="ID Utilizador" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="ID Alojamento" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="N Quarto" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Check-In" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Check-Out" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Hospedes" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Total" disabled></th>
                                    <th><input type="text" style=" background-color: transparent;border: none;  cursor: auto;  box-shadow: none;padding: 0;" class="form-control" placeholder="Alterar" disabled readonly></th>

                                </tr>
                            </thead>
                            <tbody>

                              <?php
                              include("Conexao.php");
                              if (isset($_GET['pageno'])) {
                                   $pageno = $_GET['pageno'];
                               } else {
                                   $pageno = 1;
                               }
                               $no_of_records_per_page = 75;
                               $offset = ($pageno-1) * $no_of_records_per_page;
                               $total_pages_sql = "SELECT COUNT(*) FROM reserva";
                               $result = mysqli_query($conn,$total_pages_sql);
                               $total_rows = mysqli_fetch_array($result)[0];
                               $total_pages = ceil($total_rows / $no_of_records_per_page);

                               $sql = "SELECT *  FROM reserva LIMIT $offset, $no_of_records_per_page";
                               $res_data = mysqli_query($conn,$sql);
                               while($row = mysqli_fetch_array($res_data)){
                                   echo "<tr>";
                                   echo "<td>" . $row['ID'] . "</td>";
                                   echo "<td>" . $row['IDUtilizador'] . "</td>";
                                   echo "<td>" . $row['IDAlojamento']  . "</td>";
                                   echo "<td>" . $row['NQuarto']  . "</td>";
                                   echo "<td>" . $row['DataInicio']  . "</td>";
                                   echo "<td>" . $row['DataFim']  . "</td>";
                                   echo "<td>" . $row['Hospedes']  . "</td>";
                                   echo "<td>" . $row['Total']  . "</td>";


                                   echo '  <td>							<button type="submit" class="add" title="Add" style="display:none"><i class="material-icons">&#xE03B;</i></button>
                                                           <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                                           <a class="delete" title="Delete" data-toggle="tooltip" href="deletereserva.php?Id='.$row["ID"].'"><i class="material-icons">&#xE872;</i></a></td>
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
                          <button class="btn btn-outline-primary"><a style="color:black;" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Proximo</a></button>
                      </li>
                      <li> <button class="btn btn-outline-primary"><a style="color:black;" href="?pageno=<?php echo $total_pages; ?>">Ultimo</a></li> </button>
                  </ul>
              </div>
          </div>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">








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
    </script>

</body>
<script src="Editar/EditarReserva.js"></script>

</html>
