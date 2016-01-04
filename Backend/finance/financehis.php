<!DOCTYPE html>
<html>
<head>
    <title>Financial management</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/index.css" rel="stylesheet">
    <script src="../../js/jq.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</head>
<body>
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
                <a class="navbar-brand" href="../admin.php">MU PRESS AND BOOK STORE</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" data-toggle="modal" data-target="#myModal"><img height = "25px" width="20px" class = "img-circle" src="../../image/images.jpg" alt="profile-picture"></a></li>
                    <li><a href="#">Admin</a></li>
                    <li><a href="../disconnect.php">Log out</a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

<div class="container-fluid" id="navv" style="text-align: center;">
    <h2 class="lead">Financial Management</h2>
</div>

<div class="container" id="nav-bar" style="text-align: center;">
    <ul class="nav nav-tabs">
        <li role="presentation" ><a href="financial.php">รายงานของวันนี้</a></li>
        <li role="presentation" class="active"><a href="financehis.php">รายงานย้อยหลัง</a></li>
        <li role="presentation"><a href="financeadd.php">เพิ่มรายการขายจากช่องทางอื่น</a></li>
    </ul>
</div>

<div class="container-fluid" style="text-align: center;">
    <h3 class="lead">รายงานการขายย้อนหลัง</h3>
</div>


</body>
</html>
