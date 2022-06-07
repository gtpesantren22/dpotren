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
                            <div class="col-md-7">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Kode</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            include 'koneksi.php';
                                            $sql = mysqli_query($conn, "SELECT * FROM jurusan ");
                                            while ($r = mysqli_fetch_assoc($sql)) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $r['nama'] ?></td>
                                                    <td><?= $r['kode'] ?></td>
                                                    <td><a href="<?= 'hapus.php?kd=jrs&id=' . $r['id_jurusan'] ?>" onclick="return confirm('Yakiin akan dihapus ?')"><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Dele</button></a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label>Input Nama jurusan</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukan nama Jurusan" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Kode</label>
                                        <input type="text" name="kode" class="form-control" placeholder="Kode Jursan" required>
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
    $kode = htmlspecialchars(strtoupper(mysqli_real_escape_string($conn, $_POST['kode'])));

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