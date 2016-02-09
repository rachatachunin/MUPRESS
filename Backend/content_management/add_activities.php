<?php
ob_start();
session_start();
$headTo = "content_management.php";
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

$file_path = "activities_image/";

$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
$file_path   = $file_path.$newfilename;
if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_path)){
	$sql = "INSERT INTO activities (activities_name, startDate, endDate,activities_detail,image)
	VALUES ('$activities_name', '$startDate', '$endDate','$activities_detail','$file_path')";

	if (mysqli_query($con, $sql)) {
		echo "New news and activities created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	mysqli_close($con);
}
else{
    echo "move activities image fail";
}

header("Location: $headTo");

?>