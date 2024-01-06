<?php
include 'layout/navbar.php';
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM admin where id_operator = '$id'");
$get = mysqli_fetch_array($query);

?>


<form method="POST" action="" class="card">
    <div class="card-header">
        Edit Operator
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-3">
                <label for="">Nama Operator</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" value="<?= $get['nama_operator']?>" name="nama_operator" placeholder="Masukkan nomor induk mahasiswa...">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Email</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" value="<?= $get['email_operator']?>" name="email" placeholder="Masukkan email...">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="">Password</label>
            </div>
            <div class="col-lg-9">
                <input type="password" class="form-control" value="<?= $get['password_operator']?>" name="pass" placeholder="Masukkan password baru...">
            </div>
        </div>
    </div>
</div>
<div class="card-footer">
    <button name="edit" class="btn btn-success">Edit Data</button>
    <a href="data_operator.php" class="btn btn-danger">Kembali</a>
</div>
</form>

<?php
include 'layout/footer.php';

if (isset($_POST['edit'])) {
    $nama_opt = $_POST['nama_operator'];
    $email_opt = $_POST['email'];
    $pass = $_POST['pass'];
    
    $simpan = mysqli_query($koneksi,"UPDATE admin
    SET nama_operator = '$nama_opt', email_operator = '$email_opt', password_operator = '$pass'
    where id_operator = '$id'");

if ($simpan) {
    echo '<script>
    alert("data berhasil di edit");
    window.location.href="data_operator.php";
    </script>';
}
}
mysqli_close($koneksi);
?>