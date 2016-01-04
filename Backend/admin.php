<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
    <script src="../js/jq.js"></script>
    <script src="../js/bootstrap.min.js"></script>
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
                <a class="navbar-brand" href="admin.php">MU PRESS AND BOOK STORE</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" data-toggle="modal" data-target="#myModal"><img height = "25px" width="20px" class = "img-circle" src="../image/images.jpg" alt="profile-picture"></a></li>
                    <li><a href="#">Admin</a></li>
                    <li><a href="../disconnect.php">Log out</a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>

<div class="container-fluid" id="navv" style="text-align: center;">
    <h2 class="lead">ADMINISTRATOR SYSTEM</h2>
</div>

<div class="container-fluid" style="margin-top: 50px;">

    <div class="col-lg-4 text-center">
        <div class="jumbotron">
            <h2 class="lead">Books Management</h2>

            <p><a class="btn btn-primary btn-lg text-center" href="#" role="button">Manage now<span class="glyphicon glyphicon-book" style="margin-left:10px"></span></a></p>
        </div>

    </div>

    <div class="col-lg-4 text-center">
        <div class="jumbotron">
            <h2 class="lead">Finance Reporting & Management</h2>

            <p><a class="btn btn-primary btn-lg text-center" href="finance/financial.php" role="button">Manage now<span class="glyphicon glyphicon-usd" style="margin-left:10px"></span></a></p>
        </div>

    </div>

    <div class="col-lg-4 text-center">
        <div class="jumbotron">
            <h2 class="lead">Users Management</h2>

            <p><a class="btn btn-primary btn-lg text-center" href="#" role="button">Manage now<span class="glyphicon glyphicon-user" style="margin-left:10px"></span></a></p>
        </div>

    </div>



</div>

<div class="container-fluid" style="margin-top: 50px;">

    <div class="col-lg-4 text-center">
        <div class="jumbotron">
            <h2 class="lead">Stock Management</h2>

            <p><a class="btn btn-primary btn-lg text-center" href="stock/stock.php" role="button">Manage now<span class="glyphicon glyphicon-folder-close" style="margin-left:10px"></span></a></p>
        </div>

    </div>

    <div class="col-lg-4 text-center">
        <div class="jumbotron">
            <h2 class="lead">Order Management</h2>

            <p><a class="btn btn-primary btn-lg text-center" href="#" role="button">Manage now<span class="glyphicon glyphicon-shopping-cart" style="margin-left:10px"></span></a></p>
        </div>

    </div>

    <div class="col-lg-4 text-center">
        <div class="jumbotron">
            <h2 class="lead">Contents Management</h2>

            <p><a class="btn btn-primary btn-lg text-center" href="#" role="button">Manage now<span class="glyphicon glyphicon-folder-open" style="margin-left:10px"></span></a></p>
        </div>

    </div>



</div>
</body>
</html>
