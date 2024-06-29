<?php
include 'connect.php';
$id_user = $_GET['id_user'];
$hasil = mysqli_query($konek, "select soal, baris, kolom, tbl_soal.waktu, tbl_detailjawaban.benar as total_benar, tbl_detailjawaban.salah as total_salah, isi from tbl_soal JOIN tbl_detailjawaban ON tbl_detailjawaban.id_user = tbl_soal.id_user JOIN tbl_jawaban on tbl_jawaban.id_user = tbl_soal.id_user where tbl_soal.id_user='$id_user'") or die(mysql_error());
$baris  = mysqli_fetch_array($hasil);
echo json_encode($baris);
