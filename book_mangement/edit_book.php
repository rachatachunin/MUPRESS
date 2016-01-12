<?php
$headTo = "book_management.html";
$db_cont = "../dbconnection.php";

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



unset($_POST['serial_no']);
unset($_POST['title']);
unset($_POST['edition']);
unset($_POST['author']);
unset($_POST['price']);
unset($_POST['book_detail']);
unset($_POST['file']);


$sql ="UPDATE book SET title='$title', author='$author', edition='$edition', price='$price',image='$image' 
		WHERE serial_no = '$serial_no'";

if (mysqli_query($con, $sql)) {
    echo "The book is edited successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);


header("Location: $headTo");
?>