<?php
    include('../access_db.php');
    connect_db();
    function clean($value){
        global $conn;
        return mysqli_real_escape_string($conn,$value);
    }
    $nama       = $_GET['search'];
    $select     = "SELECT peminjam,id FROM `transaksi` WHERE peminjam LIKE '%".$nama."%' AND tanggalkembali is NULL ";
    $result     = array();
    $data       = mysqli_query($conn, $select);
    $hasil      = array();
    while($row = mysqli_fetch_assoc($data)) {
        $hasil[] = $row;
    }
    $result['hasil']=$hasil;
    echo json_encode($result);
?>