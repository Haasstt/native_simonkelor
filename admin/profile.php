<?php
if (isset($_SESSION['nama'])) {
?>
<div class="box-page-profile">

    <div class="header-box-profile">
        <div class="judul-header">
            <span class="name">My Pofile</span>
        </div>
    </div>

    <div class="content-box-profile">
       
       <div class="content-left-profile">

            <div class="box-foto-profil">
                <div class="underline">
                    <div class="card-profile foto-page-profil">
                        <img src="assets/img/foto_profil/default_profil.png" alt="">
                    </div>
                    <div class="name-page-profil">
                        <span>Nurafiif Almas Azhari</span>
                    </div>
                </div>

            </div>

            <div class="box-info-profil">
                <div class="cover">
                    <ul class="start">
                        <li>
                            <span>NIP</span>
                        </li>
                        <li>
                            <span>Instansi</span>
                        </li>
                        <li>
                            <span>Email</span>
                        </li>
                        <li>
                            <span>Role</span>
                        </li>
                    </ul>
                    <ul class="center">
                        <li>
                            <span>:</span>
                        </li>
                        <li>
                            <span>:</span>
                        </li>
                        <li>
                            <span>:</span>
                        </li>
                        <li>
                            <span>:</span>
                        </li>
                    </ul>
                    <ul class="end">
                        <li>
                            <span>V3921024</span>
                        </li>
                        <li>
                            <span>Universitas Sebelas Maret</span>
                        </li>
                        <li>
                            <span>nurafiifalmasazhari@gmail.com</span>
                        </li>
                        <li>
                            <span>Super Admin</span>
                        </li>
                    </ul>
                </div>
            </div>
       </div>
       
       <div class="content-right-profile">
            <div class="content-right">
                <ul>
                    <li>
                        <a href="">Ubah foto profil</a>
                    </li>
                    <li>
                        <a href="">Ubah data profil</a>
                    </li>
                    <li>
                        <a href="">Ubah password</a>
                    </li>
                </ul>
            </div>
       </div>

    </div>
</div>
<?php
        }else {
            echo '<script>alert("Mohon maaf untuk membuka halaman ini Anda harus login dahulu")</script>';
            echo '<script>window.location.href = "Login.php";</script>';
        }
    ?>
