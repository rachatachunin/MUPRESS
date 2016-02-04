<?php
ob_start();
session_start();
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
$author_id 	= $_POST['author_id'];
$price 		= $_POST['price'];

unset($_POST['serial_no']);
unset($_POST['title']);
unset($_POST['edition']);
unset($_POST['author']);
unset($_POST['author_id']);
unset($_POST['price']);


$file_path = "book_image/".$serial_no."/";

if (file_exists($file_path)) {
    echo "The file uploads exists";
} else {
    echo "The file uploadd does not exist";
    mkdir($file_path);
}


$file_path = $file_path . basename( $_FILES['fileToUpload']['name']);


if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_path)) {

  	$sql = "INSERT INTO book (serial_no, title, author_id,edition,price,image,author)
	VALUES ('$serial_no', '$title', '$author_id','$edition','$price','$file_path','$author')";

	if (mysqli_query($con, $sql)) {
	    echo "New book created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	mysqli_close($con);

}
else{
    echo "fail";
}


header("Location: $headTo");
?>
