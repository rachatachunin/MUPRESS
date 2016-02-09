<?php
ob_start();
session_start();

$headTo = "content_management.php";
$db_cont = "../../dbconnection.php";
if(!@file_exists("./".$db_cont) ) {
	echo 'can not include db_cont.php in add promotion';
} else {
	require("./".$db_cont);
}

$promotion_name = $_POST['promotionName'];
$book_serial_no = $_POST['book_serial_no'];
$discount = $_POST['discount'];
$promotion_detail = $_POST['promotion_detail'];

unset($_POST['promotionName']);
unset($_POST['book_serial_no']);
unset($_POST['discount']);
unset($_POST['promotion_detail']);

$file_path = "promotion_image/";

$temp = explode(".", $_FILES["fileToUpload"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
$file_path   = $file_path.$newfilename;

if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_path)){
	$sql = "INSERT INTO promotion (promotion_name, book_serial_no, discount,promotion_detail,image)
	VALUES ('$promotion_name', '$book_serial_no', '$discount','$promotion_detail','$file_path')";

}
else{
    $sql = "INSERT INTO promotion (promotion_name, book_serial_no, discount,promotion_detail)
	VALUES ('$promotion_name', '$book_serial_no', '$discount','$promotion_detail')";
}


if (mysqli_query($con, $sql)) {
		echo "New promotion created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	mysqli_close($con);

header("Location: $headTo");

?>