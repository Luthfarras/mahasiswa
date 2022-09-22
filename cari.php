<?php
include 'config.php';
session_start();
if (!$_SESSION['username']) {
  header('location:index.php');
  exit;
}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
     <title>Hasil Pencarian</title>
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
               <a href="logout.php" class="btn btn-outline-primary">Logout</a>
           </form>
           </div>
       </div>
       </nav>
     </div>
     <div class="container">
       <table class="table mt-4">
         <thead>
           <tr>
             <th scope="col">No</th>
             <th scope="col">Nama</th>
             <th scope="col">Tgl Lahir</th>
             <th scope="col">NIM</th>
             <th scope="col">Jurusan</th>
						 <th scope="col">Foto</th>
           </tr>
         </thead>
         <tbody>
           <?php
              if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $data = mysqli_query($db, "select * from mahasiswa join jurusan on mahasiswa.id_jurusan = jurusan.id_jurusan where nama like '%".$cari."%'");
              }else{
                $data = mysqli_query($db, "select * from mahasiswa join jurusan on mahasiswa.id_jurusan = jurusan.id_jurusan");
              }
              while($d = mysqli_fetch_array($data)){
              ?>
                 <tr>
                     <td><?= $d['id_mahasiswa'] ?></td>
                     <td><?= $d['nama']?></td>
                     <td><?= $d['tgl_lahir']?></td>
                     <td><?= $d['nim']?></td>
                     <td><?= $d['nama_jurusan']?></td>
										 <td><img src="img/<?= $d['foto']?>" alt="" style="width:100px"></td>
                 </tr>
             <?php
             }
             ?>
           </tr>
         </tbody>
       </table>
     </div>
   </body>
 </html>
