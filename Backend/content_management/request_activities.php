<?php
ob_start();
session_start();
$db_cont = "../../dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);
}

$activities_id 	= $_GET['activities_id'];
unset($_GET['activities_id']);

$sql = "SELECT * FROM activities WHERE activities_id = '$activities_id'";

$result = mysqli_query($con,$sql);
$data = array();
while($r = mysqli_fetch_assoc($result)) {
    $data[] = $r;
}
mysqli_close($con);
//print_r($data);

echo json_encode($data);
?>