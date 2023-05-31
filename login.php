<!DOCTYPE html>
<html lang="en">
    
<?php 
    session_start();
    include 'config/conn.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" href="assets/img/logo.png" type="image/png">
    <link rel="stylesheet" href="assets/css/login.css">
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
</head>
<body>

    <div class="main-login">
        <div class="content-login">
        <div class="box-img1">
            <div class="header-login">
                <img src="assets/img/logo.png" alt="">
                <h3>PT PLN UPK TIMOR</h3>
            </div>
            <img src="assets/img/login.svg" alt="">
        </div>
        
        <div class="box-form">
        <div class="header-box-form">
            <b class="welcome">Welcome Back!!</b>
            <b class="desc">Please enter your email and password</b>
        </div>
        <form method="POST" class="form" enctype="multipart/form-data">
            <div class="group-form">
                <label class="label-email-login" for="">Username</label>
                <input class="input-email-login" type="email" name="email" placeholder="Username">
            </div>
            <div class="group-form">
                <label class="label-email-login" for="">Password</label>
                <input class="input-email-login" type="password" name="password" placeholder="************">
            </div>
            <div class="group-form-footer">
            <input class="button-login" type="submit" name="login" value="Sign In">
            <b>Don’t have an account? <span><a class="span" href="registrasi.php">Sign Up</a></span></b>
            </div>
        </form>

<?php
if (isset($_POST["login"])) {

$email = $_POST["email"];
$pass = mysqli_real_escape_string($koneksi,md5($_POST['password']));

$sql = mysqli_query($koneksi,"SELECT * FROM users WHERE email='$email'");
$cek_akun = mysqli_num_rows($sql);
$data_akun = mysqli_fetch_assoc($sql);
$password = $data_akun['password'];

    if ($cek_akun>0) {
        if ($pass == $password) {
            $_SESSION['email']=$email;
            $_SESSION['nama']=$data_akun['nama_user'];
            $_SESSION['role']=$data_akun['role'];
            $_SESSION['user_id']=$data_akun['user_id'];
            
            header('location:index.php');
        }else{
        echo"<script>
                alert('password Anda salah');
            </script>";
        }
    }
    $error= true;
}
?>
        </div>
        </div>
    </div>
    
</body>
</html>