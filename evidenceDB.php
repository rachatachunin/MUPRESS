<?php
ob_start();
session_start();
$order = $_POST['orderid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
// $date = $_POST['date'];
$time = $_POST['time'];
$bank = $_POST['bank'];
$amount = $_POST['amount'];
$address = $_POST['address'];
$date=date("Y-m-d",strtotime($_POST['date']));


include "dbconnection.php";
include "headFrontEnd.php";

$file_path = "evidence_image/".$order."/";

if (file_exists($file_path)) {
    //echo "The file uploads exists";
} else {
    echo "The file uploadd does not exist";
    mkdir($file_path);
}

$file_path = $file_path . basename( $_FILES['fileToUpload']['name']);

if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_path)) {
  $sql="INSERT into payment_evidence(bank,price,image,order_id,fname,lname,pay_date,pay_time,address) values
  ('".$bank."','".$amount."','".$file_path."','".$order."','".$fname."','".$lname."','".$date."','".$time."','".$address."')";
  if (mysqli_query($con, $sql)) {
	    //echo "New book created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	mysqli_close($con);

}

$_SESSION['success'] = 1;
header("Location: index.php");


?>
