<?php

$conn = mysqli_connect("localhost", "root", "", "db_santri");
$conn_bn = mysqli_connect("localhost", "root", "", "bendahara");
$conn_em = mysqli_connect("localhost", "root", "", "db_eman");

// $conn = mysqli_connect("localhost", "u9048253_dwk", "PesantrenDWKIT2021", "u9048253_santri");
// $conn_bn = mysqli_connect("localhost", "u9048253_dwk", "PesantrenDWKIT2021", "u9048253_bendahara");
// $conn_em = mysqli_connect("localhost", "u9048253_dwk", "PesantrenDWKIT2021", "u9048253_eman");
// $conn_ks = mysqli_connect("localhost", "u9048253_dwk", "PesantrenDWKIT2021", "u9048253_kesehatan");
// $conn_dk = mysqli_connect("localhost", "u9048253_dwk", "PesantrenDWKIT2021", "u9048253_dekos");
// $conn_sn = mysqli_connect("localhost", "u9048253_dwk", "PesantrenDWKIT2021", "u9048253_sentral");

$tj = $_POST['tujuan'];
$data = $_POST['data'];
$tgl = date('d-m-Y H:i');

if ($tj == 'bendahara' && $data == 'santri') {

    $s1 = mysqli_query($conn_bn, "DROP TABLE IF EXISTS tb_santri");
    $s2 = mysqli_query($conn_bn, "CREATE TABLE bendahara.tb_santri SELECT * FROM db_santri.tb_santri");
    $s3 = mysqli_query($conn, "INSERT INTO snkr VALUES('', '$tj', '$data', '$tgl') ");

    if ($s1 && $s2 && $s3) {
        echo "
        <script>
        alert('Sinkronisasi data behasil');
        window.location.href = 'snkr.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Sinkronisasi Gagal');
        window.location.href = 'snkr.php';
        </script>
        ";
    }
} elseif ($tj == 'eman' && $data == 'santri') {
    $s1 = mysqli_query($conn_em, "DROP TABLE IF EXISTS tb_santri");
    $s2 = mysqli_query($conn_em, "CREATE TABLE u9048253_eman.tb_santri SELECT * FROM u9048253_santri.tb_santri");
    $s3 = mysqli_query($conn, "INSERT INTO snkr VALUES('', '$tj', '$data', '$tgl') ");

    if ($s1 && $s2 && $s3) {
        echo "
        <script>
        alert('Sinkronisasi data behasil');
        window.location.href = 'snkr.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Sinkronisasi Gagal');
        window.location.href = 'snkr.php';
        </script>
        ";
    }
} elseif ($tj == 'kesehatan' && $data == 'santri') {
    $s1 = mysqli_query($conn_ks, "DROP TABLE IF EXISTS tb_santri");
    $s2 = mysqli_query($conn_ks, "CREATE TABLE u9048253_kesehatan.tb_santri SELECT * FROM u9048253_santri.tb_santri");
    $s3 = mysqli_query($conn, "INSERT INTO snkr VALUES('', '$tj', '$data', '$tgl') ");

    if ($s1 && $s2 && $s3) {
        echo "
        <script>
        alert('Sinkronisasi data behasil');
        window.location.href = 'snkr.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Sinkronisasi Gagal');
        window.location.href = 'snkr.php';
        </script>
        ";
    }
} elseif ($tj == 'dekos' && $data == 'santri') {
    $s1 = mysqli_query($conn_dk, "DROP TABLE IF EXISTS tb_santri");
    $s2 = mysqli_query($conn_dk, "CREATE TABLE u9048253_dekos.tb_santri SELECT * FROM u9048253_santri.tb_santri");
    $s3 = mysqli_query($conn, "INSERT INTO snkr VALUES('', '$tj', '$data', '$tgl') ");

    if ($s1 && $s2 && $s3) {
        echo "
        <script>
        alert('Sinkronisasi data behasil');
        window.location.href = 'snkr.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Sinkronisasi Gagal');
        window.location.href = 'snkr.php';
        </script>
        ";
    }
} elseif ($tj == 'sentral' && $data == 'santri') {
    $s1 = mysqli_query($conn_sn, "DROP TABLE IF EXISTS tb_santri");
    $s2 = mysqli_query($conn_sn, "CREATE TABLE u9048253_sentral.tb_santri SELECT * FROM u9048253_santri.tb_santri");
    $s3 = mysqli_query($conn, "INSERT INTO snkr VALUES('', '$tj', '$data', '$tgl') ");

    if ($s1 && $s2 && $s3) {
        echo "
        <script>
        alert('Sinkronisasi data behasil');
        window.location.href = 'snkr.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('Sinkronisasi Gagal');
        window.location.href = 'snkr.php';
        </script>
        ";
    }
}
