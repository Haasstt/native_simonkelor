<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_simonkelor_native";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data total_beban dari tabel beban_kit
$sql = "SELECT * FROM   WHERE 
parameter LIKE '%PLANT%'"; 

$result = mysqli_query($conn, $sql);

// Membuat variabel untuk menampung output
$output1 = '';

while ($row = mysqli_fetch_assoc($result)) {
    $output1 .= '<td>' . $row[' '] .'</td>';
}

// Menampilkan output
echo '<tr>'.$output1.'</tr>';

mysqli_close($conn);
?>
?>