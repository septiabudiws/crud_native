<?php include 'layout/navbar.php' ?>

<form method="post" action="" class="card">
    <div class="card-header">
        Form Jurusan
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
                <label for="">Nama Jurusan</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="nama_jurusan" placeholder="Masukkan nama jurusan...">
            </div>
        </div>
        <div class="card-footer">
        <button name="simpan" class="btn btn-success">Simpan Data</button>
        <a href="data_jurusan.php" class="btn btn-danger">Kembali</a>
        </div>
    </div>
</form>

<?php include 'layout/footer.php';
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama_jurusan = $_POST['nama_jurusan'];

    $simpan = mysqli_query($koneksi, "INSERT INTO data_jurusan 
    VALUES (null, '$nama_jurusan')");
    //$simpan = mysqli_query($koneksi, "INSERT INTO data_mahasiswa values(null, '$nim_mhs', '$nama_mhs', '$jurusan', '$tgl_lahir')");

    if ($simpan) {
        echo '<script>
        alert("data berhasil disimpan");
        window.location.href="data_jurusan.php";
        </script>';
    }
 }

?>