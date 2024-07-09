<?php
include 'connect.php';
$id_user = $_GET['id_user'];
$hasil = mysqli_query($konek, "select * from tbl_jawaban where id_user='$id_user'") or die(mysql_error());
$baris  = mysqli_fetch_array($hasil);
echo json_encode($baris);
