<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-Type" content="text/html; charset=utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <script src="js/jq.js"></script>
    <script src="js/bootstrap.min.js"></script>

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

    <div class="page-header" >
        <div style="margin-left: 20px;margin-bottom: 20px;"><img src="image/logo_mupress.jpg">
            <?php
            if(!isset($_SESSION['login']))
            {
                echo '<a href="#" data-toggle="modal" data-target="#L_R" class="btn btn-primary btn-lg pull-right" role="button" style="margin-right: 20px">สมัครสมาชิก หรือ ลงชื่อเข้าใช้งาน</a></div>';
            }
            else
            {
                echo '<div class="pull-right" style="padding-top: 20px;">';
                echo '<a href="#" onclick="profile_request(\''.$_SESSION["username"].'\')" class="lead pull-left" style="margin-right: 20px">'.$_SESSION['username'].'</a>';
                echo '<a href="cart2.html" class="btn btn-info" style="margin-right: 20px" type="button">
                สินค้าทั้งหมด <span class="badge">4</span>
            ';
                echo '<a href="disconnect.php" class="btn btn-danger" role="button" style="margin-right: 20px">ออกจากระบบ</a></div>';
                echo '</div>';
            }
            ?>
        <!--<h1 style="margin-left: 30px; margin-bottom: 20px;">MU PRESS</h1>-->

    </div>

    <nav class="navbar navbar-default" style="margin-top: -20px">
        <div class="container-fluid">
            <div class="navbar-header">
                <!--<a class="navbar-brand" href="#">WebSiteName</a>-->
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">หน้าแรก</a></li>
                    <li><a href="#">รายชื่อหนังสือ</a></li>
                    <li><a href="#">ข่าวสารและกิจกรรม</a></li>
                    <li><a href="#">โปรโมชั่น</a></li>
                </ul>
            </div>
        </div>
    </nav>

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
                    <div class="caption">
                        <h4>การตรวจคัดกรองและการวินิจฉัยทางการแพทย์ : Screening and Diagnostic Tests in Medicine</h4>
                        <p>ผู้แต่ง  ศิริวรรณ ตั้งจิตกมล และคณะ<br>
                            พิมพ์ครั้งที่ 1 344 หน้า<br>
                            นครปฐม :    มหาวิทยาลัยมหิดล, 2558<br>
                            <br>
                            ISBN 978-616-279-701-9<br>
                            ราคา 400 บาท</p>
                        <p><a href="#" class="btn btn-primary" role="button">สั่งซื้อ</a> <a href="#" class="btn btn-default" role="button">ดูตัวอย่าง</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img class="img-responsive" src="image/health.jpg" alt="..." height="171" width="180">
                    <div class="caption">
                        <h4>นโยบายสุขภาพ : การจัดทำ วิเคราะห์ และประเมินผล</h4>
                        <p>ผู้แต่ง  นวรัตน์ สุวรรณผ่อง, รองศาสตราจารย์<br>
                            พิมพ์ครั้งที่ 1 216 หน้า<br>
                            นครปฐม :    มหาวิทยาลัยมหิดล, 2557<br>
                            <br>
                            ISBN 978-616-279-581-7<br>
                            ราคา 180 บาท</p>
                        <p><a href="#" class="btn btn-primary" role="button">สั่งซื้อ</a> <a href="#" class="btn btn-default" role="button">ดูตัวอย่าง</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img class="img-responsive" src="image/law.jpg" alt="..." height="171" width="180">
                    <div class="caption">
                        <h4>จริยธรรมในวิชาชีพกฎหมาย</h4>
                        <p>ผู้แต่ง  ศาสตราจารย์ พิเศษ วิชา มหาคุณ และคณะ<br>
                            พิมพ์ครั้งที่ 1 182 หน้า<br>
                            นครปฐม :    มหาวิทยาลัยมหิดล, 2558<br>
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
                        <p>ผู้แต่ง  Yingyot Chiaravutthi<br>
                            พิมพ์ครั้งที่ 1 188 หน้า<br>
                            นครปฐม :    มหาวิทยาลัยมหิดล, 2558<br>
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
                        <p>ผู้แต่ง  สุริยา รัตนกุล, ศาสตราจารย์คุณหญิง<br>
                            พิมพ์ครั้งที่ 3 279 หน้า<br>
                            นครปฐม :    มหาวิทยาลัยมหิดล, 2557<br>
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
                        <p>ผู้แต่ง  ณรงชัย ปิฎกรัชต์, รองศาสตราจารย์<br>
                            พิมพ์ครั้งที่ 1 848 หน้า<br>
                            นครปฐม :    มหาวิทยาลัยมหิดล, 2557<br>
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

<div class="modal fade" id="L_R" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">MU PRESS AND BOOK STORE</h4>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#menu1">เข้าสู่ระบบ</a></li>
                    <li><a data-toggle="tab" href="#home">ลงทะเบียนสมาชิก</a></li>

                </ul>
            </div>

          <!-- modal register & login -->
                <div class="modal-body">
                    <div class="tab-content">
                        <div id="menu1" class="tab-pane fade in active">
                            <form  method="post" action="Authentication/login.php">
                              <div class="form-group">
                                                    <div class="input-group">
                                            <label for="uLogin" class="input-group-addon glyphicon glyphicon-user"></label>
                                                        <input type="text" class="form-control" name="username" id="uLogin" placeholder="Login">

                                                    </div>
                                                </div> <!-- /.form-group -->

                                                <div class="form-group">
                                                    <div class="input-group">
                                            <label for="uPassword" class="input-group-addon glyphicon glyphicon-lock"></label>
                                                        <input type="password" class="form-control" name="password" id="uPassword" placeholder="Password">

                                                    </div> <!-- /.input-group -->
                                                </div> <!-- /.form-group -->

                                <button class="btn btn-lg btn-primary btn-block" type="submit">
                                    ลงชื่อเข้าใช้</button>
                                <span class="clearfix"></span>

                            </form>
                        </div>

                        <div id="home" class="tab-pane fade">
                          <form id="addCustomerForm" onsubmit="return validateCus();" action ="Authentication/register.php" method="post" role="form">
                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input type="text" name="fname" id="firstname" class="form-control input-sm" placeholder="ชื่อ">
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input type="text" name="lname" id="lastname" class="form-control input-sm" placeholder="นามสกุล">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <select name="gender" class="form-control input-sm" aria-describedby="sizing-addon" required="ture">
                                <option value="">เลือกเพศ</option>
                                <option value="M">ชาย</option>
                                <option value="F">หญิง</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                          </div>

                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input type="text" name="tel" id="tel" class="form-control input-sm" placeholder="เบอร์โทรศัพท์">
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <textarea name="address" placeholder="ที่อยู่" class="form-control input-sm"></textarea>
                          </div>
                          <button class="btn btn-lg btn-primary btn-block" type="submit">
                              สมัครสมาชิก</button>
                          <span class="clearfix"></span>

                        </form>
                      </div>
                  </div>


                </div>
                <div class="modal-footer">
                    <!--<button type="submit" class="btn btn-primary">Add</button>-->
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            <!--</form>-->
        </div>
    </div>
</div>

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
<script>
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
