<?php
include 'config.php';
session_start();
if (!$_SESSION['username']) {
  header('location:index.php');
  exit;
}

$id = $_GET['id_mahasiswa'];
$ambil = mysqli_query($db, "SELECT * FROM mahasiswa join jurusan on mahasiswa.id_jurusan = jurusan.id_jurusan WHERE id_mahasiswa='$id'");
while($data = mysqli_fetch_array($ambil)){
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
     <title>Tambah Data</title>
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
     <div class="container m-4">
       <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Nama Mahasiswa</label>
          <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">NIM</label>
          <input type="number" class="form-control" name="nim" value="<?= $data['nim'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Jurusan</label>
            <select class="" name="jurusan">
              <?php
              $sql = mysqli_query($db, "SELECT * FROM jurusan");
              while ($data = mysqli_fetch_array($sql)) {
               ?>
               <option value="<?= $data['id_jurusan']?>"><?= $data['nama_jurusan']?></option>
             <?php } ?>
            </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Foto</label>
          <input type="file" class="form-control" name="foto">
        </div>
        <button type="submit" class="btn btn-success" name="submit">Edit Data</button>
      </form>
     </div>
   </body>
 </html>

 <?php } ?>


 <?php
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $nim = $_POST['nim'];
  $jurusan = $_POST['jurusan'];
  $file = $_FILES['foto']['name'];
  $tmp_name = $_FILES['foto']['tmp_name'];
  $upload = move_uploaded_file($tmp_name, "img/" . $file);
  $query = mysqli_query($db, "UPDATE mahasiswa SET nama='$nama', tgl_lahir='$tgl_lahir', nim='$nim', id_jurusan='$jurusan', foto='$file' WHERE id_mahasiswa='$id'");

  if ($query) {
    header("location:index.php");
  }

}
?>
