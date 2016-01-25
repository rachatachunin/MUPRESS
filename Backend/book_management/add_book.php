<?php
$headTo = "book_management.html";
$db_cont = "../../dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);
}
$serial_no 	= $_POST['serial_no'];
$title 		= $_POST['title'];
$edition 	= $_POST['edition'];
$author 	= $_POST['author'];
$price 		= $_POST['price'];
$detail 	= $_POST['book_detail'];
$image 		= $_POST['file'];

/*echo "Serial_no : ".$_POST['serial_no'];
	echo " /Title : ".$_POST['title'];
	echo " /Edition : ".$_POST['edition'];
	echo " /Author : ".$_POST['author'];
	echo " /Price : ".$_POST['price'];
	echo " /Detail : ".$_POST['book_detail'];
	echo " /Picture : ".$_POST['file'];*/


unset($_POST['serial_no']);
unset($_POST['title']);
unset($_POST['edition']);
unset($_POST['author']);
unset($_POST['price']);
unset($_POST['book_detail']);
unset($_POST['file']);


$sql = "INSERT INTO book (serial_no, title, author,edition,price,image)
VALUES ('$serial_no', '$title', '$author','$edition','$price','$image')";

if (mysqli_query($con, $sql)) {
    echo "New book created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);


header("Location: $headTo");
?>