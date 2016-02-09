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

$serialno 	= $_GET['serial_no'];
unset($_GET['serial_no']);

$dir = 'book_image' . DIRECTORY_SEPARATOR . $serialno;

if (file_exists($dir)) {
    echo "The folder to deleted exists";
} else {
    echo "The folder to deleted does not exist";
    mkdir($dir);
}

$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
$files = new RecursiveIteratorIterator($it,
             RecursiveIteratorIterator::CHILD_FIRST);
foreach($files as $file) {
    if ($file->isDir()){
        rmdir($file->getRealPath());
    } else {
        unlink($file->getRealPath());
    }
}
rmdir($dir);


	$sql = "DELETE FROM book WHERE serial_no = '$serialno'";
	if (mysqli_query($con, $sql)) {
	    echo "The book was deleted";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}




mysqli_close($con);


header("Location: $headTo");


?>