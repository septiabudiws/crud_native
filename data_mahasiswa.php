<?php
include 'layout/navbar.php';
include 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT ds.*, dj.nama_jurusan
 FROM data_mahasiswa ds inner JOIN data_jurusan dj ON ds.id_jurusan = dj.id_jurusan");
?>
 

<div class="card">
    <div class="card-header">
        List Mahasiswa
    </div>
    <div class="card-body">
        <a href="tambah_mahasiswa.php" class="btn btn-primary btn-sm mb-3">+ Tambah Data Mahasiswa</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Tanggal lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($query as $get) :?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $get['nim_mhs'] ?></td>
                        <td><?= $get['nama_mhs']?></td>
                        <td><?= $get['tgl_lahir'] ?></td>
                        <td><?= $get['jenis_kelamin'] ?></td>
                        <td><?= $get['nama_jurusan'] ?></td>
                        <td>
                            <a href="edit_mahasiswa.php?id=<?= $get['id_mhs'] ?>" class="badge bg-primary">Edit</a>
                            <a onclick="return confirm('Hapus Data')" href="hapus_mahasiswa.php?id=<?= $get['id_mhs'] ?>" class="badge bg-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include 'layout/footer.php' ?>