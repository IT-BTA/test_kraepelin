<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Test Kraepelin</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <div class="container mt-5">
    <div class="card text-center">
      <div class="card-header">
        <h1>Test Kraepelin</h1>
      </div>
      <div class="card-body">
        <div id="tutorial">
          <ul class="text-left">
            <ol>1. Isi Nama dan Divisi Sebelum Memulai Test</ol>
            <ol>2. Isi Kolom Angka Yang Disediakan Diantara Angka</ol>
            <ol>3. Jika Jawaban Dua Angka Dituliskan Satuannya Saja</ol>
            <ol>4. Baris Akan Berganti Sesuai Waktu Yang Ditentukan</ol>
            <ol>5. Hasil Akan Otomatis Terkirim</ol>
          </ul>
        </div>
        <form action="action.php" id="form-test" method="POST">
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
          <div id="input-data" class="row justify-content-center">
            <input type="text" id="tbxNama" name="nama" class="form-control text-center mb-2 mr-4 col-5" placeholder="Masukkan Nama">
            <input type="text" id="tbxDivisi" name="divisi" class="form-control text-center mb-2 col-5" placeholder="Masukkan Divisi">
          </div>
          <button type="button" id="btn-start" class="btn btn-primary mb-3" onclick="startTest()">
            Mulai Tes
          </button>
          <p id="timer" class="mt-3">Waktu: 0</p>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="script5.js"></script>
</body>

</html>