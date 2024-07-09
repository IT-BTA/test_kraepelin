<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Test Kraepelin</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link href="https://unpkg.com/basscss@7.1.1/css/basscss.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles2.css" />
    <style>
        .card-body {
            display: inline-block;
            width: auto;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <h1 class="mt-1 mb-1">Test Kraepelin</h1>
        <div id="hasil_index" class="d-flex justify-content-center"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@1.0.0"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/admin4.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: `../db/ajax_index.php?id_user=<?php echo $_GET['id_user']; ?>`,
                success: function(response) {
                    let data_index = JSON.parse(response);
                    let soal = data_index.soal.split(",");
                    let index_benar = data_index.total_benar.split(",");
                    let index_salah = data_index.total_salah.split(",");
                    let isi = data_index.isi.split(",");
                    let max_baris = data_index.baris;
                    let max_kolom = data_index.kolom;
                    let waktu = data_index.waktu;
                    const testArea = document.getElementById("hasil_index");
                    testArea.innerHTML = ""; // Clear previous content
                    const fragment = document.createDocumentFragment();
                    for (let i = 1; i <= max_kolom; i++) {
                        const testDiv = document.createElement("div");
                        testDiv.className = "d-flex";
                        testDiv.innerHTML = `<div id="answers-column-${i}" class="d-flex flex-column-reverse answers-column" style="padding-bottom:17px;"></div>`;
                        fragment.appendChild(testDiv);
                        const answersColumn = testDiv.querySelector(`#answers-column-${i}`);
                        const answerFragment = document.createDocumentFragment();
                        soal.forEach((num, index) => {
                            if (index >= i * max_baris - max_baris && index < i * max_baris) {
                                const answerDiv = document.createElement("div");
                                if ((index + 1) % max_baris != 0) {
                                    if (index_benar.includes(index.toString())) {
                                        answerDiv.innerHTML = `<div id="${index}" style="height:20px;width:20px;border-style:solid;border-width:thin;"  class="bg-lime"></div>`;
                                    } else if (index_salah.includes(index.toString())) {
                                        answerDiv.innerHTML = `<div id="${index}" style="height:20px;width:20px;border-style:solid;border-width:thin;"  class="bg-red"></div>`;
                                    } else {
                                        answerDiv.innerHTML = `<div id="${index}" style="height:20px;width:20px;border-style:solid;border-width:thin;"  class="bg-silver"></div>`;
                                    }
                                    answerFragment.appendChild(answerDiv);
                                }
                            }
                        });
                        answersColumn.appendChild(answerFragment);
                    }
                    testArea.appendChild(fragment);
                },
            });
        });
    </script>
</body>

</html>