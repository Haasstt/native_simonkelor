<?php

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
if (isset($_GET['simpan'])) {
    $cari = $_GET['cari'];

    $sql_beban_real = "SELECT total_beban FROM beban_kit WHERE DATE(tanggal) = '$cari'";
    $sql_beban_forecast = "SELECT beban_prediksi FROM load_forcasting WHERE hari = $hari";
    $sql_beban_puncak_forecast = "SELECT MAX(beban_prediksi) as nilai_tertinggi FROM load_forcasting WHERE hari = $hari";
    $sql_beban_puncak_sebenarnya = "SELECT MAX(total_beban) as nilai_tertinggi_sebenarnya FROM beban_kit WHERE DATE(tanggal) = '$cari'";
} else {
$sql_beban_real = "SELECT total_beban FROM beban_kit WHERE DATE(tanggal) = CURDATE()";
$sql_beban_forecast = "SELECT beban_prediksi FROM load_forcasting WHERE hari = $hari";
$sql_beban_puncak_forecast = "SELECT MAX(beban_prediksi) as nilai_tertinggi FROM load_forcasting WHERE hari = $hari";
$sql_beban_puncak_sebenarnya = "SELECT MAX(total_beban) as nilai_tertinggi_sebenarnya FROM beban_kit WHERE DATE(tanggal) = CURDATE()";
}
$result = mysqli_query($conn, $sql_beban_puncak_forecast);
$result2 = mysqli_query($conn, $sql_beban_puncak_sebenarnya);
$result3 = mysqli_query($conn, $sql_beban_real);
$result4 = mysqli_query($conn, $sql_beban_forecast);

$data = 0;
$data_predic = 0;
$a = 0;
$b = 0;
$c = 0;
$deviasi = 0;
$load_factor = 0;

while ($row = mysqli_fetch_assoc($result3)) {
  $data += $row['total_beban'];
}
while ($row = mysqli_fetch_assoc($result4)) {
  $data_predic += $row['beban_prediksi'];
}
$deviasi = ($data - $data_predic) / $data_predic * 100;

// Membuat variabel untuk menampung output
$output1 = '';
$output2 = '';
$output3 = '';
$output4 = '';

while ($row = mysqli_fetch_assoc($result)) {
    $output1 .= '<td>Beban Puncak Rencana Sebesar</td>';
    $output1 .= '<td>' . $row['nilai_tertinggi'] . ' MW'.'</td>';
    $a = $row['nilai_tertinggi'];
}
while ($row = mysqli_fetch_assoc($result2)) {
    $output2 .= '<td>Beban Puncak Realisasi Sebesar</td>';
    $output2 .= '<td>' . $row['nilai_tertinggi_sebenarnya'] . ' MW'.'</td>';
    $b = $row['nilai_tertinggi_sebenarnya'];
}
$c = $b * 48;
$load_factor = ($data / $c) * 100;

$output3 .= '<td>Deviasi Rencana Realisasi</td>';
$output3 .= '<td>' . round($deviasi, 1). ' %'.'</td>';

$output4 .= '<td>Load Factor (LF) Sebesar</td>';
$output4 .= '<td>' .round($load_factor, 1). ' %'.'</td>';

// Menampilkan output
echo '<tr>'.$output1.'</tr>';
echo '<tr>'.$output2.'</tr>';
echo '<tr>'.$output3.'</tr>';
echo '<tr>'.$output4.'</tr>';

mysqli_close($conn);

?>
