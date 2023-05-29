<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Page</title>
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
        <div class="header-box-form-regis">
            <b class="welcome">Sign Up</b>
            <b class="desc">Create your account</b>
        </div>
        <form method="POST" class="form">
            <div class="group-form">
                <label class="label-email-regis" for="">Full Name</label>
                <input class="input-email-regis" type="text" name="nama" placeholder="Full Name">
            </div>
            <div class="group-form">
                <label class="label-email-regis" for="">NIP</label>
                <input class="input-email-regis" type="text" name="nip" placeholder="NIP">
            </div>
            <div class="group-form">
                <label class="label-email-regis" for="">Instansi</label>
                <input class="input-email-regis" type="text" name="instansi" placeholder="Instansi">
            </div>
            <div class="group-form">
                <label class="label-email-regis" for="">Username</label>
                <input class="input-email-regis" type="email" name="email" placeholder="Username">
            </div>
            <div class="group-form">
                <label class="label-email-regis" for="">Password</label>
                <input class="input-email-regis" type="password" name="password" placeholder="************">
            </div>
            <div class="group-form">
                <label class="label-email-regis" for="">Confirmasi Password</label>
                <input class="input-email-regis" type="password" name="password" placeholder="************">
            </div>
            <div class="group-form-footer">
            <input class="button-login" type="submit" value="Sign Up">
            <b>Already have an account? <span><a class="span" href="login.php">Sign In</a></span></b>
            </div>
        </form>
        </div>
        </div>
    </div>
    
</body>
</html>