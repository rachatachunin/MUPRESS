<?php
ob_start();
session_start();

$headTo = "index.php";
$db_cont = "dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);

}

$email		= $_POST['email'];
$user_fn	= $_POST['fname'];
$user_ln 	= $_POST['lname'];
$tel 		= $_POST['tel'];
$gender 	= $_POST['gender'];
$address	= $_POST['address'];



unset($_POST['user_fn']);
unset($_POST['user_ln']);
unset($_POST['tel']);
unset($_POST['gender']);
unset($_POST['address']);


$sql ="UPDATE user SET user_fn='$user_fn', user_ln='$user_ln', 
		tel='$tel',gender='$gender',address='$address'
		WHERE email = '$email'";

if (mysqli_query($con, $sql)) {
    echo "ประวัติของผู้ใช้ถูกแก้ไขเรียบร้อย";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);


header("Location: $headTo");

?>