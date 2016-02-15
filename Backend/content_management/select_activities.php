<?php
ob_start();
session_start();

$db_cont = "../../dbconnection.php";
if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);
}
$page = $_GET['page'];
$rowsPerpage	= $_GET['rowsPerpage'];
$startFrom  = ($page-1)*$rowsPerpage;
unset($_GET['rowsPerpage']);
unset($_GET['page']);


$sql = "";


$sql = "SELECT * FROM activities 
ORDER BY activities_id ASC
LIMIT $startFrom,$rowsPerpage";




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