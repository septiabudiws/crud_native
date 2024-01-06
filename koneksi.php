<?php
$koneksi = mysqli_connect('localhost','root','','mahasiswa');

if (!$koneksi) {
    echo "Database gagal tersambung, cek koneksi database anda";
}
?>