<?php include 'layout/navbar.php';
include 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM admin");
?>
<div class="card">
    <div class="card-body">
        <a href="tambah_operator.php" class="btn btn-primary btn-sm mb-3">+ Tambah Data Operator</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Operator</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($query as $get) :
                        ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $get['nama_operator'] ?></td>
                            <td><?= $get['email_operator'] ?></td>
                            <td>
                            <a href="edit_operator.php?id=<?= $get['id_operator'] ?>" class="badge bg-primary">Edit</a>
                            <a onclick="return confirm('Hapus Data')" href="hapus_operator.php?id=<?= $get['id_operator'] ?>" class="badge bg-danger">Hapus</a>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'layout/footer.php'?>