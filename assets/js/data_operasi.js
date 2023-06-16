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
      backgroundColor: "rgba(0, 121, 255, 1)",
      borderColor: "rgba(0, 121, 255, 1)",
      pointBackgroundColor: "rgba(0, 121, 255, 1)",
      data: [],
      tension: 0.5,
      fill: true,
    },
    {
      label: "PLTU IPP KPG BARU",
      backgroundColor: "rgba(0, 223, 162, 1)",
      borderColor: "rgba(0, 223, 162, 1)",
      pointBackgroundColor: "rgba(0, 223, 162, 1)",
      data: [],
      tension: 0.5,
      fill: true,
    },
    {
      label: "PLTD COGINDO",
      backgroundColor: "rgba(246, 250, 112, 1)",
      borderColor: "rgba(246, 250, 112, 1)",
      pointBackgroundColor: "rgba(246, 250, 112, 1)",
      data: [],
      tension: 0.5,
      fill: true,
    },
    {
      label: "PLTMG KPG PEAKER",
      backgroundColor: "rgba(255, 0, 96, 1)",
      borderColor: "rgba(255, 0, 96, 1)",
      pointBackgroundColor: "rgba(255, 0, 96, 1)",
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

function view_default() {
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
  }
}

$("#tanggal").on("change", function () {
  updateChartBySelection(this.value);
});


updateChartBySelection("default");