$.ajax({
  url: 'fetch_data/fetch_data_realtime_beban_pembangkit.php', // Ganti dengan path ke file PHP yang berisi script untuk mengambil data monitoring
  method: 'GET',
  dataType: 'html',
  success: function(data) {
    // Menampilkan data monitoring ke dalam elemen dengan id "monitoring-data"
    $('#card_left').html(data);
  console.log(data);
  },
  error: function(xhr, status, error) {
    console.error(error); // Menampilkan pesan error jika permintaan AJAX gagal
  }
});

$.ajax({
  url: 'fetch_data/fetch_date_update.php', // Ganti dengan path ke file PHP yang berisi script untuk mengambil data monitoring
  method: 'GET',
  dataType: 'html',
  success: function(data) {
    // Menampilkan data monitoring ke dalam elemen dengan id "monitoring-data"
    $('#date').html(data);
  console.log(data);
  },
  error: function(xhr, status, error) {
    console.error(error); // Menampilkan pesan error jika permintaan AJAX gagal
  }
});

setInterval(function() {
  $.ajax({
    url: 'fetch_data/fetch_data_realtime_beban_pembangkit.php', // Ganti dengan path ke file PHP yang berisi script untuk mengambil data monitoring
    method: 'GET',
    dataType: 'html',
    success: function(data) {
      // Menampilkan data monitoring ke dalam elemen dengan id "monitoring-data"
      $('#card_left').html(data);
    console.log(data);
    }
  });
}, 1000);

setInterval(function() {
  $.ajax({
    url: 'fetch_data/fetch_date_update.php', // Ganti dengan path ke file PHP yang berisi script untuk mengambil data monitoring
    method: 'GET',
    dataType: 'html',
    success: function(data) {
      // Menampilkan data monitoring ke dalam elemen dengan id "monitoring-data"
      $('#date').html(data);
    console.log(data);
    }
  });
}, 1000);

//langgam
  const chartData = {
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
        backgroundColor: "rgba(255, 0, 0, 0.2)",
        borderWidth: 2, 
      },
      {
        label: "Data Prediksi",
        borderColor: "blue",
        backgroundColor: "rgba(0, 0, 255, 0.2)",
        borderWidth: 2
      }
    ]
  };

  const ctx = document.getElementById("chart").getContext("2d");
  $(document).ready(function() {
    var chart = new Chart(ctx, {
      type: "line",
      data: chartData,
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
            radius: 0,
            hitRadius: 10,
            hoverRadius: 4,
            hoverBorderWidth: 3,
          },
        },
      }
    });
    
    $.ajax({
      url: 'fetch_data/fetch_data_forecasting.php',
      method: 'POST',
      dataType: 'json',
      success: function(data) {
        chart.data.datasets[1].data = data;
        chart.update();
      }
    });
    
    $.ajax({
      url: 'fetch_data/fetch_data_langgam.php',
      method: 'POST',
      dataType: 'json',
      success: function(data) {
        chart.data.datasets[0].data = data;
        chart.update();
      }
    });
    
    setInterval(function() {
      $.ajax({
        url: 'fetch_data/fetch_data_langgam.php',
        method: 'POST',
        dataType: 'json',
        success: function(data) {
          chart.data.datasets[0].data = data;
          chart.update();
        }
      });
    }, 1000); // Mengambil data setiap 3 detik
  });

//chart

const Color = d3.scaleOrdinal()
  .range(['#F4BE37', '#5388D8', '#0D2535', '#FF9F40', '#888']);


// Donut Chart
const donutContainer = d3.select("#chart-donut");
const donutWidth = 250;
const donutHeight = 250;
const donutRadius = Math.min(donutWidth, donutHeight) / 2;

const innerRadius = 80;
const outerRadius = Math.min(donutWidth, donutHeight) / 2;

const donutSvg = donutContainer.append("svg")
  .attr("width", donutWidth)
  .attr("height", donutHeight)
  .append("g")
  .attr("transform", `translate(${donutWidth / 2}, ${donutHeight / 2})`);

const donutData = [
  { value: 40 },
  { value: 10 },
  { value: 30 },
  { value: 20 }
];

const donutArc = d3.arc()
  .innerRadius(innerRadius)
  .outerRadius(outerRadius);

const donutPie = d3.pie()
  .value(d => d.value);

const donutArcs = donutSvg.selectAll("arc")
  .data(donutPie(donutData))
  .enter()
  .append("g");

donutArcs.append("path")
  .attr("d", donutArc)
  .attr("fill", (d, i) => Color(i));

// Pie Chart
const pieContainer = d3.select("#chart-pie");
const pieWidth = 250;
const pieHeight = 250;
const pieRadius = Math.min(pieWidth, pieHeight) / 2;

const pieSvg = pieContainer.append("svg")
  .attr("width", pieWidth)
  .attr("height", pieHeight)
  .append("g")
  .attr("transform", `translate(${pieWidth / 2}, ${pieHeight / 2})`);

const pieData = [
  { value: 30 },
  { value: 25 },
  { value: 25 },
  { value: 20 }
];

const pieArc = d3.arc()
  .innerRadius(0)
  .outerRadius(pieRadius);

const piePie = d3.pie()
  .value(d => d.value);

const pieArcs = pieSvg.selectAll("arc")
  .data(piePie(pieData))
  .enter()
  .append("g");

pieArcs.append("path")
  .attr("d", pieArc)
  .attr("fill", (d, i) => Color(i));

pieArcs.append("text")
  .attr("transform", d => `translate(${pieArc.centroid(d)})`)
  .attr("text-anchor", "middle")
  .text(d => d.data.label);



//chartData_loadstacking
  const chartData_loadstacking = {
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
        label: "Beban Sistem",
        backgroundColor: "rgba(0, 0, 0, 0.98)",
        borderColor: "rgba(0, 0, 0, 0.98)",
        pointBackgroundColor: "rgba(0, 0, 0, 0.98)",
        data: [27, 27, 27, 27, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2, 27.2,],
        tension: 0.5,
        fill: false
      },
      {
        label: "Batubara",
        backgroundColor: "rgba(94, 94, 94, 0.8)",
        borderColor: "rgba(94, 94, 94, 0.8)",
        pointBackgroundColor: "rgba(94, 94, 94, 0.8)",
        data: [9, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10,],
        tension: 0.5,
        fill: true,
        pointRadius: 0,
      },
      {
        label: "Gas",
        backgroundColor: "rgba(255, 119, 0, 0.98)",
        borderColor: "rgba(255, 119, 0, 0.98)",
        pointBackgroundColor: "rgba(255, 119, 0, 0.98)",
        data: [14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14,],
        tension: 0.5,
        fill: true,
        pointRadius: 0,
      },
      {
        label: "Panas Bumi",
        backgroundColor: "rgba(0, 217, 4, 0.98)",
        borderColor: "rgba(0, 217, 4, 0.98)",
        pointBackgroundColor: "rgba(0, 217, 4, 0.98)",
        data: [17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17,],
        tension: 0.5,
        fill: true,
        pointRadius: 0,
      },
      {
        label: "Hidro",
        backgroundColor: "rgba(0, 38, 217, 0.98)",
        borderColor: "rgba(0, 38, 217, 0.98)",
        pointBackgroundColor: "rgba(0, 38, 217, 0.98)",
        data: [18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18,],
        tension: 0.5,
        fill: true,
        pointRadius: 0,
      },
      {
        label: "MFO",
        backgroundColor: "rgba(103, 54, 0, 0.98)",
        borderColor: "rgba(103, 54, 0, 0.98)",
        pointBackgroundColor: "rgba(103, 54, 0, 0.98)",
        data: [22, 21, 21, 21, 22, 21, 21, 21, 21, 22, 21, 21, 21, 22, 21, 21, 21, 21, 22, 21, 21, 21, 22, 21, 21, 21, 21, 22, 21, 21, 21, 22, 21, 21, 21, 21, 22, 21, 21, 21, 22, 21, 21, 21, 21, 22, 21, 21, 21, 22, 21, 21, 21, 21, 22, 21, 21,],
        tension: 0.5,
        fill: true,
        pointRadius: 0,
      },
      {
        label: "HSD/B30",
        backgroundColor: "rgba(126, 75, 0, 0.98)",
        borderColor: "rgba(126, 75, 0, 0.98)",
        pointBackgroundColor: "rgba(126, 75, 0, 0.98)",
        data: [25, 25, 25, 25, 25, 25, 25, 24, 25, 25, 25, 25, 25, 25, 25, 25, 24, 25, 25, 25, 25, 25, 25, 25, 25, 24, 25, 25, 25, 25, 25, 25, 25, 25, 24, 25, 25, 25, 25, 25, 25, 25, 25, 24, 25, 25, 25, 25, 25, 25, 25, 25, 24, 25, 25, 25, 25,],
        tension: 0.5,
        fill: true,
        pointRadius: 0,
      },
      {
        label: "Surya dan Bayu",
        backgroundColor: "rgba(227, 233, 0, 0.98)",
        borderColor: "rgba(227, 233, 0, 0.98)",
        pointBackgroundColor: "rgba(227, 233, 0, 0.98)",
        data: [27, 27, 27,27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27, 27,],
        tension: 0.5,
        fill: true,
        pointRadius: 0,
      },
    ]
  };

  const ctxx = document.getElementById("Mychart").getContext("2d");
  $(document).ready(function() {
    var chart = new Chart(ctxx, {
      type: "line",
      data: chartData_loadstacking,
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
  });

  
//chartData_loadstacking
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
      data: [9, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10],
      tension: 0.5,
      fill: true,
    },
    {
      label: "PLTU IPP KPG BARU",
      backgroundColor: "rgba(0, 223, 162, 1)",
      borderColor: "rgba(0, 223, 162, 1)",
      pointBackgroundColor: "rgba(0, 223, 162, 1)",
      data: [14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14],
      tension: 0.5,
      fill: true,
    },
    {
      label: "PLTD COGINDO",
      backgroundColor: "rgba(246, 250, 112, 1)",
      borderColor: "rgba(246, 250, 112, 1)",
      pointBackgroundColor: "rgba(246, 250, 112, 1)",
      data: [17, 17, 17, 17, 17, 17, 17, 18, 19, 20, 20, 21, 22, 23, 24, 24, 23, 21, 20, 18, 15, 15, 12, 11, 16, 22, 23, 24, 25, 23, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17],
      tension: 0.5,
      fill: true,
    },
    {
      label: "PLTMG KPG PEAKER",
      backgroundColor: "rgba(255, 0, 96, 1)",
      borderColor: "rgba(255, 0, 96, 1)",
      pointBackgroundColor: "rgba(255, 0, 96, 1)",
      data: [18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 19, 19, 20, 22, 23, 23, 24, 24, 26, 26, 24, 23, 22, 19, 18, 18, 18, 18, 18],
      tension: 0.5,
      fill: true,
    },
  ]
};

const ctxxx = document.getElementById("Mychart_sistem_pembangkit").getContext("2d");
$(document).ready(function() {
  var chart = new Chart(ctxxx, {
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
});