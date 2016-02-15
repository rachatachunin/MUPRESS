<?php
ob_start();
session_start();
$headTo = "book_management.php";
$db_cont = "../../dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);
}

$email 		= $_POST['email'];
$user_fn 	= $_POST['firstname'];
$user_ln 	= $_POST['lastname'];
$gender 	= $_POST['gender'];
$tel 		= $_POST['phone'];
$address 	= $_POST['address'];

unset( $_POST['email']);
unset($_POST['firstname']);
unset($_POST['lastname']);
unset($_POST['gender']);
unset($_POST['phone']);
unset($_POST['address']);

$sql = "";

  	$sql = "INSERT INTO user (email, user_fn, user_ln,gender,tel,address,user_type)
	VALUES ('$email', '$user_fn', '$user_ln','$gender','$tel','$address','3')";

	if (mysqli_query($con, $sql)) {
	    echo "New author created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	mysqli_close($con);


header("Location: $headTo");
?>