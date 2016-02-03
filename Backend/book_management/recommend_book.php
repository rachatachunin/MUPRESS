<?php
ob_start();
$headTo = "book_management.html";
$db_cont = "../../dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);
}

$serialno 	= $_GET['serial_no'];
unset($_GET['serial_no']);


$sql = "UPDATE book SET recommend = NOT recommend WHERE serial_no = '$serialno'";
if (mysqli_query($con, $sql)) {
    echo "New book created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);


header("Location: $headTo");

?>