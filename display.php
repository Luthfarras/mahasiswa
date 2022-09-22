<?php
include 'config.php';
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
     <title>Display Tambah Data</title>
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
           <form class="d-flex ms-auto" role="search">
               <a href="logout.php" class="btn btn-outline-info">Logout</a>
           </form>
           </div>
       </div>
       </nav>
     </div>
     <div class="container mt-5">
       <div class="row">
         <div class="col-sm-6">
           <div class="card">
             <div class="card-body">
               <h5 class="card-title">Tambah Data</h5>
               <form class="mt-4" action="" method="POST" enctype="multipart/form-data">
                 <div class="mb-3">
                   <label class="form-label">Nama Mahasiswa</label>
                   <input type="text" class="form-control" name="nama" id="name1">
                 </div>
                 <div class="mb-3">
                   <label class="form-label">Tanggal Lahir</label>
                   <input type="date" class="form-control" name="tgl_lahir" id="date1">
                 </div>
                 <div class="mb-3">
                   <label class="form-label">NIM</label>
                   <input type="number" class="form-control" name="nim" id="nim1">
                 </div>
                 <div class="mb-3">
                   <label class="form-label">Jurusan</label>
                   <select class="" name="jurusan" id="sel1">
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
                   <input type="file" class="form-control" name="foto" id="foto1">
                 </div>
                 <button type="submit" class="btn btn-outline-danger" name="submit">Tambah Data</button>
              </form>
             </div>
           </div>
         </div>
         <div class="col-sm-6">
           <div class="card">
             <div class="card-body">
               <h5 class="card-title">Preview</h5>
               <form class="mt-4" action="" method="POST" enctype="multipart/form-data">
                 <div class="mb-3">
                   <label class="form-label">Nama Mahasiswa</label>
                   <input type="text" class="form-control" name="nama" id="name2" disabled>
                 </div>
                 <div class="mb-3">
                   <label class="form-label">Tanggal Lahir</label>
                   <input type="date" class="form-control" name="tgl_lahir" id="date2" disabled>
                 </div>
                 <div class="mb-3">
                   <label class="form-label">NIM</label>
                   <input type="number" class="form-control" name="nim" id="nim2" disabled>
                 </div>
                 <div class="mb-3">
                   <label class="form-label">Jurusan</label>
                   <select class="" name="jurusan" id="sel2" disabled>
                     <?php
                     $sql = mysqli_query($db, "SELECT * FROM jurusan");
                     while ($data = mysqli_fetch_array($sql)) {
                       ?>
                       <option value="<?= $data['id_jurusan']?>"><?= $data['nama_jurusan']?></option>
                     <?php } ?>
                   </select>
                 </div>
                 <!-- <div class="mb-3">
                   <label class="form-label">Foto</label>
                   <input type="file" class="form-control" name="foto" id="foto2" disabled>
                 </div> -->
                 <button type="submit" class="btn btn-outline-danger" name="submit">Tambah Data</button>
              </form>
             </div>
           </div>
         </div>
       </div>
     </div>
     <script type="text/javascript">
     document.getElementById("name1").addEventListener("input", function(){
       document.getElementById("name2").value = this.value;
     });
     document.getElementById("date1").addEventListener("input", function(){
       document.getElementById("date2").value = this.value;
     });
     document.getElementById("nim1").addEventListener("input", function(){
       document.getElementById("nim2").value = this.value;
     });
     document.getElementById("sel1").addEventListener("input", function(){
       document.getElementById("sel2").value = this.value;
     });
     </script>
   </body>
 </html>
