<?php
include 'config.php';
// session_start();
// if (isset($_POST['login'])) {
//   $username = $_POST['username'];
//   $password = $_POST['password'];
//
//   $query = mysqli_query($db, "SELECT * FROM user WHERE username='$username' and password = '$password'");
//   $data = mysqli_fetch_array($query);
//
//   if ($data) {
//     $_SESSION['username'] = $data['username'];
//     $_SESSION['login'] = true;
//     header('location:admin_home.php');
//   }else {
//     echo "<script>alert('Email atau Password anda salah.')</script>";
//   }
// }
// if(isset($_SESSION['login'])){
//     header('location:admin_home.php');
// }
// if(isset($_GET['pesan'])){
// 		if($_GET['pesan']=="gagal"){
// 			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
// 		}
// 	}
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
    function myFunction2() {
      var x = document.getElementById("cpw");
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
          <a class="navbar-brand" href="admin_home.php">Navbar</a>
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
      <form class="" action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" class="form-control" name="username">
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="pw">
          <input type="checkbox" onclick="myFunction()"> Show Password
        </div>
        <!-- <div class="mb-3">
          <label class="form-label">Password Confirmation</label>
          <input type="password" class="form-control" name="cpassword" id="cpw">
          <input type="checkbox" onclick="myFunction2()"> Show Password
        </div> -->
       <button type="submit" class="btn btn-success" name="submit">Register</button>
       <div class="mb-3">
         <label class="form-label">Sudah punya akun? <a href="index.php">Login disini.</a> </label>
       </div>

     </form>
    </div>
  </body>
</html>

<?php
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  // $password = md5($password);
  // $cpassword = $_POST['cpassword'];
  // if ($password != $cpassword) {
  //   echo "<script>alert('Password tidak sesuai.')</script>";
  // }elseif ($password == $cpassword) {
    $q1 = mysqli_query($db, "SELECT * FROM user WHERE username = '$username'");
    if(mysqli_num_rows($q1)){
      while ($dt=mysqli_fetch_array($q1)) {
        echo "<script>alert('Username telah digunakan.')</script>";
      }
    // }
  }else {
    $query = mysqli_query($db, "INSERT INTO user (username, password, role_id) VALUES ('$username', '$password', 2)");
    if ($query) {
      session_start();
      $sql = mysqli_query($db, "SELECT * FROM user WHERE username='$username' and password = '$password'");
      $data = mysqli_fetch_array($sql);
      if ($data) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['login'] = true;
        header('location:user_home.php');
      }
    }
  }
}
?>
