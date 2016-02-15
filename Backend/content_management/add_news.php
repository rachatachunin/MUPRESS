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

$news_name = $_POST['news_name'];
$news_detail = $_POST['news_detail'];

unset($_POST['news_name']);
unset($_POST['news_detail']);

$file_path = "news_image/";

$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
$file_path   = $file_path.$newfilename;

if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_path)){
	$sql = "INSERT INTO news (news_name, news_detail,image)
	VALUES ('$news_name', '$news_detail','$file_path')";

	if (mysqli_query($con, $sql)) {
		echo "New news created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	mysqli_close($con);
}
else{
    echo "move news image fail";
}

header("Location: $headTo");

?>