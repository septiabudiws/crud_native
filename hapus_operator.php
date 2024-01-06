<?php

include 'koneksi.php';

$id = $_GET['id'];

$hapus = mysqli_query($koneksi, "DELETE FROM admin where id_operator ='$id'");

if ($hapus) {   
    echo '<script>
    alert("data berhasil di hapus");
    window.location.href="data_operator.php";
    </script>';
 }
 ?>