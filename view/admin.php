<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Test Kraepelin</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="../css/styles3.css" />
</head>

<body>
    <div class="container mt-4">
        <div class="card text-center">
            <div class="card-header" style="background-color: #C0C0C0;">
                <h1>Test Kraepelin</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive overflow-hidden">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Divisi</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody> <!-- List Data Menggunakan DataTable --> </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mdlDetail" tabindex="-1" role="dialog" aria-labelledby="mdlDetailLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdlDetailLabel">Detail Hasil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <canvas id="chart-hasil" class="justify-content-center"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mdlIndex" tabindex="-1" role="dialog" aria-labelledby="mdlIndexLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdlIndexLabel">Detail Hasil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <canvas id="chart-index" class="justify-content-center"></canvas>
                </div>
            </div>
        </div>
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
        $(function() {
            $('.table').DataTable({
                "processing": true,
                "serverSide": true,
                "searching": false,
                "info": false,
                "ordering": false,
                "paging": false,
                "ajax": {
                    "url": "../db/ajax_crud.php?action=table_data",
                    "dataType": "json",
                    "type": "POST"
                },
                "columns": [{
                    "data": "no"
                }, {
                    "data": "nama"
                }, {
                    "data": "divisi"
                }, {
                    "data": "waktu"
                }, {
                    "data": "aksi"
                }, ]
            });
        });
    </script>
</body>

</html>