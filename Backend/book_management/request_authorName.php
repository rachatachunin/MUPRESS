<?php
ob_start();
session_start();

$db_cont = "../../dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);
}

$sql = "";
$sql = "SELECT user_id,user_fn,user_ln FROM user WHERE user_type = 3";
$result = mysqli_query($con,$sql);
$data = array();

    // output data of each row
while($r = mysqli_fetch_assoc($result)) {
    $data[] = $r;
}


mysqli_close($con);
//print_r($data);

echo json_encode($data);



?>