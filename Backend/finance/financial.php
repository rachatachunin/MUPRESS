<!DOCTYPE html>
<html>
<head>
    <title>Financial management</title>
    <?php
        include "../../head.php";
    ?>
    <style type="text/css">
        .borderless tbody tr td, .borderless tbody tr th, .borderless thead tr th {
            border: none;
        }
    </style>
</head>
<?php
    include "../../dbconnection.php";

    $allhis = mysqli_query($con,"select * from sale_history where created_date >= CURDATE() AND created_date < CURDATE() + INTERVAL 1 DAY");

?>
<body>
<?php include "../header.php" ?>
<div class="container-fluid" id="navv" style="text-align: center;">
    <h2 class="lead">Financial Management</h2>
</div>

<div class="container" id="nav-bar" style="text-align: center;">
  <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="financial.php">รายงานของวันนี้</a></li>
      <li role="presentation"><a href="financehis.php">รายงานย้อยหลัง</a></li>
      <li role="presentation"><a href="financeadd.php">เพิ่มรายการขายจากช่องทางอื่น</a></li>
  </ul>
</div>

<div class="container-fluid" style="text-align: center;">
    <h3 class="lead">รายงานการขายของวันนี้</h3>
    <table class="table borderless">
<!--        --><?php
//            while($his = mysqli_fetch_array($allhis)){
//                echo '<tr>';
//                    echo '<td></td>'
//                echo '</tr>';
//            }
//        ?>
    </table>
</div>


</body>
</html>
