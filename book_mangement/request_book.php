<?php

$db_cont = "../dbconnection.php";

if(!@file_exists("./".$db_cont) ) {
    echo 'can not include db_cont.php';
} else {
   require("./".$db_cont);
}

$serial_no 	= $_GET['serial_no'];
unset($_GET['serial_no']);

$sql = "SELECT * FROM book WHERE serial_no = '$serial_no'";

$result = mysqli_query($con,$sql);
$data = array();
while($r = mysqli_fetch_assoc($result)) {
    $data[] = $r;
}
mysqli_close($con);
//print_r($data);

echo json_encode($data);
?>