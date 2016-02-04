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
$rowsPerpage	= $_GET['numPerpage'];

unset($_GET['page']);
unset($_GET['numPerpage']);

$sql = "";


//if($searchBy == "none" || $searchBy == "all"){
$sql = "SELECT COUNT(book_id) as totalOrder FROM book ";
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
