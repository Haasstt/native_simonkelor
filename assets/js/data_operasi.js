const chartDataa = {
  labels: [
    "00:00",
    "00:30",
    "01:00",
    "01:30",
    "02:00",
    "02:30",
    "03:00",
    "03:30",
    "04:00",
    "04:30",
    "05:00",
    "05:30",
    "06:00",
    "06:30",
    "07:00",
    "07:30",
    "08:00",
    "08:30",
    "09:00",
    "09:30",
    "10:00",
    "10:30",
    "11:00",
    "11:30",
    "12:00",
    "12:30",
    "13:00",
    "13:30",
    "14:00",
    "14:30",
    "15:00",
    "15:30",
    "16:00",
    "16:30",
    "17:00",
    "17:30",
    "18:00",
    "18:30",
    "19:00",
    "19:30",
    "20:00",
    "20:30",
    "21:00",
    "21:30",
    "22:00",
    "22:30",
    "23:00",
    "23:30",
  ],
  datasets: [
    {
      label: "Data Aktual",
      borderColor: "red",
      data: [],
      backgroundColor: "rgba(255, 0, 0, 0.2)",
      borderWidth: 2,
    },
    {
      label: "Data Prediksi",
      borderColor: "blue",
      data: [],   
      backgroundColor: "rgba(0, 0, 255, 0.2)",
      borderWidth: 2
    }
  ],
};


const ctxa = document.getElementById("langgam_operasi").getContext("2d");
const ctxxx = document.getElementById("Mychart_sistem_pembangkit").getContext("2d");
let chart;
let chart_pembangkit;

$(document).ready(function () {
  chart = new Chart(ctxa, {
    type: "line",
    data: chartDataa,
    options: {
      legend: {
        display: false,
      },
      scales: {
        x: {
          grid: {
            drawOnChartArea: false,
          },
        },
        y: {
          ticks: {
            beginAtZero: true,
            maxTicksLimit: 10,
            stepSize: Math.ceil(10 / 5),
            max: 5,
          },
        },
      },
      plugins: {
        title: {
          display: false,
        },
      },
      elements: {
        line: {
          tension: 0.4,
        },
        point: {
          radius: 0,
          hitRadius: 10,
          hoverRadius: 4,
          hoverBorderWidth: 3,
        },
      },
    },
  });

  function updateChartData(langgamData) {
    chart.data.datasets[0].data = langgamData.data_langgam;
    chart.data.datasets[1].data = langgamData.data_forecast;
    chart.update();
  }


  let defaultInterval;

  function view_default() {
    $.ajax({
      url: "fetch_data/data_operasi/fetch_data_langgam_dataoperasi.php",
      method: "POST",
      dataType: "json",
      success: function (data) {
        updateChartData(data);
      },
    });

    defaultInterval = setInterval(function () {
      $.ajax({
        url: "fetch_data/data_operasi/fetch_data_langgam_dataoperasi.php",
        method: "POST",
        dataType: "json",
        success: function (data) {
          updateChartData(data);
        },
      });
    }, 1000); // Mengambil data setiap 3 detik
  }

  function updateChartBySelection(selectedValue) {
    if (selectedValue === "default") {
      // Jika pilihan default, tampilkan data utama
      view_default();   
    } else {
      // Jika pilihan default, tampilkan data utama
    clearInterval(defaultInterval);
    $.ajax({
      url: "fetch_data/data_operasi/fetch_data_langgam_dataoperasi_bydate.php",
      method: "POST",
      data: { tanggal: selectedValue },
      dataType: "json",
      success: function (data) {
        updateChartData(data);
      },
    });
    }
  }

  $("#tanggal").on("change", function () {
    updateChartBySelection(this.value);
  });

  
  updateChartBySelection("default");
});

// //chartData_loadstacking
const chartData_sistempembangkit = {
  labels: [
    "00:00",
    "00:30",
    "01:00",
    "01:30",
    "02:00",
    "02:30",
    "03:00",
    "03:30",
    "04:00",
    "04:30",
    "05:00",
    "05:30",
    "06:00",
    "06:30",
    "07:00",
    "07:30",
    "08:00",
    "08:30",
    "09:00",
    "09:30",
    "10:00",
    "10:30",
    "11:00",
    "11:30",
    "12:00",
    "12:30",
    "13:00",
    "13:30",
    "14:00",
    "14:30",
    "15:00",
    "15:30",
    "16:00",
    "16:30",
    "17:00",
    "17:30",
    "18:00",
    "18:30",
    "19:00",
    "19:30",
    "20:00",
    "20:30",
    "21:00",
    "21:30",
    "22:00",
    "22:30",
    "23:00",
    "23:30",
  ],
  datasets: [
    {
      label: "PLTU BOLOK",
      backgroundColor: "rgb(0, 121, 255)",
      borderColor: "rgb(0, 121, 255)",
      pointBackgroundColor: "rgb(0, 121, 255)",
      data: [],
      tension: 0.5,
      fill: true,
    },
    {
      label: "PLTU IPP KUPANG BARU",
      backgroundColor: "rgb(0, 223, 162)",
      borderColor: "rgb(0, 223, 162)",
      pointBackgroundColor: "rgb(0, 223, 162)",
      data: [],
      tension: 0.5,
      fill: true,
    },
    {
      label: "PLTD COGINDO",
      backgroundColor: "rgb(246, 250, 112)",
      borderColor: "rgb(246, 250, 112)",
      pointBackgroundColor: "rgb(246, 250, 112)",
      data: [],
      tension: 0.5,
      fill: true,
    },
    {
      label: "PLTMG KUPANG PEAKER",
      backgroundColor: "rgb(255, 0, 96)",
      borderColor: "rgb(255, 0, 96)",
      pointBackgroundColor: "rgb(255, 0, 96)",
      data: [],
      tension: 0.5,
      fill: true,
    },
    {
      label: "PLTS IPP KUPANG",
      backgroundColor: "rgb(8, 217, 214)",
      borderColor: "rgb(8, 217, 214)",
      pointBackgroundColor: "rgb(8, 217, 214)",
      data: [],
      tension: 0.5,
      fill: true,
    },
    {
      label: "PLTS IPP ATAMBUA",
      backgroundColor: "rgb(255, 201, 150)",
      borderColor: "rgb(255, 201, 150)",
      pointBackgroundColor: "rgb(255, 201, 150)",
      data: [],
      tension: 0.5,
      fill: true,
    },
    {
      label: "ULPL KUPANG NIGATA(PLANT)",
      backgroundColor: "rgb(143, 67, 238)",
      borderColor: "rgb(143, 67, 238)",
      pointBackgroundColor: "rgb(143, 67, 238)",
      data: [],
      tension: 0.5,
      fill: true,
    },
    {
      label: "ULPL KUPANG MAK(PLANT)",
      backgroundColor: "rgb(154, 32, 140)",
      borderColor: "rgb(154, 32, 140)",
      pointBackgroundColor: "rgb(154, 32, 140)",
      data: [],
      tension: 0.5,
      fill: true,
    },
    {
      label: "ULPL ATAMBUA CAT 2",
      backgroundColor: "rgb(255, 109, 40)",
      borderColor: "rgb(255, 109, 40)",
      pointBackgroundColor: "rgb(255, 109, 40)",
      data: [],
      tension: 0.5,
      fill: true,
    },
    {
      label: "ULPL ATAMBUA MWM",
      backgroundColor: "rgb(14, 41, 84)",
      borderColor: "rgb(14, 41, 84)",
      pointBackgroundColor: "rgb(14, 41, 84)",
      data: [],
      tension: 0.5,
      fill: true,
    },
    {
      label: "ULPL ATAMBUA SWD(PLANT)",
      backgroundColor: "rgb(136, 74, 57)",
      borderColor: "rgb(136, 74, 57)",
      pointBackgroundColor: "rgb(136, 74, 57)",
      data: [],
      tension: 0.5,
      fill: true,
    },
    {
      label: "PLTU TIMOR",
      backgroundColor: "RGB(0, 128, 0)",
      borderColor: "RGB(0, 128, 0)",
      pointBackgroundColor: "RGB(0, 128, 0)",
      data: [],
      tension: 0.5,
      fill: true,
    },
  ]
};

$(document).ready(function () {
  chart_pembangkit = new Chart(ctxxx, {
    type: "line",
    data: chartData_sistempembangkit,
    options: {
      legend:{
        display: false,
      },
      scales: {
        x: {
          grid: {
            drawOnChartArea: false,
          },
        },
        y: {
          ticks: {
            beginAtZero: true,
            maxTicksLimit: 10,
            stepSize: Math.ceil(10 / 5),
            max: 5,
          },
        },
      },
      plugins: {
        title: {
          display: false
        }
      },
      elements: {
        line: {
          tension: 0.4,
        },
        point: {
          radius: 3,
          hitRadius: 10,
          hoverRadius: 4,
          hoverBorderWidth: 3,
        },
      },
    }
  });

  function updateChartData(langgamData) {
    chart_pembangkit.data.datasets[0].data = langgamData.pltu_bolok;
    chart_pembangkit.data.datasets[1].data = langgamData.pltu_ipp_kupang;
    chart_pembangkit.data.datasets[2].data = langgamData.pltd_cogindo;
    chart_pembangkit.data.datasets[3].data = langgamData.pltmg_kupang;
    chart_pembangkit.data.datasets[4].data = langgamData.plts_ipp_kpng;
    chart_pembangkit.data.datasets[5].data = langgamData.plts_ipp_atmb;
    chart_pembangkit.data.datasets[6].data = langgamData.ulpl_kpng_ngt;
    chart_pembangkit.data.datasets[7].data = langgamData.ulpl_kpng_mak;
    chart_pembangkit.data.datasets[8].data = langgamData.ulpl_atmb_cat2;
    chart_pembangkit.data.datasets[9].data = langgamData.ulpl_atmb_mwm;
    chart_pembangkit.data.datasets[10].data = langgamData.ulpl_atmb_swd;
    chart_pembangkit.data.datasets[11].data = langgamData.pltu_timor;
    chart_pembangkit.update();
  }


  let defaultInterval;

  function view_default() {
    $.ajax({
      url: "fetch_data/data_operasi/fetch_data_langgam_dataoperasi.php",
      method: "POST",
      dataType: "json",
      success: function (data) {
        updateChartData(data);
      },
    });

    defaultInterval = setInterval(function () {
      $.ajax({
        url: "fetch_data/data_operasi/fetch_data_langgam_dataoperasi.php",
        method: "POST",
        dataType: "json",
        success: function (data) {
          updateChartData(data);
        },
      });
    }, 1000); // Mengambil data setiap 3 detik
  }
  
  function updateChartBySelection(selectedValue) {
    if (selectedValue === "default") {
      // Jika pilihan default, tampilkan data utama
      view_default();   
    } else {
      // Jika pilihan default, tampilkan data utama
    clearInterval(defaultInterval);
    $.ajax({
      url: "fetch_data/data_operasi/fetch_data_langgam_dataoperasi_bydate.php",
      method: "POST",
      data: { tanggal: selectedValue },
      dataType: "json",
      success: function (data) {
        updateChartData(data);
      },
    });
    }
  }

  $("#tanggal").on("change", function () {
    updateChartBySelection(this.value);
  });

  
  updateChartBySelection("default");
});

let defaultInterval;
let defaultInterval2;

function view_default() {
  $.ajax({
    url: "fetch_data/data_operasi/date_data_operasi.php",
    method: "POST",
    dataType: 'html',
    success: function(data) {
      // Menampilkan data monitoring ke dalam elemen dengan id "monitoring-data"
      $('#Langgam_tanggal_hari_ini').html(data);
      $('#Load_energi_tanggal_hari_ini').html(data);
      $('#Load_pembangkit_tanggal_hari_ini').html(data);
      $('#produksi_pembangkit_tanggal_hari_ini').html(data);
    console.log(data);
    },
    error: function(xhr, status, error) {
      console.error(error); // Menampilkan pesan error jika permintaan AJAX gagal
    }
  });

  $.ajax({
    url: "fetch_data/data_operasi/fetch_data_overview.php",
    method: "POST",
    dataType: 'html',
    success: function(data) {
      // Menampilkan data monitoring ke dalam elemen dengan id "monitoring-data"
      $('#beban_puncak_rencana').html(data);
    console.log(data);
    },
    error: function(xhr, status, error) {
      console.error(error); // Menampilkan pesan error jika permintaan AJAX gagal
    }
  });

  $.ajax({
    url: "fetch_data/data_operasi/fetch_data_energi_pembangkit.php",
    method: "POST",
    dataType: 'html',
    success: function(data) {
      // Menampilkan data monitoring ke dalam elemen dengan id "monitoring-data"
      $('#beban_energi_pembangkit').html(data);
    console.log(data);
    },
    error: function(xhr, status, error) {
      console.error(error); // Menampilkan pesan error jika permintaan AJAX gagal
    }
  });

  defaultInterval = setInterval(function () {
    $.ajax({
      url: "fetch_data/data_operasi/fetch_data_overview.php",
      method: "POST",dataType: 'html',
      success: function(data) {
        // Menampilkan data monitoring ke dalam elemen dengan id "monitoring-data"
        $('#beban_puncak_rencana').html(data);
      console.log(data);
      },
      error: function(xhr, status, error) {
        console.error(error); // Menampilkan pesan error jika permintaan AJAX gagal
      }
    });
  }, 1000);

  defaultInterval2 = setInterval(function () {
    $.ajax({
      url: "fetch_data/data_operasi/fetch_data_energi_pembangkit.php",
      method: "POST",
      dataType: 'html',
      success: function(data) {
        // Menampilkan data monitoring ke dalam elemen dengan id "monitoring-data"
        $('#beban_energi_pembangkit').html(data);
      console.log(data);
      },
      error: function(xhr, status, error) {
        console.error(error); // Menampilkan pesan error jika permintaan AJAX gagal
      }
    });
  }, 1000); // Mengambil data setiap 3 detik
}

function updateChartBySelection(selectedValue) {
  if (selectedValue === "default") {
    // Jika pilihan default, tampilkan data utama
    view_default();   
  } else {
    // Jika pilihan default, tampilkan data utama
    clearInterval(defaultInterval);
    clearInterval(defaultInterval2);

    $.ajax({
      url: 'fetch_data/data_operasi/date_data_operasi.php', // Ganti dengan path ke file PHP yang berisi script untuk mengambil data monitoring
      method: 'POST',
      data: { tanggal: selectedValue },
      dataType: 'html',
      success: function(data) {
        // Menampilkan data monitoring ke dalam elemen dengan id "monitoring-data"
      $('#Langgam_tanggal_hari_ini').html(data);
      $('#Load_energi_tanggal_hari_ini').html(data);
      $('#Load_pembangkit_tanggal_hari_ini').html(data);
      $('#produksi_pembangkit_tanggal_hari_ini').html(data);
      console.log(data);
      },
      error: function(xhr, status, error) {
        console.error(error); // Menampilkan pesan error jika permintaan AJAX gagal
      }
    });

  $.ajax({
    url: 'fetch_data/data_operasi/fetch_data_overview_bydate.php', // Ganti dengan path ke file PHP yang berisi script untuk mengambil data monitoring
    method: 'POST',
    data: { tanggal: selectedValue },
    dataType: 'html',
    success: function(data) {
      // Menampilkan data monitoring ke dalam elemen dengan id "monitoring-data"
      $('#beban_puncak_rencana').html(data);
    console.log(data);
    },
    error: function(xhr, status, error) {
      console.error(error); // Menampilkan pesan error jika permintaan AJAX gagal
    }
  });

  $.ajax({
    url: 'fetch_data/data_operasi/fetch_data_energi_pembangkit_bydate.php', // Ganti dengan path ke file PHP yang berisi script untuk mengambil data monitoring
    method: 'POST',
    data: { tanggal: selectedValue },
    dataType: 'html',
    success: function(data) {
      // Menampilkan data monitoring ke dalam elemen dengan id "monitoring-data"
      $('#beban_energi_pembangkit').html(data);
    console.log(data);
    },
    error: function(xhr, status, error) {
      console.error(error); // Menampilkan pesan error jika permintaan AJAX gagal
    }
  });
  }
}

$("#tanggal").on("change", function () {
  updateChartBySelection(this.value);
});


updateChartBySelection("default");

//chartData_loadstacking
const chartData_loadstacking = {
  ],
  datasets: [
    {
      label: "Batubara",
      backgroundColor: "rgba(94, 94, 94, 0.8)",
      borderColor: "rgba(94, 94, 94, 0.8)",
      pointBackgroundColor: "rgba(94, 94, 94, 0.8)",
      data: [10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10,],
      tension: 0.5,
      fill: true,
      pointRadius: 0,
    },
    {
      label: "Gas",
      backgroundColor: "rgba(255, 119, 0, 0.98)",
      borderColor: "rgba(255, 119, 0, 0.98)",
      pointBackgroundColor: "rgba(255, 119, 0, 0.98)",
      data: [10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10,],
      tension: 0.5,
      fill: true,
      pointRadius: 0,
    },
    {
      label: "Panas Bumi",
      backgroundColor: "rgba(0, 217, 4, 0.98)",
      borderColor: "rgba(0, 217, 4, 0.98)",
      pointBackgroundColor: "rgba(0, 217, 4, 0.98)",
      data: [10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10,],
      tension: 0.5,
      fill: true,
      pointRadius: 0,
    },
    {
      label: "Hidro",
      backgroundColor: "rgba(0, 38, 217, 0.98)",
      borderColor: "rgba(0, 38, 217, 0.98)",
      pointBackgroundColor: "rgba(0, 38, 217, 0.98)",
      data: [10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10,],
      tension: 0.5,
      fill: true,
      pointRadius: 0,
    },
    {
      label: "MFO",
      backgroundColor: "rgba(103, 54, 0, 0.98)",
      borderColor: "rgba(103, 54, 0, 0.98)",
      pointBackgroundColor: "rgba(103, 54, 0, 0.98)",
      data: [10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10,],
      tension: 0.5,
      fill: true,
      pointRadius: 0,
    },
    {
      label: "HSD/B30",
      backgroundColor: "rgba(126, 75, 0, 0.98)",
      borderColor: "rgba(126, 75, 0, 0.98)",
      pointBackgroundColor: "rgba(126, 75, 0, 0.98)",
      data: [10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10,],
      tension: 0.5,
      fill: true,
      pointRadius: 0,
    },
    {
      label: "Surya dan Bayu",
      backgroundColor: "rgba(227, 233, 0, 0.98)",
      borderColor: "rgba(227, 233, 0, 0.98)",
      pointBackgroundColor: "rgba(227, 233, 0, 0.98)",
      data: [10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10,],
      tension: 0.5,
      fill: true,
      pointRadius: 0,
    },
    {
      label: "Beban Sistem",
      backgroundColor: "rgba(0, 0, 0, 0.98)",
      borderColor: "rgba(0, 0, 0, 0.98)",
      pointBackgroundColor: "rgba(0, 0, 0, 0.98)",
      data: [70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70, 70,],
      tension: 0.5,
      fill: false
    },
  ]
};

const ctxx = document.getElementById("Mychart").getContext("2d");
$(document).ready(function() {
  var chart = new Chart(ctxx, {
    type: "line",
    data: chartData_loadstacking,
    options: {
      scales: {
        y: {
          beginAtZero: true,
          stacked: true // Mengaktifkan tumpukan dataset pada sumbu y
        }
      }
    }
  });
});