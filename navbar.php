<!-- Navbar start -->
<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
?>

<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
}
nav{
  background: white;
  height: 80px;
  width: 100%;

}
label.logo{
  color:	#FF4500;
  font-size: 28px;
  line-height: 80px;
  padding: 0 100px;
  font-weight: 600;
  font-family: 'Poppins', sans-serif;
}
nav ul{
  float: right;
  margin-right: 30px;
}
nav ul li{
  display: inline;
  line-height: 80px;
  margin: 0 2px;
}
nav ul li a{
  color: 	#FF7F50;
  font-weight: 500;
  font-size: 15px;
  padding: 7px 13px;
  border-radius: 3px;
  /* text-transform: uppercase; */
  font-family: 'Poppins', sans-serif;
}
a.active,a:hover{
  background: #ECD8D8;
  transition: .5s;
}
.checkbtn{
  font-size: 30px;
  color: white;
  float: right;
  line-height: 80px;
  margin-right: 40px;
  cursor: pointer;
  display: none;
}
#check{
  display: none;
}
@media (max-width: 952px){
  label.logo{
    font-size: 27px;
    padding-left: 25px;
  }
  nav ul li a{
    font-size: 16px;
  }
}

@media (max-width: 50px){
  label.logo{
    font-size: 20px;
    padding-left: 25px;
  }
  nav ul li a{
    font-size: 10px;
  }
}
@media (max-width: 858px){
  .checkbtn{
    display: block;
    margin-right: 40px;
  }
  ul{
    position: fixed;
    width: 100%;
    height: 100vh;
    background: red;
    top: 80px;
    left: 100%;
    text-align: center;
    transition: all .5s;
  }
  nav ul li{
    display: block;
    margin: 50px 0;
    line-height: 30px;
  }
  nav ul li a{
    font-size: 20px;
  }
  a:hover,a.active{
    background: none;
    color: red;
  }
  #check:checked ~ ul{
    left: 0;
  }
}
section{
  background: url(bg1.jpg) no-repeat;
  background-size: cover;
  height: calc(100vh - 80px);
}
.image-upload>input {
  display: none;
}
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

.container{
  padding-top:50px;
  margin: auto;
}
</style>



<!DOCTYPE html>
<!-- Created By CodingNepal -->

<div>



    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">NowTravel</label>
      <ul>
<li><a href="index.php">Inicio</a></li>
<li><a href="#">Sobre</a></li>
<?php

if(isset($_SESSION['username'])){
  $sql = "SELECT * FROM utilizador Where Username='". $_SESSION['username'] ."' ";

$result = $conn->query($sql);





if($result->num_rows > 0)
{
  while($row = $result->fetch_assoc())
  {



  echo '

      <li>
            <a href="Carrinho.php">Carrinho</a>
          </li>
          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">'.$_SESSION['username'].'</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                  <li>
                      <a href="#squarespaceModal" data-toggle="modal" data-target="#squarespaceModal">Perfil</a>
                  </li>
                  <li>
                      <a href="reservautilizador.php" >Reservas</a>
                  </li>
                  <li>
                      <a href="Logout.php">Logout</a>
                  </li>
              </ul>
          </li>

          <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
          	<div class="modal-content">
          		<div class="modal-header">
                        			<h3 class="modal-title" id="lineModalLabel" style="Color:black !important;">Perfil do Utilizador</h3>
          			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

          		</div>
          		<div class="modal-body">

                      <!-- content goes here -->
          			<form method="post" action="PerfilUtilizador.php" enctype="multipart/form-data">
                <div class="image-upload" style="text-align:center">
                <label for="file-input" >
                <img id="preview"  src="images/'.$row['PerfilFoto'].'"/ style="width:50vw;height:25vh;max-width: 50%;max-height: 50%;" >
                </label>
                <input id="file-input" type="file" name="Thumbnail"/>
                </div>

</a>
<div class="form-group">
  <label for="exampleInputEmail1">Username</label>
  <input type="text" name="Username" class="form-control" value="'.$row['Username'].'" readonly>
</div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" class="form-control" name="Email" value="'.$row['Email'].'" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="password-field" name="Password" value="'.$row['Password'].'" placeholder="Password">
                           <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>



          		</div>
          		<div class="modal-footer">
          			<div class="btn-group btn-group-justified" role="group" aria-label="group button">
          				<div class="btn-group" role="group">
          					<button type="button" class="btn btn-default" data-dismiss="modal"  role="button" style="margin-right:25px;">Voltar</button>
          				</div>
          				<div class="btn-group" role="group">
          					<button type="submit" id="submit" name="submit" class="btn btn-default btn-hover-green" data-action="save" role="button">Guardar</button>
          				</div>
          			</div>
          		</div>
          	</div>
            </div>
              </form>
          </div>

    ' ;
  }
}
  if(isset($_SESSION['Admin']) && $_SESSION['Admin'] == 1){
  echo'  <li>
          <a href="AdminIndex.php">Pagina de Admin</a>
        </li>';
  }
  echo'  </ul>';
}else {
  echo '<li>
      <a href="register.php">Criar Conta</a>
  </li>
  <li>
      <a href="login.php">Iniciar Sessão</a>
  </li>
</ul>';
  }
 ?>
</ul>


</nav>


</div>

<script>
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
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

</script>
