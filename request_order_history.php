<?php
ob_start();
session_start();

$db_cont = "dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
	echo 'can not include db_cont.php';
} else {
	require("./".$db_cont);
}
$page	    = $_GET['page'];
$rowsPerpage	= $_GET['rowsPerpage'];
$startFrom  = ($page-1)*$rowsPerpage;
$user_id    = $_SESSION['user_id'];

unset($_GET['page']);
unset($_GET['rowsPerpage']);


$sql = "";
$sql = "SELECT * FROM order_book WHERE user_id = '$user_id' ORDER BY created_date DESC LIMIT $startFrom,$rowsPerpage";

$result = mysqli_query($con,$sql);

$data = array();

    // output data of each row
while($r = mysqli_fetch_assoc($result)) {
	$data[] = $r;
}

mysqli_close($con);

echo json_encode($data);
?>