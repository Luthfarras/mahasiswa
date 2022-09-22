<?php
include 'config.php';
session_start();
// if(isset($_SESSION['login']))
//   {
//     if(isset($_POST['logout']))
//     {
//         session_destroy();
//         header("location:index.php");
//     }else{
//       exit('Access denied');
//     }
//   }
if (!$_SESSION['username']) {
  header('location:index.php');
  exit;
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <title>Data Mahasiswa</title>
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
        <!-- <form class="d-flex ms-auto" action="" method="post">
          <input name="logout" type="submit" value="logout" class="btn btn-secondary">
        </form> -->
        <form class="d-flex ms-auto" role="search">
            <a href="logout.php" class="btn btn-outline-primary">Logout</a>
        </form>
        </div>
    </div>
    </nav>
  </div>
  <div>
    <nav class="navbar">
    <div class="container mt-4">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a href="display.php" class="btn btn-outline-primary">Tambah Data</a>
            </li>
        </ul>
        <form class="d-flex col-6" action="cari.php" method="get">
            <input class="form-control me-2" type="text" placeholder="Cari Mahasiswa" name="cari">
            <input type="submit" value="Cari" class="btn btn-outline-success">
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
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $ambil = mysqli_query($db, "select * from mahasiswa join jurusan on mahasiswa.id_jurusan = jurusan.id_jurusan order by id_mahasiswa ASC");
            while($data = mysqli_fetch_array($ambil)){
                ?>
                <tr>
                    <td><?= $data['id_mahasiswa']?></td>
                    <td><?= $data['nama']?></td>
                    <td><?= $data['tgl_lahir']?></td>
                    <td><?= $data['nim']?></td>
                    <td><?= $data['nama_jurusan']?></td>
										<td> <img src="img/<?= $data['foto']?>" alt="" style="width:100px"> </td>
                    <td colspan="2">
                      <a href="edit.php?id_mahasiswa=<?= $data['id_mahasiswa']; ?>" class="btn btn-warning">Edit</a>
                      <a href="hapus.php?id_mahasiswa=<?= $data['id_mahasiswa']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
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
