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
         // get news and activities
          $sqlnews = "SELECT * FROM news ORDER BY news_id ASC ";
          $sqlactivities = "SELECT * FROM activities ORDER BY activities_id ASC ";
          $resultnews = mysqli_query($con,$sqlnews);
          $resultactivities = mysqli_query($con,$sqlactivities);

    ?>

    <style>
      .boxes {
       max-height: 1100px;
        overflow: auto ;
      }
    </style>
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
          <li class="active">ข่าวสารและกิจกรรม</li>
        </ol>
      </div>
    </div>
  </div>
  <!--end-breadcrumbs-->
  <br><br>

  <!-- start news -->
  <div class="contact-top heading">
				<h2>ข่าวสาร</h2>
  </div><br>
  <div class="container">
    <div class="boxes">
    <ul class="list-group">
      <?php
      while($row1 = mysqli_fetch_array($resultnews)){
       echo '<li class = "list-group-item" style="height:250px;"><div class="col-xs-12">' ;
       echo '<div class="col-xs-5 text-center"><img src="MUPRESS_GIT/Backend/content_management/'.$row1['image'].'" onError="this.onerror=null;this.src=\'/MUPRESS_GIT/image/no_image.png\'" class="img-rounded" style="height:230px;"></div>';
       echo "<div class='text-center'><h3>" . $row1['news_name'] . '</h3></div>' .
            "<div><p>" . $row1['news_detail'] . '</p></div>' ;
       echo '</div></li><br>';
           }
      ?>
   </ul>
 </div>
  </div>
  <!-- end news -->

  <!-- start activities -->
  <div class="contact-top heading">
				<h2>กิจกรรม</h2>
  </div><br>
  <div class="container" >
    <div class="boxes">
    <ul class="list-group" >
      <?php
      while($row2 = mysqli_fetch_array($resultactivities)){
       echo '<li class = "list-group-item" style="height:250px;"><div class="col-xs-12">' ;
       echo '<div class="col-xs-5 text-center"><img src="MUPRESS_GIT/Backend/content_management/'.$row2['image'].'" onError="this.onerror=null;this.src=\'/MUPRESS_GIT/image/no_image.png\'" class="img-rounded" style="height:230px;"></div>';
       echo "<div class='text-center'><h3>" . $row2['activities_name'] . '</h3></div>' .
            "<div class='text-center'>" . "วันที่เริ่ม: " . $row2['startDate'] ." วันที่สิ้นสุด: " .$row2['endDate'] . '</div>'.
            "<p>" . $row2['activities_detail'] . "</p>" ;
       echo '</div></li><br>';
           }
      ?>
   </ul>
 </div>
 </div><br><br>
  <!-- end activities -->


  <!--footer-starts-->
  <?php include "footer.php" ; ?>
  	<!--footer-end-->

</body>
</html>
