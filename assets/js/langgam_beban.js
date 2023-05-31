// Mendapatkan elemen canvas
// var canvas = document.getElementById("lineChart");
// var ctx = canvas.getContext("2d");

// // Data untuk grafik garis
// var data = {
//   labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
//   datasets: [
//     {
//       data: [10, 20, 15, 25, 30, 20],
//       borderColor: "#5041BC",
//       borderWidth: 2 // Lebar garis
//     }
//   ]
// };

// // Membuat grafik garis menggunakan Chart.js
// var lineChart = new Chart(ctx, {
//   type: "line",
//   data: data,
//   options: {}
// });
// Ambil elemen canvas

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
      data: [69.43, 68.49 , 68.29 , 67.40 , 67.17 , 66.18 , 65.51 , 65.96 , 65.57 , 64.93 , 64.87 , 63.23 , 60.69 , 59.98 , 59.52 ,
        59.61 , 57.52 , 55.49 , 55.43 , 55.58 , 55.90 , 55.62 , 55.68 , 55.39 , 55.16 , 55.72 , 56.42 , 55.87 , 55.60 , 55.51 , 55.39 , 54.16 ,
        54.85 , 55.25 , 57.03 , 60.61 , 68.81 , 81.01 , 85.76 , 84.47 , 83.23 , 82.42 , 81.08 , 79.41 , 77.64 , 75.76 , 73.64 , 73.09 ],
      borderColor: "red",
      backgroundColor: "rgba(255, 0, 0, 0.2)",
      borderWidth: 2, 
    },
    {
      label: "Data Prediksi",
      data: [5, 15, 10, 20, 25],
      borderColor: "blue",
      backgroundColor: "rgba(0, 0, 255, 0.2)",
      borderWidth: 2
    }
    // {
    //   backgroundColor: hexToRgba("#ff0000", 10),
    //   borderColor: "#ff0000",
    //   pointHoverBackgroundColor: "#ff0000",
    //   borderWidth: 2,
    //   data: realtimes_langgam,
    //   fill: true,
    // },
    // {
    //   backgroundColor: hexToRgba("#0000FF", 10),
    //   borderColor: "#0000FF",
    //   pointHoverBackgroundColor: "#0000FF",
    //   borderWidth: 2,
    //   data: realtimes_langgam_prediksi,
    //   fill: true,
    // },
  ]
};

const ctx = document.getElementById("chart").getContext("2d");
new Chart(ctx, {
  type: "line",
  data: chartData,
  options: {
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


// const xValues = [50,60,70,80,90,100,110,120,130,140,150];
// const yValues = [7,8,8,9,9,9,10,11,14,14,15];

// new Chart("myChart", {
//   type: "line",
//   data: {
//     labels: xValues,
//     datasets: [{
//       fill: false,
//       lineTension: 0,
//       backgroundColor: "rgba(0,0,255,1.0)",
//       borderColor: "rgba(0,0,255,0.1)",
//       data: yValues
//     }]
//   },
//   options: {
//     legend: {display: false},
//     scales: {
//       yAxes: [{ticks: {min: 6, max:16}}],
//     }
//   }
// });