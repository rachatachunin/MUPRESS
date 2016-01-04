<!DOCTYPE html>
<?php
// session_start();
// include "dbconnect.php";
// $sql="SELECT image FROM it_man LEFT JOIN user ON it_man.it_id = user.it_id  WHERE user.username = '".$_COOKIE['username']."'";
// $re = mysqli_query($con,$sql);
// $result = mysqli_fetch_array($re);

 echo '
<header>
    <nav id="navbarC" class="navbar navbar-default" role = "navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">
                    <img class="img-responsive" alt="Brand" width="130px"  src="../image/logo_mupress.jpg">
                </a>
            </div>
            <div class="text-center" style="margin-left:420px;" >
                    <a href="#" class="navbar-text"> <h4>MUPMIS</h4><b>(Mahidol University Press Management Information System)</b></a></li>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../disconnect.php">Log out</a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
' ;


?>
