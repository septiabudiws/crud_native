<?php include 'layout/navbar.php' ?>

<form method="post" action="" class="card">
    <div class="card-header">
        Form Operator
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
                <label for="">Nama Operator</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="nama_operator" placeholder="Masukkan nama anda...">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Email</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" name="email" placeholder="Masukkan email anda...">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">Password</label>
            </div>
            <div class="col-lg-9">
                <input type="password" class="form-control" name="password" placeholder="Masukkan password anda...">
                <span class="password-toggle" onclick="togglePassword()">👁️</span>
                <script>
        function togglePassword() {
                var passwordInput = document.getElementById('password');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                    }
                }
                </script>
            </div>
        </div>
        <div class="card-footer">
        <button name="simpan" class="btn btn-success">Simpan Data</button>
        <a href="data_operator.php" class="btn btn-danger">Kembali</a>
        </div>
    </div>
</form>

<?php include 'layout/footer.php';
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama_opt = $_POST['nama_operator'];
    $email_opt = $_POST['email'];
    $pass_opt = $_POST['password'];

    $simpan = mysqli_query($koneksi, "INSERT INTO admin 
    VALUES (null, '$nama_opt', '$email_opt', '$pass_opt')");
    //$simpan = mysqli_query($koneksi, "INSERT INTO data_mahasiswa values(null, '$nim_mhs', '$nama_mhs', '$jurusan', '$tgl_lahir')");

    if ($simpan) {
        echo '<script>
        alert("data berhasil disimpan");
        window.location.href="data_operator.php";
        </script>';
    }
 }

?>