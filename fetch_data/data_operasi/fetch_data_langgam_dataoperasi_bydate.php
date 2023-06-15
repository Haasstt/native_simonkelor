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

$date = $_POST['tanggal'];


$sql_langgam = "SELECT total_beban FROM beban_kit WHERE DATE(tanggal) = '$date'";
$result_langgam = mysqli_query($conn, $sql_langgam);
 
$data_langgam = array();
while ($row = mysqli_fetch_assoc($result_langgam)) {
  $data_langgam[] = $row['total_beban'];
}

$sql_forecast = "SELECT beban_prediksi FROM load_forcasting WHERE DATE(tanggal) = '$date'";
$result_forecast = mysqli_query($conn, $sql_forecast);

$data_forecast = array();
while ($row = mysqli_fetch_assoc($result_forecast)) {
  $data_forecast[] = $row['beban_prediksi'];
}


// Query untuk mengambil data total_beban dari tabel beban_kit
$sql = "SELECT 	pltu_blk1, 	pltu_blk2 FROM beban_kit WHERE DATE(tanggal) = '$date'";
$result = mysqli_query($conn, $sql);
$sql1 = "SELECT pltu_ipp_kpng1, pltu_ipp_kpng2 FROM beban_kit WHERE DATE(tanggal) = '$date'";
$result1 = mysqli_query($conn, $sql1);
$sql2 = "SELECT pltd_cogindo FROM beban_kit WHERE DATE(tanggal) = '$date'";
$result2 = mysqli_query($conn, $sql2);
$sql3 = "SELECT pltmg_kpng FROM beban_kit WHERE DATE(tanggal) = '$date'";
$result3 = mysqli_query($conn, $sql3);
 
$data_pembangkit_pltu_bolok = array();
while ($row = mysqli_fetch_assoc($result)) {
  $data_pembangkit_pltu_bolok[] = round($row['pltu_blk1'] + $row['pltu_blk2'], 2);
}
$data_pembangkit_pltu_ipp_kupang = array();
while ($row = mysqli_fetch_assoc($result1)) {
  $data_pembangkit_pltu_ipp_kupang[] = round($row['pltu_ipp_kpng1'] + $row['pltu_ipp_kpng2'], 2);
}
$data_pembangkit_pltd_cogindo = array();
while ($row = mysqli_fetch_assoc($result2)) {
  $data_pembangkit_pltd_cogindo[] = round($row['pltd_cogindo'], 2);
}
$data_pembangkit_pltmg_kupang = array();
while ($row = mysqli_fetch_assoc($result3)) {
  $data_pembangkit_pltmg_kupang[] = round($row['pltmg_kpng'], 2);
}
mysqli_close($conn);

$data = array(
    'data_langgam' => $data_langgam,
    'data_forecast' => $data_forecast,
    'pltu_bolok' => $data_pembangkit_pltu_bolok,
    'pltu_ipp_kupang' => $data_pembangkit_pltu_ipp_kupang,
    'pltd_cogindo' => $data_pembangkit_pltd_cogindo,
    'pltmg_kupang' => $data_pembangkit_pltmg_kupang
  );

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>