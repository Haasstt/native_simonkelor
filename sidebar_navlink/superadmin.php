
<ul class="nav-links">
      <div class="box-profile">
        <img src="assets/img/1.png" alt="">
        <h3><?php echo $_SESSION['role'] ?></h3>
        <p><?php echo $_SESSION['nama'] ?></p>
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
      <!-- <li>
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
      </li> -->
      <li>
        <a href="index.php?p=data_operasi">
          <i class='bx bx-collection' ></i>
          <span class="link_name">Data Operasi</span>
        </a>
      </li>
      <li>
        <a href="index.php?p=documentation_superadmin">
          <i class='bx bx-collection' ></i>
          <span class="link_name">Documentation</span>
        </a>
      </li>
      <li>
        <a href="index.php?p=forum_superadmin">
          <i class='bx bx-conversation' ></i>
          <span class="link_name">Forum</span>
        </a>
      </li>
      <hr>
      <li>
        <a href="logout.php">
          <i class='bx bx-log-out' ></i>
          <span class="link_name">Logout</span>
        </a>
      </li>
    </ul>