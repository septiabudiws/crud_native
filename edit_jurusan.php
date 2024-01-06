<?php include 'layout/navbar.php';
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM data_jurusan where id_jurusan = '$id'");
$get = mysqli_fetch_array($query);

?>


<form method="POST" action="" class="card">
    <div class="card-header">
        Form Mahasiswa
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
                <label for="">Nama Jurusan</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" value="<?= $get['nama_jurusan']?>" name="nama_jurusan" placeholder="Masukkan nama jurusan...">
            </div>
        </div>
        <div class="card-footer">
    <button name="edit" class="btn btn-success">Edit Data</button>
    <a href="data_jurusan.php" class="btn btn-danger">Kembali</a>
</div>
    </div>
</form>

<?php include 'layout/footer.php';

if (isset($_POST['edit'])) {
    $namaJurusan = mysqli_real_escape_string($koneksi, $_POST['nama_jurusan']);
    
    $simpan = mysqli_query($koneksi,"UPDATE data_jurusan SET nama_jurusan = '$namaJurusan' WHERE id_jurusan = '$id'");

if ($simpan) {
    echo '<script>
    alert("data berhasil di edit");
    window.location.href="data_jurusan.php";
    </script>';
}
}
mysqli_close($koneksi);

?>