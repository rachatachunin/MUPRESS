<?php
$headTo = "content_management.html";
$db_cont = "../../dbconnection.php";
if(!@file_exists("./".$db_cont) ) {
	echo 'can not include db_cont.php';
} else {
	require("./".$db_cont);
}

$activities_name = $_POST['activitiesName'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$activities_detail = $_POST['activitiesDetail'];

unset($_POST['activitiesName']);
unset($_POST['startDate']);
unset($_POST['endDate']);
unset($_POST['activitiesDetail']);


$sql = "INSERT INTO news_activities (activities_name, startDate, endDate,activities_detail)
VALUES ('$activities_name', '$startDate', '$endDate','$activities_detail')";

if (mysqli_query($con, $sql)) {
	echo "New news and activities created successfully";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
header("Location: $headTo");

?>