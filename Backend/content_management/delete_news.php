<?php
$headTo = "content_management.html";
$db_cont = "../../dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);
}

$activities_id 	= $_GET['news_id'];
unset($_GET['news_id']);

$sql = "DELETE FROM news_activities WHERE activities_id = '$activities_id'";
if (mysqli_query($con, $sql)) {
    echo "The activity is deleted completely";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);


header("Location: $headTo");

?>