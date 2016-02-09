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
$activities_id		= $_POST['activities_id'];
$activities_name 	= $_POST['activitiesName'];
$startDate 			= $_POST['startDate'];
$endDate			= $_POST['endDate'];
$activities_detail	= $_POST['activitiesDetail'];

unset($_POST['activities_id']);
unset($_POST['activitiesName']);
unset($_POST['startDate']);
unset($_POST['endDate']);
unset($_POST['activitiesDetail']);


$sql ="UPDATE activities SET activities_name='$activities_name', startDate='$startDate', endDate='$endDate', activities_detail='$activities_detail' WHERE activities_id = '$activities_id'";

if (mysqli_query($con, $sql)) {
    echo "The news is edited successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);


header("Location: $headTo");
?>