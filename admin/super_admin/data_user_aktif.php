<<<<<<< HEAD
=======
<<<<<<< HEAD
<div class="header header-user-page">
    <a>User Account Aktif</a>
</div>

<div class="page-user">
    <div class="header-user">
        <a href="index.php?p=add_user" class="button-add"><i class='bx bx-plus' ></i> Baru</a>
    </div>
    <div class="header-user-title">
        <a>User Account Super Admin</a>
    </div>
    <div class="content-user">
        <table class="table-user">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>NIP</th>
                    <th>Instansi</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Foto Profil</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
				<?php 
				    $no=1;
					$query = mysqli_query($koneksi,"SELECT * FROM users WHERE role LIKE '%Admin%' ORDER BY user_id DESC");
					while ($r=mysqli_fetch_assoc($query)) {
				?>
				<tr>
				    <td><?php echo $no++; ?></td>
					<td><?php echo $r['nama_user']; ?></td>
					<td><?php echo $r['nip']; ?></td>
					<td><?php echo $r['instansi']; ?></td>
					<td><?php echo $r['email']; ?></td>
					<td><?php echo $r['role']; ?></td>
                    <td><img src="assets/img/foto_profil/<?php echo $r['gambar']; ?>" alt="" width="100px"></td>
					<td>
                        <a class="btn-action btn-edit" href="index.php?p=update_user&id=<?php echo $r['user_id']?>"> <span><i class='bx bx-edit-alt' ></i></span> Edit</a>
                        <a class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="index.php?p=delete_user&id=<?php echo $r['user_id']?>"> <span><i class='bx bx-trash'></i></span> Delete</a>
                    </td>
				<?php  
				    }
             	?>
            </tbody>
        </table>
    </div>
</div>
<div class="page-user">
    <div class="header-user-title">
        <a>User Account Pegawai</a>
    </div>
    <div class="content-user">
        <table class="table-user">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>NIP</th>
                    <th>Instansi</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Foto Profil</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
				<?php 
				    $no=1;
					$query = mysqli_query($koneksi,"SELECT * FROM users WHERE role LIKE '%Pegawai%' ORDER BY user_id DESC");
                    $cek_data = mysqli_num_rows($query);

                    if ($cek_data > 0) {
					while ($r=mysqli_fetch_assoc($query)) {
				?>
				<tr>
				    <td><?php echo $no++; ?></td>
					<td><?php echo $r['nama_user']; ?></td>
					<td><?php echo $r['nip']; ?></td>
					<td><?php echo $r['instansi']; ?></td>
					<td><?php echo $r['email']; ?></td>
					<td><?php echo $r['role']; ?></td>
                    <td><img src="assets/img/foto_profil/<?php echo $r['gambar']; ?>" alt="" width="100px"></td>
					<td>
                        <a class="btn-action btn-edit" href="index.php?p=update_user&id=<?php echo $r['user_id']?>"> <span><i class='bx bx-edit-alt' ></i></span> Edit</a>
                        <a class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="index.php?p=delete_user&id=<?php echo $r['user_id']?>"> <span><i class='bx bx-trash'></i></span> Delete</a>
                    </td>
                </tr>
				<?php  
                    }
				    }else{
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Tidak ada data</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
=======
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
>>>>>>> 5b864424f1764d487dead81c331e15b058f6cd06
    <div class="header">
        <a>User Account Aktif</a>
    </div>
   
<div class="page-dokumen">
    <div class="header-dokumen">
        <a href="index.php?p=forum_add" class="button-add"><i class='bx bx-plus' ></i> Baru</a>
    </div>
    <div class="content-dokumen">
        <table class="table-dokumen">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Dokumen</th>
                    <th>type</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Perencanaan bulan ini.pdf</td>
                    <td>pdf</td>
                    <td>2023-12-06 10:10:10 </td>
                    <td>
                        <a class="btn-action btn-edit" href="#"> <span><i class='bx bx-edit-alt' ></i></span> Edit</a>
                        <a class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="#"> <span><i class='bx bx-trash'></i></span> Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Perencanaan bulan ini.pdf</td>
                    <td>pdf</td>
                    <td>2023-12-06 10:10:10 </td>
                    <td>
                        <a class="btn-action btn-edit" href="#"> <span><i class='bx bx-edit-alt' ></i></span> Edit</a>
                        <a class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="#"> <span><i class='bx bx-trash'></i></span> Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Perencanaan bulan ini.pdf</td>
                    <td>pdf</td>
                    <td>2023-12-06 10:10:10 </td>
                    <td>
                        <a class="btn-action btn-edit" href="#"> <span><i class='bx bx-edit-alt' ></i></span> Edit</a>
                        <a class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="#"> <span><i class='bx bx-trash'></i></span> Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<<<<<<< HEAD
=======
</html>
>>>>>>> a01d268efac4ab78ea63fe99300a45e25f627be0
>>>>>>> 5b864424f1764d487dead81c331e15b058f6cd06
