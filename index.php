<?php
include 'layout/navbar.php';
include 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM data_mahasiswa");

?>
<div class="card">
    <div class="card-body">
        <div class="row" style="padding: 20px 53px;">
            <div class="footer" style="display: flex; flex-direction: row;">
                <div class="card bg-primary text-white col-sm-9">
                    <div class="card-body" style="text-align: center" >
                        Data Jurusan
                    </div>
                </div>
                <div class="card col-sm-3" style="border: none;">
                    <div class="card-body" style="margin: 0 0 0 10px; font-size: 18px; font-weight: bold;">
                        Detail Berdasarkan Gender
                    </div>
                </div>
            </div>

            <?php
            
            function getJumlahMahasiswaByJurusan($jurusan) {
            global $koneksi;
            $query = mysqli_query($koneksi,"SELECT COUNT(*) as total FROM data_mahasiswa WHERE id_jurusan = $jurusan");
            $data = mysqli_fetch_assoc($query);
            return $data['total'];
            }

            $jurusanInfor = 1;
            $jurusanSI= 2;

            $totalInfor = getJumlahMahasiswaByJurusan($jurusanInfor);
            $totalSI = getJumlahMahasiswaByJurusan($jurusanSI);
            ?>

            <div class="card" style="width: 32rem; height: 15rem; margin: 10px 11px;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-primary" style="width:31.5rem; margin: 0.2rem 0 0 -0.6rem; text-align:center;">
                        Informatika</li>
                    <li class="list-group-item" style="text-align:center;">
                        <p style="margin: 2.5rem;"><?php echo $totalInfor ?></p>
                        <p style="margin: 2.5rem;">Mahasiswa</p>
                    </li>
                </ul>
            </div>
            <div class="card" style="width: 32rem; height: 15rem; margin: 10px 13px;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-primary" style="width:31.5rem; margin: 0.2rem 0 0 -0.6rem; text-align:center;">
                        Sistem Informasi</li>
                    <li class="list-group-item" style="text-align:center;">
                        <p style="margin: 2.5rem;"><?php echo $totalSI ?></p>
                        <p style="margin: 2.5rem;">Mahasiswa</p>
                    </li>
                </ul>
            </div>
            <div class="card" style="width: 19rem; height: 10rem; margin: 10px 13px; border: none;">
                <ul class="list-group list-group-flush">
                    <?php  
                    $queryLaki = mysqli_query($koneksi, "SELECT COUNT(*) as total_laki FROM data_mahasiswa WHERE jenis_kelamin = 'Laki-Laki'");
                    $dataLaki = mysqli_fetch_assoc($queryLaki);
                    $totalLaki = $dataLaki['total_laki'];

                    $queryPerempuan = mysqli_query($koneksi, "SELECT COUNT(*) as total_perempuan FROM data_mahasiswa WHERE jenis_kelamin = 'Perempuan'");
                    $dataPerempuan = mysqli_fetch_assoc($queryPerempuan);
                    $totalPerempuan = $dataPerempuan['total_perempuan'];
                    ?>
                    <div class="card" style="width: 22rem; height: 3rem; margin: 0 0 0 -13px;">
                        <p style="margin: 10px 0 0 10px;">Jumlah mahasiswa laki-laki : <?php echo $totalLaki; ?></p>
                    </div>
                    <div class="card" style="width: 22rem; height: 3rem; margin: 10px 0 0 -13px;">
                        <p style="margin: 10px 0 0 10px;">Jumlah mahasiswi perempuan : <?php echo $totalPerempuan; ?></p>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php' ?>