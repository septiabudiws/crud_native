<?php

include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $checkUsage = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM data_mahasiswa WHERE id_jurusan = '$id'");
    $result = mysqli_fetch_assoc($checkUsage);

    if ($result['total'] > 0) {
        echo '<script>
            alert("Jurusan masih digunakan oleh data mahasiswa. Tidak dapat dihapus.");
            window.location.href="data_jurusan.php";
            </script>';
        exit;
    }

    $query = mysqli_query($koneksi, "DELETE FROM data_jurusan WHERE id_jurusan = '$id'");

    if ($query) {
        echo '<script>
        alert("Data Berhasil Dihapus");
        window.location.href="data_jurusan.php";
        </script>';
    } else {
        echo '<script>
        alert("Gagal Menghapus Data");
        window.location.href="data_jurusan.php";
        </script>';
    }
}
 ?>