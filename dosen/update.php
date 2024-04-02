<?php
session_start();
require_once '../helper/connection.php';

$nidn = $_POST['nidn'];
$nama_dosen = $_POST['nama'];
$jenkel = $_POST['jenkel'];
$alamat_kelahiran = $_POST['alamat_kelahiran'];
$tanggal_kelahirannl = $_POST['tanggal_kelahirann'];
$alamat = $_POST['alamat'];

$query = mysqli_query($connection, "UPDATE dosen SET nama_dosen = '$nama_dosen', jenkel_dosen = '$jenkel',alamat_kelahiran ='$alamat_kelahiran',tanggal_kelahiran ='$tanggal_kelahiran', alamat_dosen = '$alamat' WHERE nidn = '$nidn'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
