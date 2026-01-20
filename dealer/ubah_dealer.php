<?php
session_start();
include "../includes/koneksi.php";

$id_dealer   = $_POST['id_dealer'];
$nama_dealer = trim($_POST['nama_dealer']);
$no_telp  = trim($_POST['no_telp']);
$alamat = trim($_POST['alamat']);

$query = "UPDATE tb_dealer 
          SET nama_dealer = '$nama_dealer', 
              no_telp = '$no_telp',
              alamat = '$alamat'
          WHERE id_dealer = '$id_dealer'";

$sql_query = mysqli_query($koneksi, $query);

if ($sql_query) {
    header("location:show_dealer.php");
} else {
    echo "Data Gagal diubah";
}



?>


