<?php include 'layout/navbar.php'; ?>

<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.min.css
" rel="stylesheet">

<form method="post" action="" class="card">
    <div class="card-header">
        Form Mahasiswa
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
                <label for="">NIM Mahasiswa</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="nim_mhs" placeholder="Masukkan nomor induk mahasiswa...">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Nama Mahasiswa</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="nama_mhs" placeholder="Masukkan nama lengkap mahasiswa...">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Tanggal Lahir</label>
            </div>
            <div class="col-lg-9">
                <input type="date" class="form-control" name="tgl_lahir">
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
                    mysqli_close($koneksi);
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
    <div class="card-footer">
        <button name="simpan" class="btn btn-success">Simpan Data</button>
        <a href="data_mahasiswa.php" class="btn btn-danger">Kembali</a>
    </div>
</form>
 <?php include 'layout/footer.php';
 include 'koneksi.php';



 if (isset($_POST['simpan'])) {

     $nim_mhs = $_POST['nim_mhs'];

     $cekNim = mysqli_query($koneksi, "SELECT * FROM data_mahasiswa WHERE nim_mhs = '$nim_mhs'");
     if (mysqli_num_rows($cekNim) > 0) {
        $pesanKesalahan = '<script>
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "NIM yang Anda gunakan sudah ada. Silakan masukkan NIM lain.",
        footer: \'<a href="tambah_mahasiswa.php">Klik di Sini Untuk Mengedit Data Kembali</a>\'
      });
    </script>';

    echo $pesanKesalahan;
        exit;

     } else {

    $nim_mhs = $_POST['nim_mhs'];
    $nama_mhs = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jurusan = $_POST['jurusan'];
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';

    $simpan = mysqli_query($koneksi, "INSERT INTO data_mahasiswa (nim_mhs, nama_mhs, tgl_lahir, id_jurusan, jenis_kelamin) 
    VALUES ('$nim_mhs', '$nama_mhs', '$tgl_lahir', '$jurusan', '$jenis_kelamin')");

    if ($simpan) {
        echo '<script>
        alert("data berhasil disimpan");
        window.location.href="home.php";
        </script>';
        }
    }
 }
 ?>