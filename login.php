<!DOCTYPE html>
<html lang="en">
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
        <form method="POST" class="form">
            <div class="group-form">
                <label class="label-email-login" for="">Username</label>
                <input class="input-email-login" type="email" name="email" placeholder="Username">
            </div>
            <div class="group-form">
                <label class="label-email-login" for="">Password</label>
                <input class="input-email-login" type="password" name="password" placeholder="************">
            </div>
            <div class="group-form-footer">
            <input class="button-login" type="submit" value="Sign In">
            <b>Don’t have an account? <span><a class="span" href="">Sign Up</a></span></b>
            </div>
        </form>
        </div>
        </div>
    </div>
    
</body>
</html>