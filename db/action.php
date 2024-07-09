<?php
include 'connect.php';

$nama = $_POST['nama'];
$divisi = $_POST['divisi'];
$soal = $_POST['soal'];
$baris = $_POST['baris'];
$kolom = $_POST['kolom'];
$waktu = $_POST['waktukerja'];
$total_benar = $_POST['total_benar'];
$total_salah = $_POST['total_salah'];
$total_hapus = $_POST['total_hapus'];
$index_salah = $_POST['index_salah'];
$index_benar = $_POST['index_benar'];
$total_isi = $_POST['total_isi'];
mysqli_query($konek, "insert into tbl_user(nama, divisi)
        values ('$nama','$divisi')") or die(mysql_error());
$id_user = mysqli_insert_id($konek);
mysqli_query($konek, "insert into tbl_soal(id_user, soal, baris, kolom, waktu)
        values ('$id_user','$soal','$baris','$kolom','$waktu')") or die(mysql_error());
mysqli_query($konek, "insert into tbl_jawaban(id_user, benar, salah, hapus, isi)
        values ('$id_user','$total_benar','$total_salah','$total_hapus', '$total_isi')") or die(mysql_error());
mysqli_query($konek, "insert into tbl_detailjawaban(id_user, benar, salah)
        values ('$id_user','$index_benar','$index_salah')") or die(mysql_error());
header('location:index.php');
