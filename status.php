<?php include 'head.php';
include 'koneksi.php';
$tahapan =  mysqli_query($conn, "SELECT * FROM status");
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Status santri
                            <a href="#" data-toggle="modal" data-target="#tambah"><button class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Data</button></a>
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Status</th>
                                        <!-- <th>Nominal</th> -->
                                        <th>Tahun</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($tahapan as $r) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?php $st = $r["stts"];
                                                $ps = explode("-", $st);
                                                if ($ps[0] == 1) {
                                                    echo "<span class='badge  badge-light'>Ust/Usdz</span>";
                                                    echo " ";
                                                }
                                                if ($ps[1] == 2) {
                                                    echo "<span class='badge  badge-primary'>Mhs/i</span>";
                                                    echo " ";
                                                }
                                                if ($ps[2] == 3) {
                                                    echo "<span class='badge  badge-success'>Sdr/i</span>";
                                                    echo " ";
                                                }
                                                if ($ps[3] == 4) {
                                                    echo "<span class='badge  badge-info'>Kls 6</span>";
                                                    echo " ";
                                                }
                                                if ($ps[4] == 5) {
                                                    echo "<span class='badge  badge-warning'>Baru</span>";
                                                    echo " ";
                                                }
                                                if ($ps[5] == 6) {
                                                    echo "<span class='badge  badge-danger'>Lama</span>";
                                                    echo " ";
                                                }
                                                if ($ps[6] == 7) {
                                                    echo "<span class='badge  badge-primary'>Peng. Wilyah</span>";
                                                    echo " ";
                                                }
                                                if ($ps[7] == 8) {
                                                    echo "<span class='badge  badge-dark'>Putra</span>";
                                                    echo " ";
                                                }
                                                if ($ps[8] == 9) {
                                                    echo "<span class='badge  badge-info'>Putri</span>";
                                                    echo " ";
                                                }
                                                if ($ps[9] == 10) {
                                                    echo "<span class='badge  badge-primary'>Yatim</span>";
                                                    echo " ";
                                                }
                                                if ($ps[10] == 11) {
                                                    echo "<span class='badge  badge-info'>Extra</span>";
                                                    echo " ";
                                                }
                                                ?></td>

                                            <td><?= $r["tahun"]; ?> </td>
                                            <td>
                                                <a href="hapus.php?kd=sts&id=<?= $r['id_stts']; ?>"><button type="" name="hapus" class="btn btn-danger btn-xs" href="#hapus" id="custId" data-toggle="modal" data-id=""><span class="fa fa-close"></span></button></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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

<div class="modal fade" id="tambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Tahapan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form role="form" action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Status</label>
                        <table class="table table-striped table-sm table-bordered zero-configuration ">
                            <tr>
                                <td>
                                    <input type="checkbox" name="usd" value="1">
                                </td>
                                <td rowspan="4">&nbsp;</td>
                                <td>Ustad/Ustadzah</td>
                                <td rowspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    <input type="checkbox" name="mhs" value="2">
                                </td>
                                <td rowspan="4">&nbsp;</td>
                                <td>Mahasiswa/i</td>
                                <td>
                                    <input type="checkbox" name="sdr" value="3">
                                </td>
                                <td rowspan="4">&nbsp;</td>
                                <td>Bersaudara/i</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="kls6" value="4">
                                </td>
                                <td>Kelas 6</td>
                                <td>
                                    <input type="checkbox" name="br" value="5">
                                </td>
                                <td>Santi Baru</td>
                                <td>
                                    <input type="checkbox" name="pa" value="8">
                                </td>
                                <td>Putra</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="lm" value="6">
                                </td>
                                <td>Santi Lama</td>
                                <td>
                                    <input type="checkbox" name="pwl" value="7">
                                </td>
                                <td>Pengurus Wilayah</td>
                                <td>
                                    <input type="checkbox" name="pi" value="9">
                                </td>
                                <td>Putri</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="ytm" value="10">
                                </td>
                                <td>Yatim</td>
                                <td>
                                    <input type="checkbox" name="ext" value="11">
                                </td>
                                <td>Extra</td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-group">
                        <label>Tahun</label>
                        <select name="tahun" id="" class="form-control" required>
                            <option value="">-- Pilih Tahun --</option>
                            <?php
                            $th = mysqli_query($conn, "SELECT * FROM tahun");
                            $no = 0;
                            while ($thn = mysqli_fetch_array($th)) {
                                $no++;
                            ?>
                                <option value="<?= $thn['nama'] ?>"><?= $thn['nama'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include 'foot.php';

if (isset($_POST['save'])) {
    $stts = $_POST['usd'] . "-" . $_POST['mhs'] . "-" . $_POST['sdr'] . "-" . $_POST['kls6'] . "-" . $_POST['br'] . "-" . $_POST['lm'] . "-" . $_POST['pwl'] . "-" . $_POST['pa'] . "-" . $_POST['pi'] . "-" . $_POST['ytm'] . "-" . $_POST['ext'];
    $tahun = $_POST['tahun'];

    $cek = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS jml FROM status WHERE stts = '$stts' AND tahun = '$tahun' "));
    if ($cek['jml'] > 0) {
        echo "
        <script>
        alert('Data sudah ada');
            window.location = 'status.php';
        </script>
        ";
    } else {
        $query = mysqli_query($conn, "INSERT INTO status VALUES ('', '$stts', '$tahun') ");
        if ($query) {
            echo "
        <script>
            window.location = 'status.php';
        </script>
        ";
        }
    }
}
?>