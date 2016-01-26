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
<?php include "headFrontEnd.php" ?>
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
        <div class="jumbotron" style="margin-top: 20px">
            <h1>News</h1>
        </div>

        <h1 class="lead" style="text-decoration: underline;">List of Books</h1>

        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img class="img-responsive" src="image/medicine.jpg" alt="..." height="171" width="180">
                    <div class="caption simpleCart_shelfItem">
                        <h4 class="item_name">การตรวจคัดกรองและการวินิจฉัยทางการแพทย์ : Screening and Diagnostic Tests in Medicine</h4>
                        <p>ผู้แต่ง	ศิริวรรณ ตั้งจิตกมล และคณะ<br>
                            พิมพ์ครั้งที่ 1	344 หน้า<br>
                            นครปฐม :	มหาวิทยาลัยมหิดล, 2558<br>
                            <br>
                            ISBN 978-616-279-701-9<br></p>
                            <p class="item_price">ราคา 400 บาท</p>
                        <p><a href="javascript:;" class="btn btn-primary item_add" role="button">สั่งซื้อ</a> <a href="#" class="btn btn-default" role="button">ดูตัวอย่าง</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img class="img-responsive" src="image/health.jpg" alt="..." height="171" width="180">
                    <div class="caption simpleCart_shelfItem">
                        <h4 class="item_name">นโยบายสุขภาพ : การจัดทำ วิเคราะห์ และประเมินผล</h4>
                        <p>ผู้แต่ง	นวรัตน์ สุวรรณผ่อง, รองศาสตราจารย์<br>
                            พิมพ์ครั้งที่ 1	216 หน้า<br>
                            นครปฐม :	มหาวิทยาลัยมหิดล, 2557<br>
                            <br>
                            ISBN 978-616-279-581-7<br></p>
                            <p class="item_price">ราคา 180 บาท</p>
                        <p><a href="javascript:;" class="btn btn-primary item_add" role="button">สั่งซื้อ</a> <a href="#" class="btn btn-default" role="button">ดูตัวอย่าง</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img class="img-responsive" src="image/law.jpg" alt="..." height="171" width="180">
                    <div class="caption">
                        <h4>จริยธรรมในวิชาชีพกฎหมาย</h4>
                        <p>ผู้แต่ง	ศาสตราจารย์ พิเศษ วิชา มหาคุณ และคณะ<br>
                            พิมพ์ครั้งที่ 1	182 หน้า<br>
                            นครปฐม :	มหาวิทยาลัยมหิดล, 2558<br>
                            <br>
                            ISBN 978-616-279-694-4<br>
                            ราคา 200 บาท</p>
                        <p><a href="#" class="btn btn-primary" role="button">สั่งซื้อ</a> <a href="#" class="btn btn-default" role="button">ดูตัวอย่าง</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img class="img-responsive" src="image/behavioralgame.jpg" alt="..." height="171" width="180">
                    <div class="caption">
                        <h4>Behavioral Game experiments in Thailand, and Implications of Cross-Country Comparisons</h4>
                        <p>ผู้แต่ง	Yingyot Chiaravutthi<br>
                            พิมพ์ครั้งที่ 1	188 หน้า<br>
                            นครปฐม :	มหาวิทยาลัยมหิดล, 2558<br>
                            <br>
                            ISBN 978-616-279-666-1<br>
                            ราคา 220 บาท</p>
                        <p><a href="#" class="btn btn-primary" role="button">สั่งซื้อ</a> <a href="#" class="btn btn-default" role="button">ดูตัวอย่าง</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="image/rome.jpg" alt="..." height="171" width="180">
                    <div class="caption">
                        <h4>อารยธรรมโรมัน : อารยธรรมตะวันตก</h4>
                        <p>ผู้แต่ง	สุริยา รัตนกุล, ศาสตราจารย์คุณหญิง<br>
                            พิมพ์ครั้งที่ 3	279 หน้า<br>
                            นครปฐม :	มหาวิทยาลัยมหิดล, 2557<br>
                            <br>
                            ISBN 978-616-279-515-2<br>
                            ราคา 240 บาท</p>
                        <p><a href="#" class="btn btn-primary" role="button">สั่งซื้อ</a> <a href="#" class="btn btn-default" role="button">ดูตัวอย่าง</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="image/thai-music.jpg" alt="..." height="171" width="180">
                    <div class="caption">
                        <h4>สารานุกรมเพลงไทย</h4>
                        <p>ผู้แต่ง	ณรงชัย ปิฎกรัชต์, รองศาสตราจารย์<br>
                            พิมพ์ครั้งที่ 1	848 หน้า<br>
                            นครปฐม :	มหาวิทยาลัยมหิดล, 2557<br>
                            <br>
                            ISBN 978-616-279-514-5<br>
                            ราคา 749 บาท</p>
                        <p><a href="#" class="btn btn-primary" role="button">สั่งซื้อ</a> <a href="#" class="btn btn-default" role="button">ดูตัวอย่าง</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<footer class="panel-footer text-center"> Footer Mahidol University Press & Store </footer>

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
