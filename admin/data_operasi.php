<div class="header">
    <a>Data Operasi</a>

<div class="select-data-operasi">
  <label for="tanggal">Select Berdasarkan:</label>        
  <?php 
	$query = mysqli_query($koneksi,"SELECT * FROM beban_kit ORDER BY tanggal DESC");
                    
    $grouped_data = array_chunk(mysqli_fetch_all($query, MYSQLI_ASSOC), 48);
    $currentDate = date("d F Y");
	?>
  <select name="tanggal" id="tanggal" onchange="updateChartBySelection(this.value)">
    <option value="<?php echo $currentDate ?>" <?php if($currentDate == $currentDate) echo 'selected="selected"';?>>
    <?php echo $currentDate ?>
    </option>
    <?php
    
    foreach ($grouped_data as $group) {
        $timestamp = strtotime($group[0]['tanggal']);
        $formattedDate = date("d F Y", $timestamp); 
        $tanggal = date('Y-m-d', strtotime($group[0]['tanggal']));
    ?>
    <option value="<?php echo $tanggal ?>"><?php echo $formattedDate ?></option>
    <?php
    }
    ?>
  </select>
  </div>

</div>

<div class="page-data-operasi">
    
        <div class="card-data-operasi">
            <div class="header-card-data-operasi">
                <span class="card-name-right-data-operasi">Langgam Beban Harian</span>
            </div>            
            <hr>
            <div class="box-chart-langgam-beban-harian">

                <div class="chart-langgam-beban-harian">
                    <canvas id="langgam_operasi"></canvas>
                </div>

                <div class="box-table-data-operasi">
                    
                    <table class="table-data-operasi">
                        <thead>
                            <tr>
                                <th>Overview</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody id="beban_puncak_rencana">
                        </tbody>

                    </table>

                </div>
                
            </div>
        </div>

        <div class="card-data-operasi">
            <div class="header-card-data-operasi">
                <span class="card-name-right-data-operasi">Load Stacking Energi</span>
            </div>            
            <hr>
            <div class="box-chart-load-stacking-energi">
                <div class="chart-load-stacking-energi">
                    <canvas id="Mychart"></canvas>
                </div>
            </div>
        </div>

        <div class="card-data-operasi">
            <div class="header-card-data-operasi">
                <span class="card-name-right-data-operasi">Load Stacking Pembangkit</span>
            </div>            
            <hr>
            <div class="box-chart-load-stacking-energi">
                <div class="chart-load-stacking-energi">
                    <canvas id="Mychart_sistem_pembangkit"></canvas>
                </div>
            </div>
        </div>

        <div class="card-data-operasi">
            <div class="header-card-data-operasi">
                <span class="card-name-right-data-operasi">Produksi Energi Pembangkit</span>
            </div>            
            <hr>
            <div class="box-table-data-operasi-2">
                    
                    <table class="table-data-operasi">
                        <thead>
                            <tr>
                                <th>Overview</th>
                                <th>DMN</th>
                                <th>Energi(MW)</th>
                                <th>CF%</th>
                                <th>Bauran Energi</th>
                                <th>%</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>PLTU BOLOK (PLANT)</td>
                                <td>15.00</td>
                                <td>358.20</td>
                                <td>89.24</td>
                                <td>Batubara</td>
                                <td>22.87</td>
                            </tr>
                            <tr>
                                <td>PLTU IPP KUPANG BARU (PLANT)</td>
                                <td>15.00</td>
                                <td>358.20</td>
                                <td>89.24</td>
                                <td>Batubara</td>
                                <td>22.87</td>
                            </tr>
                            <tr>
                                <td>PLTD COGINDO (PLANT)</td>
                                <td>15.00</td>
                                <td>358.20</td>
                                <td>89.24</td>
                                <td>Batubara</td>
                                <td>22.87</td>
                            </tr>
                            <tr>
                                <td>PLTMG KUPANG PEAKER (PLANT)</td>
                                <td>15.00</td>
                                <td>358.20</td>
                                <td>89.24</td>
                                <td>Batubara</td>
                                <td>22.87</td>
                            </tr>
                            <tr>
                                <td>PLTS IPP  KUPANG</td>
                                <td>15.00</td>
                                <td>358.20</td>
                                <td>89.24</td>
                                <td>Batubara</td>
                                <td>22.87</td>
                            </tr>
                            <tr>
                                <td>PLTS IPP ATAMBUA</td>
                                <td>15.00</td>
                                <td>358.20</td>
                                <td>89.24</td>
                                <td>Batubara</td>
                                <td>22.87</td>
                            </tr>
                            <tr>
                                <td>ULPL KUPANG NIGATA (PLANT)</td>
                                <td>15.00</td>
                                <td>358.20</td>
                                <td>89.24</td>
                                <td>Batubara</td>
                                <td>22.87</td>
                            </tr>
                        </tbody>

                    </table>

                </div>
        </div>

</div>

<script src="assets/js/data_operasi.js"></script>