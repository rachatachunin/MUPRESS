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
$URL			= $_GET['URL'];


unset($_GET['rowsPerpage']);
unset($_GET['URL']);


$sql = "";


if($URL == "select_promotion.php")
	$sql = "SELECT COUNT(promotion_id) as totalrow FROM promotion";
if($URL == "select_news.php")
	$sql = "SELECT COUNT(news_id) as totalrow FROM news";
if($URL == "select_activities.php")
	$sql = "SELECT COUNT(activities_id) as totalrow FROM activities";



$result = mysqli_query($con,$sql);

$data = array();

    // output data of each row
while($r = mysqli_fetch_assoc($result)) {
	$data[] = $r;
}

mysqli_close($con);
$totalPage = ceil($data[0]['totalrow']/$rowsPerpage);

echo ($totalPage);
?>