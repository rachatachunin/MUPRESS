<?php
ob_start();
session_start();

$db_cont = "dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
	echo 'can not include db_cont.php';
} else {
	require("./".$db_cont);
}
$page	    	= $_GET['page'];
$rowsPerpage	= $_GET['rowsPerpage'];
$user_id    	= $_SESSION['user_id'];

unset($_GET['page']);
unset($_GET['rowsPerpage']);

$sql = "";


//if($searchBy == "none" || $searchBy == "all"){
$sql = "SELECT COUNT(order_id) as totalOrder FROM order_book WHERE user_id = '$user_id' ";
//}

$result = mysqli_query($con,$sql);

$data = array();

    // output data of each row
while($r = mysqli_fetch_assoc($result)) {
	$data[] = $r;
}

mysqli_close($con);
$totalPage = ceil($data[0]['totalOrder']/$rowsPerpage);

echo ($totalPage);
?>