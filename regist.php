<?php session_start(); ?>
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>D'Potren v.2 - PPDWK</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html">
                                    <h4>Input informasi akun anda</h4>
                                </a>

                                <form class="mt-5 mb-5 login-input" method="post" action="">
                                    <div class="form-group">
                                        <input type="text" name="nama" required class="form-control" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="user" required class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="pass" required class="form-control" placeholder="Password">
                                    </div>
                                    <button type="submit" name="daftar" class="btn login-form__btn submit w-100">Daftar sekarang</button><br>
                                </form>
                                <!-- <p class="mt-5 login-form__footer">Dont have account? <a href="page-register.html" class="text-primary">Sign Up</a> now</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>

</html>

<?php

include 'koneksi.php';

if (isset($_POST['daftar'])) {

    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $passOk = password_hash($pass, PASSWORD_DEFAULT);

    $sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user' ");

    if (mysqli_num_rows($sql) > 0) {
        echo "
            <script>
            alert('Username sudah terpakai');
            window.location = 'regist.php';
            </script>
            ";
    } else {
        $ss = mysqli_query($conn, "INSERT INTO user VALUES ('', '$nama', '$user', '$passOk', 'T') ");
        if ($ss) {
            echo "
            <script>
            alert('Akun sudah masuk. Untuk aktifasi silahkan menghubungi admin');
            window.location = 'login.php';
            </script>
            ";
        }
    }
}

?>