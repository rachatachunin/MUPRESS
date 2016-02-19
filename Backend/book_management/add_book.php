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

$serial_no 	= $_POST['serial_no'];
$title 		= $_POST['title'];
$edition 	= $_POST['edition'];
$author 	= $_POST['author'];
$price 		= $_POST['price'];


unset($_POST['serial_no']);
unset($_POST['title']);
unset($_POST['edition']);
unset($_POST['author']);
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
	$priority = 1;
	foreach( $author as $key => $n ) {
		$sqlbook = "INSERT INTO book_author2 (book_serial_no,author_name,priority)
				VALUES ('$serial_no','$n','$priority')";
		if (mysqli_query($con, $sqlbook)) {
		    echo "New book_author created successfully";
		} else {
		    echo "Error: " . $sqlbook . "<br>" . mysqli_error($con);
		}
		$priority++;
	}

  	$sql = "INSERT INTO book (serial_no, title,edition,price,image)
	VALUES ('$serial_no', '$title','$edition','$price','$file_path')";

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