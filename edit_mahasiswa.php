<?php
include 'layout/navbar.php';
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM data_mahasiswa where id_mhs = '$id'");
$get = mysqli_fetch_array($query);

?>


<form method="POST" action="" class="card">
    <div class="card-header">
        Form Mahasiswa
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
                <label for="">NIM Mahasiswa</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" value="<?= $get['nim_mhs']?>" name="nim_mahasiswa" placeholder="Masukkan nomor induk mahasiswa...">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Nama Mahasiswa</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" value="<?= $get['nama_mhs']?>" name="nama_mahasiswa" placeholder="Masukkan nama lengkap mahasiswa...">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Tanggal Lahir</label>
            </div>
            <div class="col-lg-9">
                <input type="date" class="form-control" value="<?= $get['tgl_lahir']?>" name="tgl_lahir">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3 form-label">
                <label for="jurusan">Jurusan</label>
            </div>
            <div class="col-lg-9">
                <select class="form-select" id="jurusan" aria-label="Default select example" name="jurusan">
                    <option value="" disabled selected>Pilih Jurusan</option>
                    <?php
                    include "koneksi.php";

                    $query = mysqli_query($koneksi, "SELECT * FROM data_jurusan");

                    while ($data = mysqli_fetch_array($query)) {
                        echo "<option value='{$data['id_jurusan']}'>{$data['nama_jurusan']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Jenis Kelamin</label>
            </div>
            <div class="col-lg-9">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-Laki" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Perempuan
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-footer">
    <button name="edit" class="btn btn-success">Edit Data</button>
    <a href="data_mahasiswa.php" class="btn btn-danger">Kembali</a>
</div>
</form>

<?php
include 'layout/footer.php';

if (isset($_POST['edit'])) {
    $nim_mhs = $_POST['nim_mahasiswa'];
    $nama_mhs = $_POST['nama_mahasiswa'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jurusan = $_POST['jurusan'];
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
    
    $simpan = mysqli_query($koneksi,"UPDATE data_mahasiswa
    SET nim_mhs = '$nim_mhs', nama_mhs = '$nama_mhs', tgl_lahir = '$tgl_lahir', id_jurusan = '$jurusan', jenis_kelamin = '$jenis_kelamin'
    where id_mhs = '$id'");

if ($simpan) {
    echo '<script>
    alert("data berhasil di edit");
    window.location.href="data_mahasiswa.php";
    </script>';
}
}
mysqli_close($koneksi);
?>