<?
ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="content-Type" content="text/html; charset=utf-8" />
 <meta name="keywords" content="Luxury Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <?php
        include "headFrontEnd.php";
    ?>
 <style>
 .gmap-area {
  background-image: url("image/map.jpg");
  background-position: 0 0;
  background-repeat: no-repeat;
  background-size: cover;
  padding: 70px 0;
  height: 500px;
}
 </style>

    <script>$(document).ready(function(){$(".memenu").memenu();});</script>

    <title>MU PRESS</title>
</head>
<body>
  <?php
      include "header.php";
  ?>

  <!--start-breadcrumbs-->
<div class="breadcrumbs">
  <div class="container">
    <div class="breadcrumbs-main">
      <ol class="breadcrumb">
        <li><a href="index.php">หน้าแรก</a></li>
        <li class="active">ติดต่อเรา</li>
      </ol>
    </div>
  </div>
</div>
<!--end-breadcrumbs-->
<br><br>
<!-- contact start -->
<div class="container">
  <div class="contact-top heading">
				<h2>ติดต่อเรา</h2>
  </div><br><br>
  <div class="gmap-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <p>สำนักพิมพ์มหาวิทยาลัยมหิดล </p>
          อาคาร หอสมุดและคลังความรู้มหาวิทยาลัยมหิดล ชั้น 2<br>
          25/25 ถ.พุทธมณฑลสาย 4 ต.ศาลายา อ.พุทธมณฑล นครปฐม 73170<br>
          โทร. 0-2800-2680-9 ต่อ 4302<br>
          โทรสาร 0-2441-9580<br>
          e-mail : mupress@mahidol.ac.th
        </div>
      </div>

    </div>


  </div>
</div>
<!-- contact end -->


<!--footer-starts-->
<?php include "footer.php" ; ?>
	<!--footer-end-->


</body>
</html>
