<?php
include 'head.php';
include 'koneksi.php';

$kf = $_GET['km'];
$mm = mysqli_query($conn, "SELECT * FROM tb_santri WHERE aktif = 'Y' AND kamar = '$kf' ");
$row = mysqli_fetch_assoc($mm);
$jkl = $row['jkl']
?>

<div class="content-body">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Santri Aktif</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>komplek</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($r = mysqli_fetch_array($mm)) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $r['nama'] ?></td>
                                            <td><?= $r['desa'] . '-' . $r['kec'] . '-' . $r['kab'] ?></td>
                                            <td><?= $r['kamar'] . ' / ' . $r['komplek'] ?></td>
                                            <td><a href="#" data-toggle="modal" data-target="#edit<?= $r['nis']; ?>"><i class="fa fa-edit"></i></a></td>
                                        </tr>
                                        <div class="modal fade" id="edit<?= $r['nis']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <form action="" method="post">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit kamarnya <?= $r['nama'] ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="nis" value="<?= $r['nis'] ?>">
                                                            <select name="t_f" id="mall" class="form-control">
                                                                <option value="">Pilih komplek</option>
                                                                <?php
                                                                $sq = mysqli_query($conn, "SELECT komplek FROM kamar WHERE jkl = '$jkl' GROUP BY komplek");
                                                                while ($kl = mysqli_fetch_assoc($sq)) {
                                                                ?>
                                                                    <option value="<?= $kl['komplek'] ?>"><?= $kl['komplek'] ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                            <br>
                                                            <select name="k_f" id="kmm" class="form-control">
                                                                <option value="">Pilih kamar</option>
                                                                <?php
                                                                $sq = mysqli_query($conn, "SELECT * FROM kamar WHERE jkl = '$jkl' ");
                                                                while ($kl = mysqli_fetch_assoc($sq)) {
                                                                ?>
                                                                    <option value="<?= $kl['nama'] ?>"><?= $kl['komplek'] . ' - ' . $kl['nama'] ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" name="s_kls" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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

if (isset($_POST['s_kls'])) {

    $nis = $_POST['nis'];
    $komplek = $_POST['t_f'];
    $kamar = $_POST['k_f'];

    $s = mysqli_query($conn, "UPDATE tb_santri SET komplek = '$komplek', kamar = '$kamar' WHERE nis = '$nis' ");
    if ($s) {
        echo "
        <script>
        window.location.href = 'kamar_pa.php';
        </script>
        ";
    }
}

?>