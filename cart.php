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

    </div>

     <div class="page-header" >
        <div style="margin-left: 20px;margin-bottom: 20px;"><img src="image/logo_mupress.jpg">
            <a href="#" data-toggle="modal" data-target="#L_R" class="glyphicon glyphicon-shopping-cart pull-right" role="button" style="margin-right: 20px"></a>
            <button class="btn btn-info pull-right" style="margin-right: 20px" type="button">
                สินค้าทั้งหมด <span class="badge">4</span>
            </button>
          </div>
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

              <div class="col-md-3 pull-right">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->
              
        </div>
    </nav>

    <h2 class="sub-header">สินค้าในตะกร้า</h2>

    <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>เล่มที่</th>
                  <th>ชื่อหนังสือ</th>
                  <th>ราคา</th>
                  <th>จำนวน</th>
                  <th>ราคารวม</th>
                  <th>ลบทิ้ง</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Lorem</td>
                  <td>200.00</td>
                  <td>2 <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editquantitymodel">แก้ไข</button></td>
                  <td>400.00</td>
                  <td><a href="#" class="glyphicon glyphicon-trash" role="button" data-toggle="modal" data-target="#deleteItem" ></a></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                  <td><a href="#" class="glyphicon glyphicon-trash" role="button" ></a></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                  <td><a href="#" class="glyphicon glyphicon-trash" role="button" ></a></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>libero</td>
                  <td>Sed</td>
                  <td>cursus</td>
                  <td>ante</td>
                  <td><a href="#" class="glyphicon glyphicon-trash" role="button" ></a></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>dapibus</td>
                  <td>diam</td>
                  <td>Sed</td>
                  <td>nisi</td>
                  <td><a href="#" class="glyphicon glyphicon-trash" role="button" ></a></td>
                </tr>


              </tbody>
            </table>
    </div>


        <div class="col-xs-12 col-md-3 pull-right">
        <table class="pull-right">
          <tbody>
          <tr>
           <td  style="width:200px"><span >ราคาสินค้าทั้งหมด</span></td> <td style="width:100px">1,000<td>  <td style="width:50px">บาท</td>
         </tr>
          <tr>
           <td><span>ส่วนลด</span></td> <td>50<td>  <td>บาท</td>
         </tr>
          <tr>
           <td><span>รวมยอดเงินทั้งหมด</span></td> <td>950<td>  <td>บาท</td>
         </tr>
         </tbody>
         </table>
        </div>
        
  




</body>
<!--  Model for edit quantity -->
<div class="modal fade" id="editquantitymodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">กรุณากรอกจำนวนหนังสือที่ต้องการ</h4>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" placeholder="Text input">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-primary">บันทึก</button>
      </div>
    </div>
  </div>
</div>

<!--  Model for delete item from cart -->
<div class="modal fade" id="deleteItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">คุณต้องการลบของชิ้นนี้ออกจากตะกร้าหรือไม่</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-danger">ลบทิ้ง</button>
      </div>
    </div>
  </div>
</div>

</html>