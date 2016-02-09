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
$author_id 	= $_POST['author_id'];
$price 		= $_POST['price'];

unset($_POST['serial_no']);
unset($_POST['title']);
unset($_POST['edition']);
unset($_POST['author']);
unset($_POST['author_id']);
unset($_POST['price']);

//////////////////// no image updated ////////////////////
if($_FILES['fileToUpload']['name'] == ""){  
	$sql ="UPDATE book SET title='$title',author_id='$author_id' ,author='$author', edition='$edition', price='$price' 
			WHERE serial_no = '$serial_no'";
}
///////////////// New image to updated ////////////////////
else{

	$file_path = "book_image/".$serial_no."/";
	if (file_exists($file_path)) {
	    echo "The file uploads exists";
	} else {
	    echo "The file uploadd does not exist";
	    mkdir($file_path);
	}
	$file_path = $file_path . basename( $_FILES['fileToUpload']['name']);
	
	if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $file_path)) {
		$sql ="UPDATE book SET title='$title',author_id='$author_id' ,author='$author', edition='$edition', price='$price',image='$file_path' 
				WHERE serial_no = '$serial_no'";
	}
	else{
	 echo "fail to move file";
	}

}

if (mysqli_query($con, $sql)) {
		    echo "The book is edited successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
		mysqli_close($con);


header("Location: $headTo");
?>