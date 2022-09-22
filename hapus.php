<?php
include 'config.php';
$id = $_GET['id_mahasiswa'];
mysqli_query($db, "DELETE FROM mahasiswa WHERE id_mahasiswa='$id'");
header("location:index.php");
 ?>
