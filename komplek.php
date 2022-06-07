<?php include 'head.php';
include 'koneksi.php' ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Asrama Santri</h4>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Daerah</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            include 'koneksi.php';
                                            $sql = mysqli_query($conn, "SELECT * FROM komplek ");
                                            while ($r = mysqli_fetch_assoc($sql)) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $r['nama'] ?></td>
                                                    <td><?= $r['daerah'] ?></td>
                                                    <td><a href="<?= 'hapus.php?kd=kmp&id=' . $r['id_komplek'] ?>" onclick="return confirm('Yakiin akan dihapus ?')"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Dele</button></a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Input Komplek Baru</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukan nama komplek" required>
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
                                        <button type="submit" name="save" class="btn btn-success btn-sm">Simpan Data</button>
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
    $daerah = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['daerah']));

    $sql = mysqli_query($conn, "INSERT INTO komplek VALUES ('', '$nama', '$daerah') ");
    if ($sql) {
        echo "
            <script>
                window.location = 'komplek.php' ;
            </script>
        ";
    }
}
?>