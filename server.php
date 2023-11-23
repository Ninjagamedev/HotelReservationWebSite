<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$Nome ="";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'pap');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $Nome = mysqli_real_escape_string($db, $_POST['nome']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
	  echo '<script language="javascript">';
      echo 'alert("As 2 passwords não são iguais")';
      echo '</script>';
      header('location: register.php');
  }

  $user_check_query = "SELECT username,email FROM utilizador WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
      $_SESSION['erro'] = "Username já existe";
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
      $_SESSION['erro2'] = "Email já existe";
    }
        header("location: register.php");
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = $password_1;
    $foto = "placeholder.png";
    $Admin = 0;
    $stat=$db->prepare("INSERT INTO utilizador(nome,username, email, password,Admin,PerfilFoto) VALUES(?,?,?,?,?,?)");
    $stat->bind_param("ssssis",$Nome,$username,$email,$password,$Admin,$foto);
    if ($stat->execute())
    {   $_SESSION['username'] = $username;
      	$_SESSION['success'] = "You are now logged in";
        if($_SESSION['username']=='Admin' || $_SESSION['username']=='admin')
        {
          header('location: adminindex.php');
        }else{
      	header('location: index.php');
      }
    }else{
      $message = "Erro na inserção";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    $stat->close();
    $db->close();


  }
}



if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }else{
  if (count($errors) == 0) {
  	$query = "SELECT * FROM utilizador WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
    $row=$results->fetch_assoc();
  	if (mysqli_num_rows($results) == 1) {
      $_SESSION['Admin'] = $row['Admin'];
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
      if($_SESSION['Admin']== 1 || $_SESSION['username']=='admin')
      {
        header('location: adminindex.php');
      }else{
  	  header('location: index.php');
    }
  	}else {
  		 header('location: login.php');
      ?>
      <?php
  	}
  }
  }
}
 ?>
