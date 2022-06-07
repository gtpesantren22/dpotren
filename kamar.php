<?php
include 'head.php';
include 'koneksi.php';

$dt = mysqli_query($conn, "SELECT * FROM kamar WHERE jkl = 'Laki-laki' ");
$dt1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kamar WHERE jkl = 'Laki-laki'"));
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Kamar Santri Putra</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <?php
                                    $qr = mysqli_query($conn, "SELECT komplek FROM tb_santri WHERE jkl = 'Laki-laki' AND aktif = 'Y' GROUP BY komplek");
                                    while ($daa = mysqli_fetch_assoc($qr)) {
                                        $tf = $daa['komplek'];
                                    ?>
                                        <div class="col-md-3">
                                            <?php
                                            $wr = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kamar WHERE komplek = '$tf' AND jkl = 'Laki-laki' GROUP BY komplek "));
                                            if ($wr == 1) { ?>
                                                <span style="font-weight: bold; color: green;"><?= $daa['komplek'] ?></span>
                                            <?php } else { ?>
                                                <span style="font-weight: bold; color: red;"><?= $daa['komplek'] ?></span>
                                            <?php } ?>
                                            <table width="100%" class="table-striped table-bordered">
                                                <?php
                                                $dt = mysqli_query($conn, "SELECT * FROM tb_santri WHERE komplek = '$tf' AND aktif = 'Y' AND jkl = 'Laki-laki' GROUP BY kamar ORDER BY kamar ");
                                                while ($ss = mysqli_fetch_assoc($dt)) {
                                                    $kf = $ss['kamar'];
                                                    $ttl = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS jm FROM tb_santri  WHERE komplek = '$tf' AND jkl = 'Laki-laki' AND aktif = 'Y' AND kamar = '$kf'  "));
                                                    $wr2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kamar WHERE komplek = '$tf' AND jkl = 'Laki-laki' AND nama = '$kf' GROUP BY nama "));
                                                ?>
                                                    <tr>
                                                        <th><?php
                                                            if ($wr2 == 1) { ?>
                                                                <span style="font-weight: bold; color: green;"><?= $ss['kamar']; ?></span>
                                                            <?php } else { ?>
                                                                <span style="font-weight: bold; color: red;"><?= $ss['kamar']; ?></span>
                                                            <?php } ?>
                                                        </th>
                                                        <th>
                                                            <a href="dt_kamar.php?km=<?= $ss['kamar']; ?>">
                                                                <?= $ttl['jm']; ?>
                                                            </a>

                                                        </th>
                                                    </tr>

                                                <?php } ?>
                                            </table>
                                            <br>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Data Baru</h4>
                        <div class="row">

                            <div class="col-md-12">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Input Kamar Baru</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukan nama kamar" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Daerah</label>
                                        <select name="daerah" id="" class="form-control" required>
                                            <option value=""> -pilih- </option>
                                            <option value="putra"> Putra</option>
                                            <option value="putri"> Putri</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Komplek</label>
                                        <select name="komplek" id="" class="form-control" required>
                                            <option value=""> -pilih- </option>
                                            <?php
                                            $qr = mysqli_query($conn, "SELECT * FROM komplek ");
                                            while ($rr = mysqli_fetch_assoc($qr)) { ?>
                                                <option value="<?= $rr['nama']; ?>"><?= $rr['nama']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="save" class="btn btn-success btn-sm">Simpan Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Kamar Santri Putri</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <?php
                                    $qr = mysqli_query($conn, "SELECT komplek FROM tb_santri WHERE jkl = 'Perempuan' AND aktif = 'Y' GROUP BY komplek");
                                    while ($daa = mysqli_fetch_assoc($qr)) {
                                        $tf = $daa['komplek'];
                                    ?>
                                        <div class="col-md-3">
                                            <?php
                                            $wr = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kamar WHERE komplek = '$tf' AND jkl = 'Perempuan' GROUP BY komplek "));
                                            if ($wr == 1) { ?>
                                                <span style="font-weight: bold; color: green;"><?= $daa['komplek'] ?></span>
                                            <?php } else { ?>
                                                <span style="font-weight: bold; color: red;"><?= $daa['komplek'] ?></span>
                                            <?php } ?>
                                            <table width="100%" class="table-striped table-bordered">
                                                <?php
                                                $dt = mysqli_query($conn, "SELECT * FROM tb_santri WHERE komplek = '$tf' AND aktif = 'Y' AND jkl = 'Perempuan' GROUP BY kamar ORDER BY kamar ");
                                                while ($ss = mysqli_fetch_assoc($dt)) {
                                                    $kf = $ss['kamar'];
                                                    $ttl = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS jm FROM tb_santri  WHERE komplek = '$tf' AND jkl = 'Perempuan' AND aktif = 'Y' AND kamar = '$kf'  "));
                                                    $wr2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kamar WHERE komplek = '$tf' AND jkl = 'Perempuan' AND nama = '$kf' GROUP BY nama "));
                                                ?>
                                                    <tr>
                                                        <th><?php
                                                            if ($wr2 == 1) { ?>
                                                                <span style="font-weight: bold; color: green;"><?= $ss['kamar']; ?></span>
                                                            <?php } else { ?>
                                                                <span style="font-weight: bold; color: red;"><?= $ss['kamar']; ?></span>
                                                            <?php } ?>
                                                        </th>
                                                        <th>
                                                            <a href="dt_kamar.php?km=<?= $ss['kamar']; ?>">
                                                                <?= $ttl['jm']; ?>
                                                            </a>


                                                        </th>
                                                    </tr>

                                                <?php } ?>
                                            </table>
                                            <br>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Kamar</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration table-sm">
                                <thead>
                                    <tr>
                                        <th>^</th>
                                        <th>Nama</th>
                                        <th>Komplek</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $qr = mysqli_query($conn, "SELECT * FROM kamar ");
                                    while ($rr = mysqli_fetch_assoc($qr)) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $rr['nama']; ?></td>
                                            <td><?= $rr['komplek']; ?></td>
                                            <td><a href="hapus.php?kd=kmr&id=<?= $rr['id_kamar']; ?>"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
    $daerah = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['daerah']));
    $komplek = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['komplek']));

    $sql = mysqli_query($conn, "INSERT INTO kamar VALUES ('', '$nama', '$komplek', '$daerah') ");
    if ($sql) {
        echo "
            <script>
                window.location = 'kamar.php' ;
            </script>
        ";
    }
}
?>