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


$sql = "SELECT 	pltu_blk1, 	pltu_blk2 FROM beban_kit WHERE DATE(tanggal) = CURDATE()";
$result = mysqli_query($conn, $sql);
$sql1 = "SELECT pltu_ipp_kpng1, pltu_ipp_kpng2 FROM beban_kit WHERE DATE(tanggal) = CURDATE()";
$result1 = mysqli_query($conn, $sql1);
$sql2 = "SELECT pltd_cogindo FROM beban_kit WHERE DATE(tanggal) = CURDATE()";
$result2 = mysqli_query($conn, $sql2);
$sql3 = "SELECT pltmg_kpng FROM beban_kit WHERE DATE(tanggal) = CURDATE()";
$result3 = mysqli_query($conn, $sql3);
$sql4 = "SELECT plts_ipp_kpng FROM beban_kit WHERE DATE(tanggal) = CURDATE()";
$result4 = mysqli_query($conn, $sql4);
$sql5 = "SELECT plts_ipp_atmb FROM beban_kit WHERE DATE(tanggal) = CURDATE()";
$result5 = mysqli_query($conn, $sql5);
$sql6 = "SELECT ulpl_kpng_ngt FROM beban_kit WHERE DATE(tanggal) = CURDATE()";
$result6 = mysqli_query($conn, $sql6);
$sql7 = "SELECT ulpl_kpng_mak FROM beban_kit WHERE DATE(tanggal) = CURDATE()";
$result7 = mysqli_query($conn, $sql7);
$sql8 = "SELECT ulpl_atmb_cat2 FROM beban_kit WHERE DATE(tanggal) = CURDATE()";
$result8 = mysqli_query($conn, $sql8);
$sql9 = "SELECT ulpl_atmb_mwm FROM beban_kit WHERE DATE(tanggal) = CURDATE()";
$result9 = mysqli_query($conn, $sql9);
$sql10 = "SELECT ulpl_atmb_swd FROM beban_kit WHERE DATE(tanggal) = CURDATE()";
$result10 = mysqli_query($conn, $sql10);
$sql11 = "SELECT 	pltu_timor1, 	pltu_timor2 FROM beban_kit WHERE DATE(tanggal) = CURDATE()";
$result11 = mysqli_query($conn, $sql11);

// $data_pembangkit_pltu_bolok = 0;
// $pltu_bolok = array();
// while ($row = mysqli_fetch_assoc($result)) {
//   $pltu_bolok[] = round($row['pltu_blk1'] + $row['pltu_blk2'], 2);
// }
// $data_pembangkit_pltu_ipp_kupang = array();
// while ($row = mysqli_fetch_assoc($result1)) {
//   $data_pembangkit_pltu_ipp_kupang[] = round($row['pltu_ipp_kpng1'] + $row['pltu_ipp_kpng2'], 2);
// }
$data_pembangkit_pltd_cogindo = 0;
while ($row = mysqli_fetch_assoc($result2)) {
  $data_pembangkit_pltd_cogindo += round($row['pltd_cogindo'], 2);
}
$data_pembangkit_pltmg_kupang = 0;
while ($row = mysqli_fetch_assoc($result3)) {
  $data_pembangkit_pltmg_kupang += round($row['pltmg_kpng'], 2);
}
$data_pembangkit_plts_ipp_kpng = 0;
while ($row = mysqli_fetch_assoc($result4)) {
  $data_pembangkit_plts_ipp_kpng += round($row['plts_ipp_kpng'], 2);
}
$data_pembangkit_plts_ipp_atmb = 0;
while ($row = mysqli_fetch_assoc($result5)) {
  $data_pembangkit_plts_ipp_atmb += round($row['plts_ipp_atmb'], 2);
}
$data_pembangkit_ulpl_kpng_ngt = 0;
while ($row = mysqli_fetch_assoc($result6)) {
  $data_pembangkit_ulpl_kpng_ngt += round($row['ulpl_kpng_ngt'], 2);
}
$data_pembangkit_ulpl_kpng_mak = 0;
while ($row = mysqli_fetch_assoc($result7)) {
  $data_pembangkit_ulpl_kpng_mak += round($row['ulpl_kpng_mak'], 2);
}
$data_pembangkit_ulpl_atmb_cat2 = 0;
while ($row = mysqli_fetch_assoc($result8)) {
  $data_pembangkit_ulpl_atmb_cat2 += round($row['ulpl_atmb_cat2'], 2);
}
$data_pembangkit_ulpl_atmb_mwm = 0;
while ($row = mysqli_fetch_assoc($result9)) {
  $data_pembangkit_ulpl_atmb_mwm += round($row['ulpl_atmb_mwm'], 2);
}
$data_pembangkit_ulpl_atmb_swd = 0;
while ($row = mysqli_fetch_assoc($result10)) {
  $data_pembangkit_ulpl_atmb_swd += round($row['ulpl_atmb_swd'], 2);
}
// $data_pembangkit_pltu_timor = array();
// while ($row = mysqli_fetch_assoc($result11)) {
//   $data_pembangkit_pltu_timor[] = round($row['pltu_timor1'] + $row['pltu_timor2'], 2);
// }


$c = $data_pembangkit_pltd_cogindo / 2;
$data_pembangkit_pltmg_kupang / 2;
$data_pembangkit_plts_ipp_kpng / 2;
$data_pembangkit_plts_ipp_atmb / 2;
$data_pembangkit_ulpl_kpng_ngt / 2;
$data_pembangkit_ulpl_kpng_mak / 2;
$data_pembangkit_ulpl_atmb_cat2 / 2;
$data_pembangkit_ulpl_atmb_mwm / 2;
$data_pembangkit_ulpl_atmb_swd / 2;

// Query untuk mengambil data total_beban dari tabel beban_kit
// Membuat variabel untuk menampung output
$output1 = '';
$output2 = '';
$output3 = '';
$output4 = '';
$output5 = '';
$output6 = '';
$output7 = '';
$output8 = '';
$output9 = '';
$output10 = '';
$output11 = '';
$output12 = '';

$output1 .= '<td>PLTU BOLOK (PLANT)</td>';
$output1 .= '<td>15.00</td>';
$output1 .= '<td>358.20</td>';
$output1 .= '<td>89.24</td>';
$output1 .= '<td>Batubara</td>';
$output1 .= '<td>22.87</td>';

$output2 .= '<td>PLTU IPP KUPANG BARU (PLANT)</td>';
$output2 .= '<td>15.00</td>';
$output2 .= '<td>358.20</td>';
$output2 .= '<td>89.24</td>';
$output2 .= '<td>Batubara</td>';
$output2 .= '<td>22.87</td>';

$output3 .= '<td>PLTD COGINDO (PLANT)</td>';
$output3 .= '<td>15.00</td>';
$output3 .= '<td>'.$c.'</td>';
$output3 .= '<td>89.24</td>';
$output3 .= '<td>Batubara</td>';
$output3 .= '<td>22.87</td>';

$output4 .= '<td>PLTU BOLOK (PLANT)</td>';
$output4 .= '<td>15.00</td>';
$output4 .= '<td>358.20</td>';
$output4 .= '<td>89.24</td>';
$output4 .= '<td>Batubara</td>';
$output4 .= '<td>22.87</td>';

$output5 .= '<td>PLTU BOLOK (PLANT)</td>';
$output5 .= '<td>15.00</td>';
$output5 .= '<td>358.20</td>';
$output5 .= '<td>89.24</td>';
$output5 .= '<td>Batubara</td>';
$output5 .= '<td>22.87</td>';

$output6 .= '<td>PLTU BOLOK (PLANT)</td>';
$output6 .= '<td>15.00</td>';
$output6 .= '<td>358.20</td>';
$output6 .= '<td>89.24</td>';
$output6 .= '<td>Batubara</td>';
$output6 .= '<td>22.87</td>';

$output7 .= '<td>PLTU BOLOK (PLANT)</td>';
$output7 .= '<td>15.00</td>';
$output7 .= '<td>358.20</td>';
$output7 .= '<td>89.24</td>';
$output7 .= '<td>Batubara</td>';
$output7 .= '<td>22.87</td>';

$output8 .= '<td>PLTU BOLOK (PLANT)</td>';
$output8 .= '<td>15.00</td>';
$output8 .= '<td>358.20</td>';
$output8 .= '<td>89.24</td>';
$output8 .= '<td>Batubara</td>';
$output8 .= '<td>22.87</td>';

$output9 .= '<td>PLTU BOLOK (PLANT)</td>';
$output9 .= '<td>15.00</td>';
$output9 .= '<td>358.20</td>';
$output9 .= '<td>89.24</td>';
$output9 .= '<td>Batubara</td>';
$output9 .= '<td>22.87</td>';

$output10 .= '<td>PLTU BOLOK (PLANT)</td>';
$output10 .= '<td>15.00</td>';
$output10 .= '<td>358.20</td>';
$output10 .= '<td>89.24</td>';
$output10 .= '<td>Batubara</td>';
$output10 .= '<td>22.87</td>';

$output11 .= '<td>PLTU BOLOK (PLANT)</td>';
$output11 .= '<td>15.00</td>';
$output11 .= '<td>358.20</td>';
$output11 .= '<td>89.24</td>';
$output11 .= '<td>Batubara</td>';
$output11 .= '<td>22.87</td>';

$output12 .= '<td>PLTU BOLOK (PLANT)</td>';
$output12 .= '<td>15.00</td>';
$output12 .= '<td>358.20</td>';
$output12 .= '<td>89.24</td>';
$output12 .= '<td>Batubara</td>';
$output12 .= '<td>22.87</td>';

// Menampilkan output
echo '<tr>'.$output1.'</tr>';
echo '<tr>'.$output2.'</tr>';
echo '<tr>'.$output3.'</tr>';
echo '<tr>'.$output4.'</tr>';
echo '<tr>'.$output5.'</tr>';
echo '<tr>'.$output6.'</tr>';
echo '<tr>'.$output7.'</tr>';
echo '<tr>'.$output8.'</tr>';
echo '<tr>'.$output9.'</tr>';
echo '<tr>'.$output10.'</tr>';
echo '<tr>'.$output11.'</tr>';
echo '<tr>'.$output12.'</tr>';

mysqli_close($conn);
