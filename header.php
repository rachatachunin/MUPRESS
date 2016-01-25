<!DOCTYPE html>
<?php
// session_start();
// include "dbconnect.php";
// $sql="SELECT image FROM it_man LEFT JOIN user ON it_man.it_id = user.it_id  WHERE user.username = '".$_COOKIE['username']."'";
// $re = mysqli_query($con,$sql);
// $result = mysqli_fetch_array($re);

 echo '
<header>
  <style>
        .navbar .navbar-nav {
        display: inline-block;
        float: none;
        }

        .navbar .navbar-collapse {
        text-align: center;
        }
  </style>
    <nav id="navbarC" class="navbar navbar-default" role = "navigation">
        <div class="container-fluid text-center">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="nav navbar-nav navbar-left" >
                <a class="navbar-brand" href="/MUPRESS_GIT/Backend/admin.php">
                    <img class="img-responsive" alt="Brand" width="100px"  src="/MUPRESS_GIT/image/logo_mupress.jpg">
                </a>
                        <a href="/MUPRESS_GIT/index.php" class="navbar-text"> <h4>Mahidol University Press</b></a></li>
                </div>
                <!-- <ul class="nav navbar-nav navbar-right">
                    <li><a href="/MUPRESS_GIT/disconnect.php">Log out</a></li>
                </ul> -->
                <div class="nav navbar-nav navbar-right" style="margin-top:30px;">
                    <a href="/MUPRESS_GIT/disconnect.php" role="button" class="btn btn-danger">Log out</a>
                </div>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
' ;


?>
