<?php
$host = "localhost";
$db = "db_kraepelin";
$user = "root";
$pass = "";
// isi nama host, username mysql, dan password mysql anda
$konek = mysqli_connect($host, $user, $pass);
if ($konek) {
    $coba = mysqli_select_db($konek, $db);
    if ($coba) {
        echo "";
    } else {
        echo mysql_error();
    }
}
// isikan dengan nama database yang akan di hubungkan
