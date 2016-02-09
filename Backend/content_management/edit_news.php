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

$news_id  			= $_POST['news_id'];
$news_name			= $_POST['news_name'];
$news_detail 		= $_POST['news_detail'];

unset($_POST['news_id']);
unset($_POST['news_name']);
unset($_POST['news_detail']);

$sql ="UPDATE news SET news_name='$news_name', news_detail='$news_detail' 
		WHERE news_id = '$news_id'";

if (mysqli_query($con, $sql)) {
    echo "The news is edited successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);

header("Location: $headTo");
?>