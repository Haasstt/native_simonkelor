
<ul class="nav-links">
      <a href="index.php?p=profile">
      <div class="box-profile">
        <img src="assets/img/foto_profil/<?php echo $_SESSION['foto_profil'] ?>" alt="">
        <h3><?php echo $_SESSION['role'] ?></h3>
        <p><?php echo $_SESSION['nama'] ?></p>
      </div>
      </a>
      <li>
        <a href="index.php?p=realtime">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Realtime</span>
        </a>
      </li>
      <li>
        <a href="#">
            <i class='bx bxs-notepad'></i>
          <span class="link_name">Forcasting</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-collection' ></i>
          <span class="link_name">Data Tegangan</span>
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
      <li>
        <a href="logout.php">
          <i class='bx bx-log-out' ></i>
          <span class="link_name">Logout</span>
        </a>
      </li>
    </ul>