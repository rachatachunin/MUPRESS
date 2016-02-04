<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-Type" content="text/html; charset=utf-8">
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <script src="js/jq.js"></script>
    <script src="js/bootstrap.min.js"></script> -->
<?php include "headFrontEnd.php";
include 'dbconnection.php';
$sql = "SELECT book.book_id , title , author ,price, edition, serial_no ,recommend,image,content_preview,cs_id,current_amount FROM book LEFT JOIN current_stock on book.book_id = current_stock.book_id ORDER BY book.book_id DESC LIMIT 0,4";
$sql2 = "SELECT book.book_id , title , author,price , edition, serial_no ,recommend,image,content_preview,cs_id,current_amount FROM book LEFT JOIN current_stock on book.book_id = current_stock.book_id ORDER BY book.book_id DESC LIMIT 4,4";
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
  <?php include "header.php" ?>

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
                      <a href="single.php?id='.$row['book_id'].' " class="mask"><img class="img-responsive zoom-img" src="image/law.jpg" alt="" /></a>
                      <div class="product-bottom">';
            echo '<h3 class="item_name">'. $row['title'] . '</h3>' ;
            echo '<p>' . 'ผู้เขียน' . $row['author'] . '</p>' ;
            echo '<p>' . 'ISBN ' . $row['serial_no'] . '</p>' ;
            echo '<p>' . 'Edition  ' . $row['edition'] . '</p>' ;

            if($row['current_amount'] > 0){

            echo '<h4><a class="item_add" href="#"><i></i></a> <span class="item_price">' . $row['price'] .' บาท'.'</span><span style=" margin-left:40px; color: green;"> มีสินค้า</span></h4>'  ;
            echo '<input type="text" name="name" class="item_bid" style="display: none" value="'.$row['book_id'].'">';
            echo '<input type="text" name="name" class="item_dc" style="display: none" value="18">';
            }else {
            echo '<h4><a class="item_add" href="#" style="pointer-events:none; cursor: default;"><i></i></a> <span class="item_price">' . $row['price'] .' บาท'.'</span><span style=" margin-left:40px; color: red;"> สินค้าหมด</span></h4>'  ;
            echo '<input type="text" name="name" class="item_bid" style="display: none" value="'.$row['book_id'].'">';
            echo '<input type="text" name="name" class="item_dc" style="display: none" value="18">';
            }

            echo '</div>
                   <div class="srch">
                    <span>-50%</span>
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
                      <a href="single.php?id='.$row2['book_id'].'" class="mask"><img class="img-responsive zoom-img" src="image/law.jpg" alt="" /></a>
                      <div class="product-bottom">';
            echo '<h3 class="item_name">'. $row2['title'] . '</h3>' ;
            echo '<p>' . 'ผู้เขียน' . $row2['author'] . '</p>' ;
            echo '<p>' . 'ISBN ' . $row2['serial_no'] . '</p>' ;
            echo '<p>' . 'Edition  ' . $row2['edition'] . '</p>' ;

            if($row2['current_amount'] > 0){
            echo '<h4><a class="item_add" href="#"><i></i></a> <span class="item_price">' . $row2['price'] .' บาท'.'</span><span style=" margin-left:40px; color: green;"> มีสินค้า</span></h4>'  ;
            echo '<input type="text" name="name" class="item_bid" style="display: none" value="'.$row['book_id'].'">';
            echo '<input type="text" name="name" class="item_dc" style="display: none" value="18">';
            }else {

            echo '<h4><a class="item_add" href="#" style="pointer-events:none; cursor: default;"><i></i></a> <span class="item_price">' . $row2['price'] .' บาท'.'</span><span style=" margin-left:40px; color: red;"> สินค้าหมด</span></h4>'  ;
            echo '<input type="text" name="name" class="item_bid" style="display: none" value="'.$row['book_id'].'">';
            echo '<input type="text" name="name" class="item_dc" style="display: none" value="18">';
            }

            echo '</div>
                   <div class="srch">
                    <span class="item_dc">-50%</span>
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
                <h2>ผู้ร่วมงาน</h2>
                <p class="lead">เป็นการร่วมงานระหว่าง คณะ เทคโนโลยีสาระสนเทศและการสื่อสาร และ สำนักพิมพ์มหาวิทยาลัย มหิดล<br>โดย<br> นาย ศุภณัฐ จันทร์แจ่ม<br>นาย รชต ชูนิล <br> นาย อนันต์ บุญถาวรทวี</p>
            </div>

            <div class="partners">
                <ul style="padding-left:200px;">
                    <li > <a href="#"><img class="img-responsive"  src="image/partner1.png"></a></li>
                    <li > <a href="#"><img class="img-responsive "  src="image/partner2.png"></a></li>
                    <li > <a href="#"><img class="img-responsive "  src="image/partner3.png"></a></li>
                </ul>
            </div>
        </div><!--/.container-->
    </section>

 <!--end-partner-->


<!--footer-starts-->
<?php include "footer.php" ; ?>
	<!--footer-end-->
</div>
</body>

<!---//////////////////////////////////////// Begin edit model  ///////////////////////////////////////////////-->
    <div class="modal fade" id="edit_Profile_Model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">แก้ไขประวัติส่วนตัว</h4>

            </div>

            <!--<form method="post" >-->
                <div class="modal-body">

                    <form class="form" method="post" action="edit_profile.php">
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon3">Email</span>
                            <input type="text" value="<?php echo $_SESSION['username']; ?>" class="form-control" placeholder="" aria-describedby="sizing-addon3" name="email" readonly="true">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <span class="input-group-addon" id="sizing-addon1">ชื่อ</span>
                                <input type="text" name="fname" id="firstname" class="form-control input-sm" placeholder="ชื่อ" aria-describedby="sizing-addon1">
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <span class="input-group-addon" id="sizing-addon2">นามสกุล</span>
                                <input type="text" name="lname" id="lastname" class="form-control input-sm" placeholder="นามสกุล" aria-describedby="sizing-addon2">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <span class="input-group-addon" id="sizing-addon4">เพศ</span>
                            <select name="gender" class="form-control input-sm" aria-describedby="sizing-addon" aria-describedby="sizing-addon4" required="ture">
                                <option value="">เลือกเพศ</option>
                                <option value="M">ชาย</option>
                                <option value="F">หญิง</option>
                            </select>
                          </div>

                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <span class="input-group-addon" id="sizing-addon7">เบอร์โทรศัพท์</span>
                                <input type="text" name="tel" id="tel" class="form-control input-sm" placeholder="เบอร์โทรศัพท์" aria-describedby="sizing-addon7">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <span class="input-group-addon" id="sizing-addon8">ที่อยู่</span>
                            <textarea name="address" placeholder="ที่อยู่" class="form-control input-sm"  aria-describedby="sizing-addon8"></textarea>
                          </div>
                          <button class="btn btn-lg btn-primary btn-block" type="submit">
                              แก้ไข</button>
                          <span class="clearfix"></span>

                    </form>

                </div>
                <div class="modal-footer">
                    <!--<button type="submit" class="btn btn-primary">Add</button>-->
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
            <!--</form>-->
        </div>
    </div>
</div>
<!---//////////////////////////////////////// End edit model  ///////////////////////////////////////////////-->
</html>

<script type="text/javascript">
$(document).ready(function() {


});

function profile_request(email){
     $.ajax({
    url: "request_profile.php",
    data: {
        email: email ,

    },
    type: "GET",
    dataType : "JSON",
    success: function( json ) {
    var profile = json;
    $("#edit_Profile_Model input[name='fname']").val(profile[0]['user_fn']);
    $("#edit_Profile_Model input[name='lname']").val(profile[0]['user_ln']);
    $("#edit_Profile_Model input[name='tel']").val(profile[0]['tel']);
    $("#edit_Profile_Model select[name='gender']").val(profile[0]['gender']);
    $("#edit_Profile_Model textarea[name='address']").val(profile[0]['address']);

    },
    error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem in user profile request!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    },
  });
$("#edit_Profile_Model").modal(); ///enable edit model
}
</script>
