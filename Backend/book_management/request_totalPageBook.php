<?php
ob_start();
session_start();

$db_cont = "../../dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
	echo 'can not include db_cont.php';
} else {
	require("./".$db_cont);
}
$rowsPerpage	= $_GET['rowsPerpage'];
$searchBy		= $_GET['searchBy'];
$keyword		= $_GET['keyword'];

unset($_GET['rowsPerpage']);
unset($_GET['searchBy']);
unset($_GET['keyword']);

$sql = "";

if($searchBy != "" && $keyword != ""){
	$sql = "SELECT COUNT(book_id) as totalBook FROM book
	WHERE $searchBy LIKE '%$keyword%' ";
}
else{
	$sql = "SELECT COUNT(book_id) as totalBook FROM book";
}


$result = mysqli_query($con,$sql);

$data = array();

    // output data of each row
while($r = mysqli_fetch_assoc($result)) {
	$data[] = $r;
}

mysqli_close($con);
$totalPage = ceil($data[0]['totalBook']/$rowsPerpage);

echo ($totalPage);
?>