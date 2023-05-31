<div class="header">
    <a>Forum</a>
</div>

<div class="box-forum">

    <div class="header-forum-komentar">

        <div class="box-name">
            <div class="img"> 
                <img src="assets/img/default.jpeg" alt="" width="10px">
            </div>
            <div class="judul-diskusi">
                <span class="name">Ruang Diskusi</span>
                <span class="type">(Rapat Bulanan)</span>
            </div>
        </div>

        <div class="search-forum">
            <form class="form-search" method="POST" enctype="multipart/form-data">
                <input class="input-search" name="cari" placeholder="Search..." autofocus required />
                <button class="submit-search" type="submit" name="simpan"><i class='bx bx-search'></i></button>
            </form>
        </div>

    </div>
    
    <div class="content-forum-komentar">
        <?php
        if (isset($_POST['simpan'])) {
            $cari = $_POST['cari'];
            $query = mysqli_query($koneksi, "SELECT komentars.*, nama_user, id_user FROM komentars
            JOIN users ON komentars.id_user = users.user_id
            WHERE 
            users.nama_user like '%" . $cari . "%' OR 
            komentars.komentar like '%" . $cari . "%' AND 
            komentars.id_forum = '".$_GET['id']."'");
        } else {
            $query = mysqli_query($koneksi, "SELECT komentars.*, nama_user, id_user FROM komentars
            JOIN users ON komentars.id_user = users.user_id
            WHERE komentars.id_forum = '".$_GET['id']."'
            ORDER BY komentars.created_at DESC
            ");
        }
        
        $cek_komentar = mysqli_num_rows($query);
        if ($cek_komentar>0) {
        ?>
        <div class="page-message">

            <?php
                while ($data=mysqli_fetch_assoc($query)) {
                    if ($data['nama_user'] == $_SESSION['nama']) {
                        $class_box = "komentar-me";
                    }else {
                        $class_box = "komentar";
                    }
                    ?>
            
            <div class=<?php echo $class_box ?>>
            <?php
            if ($data['nama_user'] == $_SESSION['nama']) {
            ?>
            <div class="box-me">
                <div class="box-delete">
                    <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="index.php?p=delete_komentar_superadmin&id=<?php echo $data['id_komentar'] ?>"><i class='bx bx-trash'></i></a>
                </div>

                <div class="box-massage">
                <div class="content-komentar">
                    <p class="me">
                        <?php echo $data['komentar'] ?>
                    </p>
                </div>
                <div class="footer-komentar-me">
                    <span><?php echo $data['created_at']?></span>
                </div>
                </div>
            </div>

            <?php
            }else {
            ?>
                <div class="header-komentar">
                    <span class="user-name random-color"><?php echo $data['nama_user']?></span>
                    <span class="user-role">Super Admin</span>
                </div>
                <div class="content-komentar">
                    <p>
                        <?php echo $data['komentar'] ?>
                    </p>
                </div>
                <div class="footer-komentar">
                    <span><?php echo $data['created_at']?></span>
                </div>
            <?php
            }
            ?>
            </div>

            <?php
                }
            ?>
        </div> 
        <?php
        }else{
        ?>
        <div class="page-message">   
            <div class="no-komentar">
                <div class="content-komentar">
                    <p>
                        Belum Ada Komentar
                    </p>
                </div>
            </div>
        </div>
        <?php
        }
        ?>

    </div>

</div>

<div class="box-forum">

    <div class="header-forum">
        <h4>Tambah Komentar Anda</h4>
    </div>

    <div class="content-forum-komentar">
        <form action="" class="form">
            <div class="group-form">
                <label for="">Tulis Komentar</label>
                <textarea name="keterangan" cols="30" rows="5"></textarea>
            </div>
            <div class="group-form">
                <label for="">Pilih Dokumen <span class="text-secondary">(opsional)</span></label>
                <p class="keterangan-form">*.doc, .docx, .excel, .pdf, .jpg, .png, .jpeg</p>
                <input type="file">
            </div>
            <input type="submit" value="Tambahkan">
        </form>
    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  var elements = document.getElementsByClassName("random-color");
  for (var i = 0; i < elements.length; i++) {
    var randomColor = getRandomColor();
    elements[i].style.color = randomColor;
  }
});

function getRandomColor() {
  var letters = "0123456789ABCDEF";
  var color = "#";
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}
</script>