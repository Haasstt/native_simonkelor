<div class="header">
    <a>Forescasting</a>
</div>
<div class="page-forecasting">
    <script>
        $(document).ready(function() {
            $('#checkAll').click(function() {
                $('input[type="checkbox"]').slice(2, 30).prop('checked', this.checked);
            });
        });
    </script>

    <table class="table-data-beban-a">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Hari</th>
                <th>Auto checked <input type="checkbox" id="checkAll"></th>
            </tr>
        </thead>
    </table>
    <form action="admin/dispacher/proses_forecast.php" method="POST">
        <div class="page-data-tableforecast">
            <table class="table-data-beban">
                <tbody>

                    <?php
                    $no = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM beban_kit ORDER BY tanggal DESC");

                    $grouped_data = array_chunk(mysqli_fetch_all($query, MYSQLI_ASSOC), 48);

                    foreach ($grouped_data as $group) {
                        $timestamp = strtotime($group[0]['tanggal']);

                        $formattedDate = date("d F Y", $timestamp);
                        $tanggal = date('Y-m-d', strtotime($group[0]['tanggal']));
                    ?>
                        <tr>
                            <td><?php echo $formattedDate ?></td>
                            <td>hari ke-<?php echo $no++ ?></td>
                            <td><input type="checkbox" name="pilihan[]" value="<?php echo $tanggal ?>"></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>
        </div>
        <input type="submit" name="Submit" value="Forecasting">
    </form>


    <div class="box-table-data-forecasting">
        <span class="title-hasil-forecasting">Hasil Forecasting</span>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM load_forcasting");
        $cek_data = mysqli_num_rows($query);

        if ($cek_data > 0) {
        ?>

            <div class="table-forecast">

                <table class="table-data-forecasting-waktu">
                    <thead>
                        <tr>
                            <th>Waktu</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>00.00</td>
                        </tr>
                        <tr>
                            <td>00.30</td>
                        </tr>
                        <tr>
                            <td>01.00</td>
                        </tr>
                        <tr>
                            <td>01.30</td>
                        </tr>
                        <tr>
                            <td>02.00</td>
                        </tr>
                        <tr>
                            <td>02.30</td>
                        </tr>
                        <tr>
                            <td>03.00</td>
                        </tr>
                        <tr>
                            <td>03.30</td>
                        </tr>
                        <tr>
                            <td>04.00</td>
                        </tr>
                        <tr>
                            <td>04.30</td>
                        </tr>
                        <tr>
                            <td>05.00</td>
                        </tr>
                        <tr>
                            <td>05.30</td>
                        </tr>
                        <tr>
                            <td>06.00</td>
                        </tr>
                        <tr>
                            <td>06.30</td>
                        </tr>
                        <tr>
                            <td>07.00</td>
                        </tr>
                        <tr>
                            <td>07.30</td>
                        </tr>
                        <tr>
                            <td>08.00</td>
                        </tr>
                        <tr>
                            <td>08.30</td>
                        </tr>
                        <tr>
                            <td>09.00</td>
                        </tr>
                        <tr>
                            <td>09.30</td>
                        </tr>
                        <tr>
                            <td>10.00</td>
                        </tr>
                        <tr>
                            <td>10.30</td>
                        </tr>
                        <tr>
                            <td>11.00</td>
                        </tr>
                        <tr>
                            <td>11.30</td>
                        </tr>
                        <tr>
                            <td>12.00</td>
                        </tr>
                        <tr>
                            <td>12.30</td>
                        </tr>
                        <tr>
                            <td>13.00</td>
                        </tr>
                        <tr>
                            <td>13.30</td>
                        </tr>
                        <tr>
                            <td>14.00</td>
                        </tr>
                        <tr>
                            <td>14.30</td>
                        </tr>
                        <tr>
                            <td>15.00</td>
                        </tr>
                        <tr>
                            <td>15.30</td>
                        </tr>
                        <tr>
                            <td>16.00</td>
                        </tr>
                        <tr>
                            <td>16.30</td>
                        </tr>
                        <tr>
                            <td>17.00</td>
                        </tr>
                        <tr>
                            <td>17.30</td>
                        </tr>
                        <tr>
                            <td>18.00</td>
                        </tr>
                        <tr>
                            <td>18.30</td>
                        </tr>
                        <tr>
                            <td>19.00</td>
                        </tr>
                        <tr>
                            <td>19.30</td>
                        </tr>
                        <tr>
                            <td>20.00</td>
                        </tr>
                        <tr>
                            <td>20.30</td>
                        </tr>
                        <tr>
                            <td>21.00</td>
                        </tr>
                        <tr>
                            <td>21.30</td>
                        </tr>
                        <tr>
                            <td>22.00</td>
                        </tr>
                        <tr>
                            <td>22.30</td>
                        </tr>
                        <tr>
                            <td>23.00</td>
                        </tr>
                        <tr>
                            <td>23.30</td>
                        </tr>
                    </tbody>

                </table>

                <div class="page-data-forecast">
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM load_forcasting GROUP BY id_forecast DESC");

                    $grouped_data = array_chunk(mysqli_fetch_all($query, MYSQLI_ASSOC), 48);
                    $currentDate = date("d F Y");
                    foreach ($grouped_data as $group) {
                        $timestamp = strtotime($group[0]['tanggal']);
                        $formattedDate = date("d F Y", $timestamp);
                        $tanggal = date('Y-m-d', strtotime($group[0]['tanggal']));
                    ?>

                    <table class="table-data-forecasting">
                        <thead>
                            <tr>
                                <th><?php echo $formattedDate ?> <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="index.php?p=delete_result_forecast&date=<?php echo $tanggal ?>"><i class='bx bx-trash'></i></a></th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM load_forcasting WHERE DATE(tanggal) = '$tanggal'");
                            $cek_data = mysqli_num_rows($query);
                            while ($r = mysqli_fetch_assoc($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $r['beban_prediksi'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>

                    </table>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <a onclick="return confirm('Apakah Anda yakin ingin menghapus seluruh data forecasting?')" class="btn-action-center btn-delete" href="index.php?p=delete_forecast">Clear Hasil forecast</a>

        <?php
        } else {
        ?>
            <table class="table-donut">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Data Kosong</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>

            </table>
        <?php
        }
        ?>

    </div>
    <!-- <div class="data-beban"></div> -->
</div>