<?php
include 'config.php';
session_start();
// var_dump($_SESSION);
// die;
if(isset($_SESSION['username'])){
    header('location:admin_home.php');
}

if(isset($_POST['login'])){
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);

  $query = mysqli_query($db, "SELECT * FROM user WHERE username='$username'");
  $data = mysqli_fetch_assoc($query);

  if ($data) {
    if ($data['password'] == $password) {
      $_SESSION['username'] = $data['username'];
      $_SESSION['role_id'] = $data['role_id'];
      if ($_SESSION['role_id'] == 1) {
        header('location:admin_home.php');
      }else {
        header('location:user_home.php');
      }
    }else {
      echo "<script>alert('Password tidak sesuai.');</script>";
    }
  }else {
    echo "<script>alert('Username tidak terdaftar.');</script>";
  }
}
  // else {
  //   echo "<script>alert('Username atau Password tidak sesuai.')</script>";
  // }
	// if(isset($_GET['alert'])){
	// 	if($_GET['alert']=="gagal"){
	// 		echo "<script>alert('Username atau Password tidak sesuai.')</script>";
	// 	}else if($_GET['alert']=="belum_login"){
	// 		echo "<script>alert('anda belum login.')</script>";
	// 	}else if($_GET['alert']=="logout"){
	// 		echo "<script>alert('anda telah logout.')</script>";
	// 	}
	// }
//
// session_start();
// // if(isset($_SESSION['login'])){
// //     header('location:admin_home.php');
// // }
//
// if (isset($_POST['login'])) {
//   $username = $_POST['username'];
//   $password = $_POST['password'];
//
//   $query = mysqli_query($db, "SELECT * FROM user WHERE username='$username' and password='$password'");
//   $data = mysqli_fetch_array($query);
//   if ($data['role_id']== "1") {
//       $_SESSION['username'] = $data['username'];
//       $_SESSION['role_id'] = "1";
//       header("location:admin_home.php");
//     }else {
//       header("location:user_home.php");
//     }
//   }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    function myFunction() {
      var x = document.getElementById("pw");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>
    <title>Index</title>
  </head>
  <body>
    <div>
      <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
      <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
              </a>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
              </li>
              <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
              </li>
          </ul> -->
          <form class="d-flex ms-auto" role="search">
              <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
              <!-- <button class="btn btn-outline-primary" type="submit">Logout</button> -->
          </form>
          </div>
      </div>
      </nav>
    </div>
    <div class="container p-5 mt-5 bg-secondary bg-opacity-10 border border-secondary">
      <form method="post">
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" required class="form-control" name="username">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" required class="form-control" name="password" id="pw">
          <input type="checkbox" onclick="myFunction()"> Show Password
        </div>
        <button type="submit" class="btn btn-outline-primary mb-4" name="login">Login</button>
        <div class="mb-3">
          <label class="form-label">Belum punya akun? <a href="register.php">Daftar disini.</a> </label>
        </div>
      </form>
    </div>
  </body>
</html>
