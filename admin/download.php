<?php
// Mendapatkan path file yang akan diunduh
$file = 'path/ke/file.pdf';

// Mengecek apakah file ada
if (file_exists($file)) {
    // Mengatur header untuk tipe konten file
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));

    // Membaca file dan menuliskannya ke output buffer
    ob_clean();
    flush();
    readfile($file);
    exit;
} else {
    // File tidak ditemukan
    echo 'File tidak ditemukan.';
}
?>
<?php
include 'conn/config.php';
 
$data = mysqli_query($koneksi,"SELECT * FROM tb_essay WHERE
        id_essay =" . $_REQUEST['id']);

if ($row = mysqli_fetch_assoc($data))
{
   $filedata = $row['datafile'];
   $filename = $row['file'];
   $filetype = $row['typefile'];
   $filesize = $row['sizefile'];
}
 
header('Content-type: ' . $filetype);
header('Content-length: ' . $filesize);
header("Content-Transfer-Encoding: binarynn");
header("Pragma: no-cache");
header("Expires: 0");
header('Content-Disposition: attachment; filename="' . $filename . '"');
echo $filedata;
exit();
?>