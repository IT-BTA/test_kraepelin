<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Test Kraepelin</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css" integrity="sha512-csw0Ma4oXCAgd/d4nTcpoEoz4nYvvnk21a8VA2h2dzhPAvjbUIK6V3si7/g/HehwdunqqW18RwCJKpD7rL67Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/styles3.css" />
</head>

<body>
  <div id="container-landing" class="container-fluid h-100" style="position: fixed; top:20%;">
    <div class="card text-center shadow-lg">
      <div class="card-header" style="background-color: #007bff; color:white;">
        <h1><b>Test Kraepelin</b></h1>
      </div>
      <div class="card-body">
        <div id="tutorial">
          <ul class="text-left p-0">
            <ol>1. Isi Nama dan Divisi Sebelum Memulai Test</ol>
            <ol>2. Isi Kolom Angka Yang Disediakan</ol>
            <ol>3. Isiannya adalah hasil penjumlahan angka bawah dan atasnya</ol>
            <ol>4. Jawaban Dua Angka Dituliskan Satuannya Saja (Contoh : 15 diisi 5)</ol>
            <ol>5. Baris Akan Berganti Sesuai Waktu Yang Ditentukan</ol>
            <ol>6. Hasil Akan Otomatis Terkirim</ol>
          </ul>
        </div>
        <div id="input-data" class="row justify-content-center">
          <input type="text" id="tbxNama" name="nama" class="form-control text-center mb-2 mr-3 col-5" placeholder="Masukkan Nama">
          <input type="text" id="tbxDivisi" name="divisi" class="form-control text-center mb-2 col-5" placeholder="Masukkan Divisi">
        </div>
        <div class="px-4">
          <button type="button" id="btn-start" class="btn btn-primary my-3 w-100 hvr-grow shadow" onclick="startTest()">
            Mulai Tes
          </button>
        </div>
      </div>
    </div>
    <!-- <div style="position:fixed;text-align:end;" class="w-100">
      <img src="./assets/bg.png" alt="bg.png" height="auto" width="auto">
    </div> -->
  </div>
  <div id="container-test" class="container-fluid my-5">
    <div class="card text-center shadow-lg">
      <div class="card-header" style="background-color: #007bff; color:white;">
        <h1><b>Test Kraepelin</b></h1>
      </div>
      <div class="card-body">
        <form action="db/action.php" id="form-test" method="POST">
          <input type="hidden" name="score">
          <input type="hidden" name="soal">
          <input type="hidden" name="baris">
          <input type="hidden" name="kolom">
          <input type="hidden" name="waktukerja">
          <input type="hidden" name="total_salah">
          <input type="hidden" name="total_benar">
          <input type="hidden" name="total_hapus">
          <input type="hidden" name="index_salah">
          <input type="hidden" name="index_benar">
          <input type="hidden" name="total_isi">
          <div id="test-area" class="d-flex justify-content-center">
            <!-- Angka akan dimasukkan di sini oleh JavaScript -->
          </div>
          <p id="timer" class="mt-3">Waktu: 0</p>
        </form>
      </div>
    </div>
  </div>
  <!--  <div style="position: fixed;top:2%;right:1%;">
    <div class="card">
      <div class="card-body"></div>
    </div>
  </div> -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/script7.js"></script>
</body>

</html>