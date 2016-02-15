<?php
ob_start();
session_start();
$headTo = "content_management.php";
$db_cont = "../../dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);
}

$news_id 	= $_GET['news_id'];
unset($_GET['news_id']);

$sql = "DELETE FROM news WHERE news_id = '$news_id'";
if (mysqli_query($con, $sql)) {
    echo "The news is deleted completely";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);

header("Location: $headTo");

?>