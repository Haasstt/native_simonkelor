<?php
include 'config/conn.php';
?>
<div class="header">
    <a>Forum</a>
</div>
<div class="box-forum">
    <div class="header-forum">

        <div class="search-forum">
            <form class="form-search" method="POST" enctype="multipart/form-data">
                <input class="input-search" name="cari" placeholder="Search..." autofocus required />
                <button class="submit-search" type="submit" name="simpan"><i class='bx bx-search'></i></button>
            </form>
        </div>

        <?php
        if (isset($_POST['simpan'])) {
            $cari = $_POST['cari'];
        }
        ?>
        <a href="index.php?p=forum_add" class="button-add">Tambah Forum</a>
    </div>

    <div class="content-forum">
        <?php
        if (isset($_POST['simpan'])) {
            $cari = $_POST['cari'];
            $query = mysqli_query($koneksi, "SELECT * FROM forums 
                    WHERE 
                    nama_user like '%" . $cari . "%' OR judul_forum like '%" . $cari . "%' OR pesan like '%" . $cari . "%'");
        } else {
            $query = mysqli_query($koneksi, "SELECT * FROM forums ORDER BY DATE(updated_at) DESC");
        }
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <div class="box-pesan">
                <div class="sampul-pesan">
                    <img src="assets/img/<?php echo $row['gambar']; ?>" alt="">
                </div>
                <script>
                    function toggleMenuList(button) {
                        var parentDiv = button.closest('.box-pesan');
                        var menuList = parentDiv.querySelector('.menu-list');
                        menuList.classList.toggle('show');
                    }
                </script>

                <div class="description">
                    <div class="box-info-upload">
                        <div class="info-upload">
                            <p class="name-upload">Upload by <span><?php echo $row['nama_user']; ?></span></p>
                            <p class="date-upload">Created <span><?php echo $row['updated_at']; ?></span></p>
                        </div>
                        
                        <div class="overlay">
                            <button class="menu-button" title="Action" onclick="toggleMenuList(this)"><i class='bx bx-dots-vertical-rounded'></i></button>

                                <ul id="menu-list" class="menu-list">
                                    <li><a href="#"> <span><i class='bx bx-trash'></i></span> Delete</a></li>
                                    <li><a href="#"> <span><i class='bx bx-edit-alt' ></i></span> Ubah Data</a></li>
                                </ul>
                        </div>
                    </div>
                    <h3 class="title-forum"><?php echo $row['judul_forum']; ?></h3>
                    <p class="message-forum"><?php echo $row['pesan']; ?></p>
                </div>
                <a href="index.php?p=forum_komentar" class="button-komentar">Komentar <span>(12)</span> </a>
            </div>
        <?php
        }
        ?>

    </div>

</div>