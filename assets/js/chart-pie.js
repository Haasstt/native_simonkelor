// Ambil referensi elemen chart
const chartContainer = d3.select("#chart");

// Set ukuran chart
const width = 250;
const height = 250;

// Set radius lingkaran
const radius = Math.min(width, height) / 2;

// Buat objek SVG untuk menampung chart
const svg = chartContainer.append("svg")
  .attr("width", width)
  .attr("height", height)
  .append("g")
  .attr("transform", `translate(${width / 2}, ${height / 2})`);

// Definisikan data chart
const data = [
  { label: "Data 1", value: 30 },
  { label: "Data 2", value: 50 },
  { label: "Data 3", value: 20 }
];

// Buat skala warna untuk segmen chart
const color = d3.scaleOrdinal(d3.schemeCategory10);

// Buat generator arc
const arc = d3.arc()
  .innerRadius(0)
  .outerRadius(radius);

// Buat layout pie
const pie = d3.pie()
  .value(d => d.value);

// Buat elemen chart menggunakan data
const arcs = svg.selectAll("arc")
  .data(pie(data))
  .enter()
  .append("g");

// Gambar segmen chart
arcs.append("path")
  .attr("d", arc)
  .attr("fill", (d, i) => color(i));

// Tambahkan label pada setiap segmen
arcs.append("text")
  .attr("transform", d => `translate(${arc.centroid(d)})`)
  .attr("text-anchor", "middle")
  .text(d => d.data.label);
