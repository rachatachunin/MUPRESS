<?php
$headTo = "content_management.php";
$db_cont = "../../dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);
}

$promotion_id 	= $_GET['promotion_id'];
unset($_GET['serial_no']);

$sql = "DELETE FROM promotion WHERE promotion_id = '$promotion_id'";
if (mysqli_query($con, $sql)) {
    echo "New book created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);


header("Location: $headTo");

?>