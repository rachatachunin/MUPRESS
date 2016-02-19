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
        include "dbconnection.php";
        // get new book promotion
        $sqlNew = "SELECT b.title,p.promotion_name,p.promotion_detail, p.book_serial_no,p.discount,b.image FROM promotion as p
        LEFT JOIN book as b ON p.book_serial_no = b.serial_no WHERE p.discount = 30 ORDER BY p.promotion_id DESC ";
        $resultNew = mysqli_query($con,$sqlNew);

        // get old book promotion
        $sql = "SELECT b.title,p.promotion_name,p.promotion_detail, p.book_serial_no,p.discount,b.image FROM promotion as p
        LEFT JOIN book as b ON p.book_serial_no = b.serial_no WHERE p.discount > 30 ORDER BY p.promotion_id DESC ";
        $result = mysqli_query($con,$sql);

    ?>
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
          <li class="active">โปรโมชั่น</li>
        </ol>
      </div>
    </div>
  </div>
  <!--end-breadcrumbs-->
  <br><br>

  <!-- start promotion -->
  <div class="contact-top heading">
				<h2>โปรโมชั่น</h2>
  </div><br>
  <div class="container" style="height: 250px; ">
    <div class="col-md-12 ">
      <div class="col-md-5 col-off-set-1 text-center" >
        <img src="image/dump.png" alt="author"class="img-rounded" style="width:350px; height:240px;" />
      </div>
      <div class="col-md-7 text-center">
        <h3>สำหรับผู้ที่เขียนหนังสือกับทางเรา</h3>
        <p>
          รับส่วนลดทันที 30% ที่สั่งซื้อหนังสือที่ตนเองเป็นผู้เขียน
        </p>
        สนใจตีพิมพ์หนังสือ ติดต่อ โทร. 0-2800-2680-9 ต่อ 4302 หรือ <br>e-mail : mupress@mahidol.ac.th
      </div>
    </div>

  </div><br><br>
  <!-- end news -->

  <!-- start promotion old book list  -->
  <div class="contact-top heading">
        <h3>รายการโปรโมชั่น ลด 40 - 50 %</h3>
  </div><br>
  <div class="container">
    <div style = "max-height: 1100px;  overflow: auto ;">
    <ul class="list-group">
      <?php
      while($row1 = mysqli_fetch_array($result)){
       echo '<li class = "list-group-item" style="height:250px;"><div class="col-xs-12">' ;
       echo '<div class="col-xs-4 text-center"><img src="/MUPRESS_GIT/Backend/book_management/'.$row1['image'].'" onError="this.onerror=null;this.src=\'/MUPRESS_GIT/image/no_image.png\'" class="img-rounded" style="height:230px;"></div>';
       echo "ชื่อหนังสือ:  " . $row1['title'] . '<br>' .
            "ISBN:  " . $row1['book_serial_no'] .'<br>'.
            "ส่วนลด:  ". $row1['discount'] . " %" . '<br>' .
            "รายละเอียด:  ". $row1['promotion_detail'];
       echo '</div></li>';
           }
      ?>
   </ul>
 </div>
  </div>

  <!-- end promotion old book-->

  <!-- start promotion new book list  -->
  <div class="contact-top heading">
        <h3>รายการโปรโมชั่น ลด 30%</h3>
  </div><br>
  <div class="container">
    <div style = "max-height: 1100px;  overflow: auto ;">
    <ul class="list-group">
      <?php
      while($row2 = mysqli_fetch_array($resultNew)){
       echo '<li class = "list-group-item" style="height:250px;"><div class="col-xs-12">' ;
       echo '<div class="col-xs-4 text-center"><img src="/MUPRESS_GIT/Backend/book_management/'.$row2['image'].'" onError="this.onerror=null;this.src=\'/MUPRESS_GIT/image/no_image.png\'" class="img-rounded" style="height:230px;"></div>';
       echo "ชื่อหนังสือ:  " . $row2['title'] . '<br>' .
            "ISBN:  " . $row2['book_serial_no'] .'<br>'.
            "ส่วนลด:  ". $row2['discount'] . " %" . '<br>' .
            "รายละเอียด:  ". $row2['promotion_detail'];
       echo '</div></li>';
           }
      ?>
   </ul>
 </div>
  </div>

  <!-- end promotion new book-->


  <!--footer-starts-->
  <?php include "footer.php" ; ?>
  	<!--footer-end-->

</body>
</html>
