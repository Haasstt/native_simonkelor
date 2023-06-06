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
parameter = 'Beban Pembangkit'
";

$result = mysqli_query($conn, $sql);

// Membuat variabel untuk menampung output
$output1 = '';

while ($row = mysqli_fetch_assoc($result)) {
    
    $output1 .= ' <div class="card-update card-biru">';
    $output1 .= '<span class="card-name">Updated</span>';
    $output1 .= '<span class="card-value date">' . $row['date'] . '</span>';
    $output1 .= '</div>';
}

// Menampilkan output
echo $output1;

mysqli_close($conn);
?>
