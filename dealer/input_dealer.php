<?php
    include "../includes/koneksi.php";

    $nama_dealer  = $_POST['nama_dealer'];
    $no_telp   = $_POST['no_telp'];
    $alamat   = $_POST['alamat'];

    $sql = "INSERT INTO tb_dealer (nama_dealer, no_telp, alamat)
            VALUES ('$nama_dealer', '$no_telp', '$alamat')";
    $sql_eksekusi = mysqli_query($koneksi, $sql);
    if($sql_eksekusi)
    {
        header("location:show_dealer.php");
    }
    else
    {
        echo "Gagal menambahkan kategori baru!";
    }
?>