<?php

include 'head.php';
include 'koneksi.php';

$nis = $_GET['nis'];
$r = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis = '$nis' "));

$bln = array(
    "", "Januari", "Februari", "Maret", "April", "Mei",
    "Juni", "Juli", "Agustus", "September", "Oktober",
    "November", "Desember"
);

$st = explode("-", $r['stts']);

$tgl = $r['tanggal'] == '' ? '00-00-0000' : $r['tanggal'];
$tglB = $r['tanggal_a'] == '' ? '00-00-0000' : $r['tanggal_a'];
$tglI = $r['tanggal_i'] == '' ? '00-00-0000' : $r['tanggal_i'];
$tglW = $r['tanggal_w'] == '' ? '00-00-0000' : $r['tanggal_w'];

$split = explode('-', $tgl);
$tgl_a = $split[0];
$bln_a =  $split[1];
$thn_a = $split[2];

$split1 = explode('-', $tglB);
$tgl_b = $split1[0];
$bln_b =  $split1[1];
$thn_b = $split1[2];

$spliti = explode('-', $tglI);
$tgl_i = $spliti[0];
$bln_i = $spliti[1];
$thn_i = $spliti[2];

$splitw = explode('-', $tglW);
$tgl_w = $splitw[0];
$bln_w = $splitw[1];
$thn_w = $splitw[2];
?>
<div class="content-body">

    <div class="container-fluid">
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Data Pribadi -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Pribadi</h4>
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>NIS *</label>
                                                <input type="text" name="nis" class="form-control" placeholder="Email" readonly value="<?= $nis; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>NISN</label>
                                                <input type="text" name="nisn" class="form-control" placeholder="Password" value="<?= $r['nisn']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>NIK *</label>
                                                <input type="text" name="nik" class="form-control" placeholder="NIK berdasarkan KK" required value="<?= $r['nik']; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>No. KK *</label>
                                                <input type="text" name="no_kk" class="form-control" placeholder="Nomor KK" required value="<?= $r['no_kk']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="" value="<?= $r['email']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Lengkap *</label>
                                            <input type="text" name="nama" class="form-control" placeholder="" required value="<?= $r['nama']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir *</label>
                                            <input type="text" name="tempat" class="form-control" placeholder="" required value="<?= $r['tempat']; ?>">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Tanggal Lahir *</label>
                                                <select name="tgl" id="" class="form-control" required>
                                                    <option value=""> -Tanggal- </option>
                                                    <?php
                                                    for ($tanggal = 1; $tanggal <= 31; $tanggal++) {
                                                        $i = $tanggal;
                                                        if ($tgl_a == $i) {
                                                            echo "<option value=$i selected>$i</option>";
                                                        } else {
                                                            echo "<option value=$i>$i</option>";
                                                        }
                                                        echo "<option value=$i>$i</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Bulan Lahir</label>
                                                <select name="bulan" id="" class="form-control" required>
                                                    <option value=""> -Bulan- </option>
                                                    <?php
                                                    for ($bulan = 1; $bulan <= 12; $bulan++) {
                                                        if ($bln_a == $bulan) {
                                                            echo "<option value=$bulan selected>$bln[$bulan]</option>";
                                                        } else {
                                                            echo "<option value=$bulan>$bln[$bulan]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Tahun Lahir</label>
                                                <select name="tahun" id="" class="form-control" required>
                                                    <option value=""> -Tahun- </option>
                                                    <?php
                                                    $now = date("Y");
                                                    for ($tahun = 1945; $tahun <= $now; $tahun++) {
                                                        if ($thn_a == $tahun) {
                                                            echo "<option value=$tahun selected>$tahun</option>";
                                                        } else {
                                                            echo "<option value=$tahun>$tahun</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin *</label><br>
                                            <label class="radio-inline mr-3">
                                                <input type="radio" name="jkl" value="Laki-laki" <?= $r['jkl'] == 'Laki-laki' ? 'checked' : ''; ?> required> Laki-laki</label>
                                            <label class="radio-inline mr-3">
                                                <input type="radio" name="jkl" value="Perempuan" <?= $r['jkl'] == 'Perempuan' ? 'checked' : ''; ?> required> Perempuan</label>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Anak ke *</label>
                                                <input type="number" name="anak_ke" class="form-control" placeholder="" required value="<?= $r['anak_ke']; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Jumlah Saudara *</label>
                                                <input type="number" name="jml_sdr" class="form-control" placeholder="" required value="<?= $r['jml_sdr']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Jln/Dusun *</label>
                                            <textarea name="jln" rows="3" class="form-control h-150px" required><?= $r['jln']; ?></textarea>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>RT *</label>
                                                <input type="text" name="rt" class="form-control" placeholder="RT" value="<?= $r['rt']; ?>" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>RW *</label>
                                                <input type="text" name="rw" class="form-control" placeholder="RW" value="<?= $r['rw']; ?>" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Kode Pos</label>
                                                <input type="text" name="kd_pos" class="form-control" placeholder="Kode Pos" value="<?= $r['kd_pos']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Provinsi *<b><i>(<?= $r['prov']; ?>)</i></b></label>
                                                <select name="prop" id="provinsi" class="form-control ">
                                                    <option value="">Pilih Provinsi</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Kabupaten/Kota *<b><i>(<?= $r['kab']; ?>)</i></b></label>
                                                <select name="kota" id="kabupaten" class="form-control ">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Kecamatan *<b><i>(<?= $r['kec']; ?>)</i></b></label>
                                                <select name="kec" id="kecamatan" class="form-control ">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Desa/Kelurahan *<b><i>(<?= $r['desa']; ?>)</i></b></label>
                                                <select name="kel" id="kelurahan" class="form-control ">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label>Formal *</label>
                                                <select name="t_formal" id="t_formal" class="form-control" required>
                                                    <option value="">Pilih Lembaga</option>
                                                    <?php
                                                    $sq = mysqli_query($conn, "SELECT * FROM lembaga ");
                                                    while ($kl = mysqli_fetch_assoc($sq)) {
                                                    ?>
                                                        <option <?= $r['t_formal'] == $kl['nama'] ? 'selected' : ''; ?> value="<?= $kl['nama'] ?>"><?= $kl['nama'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Kelas *</label>
                                                <select name="k_formal" id="" class="form-control" required>
                                                    <option value="">Pilih Kelas</option>
                                                    <?php
                                                    $sq = mysqli_query($conn, "SELECT * FROM kelas ");
                                                    while ($kl = mysqli_fetch_assoc($sq)) {
                                                    ?>
                                                        <option <?= $r['k_formal'] == $kl['nama'] ? 'selected' : ''; ?> value="<?= $kl['nama'] ?>"><?= $kl['nama'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Rombel *</label>
                                                <select name="r_formal" id="" class="form-control" required>
                                                    <option value="">-pilih-</option>
                                                    <?php
                                                    $sq = mysqli_query($conn, "SELECT * FROM rombel ");
                                                    while ($kl = mysqli_fetch_assoc($sq)) {
                                                    ?>
                                                        <option <?= $r['r_formal'] == $kl['nama'] ? 'selected' : ''; ?> value="<?= $kl['nama'] ?>"><?= $kl['nama'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Jurusan *</label>
                                                <select name="jurusan" id="jurusan" class="form-control" required>
                                                    <option value="">Pilih </option>
                                                    <?php
                                                    $sq = mysqli_query($conn, "SELECT * FROM jurusan");
                                                    while ($kl = mysqli_fetch_assoc($sq)) {
                                                    ?>
                                                        <option <?= $r['jurusan'] == $kl['nama'] ? 'selected' : ''; ?> value="<?= $kl['nama'] ?>"><?= $kl['nama'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Kelas Madin *</label>
                                                <select name="k_madin" id="provinsi" class="form-control" required>
                                                    <option value="">Pilih kelas</option>
                                                    <?php
                                                    $sq = mysqli_query($conn, "SELECT * FROM madin");
                                                    while ($kl = mysqli_fetch_assoc($sq)) {
                                                    ?>
                                                        <option <?= $r['k_madin'] == $kl['nama'] ? 'selected' : ''; ?> value="<?= $kl['nama'] ?>"><?= $kl['nama'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Rombel *</label>
                                                <select name="r_madin" id="kabupaten" class="form-control" required>
                                                    <option value="">Pilih rombel</option>
                                                    <?php
                                                    $sq = mysqli_query($conn, "SELECT * FROM rombel");
                                                    while ($kl = mysqli_fetch_assoc($sq)) {
                                                    ?>
                                                        <option <?= $r['r_madin'] == $kl['nama'] ? 'selected' : ''; ?> value="<?= $kl['nama'] ?>"><?= $kl['nama'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Komplek *</label>
                                                <select name="komplek" id="komplek" class="form-control" required>
                                                    <option value="">Pilih komplek</option>
                                                    <?php
                                                    $jk = $r['jkl'];
                                                    $sq = mysqli_query($conn, "SELECT komplek FROM kamar WHERE jkl = '$jk' GROUP BY komplek");
                                                    while ($kl = mysqli_fetch_assoc($sq)) {
                                                    ?>
                                                        <option <?= $r['komplek'] != '' ? 'selected' : ''; ?> value="<?= $kl['komplek'] ?>"><?= $kl['komplek'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Kamar *</label>
                                                <select name="kamar" id="komplek" class="form-control" required>
                                                    <option value="">Pilih Kamar</option>
                                                    <?php
                                                    $jk = $r['jkl'];
                                                    $sq = mysqli_query($conn, "SELECT * FROM kamar WHERE jkl = '$jk'");
                                                    while ($kl = mysqli_fetch_assoc($sq)) {
                                                    ?>
                                                        <option <?= $r['nama'] != '' ? 'selected' : ''; ?> value="<?= $kl['nama'] ?>"><?= $kl['nama'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Bapak -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Bapak</h4>
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" name="nik_a" class="form-control" placeholder="" value="<?= $r['nik_a']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Lengkap *</label>
                                            <input type="text" name="bapak" class="form-control" placeholder="" required value="<?= $r['bapak']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Pendidikan</label>
                                            <select name="pend_a" id="" class="form-control">
                                                <option value="">Pilih Pendidikan</option>
                                                <?php
                                                $sq = mysqli_query($conn, "SELECT * FROM pdd");
                                                while ($kl = mysqli_fetch_assoc($sq)) {
                                                ?>
                                                    <option <?= $r['pend_a'] == $kl['nama_pdd'] ? 'selected' : ''; ?> value="<?= $kl['nama_pdd'] ?>"><?= $kl['nama_pdd'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Foto Bapak</label><br>
                                            <img src="images/wali/<?= $r['foto_a']; ?>" height="100">
                                            <input type="file" name="foto_a" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tempat_a" class="form-control" placeholder="" value="<?= $r['tempat_a']; ?>">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Tanggal Lahir</label>
                                                <select name="tgl_a" id="" class="form-control">
                                                    <option value=""> -Tanggal- </option>
                                                    <?php
                                                    for ($tanggal = 1; $tanggal <= 31; $tanggal++) {
                                                        $i = $tanggal;
                                                        if ($tgl_b == $i) {
                                                            echo "<option value=$i selected>$i</option>";
                                                        } else {
                                                            echo "<option value=$i>$i</option>";
                                                        }
                                                        echo "<option value=$i>$i</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Bulan Lahir</label>
                                                <select name="bulan_a" id="" class="form-control">
                                                    <option value=""> -Bulan- </option>
                                                    <?php
                                                    for ($bulan = 1; $bulan <= 12; $bulan++) {
                                                        if ($bln_b == $bulan) {
                                                            echo "<option value=$bulan selected>$bln[$bulan]</option>";
                                                        } else {
                                                            echo "<option value=$bulan>$bln[$bulan]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Tahun Lahir</label>
                                                <select name="tahun_a" id="" class="form-control">
                                                    <option value=""> -Tahun- </option>
                                                    <?php
                                                    $now = date("Y");
                                                    for ($tahun = 1945; $tahun <= $now; $tahun++) {
                                                        if ($thn_b == $tahun) {
                                                            echo "<option value=$tahun selected>$tahun</option>";
                                                        } else {
                                                            echo "<option value=$tahun>$tahun</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Pekerjaan</label>
                                            <select name="pkj_a" id="" class="form-control">
                                                <option value="">Pilih Pekerjaan</option>
                                                <?php
                                                $sq = mysqli_query($conn, "SELECT * FROM pkj");
                                                while ($kl = mysqli_fetch_assoc($sq)) {
                                                ?>
                                                    <option <?= $r['pkj_a'] == $kl['nama'] ? 'selected' : ''; ?> value="<?= $kl['nama'] ?>"><?= $kl['nama'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Bapak</label><br>
                                            <label class="radio-inline mr-3">
                                                <input type="radio" name="status_a" value="hidup" <?= $r['status_a'] == 'hidup' ? 'checked' : ''; ?>> Masih Hidup
                                            </label>
                                            <label class="radio-inline mr-3">
                                                <input type="radio" name="status_a" value="meninggal" <?= $r['status_a'] == 'meninggal' ? 'checked' : ''; ?>> Masih Meninggal
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Ibu -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Ibu</h4>
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" name="nik_i" class="form-control" placeholder="" value="<?= $r['nik_i']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Lengkap *</label>
                                            <input type="text" name="ibu" class="form-control" placeholder="" required value="<?= $r['ibu']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Pendidikan</label>
                                            <select name="pend_i" id="" class="form-control">
                                                <option value="">Pilih Pendidikan</option>
                                                <?php
                                                $sq = mysqli_query($conn, "SELECT * FROM pdd");
                                                while ($kl = mysqli_fetch_assoc($sq)) {
                                                ?>
                                                    <option <?= $r['pend_i'] == $kl['nama_pdd'] ? 'selected' : ''; ?> value="<?= $kl['nama_pdd'] ?>"><?= $kl['nama_pdd'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Foto</label><br>
                                            <img src="images/wali/<?= $r['foto_i']; ?>" height="100">
                                            <input type="file" name="foto_i" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tempat_i" class="form-control" placeholder="" value="<?= $r['tempat_i']; ?>">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Tanggal Lahir</label>
                                                <select name="tgl_i" id="" class="form-control">
                                                    <option value=""> -Tanggal- </option>
                                                    <?php
                                                    for ($tanggal = 1; $tanggal <= 31; $tanggal++) {
                                                        $i = $tanggal;
                                                        if ($tgl_i == $i) {
                                                            echo "<option value=$i selected>$i</option>";
                                                        } else {
                                                            echo "<option value=$i>$i</option>";
                                                        }
                                                        echo "<option value=$i>$i</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Bulan Lahir</label>
                                                <select name="bulan_i" id="" class="form-control">
                                                    <option value=""> -Bulan- </option>
                                                    <?php
                                                    for ($bulan = 1; $bulan <= 12; $bulan++) {
                                                        if ($bln_i == $bulan) {
                                                            echo "<option value=$bulan selected>$bln[$bulan]</option>";
                                                        } else {
                                                            echo "<option value=$bulan>$bln[$bulan]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Tahun Lahir</label>
                                                <select name="tahun_i" id="" class="form-control">
                                                    <option value=""> -Tahun- </option>
                                                    <?php
                                                    $now = date("Y");
                                                    for ($tahun = 1945; $tahun <= $now; $tahun++) {
                                                        if ($thn_b == $tahun) {
                                                            echo "<option value=$tahun selected>$tahun</option>";
                                                        } else {
                                                            echo "<option value=$tahun>$tahun</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Pekerjaan</label>
                                            <select name="pkj_i" id="" class="form-control">
                                                <option value="">Pilih Pekerjaan</option>
                                                <?php
                                                $sq = mysqli_query($conn, "SELECT * FROM pkj");
                                                while ($kl = mysqli_fetch_assoc($sq)) {
                                                ?>
                                                    <option <?= $r['pkj_i'] == $kl['nama'] ? 'selected' : ''; ?> value="<?= $kl['nama'] ?>"><?= $kl['nama'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Ibu</label><br>
                                            <label class="radio-inline mr-3">
                                                <input type="radio" name="status_i" value="hidup" <?= $r['status_i'] == 'hidup' ? 'checked' : ''; ?>> Masih Hidup</label>
                                            <label class="radio-inline mr-3">
                                                <input type="radio" name="status_i" value="meninggal" <?= $r['status_i'] == 'meninggal' ? 'checked' : ''; ?>> Meninggal</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Wali -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Wali</h4>
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" name="nik_w" class="form-control" placeholder="" value="<?= $r['nik_w']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="wali" class="form-control" placeholder="" value="<?= $r['wali']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Pendidikan</label>
                                            <select name="pend_w" id="" class="form-control">
                                                <option value="">Pilih Pendidikan</option>
                                                <?php
                                                $sq = mysqli_query($conn, "SELECT * FROM pdd");
                                                while ($kl = mysqli_fetch_assoc($sq)) {
                                                ?>
                                                    <option <?= $r['pend_w'] == $kl['nama_pdd'] ? 'selected' : ''; ?> value="<?= $kl['nama_pdd'] ?>"><?= $kl['nama_pdd'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tempat_w" class="form-control" placeholder="" value="<?= $r['tempat_w']; ?>">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Tanggal Lahir</label>
                                                <select name="tgl_w" id="" class="form-control">
                                                    <option value=""> -Tanggal- </option>
                                                    <?php
                                                    for ($tanggal = 1; $tanggal <= 31; $tanggal++) {
                                                        $i = $tanggal;
                                                        if ($tgl_w == $i) {
                                                            echo "<option value=$i selected>$i</option>";
                                                        } else {
                                                            echo "<option value=$i>$i</option>";
                                                        }
                                                        echo "<option value=$i>$i</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Bulan Lahir</label>
                                                <select name="bulan_w" id="" class="form-control">
                                                    <option value=""> -Bulan- </option>
                                                    <?php
                                                    for ($bulan = 1; $bulan <= 12; $bulan++) {
                                                        if ($bln_w == $bulan) {
                                                            echo "<option value=$bulan selected>$bln[$bulan]</option>";
                                                        } else {
                                                            echo "<option value=$bulan>$bln[$bulan]</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Tahun Lahir</label>
                                                <select name="tahun_w" id="" class="form-control">
                                                    <option value=""> -Tahun- </option>
                                                    <?php
                                                    $now = date("Y");
                                                    for ($tahun = 1945; $tahun <= $now; $tahun++) {
                                                        if ($thn_b == $tahun) {
                                                            echo "<option value=$tahun selected>$tahun</option>";
                                                        } else {
                                                            echo "<option value=$tahun>$tahun</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Pekerjaan</label>
                                            <select name="pkj_w" id="" class="form-control">
                                                <option value="">Pilih Pekerjaan</option>
                                                <?php
                                                $sq = mysqli_query($conn, "SELECT * FROM pkj");
                                                while ($kl = mysqli_fetch_assoc($sq)) {
                                                ?>
                                                    <option <?= $r['pkj_w'] == $kl['nama'] ? 'selected' : ''; ?> value="<?= $kl['nama'] ?>"><?= $kl['nama'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Lainnya -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Lainnya</h4>
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>No. HP *</label>
                                            <input type="text" name="hp" class="form-control" placeholder="" required value="<?= $r['hp']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" name="pass" class="form-control" placeholder="" value="<?= $r['wali']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Foto</label><br>
                                            <img src="images/santri/<?= $r['foto']; ?>" height="100">
                                            <input type="file" name="foto" class="form-control" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Kos</label>
                                            <select name="t_kos" id="" class="form-control" required>
                                                <?php
                                                $ts = $r['t_kos'];
                                                $tks = ["-", "Ny. Jamilah", "Gus Zaini", "Ny. Farihah", "Ny. Zahro", "Ny. Sa'adah", "Ny. Mamjudah", "Ny. Nely", "Ny. Lathifah"];
                                                ?>
                                                <option value="<?= $ts; ?>"><?= $tks[$ts]; ?></option>
                                                <option value="">---------------</option>
                                                <option value="1"> Kantin </option>
                                                <option value="2"> Gus Zaini </option>
                                                <option value="3"> Ny. Farihah </option>
                                                <option value="4"> Ny. Zahro </option>
                                                <option value="5"> Ny. Sa'adah </option>
                                                <option value="6"> Ny. Mamjudah</option>
                                                <option value="7"> Ny. Nely</option>
                                                <option value="8"> Ny. Lathifa</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status *</label><br>
                                            <?php
                                            $qr = mysqli_query($conn, "SELECT * FROM status WHERE tahun = '2022/2023'  GROUP BY stts");
                                            foreach ($qr as $rs) : ?>
                                                <input type="radio" name="stts" id="" value="<?= $rs["stts"]; ?>" required <?php if ($rs["stts"] == $r["stts"]) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                                <?php
                                                $st = $rs["stts"];
                                                $ps = explode("-", $st);
                                                if ($ps[0] == 1) {
                                                    echo "<span class='badge bg-dark text-light'>Ust/Usdz</span>";
                                                    echo " ";
                                                }
                                                if ($ps[1] == 2) {
                                                    echo "<span class='badge badge-primary'>Mhs/i</span>";
                                                    echo " ";
                                                }
                                                if ($ps[2] == 3) {
                                                    echo "<span class='badge badge-success'>Sdr/i</span>";
                                                    echo " ";
                                                }
                                                if ($ps[3] == 4) {
                                                    echo "<span class='badge badge-info'>Kls 6</span>";
                                                    echo " ";
                                                }
                                                if ($ps[4] == 5) {
                                                    echo "<span class='badge badge-warning'>Baru</span>";
                                                    echo " ";
                                                }
                                                if ($ps[5] == 6) {
                                                    echo "<span class='badge badge-danger'>Lama</span>";
                                                    echo " ";
                                                }
                                                if ($ps[6] == 7) {
                                                    echo "<span class='badge badge-primary'>P. Wil</span>";
                                                    echo " ";
                                                }
                                                if ($ps[7] == 8) {
                                                    echo "<span class='badge badge-dark'>Putra</span>";
                                                    echo " ";
                                                }
                                                if ($ps[8] == 9) {
                                                    echo "<span class='badge badge-info'>Putri</span>";
                                                }
                                                ?>
                                                <!-- <?= $rs["stts"]; ?> -->
                                                <br>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan *</label>
                                            <select name="ket" id="" class="form-control" required>
                                                <?php
                                                $k = $r['ket'];
                                                $kt = ["-", "Ust/Usdtz", "Khaddam", "Gratis", "Berhenti"];
                                                ?>
                                                <option value="<?= $k; ?>"><?= $kt[$k]; ?></option>
                                                <option value="0">---------------</option>
                                                <option value="1"> Ust/Usdtz </option>
                                                <option value="2"> Khaddam </option>
                                                <option value="3"> Gratis </option>
                                                <option value="4"> Berhenti </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-success" name="save" type="submit"><i class="fa fa-check"></i> Simpan Perubahan</button>
                                            <button class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include 'foot.php';

if (isset($_POST['save'])) {
    $nis = htmlspecialchars(mysqli_escape_string($conn, $_POST['nis']));
    $nisn = htmlspecialchars(mysqli_escape_string($conn, $_POST['nisn']));
    $nik = htmlspecialchars(mysqli_escape_string($conn, $_POST['nik']));
    $no_kk = htmlspecialchars(mysqli_escape_string($conn, $_POST['no_kk']));
    $email = htmlspecialchars(mysqli_escape_string($conn, $_POST['email']));
    $nama = htmlspecialchars(strtoupper(mysqli_escape_string($conn, $_POST['nama'])));
    $tempat = htmlspecialchars(strtoupper(mysqli_escape_string($conn, $_POST['tempat'])));
    $tanggal = $_POST['tgl'] . '-' . $_POST['bulan'] . '-' . $_POST['tahun'];
    $jkl = $_POST['jkl'];
    $anak_ke = htmlspecialchars(mysqli_escape_string($conn, $_POST['anak_ke']));
    $jml_sdr = htmlspecialchars(mysqli_escape_string($conn, $_POST['jml_sdr']));
    $jln = htmlspecialchars(mysqli_escape_string($conn, $_POST['jln']));
    $rt = htmlspecialchars(mysqli_escape_string($conn, $_POST['rt']));
    $rw = htmlspecialchars(mysqli_escape_string($conn, $_POST['rw']));
    $kd_pos = htmlspecialchars(mysqli_escape_string($conn, $_POST['kd_pos']));

    $id_prov = $_POST['prop'];
    $id_kab = $_POST['kota'];
    $id_kec = $_POST['kec'];
    $id_kel = $_POST['kel'];
    $prv = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama FROM provinsi WHERE id_prov = '$id_prov' "));
    $kb = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama FROM kabupaten WHERE id_kab = '$id_kab' "));
    $kc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama FROM kecamatan WHERE id_kec = '$id_kec' "));
    $kl = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama FROM kelurahan WHERE id_kel = '$id_kel' "));
    $prop =  mysqli_escape_string($conn, $prv['nama']);
    $kab =  mysqli_escape_string($conn, $kb['nama']);
    $kec = mysqli_escape_string($conn, $kc['nama']);
    $kel = mysqli_escape_string($conn, $kl['nama']);

    $k_formal = mysqli_escape_string($conn, $_POST['k_formal']);
    $t_formal = mysqli_escape_string($conn, $_POST['t_formal']);
    $r_formal = mysqli_escape_string($conn, $_POST['r_formal']);
    $jurusan = mysqli_escape_string($conn, $_POST['jurusan']);
    $k_madin = mysqli_escape_string($conn, $_POST['k_madin']);
    $r_madin = mysqli_escape_string($conn, $_POST['r_madin']);
    $komplek = mysqli_escape_string($conn, $_POST['komplek']);
    $kamar = mysqli_escape_string($conn, $_POST['kamar']);

    $nik_a = htmlspecialchars(mysqli_escape_string($conn, $_POST['nik_a']));
    $bapak = htmlspecialchars(strtoupper(mysqli_escape_string($conn, $_POST['bapak'])));
    $tempat_a = htmlspecialchars(strtoupper(mysqli_escape_string($conn, $_POST['tempat_a'])));
    $tanggal_a = $_POST['tgl_a'] . '-' . $_POST['bulan_a'] . '-' . $_POST['tahun_a'];
    $pkj_a = htmlspecialchars(mysqli_escape_string($conn, $_POST['pkj_a']));
    $pend_a = htmlspecialchars(mysqli_escape_string($conn, $_POST['pend_a']));
    $status_a = htmlspecialchars(mysqli_escape_string($conn, $_POST['status_a']));
    $foto_a = $_FILES['foto_a']['name'];
    if (empty($foto_a)) {
        $nm_foto_a = $r['foto_a'];
    } else {
        $tmp_a = $_FILES['foto_a']['tmp_name'];
        $ext_a = explode('.', $foto_a);
        $nm_foto_a = rand() . '.' . end($ext_a);
        move_uploaded_file($tmp_a, 'images/wali/' . $nm_foto_a);
    }

    $nik_i = htmlspecialchars(mysqli_escape_string($conn, $_POST['nik_i']));
    $ibu = htmlspecialchars(strtoupper(mysqli_escape_string($conn, $_POST['ibu'])));
    $tempat_i = htmlspecialchars(strtoupper(mysqli_escape_string($conn, $_POST['tempat_i'])));
    $tanggal_i = $_POST['tgl_i'] . '-' . $_POST['bulan_i'] . '-' . $_POST['tahun_i'];
    $pkj_i = htmlspecialchars(mysqli_escape_string($conn, $_POST['pkj_i']));
    $pend_i = htmlspecialchars(mysqli_escape_string($conn, $_POST['pend_i']));
    $status_i = htmlspecialchars(mysqli_escape_string($conn, $_POST['status_i']));
    $foto_i = $_FILES['foto_i']['name'];
    if (empty($foto_i)) {
        $nm_foto_i = $r['foto_i'];
    } else {
        $tmp_i = $_FILES['foto_i']['tmp_name'];
        $ext_i = explode('.', $foto_i);
        $nm_foto_i = rand() . '.' . end($ext_i);
        move_uploaded_file($tmp_i, 'images/wali/' . $nm_foto_i);
    }

    $nik_w = htmlspecialchars(mysqli_escape_string($conn, $_POST['nik_w']));
    $wali = htmlspecialchars(strtoupper(mysqli_escape_string($conn, $_POST['wali'])));
    $tempat_w = htmlspecialchars(strtoupper(mysqli_escape_string($conn, $_POST['tempat_w'])));
    $tanggal_w = $_POST['tgl_w'] . '-' . $_POST['bulan_w'] . '-' . $_POST['tahun_w'];
    $pkj_w = htmlspecialchars(mysqli_escape_string($conn, $_POST['pkj_w']));
    $pend_w = htmlspecialchars(mysqli_escape_string($conn, $_POST['pend_w']));

    $hp = mysqli_escape_string($conn, $_POST['hp']);
    $pass = mysqli_escape_string($conn, $_POST['pass']);
    $t_kos = mysqli_escape_string($conn, $_POST['t_kos']);
    $ket = mysqli_escape_string($conn, $_POST['ket']);
    $stts = mysqli_escape_string($conn, $_POST['stts']);
    $foto = $_FILES['foto']['name'];

    if (empty($foto)) {
        $nm_foto = $r['foto'];
    } else {
        $tmp = $_FILES['foto']['tmp_name'];
        $ext = explode('.', $foto);
        $nm_foto = rand() . '.' . end($ext);
        move_uploaded_file($tmp, 'images/santri/' . $nm_foto);
    }

    if ($id_prov == '' && $id_kab == '' && $id_kec == '' && $id_kel == '') {
        $sql = mysqli_query($conn, "UPDATE tb_santri SET nisn = '$nisn', nik = '$nik', no_kk = '$no_kk', email = '$email', nama = '$nama', tempat = '$tempat', tanggal = '$tanggal', jkl = '$jkl', jln = '$jln', rt = '$rt', rw = '$rw', kd_pos = '$kd_pos', k_formal = '$k_formal', t_formal = '$t_formal', r_formal = '$r_formal', jurusan = '$jurusan', k_madin = '$k_madin', r_madin = '$r_madin', komplek = '$komplek', kamar = '$kamar', anak_ke = '$anak_ke', jml_sdr = '$jml_sdr', bapak = '$bapak', nik_a = '$nik_a', tempat_a = '$tempat_a', tanggal_a = '$tanggal_a', pend_a = '$pend_a', pkj_a = '$pkj_a', status_a = '$status_a', foto_a = '$nm_foto_a', ibu = '$ibu', nik_i = '$nik_i', tempat_i = '$tempat_i', tanggal_i = '$tanggal_i', pend_i = '$pend_i', pkj_i = '$pkj_i', status_i = '$status_i', foto_i = '$nm_foto_i', wali = '$wali', nik_w = '$nik_w', tempat_w = '$tempat_w', tanggal_w = '$tanggal_w', pend_w = '$pend_w', pkj_w = '$pkj_w',  hp = '$hp', foto = '$nm_foto', t_kos = '$t_kos',  ket = '$ket', stts = '$stts' WHERE nis = '$nis' ");
    } else {
        $sql = mysqli_query($conn, "UPDATE tb_santri SET nisn = '$nisn', nik = '$nik', no_kk = '$no_kk', email = '$email', nama = '$nama', tempat = '$tempat', tanggal = '$tanggal', jkl = '$jkl', jln = '$jln', rt = '$rt', rw = '$rw', kd_pos = '$kd_pos', prov = '$prop', kab = '$kab', kec = '$kec', desa = '$kel', k_formal = '$k_formal', t_formal = '$t_formal', r_formal = '$r_formal', jurusan = '$jurusan', k_madin = '$k_madin', r_madin = '$r_madin', komplek = '$komplek', kamar = '$kamar', anak_ke = '$anak_ke', jml_sdr = '$jml_sdr', bapak = '$bapak', nik_a = '$nik_a', tempat_a = '$tempat_a', tanggal_a = '$tanggal_a', pend_a = '$pend_a', pkj_a = '$pkj_a', status_a = '$status_a', foto_a = '$nm_foto_a', ibu = '$ibu', nik_i = '$nik_i', tempat_i = '$tempat_i', tanggal_i = '$tanggal_i', pend_i = '$pend_i', pkj_i = '$pkj_i', status_i = '$status_i', foto_i = '$nm_foto_i', wali = '$wali', nik_w = '$nik_w', tempat_w = '$tempat_w', tanggal_w = '$tanggal_w', pend_w = '$pend_w', pkj_w = '$pkj_w',  hp = '$hp', foto = '$nm_foto', t_kos = '$t_kos',  ket = '$ket', stts = '$stts' WHERE nis = '$nis' ");
    }
    if ($sql) {
?>
        <script>
            alert('Data Berhasil Disimpan');
            window.location.href = 'santri.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Data Gagal');
            window.location.href = 'santri.php';
        </script>
<?php
    }
}



?>