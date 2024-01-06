<?php

include 'koneksi.php';

$id = $_GET['id'];

$hapus = mysqli_query($koneksi, "DELETE FROM data_mahasiswa where id_mhs ='$id'");

if ($hapus) {
    echo '<script>
    alert("data berhasil di hapus");
    window.location.href="data_mahasiswa.php";
    </script>';
 }
 ?>