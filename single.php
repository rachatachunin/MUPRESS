<?php
ob_start();
session_start();
$book_id = $_GET['id'];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta http-equiv="content-Type" content="text/html; charset=utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta http-equiv="content-Type" content="text/html; charset=utf-8" />
     <meta name="keywords" content="Luxury Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <?php
            include "headFrontEnd.php";
            include "dbconnection.php";

            $sqlgetBookSingle = "SELECT * FROM book LEFT JOIN current_stock on book.book_id = current_stock.book_id  WHERE book.book_id = '".$book_id."' ";

            $result = mysqli_query($con,$sqlgetBookSingle);
            $row = mysqli_fetch_array($result);
        ?>
    <script>$(document).ready(function(){$(".memenu").memenu();});</script>
    <script type="text/javascript">
    $(function() {

    var menu_ul = $('.menu_drop > li > ul'),
           menu_a  = $('.menu_drop > li > a');

    menu_ul.hide();

    menu_a.click(function(e) {
        e.preventDefault();
        if(!$(this).hasClass('active')) {
            menu_a.removeClass('active');
            menu_ul.filter(':visible').slideUp('normal');
            $(this).addClass('active').next().stop(true,true).slideDown('normal');
        } else {
            $(this).removeClass('active');
            $(this).next().stop(true,true).slideUp('normal');
        }
    });

});
    </script>

        <title>MU PRESS</title>
</head>
<body>
  <?php include "header.php" ?>

  <!--start-breadcrumbs-->
<div class="breadcrumbs">
  <div class="container">
    <div class="breadcrumbs-main">
      <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active">Single</li>
      </ol>
    </div>
  </div>
</div>
<!--end-breadcrumbs-->

<!--start-single-->
	<div class="single contact">
		<div class="container">
			<div class="single-main">
				<div class="col-md-12 single-main-left">
				<div class="sngl-top">
					<div class="col-md-5 single-top-left">
						<div class="single-para simpleCart_shelfItem" style="height:600px;">
									<div style="height:600px;"> <img src="image/law.jpg" style="width:370px; height:600px;" class="img-responsive" alt=""/> </div>
						</div>

					</div>
					<div class="col-md-7 single-top-right">
						<div class="single-para simpleCart_shelfItem">
						<h2><?php echo $row['title']; ?></h2>
							<div class="star-on">
								<ul class="star-footer">
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
									</ul>

							<div class="clearfix"> </div>
							</div>

							<h5 class="item_price">฿ <?php echo $row['price'] ; ?></h5>

							<div class="available">
								<ul>
									<li>ผู้เขียน
										<span style="margin-left:16%;"><?php echo $row['author']; ?></span>
                </li>
								<li>ISBN
                    	<span style="margin-left:20%;"><?php echo $row['serial_no']; ?></span>
                </li>
                <li>Edition
                    	<span style="margin-left:130px;"><?php echo $row['edition']; ?></span>
                </li>
                <li>พิมพ์ครั้งที่
                    	<span style="margin-left:102px;">1</span>
                </li>
                <?php
                if($row['current_amount']>0){ ?>
                <li style="color: green;">มีสินค้า</li>
                <?php }else{ ?>
                  <li style="color: red;">สินค้าหมด</li>
                <?php }  ?>

								<div class="clearfix"> </div>
							</ul>
						</div>
              <?php  if($row['current_amount']>0){ ?>
								<button type="button" name="button" class="btn btn-info">ใส่ตระกร้า</button>
                <?php }else{ ?>
                <button type="button" name="button" class="btn btn-danger" disabled="true">ใส่ตระกร้า</button>
                <?php }  ?>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="tabs" style="margin-top:0px;">
					<ul class="menu_drop">
				<li class="item1"><a href="#"><i class = "glyphicon glyphicon-book"></i>&nbsp ตัวอย่างเนื้อหา</a>
					<ul>
					 <li >
					   <?php  echo $row['content_preview']; ?>
					 </li>
					</ul>
				</li>

	 		</ul>
				</div>
	</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-single-->

  <!-- start-footer -->
  <?php include"footer.php" ?>
  <!-- end-footer -->

</body>

 </html>
