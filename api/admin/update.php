<?php
    include('../access_db.php');
    connect_db();
    function clean($value){
        global $conn;
        return mysqli_real_escape_string($conn,$value);
    }
    $user = clean($_GET['username']);
    $pass = clean($_GET['password']);
    // $user = clean($_POST['username']);
    // $pass = clean($_POST['password']);
    $hash = password_hash($pass, PASSWORD_BCRYPT, ['salt' =>'adjsbfhjgaeswfgfdswabgiku']);
    $sql = "UPDATE `admin` SET password='".$hash."' WHERE username = '".$user."'" ;
    $result     = array();
    $data       = mysqli_query($conn, $sql);
    if ($data){
        $result["Transaction"]=1;
    } else {
        $result["Transaction"]=0;
    }
    echo json_encode($result);
?>  