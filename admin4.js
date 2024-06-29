let score;
let chart;
let baris = [];
let id_user;
let chart_index;

function lihat_detail(id) {
  id_user = id;
  $("#mdlDetail").modal("show");
}

$("#mdlDetail").on("shown.bs.modal", function () {
  $.ajax({
    type: "GET",
    url: `ajax_detail.php?id_user=${id_user}`,
    success: function (response) {
      let data = JSON.parse(response);
      let benar = data.benar.split(",");
      let salah = data.salah.split(",");
      let hapus = data.hapus.split(",");
      baris.length = 0;
      for (let i = 1; i <= benar.length; i++) {
        baris.push("Baris " + i);
      }
      const dataChart = {
        labels: baris,
        datasets: [
          {
            label: "Benar",
            data: benar,
          },
          {
            label: "Salah",
            data: salah,
          },
          {
            label: "Hapus",
            data: hapus,
          },
        ],
      };
      if (chart) {
        chart.destroy();
      }
      const ctx = document.getElementById("chart-hasil");
      chart = new Chart(ctx, {
        type: "line",
        data: dataChart,
        options: {
          scales: {
            y: {
              min: 0,
              ticks: {
                stepSize: 1,
              },
            },
          },
        },
      });
    },
  });
});

function lihat_index(id) {
  id_user = id;
  $("#mdlIndex").modal("show");
}

$("#mdlIndex").on("shown.bs.modal", function () {
  $.ajax({
    type: "GET",
    url: `ajax_index.php?id_user=${id_user}`,
    success: function (response) {
      let data_index = JSON.parse(response);
      let index_benar = data_index.total_benar.split(",");
      let index_salah = data_index.total_salah.split(",");
      let isi = data_index.isi.split(",");
      baris.length = 0;
      for (let i = 1; i <= isi.length; i++) {
        baris.push("Baris " + i);
      }
      const dataChart = {
        labels: baris,
        datasets: [
          {
            label: "Isian Terakhir",
            data: isi,
          },
        ],
      };
      const average =
        isi.reduce((a, b) => parseInt(a) + parseInt(b), 0) / isi.length;
      console.log(average);
      const total_annotation = {
        type: "line",
        borderColor: "black",
        borderDash: [6, 6],
        borderDashOffset: 0,
        borderWidth: 2,
        label: {
          enabled: true,
          content: "Rata-rata: " + average.toFixed(2),
          position: "end",
        },
        scaleID: "y",
        value: average,
      };
      if (chart_index) {
        chart_index.destroy();
      }
      const ctx = document.getElementById("chart-index").getContext("2d");
      chart_index = new Chart(ctx, {
        type: "line",
        data: dataChart,
        options: {
          responsive: true,
          plugins: {
            annotation: {
              annotations: {
                total_annotation,
              },
            },
          },
          scales: {
            y: {
              min: 0,
              ticks: {
                stepSize: 1,
              },
            },
          },
        },
      });
    },
  });
});
