<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-Type" content="text/html; charset=utf-8">

<?php include "headFrontEnd.php";
include 'dbconnection.php';
$sql = "SELECT book.book_id , title , author ,price, edition, serial_no ,recommend,book.image,content_preview,cs_id,current_amount,promotion.discount FROM book LEFT JOIN current_stock on book.book_id = current_stock.book_id
LEFT JOIN promotion on book.serial_no = promotion.book_serial_no ORDER BY book.book_id DESC LIMIT 0,4";
$sql2 = "SELECT book.book_id , title , author,price , edition, serial_no ,recommend,book.image,content_preview,cs_id,current_amount,promotion.discount FROM book LEFT JOIN current_stock on book.book_id = current_stock.book_id
LEFT JOIN promotion on book.serial_no = promotion.book_serial_no ORDER BY book.book_id DESC LIMIT 4,4";
$result = mysqli_query($con,$sql);
$result2 = mysqli_query($con,$sql2);



 ?>
    <!--<link href="css/bootstrap-theme.min.css" rel="stylesheet">-->
    <title>MU PRESS</title>
    <style>
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img,h3 {
            /*width: 70%;*/
            margin: auto;
            max-width: 200;
            max-height: 200;
        }
        .thumbnail{
            background-color: lightblue;
        }
        .thumbnail > img{
            margin-top: 20px;
            margin-bottom: 20px;
        }
        #partner {
          color: #fff;
          text-align: center;
          padding-bottom: 40px;
        }
        #partner {
          background: url(/MUPRESS_GIT/image/partner_bg.png) 50% 50% no-repeat;
          background-size: cover;

        }
        .partners ul li {
          display: inline-block;
          float: left;
          width: 30%;
          margin-left: 20px;
        }
        .center {
          text-align: center;
          padding-bottom: 30px;
        }


    </style>
    <script type="text/javascript">


    function validateCus(e){

      var filter = /[ก-๙a-zA-Z]/ ;
      var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      var firstname = document.getElementById("firstname").value ;
      var lastname = document.getElementById("lastname").value ;
      var email = document.getElementById("email").value ;
      var tel = document.getElementById("tel").value ;


      if(firstname == "" || !filter.test(firstname)){
        alert("กรุณากรอกชื่อของลูกค้าให้ถูกต้อง");
        return false ;
      }else if(lastname== "" || !filter.test(lastname) ){
        alert("กรุณากรอกนามสกุลของลูกค้าให้ถูกต้อง");
        return false ;
     }else if(email == "" || !re.test(email) ){
        alert("กรุณากรอก e-mail ของลูกค้าให้ถูกต้อง");
        return false ;
    //  }else if(address == "" ){
    //     alert("กรุณากรอกที่อยู่ลูกค้าให้ถูกต้อง");
    //     return false ;
    }else if(tel == "" || filter.test(tel) || tel.length != 10  ){
        alert("กรุณากรอกเบอร์โทรลูกค้าให้ถูกต้อง");
        return false ;
    }else{
        return true;
      }
    }
    </script>
</head>
<body>
  <?php include "header.php"; ?>

    <div class="container-fluid">
      <div class="container">
      </div>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active text-center">
                    <!--<img src="image/behavioralgame.jpg" alt="Chania" >-->
                    <h3 style="width: 200px;height: 200px;">Promotion</h3>
                </div>

                <div class="item">
                    <img src="image/health.jpg" alt="Chania" >
                </div>

                <div class="item">
                    <img src="image/law.jpg" alt="Flower" >
                </div>

                <div class="item">
                    <img src="image/rome.jpg" alt="Flower" >
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="container">
        </div>
        <div class="jumbotron" style="margin-top: 20px">
            <h1>News</h1>
        </div>

        <!--information-starts-->
          <div class="jumbotron" style="margin-top: 20px;">
        <div class="contact-text">
				<div class="col-md-4 text-center">
						<div class="address" style="margin-left:50px;">
							<h5>สนใจสมัครเป็นผู้เขียน</h5>

						</div>

					</div>
					<div class="col-md-8  " style="margin-top:10px;">
            <div class="container text-center">
						ติดต่อ โทร. 0-2800-2680-9 ต่อ 4302 หรือ <br>e-mail : mupress@mahidol.ac.th
          </div>
					</div>
					<div class="clearfix"></div>
				</div>
      </div>

  </div>
          <!--information-end-->

        <div class="container">
            <h1  style="font-size: 50px; font-weight: 200;text-align: center">หนังสือล่าสุด</h1>

        </div>


        <!--product-starts-->
	<div class="product">
		<div class="container">
			<div class="product-top">
				<div class="product-one">
					<?php


          while($row = mysqli_fetch_array($result)){
            echo '<div class="product-one">
    					     <div class="col-md-3 product-left">
    						     <div class="product-main simpleCart_shelfItem">
                      <a href="single.php?id='.$row['book_id'].' " class="mask"><img class="img-responsive zoom-img" src="/MUPRESS_GIT/Backend/book_management/'.$row['image'].'" onError="this.onerror=null;this.src=\'/MUPRESS_GIT/image/no_image.png\'" alt="" /></a>
                      <div class="product-bottom">';
            echo '<h3 class="item_name">'. $row['title'] . '</h3>' ;
            echo '<p>' . 'ผู้เขียน' . $row['author'] . '</p>' ;
            echo '<p>' . 'ISBN ' . $row['serial_no'] . '</p>' ;
            echo '<p>' . 'Edition  ' . $row['edition'] . '</p>' ;

            if($row['discount']==NULL){
              $row['discount']=0;
              $dc = "ไม่ลดราคา";
            }
            else {
              $dc = "-".$row['discount']."%";
            }

            if($row['current_amount'] > 0){

            echo '<h4><a class="item_add" href="#"><i></i></a> <span class="item_price">' . $row['price'] .' บาท'.'</span><span style=" margin-left:40px; color: green;"> มีสินค้า</span></h4>'  ;
            echo '<input type="text" name="name" class="item_bid" style="display: none" value="'.$row['book_id'].'">';
            echo '<input type="text" name="name" class="item_dc" style="display: none" value="'.$row['discount'].'">';
            }else {
            echo '<h4><a class="item_add" href="#"><i></i></a> <span class="item_price">' . $row['price'] .' บาท'.'</span><span style=" margin-left:40px; color: red;"> สินค้าหมด</span></h4>'  ;
            echo '<input type="text" name="name" class="item_bid" style="display: none" value="'.$row['book_id'].'">';
            echo '<input type="text" name="name" class="item_dc" style="display: none" value="'.$row['discount'].'">';
            }

            echo '</div>
                   <div class="srch">
                    <span>'.$dc.'</span>
                   </div>
                 </div>
               </div>
            </div>';
          }
          ?>

					<div class="clearfix"></div>
				</div>

        <div class="product-one">
					<?php
          while($row2 = mysqli_fetch_array($result2)){

            echo '<div class="product-one">
    					     <div class="col-md-3 product-left">
    						     <div class="product-main simpleCart_shelfItem">
                      <a href="single.php?id='.$row2['book_id'].'" class="mask"><img class="img-responsive zoom-img" src="/MUPRESS_GIT/Backend/book_management/'.$row2['image'].'" onError="this.onerror=null;this.src=\'/MUPRESS_GIT/image/no_image.png\'" alt="" /></a>
                      <div class="product-bottom">';
            echo '<h3 class="item_name">'. $row2['title'] . '</h3>' ;
            echo '<p>' . 'ผู้เขียน' . $row2['author'] . '</p>' ;
            echo '<p>' . 'ISBN ' . $row2['serial_no'] . '</p>' ;
            echo '<p>' . 'Edition  ' . $row2['edition'] . '</p>' ;

            if($row2['discount']==NULL){
              $row2['discount']=0;
              $dc = "ไม่ลดราคา";
            }
            else {
              $dc = "-".$row2['discount']."%";
            }

            if($row2['current_amount'] > 0){
            echo '<h4><a class="item_add" href="#"><i></i></a> <span class="item_price">' . $row2['price'] .' บาท'.'</span><span style=" margin-left:40px; color: green;"> มีสินค้า</span></h4>'  ;
            echo '<input type="text" name="name" class="item_bid" style="display: none" value="'.$row2['book_id'].'">';
            echo '<input type="text" name="name" class="item_dc" style="display: none" value="'.$row2['discount'].'">';
            }else {

            echo '<h4><a class="item_add" href="#"><i></i></a> <span class="item_price">' . $row2['price'] .' บาท'.'</span><span style=" margin-left:40px; color: red;"> สินค้าหมด</span></h4>'  ;
            echo '<input type="text" name="name" class="item_bid" style="display: none" value="'.$row2['book_id'].'">';
            echo '<input type="text" name="name" class="item_dc" style="display: none" value="'.$row2['discount'].'">';
            }

            echo '</div>
                   <div class="srch">
                    <span>'.$dc.'</span>
                   </div>
                 </div>
               </div>
            </div>';
          }
          ?>

					<div class="clearfix"></div>
				</div>
     </div>
	</div>
</div>
	<!--product-end-->

  <!-- start- partners -->
  <section id="partner">
        <div class="container">
            <div class="center">

                <p class="lead">เป็นการร่วมงานระหว่าง คณะ เทคโนโลยีสาระสนเทศและการสื่อสาร และ สำนักพิมพ์มหาวิทยาลัย มหิดล<br>โดย<br> นาย ศุภณัฐ จันทร์แจ่ม<br>นาย รชต ชูนิล <br> นาย อนันต์ บุญถาวรทวี</p>
            </div>

            <div class="partners">
                <ul style="padding-left:200px;">
                    <li > <a href="#"><img class="img-responsive" width="100"   src="image/mu.png"></a></li>
                    <li > <a href="#"><img class="img-responsive " width="200"  src="image/ict.png"></a></li>
                    <li > <a href="#"><img class="img-responsive " width="200"  src="image/press.png"></a></li>

                </ul>
            </div>
        </div><!--/.container-->
    </section>

 <!--end-partner-->


<!--footer-starts-->
<?php include "footer.php"; ?>
	<!--footer-end-->
</div>
</body>


<!---//////////////////////////////////////// Begin success model  ///////////////////////////////////////////////-->
<div class="modal fade" id="Modals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert alert-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">ทำการส่งคำขอ password สำหรับ ผู้เขียนเรียบร้อยแล้ว </h4>

            </div>

                <div class="modal-body">
                    <div class="text-center">
                          กรุณาติดต่อ เจ้าหน้าที่ของ สำนักพิมพ์มหาวิทยาลัย มหิดล  ติดต่อ <br>โทร. 0-2800-2680-9 ต่อ 4302 email : mupress@mahidol.ac.th

                    </div>

                </div>


        </div>
    </div>
</div>
<!---//////////////////////////////////////// End edit model  ///////////////////////////////////////////////-->
</html>


<script type="text/javascript">
$(document).ready(function() {
  if(<?php echo isset($_GET['ss']) & $_GET['ss'] == 1 ; ?>){
    sweetAlert("สำเร็จ!", "สมัครสมาชิกเรียบร้อย", "success");
    <?php unset($_GET['ss']); ?>
  }
  if(<?php echo (isset($_SESSION['successEV']) ? '1' : '0'); ?>){
    sweetAlert("สำเร็จ!", "หลักฐานการโอนได้ถูกบันทึกเรียบร้อยแล้วสามารถเข้าไปดูสถานะได้ที่ รายการสินค้าของคุณ", "success");
    <?php unset($_SESSION['successEV']); ?>
  }

});


$(document).ready(function() {
  if(<?php echo (isset($_SESSION['errorbook']) ? '1' : '0'); ?>){
    sweetAlert("ล้มเหลว!", "หนังสือ<?php echo $_SESSION['errorbook']; ?>มีจำนวนไม่พอในสต็อค", "error");
    <?php unset($_SESSION['errorbook']); ?>
  }

});


if(<?php echo (isset($_SESSION['Modelon']) ? '1' : '0'); ?>){
  $("#Modals").modal();
  <?php unset($_SESSION['Modelon']); ?>
}
</script>
