<?php

    include "../includes/koneksi.php";

    $id_dealer = $_GET['id_dealer'];

    $sql = "DELETE FROM tb_dealer WHERE id_dealer='$id_dealer'";
    $sql_eksekusi = mysqli_query($koneksi, $sql);
    if($sql_eksekusi)
    {
        header("location:show_dealer.php");
    }
    else
    {
        echo "GAGAL HAPUS DATA";
    }

?>