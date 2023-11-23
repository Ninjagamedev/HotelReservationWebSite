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

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <?php


      include "sidebar.html";
        ?>
            <div class="row">
               <div class="col-md-3">
                 <div class="card-counter primary">
                   <i class="fa fa-code-fork"></i>
                   <span class="count-numbers">
                     <?php
                     include("Conexao.php");
                     $sql = "SELECT count(ID) as Teste FROM reserva";
                     $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
echo $row['Teste'] ;
  }
                     ?>
                  </span>
                   <span class="count-name">Reservas Efectuadas</span>
                 </div>
               </div>
               <div class="col-md-3">
                 <div class="card-counter danger">
                   <i class="fa fa-ticket"></i>
                   <span class="count-numbers">
                     <?php
                     $sql = "SELECT count(ID) as Teste FROM alojamento";
                     $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
echo $row['Teste'] ;
  }
                     ?>
                   </span>
                   <span class="count-name">Alojamentos Disponiveis</span>
                 </div>

                </div>
               <div class="col-md-3">
                 <div class="card-counter success">
                   <i class="fa fa-database"></i>
                   <span class="count-numbers">
                     <?php
                     $sql = "SELECT count(ID) as Teste FROM atividade";
                     $result = $conn->query($sql);
                     while($row = $result->fetch_assoc())
                     {
                       echo $row['Teste'] ;
                     }
                     ?>

                   </span>
                   <span class="count-name">Atividades Disponiveis</span>
                 </div>
               </div>

               <div class="col-md-3">
                 <div class="card-counter info">
                   <i class="fa fa-users"></i>
                   <span class="count-numbers">
                     <?php
                     $sql = "SELECT count(ID) as Teste FROM utilizador";
                     $result = $conn->query($sql);
                     while($row = $result->fetch_assoc()) {
                       echo $row['Teste'] ;
                     }
                     ?>
                   </span>
                   <span class="count-name">Utilizadores</span>
                 </div>
               </div>
             </div>
             <br>
             <br>
             <br>

             <canvas id="myChart" width="300" height="90"></canvas>
             <script>
             var ctx = document.getElementById('myChart').getContext('2d');
             var myChart = new Chart(ctx, {
                 type: 'bar',
                 data: {
                     labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                     datasets: [{
                         label: 'Número de Reservas',




                         data: [
                           <?php
                           $sql = "SELECT count(ID) as Teste FROM reserva WHERE DataInicio LIKE '%/1/%'";
                           $result = $conn->query($sql);
                           while($row = $result->fetch_assoc()) {
                           echo $row['Teste'] ;
                           }
                           ?>
,
<?php
$sql = "SELECT count(ID) as Teste FROM reserva WHERE DataInicio LIKE '%/2/%'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
echo $row['Teste'] ;
}
?>
,
<?php
$sql = "SELECT count(ID) as Teste FROM reserva WHERE DataInicio LIKE '%/3/%'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
echo $row['Teste'] ;
}
?>
,
<?php
$sql = "SELECT count(ID) as Teste FROM reserva WHERE DataInicio LIKE '%/4/%'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
echo $row['Teste'] ;
}
?>
,
<?php
$sql = "SELECT count(ID) as Teste FROM reserva WHERE DataInicio LIKE '%/5/%'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
echo $row['Teste'] ;
}
?>
,
<?php
$sql = "SELECT count(ID) as Teste FROM reserva WHERE DataInicio LIKE '%/6/%'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
echo $row['Teste'] ;
}
?>
,
<?php
$sql = "SELECT count(ID) as Teste FROM reserva WHERE DataInicio LIKE '%/7/%'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
echo $row['Teste'] ;
}
?>
,
<?php
$sql = "SELECT count(ID) as Teste FROM reserva WHERE DataInicio LIKE '%/8/%'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
echo $row['Teste'] ;
}
?>
,
<?php
$sql = "SELECT count(ID) as Teste FROM reserva WHERE DataInicio LIKE '%/9/%'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
echo $row['Teste'] ;
}
?>
,
<?php
$sql = "SELECT count(ID) as Teste FROM reserva WHERE DataInicio LIKE '%/10/%'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
echo $row['Teste'] ;
}
?>
,
<?php
$sql = "SELECT count(ID) as Teste FROM reserva WHERE DataInicio LIKE '%/11/%'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
echo $row['Teste'] ;
}
?>
,
<?php
$sql = "SELECT count(ID) as Teste FROM reserva WHERE DataInicio LIKE '%/12/%'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
echo $row['Teste'] ;
}
?>
,

                      ],
                         backgroundColor: [
                             'rgba(255, 99, 132, 0.2)',
                             'rgba(255, 99, 132, 0.2)',
                             'rgba(255, 99, 132, 0.2)',
                             'rgba(255, 99, 132, 0.2)',
                             'rgba(255, 99, 132, 0.2)',
                             'rgba(255, 99, 132, 0.2)',
                             'rgba(255, 99, 132, 0.2)',
                             'rgba(255, 99, 132, 0.2)',
                             'rgba(255, 99, 132, 0.2)',
                             'rgba(255, 99, 132, 0.2)',
                             'rgba(255, 99, 132, 0.2)',
                             'rgba(255, 99, 132, 0.2)',
                         ],
                         borderColor: [
                             'rgba(255, 99, 132, 1)',
                             'rgba(255, 99, 132, 1)',
                             'rgba(255, 99, 132, 1)',
                             'rgba(255, 99, 132, 1)',
                             'rgba(255, 99, 132, 1)',
                             'rgba(255, 99, 132, 1)',
                             'rgba(255, 99, 132, 1)',
                             'rgba(255, 99, 132, 1)',
                             'rgba(255, 99, 132, 1)',
                             'rgba(255, 99, 132, 1)',
                             'rgba(255, 99, 132, 1)',
                             'rgba(255, 99, 132, 1)',
                         ],
                         borderWidth: 1
                     }]
                 },
                 options: {
                     scales: {
                         yAxes: [{
                             ticks: {
                                 beginAtZero: true
                             }
                         }]
                     }
                 }
             });
             </script>



             <section id="tabs" class="project-tab">
                         <div class="container">
                             <div class="row">
                                 <div class="col-md-12">
                                     <nav>
                                         <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                             <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Ultimas Reservas</a>
                                             <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Ultimos Utilizadores Registados</a>
                                             <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Ultimos Alojamentos Inseridos</a>
                                         </div>
                                     </nav>
                                     <div class="tab-content" id="nav-tabContent">
                                         <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                             <table class="table" cellspacing="0">
                                                 <thead>
                                                     <tr>
                                                         <th>ID</th>
                                                         <th>Utilizador</th>
                                                         <th>Alojamento</th>
                                                         <th>Total</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                   <?php

                                                      $sql = "SELECT *  FROM reserva ORDER BY ID DESC LIMIT 5 ";
                                                      $res_data = mysqli_query($conn,$sql);
                                                      while($row = mysqli_fetch_array($res_data)){
                                                          echo "<tr>";
                                                          echo "<td>" . $row['ID'] . "</td>";
                                                          echo "<td>" . $row['IDUtilizador'] . "</td>";
                                                          echo "<td>" . $row['IDAlojamento']  . "</td>";
                                                          echo "<td>" . $row['Total']  . "</td>";
                                                          echo "</tr>";
                                                      }

                                                

                                                      ?>
                                                 </tbody>
                                             </table>
                                         </div>
                                         <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                             <table class="table" cellspacing="0">
                                                 <thead>
                                                     <tr>
                                                         <th>ID</th>
                                                         <th>Nome</th>
                                                         <th>Username</th>
                                                         <th>Email</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                   <?php

                                                      $sql = "SELECT *  FROM utilizador ORDER BY ID DESC LIMIT 5 ";
                                                      $res_data = mysqli_query($conn,$sql);
                                                      while($row = mysqli_fetch_array($res_data)){
                                                          echo "<tr>";
                                                          echo "<td>" . $row['ID'] . "</td>";
                                                          echo "<td>" . $row['Nome'] . "</td>";
                                                          echo "<td>" . $row['Username']  . "</td>";
                                                          echo "<td>" . $row['Email']  . "</td>";
                                                          echo "</tr>";
                                                      }



                                                      ?>
                                                 </tbody>
                                             </table>
                                         </div>
                                         <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                             <table class="table" cellspacing="0">
                                                 <thead>
                                                     <tr>
                                                         <th>IDAlojamento</th>
                                                         <th>Nome</th>
                                                         <th>Cidade</th>
                                                         <th>País</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                   <?php

                                                      $sql = "SELECT *  FROM alojamento ORDER BY ID DESC LIMIT 5 ";
                                                      $res_data = mysqli_query($conn,$sql);
                                                      while($row = mysqli_fetch_array($res_data)){
                                                          echo "<tr>";
                                                          echo "<td>" . $row['ID'] . "</td>";
                                                          echo "<td>" . $row['Nome'] . "</td>";
                                                          echo "<td>" . $row['Cidade']  . "</td>";
                                                          echo "<td>" . $row['Pais']  . "</td>";
                                                          echo "</tr>";
                                                      }

                                                      mysqli_close($conn);

                                                      ?>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </section>



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
    </script>
</body>

</html>
