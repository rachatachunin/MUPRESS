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




//////////////////// no image updated ////////////////////
if($_FILES['fileToUpload']['name'] == ""){  
	$priority = 1;
	foreach( $author as $key => $n ) {
		$sqlbook = "UPDATE book_author2 SET author_name='$n',priority='$priority' 
			WHERE book_author2_id = '$key' ";
		if (mysqli_query($con, $sqlbook)) {
		    echo "New book_author created successfully";
		} else {
		    echo "Error: " . $sqlbook . "<br>" . mysqli_error($con);
		}
		$priority++;
	}

	$sql ="UPDATE book SET title='$title', edition='$edition', price='$price' 
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
		$sql ="UPDATE book SET title='$title', edition='$edition', price='$price',image='$file_path' 
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