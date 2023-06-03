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
$sql = "SELECT * FROM monitoring_realtimes WHERE 
parameter = 'Beban Pembangkit' OR 
parameter = 'Frequency' OR
parameter = 'Losses' OR 
parameter ='Fuelmix'
";
$result = mysqli_query($conn, $sql);

// Membuat variabel untuk menampung output
$output = '';

while ($row = mysqli_fetch_assoc($result)) {
  $output .= '<div class="card-left">';
  $output .= '<span class="card-name">' . $row['parameter'] . '</span>';
  $output .= '<span class="card-value">' . $row['value'] . '</span>';
  $output .= '</div>';
}

// Menampilkan output
echo $output;

mysqli_close($conn);
?>
