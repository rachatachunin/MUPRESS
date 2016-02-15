<?php
  include "../../dbconnection.php" ;
  $userID = $_GET['ID'];
  $book_id = $_GET['BOOK'];

    $sql = "INSERT INTO book_author (book_id,user_id) values('".$book_id."','".$userID."')";

    mysqli_query($con,$sql);
    header("Location: accountManagement.php");
?>
