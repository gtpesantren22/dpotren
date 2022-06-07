<?php include 'head.php';
include 'koneksi.php' ?>

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
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    include 'koneksi.php';
                                    $sql = mysqli_query($conn, "SELECT * FROM tb_santri WHERE aktif = 'Y' ");
                                    while ($r = mysqli_fetch_assoc($sql)) {
                                        $t = array('Bayar', 'Ust/Usdtz', 'Khaddam', 'Gratis', 'Berhenti');
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $r['nis'] ?></td>
                                            <td><?= $r['nama'] ?></td>
                                            <td><?= $r['desa'] . ' - ' . $r['kec'] . ' - ' . $r['kab'] ?></td>
                                            <td><?= $r['k_formal'] . ' - ' . $r['t_formal'] ?></td>

                                            <td><a href="<?= 'edit.php?nis=' . $r['nis'] ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></button></a>
                                                <!--<a href="<?= 'back.php?nis=' . $r['nis'] ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></a>-->
                                            </td>
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

<?php include 'foot.php'; ?>