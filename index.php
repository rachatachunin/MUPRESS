<?
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
</head>
<body>

    <div class="page-header" >
        <div style="margin-left: 20px;margin-bottom: 20px;"><img src="image/logo_mupress.jpg">
            <?
            if(!isset($_SESSION['login']))
            {
                echo '<a href="#" data-toggle="modal" data-target="#L_R" class="btn btn-primary btn-lg pull-right" role="button" style="margin-right: 20px">สมัครสมาชิก หรือ ลงชื่อเข้าใช้งาน</a></div>';
            }
            else
            {
                echo '<div class="pull-right" style="padding-top: 20px;">';
                echo '<p class="lead pull-left" style="margin-right: 20px">'.$_SESSION['username'].'</p>';
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
                        <p>ผู้แต่ง	ศิริวรรณ ตั้งจิตกมล และคณะ<br>
                            พิมพ์ครั้งที่ 1	344 หน้า<br>
                            นครปฐม :	มหาวิทยาลัยมหิดล, 2558<br>
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
                        <p>ผู้แต่ง	นวรัตน์ สุวรรณผ่อง, รองศาสตราจารย์<br>
                            พิมพ์ครั้งที่ 1	216 หน้า<br>
                            นครปฐม :	มหาวิทยาลัยมหิดล, 2557<br>
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

            <!--<form method="post" >-->
                <div class="modal-body">
                    <div class="tab-content">

                        <div id="menu1" class="tab-pane fade in active">

                            <form  method="post" action="Authentication/login.php">

                                <input type="text" class="form-control" placeholder="Email" id= "username" name="username" required autofocus="true"><br>
                                <input type="password" class="form-control" placeholder="Password"id= "password" name="password" required><br>

                                <button class="btn btn-lg btn-primary btn-block" type="submit">
                                    ลงชื่อเข้าใช้</button>
                                <span class="clearfix"></span>

                            </form>
                        </div>
                        <div id="home" class="tab-pane fade">
                            <form class="form" method="post" action="Authentication/register.php">

                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon">ชื่อ:</span>
                                    <input type="text" class="form-control" placeholder="" aria-describedby="sizing-addon" name="fname">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2">นามสกุล:</span>
                                    <input type="text" class="form-control" placeholder="" aria-describedby="sizing-addon2" name="lname">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon3">Email:</span>
                                    <input type="text" class="form-control" placeholder="" aria-describedby="sizing-addon3" name="email">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon4">Password:</span>
                                    <input type="password" class="form-control" placeholder="" aria-describedby="sizing-addon4" name="password">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon5">เบอร์โทรศัพท์:</span>
                                    <input type="text" class="form-control" placeholder="" aria-describedby="sizing-addon5" name="tel">
                                </div>
                                <br>
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
</html>
