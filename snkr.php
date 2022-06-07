<?php include 'head.php';
include 'koneksi.php' ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data jurusan</h4>
                        <div class="row">
                            <div class="col-9">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Sinkronisasi ke</th>
                                                <th>Data yang sinkron</th>
                                                <th>Terakhir sinkron</th>
                                                <th>Jumlah sinkron</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            include 'koneksi.php';
                                            $sql = mysqli_query($conn, "SELECT *, COUNT(*) AS jml FROM snkr GROUP BY tujuan");
                                            while ($r = mysqli_fetch_assoc($sql)) {
                                                $tj = $r['tujuan'];
                                                $dt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM snkr WHERE tujuan = '$tj' ORDER BY id_snkr DESC LIMIT 1"));
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td>Aplikasi <?= $dt['tujuan'] ?></td>
                                                    <td>Data <?= $dt['data'] ?></td>
                                                    <td><?= $dt['akhir'] ?></td>
                                                    <td><?= $r['jml'] ?> kali</td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-3">
                                <form action="snc.php" method="post">
                                    <div class="form-group">
                                        <label for="">Aplikasi Tujuan</label>
                                        <select name="tujuan" id="" class="form-control" required>
                                            <option value="">- pilih aplikasi tujuan -</option>
                                            <option value="bendahara">Aplikasi Bendahara</option>
                                            <option value="dekos">Aplikasi Dekosan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Data yang di sinkron</label>
                                        <select name="data" id="" class="form-control" required>
                                            <option value="">- pilih data -</option>
                                            <option value="santri">Data Santri</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-refresh"></i> Proses Sinkron!</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>

<?php
include 'foot.php';
if (isset($_POST['save'])) {
    $nama = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['nama']));
    $kode = htmlspecialchars(strtoupper(mysqli_real_escape_string($conn, $_POST['kode'])));

    // Edit hanya untuk contoh permainan saja
    $sql = mysqli_query($conn, "INSERT INTO jurusan VALUES ('', '$nama', '$kode') ");
    if ($sql) {
        echo "
            <script>
                window.location = 'jurusan.php' ;
            </script>
        ";
    }
}
?>