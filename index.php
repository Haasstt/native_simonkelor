<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php 
    session_start();
?>
  <head>
    <meta charset="UTF-8">
    <title>SIMONKELOR</title>
    <link rel="icon" href="assets/img/logo.png" type="image/png">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/forum.css">
    <link rel="stylesheet" href="assets/css/realtime.css">
    <link rel="stylesheet" href="assets/css/documentation.css">

    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->

    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar" id="sidebar">
    <?php
    if(isset($_SESSION['role'])){
      if($_SESSION['role'] == 'Super Admin'){
        include_once 'sidebar_navlink/superadmin.php';
      }
      elseif ($_SESSION['role'] == 'Admin Dispacher') {
        include_once 'sidebar_navlink/dispacher.php';
      }
      elseif ($_SESSION['role'] == 'Admin Pembangkit') {
        include_once 'sidebar_navlink/pembangkit.php';
      }
      elseif ($_SESSION['role'] == 'Pegawai') {
        include_once 'sidebar_navlink/pegawai.php';
      }
    }else{
      include_once 'sidebar_navlink/guest.php';
    }
    ?>
  </div>
  
  <div class="nav_responsive">
    <a href="javascript:void(0);" class="icon" onclick="sidebar_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
  <div class="main">

  <?php
  if(@$_GET['p'] == ""){
    include_once 'realtime.php';
  }elseif(@$_GET['p'] == "realtime"){
    include_once 'realtime.php';
  }elseif(@$_GET['p'] == "user_aktif"){
    include_once 'admin/super_admin/data_user_aktif.php';
  }elseif(@$_GET['p'] == "user_nonaktif"){
    include_once 'admin/super_admin/data_user_nonaktif.php';
  }elseif(@$_GET['p'] == "data_pembangkit"){
    include_once 'pembangkit.php';
  }elseif(@$_GET['p'] == "data_tegangan"){
    include_once 'tegangan.php';
  }elseif(@$_GET['p'] == "forcasting"){
    include_once 'forcasting.php';
  }elseif(@$_GET['p'] == "data_operasi"){
    include_once 'admin/super_admin/data_operasi.php';
  }elseif(@$_GET['p'] == "documentation_superadmin"){
    include_once 'admin/super_admin/documentation.php';
  }

  // forum
  elseif(@$_GET['p'] == "forum_superadmin"){
    include_once 'admin/super_admin/forum.php';
  }
  elseif(@$_GET['p'] == "forum_add"){
    include_once 'admin/super_admin/form_add_forum.php';
  }


  elseif(@$_GET['p'] == "forum_komentar"){
    include_once 'admin/forum_komentar.php';
  }
  ?>

  </div>

</body>
</html>

<script src="assets/js/index.js"></script>
<!-- <script src="assets/js/langgam_beban.js"></script> -->