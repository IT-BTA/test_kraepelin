<?php
include 'connect.php';
if ($_GET['action'] == "table_data") {
    $data = array();
    $sql = "select tbl_user.id, nama, divisi, DATE_FORMAT(tbl_user.waktu, '%d-%b-%Y %H:%i') AS waktu FROM tbl_user JOIN tbl_jawaban ON tbl_jawaban.id_user = tbl_user.id JOIN tbl_detailjawaban ON tbl_detailjawaban.id_user = tbl_user.id JOIN tbl_soal ON tbl_soal.id_user = tbL_user.id ORDER BY tbl_user.waktu DESC";
    $sql2 = mysqli_query($konek, $sql) or die(mysql_error());
    $no = 1;
    while ($r = mysqli_fetch_array($sql2)) {
        $nestedData['no'] = $no;
        $nestedData['nama'] = $r['nama'];
        $nestedData['divisi'] = $r['divisi'];
        $nestedData['waktu'] = $r['waktu'];
        $nestedData['aksi'] = "<button type='button' class='btn btn-primary btn-sm mr-1' onClick='lihat_detail(" . $r['id'] . ")'><i class='fa fa-area-chart' aria-hidden='true'></i></button> <button type='button' class='btn btn-info btn-sm' onClick='lihat_index(" . $r['id'] . ")'><i class='fa fa-line-chart' aria-hidden='true'></i></button> <a href='hasil.php?id_user=" . $r['id'] . "' type='button' class='btn btn-success btn-sm'><i class='fa fa-th' aria-hidden='true'></i></a>";
        $data[] = $nestedData;
        $no++;
    }
    $json_data = array("draw" => 1, "data" => $data);
    echo json_encode($json_data);
}
