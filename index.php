<!DOCTYPE html>
<!-- Coding by CodingNepal | www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->

    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar" id="sidebar">
    <ul class="nav-links">
      <div class="box-profile">
        <img src="assets/img/1.png" alt="">
        <h3>Nurafiif Almas</h3>
        <p>Nurafiif Almas</p>
      </div>
      <li>
        <a href="index.php?p=realtime">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Realtime</span>
        </a>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Data User</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a href="index.php?p=user_aktif">User Aktif</a></li>
          <li><a href="index.php?p=user_nonaktif">User Non Aktif</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Data Pengolahan</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a href="index.php?p=data_pembangkit">Pembangkit</a></li>
          <li><a href="index.php?p=data_tegangan">Tegangan</a></li>
          <li><a href="index.php?p=forcasting">Forcasting</a></li>
        </ul>
      </li>
      <li>
        <a href="index.php?p=data_operasi">
          <i class='bx bx-collection' ></i>
          <span class="link_name">Data Operasi</span>
        </a>
      </li>
      <li>
        <a href="index.php?p=documentation">
          <i class='bx bx-collection' ></i>
          <span class="link_name">Documentation</span>
        </a>
      </li>
      <li>
        <a href="index.php?p=forum">
          <i class='bx bx-conversation' ></i>
          <span class="link_name">Forum</span>
        </a>
      </li>
      <hr>
      <br>
      <br>
      <br>
      <li>
        <a href="index.php?p=logout">
          <i class='bx bx-log-out' ></i>
          <span class="link_name">Logout</span>
        </a>
      </li>
    </ul>
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
    include_once 'data_user_aktif.php';
  }elseif(@$_GET['p'] == "user_nonaktif"){
    include_once 'data_user_nonaktif.php';
  }elseif(@$_GET['p'] == "data_pembangkit"){
    include_once 'pembangkit.php';
  }elseif(@$_GET['p'] == "data_tegangan"){
    include_once 'tegangan.php';
  }elseif(@$_GET['p'] == "forcasting"){
    include_once 'forcasting.php';
  }elseif(@$_GET['p'] == "data_operasi"){
    include_once 'data_operasi.php';
  }elseif(@$_GET['p'] == "documentation"){
    include_once 'documentation.php';
  }elseif(@$_GET['p'] == "forum"){
    include_once 'forum.php';
  }
  ?>

  </div>

</body>
</html>

<script src="assets/js/index.js"></script>