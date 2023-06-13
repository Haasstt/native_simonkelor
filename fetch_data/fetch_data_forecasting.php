<?php
// Koneksi ke database

$today = date("N"); // Mengambil hari ini (1 untuk Senin, 2 untuk Selasa, dst.)
if ($today == 1) {
    $hari = 2;
} elseif ($today == 2) {
    $hari = 3;
} elseif ($today == 3) {
    $hari = 4;
} elseif ($today == 4) {
    $hari = 5;
} elseif ($today == 5) {
    $hari = 6;
} elseif ($today == 6) {
    $hari = 7;
} elseif ($today == 7) {
    $hari = 1;
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_simonkelor_native";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data total_beban dari tabel beban_kit

$sql_forecast = "SELECT beban_prediksi FROM load_forcasting WHERE hari = $hari";
$result = mysqli_query($conn, $sql_forecast);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
  $data[] = $row['beban_prediksi'];
}

mysqli_close($conn);

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>